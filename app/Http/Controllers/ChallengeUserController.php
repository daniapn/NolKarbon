<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Pengguna;
use App\Models\ChallengeParticipant;
use App\Models\ChallengeProgressLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChallengeUserController extends Controller
{
    /**
     * Menampilkan daftar challenge.
     */
    public function index(Request $request): View
    {
        $status = $request->string('status')->trim()->toString() ?: null;
        $visibility = $request->string('visibility')->trim()->toString() ?: null;
        $search = $request->string('q')->trim()->toString() ?: null;

        $pengguna = Auth::user() ?? Pengguna::query()->firstOrFail();

        $participations = ChallengeParticipant::query()
            ->with('challenge')
            ->where('idPengguna', $pengguna->idPengguna)
            ->orderByDesc('created_at')
            ->get();

        $totalPoints = $participations->sum('points_earned');
        $activeParticipation = $participations->firstWhere('status', 'joined');

        $availableChallenges = Challenge::query()
            ->whereNotIn('id', $participations->pluck('challenge_id'))
            ->where('status', 'active')
            ->limit(5)
            ->get();

        $challenges = Challenge::query()
            ->withCount('participants')
            ->with('creator')
            ->when($status, fn($query) => $query->where('status', $status))
            ->when($visibility, fn($query) => $query->where('visibility', $visibility))
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderByRaw("
                CASE status
                    WHEN 'active' THEN 1
                    WHEN 'upcoming' THEN 2
                    WHEN 'draft' THEN 3
                    WHEN 'completed' THEN 4
                    WHEN 'archived' THEN 5
                    ELSE 6
                END
            ")
            ->orderByDesc('created_at')
            ->paginate(8)
            ->withQueryString();

        $highlight = Challenge::query()
            ->withCount('participants')
            ->where('status', 'active')
            ->orderByDesc('participants_count')
            ->first();

        return view('challenges.index', [
            'user' => $pengguna,
            'totalPoints' => $totalPoints,
            'activeParticipation' => $activeParticipation,
            'participations' => $participations,
            'availableChallenges' => $availableChallenges,
            'challenges' => $challenges,
            'highlight' => $highlight,
            'filters' => [
                'status' => $status,
                'visibility' => $visibility,
                'search' => $search,
            ],
        ]);
    }

    /**
     * Menampilkan detail challenge.
     */
    public function show(Challenge $challenge): View
    {
        $challenge->load([
            'creator',
            'participants.user',
            'progressLogs' => fn($query) =>
                $query->orderBy('challenge_progress_logs.created_at', 'desc')->limit(10),
        ])->loadCount('participants');

        $pengguna = Auth::user();
        $participant = null;

        if ($pengguna) {
            $participant = $challenge->participants
                ->where('idPengguna', $pengguna->idPengguna)
                ->first();
        }

        if (!$participant) {
            $participant = ChallengeParticipant::query()
                ->with('user')
                ->where('challenge_id', $challenge->id)
                ->orderByDesc('points_earned')
                ->first();
        }

        $related = Challenge::query()
            ->whereKeyNot($challenge->getKey())
            ->where('status', 'active')
            ->limit(3)
            ->get();

        return view('challenges.show', [
            'challenge' => $challenge,
            'participant' => $participant,
            'relatedChallenges' => $related,
        ]);
    }

    /**
     * Menampilkan form join challenge.
     */
    public function joinForm(Challenge $challenge): View
    {
        return view('challenges.join', [
            'challenge' => $challenge->load('creator'),
        ]);
    }

    /**
     * Proses join challenge.
     */
    public function join(Request $request, Challenge $challenge): RedirectResponse
    {
        $payload = $request->validate([
            'motivation' => ['nullable', 'string', 'max:500'],
            'personal_goal' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'team_name' => ['nullable', 'string', 'max:120'],
        ]);

        // ✅ Gunakan Auth::user() konsisten dengan AuthController
        $pengguna = Auth::user() ?? Pengguna::query()->firstOrFail();

        $participant = ChallengeParticipant::updateOrCreate(
            [
                'challenge_id' => $challenge->id,
                'idPengguna' => $pengguna->idPengguna,
            ],
            [
                'status' => 'joined',
                'progress_percentage' => 0,
                'points_earned' => $challenge->point_reward,
                'joined_at' => now(),
                'metadata' => [
                    'motivation' => $payload['motivation'] ?? 'Saya siap mengikuti tantangan ini.',
                    'personal_goal' => $payload['personal_goal'] ?? null,
                    'team_name' => $payload['team_name'] ?? null,
                    'desired_start_date' => $payload['start_date'] ?? null,
                ],
            ]
        );

        return redirect()
            ->route('challenges.show', $challenge)
            ->with('status', 'Kamu berhasil bergabung ke tantangan!')
            ->with('participant_id', $participant->id);
    }

    /**
     * Menampilkan form progress.
     */
    public function progressForm(Challenge $challenge): View
    {
        $pengguna = Auth::user() ?? Pengguna::query()->firstOrFail();

        $participant = ChallengeParticipant::query()
            ->where('challenge_id', $challenge->id)
            ->where('idPengguna', $pengguna->idPengguna)
            ->with(['challenge', 'progressLogs' => fn($query) => $query->latest()->limit(10)])
            ->first();

        abort_unless($participant, 404, 'Kamu belum bergabung di tantangan ini.');

        return view('challenges.progress', [
            'participant' => $participant,
            'challenge' => $challenge,
        ]);
    }

    /**
     * Menyimpan progress challenge.
     */
    public function progress(Request $request, Challenge $challenge): RedirectResponse
    {
$validated = $request->validate([
    'activity_type' => ['required', 'in:submission,check_in,milestone,adjustment'],
    'logged_for' => ['required', 'date'],
    'description' => ['required', 'string', 'max:600'],
    'metric_value' => ['nullable', 'numeric', 'min:0'],
    'metric_unit' => ['nullable', 'string', 'max:30'],
    'attachments' => ['nullable', 'string', 'max:255'], // ⬅ ubah ini
    'progress_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
]);


        $pengguna = Auth::user() ?? Pengguna::query()->firstOrFail();

    $participant = ChallengeParticipant::query()
        ->where('challenge_id', $challenge->id)
        ->where('idPengguna', $pengguna->idPengguna)
        ->firstOrFail();

    // ✅ Simpan hanya attachment yang tidak kosong
    $attachments = collect($validated['attachments'] ?? [])
        ->filter(fn($value) => filled($value))
        ->values()
        ->all();

    // ✅ Buat log progres
    $log = ChallengeProgressLog::create([
        'challenge_participant_id' => $participant->id,
        'logged_for' => $validated['logged_for'],
        'activity_type' => $validated['activity_type'],
        'description' => $validated['description'],
        'metric_value' => $validated['metric_value'] ?? null,
        'metric_unit' => $validated['metric_unit'] ?? null,
        'attachments' => $attachments, // simpan array string hasil input user
        'metadata' => [
            'submitted_by' => $pengguna->only(['idPengguna', 'username']),
        ],
    ]);

    //  Update progress peserta
    $participant->update([
        'progress_percentage' => $validated['progress_percentage'] ?? $participant->progress_percentage,
        'last_reported_at' => now(),
    ]);

    //  Jika progress 100%, update poin otomatis
    if (isset($validated['progress_percentage']) && $validated['progress_percentage'] == 100) {
        $totalPoints = $challenge->point_reward + $challenge->bonus_point;

        $participant->update([
            'points_earned' => $totalPoints,
        ]);
    }

    return redirect()
        ->route('challenges.progress.create', $challenge)
        ->with('status', 'Laporan progres berhasil disimpan!')
        ->with('log_id', $log->id);
}
    /**
     * Dashboard pengguna.
     */
    public function dashboard(): View
    {
        $pengguna = Auth::user() ?? Pengguna::query()->firstOrFail();

        $participations = ChallengeParticipant::query()
            ->with(['challenge' => fn($query) => $query->select(['id', 'title', 'slug', 'description', 'point_reward', 'cover_image_path', 'status'])])
            ->withCount('progressLogs')
            ->where('idPengguna', $pengguna->idPengguna)
            ->orderByDesc('created_at')
            ->get();

        $totalPoints = $participations->sum('points_earned');
        $activeChallenges = $participations->where('status', 'joined');

        $recentLogs = ChallengeProgressLog::query()
            ->whereIn('challenge_participant_id', $participations->pluck('id'))
            ->latest()
            ->limit(6)
            ->get();

        $suggestions = Challenge::query()
            ->whereNotIn('id', $participations->pluck('challenge_id'))
            ->where('status', 'active')
            ->limit(3)
            ->get();

        return view('challenges.dashboard', [
            'user' => $pengguna,
            'participations' => $participations,
            'totalPoints' => $totalPoints,
            'activeChallenges' => $activeChallenges,
            'completedChallenges' => $participations->where('status', 'completed'),
            'recentLogs' => $recentLogs,
            'suggestions' => $suggestions,
        ]);
    }

    /**
     * Halaman badges pengguna.
     */
    public function badges(): View
    {
        $pengguna = Auth::user() ?? Pengguna::query()->firstOrFail();

        $participations = ChallengeParticipant::query()
            ->where('idPengguna', $pengguna->idPengguna)
            ->get();

        $totalPoints = $participations->sum('points_earned');
        $level = max(1, (int) floor($totalPoints / 100) + 1);

        $badges = [
            [
                'name' => 'Eco Starter',
                'description' => 'Menyelesaikan tantangan pertama.',
                'earned_at' => $participations->isNotEmpty() ? $participations->first()->joined_at : null,
            ],
            [
                'name' => 'Carbon Slayer',
                'description' => 'Mengumpulkan 250 poin tantangan.',
                'earned_at' => $totalPoints >= 250 ? now()->subDays(7) : null,
            ],
            [
                'name' => 'Campus Champion',
                'description' => 'Memimpin leaderboard mingguan.',
                'earned_at' => null,
            ],
        ];

        return view('challenges.badges', [
            'user' => $pengguna,
            'level' => $level,
            'nextLevelPoints' => ($level * 100) - $totalPoints,
            'totalPoints' => $totalPoints,
            'badges' => $badges,
        ]);
    }
}
