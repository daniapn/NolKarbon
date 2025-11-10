<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Emission Card Templates</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --navy:#001A72;
    --light:#e7dfd3;
    --white:#fff;
    --grey:#f4f4f4;
    --muted:#8b8b8b;
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
  .templates-section {text-align:center;}
  .templates-section h2 {font-size:28px;font-weight:800;margin-bottom:24px;}

  .btn-primary {
    background:var(--navy);color:#fff;border:none;
    border-radius:24px;padding:10px 26px;
    font-weight:600;cursor:pointer;margin-bottom:30px;
    box-shadow:0 6px 12px rgba(0,0,0,0.15);
  }

  .template-card {
    background:#fff;
    border-radius:18px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
    padding:18px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    max-width:600px;
    margin:0 auto 20px;
  }

  .template-actions button {
    border:none;
    border-radius:24px;
    padding:8px 18px;
    font-weight:600;
    margin-left:10px;
    cursor:pointer;
    color:#fff;
  }
  .edit{background:#001A72;}
  .delete{background:#9b111e;}

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
        <a href="#" class="active">💳 Emission Card</a>
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

    <div class="templates-section">
      <h2>Emission Card’s Templates</h2>
      <form action="{{ route('admin.emission-card.store') }}" method="POST" style="margin-bottom:20px;">
        @csrf
        <button class="btn-primary">Make a new template</button>
      </form>

      @forelse ($templates as $template)
        <div class="template-card">
          <div><strong>{{ $template->name }}</strong></div>
          <div class="template-actions">
            <a href="{{ route('admin.emission-card.edit', $template->id) }}"><button class="edit">Edit</button></a>
            <form action="{{ route('admin.emission-card.delete', $template->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button class="delete">Delete</button>
            </form>
          </div>
        </div>
      @empty
        <p style="color:gray;margin-top:40px;">No templates yet.</p>
      @endforelse
    </div>
  </div>

  <footer>
    <img src="/images/nolkarbon-logo.png" alt="Logo" style="height:36px;vertical-align:middle;margin-right:10px;">
    <span>Contact Us</span>
  </footer>
</body>
</html>
