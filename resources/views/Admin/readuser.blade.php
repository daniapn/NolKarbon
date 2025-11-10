<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - User Detail</title>
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

        .main-content {
            margin-left: 230px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

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

        .content {
            padding: 40px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .user-detail-card {
            background: white;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            width: 100%;
            max-width: 500px;
            text-align: center;
            position: relative;
        }

        .user-detail-avatar {
            width: 100px;
            height: 100px;
            border-radius: 20px;
            background: #001d5c;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .user-detail-avatar svg {
            width: 50px;
            height: 50px;
            color: white;
        }

        .user-detail-name {
            font-size: 28px;
            font-weight: 700;
            color: #001d5c;
            margin-bottom: 8px;
        }

        .user-detail-email {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            padding: 18px 25px;
            background: #F9F9F9;
            border-radius: 15px;
            margin-bottom: 15px;
            text-align: left;
        }

        .detail-row svg {
            width: 24px;
            height: 24px;
            color: #001d5c;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .detail-content {
            flex: 1;
        }

        .detail-label {
            font-size: 12px;
            color: #999;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 16px;
            font-weight: 600;
            color: #001d5c;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        .stat-box {
            background: #F5F5F5;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #001d5c;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
        }

        .close-btn {
            margin-top: 30px;
            padding: 14px 40px;
            background: #001d5c;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Lexend', sans-serif;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .close-btn:hover {
            background: #003399;
        }

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

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            .main-content {
                margin-left: 80px;
            }
            .nav-item span {
                display: none;
            }
            .user-detail-card {
                padding: 25px;
            }
            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
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

    <main class="main-content">
        <header class="header">
            <div class="header-left">
                <h2>User Management</h2>
            </div>
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
        </header>

        <div class="content">
            <div class="user-detail-card">
                <div class="user-detail-avatar">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>

                <div class="user-detail-name">{{ $user->username }}</div>
                <div class="user-detail-email">{{ $user->email }}</div>

                <div class="detail-row">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 2zm6.82 6L12 12.72 5.18 8 12 3.28 18.82 8zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                    </svg>
                    <div class="detail-content">
                        <div class="detail-label">University</div>
                        <div class="detail-value">{{ $user->universitas ?? '-' }}</div>
                    </div>
                </div>

                <div class="detail-row">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                    </svg>
                    <div class="detail-content">
                        <div class="detail-label">Role</div>
                        <div class="detail-value">{{ $user->role }}</div>
                    </div>
                </div>

                <div class="detail-row">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <div class="detail-content">
                        <div class="detail-label">Status</div>
                        <div class="detail-value">{{ $user->status }}</div>
                    </div>
                </div>

                <div class="stats-row">
                    <div class="stat-box">
                        <div class="stat-number">{{ $user->points ?? 1250 }}</div>
                        <div class="stat-label">Points</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">{{ $user->badges ?? 5 }}</div>
                        <div class="stat-label">Badges</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">{{ $user->co2_saved ?? 45 }} kg</div>
                        <div class="stat-label">CO2 Saved</div>
                    </div>
                </div>

                <a href="{{ route('admin.usermanagement') }}" class="close-btn">Close</a>
            </div>
        </div>

        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>NolKarbon@gmail.com</p>
        </footer>
    </main>
</body>
</html>