<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NOL KARBON – Calculator</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#e7dfd3; 
    --white:#ffffff; 
    --navy:#0a1a5c; 
    --pill:#f6efec; 
    --card-shadow:0 8px 22px rgba(10,26,92,.08);
    --border:#6e63c7; 
    --text:#1d1d1f; 
    --muted:#9b9b9b;
  }
  *{box-sizing:border-box;}
  body{
    margin:0;
    font-family:Poppins,system-ui;
    background:var(--bg);
    color:var(--text);
  }

  .wrap{
    max-width:1100px;
    margin:0 auto;
    padding:28px 24px 80px;
  }

    /* Tombol back */
    .back-btn {
      position: absolute;
      top: 28px;
      left: 28px;
      width: 44px;
      height: 44px;
      background: var(--white);
      border-radius: 50%;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 22px;
      color: #000;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .back-btn:hover {
      background: #f3f3f3;
    }

  .logo{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    margin:20px 0 10px;
  }

  .logo img{height:50px;}

  .title{
    font-weight:800;
    font-size:36px;
    line-height:1.2;
    text-align:center;
    margin:10px 0 36px;
  }

  /* Panel putih utama */
  .panel{
    background:var(--white);
    border-radius:22px;
    box-shadow:var(--card-shadow);
    padding:40px 50px;
  }

  .grid{
    display:grid;
    grid-template-columns:repeat(2, 1fr);
    gap:40px;
    margin-bottom:50px;
  }

  /* CARD persegi */
  .card{
    border-radius:18px;
    border:3px solid #ffffff;
    box-shadow:0 6px 16px rgba(92,92,140,.15);
    padding:28px 26px;
    border-color:#fff;
    outline:3px solid rgba(110,99,199,.35);
    height:330px;
    display:flex;
    flex-direction:column;
  }

  .card h3{
    margin:0 0 14px;
    font-size:20px;
  }

  .row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
    margin:8px 0 12px;
  }

  .pill{
    display:inline-block;
    padding:10px 18px;
    border-radius:999px;
    background:var(--pill);
    box-shadow:0 6px 10px rgba(0,0,0,.08);
    border:0;
    cursor:pointer;
    font-weight:600;
  }

  .pill.active{background:#eadff7; outline:2px solid var(--border);}

  .input{
    width:100%;
    padding:14px 16px;
    border:0;
    border-radius:14px;
    background:#f6efec;
    box-shadow:inset 0 1px 0 rgba(0,0,0,.04);
  }

  .muted{
    color:var(--muted);
    font-weight:600;
    font-size:13px;
    margin:4px 0 10px;
  }

  .btn{
    display:block;
    background:var(--navy);
    color:#fff;
    border:0;
    border-radius:40px;
    padding:16px 36px;
    font-weight:700;
    font-size:14px;
    box-shadow:0 8px 14px rgba(10,26,92,.25);
    cursor:pointer;
    margin:0 auto;
  }

  /* Footer */
  footer {
    background:var(--navy);
    color:#fff;
    padding:30px 0;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:20px;
    margin-top:auto;
  }

  footer img {
    height:48px;
  }

  @media(max-width:900px){
    .box{padding:40px 20px;}
    .total{font-size:42px;}
    .back-btn{top:16px;left:16px;}
  }
  
</style>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    // toggle pill radio buttons
    document.querySelectorAll('[data-pill]').forEach(p=>{
      p.addEventListener('click',()=>{
        const name=p.getAttribute('data-group');
        document.querySelectorAll(`[data-group="${name}"]`).forEach(x=>x.classList.remove('active'));
        p.classList.add('active');
        document.querySelector(`input[name="${name}"][value="${p.dataset.value}"]`).checked=true;
      });
    });
  });
</script>
</head>

<body>

    <a href="{{ route('homee') }}" class="back-btn">←</a>

  <div class="wrap">
    <div class="logo">
      <img src="/images/logo.png" alt="NolKarbon Logo">
    </div>

    <h1 class="title">Start calculating<br>your daily emissions ⚙️</h1>

    <form action="{{ route('calculate') }}" method="POST">
      @csrf
      <div class="panel">
        <div class="grid">
          <!-- Transportation -->
          <div class="card">
            <h3><b>Transportation 🛵</b></h3>
            <div class="muted">Vehicle type</div>
            <div class="row">
              <button class="pill active" type="button" data-pill data-group="vehicle_type" data-value="motorcycle">Motorcycle</button>
              <button class="pill" type="button" data-pill data-group="vehicle_type" data-value="car">Car</button>
            </div>
            <div class="muted">Avg distance (km)</div>
            <input class="input" type="number" step="0.01" min="0" name="distance" placeholder="Type here..." required>
            <input type="radio" name="vehicle_type" value="motorcycle" checked hidden>
            <input type="radio" name="vehicle_type" value="car" hidden>
          </div>

          <!-- Electricity -->
          <div class="card">
            <h3><b>Electricity ⚡</b></h3>
            <div class="muted">Electric source</div>
            <div class="row">
              <button class="pill active" type="button" data-pill data-group="electric_source" data-value="grid">Grid Electricity</button>
              <button class="pill" type="button" data-pill data-group="electric_source" data-value="solar">Solar Power</button>
            </div>
            <div class="muted">Daily Power Usage (kWh)</div>
            <input class="input" type="number" step="0.01" min="0" name="electric_usage" placeholder="Type here..." required>
            <input type="radio" name="electric_source" value="grid" checked hidden>
            <input type="radio" name="electric_source" value="solar" hidden>
          </div>

          <!-- Food -->
          <div class="card">
            <h3><b>Food 🍽️</b></h3>
            <div class="muted">Beef (Kg)</div>
            <input class="input" type="number" step="0.01" min="0" name="beef" placeholder="Type here..." required>
            <div class="muted" style="margin-top:10px;">Chicken (Kg)</div>
            <input class="input" type="number" step="0.01" min="0" name="chicken" placeholder="Type here..." required>
          </div>

          <!-- Rubbish -->
          <div class="card">
            <h3><b>Rubbish 🗑️</b></h3>
            <div class="muted">Organic Waste (Kg)</div>
            <input class="input" type="number" step="0.01" min="0" name="organic_waste" placeholder="Type here..." required>
            <div class="muted" style="margin-top:10px;">Inorganic Waste (Kg)</div>
            <input class="input" type="number" step="0.01" min="0" name="inorganic_waste" placeholder="Type here..." required>
          </div>
        </div>

        <button type="submit" class="btn">Start Calculate</button>
      </div>
    </form>

  </div>
  <footer>
  <img src="/images/logo.png" alt="NolKarbon Logo">
  <div>Contact Us</div>
</footer>
</body>
</html>
