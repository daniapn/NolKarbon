<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        /* Sidebar */
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
            color: #000862;
        }

        .nav-item svg {
            width: 24px;
            height: 24px;
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

        .header-left h1 {
            font-size: 28px;
            color: #000862;
            font-weight: 600;
        }

        .header-left p {
            font-size: 32px;
            color: #000862;
            font-weight: 700;
            margin-top: 5px;
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
            background: #000862;
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
            color: #000862;
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

        /* Stats Grid - 2x2 */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
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
            color: #000862;
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

        /* Card & Draft Section */
        .card-draft-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
        }

        .section-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .section-card h3 {
            font-size: 22px;
            color: #000862;
            margin-bottom: 20px;
        }

        .card-users {
            text-align: center;
            padding: 40px 20px;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            background: #C5CAE9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .card-users h2 {
            font-size: 36px;
            color: #000862;
            margin-bottom: 10px;
        }

        .card-users p {
            color: #666;
            font-size: 14px;
        }

        .draft-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-bottom: 1px solid #E0E0E0;
        }

        .draft-item:last-child {
            border-bottom: none;
        }

        .draft-icon {
            width: 40px;
            height: 40px;
            background: #E3F2FD;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .draft-info h4 {
            color: #000862;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .draft-info p {
            color: #666;
            font-size: 14px;
        }

        /* Emissions Statistics */
        .emissions-section {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .emissions-section h3 {
            font-size: 22px;
            color: #000862;
            margin-bottom: 20px;
        }

        .chart-container {
            position: relative;
            height: 400px;
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
            .card-draft-grid {
                grid-template-columns: 1fr;
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
            <a href="{{ route('admin.dashboardadmin') }}" class="nav-item active">
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
                <h1>Hai,</h1>
                <p>{{ Auth::user()->name ?? 'Miguel' }}</p>
            </div>
            <div class="user-profile">
                <div class="user-avatar">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name ?? 'Miguel Alexandro' }}</div>
                    <div class="user-email">{{ Auth::user()->email ?? 'miguel@nol.com' }}</div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="content">
            <!-- Stats Grid (2x2) -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['total_users_growth'] >= 0 ? '#E3F2FD' : '#FFEBEE' }}; color: {{ $stats['total_users_growth'] >= 0 ? '#1976D2' : '#D32F2F' }}">
            {{ $stats['total_users_growth'] >= 0 ? '+' : '' }}{{ $stats['total_users_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#000862" viewBox="0 0 24 24">
                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
            </svg>
        </div>
        <div class="stat-value">{{ number_format($stats['total_users'], 0, ',', '.') }}</div>
        <div class="stat-label">Total Users</div>
    </div>

    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['co2_growth'] >= 0 ? '#E3F2FD' : '#FFEBEE' }}; color: {{ $stats['co2_growth'] >= 0 ? '#1976D2' : '#D32F2F' }}">
            {{ $stats['co2_growth'] >= 0 ? '+' : '' }}{{ $stats['co2_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#000862" viewBox="0 0 24 24">
                <path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['co2_reduced'] }}</div>
        <div class="stat-label">CO2 Reduced</div>
    </div>

    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['community_growth'] >= 0 ? '#E3F2FD' : '#FFEBEE' }}; color: {{ $stats['community_growth'] >= 0 ? '#1976D2' : '#D32F2F' }}">
            {{ $stats['community_growth'] >= 0 ? '+' : '' }}{{ $stats['community_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#000862" viewBox="0 0 24 24">
                <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['communities'] }}</div>
        <div class="stat-label">Active Communities</div>
    </div>

    <div class="stat-card">
        <div class="stat-badge" style="background: {{ $stats['challenge_growth'] >= 0 ? '#E3F2FD' : '#FFEBEE' }}; color: {{ $stats['challenge_growth'] >= 0 ? '#1976D2' : '#D32F2F' }}">
            {{ $stats['challenge_growth'] >= 0 ? '+' : '' }}{{ $stats['challenge_growth'] }}%
        </div>
        <div class="stat-icon">
            <svg width="28" height="28" fill="#000862" viewBox="0 0 24 24">
                <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H3V8h18v8z"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['challenges'] }}</div>
        <div class="stat-label">Active Challenges</div>
    </div>
</div>

            <!-- Card & Draft Section -->
            <div class="card-draft-grid">
                <!-- Card Section -->
                <div class="section-card">
                    <h3>Card</h3>
                    <div class="card-users">
                        <div class="card-icon">
                            <svg width="40" height="40" fill="#000862" viewBox="0 0 24 24">
                                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                            </svg>
                        </div>
                        <h2>{{ $cardData['total_cards'] ?? 1250 }} Users</h2>
                        <p>Has Printed Their Own Emission Card</p>
                    </div>
                </div>

                <!-- Draft Section -->
                <div class="section-card">
                    <h3>Draft</h3>
                    <div class="draft-item">
                        <div class="draft-icon" style="background: #E3F2FD;">
                            <svg width="24" height="24" fill="#1976D2" viewBox="0 0 24 24">
                                <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6z"/>
                            </svg>
                        </div>
                        <div class="draft-info">
                            <h4>Submitted Draft</h4>
                            <p>{{ $cardData['submitted_drafts'] ?? 20 }}</p>
                        </div>
                    </div>

                    <div class="draft-item">
                        <div class="draft-icon" style="background: #FFF3E0;">
                            <svg width="24" height="24" fill="#F57C00" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                        </div>
                        <div class="draft-info">
                            <h4>Unreviewed Draft</h4>
                            <p>{{ $cardData['unreviewed_drafts'] ?? 25 }}</p>
                        </div>
                    </div>

                    <div class="draft-item">
                        <div class="draft-icon" style="background: #E8F5E9;">
                            <svg width="24" height="24" fill="#388E3C" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                        </div>
                        <div class="draft-info">
                            <h4>Approved Draft</h4>
                            <p>{{ $cardData['approved_drafts'] ?? 10 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emissions Statistics Chart -->
            <div class="emissions-section">
                <h3>Emissions Statistics</h3>
                <div class="chart-container">
                    <canvas id="emissionsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>NolKarbon@gmail.com</p>
        </footer>
    </main>

    <script>
        // Data dari backend
        const emissionData = @json($emissionStats ?? []);
        
        const months = emissionData.map(item => item.month);
        const emissions = emissionData.map(item => item.emission);
        const reductions = emissionData.map(item => item.reduction);

        // Create Chart
        const ctx = document.getElementById('emissionsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Emission',
                        data: emissions,
                        backgroundColor: '#7C4DFF',
                        borderRadius: 8
                    },
                    {
                        label: 'Reduction',
                        data: reductions,
                        backgroundColor: '#FF7A7A',
                        borderRadius: 8
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#E0E0E0'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>