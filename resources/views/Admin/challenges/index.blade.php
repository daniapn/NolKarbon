<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - Manajemen Challenge</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Lexend', sans-serif;
        background: #EEE8DF;
        min-height: 100vh;
        display: flex;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 230px;
        background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
        color: white;
        display: flex;
        flex-direction: column;
        position: fixed;
        height: 100vh;
        left: 0;
        top: 0;
        overflow-y: auto;
        z-index: 1000;
    }

    .logo-sidebar {
        padding: 20px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-sidebar img {
        width: 140px;
        height: auto;
    }

    .nav-menu {
        flex: 1;
        padding: 20px 15px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 20px;
        margin-bottom: 10px;
        border-radius: 15px;
        cursor: pointer;
        text-decoration: none;
        color: white;
        transition: all 0.3s;
    }

    .nav-item:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-item.active {
        background: #C5CAE9;
        color: #001d5c;
    }

    .nav-item svg {
        width: 24px;
        height: 24px;
    }

    /* Logout Button */
    .logout-btn {
        margin: 20px 15px;
        padding: 12px 20px;
        background: white;
        color: #001d5c;
        border: none;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
        font-family: 'Lexend', sans-serif;
        font-weight: 600;
        transition: all 0.3s;
    }

    .logout-btn:hover {
        background: #f0f0f0;
    }

    /* Main Content */
    .main-content {
        margin-left: 230px;
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Header Styling */
    .header {
        background: white;
        padding: 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .header-left h2 {
        font-size: 28px;
        color: #001d5c;
        font-weight: 600;
        margin: 0;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 8px 15px;
        border-radius: 50px;
        border: 2px solid #E0E0E0;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #001d5c;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .user-info {
        text-align: left;
    }

    .user-name {
        font-weight: 600;
        font-size: 14px;
        color: #001d5c;
    }

    .user-email {
        font-size: 12px;
        color: #666;
    }

    /* Content Area */
    .content {
        flex: 1;
        padding: 40px;
    }

    /* Challenge Section */
    .challenge-section {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .section-header h3 {
        font-size: 24px;
        color: #001d5c;
        margin: 0;
        font-weight: 600;
    }

    .header-left-content {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .header-left-content i {
        font-size: 24px;
        color: #001d5c;
    }

    /* Search and Add Container */
    .search-add-container {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .btn-add-challenge {
        padding: 12px 28px;
        background: #001d5c;
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-add-challenge:hover {
        background: #003399;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 29, 92, 0.3);
    }

    /* Filter Form */
    .filter-container {
        margin-bottom: 25px;
    }

    .filter-form {
        display: grid;
        grid-template-columns: 2fr 1fr auto;
        gap: 15px;
        align-items: end;
    }

    .form-group label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        color: #001d5c;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        width: 100%;
        padding: 12px 45px 12px 20px;
        border: 1px solid #E0E0E0;
        border-radius: 50px;
        font-size: 14px;
        font-family: 'Lexend', sans-serif;
        transition: all 0.3s;
    }

    .search-box input:focus {
        outline: none;
        border-color: #001d5c;
        box-shadow: 0 0 0 3px rgba(0, 29, 92, 0.1);
    }

    .search-box i {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #666;
    }

    .form-group select {
        width: 100%;
        padding: 12px 20px;
        border: 1px solid #E0E0E0;
        border-radius: 50px;
        font-size: 14px;
        font-family: 'Lexend', sans-serif;
        background: white;
        cursor: pointer;
        transition: all 0.3s;
    }

    .form-group select:focus {
        outline: none;
        border-color: #001d5c;
        box-shadow: 0 0 0 3px rgba(0, 29, 92, 0.1);
    }

    .btn-filter {
        padding: 12px 32px;
        background: #001d5c;
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        white-space: nowrap;
        font-family: 'Lexend', sans-serif;
    }

    .btn-filter:hover {
        background: #003399;
        transform: translateY(-1px);
    }

    /* Table Styling */
    .challenge-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .challenge-table thead {
        background: #F5F5F5;
    }

    .challenge-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        color: #001d5c;
        font-size: 14px;
    }

    .challenge-table td {
        padding: 18px 15px;
        border-bottom: 1px solid #E0E0E0;
        font-size: 14px;
        vertical-align: middle;
    }

    .challenge-table tbody tr {
        transition: all 0.3s;
    }

    .challenge-table tbody tr:hover {
        background: #F9F9F9;
    }

    /* Challenge Cell */
    .challenge-cell {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .challenge-cell-title {
        font-weight: 600;
        color: #001d5c;
        font-size: 14px;
    }

    .challenge-cell-slug {
        font-size: 12px;
        color: #666;
    }

    /* Period Cell */
    .period-cell {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .period-start {
        font-weight: 600;
        color: #001d5c;
        font-size: 14px;
    }

    .period-end {
        font-size: 12px;
        color: #666;
    }

    /* Points Cell */
    .points-cell {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .points-main {
        font-weight: 600;
        color: #001d5c;
        font-size: 14px;
    }

    .points-bonus {
        font-size: 12px;
        color: #003399;
    }

    /* Status Cell */
    .status-cell {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .status-badge {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background: #E3F2FD;
        color: #1976D2;
        display: inline-block;
        width: fit-content;
    }

    .participants-count {
        font-size: 12px;
        color: #666;
    }

    /* Actions Cell */
    .actions-cell {
        display: flex;
        gap: 10px;
    }

    .action-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
        background: transparent;
        color: #666;
        text-decoration: none;
    }

    .action-icon:hover {
        background: #E0E0E0;
    }

    .action-icon i {
        font-size: 16px;
    }

    .action-icon.view-icon:hover {
        background: #E3F2FD;
        color: #1976D2;
    }

    .action-icon.edit-icon:hover {
        background: #E8F5E9;
        color: #388E3C;
    }

    .action-icon.delete-icon:hover {
        background: #FFEBEE;
        color: #D32F2F;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 24px;
        color: #666;
        border: 2px dashed #E0E0E0;
        border-radius: 12px;
        background: #FAFAFA;
        font-size: 14px;
    }

    /* Footer Actions */
    .footer-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }

    .btn-leaderboard {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: #E3F2FD;
        color: #001d5c;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s;
    }

    .btn-leaderboard:hover {
        background: #BBDEFB;
        transform: translateY(-1px);
    }

    /* Footer */
    footer {
        background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
        padding: 30px 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    footer img {
        width: 150px;
        height: auto;
    }

    footer p {
        color: white;
        font-size: 16px;
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .filter-form {
            grid-template-columns: 1.5fr 1fr auto;
        }
    }

    @media (max-width: 968px) {
        .sidebar {
            width: 80px;
        }

        .main-content {
            margin-left: 80px;
        }

        .nav-item span {
            display: none;
        }

        .logo-sidebar img {
            width: 50px;
        }

        .filter-form {
            grid-template-columns: 1fr;
        }

        .section-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .search-add-container {
            width: 100%;
        }

        .challenge-table {
            display: block;
            overflow-x: auto;
        }
    }

    @media (max-width: 768px) {
        .header {
            padding: 16px 20px;
        }

        .header-left h2 {
            font-size: 20px;
        }

        .content {
            padding: 20px;
        }

        .challenge-section {
            padding: 20px;
        }

        .footer-actions {
            flex-direction: column;
            gap: 16px;
            align-items: stretch;
        }

        .btn-leaderboard {
            justify-content: center;
        }

        footer {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
    }
</style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo-sidebar">
            <img src="/images/logo.png" alt="NolKarbon Logo">
        </div>

        <nav class="nav-menu">
            <a href="{{ route('admin.dashboardadmin') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.usermanagement') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span>User Management</span>
            </a>

            <a href="{{ route('admin.reviewdraft') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                </svg>
                <span>Review Draft</span>
            </a>

            <a href="{{ route('admin.challenges.index') }}" class="nav-item active">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H3V8h18v8zM6 15h2v-2H6v2zm0-3h2v-2H6v2zm3 3h8v-2H9v2zm0-3h8v-2H9v2z"/>
                </svg>
                <span>Challenges</span>
            </a>

            <a href="{{ route('admin.reports.index') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/>
                </svg>
                <span>Reports</span>
            </a>

            <a href="#emission" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                </svg>
                <span>Emission Card</span>
            </a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h2>Manajemen Challenge</h2>
            </div>
            </div>
        </header>

        <!-- Content -->
        <div class="content">
            <section class="challenge-section">
                <!-- Section Header -->
                <div class="section-header">
                    <div class="header-left-content">
                        <i class="fa-solid fa-medal"></i>
                        <h3>Daftar Challenge</h3>
                    </div>
                    <div class="search-add-container">
                        <a href="{{ route('admin.challenges.create') }}" class="btn-add-challenge">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Challenge
                        </a>
                    </div>
                </div>

                <!-- Filter Form -->
                <div class="filter-container">
                    <form method="GET" class="filter-form">
                        <div class="form-group">
                            <label for="search">Cari Challenge</label>
                            <div class="search-box">
                                <input id="search" name="q" type="search" value="{{ $filters['search'] ?? '' }}"
                                       placeholder="Cari judul, slug, atau periode">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="">Semua Status</option>
                                @foreach (['draft' => 'Draft', 'upcoming' => 'Mendatang', 'active' => 'Aktif', 'completed' => 'Selesai', 'archived' => 'Arsip'] as $value => $label)
                                    <option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn-filter">Terapkan</button>
                    </form>
                </div>

                <!-- Challenge Table -->
                <table class="challenge-table">
                    <thead>
                        <tr>
                            <th>Challenge</th>
                            <th>Periode</th>
                            <th>Poin</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($challenges as $challenge)
                            <tr>
                                <td>
                                    <div class="challenge-cell">
                                        <span class="challenge-cell-title">{{ $challenge->title }}</span>
                                        <span class="challenge-cell-slug">{{ $challenge->slug }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="period-cell">
                                        <span class="period-start">{{ optional($challenge->start_date)->translatedFormat('d M Y') ?? 'Fleksibel' }}</span>
                                        <span class="period-end">s/d {{ optional($challenge->end_date)->translatedFormat('d M Y') ?? 'Berjalan' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="points-cell">
                                        <span class="points-main">{{ $challenge->point_reward }} poin</span>
                                        @if($challenge->bonus_point)
                                            <span class="points-bonus">+{{ $challenge->bonus_point }} bonus</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="status-cell">
                                        <span class="status-badge">{{ ucfirst($challenge->status) }}</span>
                                        <span class="participants-count">{{ $challenge->participants_count }} peserta</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="{{ route('admin.challenges.show', $challenge) }}" class="action-icon view-icon" title="Detail">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.challenges.edit', $challenge) }}" class="action-icon edit-icon" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.challenges.destroy', $challenge) }}"
                                              onsubmit="return confirm('Hapus tantangan ini?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-icon delete-icon" title="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        Tidak ada tantangan yang ditemukan. Klik tombol Tambah untuk membuat tantangan baru.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Footer Actions -->
                <div class="footer-actions">
                    <a href="{{ route('leaderboard.index') }}" class="btn-leaderboard">
                        <i class="fa-solid fa-ranking-star"></i> Leaderboard Kampus
                    </a>
                    {{ $challenges->links() }}
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>NolKarbon@gmail.com</p>
        </footer>
    </main>
</body>
</html>