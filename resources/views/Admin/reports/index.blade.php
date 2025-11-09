<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - Management Reports</title>
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
            display: flex;
            min-height: 100vh;
            background: #EEE8DF;
        }

        /* Sidebar - FIXED POSITION */
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
        }

        /* Header */
        .header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .header-left h2 {
            font-size: 28px;
            color: #001d5c;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .header-left p {
            font-size: 14px;
            color: #666;
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
            padding: 40px;
            flex: 1;
        }

        /* Section Styling */
        .report-section {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 24px;
            color: #001d5c;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .section-subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* Table Container */
        .table-container {
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #E0E0E0;
            margin-top: 20px;
        }

        /* Table Styling */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead {
            background: #001d5c;
        }

        .data-table thead th {
            padding: 15px 20px;
            text-align: left;
            font-weight: 600;
            color: white;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .data-table tbody tr {
            border-bottom: 1px solid #E0E0E0;
            transition: background 0.2s;
        }

        .data-table tbody tr:hover {
            background: #F9F9F9;
        }

        .data-table tbody td {
            padding: 18px 20px;
            font-size: 14px;
            color: #333;
        }

        .data-table tbody td:first-child {
            font-weight: 600;
            color: #001d5c;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            color: #1976D2;
            padding: 30px;
            font-size: 14px;
        }

        /* Status Badge */
        .status-badge {
            background: #E3F2FD;
            color: #1976D2;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* Button Styling */
        .btn-primary {
            background: #001d5c;
            padding: 12px 28px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #003399;
        }

        /* Pagination Info */
        .pagination-info {
            color: #999;
            font-size: 13px;
            margin-top: 20px;
        }

        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Custom Pagination Styling */
        .custom-pagination {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #F8F9FA;
            padding: 12px 20px;
            border-radius: 50px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .pagination-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: white;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
            font-weight: 600;
        }

        .pagination-btn:hover:not(:disabled) {
            background: #E3F2FD;
            color: #1976D2;
        }

        .pagination-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagination-btn.active {
            background: #1976D2;
            color: white;
            box-shadow: 0 2px 6px rgba(25, 118, 210, 0.3);
        }

        .pagination-arrow {
            width: 36px;
            height: 36px;
        }

        .action-container {
            margin-top: 25px;
            text-align: right;
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
        }

        /* Responsive Design */
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
            .content {
                padding: 20px;
            }
            .report-section {
                padding: 20px;
            }
            .header {
                padding: 20px;
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

            <a href="#draft" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                </svg>
                <span>Review Draft</span>
            </a>

            <a href="#challenges" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H3V8h18v8zM6 15h2v-2H6v2zm0-3h2v-2H6v2zm3 3h8v-2H9v2zm0-3h8v-2H9v2z"/>
                </svg>
                <span>Challenges</span>
            </a>

            <a href="#reports" class="nav-item active">
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
                <h2>Management Reports</h2>
                <p>Eksplorasi data emisi dan partisipasi challenge seluruh komunitas.</p>
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
            {{-- ====== SECTION 1: EMISSION INSIGHTS ====== --}}
            <section class="report-section">
                <h2 class="section-title">Explore Emission Insights</h2>
                <p class="section-subtitle">Rangkuman kontribusi reduksi CO₂ per universitas/komunitas.</p>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>University</th>
                                <th>Emissions Total</th>
                                <th>Average monthly emissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($communityEmissions as $row)
                                <tr>
                                    <td>{{ $row['name'] ?? '-' }}</td>
                                    <td>{{ $row['total_emission'] ?? '0' }}</td>
                                    <td>{{ $row['average_monthly'] ?? '0' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty-state">Belum ada data emisi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 20px; display: flex; justify-content: flex-end;">
                    <div class="custom-pagination">
                        <button class="pagination-btn pagination-arrow" {{ $communityEmissions->onFirstPage() ? 'disabled' : '' }} onclick="window.location='{{ $communityEmissions->previousPageUrl() }}'">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                            </svg>
                        </button>
                        
                        @foreach(range(1, $communityEmissions->lastPage()) as $page)
                            @if($page == $communityEmissions->currentPage())
                                <button class="pagination-btn active">{{ $page }}</button>
                            @elseif($page == 1 || $page == $communityEmissions->lastPage() || abs($page - $communityEmissions->currentPage()) <= 1)
                                <button class="pagination-btn" onclick="window.location='{{ $communityEmissions->url($page) }}'">{{ $page }}</button>
                            @elseif(abs($page - $communityEmissions->currentPage()) == 2)
                                <span style="color: #999;">...</span>
                            @endif
                        @endforeach
                        
                        <button class="pagination-btn pagination-arrow" {{ !$communityEmissions->hasMorePages() ? 'disabled' : '' }} onclick="window.location='{{ $communityEmissions->nextPageUrl() }}'">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </section>

            {{-- ====== SECTION 2: CHALLENGE PARTICIPATION ====== --}}
            <section class="report-section">
                <h2 class="section-title">Challenge Participation</h2>
                <p class="section-subtitle">Pantau peserta paling aktif dan status challenge mereka.</p>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Peserta</th>
                                <th>Nama Challenge</th>
                                <th>Point</th>
                                <th style="text-align: right;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($challengeParticipation as $row)
                                <tr>
                                    <td>{{ $row['user'] ?? '-' }}</td>
                                    <td>{{ $row['challenge'] ?? '-' }}</td>
                                    <td><strong>{{ $row['points'] ?? 0 }} poin</strong></td>
                                    <td style="text-align: right;">
                                        <span class="status-badge">
                                            <i class="fa-solid fa-circle-notch"></i> {{ $row['status'] ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-state">Belum ada peserta yang tercatat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    <div class="pagination-info">
                        Menampilkan {{ $challengeParticipation->firstItem() ?? 0 }}–{{ $challengeParticipation->lastItem() ?? 0 }} dari {{ $challengeParticipation->total() ?? 0 }} peserta
                    </div>
                    
                    <div class="custom-pagination">
                        <button class="pagination-btn pagination-arrow" {{ $challengeParticipation->onFirstPage() ? 'disabled' : '' }} onclick="window.location='{{ $challengeParticipation->previousPageUrl() }}'">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                            </svg>
                        </button>
                        
                        @foreach(range(1, $challengeParticipation->lastPage()) as $page)
                            @if($page == $challengeParticipation->currentPage())
                                <button class="pagination-btn active">{{ $page }}</button>
                            @elseif($page == 1 || $page == $challengeParticipation->lastPage() || abs($page - $challengeParticipation->currentPage()) <= 1)
                                <button class="pagination-btn" onclick="window.location='{{ $challengeParticipation->url($page) }}'">{{ $page }}</button>
                            @elseif(abs($page - $challengeParticipation->currentPage()) == 2)
                                <span style="color: #999;">...</span>
                            @endif
                        @endforeach
                        
                        <button class="pagination-btn pagination-arrow" {{ !$challengeParticipation->hasMorePages() ? 'disabled' : '' }} onclick="window.location='{{ $challengeParticipation->nextPageUrl() }}'">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="action-container">
                    <a href="{{ route('admin.reports.activities') }}" class="btn-primary">
                        User Activity
                    </a>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>Contact Us</p>
        </footer>
    </main>
</body>
</html>