<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function statistikEmisi()
    {
        // Dummy data — tinggal ganti kalau sudah pakai database
        $emissionReports = [
            ['university' => 'Brawijaya University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
            ['university' => 'Indonesian University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
            ['university' => 'Airlangga University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
            ['university' => 'Gadjah Mada University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
        ];

        $challengeReports = [
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
        ];

        return view('statistikemisi', compact('emissionReports', 'challengeReports'));
    }

     public function dashboardAdmin()
    {
        $stats = [
            'total_users' => Pengguna::count(),
            'co2_reduced' => '1,998 ton',
            'communities' => 34,
            'challenges' => 18,
        ];

        // jika butuh data lagi, kirim ke view
        return view('admin.dashboardadmin', compact('stats'));
    }

    // Halaman user management
    public function userManagement()
    {
        // ambil semua user (atau paginate kalau banyak)
        $users = Pengguna::select('idPengguna', 'username', 'email', 'universitas', 'role', 'status', 'join_date')->get();

        $stats = [
            'total_users' => Pengguna::count(),
            'community_admins' => Pengguna::where('role', 'Admin')->count(),
            'active_users' => Pengguna::where('status', 'Active')->count(),
            'inactive_users' => Pengguna::where('status', 'Inactive')->count(),
        ];

        return view('admin.usermanagement', compact('users', 'stats'));
    }

    // Logout untuk form POST /logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}