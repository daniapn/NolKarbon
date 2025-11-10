<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Pengguna;
use App\Models\DraftArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function statistikEmisi()
    {
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
        $currentMonth = now()->startOfMonth();
        $lastMonth = now()->subMonth()->startOfMonth();

        $totalUsersNow = \App\Models\User::count();
        $totalUsersLastMonth = \App\Models\User::where('created_at', '<', $currentMonth)->count();
        $userGrowth = $totalUsersLastMonth > 0 
            ? round((($totalUsersNow - $totalUsersLastMonth) / $totalUsersLastMonth) * 100, 1) 
            : 0;

        $co2Now = \App\Models\emission_records::sum('reduction_kg_co2');
        $co2LastMonth = \App\Models\emission_records::where('created_at', '<', $currentMonth)->sum('reduction_kg_co2');
        $co2Growth = $co2LastMonth > 0 
            ? round((($co2Now - $co2LastMonth) / $co2LastMonth) * 100, 1) 
            : 0;

        $communitiesNow = \App\Models\Community::where('status', 'active')->count();
        $communitiesLastMonth = \App\Models\Community::where('status', 'active')
            ->where('created_at', '<', $currentMonth)->count();
        $communityGrowth = $communitiesLastMonth > 0 
            ? round((($communitiesNow - $communitiesLastMonth) / $communitiesLastMonth) * 100, 1) 
            : 0;

        $challengesNow = \App\Models\Challenge::where('status', 'active')->count();
        $challengesLastMonth = \App\Models\Challenge::where('status', 'active')
            ->where('created_at', '<', $currentMonth)->count();
        $challengeGrowth = $challengesLastMonth > 0 
            ? round((($challengesNow - $challengesLastMonth) / $challengesLastMonth) * 100, 1) 
            : 0;

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

        $cardData = [
            'total_cards' => \App\Models\EmissionCard::count(),
            'submitted_drafts' => \App\Models\Article::where('status', 'submitted')->count(),
            'unreviewed_drafts' => \App\Models\Article::where('status', 'pending')->count(),
            'approved_drafts' => \App\Models\Article::where('status', 'approved')->count(),
        ];

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

    // ========== USER MANAGEMENT ==========
    public function userManagement()
    {
        $currentMonth = now()->startOfMonth();
        
        $totalUsersNow = Pengguna::count();
        $totalUsersLastMonth = Pengguna::where('created_at', '<', $currentMonth)->count();
        $userGrowth = $totalUsersLastMonth > 0 
            ? round((($totalUsersNow - $totalUsersLastMonth) / $totalUsersLastMonth) * 100, 1) 
            : 0;
        
        $communityAdminsNow = Pengguna::where('role', 'Admin')->count();
        $communityAdminsLastMonth = Pengguna::where('role', 'Admin')
            ->where('created_at', '<', $currentMonth)->count();
        $adminGrowth = $communityAdminsLastMonth > 0 
            ? round((($communityAdminsNow - $communityAdminsLastMonth) / $communityAdminsLastMonth) * 100, 1) 
            : 0;
        
        $activeUsersNow = Pengguna::where('status', 'Active')->count();
        $activeUsersLastMonth = Pengguna::where('status', 'Active')
            ->where('created_at', '<', $currentMonth)->count();
        $activeGrowth = $activeUsersLastMonth > 0 
            ? round((($activeUsersNow - $activeUsersLastMonth) / $activeUsersLastMonth) * 100, 1) 
            : 0;
        
        $inactiveUsersNow = Pengguna::where('status', 'Inactive')->count();
        $inactiveUsersLastMonth = Pengguna::where('status', 'Inactive')
            ->where('created_at', '<', $currentMonth)->count();
        $inactiveGrowth = $inactiveUsersLastMonth > 0 
            ? round((($inactiveUsersNow - $inactiveUsersLastMonth) / $inactiveUsersLastMonth) * 100, 1) 
            : 0;
        
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
        
        $users = Pengguna::select(
            'idPengguna',
            'username',
            'email',
            'universitas',
            'role',
            'status',
            'created_at'
        )
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function($user) {
            $user->join_date = \Carbon\Carbon::parse($user->created_at)->format('d M Y');
            return $user;
        });
        
        return view('admin.usermanagement', compact('stats', 'users'));
    }

    public function showAddUserForm()
    {
        return view('admin.adduser');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:penggunas,email',
            'password' => 'required|string|min:6',
            'universitas' => 'required|string|max:255',
            'role' => 'required|in:User,Admin,Kontributor',
            'status' => 'required|in:Active,Inactive',
        ]);

        try {
            Pengguna::create([
                'username' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'universitas' => $validated['universitas'],
                'role' => $validated['role'],
                'status' => $validated['status'],
                'join_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()
                ->route('admin.usermanagement')
                ->with('success', 'User has been added successfully!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to add user: ' . $e->getMessage()]);
        }
    }

    public function editUser($id)
    {
        $user = Pengguna::findOrFail($id);
        return view('admin.updateuser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = Pengguna::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:penggunas,email,' . $id . ',idPengguna',
            'universitas' => 'required|string|max:255',
            'role' => 'required|in:User,Admin,Kontributor',
            'status' => 'required|in:Active,Inactive',
        ]);

        try {
            $user->update([
                'username' => $validated['name'],
                'email' => $validated['email'],
                'universitas' => $validated['universitas'],
                'role' => $validated['role'],
                'status' => $validated['status'],
                'updated_at' => now(),
            ]);

            return redirect()
                ->route('admin.usermanagement')
                ->with('success', 'User has been updated successfully!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update user: ' . $e->getMessage()]);
        }
    }

    public function readUser($id)
{
    $user = Pengguna::findOrFail($id);
    return view('admin.readuser', compact('user'));
}

public function showDeleteUser($id)
{
    $user = Pengguna::findOrFail($id);
    return view('admin.deleteuser', compact('user'));
}

    public function deleteUser($id)
    {
        try {
            $user = Pengguna::findOrFail($id);
            $user->delete();

            return redirect()
                ->route('admin.usermanagement')
                ->with('success', 'User has been deleted successfully!');

        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Failed to delete user: ' . $e->getMessage()]);
        }
    }

    // ========== LOGOUT ==========
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // ========== ARTIKEL (jgn dihapus -dn) ==========
    public function reviewDraft()
    {
        $artikels = DraftArtikel::whereIn('status', ['menunggu review', 'published'])->get();
        return view('Admin.artikel.ReviewDraft', compact('artikels'));
    }

    public function unpublish($id)
    {
        $artikel = DraftArtikel::findOrFail($id);

        if ($artikel->status === 'Published') {
            $artikel->status = 'Menunggu Review';
            $artikel->save();
        }

        return redirect()->back()->with('success', 'Artikel berhasil di-unpublish!');
    }

    public function formReview($id)
    {
        $artikel = DraftArtikel::findOrFail($id);
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

    public function revisi(Request $request, $id)
    {
        $artikel = DraftArtikel::findOrFail($id);
        $artikel->status = 'revisi';
        $artikel->catatan = $request->catatan;
        $artikel->save();

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

    public function tolak(Request $request, $id)
    {
        $artikel = DraftArtikel::findOrFail($id);
        $artikel->status = 'ditolak';
        $artikel->catatan = $request->catatan;
        $artikel->save();

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