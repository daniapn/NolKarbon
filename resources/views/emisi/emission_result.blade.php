<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NOL KARBON – Result</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --bg:#e7dfd3;
    --navy:#001A72;
    --light-blue:#3b6edb;
    --white:#fff;
  }

  body {
    margin:0;
    font-family:Poppins, system-ui;
    background:var(--bg);
    color:#1d1d1f;
    display:flex;
    flex-direction:column;
    min-height:100vh;
  }

  main {
    flex:1;
    position:relative;
  }

  .wrap {
    max-width:900px;
    margin:0 auto;
    padding:40px 24px 80px;
    text-align:center;
  }

  /* Tombol back */
  .back-btn {
    position:absolute;
    top:24px;
    left:24px;
    background:var(--white);
    border-radius:50%;
    width:40px;
    height:40px;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
    text-decoration:none;
    color:#1d1d1f;
    font-size:20px;
    transition:background 0.2s;
  }
  .back-btn:hover { background:#f3f3f3; }

  /* Logo */
  .logo {
    display:flex;
    justify-content:center;
    align-items:center;
    margin-bottom:10px;
  }

  .logo img { height:50px; }

  /* Title */
  h1 {
    font-size:32px;
    font-weight:800;
    line-height:1.3;
    margin:10px 0 40px;
  }

  /* Box hasil */
  .box {
    background:var(--white);
    border-radius:22px;
    box-shadow:0 10px 22px rgba(10,26,92,.1);
    padding:60px 50px;
    border:4px solid var(--navy);
    margin-bottom:40px;
    text-align:left;
  }

  .name {
    font-weight:800;
    font-size:22px;
    margin-bottom:8px;
    text-align:left;
  }

  .subtitle {
    color:var(--light-blue);
    font-weight:600;
    font-size:18px;
    margin-bottom:16px;
    text-align:left;
  }

  .center-text { text-align:center; }

  .total {
    color:#e11919;
    font-weight:800;
    font-size:56px;
    margin:20px 0 6px;
  }

  .perday {
    font-weight:700;
    margin-bottom:30px;
    text-align:center;
  }

  /* Chart container */
  .chart-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 40px 0;
    gap: 50px;
  }

  .chart-container canvas {
    width: 200px !important;
    height: 200px !important;
  }

  .chart-legend {
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-size: 15px;
  }

  .chart-legend div {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .dot {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
  }

  .cols {
    display:grid;
    grid-template-columns:1fr auto;
    gap:10px;
    max-width:420px;
    margin:0 auto;
    font-size:15px;
    color:#000;
  }

  .cols span { text-align:right; }

  .percent { font-weight:800; }

  .btn {
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
    margin:50px auto 0;
  }

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

  footer img { height:48px; }

  @media(max-width:900px){
    .box{padding:40px 20px;}
    .total{font-size:42px;}
    .back-btn{top:16px;left:16px;}
    .chart-container{flex-direction:column;gap:20px;}
  }
</style>
</head>

<body>
<main>
  <a href="{{ url('/form') }}" class="back-btn">←</a>

  <div class="wrap">
    <div class="logo">
      <img src="/images/logo.png" alt="NolKarbon Logo">
    </div>

    <h1>Here’s your<br>daily emissions</h1>

    <div class="box">
      <div class="name">{{ strtoupper($name) }}</div>
      <div class="subtitle">Has produced daily carbon emissions of</div>

      <div class="center-text">
        <div class="total">{{ number_format($breakdown['total'], 1) }} kg CO₂</div>
        <div class="perday">per day</div>
      </div>

      <!-- GRAFIK PIE -->
      <div class="chart-container">
        <canvas id="emissionChart"></canvas>
        <div class="chart-legend">
          <div><span class="dot" style="background:#4B4DB7"></span> <b>Transportation</b> &nbsp; {{ number_format($breakdown['transport'],1) }} kg CO₂ ({{ $percent['transport'] }}%)</div>
          <div><span class="dot" style="background:#E11919"></span> <b>Electricity</b> &nbsp; {{ number_format($breakdown['electric'],1) }} kg CO₂ ({{ $percent['electric'] }}%)</div>
          <div><span class="dot" style="background:#4CAF50"></span> <b>Food</b> &nbsp; {{ number_format($breakdown['food'],1) }} kg CO₂ ({{ $percent['food'] }}%)</div>
          <div><span class="dot" style="background:#FFC107"></span> <b>Rubbish</b> &nbsp; {{ number_format($breakdown['rubbish'],1) }} kg CO₂ ({{ $percent['rubbish'] }}%)</div>
        </div>

      </div>

      <form method="POST" action="{{ route('emissions.store') }}">
        @csrf
        <input type="hidden" name="name" value="{{ $name }}">
        @foreach($input as $k=>$v)
          <input type="hidden" name="{{ $k }}" value="{{ $v }}">
        @endforeach
        <input type="hidden" name="transport_emission" value="{{ $breakdown['transport'] }}">
        <input type="hidden" name="electric_emission"  value="{{ $breakdown['electric'] }}">
        <input type="hidden" name="food_emission"      value="{{ $breakdown['food'] }}">
        <input type="hidden" name="rubbish_emission"   value="{{ $breakdown['rubbish'] }}">
        <input type="hidden" name="total_emission"     value="{{ $breakdown['total'] }}">
        <button class="btn" type="submit">SAVE</button>
      </form>
    </div>
  </div>
</main>

<footer>
 <img src="/images/logo.png" alt="NolKarbon Logo">
  <div>Contact Us</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('emissionChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Transportation', 'Electricity', 'Food', 'Rubbish'],
      datasets: [{
        data: [
          {{ $breakdown['transport'] ?? 0 }},
          {{ $breakdown['electric'] ?? 0 }},
          {{ $breakdown['food'] ?? 0 }},
          {{ $breakdown['rubbish'] ?? 0 }}
        ],
        backgroundColor: ['#4B4DB7', '#E11919', '#4CAF50', '#FFC107'],
        borderWidth: 0,
        hoverOffset: 8
      }]
    },
    options: {
      cutout: '60%',
      plugins: {
        legend: { display: false },
      }
    }
  });
</script>

</body>
</html>
