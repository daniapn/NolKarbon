<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nol Karbon - Create Article</title>
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
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
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
            grid-column: span 2;
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

        .image-placeholder {
            color: #999;
            font-size: 14px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
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
            flex: 1;
        }

        .btn:hover {
            background: #3675BE;
            transform: translateY(-2px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        .btn-delete {
            background: #000862;
        }

        .btn-delete:hover {
            background: #8B0000;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

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
        <button class="logout-btn">Logout</button>
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
<form action="{{ route('kontributor.updatedraft', $artikel->idDraft) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')


<div class="form-grid">
<div class="form-section">
<div class="form-header">Judul</div>
<div class="form-body">
<input type="text" name="judul" value="{{ $artikel->judul }}" required>
</div>
</div>


<div class="form-section">
<div class="form-header">Gambar</div>
<div class="form-body" style="padding: 1rem;">
<label class="image-upload">
<img src="{{ $artikel->gambar ? asset('storage/'.$artikel->gambar) : 'https://placehold.co/400x200?text=No+Image' }}" alt="Article image">
<input type="file" name="gambar" accept="image/*">
</label>
</div>
</div>


<div class="form-section full-width">
<div class="form-header">Isi</div>
<div class="form-body">
<textarea name="isi" required>{{ $artikel->isi }}</textarea>
</div>
</div>
</div>


<div class="action-buttons">

    <!-- Simpan Draft -->
    <button class="btn" type="submit">Simpan Draft</button>

    <!-- Submit Draft -->
    <button class="btn"
        formaction="{{ route('kontributor.submitdraft', $artikel->idDraft) }}"
        formmethod="POST"
        onclick="event.preventDefault(); this.closest('form').submit();">
        Submit Draft
    </button>
</div>
</form> <!-- PENUTUP FORM UTAMA -->

<!-- Form Hapus (TERPISAH) -->
<form action="{{ route('kontributor.deletedraft', $artikel->idDraft) }}" method="POST" style="margin-top:10px;">
    @csrf
    @method('DELETE')
    <button class="btn btn-delete" onclick="return confirm('Hapus draft ini?')">
        Hapus Draft
    </button>
</form>

</div>
<footer>
<img class="footer-logo" src="/images/logo.png" alt="Nol Karbon Logo">
<p>NolKarbon@gmail.com</p>
</footer>
</body>
</html>