<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - User Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lexend', sans-serif;
            display: flex;
            min-height: 100vh;
            background: #EEE8DF;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: #000862;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 30px 0;
            height: 100vh;
            overflow-y: auto; /* ikut scroll tapi gak kepotong */
            position: relative;
        }

        .logo-sidebar {
            padding: 0 20px 30px;
            text-align: center;
        }

        .logo-sidebar img {
            width: 140px;
        }

        .nav-menu {
            flex: 1;
            padding: 0 15px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            margin-bottom: 10px;
            border-radius: 15px;
            text-decoration: none;
            color: white;
            transition: 0.3s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .nav-item.active {
            background: #C5CAE9;
            color: #000862;
        }

        .logout-btn {
            margin: 20px 15px;
            padding: 12px 20px;
            background: white;
            color: #000862;
            border: none;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-weight: 600;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .header h2 {
            color: #000862;
            font-weight: 700;
            font-size: 26px;
        }

        .content {
            padding: 40px;
            flex: 1;
        }

        /* Stats grid (4 card tetap) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            position: relative;
        }

        .stat-value {
            font-size: 40px;
            font-weight: 700;
            color: #000862;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 16px;
            color: #666;
        }

        footer {
            background: #000862;
            color: white;
            padding: 25px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #F3F3F3;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .status-active { color: #4CAF50; font-weight: 600; }
        .status-inactive { color: #FFA726; font-weight: 600; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo-sidebar">
            <img src="/images/logo.png" alt="Logo">
        </div>

        <nav class="nav-menu">
            <a href="{{ route('admin.dashboardadmin') }}" class="nav-item">Dashboard</a>
            <a href="{{ route('admin.usermanagement') }}" class="nav-item active">User Management</a>
            <a href="#" class="nav-item">Review Draft</a>
            <a href="#" class="nav-item">Challenges</a>
            <a href="#" class="nav-item">Reports</a>
            <a href="#" class="nav-item">Emission Card</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </aside>

    <main class="main-content">
        <header class="header">
            <h2>User Management</h2>
            <div class="user-info">
                <strong>{{ Auth::user()->name ?? 'Admin' }}</strong><br>
                <small>{{ Auth::user()->email ?? 'admin@nolkarbon.com' }}</small>
            </div>
        </header>

        <div class="content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">{{ $stats['total_users'] }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $stats['community_admins'] }}</div>
                    <div class="stat-label">Community Admins</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $stats['active_users'] }}</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $stats['inactive_users'] }}</div>
                    <div class="stat-label">Inactive Users</div>
                </div>
            </div>

            <div class="user-data-section">
                <h3 style="color:#000862;margin-bottom:15px;">User Data</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>University</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Join Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->university ?? '-' }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="{{ strtolower($user->status) == 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ ucfirst($user->status) }}
                            </td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <footer>
            <img src="/images/logo.png" alt="Logo" width="130">
            <p>Contact Us</p>
        </footer>
    </main>
</body>
</html>
