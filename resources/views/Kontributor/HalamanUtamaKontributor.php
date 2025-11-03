<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nol Karbon - Article Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lexend', sans-serif;
            background: #EEE8DF;
            color: #333;
            overflow-x: hidden;
        }

        /* Header */
        header {
            padding: 2.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .notification-icon {
            width: 28px;
            height: 30px;
            cursor: pointer;
            position: relative;
        }

        .notification-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .logout-btn {
            background: #FFFFFF;
            color: #000862;
            padding: 0.6rem 1.5rem;
            border-radius: 100px;
            border: 1px solid #000862;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Lexend', sans-serif;
            cursor: pointer;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: #000862;
            color: white;
        }

        /* Logo Section */
        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-section img {
            width: 246px;
            height: 99px;
            margin-bottom: 1rem;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 0 5% 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 600;
            line-height: 65px;
            letter-spacing: 1.1px;
            margin-bottom: 1rem;
        }

        .hero h1 .highlight {
            color: #3675BE;
        }

        .hero p {
            font-size: 18px;
            max-width: 785px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Main Content */
        .content-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 5%;
        }

        /* Create Button */
        .create-btn {
            width: 100%;
            background: #000862;
            color: white;
            padding: 1.2rem;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            font-family: 'Lexend', sans-serif;
            font-weight: 400;
            cursor: pointer;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            margin-bottom: 2rem;
            transition: all 0.3s;
        }

        .create-btn:hover {
            background: #3675BE;
            transform: translateY(-2px);
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.3);
        }

        /* Article Cards */
        .article-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .article-card {
            background: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s;
        }

        .article-card:hover {
            transform: translateY(-2px);
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.3);
        }

        .article-content {
            flex: 1;
        }

        .article-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            line-height: 35px;
            letter-spacing: 0.48px;
            color: #000;
            margin-bottom: 0.5rem;
        }

        .article-edit {
            color: #000862;
            font-size: 18px;
            font-family: 'Lexend', sans-serif;
            cursor: pointer;
            transition: color 0.3s;
        }

        .article-edit:hover {
            color: #3675BE;
            text-decoration: underline;
        }

        .article-status {
            color: #000862;
            font-size: 18px;
            font-family: 'Lexend', sans-serif;
            text-align: center;
            min-width: 150px;
            padding: 0.5rem 1rem;
            border-radius: 15px;
        }

        .status-pending {
            background: #FFF9E6;
        }

        .status-published {
            background: #E6F7E6;
        }

        .status-rejected {
            background: #FFE6E6;
        }

        .status-revision {
            background: #FFF0E6;
        }

        .status-draft {
            background: #E6E6E6;
        }

        /* Footer */
        footer {
            background: #000862;
            padding: 3rem 5%;
            text-align: center;
            color: white;
            margin-top: 4rem;
        }

        footer .footer-logo {
            width: 226px;
            height: 91px;
            margin: 0 auto 1rem;
        }

        footer p {
            color: #FDF3D6;
            font-size: 18px;
            font-family: 'Lexend', sans-serif;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 40px;
                line-height: 50px;
            }

            .article-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .article-status {
                align-self: flex-end;
            }

            header {
                padding: 1.5rem 5%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div></div>
        <div class="header-right">
            <div class="notification-icon">
                <img src="/images/notif.png" alt="Notifications">
            </div>
            <button class="logout-btn">Logout</button>
        </div>
    </header>

    <div class="logo-section">
        <img src="/images/logo.png" alt="Nol Karbon Logo">
    </div>

    <section class="hero">
        <h1>Let's Contribute and Be Part<br>of <span class="highlight">Nol Karbon</span></h1>
        <p>Nol Karbon empowers you to take small yet meaningful actions for a cleaner, greener future. Together, we can build a world free from carbon emissions.</p>
    </section>

    <div class="content-container">
        <button class="create-btn">Buat Draft Artikel Baru</button>

        <div class="article-list">
            <div class="article-card">
                <div class="article-content">
                    <div class="article-title">Zero carbon for better life start by little yourself bla bla</div>
                </div>
                <div class="article-status status-pending">Menunggu Review</div>
            </div>

            <div class="article-card">
                <div class="article-content">
                    <div class="article-title">Zero carbon for better life start by little yourself bla bla</div>
                </div>
                <div class="article-status status-published">Published</div>
            </div>

            <div class="article-card">
                <div class="article-content">
                    <div class="article-title">Zero carbon for better life start by little yourself bla bla</div>
                </div>
                <div class="article-status status-rejected">Ditolak</div>
            </div>

            <div class="article-card">
                <div class="article-content">
                    <div class="article-title">Zero carbon for better life start by little yourself bla bla</div>
                    <div class="article-edit">Edit</div>
                </div>
                <div class="article-status status-revision">Revisi</div>
            </div>

            <div class="article-card">
                <div class="article-content">
                    <div class="article-title">Zero carbon for better life start by little yourself bla bla</div>
                    <div class="article-edit">Edit</div>
                </div>
                <div class="article-status status-draft">Draft</div>
            </div>
        </div>
    </div>

    <footer>
        <img class="footer-logo" src= alt="Nol Karbon Logo">
        <p>Contact Us</p>
    </footer>
</body>
</html>