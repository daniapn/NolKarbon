<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - Detail Tantangan</title>
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

    .space-y-8 > * + * {
        margin-top: 32px;
    }

    /* Challenge Detail Section */
    .detail-section {
        background: #e7ddcd;
        border-radius: 48px;
        padding: 32px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .detail-card {
        background: white;
        border-radius: 32px;
        border: 1px solid #93c5fd;
        padding: 32px;
    }

    .detail-layout {
        display: flex;
        gap: 32px;
        align-items: flex-start;
    }

    .detail-info {
        flex: 1;
        max-width: 800px;
    }

    .detail-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.3em;
        color: #3b82f6;
        font-weight: 600;
    }

    .detail-title {
        font-size: 32px;
        font-weight: 600;
        color: #1e3a8a;
        margin-top: 12px;
        margin-bottom: 16px;
    }

    .detail-description {
        font-size: 14px;
        color: #475569;
        line-height: 1.6;
        margin-bottom: 24px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        font-size: 14px;
    }

    .detail-item dt {
        font-size: 11px;
        text-transform: uppercase;
        color: #3b82f6;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .detail-item dd {
        font-weight: 600;
        color: #1e3a8a;
        margin-top: 8px;
    }

    .status-badge {
        display: inline-flex;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        background: #dbeafe;
        color: #1e40af;
    }

    .date-text {
        font-size: 14px;
        font-weight: 600;
    }

    .date-separator {
        font-size: 12px;
        color: #94a3b8;
        font-weight: 400;
    }

    .bonus-text {
        display: block;
        font-size: 12px;
        color: #3b82f6;
        font-weight: 400;
        margin-top: 4px;
    }

    .quota-text {
        display: block;
        font-size: 12px;
        color: #94a3b8;
        font-weight: 400;
        margin-top: 4px;
    }

    /* Action Buttons */
    .detail-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .btn-edit {
        padding: 12px 24px;
        background: #1e40af;
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        transition: all 0.3s;
        font-family: 'Lexend', sans-serif;
        white-space: nowrap;
    }

    .btn-edit:hover {
        background: #1e3a8a;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
    }

    .btn-delete {
        padding: 12px 24px;
        background: white;
        color: #dc2626;
        border: 1px solid #fecaca;
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.3s;
        font-family: 'Lexend', sans-serif;
        width: 100%;
    }

    .btn-delete:hover {
        background: #fef2f2;
    }

    /* Participants Section */
    .participants-section {
        background: #e7ddcd;
        border-radius: 48px;
        padding: 32px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .participants-card {
        background: white;
        border-radius: 32px;
        border: 1px solid #93c5fd;
        padding: 32px;
    }

    .participants-header h2 {
        font-size: 20px;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .participants-header p {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 24px;
    }

    .participants-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .participant-card {
        background: #f7f5f0;
        border: 1px solid #dbeafe;
        border-radius: 24px;
        padding: 20px;
        font-size: 14px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    .participant-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .participant-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        color: #1e40af;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .participant-info p:first-child {
        font-size: 14px;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 2px;
    }

    .participant-info p:last-child {
        font-size: 12px;
        color: #64748b;
    }

    .participant-stats {
        display: flex;
        flex-direction: column;
        gap: 8px;
        font-size: 12px;
    }

    .stat-row {
        display: flex;
        justify-content: space-between;
        color: #64748b;
    }

    .stat-row dt {
        font-weight: 400;
    }

    .stat-row dd {
        font-weight: 600;
        color: #0f172a;
    }

    .empty-participants {
        text-align: center;
        padding: 48px 24px;
        border: 2px dashed #93c5fd;
        border-radius: 24px;
        background: #dbeafe;
        color: #1e40af;
        font-size: 14px;
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

    /* Responsive */
    @media (max-width: 1200px) {
        .participants-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 1024px) {
        .detail-layout {
            flex-direction: column;
        }

        .detail-actions {
            flex-direction: row;
        }

        .detail-grid {
            grid-template-columns: 1fr;
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

        .participants-grid {
            grid-template-columns: 1fr;
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

        .detail-section,
        .participants-section {
            padding: 20px;
            border-radius: 32px;
        }

        .detail-card,
        .participants-card {
            padding: 20px;
            border-radius: 24px;
        }

        .detail-title {
            font-size: 24px;
        }

        .detail-actions {
            flex-direction: column;
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
                <h2>Detail Tantangan</h2>
                <p class="header-subtitle">Lihat ringkasan status tantangan dan peserta aktif.</p>
            </div>
            <div class="header-right">
                <div class="user-profile">
                    <div class="user-avatar">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                        <div class="user-email">{{ Auth::user()->email ?? 'admin@nolkarbon.com' }}</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="content">
            <div class="space-y-8">
                <!-- Challenge Detail -->
                <section class="detail-section">
                    <div class="detail-card">
                        <div class="detail-layout">
                            <div class="detail-info">
                                <p class="detail-label">Kelola Tantangan</p>
                                <h1 class="detail-title">{{ $challenge->title }}</h1>
                                <p class="detail-description">{{ $challenge->description }}</p>
                                
                                <dl class="detail-grid">
                                    <div class="detail-item">
                                        <dt>Status</dt>
                                        <dd>
                                            <span class="status-badge">{{ ucfirst($challenge->status) }}</span>
                                        </dd>
                                    </div>
                                    <div class="detail-item">
                                        <dt>Periode</dt>
                                        <dd>
                                            <span class="date-text">{{ optional($challenge->start_date)->translatedFormat('d M Y') ?? 'Fleksibel' }}</span>
                                            <span class="date-separator"> s/d </span>
                                            <span class="date-text">{{ optional($challenge->end_date)->translatedFormat('d M Y') ?? 'Berjalan' }}</span>
                                        </dd>
                                    </div>
                                    <div class="detail-item">
                                        <dt>Reward</dt>
                                        <dd>
                                            {{ $challenge->point_reward }} poin
                                            <span class="bonus-text">Bonus {{ $challenge->bonus_point }} poin</span>
                                        </dd>
                                    </div>
                                    <div class="detail-item">
                                        <dt>Peserta</dt>
                                        <dd>
                                            {{ $challenge->participants_count }} aktif
                                            <span class="quota-text">Kuota {{ $challenge->max_participants ?? 'Tidak dibatasi' }}</span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                            
                            <div class="detail-actions">
                                <a href="{{ route('admin.challenges.edit', $challenge) }}" class="btn-edit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit Tantangan
                                </a>
                                <form method="POST" action="{{ route('admin.challenges.destroy', $challenge) }}"
                                      onsubmit="return confirm('Hapus tantangan ini beserta data terkait?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        <i class="fa-solid fa-trash"></i> Hapus Tantangan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Participants Section -->
                <section class="participants-section">
                    <div class="participants-card">
                        <div class="participants-header">
                            <h2>Peserta Aktif</h2>
                            <p>Pantau progres dan poin peserta yang saat ini mengikuti tantangan.</p>
                        </div>
                        
                        <div class="participants-grid">
                            @forelse ($challenge->participants as $participant)
                                <article class="participant-card">
                                    <div class="participant-header">
                                        <span class="participant-avatar">
                                            {{ strtoupper(substr($participant->user?->name ?? 'P', 0, 2)) }}
                                        </span>
                                        <div class="participant-info">
                                            <p>{{ $participant->user?->name ?? 'Peserta' }}</p>
                                            <p>Status: {{ ucfirst($participant->status) }}</p>
                                        </div>
                                    </div>
                                    <dl class="participant-stats">
                                        <div class="stat-row">
                                            <dt>Poin</dt>
                                            <dd>{{ $participant->points_earned }}</dd>
                                        </div>
                                        <div class="stat-row">
                                            <dt>Progres</dt>
                                            <dd>{{ round($participant->progress_percentage) }}%</dd>
                                        </div>
                                        <div class="stat-row">
                                            <dt>Terakhir lapor</dt>
                                            <dd>{{ optional($participant->last_reported_at)->diffForHumans() ?? 'Belum ada' }}</dd>
                                        </div>
                                    </dl>
                                </article>
                            @empty
                                <div class="empty-participants">
                                    Belum ada peserta yang bergabung.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>NolKarbon@gmail.com</p>
        </footer>
    </main>
</body>
</html>