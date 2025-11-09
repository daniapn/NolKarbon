<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NolKarbon - Admin')</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Lexend', sans-serif;
            display: flex;
            min-height: 100vh;
            background: #EEE8DF;
            color: #001d5c;
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
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .logo-sidebar img {
            width: 140px;
            height: auto;
        }
        .brand-text {
            margin-top: 15px;
            font-size: 13px;
            letter-spacing: 0.3em;
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
            text-decoration: none;
            color: inherit;
            transition: all 0.3s;
        }
        .nav-item i {
            width: 24px;
            text-align: center;
        }
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        .nav-item.active {
            background: #C5CAE9;
            color: #001d5c;
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
        .logout-btn:hover { background: #f0f0f0; }
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
        .header-left h2 { font-size: 28px; font-weight: 600; }
        .header-right { display: flex; align-items: center; gap: 15px; }
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
            font-weight: 600;
        }
        .user-name { font-weight: 600; font-size: 14px; }
        .user-email { font-size: 12px; color: #666; }
        .content { padding: 40px; flex: 1; overflow-y: auto; }
        .status-alert {
            margin-bottom: 20px;
            padding: 12px 20px;
            border-radius: 50px;
            border: 1px solid #c8e6c9;
            background: #e8f5e9;
            color: #2e7d32;
            text-align: center;
            font-size: 14px;
        }
        footer {
            background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
            padding: 30px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            margin-top: auto;
        }
        footer img { width: 150px; height: auto; }
        @media (max-width: 968px) {
            .sidebar { width: 80px; }
            .main-content { margin-left: 80px; }
            .nav-item span { display: none; }
            .logo-sidebar img { width: 50px; }
        }
    </style>
</head>
<body>
@php
    $navLinks = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'pattern' => 'admin.dashboard', 'icon' => 'fa-solid fa-grip'],
        ['label' => 'User Management', 'route' => 'admin.usermanagement', 'pattern' => 'admin.usermanagement', 'icon' => 'fa-solid fa-user-group'],
        ['label' => 'Content', 'route' => null, 'url' => '#', 'pattern' => 'admin.content.', 'icon' => 'fa-solid fa-file-lines'],
        ['label' => 'Challenges', 'route' => 'admin.challenges.index', 'pattern' => 'admin.challenges.', 'icon' => 'fa-solid fa-bullseye'],
        ['label' => 'Reports', 'route' => 'admin.reports.index', 'pattern' => 'admin.reports', 'icon' => 'fa-solid fa-chart-line'],
        ['label' => 'Emission Card', 'route' => null, 'url' => '#', 'pattern' => 'admin.emission-cards.', 'icon' => 'fa-solid fa-id-card'],
    ];
@endphp

<aside class="sidebar">
    <div class="logo-sidebar">
        <img src="{{ asset('images/logo.png') }}" alt="NolKarbon Logo" onerror="this.style.display='none'">
    </div>
    <nav class="nav-menu">
        @foreach ($navLinks as $link)
            @php
                $current = Route::currentRouteName() ?? '';
                $pattern = $link['pattern'] ?? ($link['route'] ?? '');
                $isActive = false;

                if ($link['route']) {
                    $isActive = $current === $link['route'] || ($pattern && str_starts_with($current, $pattern));
                } elseif ($pattern) {
                    $isActive = str_starts_with($current, $pattern);
                }

                $href = $link['route'] ? route($link['route']) : ($link['url'] ?? '#');
            @endphp
            <a href="{{ $href }}" class="nav-item {{ $isActive ? 'active' : '' }}">
                <i class="{{ $link['icon'] }}"></i>
                <span>{{ $link['label'] }}</span>
            </a>
        @endforeach
    </nav>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
            <span>Logout</span>
        </button>
    </form>
</aside>

<main class="main-content">
    <header class="header">
        <div class="header-left">
            <h2>@yield('page-title', 'User Management')</h2>
            @hasSection('page-subtitle')
                <p class="mt-2 text-sm text-slate-500">@yield('page-subtitle')</p>
            @endif
        </div>
        <div class="header-right">
            <div class="user-profile">
                <div class="user-avatar">
                    {{ \Illuminate\Support\Str::of(Auth::user()->name ?? 'NK')->squish()->substr(0, 2)->upper() }}
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name ?? 'Miguel Alexandro' }}</div>
                    <div class="user-email">{{ Auth::user()->email ?? 'miguel@nolkarbon.id' }}</div>
                </div>
            </div>
        </div>
    </header>

    <div class="content">
        @if (session('status'))
            <div class="status-alert">{{ session('status') }}</div>
        @endif
        @yield('content')
    </div>

    <footer>
        <img src="{{ asset('images/logo.png') }}" alt="NolKarbon Logo" onerror="this.style.display='none'">
        <p>Contact Us</p>
    </footer>
</main>
</body>
</html>
