<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NOL KARBON – Result</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{--bg:#e7dfd3;--navy:#0a1a5c;--white:#fff;--panel:#ffffff}
  body{margin:0;font-family:Poppins;background:var(--bg);color:#1d1d1f}
  .wrap{max-width:920px;margin:0 auto;padding:40px 24px 80px;text-align:center}
  h1{font-size:36px;font-weight:800;margin:10px 0 32px}
  .box{background:var(--white);border-radius:22px;box-shadow:0 10px 22px rgba(10,26,92,.1);padding:40px 28px;border:4px solid #20308c}
  .name{font-weight:800;letter-spacing:.8px}
  .subtitle{margin-top:6px}
  .total{color:#e11919;font-weight:800;font-size:56px;margin:24px 0 6px}
  .perday{font-weight:700;margin-bottom:20px}
  .cols{display:grid;grid-template-columns:1fr auto;gap:16px;max-width:420px;margin:18px auto 8px;color:#606060}
  .btn{margin-top:26px;background:#0a1a5c;color:#fff;border:0;border-radius:26px;padding:14px 28px;font-weight:800;cursor:pointer;box-shadow:0 10px 18px rgba(10,26,92,.25)}
  .muted{font-size:14px;color:#7a7a7a}
  .right{text-align:right}
</style>
</head>
<body>
<div class="wrap">
  <h1>Here’s your<br>daily emissions</h1>

  <div class="box">
    <div class="name">{{ $name }}</div>
    <div class="subtitle">Has produced daily carbon emissions of</div>
    <div class="total">{{ number_format($breakdown['total'], 2) }} kg CO₂</div>
    <div class="perday">per day</div>

    <div class="cols">
      <div>Transportation</div><div class="right">{{ number_format($breakdown['transport'],1) }} kg CO₂</div>
      <div>Electricity</div><div class="right">{{ number_format($breakdown['electric'],1) }} kg CO₂</div>
      <div>Food</div><div class="right">{{ number_format($breakdown['food'],1) }} kg CO₂</div>
      <div>Rubbish</div><div class="right">{{ number_format($breakdown['rubbish'],1) }} kg CO₂</div>
    </div>

    <div class="cols" style="font-weight:800;color:#000;margin-top:8px">
      <div></div><div class="right">{{ $percent['transport'] }}%</div>
      <div></div><div class="right">{{ $percent['electric'] }}%</div>
      <div></div><div class="right">{{ $percent['food'] }}%</div>
      <div></div><div class="right">{{ $percent['rubbish'] }}%</div>
    </div>

    <form method="POST" action="{{ route('emissions.store') }}">
      @csrf
      {{-- kirim balik semua input + hasil untuk disimpan --}}
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

    <div class="muted" style="margin-top:10px">Your data will be saved securely</div>
  </div>
</div>
</body>
</html>
