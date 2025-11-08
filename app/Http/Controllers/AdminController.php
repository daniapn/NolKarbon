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