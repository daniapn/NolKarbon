<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Template – NOL KARBON</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --navy:#001A72;
    --light:#e7dfd3;
    --white:#fff;
  }

  *{box-sizing:border-box;font-family:Poppins;margin:0;padding:0}
  body{display:flex;flex-direction:column;min-height:100vh;background:var(--light);}

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

  .content {
    margin-left:240px;
    padding:20px 40px;
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

  .form-card {
    background:var(--white);
    border-radius:18px;
    padding:36px 32px;
    box-shadow:0 6px 16px rgba(0,0,0,0.1);
    max-width:500px;
    margin:40px auto;
  }

  h2 {
    text-align:center;
    font-size:28px;
    font-weight:800;
    margin-bottom:20px;
  }

  label {
    display:block;
    font-weight:600;
    margin-bottom:8px;
  }

  input[type="text"] {
    width:100%;
    padding:12px 16px;
    border-radius:12px;
    border:2px solid #ddd;
    font-size:15px;
    outline:none;
    transition:all 0.2s;
  }
  input[type="text"]:focus {
    border-color:var(--navy);
  }

  .btn {
    display:inline-block;
    background:var(--navy);
    color:#fff;
    border:none;
    border-radius:24px;
    padding:12px 30px;
    font-weight:700;
    margin-top:20px;
    cursor:pointer;
    box-shadow:0 6px 14px rgba(0,0,0,0.15);
  }

  .btn-back {
    display:inline-block;
    background:#ccc;
    color:#000;
    border:none;
    border-radius:24px;
    padding:12px 30px;
    font-weight:600;
    margin-top:20px;
    text-decoration:none;
  }

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
  </div>

  <footer>
    <img src="/images/nolkarbon-logo.png" alt="Logo" style="height:36px;vertical-align:middle;margin-right:10px;">
    <span>Contact Us</span>
  </footer>
</body>
</html>
