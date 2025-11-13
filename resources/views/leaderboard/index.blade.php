<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peringkat Kampus Hijau - Nol Karbon</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 4rem 5% 3rem;
            margin-top: 2rem;
        }

        .hero-section h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 55px;
            font-weight: 600;
            line-height: 65px;
            letter-spacing: 1.1px;
            color: #000862;
            margin-bottom: 1rem;
        }

        .hero-section p {
            font-size: 18px;
            max-width: 785px;
            margin: 0 auto;
            line-height: 1.6;
            color: #333;
        }

        /* Leaderboard Section */
        .leaderboard-container {
            max-width: 1000px;
            margin: 3rem auto;
            padding: 0 5%;
        }

        .leaderboard-wrapper {
            background: white;
            border: 1px solid #3675BE;
            border-radius: 48px;
            padding: 2.5rem;
            box-shadow: 0px 12px 24px rgba(9, 27, 121, 0.12);
        }

        .leaderboard-items {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .leaderboard-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background: linear-gradient(135deg, #d8ddff 0%, #e8ebff 100%);
            border: 1px solid #c4ccff;
            border-radius: 32px;
            padding: 1.5rem 2rem;
            box-shadow: 0 12px 24px rgba(9, 27, 121, 0.12);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .leaderboard-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(9, 27, 121, 0.18);
        }

        .campus-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            min-width: 64px;
            background: #0a1d7a;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(10, 29, 122, 0.3);
        }

        .campus-icon i {
            font-size: 24px;
            color: #fcd34d;
        }

        .campus-info {
            flex: 1;
            text-align: left;
        }

        .campus-rank-name {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: #000862;
            margin-bottom: 0.5rem;
        }

        .campus-emission {
            font-size: 14px;
            color: #64748b;
        }

        .campus-score-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.75rem;
            min-width: 120px;
        }

        .campus-score {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: #0a1d7a;
        }

        .score-bar {
            width: 112px;
            height: 10px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            overflow: hidden;
        }

        .score-fill {
            height: 100%;
            background: #0a1d7a;
            border-radius: 10px;
            transition: width 0.6s ease;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border: 2px dashed #3675BE;
            border-radius: 30px;
            color: #3675BE;
            font-size: 16px;
        }

        /* Footer */
        footer {
            background: #000862;
            padding: 3rem 5%;
            text-align: center;
            color: white;
            margin-top: 6rem;
        }

        footer .logo {
            margin-bottom: 1.5rem;
        }

        footer .logo img {
            height: 50px;
            width: auto;
        }

        footer p {
            margin: 0.5rem 0;
            font-size: 18px;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 40px;
                line-height: 50px;
            }

            .hero-section p {
                font-size: 16px;
            }

            .leaderboard-wrapper {
                padding: 1.5rem;
                border-radius: 32px;
            }

            .leaderboard-item {
                padding: 1rem 1.5rem;
                gap: 1rem;
            }

            .campus-icon {
                width: 48px;
                height: 48px;
                min-width: 48px;
            }

            .campus-icon i {
                font-size: 20px;
            }

            .campus-rank-name {
                font-size: 16px;
            }

            .campus-emission {
                font-size: 12px;
            }

            .campus-score {
                font-size: 24px;
            }

            .score-bar {
                width: 96px;
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
    <!-- Hero Section -->
    <section class="hero-section">
        <h1>See your university's score and rank in the spirit of healthy competition!</h1>
        <p>
            Saksikan kontribusi kampus dan komunitasmu dalam menurunkan emisi karbon. Teruskan aksi hijau dan naikkan peringkat di leaderboard Nol Karbon!
        </p>
    </section>

    <!-- Leaderboard Section -->
    <section class="leaderboard-container">
        <div class="leaderboard-wrapper">
            <div class="leaderboard-items">
                <?php if (!empty($leaderboard)): ?>
                    <?php foreach ($leaderboard as $row): ?>
                        <article class="leaderboard-item">
                            <div class="campus-icon">
                                <i class="fa-solid fa-landmark"></i>
                            </div>
                            <div class="campus-info">
                                <p class="campus-rank-name">
                                    <?= $row['rank'] ?>. <?= htmlspecialchars($row['name']) ?>
                                </p>
                                <p class="campus-emission">Emisi <?= number_format($row['emission'], 0) ?> Kg CO₂</p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        Belum ada data komunitas untuk ditampilkan.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="logo">
            <img src="/images/logo.png" alt="Nol Karbon Logo">
        </div>
        <p>NolKarbon@gmail.com</p>
        <p>© 2025 Nol Karbon. All rights reserved.</p>
    </footer>
</body>
</html>