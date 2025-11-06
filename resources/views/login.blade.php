<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NOL KARBON</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: #f5f0e8;
            overflow-y: auto; /* scroll 1 halaman */
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            min-height: calc(100vh - 120px);
        }

        /* LEFT SECTION */
        .left-section {
            background: #000862;
            width: 50%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            color: white;
            text-align: center;
        }

        .welcome-text {
            font-size: 60px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .logo-container img {
            width: 180px;
            height: auto;
            margin-bottom: 10px;
        }

        .tagline {
            font-size: 18px;
            margin-top: 10px;
            opacity: 0.9;
        }

        /* RIGHT SECTION */
        .right-section {
            flex: 1;
            background: #f5f0e8;
            display: flex;
            justify-content: center;
            align-items: center; /* form di tengah vertikal */
            padding: 60px 40px;
        }

        .form-card {
            background: white;
            padding: 40px 45px;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 460px;
            margin: auto;
        }

        .form-header {
            text-align: right;
            margin-bottom: 25px;
            font-size: 14px;
            color: #666;
        }

        .form-header a {
            color: #000862;
            text-decoration: underline;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1a1a1a;
            font-weight: 600;
            font-size: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #ddd;
            border-radius: 50px;
            font-size: 14px;
            transition: all 0.3s;
            background: #fafafa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #000862;
            background: white;
        }

        .form-group input::placeholder {
            color: #aaa;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: #000862;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 57, 153, 0.4);
        }

        .error-message {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 5px;
        }

        .success-message {
            color: #27ae60;
            font-size: 13px;
            margin-bottom: 15px;
            padding: 10px;
            background: #d4edda;
            border-radius: 8px;
            text-align: center;
        }

        /* FOOTER */
        .footer {
            background: #000862;
            padding: 30px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-logo img {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }

        .footer-contact {
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: color 0.3s;
            margin-top: 10px;
        }

        .footer-contact:hover {
            color: #00bfff;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .container {
                flex-direction: column;
            }
            .left-section, .right-section {
                width: 100%;
                min-height: auto;
            }
            .left-section {
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- LEFT SIDE -->
        <div class="left-section">
            <h1 class="welcome-text">Welcome to</h1>
            <div class="logo-container">
                <img src="/images/logo.png" alt="Nol Karbon Logo">
            </div>
            <p class="tagline">Go Blue, Stay Clean, Be NolKarbon</p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="right-section">
            <div class="form-card">
                <div class="form-header">
                    Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                </div>

                @if(session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label>Username/Email</label>
                        <input type="text" name="username_email" placeholder="Type your text here" value="{{ old('username_email') }}" required>
                        @error('username_email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Type your text here" required>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-logo">
            <img src="/images/logo.png" alt="Nol Karbon Footer Logo">
            <div class="footer-contact">Contact Us</div>
        </div>
    </div>
</body>
</html>
