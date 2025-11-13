<?php 

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LeaderboardController extends Controller
{
    public function index(): View
    {
        // Ambil semua komunitas aktif (top 12 berdasarkan poin)
        $communities = Community::select('name', 'total_points')
            ->where('status', 'active')
            ->orderByDesc('total_points')
            ->take(12)
            ->get();

        // Hitung total emisi berkurang (live, dari tabel emissions)
        foreach ($communities as $community) {
            $community->total_emission_reduced = DB::table('emissions')
                ->where('universitas', $community->name)
                ->sum('total_emission');
        }

        // Hitung maksimum poin untuk normalisasi skor
        $maxPoints = max($communities->max('total_points') ?? 0, 1);

        // Format data leaderboard
        $leaderboard = $communities->map(function (Community $community, int $index) use ($maxPoints) {
            $score = $community->total_points > 0
                ? round(($community->total_points / $maxPoints) * 100)
                : 0;

            return [
                'rank' => $index + 1,
                'name' => $community->name,
                'emission' => (float) $community->total_emission_reduced,
                'score' => $score,
            ];
        });

        return view('leaderboard.index', [
            'leaderboard' => $leaderboard,
        ]);
    }
}
