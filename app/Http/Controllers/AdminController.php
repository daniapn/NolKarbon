<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Pengguna;
use App\Models\DraftArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    // Ambil data bulan ini dan bulan lalu
    $currentMonth = now()->startOfMonth();
    $lastMonth = now()->subMonth()->startOfMonth();

    // ========== TOTAL USERS ==========
    $totalUsersNow = \App\Models\User::count();
    $totalUsersLastMonth = \App\Models\User::where('created_at', '<', $currentMonth)->count();
    $userGrowth = $totalUsersLastMonth > 0 
        ? round((($totalUsersNow - $totalUsersLastMonth) / $totalUsersLastMonth) * 100, 1) 
        : 0;

    // ========== CO2 REDUCED ==========
    $co2Now = \App\Models\emission_records::sum('reduction_kg_co2');
    $co2LastMonth = \App\Models\emission_records::where('created_at', '<', $currentMonth)->sum('reduction_kg_co2');
    $co2Growth = $co2LastMonth > 0 
        ? round((($co2Now - $co2LastMonth) / $co2LastMonth) * 100, 1) 
        : 0;

    // ========== COMMUNITIES ==========
    $communitiesNow = \App\Models\Community::where('status', 'active')->count();
    $communitiesLastMonth = \App\Models\Community::where('status', 'active')
        ->where('created_at', '<', $currentMonth)->count();
    $communityGrowth = $communitiesLastMonth > 0 
        ? round((($communitiesNow - $communitiesLastMonth) / $communitiesLastMonth) * 100, 1) 
        : 0;

    // ========== CHALLENGES ==========
    $challengesNow = \App\Models\Challenge::where('status', 'active')->count();
    $challengesLastMonth = \App\Models\Challenge::where('status', 'active')
        ->where('created_at', '<', $currentMonth)->count();
    $challengeGrowth = $challengesLastMonth > 0 
        ? round((($challengesNow - $challengesLastMonth) / $challengesLastMonth) * 100, 1) 
        : 0;

    // Stats dengan growth percentage
    $stats = [
        'total_users' => $totalUsersNow,
        'total_users_growth' => $userGrowth,
        
        'co2_reduced' => number_format($co2Now, 0, ',', '.') . ' kg',
        'co2_growth' => $co2Growth,
        
        'communities' => $communitiesNow,
        'community_growth' => $communityGrowth,
        
        'challenges' => $challengesNow,
        'challenge_growth' => $challengeGrowth,
    ];

    // Card data
    $cardData = [
        'total_cards' => \App\Models\EmissionCard::count(),
        'submitted_drafts' => \App\Models\Article::where('status', 'submitted')->count(),
        'unreviewed_drafts' => \App\Models\Article::where('status', 'pending')->count(),
        'approved_drafts' => \App\Models\Article::where('status', 'approved')->count(),
    ];

    // Emission stats untuk chart (per bulan) - HANYA TAHUN INI
    $emissionStats = \App\Models\emission_records::selectRaw('
            MONTHNAME(created_at) as month,
            MONTH(created_at) as month_num,
            SUM(emission_kg_co2) as emission,
            SUM(reduction_kg_co2) as reduction
        ')
        ->whereYear('created_at', now()->year)
        ->groupBy('month', 'month_num')
        ->orderBy('month_num')
        ->get();

    return view('admin.dashboardadmin', compact('stats', 'cardData', 'emissionStats'));
}

    public function userManagement()
{
    $currentMonth = now()->startOfMonth();
    
    // ========== TOTAL USERS ==========
    $totalUsersNow = \App\Models\Pengguna::count();
    $totalUsersLastMonth = \App\Models\Pengguna::where('created_at', '<', $currentMonth)->count();
    $userGrowth = $totalUsersLastMonth > 0 
        ? round((($totalUsersNow - $totalUsersLastMonth) / $totalUsersLastMonth) * 100, 1) 
        : 0;
    
    // ========== COMMUNITY ADMINS (role = admin) ==========
    $communityAdminsNow = \App\Models\Pengguna::where('role', 'admin')->count();
    $communityAdminsLastMonth = \App\Models\Pengguna::where('role', 'admin')
        ->where('created_at', '<', $currentMonth)->count();
    $adminGrowth = $communityAdminsLastMonth > 0 
        ? round((($communityAdminsNow - $communityAdminsLastMonth) / $communityAdminsLastMonth) * 100, 1) 
        : 0;
    
    // ========== ACTIVE USERS ==========
    $activeUsersNow = \App\Models\Pengguna::where('status', 'active')->count();
    $activeUsersLastMonth = \App\Models\Pengguna::where('status', 'active')
        ->where('created_at', '<', $currentMonth)->count();
    $activeGrowth = $activeUsersLastMonth > 0 
        ? round((($activeUsersNow - $activeUsersLastMonth) / $activeUsersLastMonth) * 100, 1) 
        : 0;
    
    // ========== INACTIVE USERS ==========
    $inactiveUsersNow = \App\Models\Pengguna::where('status', 'inactive')->count();
    $inactiveUsersLastMonth = \App\Models\Pengguna::where('status', 'inactive')
        ->where('created_at', '<', $currentMonth)->count();
    $inactiveGrowth = $inactiveUsersLastMonth > 0 
        ? round((($inactiveUsersNow - $inactiveUsersLastMonth) / $inactiveUsersLastMonth) * 100, 1) 
        : 0;
    
    // ========== STATS (sesuai desain) ==========
    $stats = [
        'total_users' => $totalUsersNow,
        'total_users_growth' => $userGrowth,
        
        'community_admins' => $communityAdminsNow,
        'community_admins_growth' => $adminGrowth,
        
        'active_users' => $activeUsersNow,
        'active_users_growth' => $activeGrowth,
        
        'inactive_users' => $inactiveUsersNow,
        'inactive_users_growth' => $inactiveGrowth,
    ];
    
    // ========== AMBIL DATA USERS UNTUK TABLE ==========
    $users = \App\Models\Pengguna::select(
            'idPengguna',
            'username',
            'email',
            'universitas',
            'role',
            'status',
            'join_date'
        )
        ->orderBy('join_date', 'desc')
        ->get()
        ->map(function($user) {
            return [
                'idPengguna' => $user->idPengguna,
                'username' => $user->username,
                'email' => $user->email,
                'universitas' => $user->universitas ?? '-',
                'role' => ucfirst($user->role ?? 'User'),
                'status' => ucfirst($user->status ?? 'Active'),
                'join_date' => $user->join_date, // langsung pakai kalau udah format Y-m-d
            ];
        });
    
    return view('admin.usermanagement', compact('stats', 'users'));
}

    // Logout untuk form POST /logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    //jgn dihapus -dn
    public function reviewDraft()
    {
    // Ambil hanya artikel dengan status 'menunggu review' atau 'published'
    $artikels = DraftArtikel::whereIn('status', ['menunggu review', 'published'])->get();
    return view('Admin.artikel.ReviewDraft', compact('artikels'));
    }

    public function unpublish($id)
    {
        $artikel = DraftArtikel::findOrFail($id);

        // Jika statusnya published, ubah ke menunggu review
        if ($artikel->status === 'Published') {
            $artikel->status = 'Menunggu Review';
            $artikel->save();
        }

        // Balik lagi ke halaman review draft
        return redirect()->back()->with('success', 'Artikel berhasil di-unpublish!');

    }
    public function formReview($id)
{
    // Ambil artikel berdasarkan ID
    $artikel = DraftArtikel::findOrFail($id);

    // Kirim ke blade
    return view('Admin.artikel.formReview', compact('artikel'));
}

