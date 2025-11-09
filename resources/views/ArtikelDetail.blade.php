<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nol Karbon - Towards Cleaner Air</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lexend', sans-serif;
            background: #F5F1EB;
            color: #333;
            overflow-x: hidden;
            padding-top: 90px;
        }

        /* Header */
        header {
            padding: 1.5rem 5%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-container {
            position: fixed;
            top: 1.5rem;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.25);
            border-radius: 50px;
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            max-width: 780px;
            width: 90%;
            z-index: 1000;
        }

        .logo img {
            height: 40px;
            width: auto;
        }

        nav {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: #000;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #000862;
        }

        .login-btn {
            background: #FFFFFF;
            color: #000862;
            padding: 0.6rem 1.5rem;
            border-radius: 100px;
            border: 1px solid #000862;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-left: 1rem;
        }

        .login-btn:hover {
            background: #000862;
            color: white;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 2rem 5% 3rem;
        }

        .hero h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 700;
            line-height: 65px;
            letter-spacing: -0.5px;
            margin-bottom: 2rem;
            color: #1a1a1a;
        }

        .hero h1 .highlight {
            color: #3675BE;
        }

        .hero p {
            font-size: 18px;
            max-width: 785px;
            margin: 0 auto 3rem;
            line-height: 1.6;
            color: #666;
        }

        .hero-image {
            max-width: 200px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 20px;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
        }

        /* Content Text Section */
        .content-text {
            padding: 4rem 5%;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .content-text p {
            font-size: 16px;
            line-height: 1.8;
            color: #333;
            text-align: justify;
        }

        /* NolKarbon Section */
        .nolkarbon-section {
            background: #000862;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
            margin: 2rem 5%;
            padding: 2.5rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
            position: relative;
            overflow: hidden;
            justify-content: center;
        }

        .nolkarbon-content h2 {
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 40px;
            font-weight: 600;
            letter-spacing: 0.8px;
            margin-bottom: 1rem;
        }

        .nolkarbon-content p {
            color: white;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0.6px;
        }

        .nolkarbon-image {
            position: relative;
        }

        .nolkarbon-image::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.03) 23%, black 100%);
            border-radius: 30px;
            z-index: 1;
        }

        .nolkarbon-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 30px;
        }

        /* Together Section */
        .together-section {
            background: #000862;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-top-left-radius: 60px;
            border-top-right-radius: 60px;
            margin: 3rem auto 0;
            padding: 3rem 5%;
            text-align: center;
            max-width: 100%;
        }

        .together-section h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 600;
            line-height: 65px;
            letter-spacing: 1.1px;
            color: #FDF3D6;
            margin-bottom: 1rem;
        }

        .together-section > p {
            color: white;
            font-size: 20px;
            margin-bottom: 3rem;
        }

        .testimonials {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .testimonial {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 25px;
            padding: 2rem;
            position: relative;
            text-align: left;
        }

        .testimonial-text {
            position: relative;
            color: white;
            font-size: 18px;
            letter-spacing: 0.54px;
            line-height: 1.6;
            margin-top: 2rem;
            margin-bottom: 2rem;
            min-height: 120px;
        }

        .testimonial-text::before {
            content: '"';
            font-size: 80px;
            position: absolute;
            top: -50px;
            left: -10px;
            color: white;
            opacity: 0.5;
            line-height: 1;
        }

        .testimonial-text::after {
            content: '"';
            font-size: 80px;
            position: absolute;
            bottom: -50px;
            right: -10px;
            color: white;
            opacity: 0.5;
            line-height: 1;
            transform: rotate(180deg);
        }

        .testimonial .author {
            color: white;
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .testimonial .position {
            color: white;
            font-size: 18px;
        }

        /* Support Section */
        .support-section {
            background: #000862;
            padding: 6rem 10%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .support-section h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 600;
            line-height: 65px;
            letter-spacing: 1.1px;
            color: #FDF3D6;
            margin-bottom: 1rem;
        }

        .support-section p {
            color: white;
            font-size: 25px;
            line-height: 1.5;
        }

        .project-icon {
            height: 250px;
            width: 250px;
            overflow: hidden;
            margin-left: 18rem;
        }

        .project-icon img {
            width: 100%;
            height: 100%;
        }

        .project-icon.large {
            grid-column: span 2;
        }

        /* Habits Section */
        .habits-section {
            padding: 4rem 10%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .earth-illustration {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .earth-illustration img {
            width: 100%;
            height: 100%;
        }

        .habits-content h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 600;
            line-height: 65px;
            letter-spacing: 1.1px;
            color: #000;
            margin-bottom: 1rem;
        }

        .habits-content p {
            font-size: 25px;
            color: #000862;
            margin-bottom: 2rem;
        }

        .btn-primary {
            background: #000862;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 100px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #3675BE;
            transform: translateY(-2px);
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.3);
        }

        /* Blue Divider */
        .blue-divider {
            width: 100%;
            height: 244px;
            background: #000862;
            margin: 4rem 0;
        }

        /* Tracking Section */
        .tracking-section {
            padding: 3rem 10%;
            text-align: center;
        }

        .tracking-section h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 600;
            line-height: 65px;
            letter-spacing: 1.1px;
            color: #000;
            margin-bottom: 2rem;
        }

        .leaderboard {
            max-width: 700px;
            margin: 0 auto 4rem;
        }

        .podium {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .podium-item {
            text-align: center;
        }

        .podium-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            overflow: hidden;
            border: 3px solid #000862;
        }

        .podium-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .podium-rank {
            background: #000862;
            color: #FDF3D6;
            border: 1px solid #FDF3D6;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .podium-rank.first {
            width: 216px;
            height: 155px;
            border-top-left-radius: 35px;
            border-top-right-radius: 35px;
            font-size: 55px;
        }

        .podium-rank.second {
            width: 203px;
            height: 90px;
            border-top-left-radius: 35px;
            font-size: 32px;
        }

        .podium-rank.third {
            width: 213px;
            height: 80px;
            border-top-right-radius: 35px;
            font-size: 24px;
        }

        .podium-name {
            font-size: 14px;
            margin-top: 0rem;
        }

        .podium-name.first {
            font-size: 14px;
        }

        .podium-name.second{
            font-size: 10px;
            margin-bottom: 0.75rem;
        }

        .podium-name.third {
            font-size: 10px;
            margin-bottom: 1rem;
        }

        .see-more-bar {
            background: #000862;
            height: 48px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FDF3D6;
            font-size: 20px;
            cursor: pointer;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .see-more-bar:hover {
            background: #3675BE;
        }

        /* Card Section */
        .card-section {
            background: #000862;
            padding: 6rem 10%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            width: 100%;
            margin: 0;
        }

        .emission-card {
            margin-top: 6rem;
            border-radius: 25px;
            overflow: hidden;
            position: relative;
        }

        .emission-card img {
            width: 75%;
            height: auto;
            display: block;
        }

        .card-content h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 75px;
            font-weight: 600;
            line-height: 100px;
            letter-spacing: 1.5px;
            white-space: nowrap;
            color: #FDF3D6;
            margin-top: 6rem;
        }

        .btn-secondary {
            background: #D9D9D9;
            color: #4F378A;
            padding: 1rem 2rem;
            border: none;
            border-radius: 100px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            margin-top: 2rem;
        }

        .btn-secondary:hover {
            background: #3675BE;
            color: #fff;
            transform: scale(1.05);
        }

        /* Challenge Section */
        .challenge-section {
            background: #000862;
            padding: 4rem 10%;
            text-align: center;
            position: relative;
        }

        .challenge-section h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 75px;
            font-weight: 600;
            line-height: 80px;
            letter-spacing: 1.5px;
            color: #FDF3D6;
            margin-bottom: 2rem;
        }

        .trophy {
            width: 504px;
            margin: 2rem auto;
            overflow: hidden;
        }

        .trophy img {
            width: 75%;
            height: 75%;
            object-fit: contain;
        }

        .btn-challenge {
            background: #D9D9D9;
            color: #000862;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 35px;
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-challenge:hover {
            background: #3675BE;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
        }

        /* Articles Section */
        .articles-section {
            padding: 4rem 10%;
            text-align: center;
        }

        .articles-section h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 600;
            line-height: 65px;
            letter-spacing: 1.1px;
            margin-bottom: 1rem;
        }

        .articles-section h2 .highlight {
            color: #3675BE;
        }

        .articles-section > p {
            font-size: 18px;
            margin-bottom: 3rem;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .article-card {
            background: #F5F1EB;
            border-radius: 25px;
            border: 1px solid #D4CCBF;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .article-image {
            width: 100%;
            height: 238px;
            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-content {
            padding: 1.5rem;
            text-align: left;
        }

        .article-content h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            line-height: 35px;
            letter-spacing: 0.48px;
            color: #000;
            margin-bottom: 1rem;
            min-height: 100px;
        }

        .article-content a {
            color: #3675BE;
            font-size: 18px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .article-content a:hover {
            color: #000862;
        }

        /* Footer */
        footer {
            background: #000862;
            padding: 3rem 5%;
            text-align: center;
            color: white;
        }

        footer p {
            margin: 0.5rem 0;
            font-size: 18px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .testimonials,
            .articles-grid {
                grid-template-columns: 1fr;
            }

            .nolkarbon-section,
            .support-section,
            .habits-section,
            .card-section {
                grid-template-columns: 1fr;
            }

            .hero h1,
            .together-section h2,
            .tracking-section h2,
            .articles-section h2 {
                font-size: 40px;
                line-height: 50px;
            }

            .card-content h2,
            .challenge-section h2 {
                font-size: 50px;
                line-height: 60px;
            }
        }

        html, body {
            overflow-x: hidden;
        }

        section, div, img {
            max-width: 100%;
        }

    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="/images/logo.png" alt="Nol Karbon Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="#calculator">Kalkulator</a></li>
                    <li><a href="#card">Kartu Emisi</a></li>
                    <li><a href="#challenge">Challenge</a></li>
                    <li><a href="#articles">Artikel</a></li>
                </ul>
            </nav>
            <button class="login-btn">Login</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>{{ $article->judul }}</h1>
        <div class="hero-image">
            <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}">
        </div>
    </section>

    <!-- Content Text Section -->
    <section class="content-text">
        {!! nl2br(e($article->isi)) !!}
    </section>

    

    <footer>
        <div class="logo">
            <img src="/images/logo.png" alt="Nol Karbon Logo">
        </div>
        <p>NolKarbon@gmail.com</p>
        <p>© 2025 Nol Karbon. All rights reserved.</p>
    </footer>
</body>
</html>