<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Dashboard - Nol Karbon</title>
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

        /* Dashboard Section */
        .dashboard-container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 0 5%;
        }

        .dashboard-wrapper {
            background: white;
            border: 1px solid #3675BE;
            border-radius: 48px;
            padding: 2.5rem;
            box-shadow: 0px 12px 24px rgba(9, 27, 121, 0.12);
        }

        .dashboard-items {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .dashboard-item {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            background: linear-gradient(135deg, #d8ddff 0%, #e8ebff 100%);
            border: 1px solid #c4ccff;
            border-radius: 32px;
            padding: 1.5rem 2rem;
            box-shadow: 0 12px 24px rgba(9, 27, 121, 0.12);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dashboard-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(9, 27, 121, 0.18);
        }

        .member-info {
            flex: 1;
        }

        .member-name {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: #000862;
            margin-bottom: 0.5rem;
        }

        .community-name {
            font-size: 14px;
            color: #64748b;
        }

        .member-points {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: #0a1d7a;
            align-self: flex-start;
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
        @media (min-width: 640px) {
            .dashboard-item {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .member-points {
                align-self: center;
            }
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 40px;
                line-height: 50px;
            }

            .hero-section p {
                font-size: 16px;
            }

            .dashboard-wrapper {
                padding: 1.5rem;
                border-radius: 32px;
            }

            .dashboard-item {
                padding: 1.25rem 1.5rem;
            }

            .member-name {
                font-size: 18px;
            }

            .community-name {
                font-size: 13px;
            }

            .member-points {
                font-size: 24px;
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
        <h1>View Community Dashboard</h1>
        <p>
            Kenali kontributor terbaik dari setiap komunitas kampus dan lihat bagaimana poin mereka menumbuhkan gerakan Nol Karbon.
        </p>
    </section>

    <!-- Dashboard Section -->
    <section class="dashboard-container">
        <div class="dashboard-wrapper">
            <div class="dashboard-items">
                <?php if (!empty($entries)): ?>
                    <?php foreach ($entries as $entry): ?>
                        <article class="dashboard-item">
                            <div class="member-info">
                                <p class="member-name">
                                    <?= $entry['rank'] ?>. <?= htmlspecialchars($entry['member']) ?>
                                </p>
                                <p class="community-name"><?= htmlspecialchars($entry['community']) ?></p>
                            </div>
                            <span class="member-points">
                                <?= number_format($entry['points'], 0, ',', '.') ?> poin
                            </span>
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