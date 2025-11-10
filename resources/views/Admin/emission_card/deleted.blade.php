<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Deleted – NOL KARBON</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --navy:#001A72;
    --light:#e7dfd3;
    --white:#fff;
    --disabled:#cfcce1;
    --shadow:0 6px 16px rgba(0,0,0,0.1);
    --red:#b00000;
  }

  *{box-sizing:border-box;font-family:Poppins;margin:0;padding:0}
  body{display:flex;flex-direction:column;min-height:100vh;background:var(--light);}

  /* Sidebar */
  .sidebar {
    width:220px;
    background:var(--navy);
    color:#fff;
    padding:28px 18px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    position:fixed;
    top:0;
    bottom:0;
  }

  .sidebar img.logo {width:120px;margin-bottom:40px;}
  .menu a {
    display:flex;align-items:center;gap:10px;
    color:#fff;text-decoration:none;
    font-weight:600;margin:10px 0;padding:10px 8px;border-radius:10px;
    transition:background .2s;
  }
  .menu a.active, .menu a:hover {background:#3342a5;}
  .logout {
    background:#b9c9e8;color:#000;padding:10px 14px;
    border-radius:12px;text-align:center;font-weight:600;
  }

  /* Content */
  .content {
    margin-left:240px;
    padding:20px 40px;
    text-align:center;
  }

  .header {
    display:flex;justify-content:space-between;align-items:center;
    background:var(--white);
    padding:12px 24px;
    border-radius:10px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
    margin-bottom:30px;
  }

  .profile {display:flex;align-items:center;gap:12px;font-weight:600;}
  .profile img {width:38px;height:38px;border-radius:50%;border:2px solid var(--navy);}

  /* Disabled Background */
  .main {
    text-align:center;
    margin-top:60px;
    opacity:0.9;
  }

  h2 {
    font-size:32px;
    font-weight:800;
    color:#a49f97;
    margin-bottom:40px;
  }

  .add-btn {
    display:inline-block;
    width:420px;
    background:var(--disabled);
    color:#fff;
    text-align:center;
    border:none;
    border-radius:30px;
    padding:14px;
    font-weight:700;
    font-size:14px;
    cursor:not-allowed;
    box-shadow:var(--shadow);
  }

  .template-list {
    margin-top:28px;
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:18px;
  }

  .template {
    width:420px;
    background:var(--white);
    border-radius:18px;
    box-shadow:var(--shadow);
    padding:16px 22px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    opacity:0.7;
  }

  .template-name {
    color:#bcb8b3;
    font-weight:700;
  }

  .btn-group {
    display:flex;
    gap:12px;
  }

  .btn {
    border:none;
    border-radius:22px;
    padding:8px 22px;
    font-weight:700;
    color:#fff;
    background:var(--disabled);
    cursor:not-allowed;
  }

  /* Popup */
  .popup {
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    background:var(--white);
    border:5px solid var(--navy);
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    width:320px;
    padding:40px 20px;
    text-align:center;
    z-index:1000;
  }

  .popup .icon {
    font-size:60px;
    color:var(--red);
    margin-bottom:20px;
  }

  .popup h3 {
    font-weight:800;
    font-size:22px;
    color:#000;
  }

  .close-btn {
    position:absolute;
    top:14px;
    right:18px;
    background:none;
    border:none;
    font-size:20px;
    font-weight:700;
    cursor:pointer;
    color:#000;
  }

  /* Footer */
  footer {
    background:var(--navy);
    color:#fff;
    padding:30px;
    text-align:center;
    margin-top:auto;
  }
</style>
</head>
<body>
  <div class="sidebar">
    <div>
      <img src="/images/nolkarbon-logo.png" alt="Logo" class="logo">
      <div class="menu">
        <a href="#">🏠 Dashboard</a>
        <a href="#">👥 User Management</a>
        <a href="#">🏘️ Communities</a>
        <a href="#">📄 Review Draft</a>
        <a href="#">🎮 Challenges</a>
        <a href="#">📊 Reports</a>
        <a href="{{ route('admin.emission-card') }}" class="active">💳 Emission Card</a>
      </div>
    </div>
    <div class="logout">⏎ Logout</div>
  </div>

  <div class="content">
    <div class="header">
      <div><strong>Hai, {{ Auth::user()->username ?? 'Admin' }}</strong></div>
      <div class="profile">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username ?? 'Admin') }}" alt="Profile">
        <span>{{ Auth::user()->email ?? 'admin@example.com' }}</span>
      </div>
    </div>

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

    <!-- POPUP -->
    <div class="popup">
      <button class="close-btn" onclick="window.location.href='{{ route('admin.emission-card.disabled') }}'">×</button>
      <div class="icon">🗑️</div>
      <h3>Deleted</h3>
    </div>
  </div>

  <footer>
    <img src="/images/nolkarbon-logo.png" alt="Logo" style="height:36px;vertical-align:middle;margin-right:10px;">
    <span>Contact Us</span>
  </footer>
</body>
</html>
