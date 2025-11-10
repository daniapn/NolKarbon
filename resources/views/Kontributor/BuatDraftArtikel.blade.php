<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontributor - Create Article</title>
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
            justify-content: flex-end;
            align-items: center;
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

        /* Form Container */
        .form-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 5%;
        }

        .form-card {
            background: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
            padding: 3rem;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 0.5fr 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .form-section.half-width {
            grid-column: span 1;
        }

        .form-section.medium-width {
            grid-column: span 1;
        }

        .form-section {
            background: white;
            border: 1px solid #000862;
            border-radius: 30px;
            overflow: hidden;
        }

        .form-header {
            background: #000862;
            color: #FDF3D6;
            font-size: 20px;
            padding: 1rem;
            text-align: center;
        }

        .form-body {
            padding: 2rem;
            min-height: 200px;
        }

        .form-section.full-width {
            grid-column: span 3;
        }

        /* Input Styles */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 1rem;
            font-family: 'Lexend', sans-serif;
            font-size: 16px;
            border: none;
            outline: none;
            resize: none;
        }

        input[type="text"]::placeholder,
        textarea::placeholder {
            color: #999;
        }

        textarea {
            min-height: 250px;
            max-height: 250px;
            overflow-y: auto;
        }

        /* Scrollbar */
        textarea::-webkit-scrollbar {
            width: 10px;
        }

        textarea::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 30px;
        }

        textarea::-webkit-scrollbar-thumb {
            background: #000862;
            border-radius: 30px;
        }

        /* Image Upload */
        .image-upload {
            width: 100%;
            height: 172px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .image-upload img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-upload input[type="file"] {
            display: none;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .btn {
            background: #000862;
            color: #FDF3D6;
            padding: 1rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 20px;
            font-family: 'Lexend', sans-serif;
            cursor: pointer;
            transition: all 0.3s;
            min-width: 200px;
        }

        .btn:hover {
            background: #3675BE;
            transform: translateY(-2px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
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

        footer .footer-logo {
            width: 120px;
            height: 50px;
        }

        /* SweetAlert Custom Styles */
        .swal2-popup {
            font-family: 'Lexend', sans-serif;
            border-radius: 25px !important;
            background: #ffffff !important;
            color: #000862 !important;
            border: 2px solid #000862 !important;
        }

        .swal2-title {
            font-weight: 700 !important;
            color: #000862 !important;
        }

        .swal2-html-container {
            color: #000862 !important;
            font-size: 16px;
        }

        .swal2-confirm {
            background-color: #000862 !important;
            color: #ffffff !important;
            border-radius: 20px !important;
            padding: 10px 25px !important;
            font-weight: 600;
        }

        .swal2-confirm:hover {
            background-color: #d65151 !important;
        }

        .swal2-cancel {
            background-color: #ffffff !important;
            border: 2px solid #000862 !important;
            color: #000862 !important;
            border-radius: 20px !important;
            padding: 10px 25px !important;
            font-weight: 600;
        }

        .swal2-cancel:hover {
            background-color: #c4dae6 !important;
        }

        .swal2-icon {
            border-color: #000862 !important;
            color: #000862 !important;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 40px;
                line-height: 50px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-section.half-width,
            .form-section.medium-width,
            .form-section.full-width {
                grid-column: span 1;
            }

            .action-buttons {
                flex-direction: column;
            }

            header {
                padding: 1.5rem 5%;
            }
        }
    </style>
</head>
<body>
    <header>
                    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="logout-btn" type="submit">Logout</button>
</form>
    </header>

    <div class="logo-section">
        <img src="/images/logo.png" alt="Nol Karbon Logo">
    </div>

    <section class="hero">
        <h1>Let's Contribute and Be Part<br>of <span class="highlight">Nol Karbon</span></h1>
        <p>Nol Karbon empowers you to take small yet meaningful actions for a cleaner, greener future.</p>
    </section>

    <div class="form-container">
        <div class="form-card">
            <form action="{{ route('kontributor.storedraft') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="form-section half-width">
                        <div class="form-header">ID Kontributor</div>
                        <div class="form-body">
                            <input type="text" name="idKontributor" placeholder="..." required>
                        </div>
                    </div>

                    <div class="form-section medium-width">
                        <div class="form-header">Judul</div>
                        <div class="form-body">
                            <input type="text" name="judul" placeholder="Masukkan judul artikel..." required>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-header">Gambar</div>
                        <div class="form-body" style="padding: 1rem;">
                            <label class="image-upload">
                                <img src="https://placehold.co/400x200?text=Upload+Image" id="preview-image" alt="Upload image">
                                <input type="file" name="gambar" id="image-input" accept="image/*">
                            </label>
                        </div>
                    </div>

                    <div class="form-section full-width">
                        <div class="form-header">Isi</div>
                        <div class="form-body">
                            <textarea name="isi" placeholder="Tulis konten artikel..." required></textarea>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button type="submit" class="btn">Simpan Draft</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <img class="footer-logo" src="/images/logo.png" alt="Nol Karbon Logo">
        <p>NolKarbon@gmail.com</p>
        <p>© 2025 Nol Karbon. All rights reserved.</p>
    </footer>

    <script>
        // Preview gambar
        const imgInput = document.getElementById('image-input');
        const previewImg = document.getElementById('preview-image');

        imgInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false,
            });
        @endif
    </script>
</body>
</html>