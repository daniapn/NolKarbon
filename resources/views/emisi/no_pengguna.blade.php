<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emission Card - Nol Karbon</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #e7dfd3;
      --navy: #001A72;
      --white: #fff;
      --red: #e11919;
    }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background-color: var(--bg);
      color: #1d1d1f;
      overflow-x: hidden;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

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

    .logo {
      text-align: center;
      margin-top: 60px;
    }

    .logo img {
      width: 160px;
    }

    h2 {
      font-weight: 800;
      font-size: 32px;
      text-align: center;
      margin-top: 10px;
      margin-bottom: 40px;
      line-height: 1.3;
    }

  .card-wrapper {
    background-color: var(--navy);
    border-radius: 20px;
    width: 80%;
    max-width: 1000px;
    margin: 0 auto 80px; /* tambahin margin bawah */
    padding: 60px 0;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
    display: flex;
    justify-content: center;
    align-items: center;
  }  


    .card {
      background-color: var(--white);
      width: 55%;
      margin: 0 auto;
      padding: 40px 30px;
      border-radius: 22px;
      text-align: center;
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
      position: relative;
      border: 4px solid #007BFF;
    }

    .card .icon {
      width: 100px;
      height: 100px;
      border: 5px solid var(--red);
      border-radius: 12px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px auto 30px;
      color: var(--red);
      font-size: 48px;
      font-weight: bold;
      clip-path: polygon(30% 0, 70% 0, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0 70%, 0 30%);
    }

    .card p {
      font-size: 18px;
      font-weight: 700;
      color: var(--navy);
    }

    .btn-primary {
      background-color: var(--navy);
      color: #fff;
      border: none;
      border-radius: 40px;
      padding: 12px 40px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
      margin-top: 20px;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
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

  footer img {
    height:48px;
  }

    footer div {
      font-size: 14px;
    }

    @media(max-width: 1000px) {
      .card {
        width: 85%;
        padding: 40px 20px;
      }
    }
  </style>
</head>
<body>

  <a href="{{ url('/NolKarbonn') }}" class="back-btn">←</a>

  <main>
    <div class="logo">
      <img src="/images/logo.png" alt="NolKarbon Logo">
    </div>

    <h2>Look at your<br><b>Emission Card 🪪</b></h2>

    <div class="card-wrapper">
      <div class="card">
        <div class="icon">!</div>
        <p>Data not available</p>
        <a href="{{ route('form') }}" class="btn-primary">Start Calculate</a>
      </div>
    </div>
  </main>

<footer>
 <img src="/images/logo.png" alt="NolKarbon Logo">
  <div>Contact Us</div>
</footer>

</body>
</html>
