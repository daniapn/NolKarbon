<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emission Card - Nol Karbon</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #E8DFD5;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            padding: 50px 0;
        }
        .logo img {
            width: 160px;
        }
        h2 {
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }
        .card-wrapper {
            margin: 40px auto;
            background-color: #071b66;
            border-radius: 20px;
            padding: 60px 0;
            width: 80%;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.15);
        }
        .card {
            background-color: white;
            width: 50%;
            margin: 0 auto;
            border-radius: 20px;
            padding: 50px 0;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .highlight {
            font-weight: 700;
            color: #0D2077;
        }
        .emission-value {
            font-size: 38px;
            color: red;
            font-weight: 700;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
        }
        .btn {
            background-color: #0D2077;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 40px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        .btn:hover {
            transform: scale(1.05);
            transition: 0.2s;
        }
        footer {
            background-color: #0D2077;
            color: white;
            text-align: center;
            padding: 30px 0;
            margin-top: 50px;
        }
        /* Popup */
        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 50, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .popup {
            background-color: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.3);
            text-align: center;
        }
        .popup p {
            font-size: 20px;
            font-weight: 700;
            color: #0D2077;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="/images/nolkarbon-logo.png" alt="Nol Karbon">
        </div>
        <h2>Look at your <br> <b>Emission Card 🪪</b></h2>

        @if ($emission)
        <!-- Jika ada data -->
        <div class="card-wrapper">
            <div class="card">
                <img src="/images/nolkarbon-logo.png" alt="Nol Karbon" width="150">
                <p>Hi, I'm <b class="highlight">{{ $user->name }}</b></p>
                <p>From <b class="highlight">{{ $university }}</b></p>
                <p>Proud to take action with <b>Nol Karbon</b><br>
                My daily emission:</p>
                <p class="emission-value">{{ number_format($emission->total_emission, 1) }} kg CO₂</p>
            </div>
        </div>
        @else
        <!-- Jika tidak ada data -->
        <div class="overlay">
            <div class="popup">
                <p>Data not available</p>
            </div>
        </div>
        @endif

        <div class="btn-group">
            <button class="btn">Unduh</button>
            <button class="btn">Bagikan</button>
        </div>
    </div>

    <footer>
        <img src="/images/nolkarbon-logo.png" alt="Nol Karbon" width="140"><br>
        Contact Us
    </footer>
</body>
</html>
