<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>NOL KARBON – Saved</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{--bg:#e7dfd3;--navy:#0a1a5c;--white:#fff}
  body{margin:0;font-family:Poppins;background:var(--bg)}
  .wrap{max-width:920px;margin:0 auto;padding:60px 24px 90px;text-align:center}
  h1{font-size:36px;font-weight:800;margin:4px 0 26px}
  .panel{background:#fff;border-radius:22px;box-shadow:0 10px 22px rgba(10,26,92,.1);padding:80px 28px;border:4px solid #20308c}
  .ok{width:84px;height:84px;border-radius:999px;border:6px solid #1db954;display:inline-flex;align-items:center;justify-content:center;margin-bottom:18px}
  .ok:after{content:"";display:block;width:28px;height:14px;border-left:6px solid #1db954;border-bottom:6px solid #1db954;transform:rotate(-45deg);margin-top:-6px}
  .txt{font-size:22px;font-weight:800}
  .btn{margin-top:28px;background:#0a1a5c;color:#fff;border:0;border-radius:26px;padding:14px 26px;font-weight:800;cursor:pointer;box-shadow:0 10px 18px rgba(10,26,92,.25)}
</style>
</head>
<body>
<div class="wrap">
  <h1>Here’s your<br>daily emissions</h1>
  <div class="panel">
    <div class="ok"></div>
    <div class="txt">Data saved</div>

    <a class="btn" href="{{ route('emission.card', $emission) }}" style="display:inline-block;text-decoration:none">VIEW EMISSION CARD</a>
  </div>
</div>
</body>
</html>