public function approve($id)
{
    $artikel = DraftArtikel::findOrFail($id);
    $artikel->status = 'published';
    $artikel->catatan = null;
    $artikel->save();

    DB::table('notifications')->insert([
        'user_id' => $artikel->user_id, 
        'catatan' => $artikel->catatan,
        'judul' => $artikel->judul,
        'status' => $artikel->status,
        'created_at' => now()
    ]);

    return redirect()->route('admin.reviewdraft')
                     ->with('success', 'Artikel berhasil dipublish!');
}


    // === MINTA REVISI ===
public function revisi(Request $request, $id)
{
    $artikel = DraftArtikel::findOrFail($id);
    $artikel->status = 'revisi';
    $artikel->catatan = $request->catatan;
    $artikel->save();

     //Tambahkan notifikasi untuk kontributor
    DB::table('notifications')->insert([
        'user_id' => $artikel->user_id, 
        'catatan' => $artikel->catatan,
        'judul' => $artikel->judul,
        'status' => $artikel->status,
        'created_at' => now()
    ]);

     return redirect()->route('admin.reviewdraft')
                     ->with('success', 'Artikel telah diminta revisi.');
}


    // === TOLAK DRAFT ===

    public function tolak(Request $request, $id)
{
    $artikel = DraftArtikel::findOrFail($id);

        $artikel->status = 'ditolak';
        $artikel->catatan = $request->catatan; // alasan penolakan
        $artikel->save();

    // Tambahkan notifikasi untuk kontributor
    DB::table('notifications')->insert([
        'user_id' => $artikel->user_id,
        'catatan' => $artikel->catatan,
        'judul' => $artikel->judul,
        'status' => $artikel->status,
        'created_at' => now()
    ]);

     return redirect()->route('admin.reviewdraft')
                     ->with('success', 'Artikel telah ditolak.');
}

}