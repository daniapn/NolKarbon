<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - Review Draft</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lexend', sans-serif;
            display: flex;
            min-height: 100vh;
            background: #EEE8DF;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            overflow-y: auto;
        }

        .logo-sidebar {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-sidebar img {
            width: 140px;
            height: auto;
        }

        .nav-menu {
            flex: 1;
            padding: 20px 15px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            margin-bottom: 10px;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            transition: all 0.3s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-item.active {
            background: #C5CAE9;
            color: #001d5c;
        }

        .nav-item svg {
            width: 24px;
            height: 24px;
        }

        /* Logout Button */
        .logout-btn {
            margin: 20px 15px;
            padding: 12px 20px;
            background: white;
            color: #001d5c;
            border: none;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            font-family: 'Lexend', sans-serif;
            font-weight: 600;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: #f0f0f0;
        }

        /* Main Content */
        .main-content {
            margin-left: 230px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .header-left h2 {
            font-size: 28px;
            color: #001d5c;
            font-weight: 600;
        }

        .header-left p {
            font-size: 24px;
            color: #000;
            margin-top: 5px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 8px 15px;
            border-radius: 50px;
            border: 2px solid #E0E0E0;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #001d5c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .user-info {
            text-align: left;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
            color: #001d5c;
        }

        .user-email {
            font-size: 12px;
            color: #666;
        }

        /* Content */
        .content {
            padding: 40px;
            flex: 1;
            overflow-y: auto;
        }

        .page-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-title h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 48px;
            font-weight: 700;
            color: #000;
            line-height: 1.3;
            margin-bottom: 0.5rem;
        }

        .page-title .highlight {
            color: #3675BE;
        }

        /* Draft Card */
        .draft-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            max-width: 800px;
            margin: 0 auto;
        }

        .draft-image-container {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
            align-items: start;
        }

        .draft-image {
            width: 200px;
            height: 150px;
            border-radius: 15px;
            overflow: hidden;
        }

        .draft-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .draft-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            color: #000;
            line-height: 1.4;
        }

        .draft-content {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            text-align: justify;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2.5rem;
        }

        .btn {
            padding: 12px 32px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Lexend', sans-serif;
        }

        .btn-revisi {
            background: #001d5c;
            color: white;
        }

        .btn-revisi:hover {
            background: #003399;
            transform: translateY(-2px);
        }

        .btn-tolak {
            background: #001d5c;
            color: white;
        }

        .btn-tolak:hover {
            background: #003399;
            transform: translateY(-2px);
        }

        .btn-approve {
            background: #001d5c;
            color: white;
        }

        .btn-approve:hover {
            background: #003399;
            transform: translateY(-2px);
        }

        /* Hidden Form Elements */
        textarea {
            display: none;
        }

        form {
            display: none;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #001d5c 0%, #003399 100%);
            padding: 30px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        footer img {
            width: 150px;
            height: auto;
        }

        footer p {
            color: white;
            font-size: 16px;
        }

        @media (max-width: 968px) {
            .sidebar {
                width: 80px;
            }
            .main-content {
                margin-left: 80px;
            }
            .nav-item span {
                display: none;
            }
            .logo-sidebar img {
                width: 50px;
            }
            .draft-image-container {
                grid-template-columns: 1fr;
            }
            .page-title h1 {
                font-size: 32px;
            }
            .action-buttons {
                flex-direction: column;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
    <style>
        .swal2-popup {
            font-family: 'Lexend', sans-serif;
            border-radius: 25px !important;
            background: #ffffffff !important;
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
            color: #ffffffff !important;
            border-radius: 20px !important;
            padding: 10px 25px !important;
            font-weight: 600;
        }

        .swal2-confirm:hover {
            background-color: #d65151ff !important;
        }

        .swal2-cancel {
            background-color: #ffffffff !important;
            border: 2px solid #000862 !important;
            color: #000862 !important;
            border-radius: 20px !important;
            padding: 10px 25px !important;
            font-weight: 600;
        }

        .swal2-cancel:hover {
            background-color: #c4dae6ff !important;
        }

        .swal2-icon {
            border-color: #000862 !important;
            color: #000862 !important;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo-sidebar">
            <img src="/images/logo.png" alt="NolKarbon Logo">
        </div>

        <nav class="nav-menu">
            <a href="{{ route('admin.dashboardadmin') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.usermanagement') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span>User Management</span>
            </a>

            <a href="{{ route('admin.reviewdraft') }}" class="nav-item active">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                </svg>
                <span>Review Draft</span>
            </a>

            <a href="#challenges" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H3V8h18v8zM6 15h2v-2H6v2zm0-3h2v-2H6v2zm3 3h8v-2H9v2zm0-3h8v-2H9v2z"/>
                </svg>
                <span>Challenges</span>
            </a>

            <a href="{{ route('admin.reports.index') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/>
                </svg>
                <span>Reports</span>
            </a>

            <a href="#emission" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                </svg>
                <span>Emission Card</span>
            </a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h2>Review Draft</h2>
            </div>
            <div class="header-right">
                <div class="user-profile">
                    <div class="user-avatar">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="user-info">
                        <div class="user-name">Miguel Alexandro</div>
                        <div class="user-email">miguel@gmail.com</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="content">
            <!-- Page Title -->
            <div class="page-title">
                <h1>Let's Review our<br>Contributor Article Draft<br>on <span class="highlight">Nol Karbon</span></h1>
            </div>

            <!-- Draft Card -->
            <div class="draft-card">
                <div class="draft-image-container">
                    <div class="draft-image">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel">
                    </div>
                    <div>
                        <h3 class="draft-title">{{ $artikel->judul }}</h3>
                    </div>
                </div>

                <div class="draft-content">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>

                <div class="action-buttons">
                    <button class="btn btn-revisi" id="btnRevisi">Minta Revisi</button>
                    <button class="btn btn-tolak" id="btnTolak">Tolak Draft</button>
                    <button class="btn btn-approve" id="btnApprove">Approve Draft</button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>NolKarbon@gmail.com</p>
        </footer>
    </main>

    <!-- Hidden Forms -->
    <form action="{{ route('admin.approve', $artikel->idDraft) }}" method="POST" id="formApprove">
        @csrf
    </form>

    <form action="{{ route('admin.revisi', $artikel->idDraft) }}" method="POST" id="formRevisi">
        @csrf
        <input type="hidden" name="catatan" id="catatanRevisi">
    </form>

    <form action="{{ route('admin.tolak', $artikel->idDraft) }}" method="POST" id="formTolak">
        @csrf
        <input type="hidden" name="catatan" id="catatanTolak">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formApprove = document.getElementById('formApprove');
            const formRevisi = document.getElementById('formRevisi');
            const formTolak = document.getElementById('formTolak');

            // === BUTTON REVISI ===
            document.getElementById('btnRevisi').addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Kirim permintaan revisi?',
                    text: 'Artikel ini akan dikembalikan ke kontributor untuk diperbaiki.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ffb300',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, kirim revisi'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Catatan Revisi',
                            input: 'textarea',
                            inputPlaceholder: 'Tuliskan catatan revisi Anda di sini...',
                            showCancelButton: true,
                            confirmButtonText: 'Kirim',
                            preConfirm: (value) => {
                                if (!value) Swal.showValidationMessage('Catatan revisi wajib diisi!');
                                return value;
                            }
                        }).then((note) => {
                            if (note.isConfirmed) {
                                document.getElementById('catatanRevisi').value = note.value;
                                formRevisi.submit();
                            }
                        });
                    }
                });
            });

            // === BUTTON TOLAK ===
            document.getElementById('btnTolak').addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Tolak draft ini?',
                    text: 'Draft akan ditolak dan tidak bisa diubah lagi.',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#e53935',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, tolak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Catatan Penolakan',
                            input: 'textarea',
                            inputPlaceholder: 'Tuliskan alasan penolakan...',
                            showCancelButton: true,
                            confirmButtonText: 'Kirim',
                            preConfirm: (value) => {
                                if (!value) Swal.showValidationMessage('Catatan penolakan wajib diisi!');
                                return value;
                            }
                        }).then((note) => {
                            if (note.isConfirmed) {
                                document.getElementById('catatanTolak').value = note.value;
                                formTolak.submit();
                            }
                        });
                    }
                });
            });

            // === BUTTON APPROVE ===
            document.getElementById('btnApprove').addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Setujui dan publish draft ini?',
                    text: 'Artikel akan dipublish ke halaman utama.',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#43a047',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, publish'
                }).then((result) => {
                    if (result.isConfirmed) {
                        formApprove.submit();
                    }
                });
            });

            // === ALERT JIKA BERHASIL ===
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#001d5c'
                });
            @endif
        });
    </script>

</body>
</html>