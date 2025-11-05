<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - NOL KARBON</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f0e8;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
        }

        /* ===== LEFT SECTION ===== */
        .left-section {
            flex: 1 1 50%;
            background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 60px 40px;
        }

        .welcome-text {
            font-size: 60px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 15px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #1e90ff 0%, #00bfff 100%);
            border-radius: 50%;
            position: relative;
            overflow: hidden;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            width: 50%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            top: 0;
            left: 0;
            border-radius: 50% 0 0 50%;
        }

        .logo-text {
            font-size: 42px;
            font-weight: bold;
            color: #00bfff;
            letter-spacing: 2px;
        }

        .tagline {
            font-size: 18px;
            margin-top: 10px;
            opacity: 0.9;
            text-align: center;
        }

        /* ===== RIGHT SECTION ===== */
        .right-section {
            flex: 1 1 50%;
            background: #f5f0e8;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .form-card {
            background: white;
            padding: 40px 45px;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 460px;
        }

        .form-header {
            text-align: right;
            margin-bottom: 25px;
            font-size: 14px;
            color: #666;
        }

        .form-header a {
            color: #001d5c;
            text-decoration: underline;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
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
            border-color: #003399;
            background: white;
        }

        .form-group input::placeholder {
            color: #aaa;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .checkbox-group label {
            font-size: 13px;
            color: #666;
            margin: 0;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
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

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
            padding: 30px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            flex-shrink: 0;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .footer-logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #1e90ff 0%, #00bfff 100%);
            border-radius: 50%;
        }

        .footer-logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #00bfff;
        }

        .footer-contact {
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .footer-contact:hover {
            color: #00bfff;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .container {
                flex-direction: column;
            }
            .left-section, .right-section {
                flex: 1 1 100%;
                width: 100%;
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
                <div class="logo-icon"></div>
                <div>
                    <div class="logo-text">NOL<br>KARBON</div>
                </div>
            </div>
            <p class="tagline">Go Blue, Stay Clean, Be NolKarbon</p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="right-section">
            <div class="form-card">
                <div class="form-header">
                    Already have an account? <a href="{{ route('login') }}">Sign in</a>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Type your text here" value="{{ old('username') }}" required>
                        @error('username')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Type your text here" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>University</label>
                        <input type="text" name="university" placeholder="Type your text here" value="{{ old('university') }}" required>
                        @error('university')
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

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Type your text here" required>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">Setuju dengan Syarat & Ketentuan</label>
                    </div>

                    <button type="submit" class="submit-btn">Make an account</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-logo">
            <div class="footer-logo-icon"></div>
            <span class="footer-logo-text">NOL<br>KARBON</span>
        </div>
        <div class="footer-contact">Contact Us</div>
    </div>
</body>
</html>
