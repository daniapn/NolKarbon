<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CommunityController extends Controller
{
    public function dashboard(): View
    {
        $topPerformers = DB::table('penggunas')
            ->join('communities', 'penggunas.universitas', '=', 'communities.name')
            ->leftJoin('challenge_participants', 'penggunas.idPengguna', '=', 'challenge_participants.idPengguna')
            ->select(
                'penggunas.username as member_name',
                'penggunas.universitas as community_name',
                DB::raw('COALESCE(SUM(challenge_participants.points_earned), 0) as total_points')
            )
            ->where('penggunas.role', '=', 'User') // ✅ hanya tampilkan role = User
            ->groupBy('penggunas.idPengguna', 'penggunas.username', 'penggunas.universitas')
            ->orderByDesc('total_points')
            ->limit(12)
            ->get();

        $entries = $topPerformers->map(function ($row, $index) {
            return [
                'rank' => $index + 1,
                'member' => $row->member_name,
                'community' => $row->community_name,
                'points' => (int) $row->total_points,
            ];
        });

        return view('communities.dashboard', [
            'entries' => $entries,
        ]);
    }
}
