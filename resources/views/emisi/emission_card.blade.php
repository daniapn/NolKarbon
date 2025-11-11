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
      --blue-light: #2446c6;
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
      margin: 0 auto;
      padding: 60px 0;
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
    }

    .card {
      background-color: var(--white);
      width: 55%;
      margin: 0 auto;
      padding: 60px 40px;
      border-radius: 22px;
      text-align: left;
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
      position: relative;
    }

    .card img {
      display: block;
      margin: 0 auto 40px;
      width: 150px;
    }

    .card p {
      font-size: 17px;
      margin: 8px 0;
    }

    .highlight {
      font-weight: 700;
      color: var(--navy);
    }

    .center-text {
      text-align: center;
      margin-top: 24px;
    }

    .bold-text {
      font-weight: 800;
      font-size: 20px;
      color: var(--navy);
    }

    .emission-value {
      color: var(--red);
      font-weight: 800;
      font-size: 46px;
      margin-top: 12px;
    }

    .btn-group {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 60px;
      margin: 60px 0 100px;
    }

    .btn {
      background-color: var(--navy);
      color: #fff;
      border: none;
      border-radius: 40px;
      padding: 16px 80px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      transition: all 0.2s ease;
    }

    .btn:hover {
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
      .btn {
        padding: 14px 50px;
      }
    }
  </style>
</head>
<body>

  <a href="{{ route('homee') }}" class="back-btn">←</a>

    <main>
      <div class="logo">
        <img src="/images/logo.png" alt="NolKarbon Logo">
      </div>
    
      <h2>Look at your<br><b>Emission Card 🪪</b></h2>
    
      @if ($emission)
      <div class="card-wrapper" style="background-color: var(--navy); border-radius: 20px; width: 80%; max-width: 800px; margin: 0 auto; padding: 80px 0; box-shadow: 0 0 30px rgba(0,0,0,0.25);">
        <div class="card" style="background-color: var(--white); width: 55%; margin: 0 auto; padding: 60px 50px; border-radius: 20px; text-align: left; box-shadow: 0 0 40px rgba(0,0,0,0.25); position: relative;">
          <img src="/images/logo.png" alt="NolKarbon Logo" style="display:block; margin:0 auto 40px; width:130px;">
          
          <p style="font-size:16px; margin:8px 0;">Hi, I’m</p>
          <p style="font-size:18px; font-weight:800; color:var(--navy); margin:4px 0 16px;">{{ $emission->name ?? $user->username ?? 'User' }}</p>
          
          <p style="font-size:16px; margin:8px 0;">From</p>
          <p style="font-size:18px; font-weight:800; color:var(--navy); margin:4px 0 24px;">{{ $university ?? 'Unknown University' }}</p>
          
          <div class="center-text" style="text-align:center; margin-top:40px;">
            <p style="font-weight:800; color:var(--navy); font-size:18px; margin-bottom:4px;">Proud to take action<br>with Nol Karbon</p>
            <p style="margin:6px 0;">My daily emission:</p>
            <p class="emission-value" style="color:var(--red); font-weight:800; font-size:36px; margin-top:8px;">
              {{ number_format($emission->total_emission, 1) }} kg CO₂
            </p>
          </div>
        </div>
      </div>
      @else
      <div class="card-wrapper" style="background:#ddd;text-align:center;">
        <div class="card" style="text-align:center;">
          <p style="font-size:20px;font-weight:700;">No emission data found.</p>
        </div>
      </div>
      @endif
    
      <div class="btn-group">
        <button class="btn">Unduh</button>
        <button class="btn">Bagikan</button>
      </div>
    </main>


  <footer>
    <img src="/images/logo.png" alt="NolKarbon Logo">
    <div>Contact Us</div>
  </footer>

  <!-- Biar tombol bawah berfungsi -->
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const downloadBtn = document.querySelector('.btn:nth-child(1)'); // Tombol "Unduh"
    const shareBtn = document.querySelector('.btn:nth-child(2)'); // Tombol "Bagikan"
    const cardWrapper = document.querySelector('.card-wrapper');

    // --- Fitur Unduh Kartu Emisi ---
    downloadBtn.addEventListener('click', function () {
      if (!cardWrapper) {
        alert("Kartu tidak ditemukan!");
        return;
      }

      html2canvas(cardWrapper, {
        scale: 2, // kualitas lebih tajam
        backgroundColor: null
      }).then(canvas => {
        const link = document.createElement('a');
        link.download = 'emission_card.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
      });
    });

    // --- Fitur Bagikan (opsional, untuk HP yang support Web Share API) ---
    shareBtn.addEventListener('click', function () {
      if (navigator.share) {
        navigator.share({
          title: 'My Emission Card - Nol Karbon',
          text: 'Check out my daily CO₂ emission score!',
          url: window.location.href
        });
      } else {
        alert("Fitur bagikan tidak didukung di browser ini");
      }
    });
  });
</script>

</body>
</html>
