<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeParticipant;
use App\Models\Community;
use App\Models\EmissionRecord;
use App\Models\Pengguna;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportAdminController extends Controller
{
    public function index(): View 
{
    $communityEmissionsQuery = Community::query()
        ->select('id', 'name', 'total_emission_reduced', 'total_points')
        ->withAvg('emissionRecords as average_reduction', 'reduction_kg_co2')
        ->orderByDesc('total_emission_reduced');

    $communityEmissions = (clone $communityEmissionsQuery)
        ->paginate(6, ['*'], 'community_page');

    $communityEmissions->getCollection()->transform(function ($community) {
        return [
            'name' => $community->name,
            'total_emission' => number_format((float) $community->total_emission_reduced, 1) . ' Kg CO₂',
            'average_monthly' => number_format((float) ($community->average_reduction ?? 0), 1) . ' Kg CO₂',
        ];
    });

    // 🔥 FIX: pakai relasi 'pengguna', bukan 'user'
    $challengeParticipationQuery = ChallengeParticipant::with(['pengguna', 'challenge'])
        ->orderByDesc('points_earned')
        ->orderByDesc('last_reported_at');

    $challengeParticipation = (clone $challengeParticipationQuery)
        ->paginate(8, ['*'], 'challenge_page');

    $challengeParticipation->getCollection()->transform(function ($participant) {
        return [
            'user'      => $participant->pengguna->username ?? 'Peserta',
            'challenge' => $participant->challenge->title ?? '-',
            'points'    => $participant->points_earned,
            'status'    => ucfirst($participant->status),
        ];
    });

    return view('admin.reports.index', [
        'communityEmissions'     => $communityEmissions,
        'challengeParticipation' => $challengeParticipation,
    ]);
}


public function activities(Request $request): View
{
    // tetap memakai relasi yang benar ke penggunas
    $activities = UserActivity::with([
        'user:idPengguna,username,email',
        'performedBy:idPengguna,username'
    ])
        ->latest()
        ->paginate(20)
        ->withQueryString();

    $summary = [
        'total_users' => Pengguna::count(),
        'total_reduction' => (float) EmissionRecord::sum('reduction_kg_co2'),
    ];

$monthlyReductions = EmissionRecord::select(
    'user_id',
    DB::raw("EXTRACT(YEAR FROM recorded_for) AS year"),
    DB::raw("EXTRACT(MONTH FROM recorded_for) AS month_number"),
    DB::raw("TO_CHAR(recorded_for, 'Mon YYYY') AS month_label"),
    DB::raw("SUM(reduction_kg_co2) as total_reduction")
)
->groupBy('user_id', 'year', 'month_number', 'month_label')
->get();

    // directory pengguna
    $userDirectory = Pengguna::select('idPengguna', 'username')
        ->whereIn('idPengguna', $monthlyReductions->pluck('user_id')->unique())
        ->get()
        ->keyBy('idPengguna');

    $monthlyActivities = $monthlyReductions
        ->groupBy('user_id')
        ->map(function ($rows) use ($userDirectory) {
            return $rows
                ->sortBy(fn ($row) => $row->year * 100 + $row->month_number)
                ->values()
                ->map(function ($row) use ($userDirectory) {
                    return (object) [
                        'month' => $row->month_label,
                        'total_reduction' => (float) $row->total_reduction,
                        'user' => $userDirectory->get($row->user_id),
                    ];
                });
        });

    return view('admin.reports.activities', [
        'activities' => $activities,
        'summary' => $summary,
        'monthlyActivities' => $monthlyActivities,
    ]);
}
}