<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NolKarbon - Deleted Template</title>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
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

    .profile {
      display: flex;
      align-items: center;
      gap: 12px;
      background: white;
      padding: 8px 15px;
      border-radius: 50px;
      border: 2px solid #E0E0E0;
    }

    .profile img {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      border: 2px solid #001d5c;
    }

    .profile span {
      color: #001d5c;
      font-weight: 600;
      font-size: 14px;
    }

    /* ===== MAIN CONTENT (tidak diubah) ===== */
    .main {
      text-align: center;
      margin-top: 60px;
      opacity: 0.9;
    }

    h2 {
      font-size: 32px;
      font-weight: 800;
      color: #a49f97;
      margin-bottom: 40px;
    }

    .add-btn {
      display: inline-block;
      width: 420px;
      background: #cfcce1;
      color: #fff;
      text-align: center;
      border: none;
      border-radius: 30px;
      padding: 14px;
      font-weight: 700;
      font-size: 14px;
      cursor: not-allowed;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .template-list {
      margin-top: 28px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 18px;
    }

    .template {
      width: 420px;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
      padding: 16px 22px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      opacity: 0.7;
    }

    .template-name {
      color: #bcb8b3;
      font-weight: 700;
    }

    .btn-group {
      display: flex;
      gap: 12px;
    }

    .btn {
      border: none;
      border-radius: 22px;
      padding: 8px 22px;
      font-weight: 700;
      color: #fff;
      background: #cfcce1;
      cursor: not-allowed;
    }

    /* Popup */
    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      border: 5px solid #001d5c;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      width: 320px;
      padding: 40px 20px;
      text-align: center;
      z-index: 1000;
    }

    .popup .icon {
      font-size: 60px;
      color: #b00000;
      margin-bottom: 20px;
    }

    .popup h3 {
      font-weight: 800;
      font-size: 22px;
      color: #000;
    }

    .close-btn {
      position: absolute;
      top: 14px;
      right: 18px;
      background: none;
      border: none;
      font-size: 20px;
      font-weight: 700;
      cursor: pointer;
      color: #000;
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
      .sidebar { width: 80px; }
      .main-content { margin-left: 80px; }
      .nav-item span { display: none; }
      .logo-sidebar img { width: 50px; }
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
      <a href="{{ route('admin.dashboardadmin') }}" class="nav-item">🏠 <span>Dashboard</span></a>
      <a href="{{ route('admin.usermanagement') }}" class="nav-item">👥 <span>User Management</span></a>
      <a href="#" class="nav-item">🏘️ <span>Communities</span></a>
      <a href="{{ route('admin.reviewdraft') }}" class="nav-item">📄 <span>Review Draft</span></a>
      <a href="{{ route('admin.challenge.index') }}" class="nav-item">🎮 <span>Challenges</span></a>
      <a href="{{ route('admin.reports.index') }}" class="nav-item">📊 <span>Reports</span></a>
      <a href="{{ route('admin.emission-card') }}" class="nav-item active">💳 <span>Emission Card</span></a>
    </nav>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">⏎ Logout</button>
    </form>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <header class="header">
      <div class="header-left">
        <h2>Emission Card Deleted</h2>
      </div>
      <div class="profile">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username ?? 'Admin') }}" alt="Profile">
        <span>{{ Auth::user()->email ?? 'admin@example.com' }}</span>
      </div>
    </header>

    <!-- === MAIN CONTENT TIDAK DIUBAH === -->
    <div class="main">
      <h2>Emission Card’s Templates</h2>
      <button class="add-btn" disabled>Make a new template</button>

      <div class="template-list">
        <div class="template">
          <div class="template-name">Template 1</div>
          <div class="btn-group">
            <button class="btn" disabled>Edit</button>
            <button class="btn" disabled>Delete</button>
          </div>
        </div>
        <div class="template">
          <div class="template-name">Template 2</div>
          <div class="btn-group">
            <button class="btn" disabled>Edit</button>
            <button class="btn" disabled>Delete</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Popup -->
    <div class="popup">
      <button class="close-btn" onclick="window.location.href='{{ route('admin.emission-card') }}'">×</button>
      <div class="icon">🗑️</div>
      <h3>Deleted</h3>
    </div>

    <footer>
      <img src="/images/logo.png" alt="NolKarbon Logo">
      <p>NolKarbon@gmail.com</p>
    </footer>
  </main>
</body>
</html>
