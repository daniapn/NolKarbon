<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - User Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
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

        /* Sidebar - FIXED POSITION BIAR BISA SCROLL */
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
            overflow-y: auto; /* BIAR BISA SCROLL */
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

        /* Content */
        .content {
            padding: 40px;
            flex: 1;
        }

        /* Stats Grid - 2 KOLOM PER BARIS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 KOLOM */
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: #C5CAE9;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #001d5c;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
        }

        .stat-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #E3F2FD;
            color: #1976D2;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* User Data Section */
        .user-data-section {
            background: white;
            padding: 30px;
            border-radius: 20px;
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
        }

        .search-add-container {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .search-box {
            position: relative;
            width: 350px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 45px 12px 20px;
            border: 1px solid #E0E0E0;
            border-radius: 50px;
            font-size: 14px;
            font-family: 'Lexend', sans-serif;
        }

        .search-box svg {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #666;
        }

        .add-user-btn {
            padding: 12px 28px;
            background: #001d5c;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .add-user-btn:hover {
            background: #003399;
        }

        /* Table */
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .user-table thead {
            background: #F5F5F5;
        }

        .user-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #001d5c;
            font-size: 14px;
        }

        .user-table td {
            padding: 18px 15px;
            border-bottom: 1px solid #E0E0E0;
            font-size: 14px;
        }

        .user-table tbody tr:hover {
            background: #F9F9F9;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-cell-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #E0E0E0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-cell-info {
            display: flex;
            flex-direction: column;
        }

        .user-cell-name {
            font-weight: 600;
            color: #001d5c;
        }

        .user-cell-email {
            font-size: 12px;
            color: #666;
        }

        .university-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .role-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .role-user {
            background: #E3F2FD;
            color: #1976D2;
        }

        .role-admin {
            background: #F3E5F5;
            color: #7B1FA2;
        }

        .role-kontributor {
            background: #E8F5E9;
            color: #388E3C;
        }

        .status-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-active .status-dot {
            background: #4CAF50;
        }

        .status-inactive .status-dot {
            background: #FFA726;
        }

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
        }

        .action-icon:hover {
            background: #E0E0E0;
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
            .search-add-container {
                flex-direction: column;
                width: 100%;
            }
            .search-box {
                width: 100%;
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

            <a href="{{ route('admin.usermanagement') }}" class="nav-item active">
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

            <a href="#challenges" class="nav-item">
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
                <h2>User Management</h2>
            </div>
            <div class="header-right">
                <div class="user-profile">
                    <div class="user-avatar">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name ?? 'Miguel Alexandro' }}</div>
                        <div class="user-email">{{ Auth::user()->email ?? 'miguel@gmail.com' }}</div>
                    </div>
                </div>
            </div>
        </header>

<!-- Success/Error Messages -->
@if(session('success'))
<div style="background: #E8F5E9; color: #388E3C; padding: 15px 25px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #388E3C;">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div style="background: #FFEBEE; color: #D32F2F; padding: 15px 25px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #D32F2F;">
    {{ session('error') }}
</div>
@endif

        <!-- Content -->
        <div class="content">
           <!-- Stats Grid (2x2) - SESUAI DESAIN -->
<div class="stats-grid">
    <!-- Total Users -->
    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['total_users_growth'] >= 0 ? '#E3F2FD' : '#FFEBEE' }}; color: {{ $stats['total_users_growth'] >= 0 ? '#1976D2' : '#D32F2F' }}">
            {{ $stats['total_users_growth'] >= 0 ? '+' : '' }}{{ $stats['total_users_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#001d5c" viewBox="0 0 24 24">
                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
            </svg>
        </div>
        <div class="stat-value">{{ number_format($stats['total_users'], 0, ',', '.') }}</div>
        <div class="stat-label">Total Users</div>
    </div>

    <!-- Community Admins -->
    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['community_admins_growth'] >= 0 ? '#E3F2FD' : '#FFEBEE' }}; color: {{ $stats['community_admins_growth'] >= 0 ? '#1976D2' : '#D32F2F' }}">
            {{ $stats['community_admins_growth'] >= 0 ? '+' : '' }}{{ $stats['community_admins_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#001d5c" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['community_admins'] }}</div>
        <div class="stat-label">Community Admins</div>
    </div>

    <!-- Active Users -->
    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['active_users_growth'] >= 0 ? '#E3F2FD' : '#FFEBEE' }}; color: {{ $stats['active_users_growth'] >= 0 ? '#1976D2' : '#D32F2F' }}">
            {{ $stats['active_users_growth'] >= 0 ? '+' : '' }}{{ $stats['active_users_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#001d5c" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['active_users'] }}</div>
        <div class="stat-label">Active Users</div>
    </div>

    <!-- Inactive Users -->
    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['inactive_users_growth'] >= 0 ? '#FFEBEE' : '#E3F2FD' }}; color: {{ $stats['inactive_users_growth'] >= 0 ? '#D32F2F' : '#1976D2' }}">
            {{ $stats['inactive_users_growth'] >= 0 ? '+' : '' }}{{ $stats['inactive_users_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#001d5c" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 11c-.55 0-1-.45-1-1V8c0-.55.45-1 1-1s1 .45 1 1v4c0 .55-.45 1-1 1zm1 4h-2v-2h2v2z"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['inactive_users'] }}</div>
        <div class="stat-label">Inactive Users</div>
    </div>
</div>
            <!-- User Data Table -->
<div class="user-data-section">
    <div class="section-header">
        <h3>User Data</h3>
        <div class="search-add-container">
            <div class="search-box">
                <input type="text" placeholder="Search">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                </svg>
            </div>
            <a href="{{ route('admin.adduser') }}" class="add-user-btn">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
                Add User
            </a>
        </div>
    </div>

                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Universitas</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Join Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach($users as $user)
    <tr>
        <td>
            <div class="user-cell">
                <div class="user-cell-avatar">
                    <svg width="20" height="20" fill="#666" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="user-cell-info">
                    <span class="user-cell-name">{{ $user->username }}</span>
                    <span class="user-cell-email">{{ $user->email }}</span>
                </div>
            </div>
        </td>
        <td>
            <div class="university-cell">
                <svg width="18" height="18" fill="#666" viewBox="0 0 24 24">
                    <path d="M12 2L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 2zm6.82 6L12 12.72 5.18 8 12 3.28 18.82 8zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                </svg>
                {{ $user->universitas ?? '-' }}
            </div>
        </td>
        <td>
            <span class="role-badge role-{{ strtolower($user->role) }}">{{ $user->role }}</span>
        </td>
        <td>
            <div class="status-badge status-{{ strtolower($user->status) }}">
                <span class="status-dot"></span>
                {{ $user->status }}
            </div>
        </td>
        <td>{{ $user->join_date }}</td>
        <td>
            <div class="actions-cell">
                <!-- Edit -->
                <a href="{{ route('admin.updateuser', $user->idPengguna) }}" class="action-icon" title="Edit">
                    <svg width="18" height="18" fill="#666" viewBox="0 0 24 24">
                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                    </svg>
                </a>

                <!-- Delete -->
                <form method="POST" action="{{ route('admin.deleteuser', $user->idPengguna) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-icon" style="background:none;border:none;cursor:pointer;" title="Delete">
                        <svg width="18" height="18" fill="#E53935" viewBox="0 0 24 24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
                </table>
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