<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NolKarbon - Edit Template</title>
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

    /* === MAIN CONTENT (form edit, tidak diubah) === */
    .form-card {
      background: #fff;
      border-radius: 18px;
      padding: 36px 32px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      margin: 60px auto;
    }

    h2 {
      text-align: center;
      font-size: 28px;
      font-weight: 800;
      margin-bottom: 20px;
      color: #001d5c;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
      color: #001d5c;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px 16px;
      border-radius: 12px;
      border: 2px solid #ddd;
      font-size: 15px;
      outline: none;
      transition: all 0.2s;
    }

    input[type="text"]:focus {
      border-color: #001d5c;
    }

    .btn {
      display: inline-block;
      background: #001d5c;
      color: #fff;
      border: none;
      border-radius: 24px;
      padding: 12px 30px;
      font-weight: 700;
      margin-top: 20px;
      cursor: pointer;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
      transition: all 0.3s;
    }

    .btn:hover {
      background: #003399;
    }

    .btn-back {
      display: inline-block;
      background: #ccc;
      color: #000;
      border: none;
      border-radius: 24px;
      padding: 12px 30px;
      font-weight: 600;
      margin-top: 20px;
      text-decoration: none;
      transition: all 0.3s;
    }

    .btn-back:hover {
      background: #bbb;
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
        <h2>Edit Template</h2>
      </div>
      <div class="profile">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username ?? 'Admin') }}" alt="Profile">
        <span>{{ Auth::user()->email ?? 'admin@example.com' }}</span>
      </div>
    </header>

    <!-- === MAIN FORM (tidak diubah) === -->
    <div class="form-card">
      <h2>Edit Template</h2>
      <form action="{{ route('admin.emission-card.update', $template->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Template Name</label>
        <input type="text" id="name" name="name" value="{{ $template->name }}" required>


        <div style="text-align:center;">
          <button type="submit" class="btn">Save Changes</button>
          <a href="{{ route('admin.emission-card') }}" class="btn-back">Cancel</a>
        </div>
      </form>
    </div>

    <footer>
      <img src="/images/logo.png" alt="NolKarbon Logo">
      <p>NolKarbon@gmail.com</p>
    </footer>
  </main>
</body>
</html>
