<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - Edit Tantangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
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
            min-height: 100vh;
            display: flex;
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
            z-index: 1000;
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

        .logout-btn svg {
            width: 20px;
            height: 20px;
        }

        /* Main Content */
        .main-content {
            margin-left: 230px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left h2 {
            font-size: 28px;
            color: #001d5c;
            font-weight: 600;
            margin: 0;
        }

        .header-subtitle {
            font-size: 14px;
            color: #64748b;
            margin-top: 4px;
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
            font-weight: 600;
            font-size: 16px;
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
            flex: 1;
            padding: 40px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #1e40af;
            text-decoration: none;
            margin-bottom: 24px;
            font-size: 13px;
            font-weight: 600;
            padding: 10px 20px;
            border: 1px solid #93c5fd;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .back-link:hover {
            background: #dbeafe;
        }

        /* Challenge Section */
        .challenge-section {
            background: #d9cdb8;
            border-radius: 48px;
            padding: 40px;
        }

        .section-title {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid white;
            border-radius: 24px;
            padding: 16px;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3em;
            color: #1e40af;
            margin-bottom: 32px;
        }

        /* Form Layout */
        .form-layout {
            display: grid;
            gap: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .form-card-header {
            background: #1e40af;
            color: white;
            padding: 12px 24px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-card-body {
            padding: 24px;
        }

        .form-field {
            margin-bottom: 20px;
        }

        .form-field:last-child {
            margin-bottom: 0;
        }

        .form-field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .form-field input[type="text"],
        .form-field input[type="number"],
        .form-field input[type="date"],
        .form-field select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Lexend', sans-serif;
            font-size: 14px;
            color: #334155;
            background: white;
        }

        .form-field input:focus,
        .form-field select:focus,
        .form-field textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-field textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Lexend', sans-serif;
            font-size: 14px;
            color: #334155;
            background: white;
            resize: vertical;
            min-height: 100px;
        }

        .form-field input::placeholder,
        .form-field textarea::placeholder {
            color: #94a3b8;
        }

        /* File Upload */
        .file-upload-btn {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            font-family: 'Lexend', sans-serif;
            font-size: 14px;
            color: #64748b;
            text-align: left;
        }

        .file-upload-input {
            display: none;
        }

        .upload-hint {
            margin-top: 12px;
            font-size: 12px;
            color: #3b82f6;
            text-align: center;
        }

        /* Status Buttons */
        .status-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .status-btn {
            padding: 10px 20px;
            border: 2px solid #cbd5e1;
            border-radius: 50px;
            background: white;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Lexend', sans-serif;
        }

        .status-btn:hover {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        .status-btn.active {
            background: #dbeafe;
            color: #1e40af;
            border-color: #3b82f6;
        }

        /* Two Column Grid */
        .two-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Full Width */
        .full-width {
            grid-column: 1 / -1;
        }

        /* Footer Actions */
        .footer-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 32px;
            gap: 16px;
        }

        .btn-cancel {
            padding: 12px 28px;
            background: white;
            color: #1e40af;
            border: 2px solid #1e40af;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Lexend', sans-serif;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            background: #dbeafe;
        }

        .btn-submit {
            padding: 12px 32px;
            background: #1e40af;
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Lexend', sans-serif;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: #1e3a8a;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(30, 64, 175, 0.3);
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
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .form-row,
            .two-cols {
                grid-template-columns: 1fr;
            }
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
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .challenge-section {
                padding: 24px;
                border-radius: 32px;
            }

            .footer-actions {
                flex-direction: column-reverse;
            }

            .btn-cancel,
            .btn-submit {
                width: 100%;
                justify-content: center;
            }

            footer {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
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

            <a href="{{ route('admin.reviewdraft') }}" class="nav-item">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                </svg>
                <span>Review Draft</span>
            </a>

            <a href="{{ route('admin.challenges.index') }}" class="nav-item active">
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
                <svg fill="currentColor" viewBox="0 0 24 24">
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
                <h2>Edit Tantangan</h2>
                <p class="header-subtitle">Perbarui data tantangan untuk memastikan informasi tetap relevan.</p>
            </div>
        </header>

        <!-- Content -->
        <div class="content">
            <a href="{{ route('admin.challenges.show', $challenge) }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali ke detail
            </a>

            <section class="challenge-section">
                <div class="section-title">
                    EDIT CHALLENGE
                </div>

                <form method="POST" action="{{ route('admin.challenges.update', $challenge) }}" enctype="multipart/form-data" class="form-layout">
                    @csrf
                    @method('PUT')
                    
                    <!-- Title & Picture Row -->
                    <div class="form-row">
                        <!-- Title Section -->
                        <div class="form-card">
                            <div class="form-card-header">TITLE</div>
                            <div class="form-card-body">
                                <div class="form-field">
                                    <label>Judul Tantangan*</label>
                                    <input type="text" name="title" required value="{{ old('title', $challenge->title) }}">
                                </div>
                                <div class="form-field">
                                    <label>Slug</label>
                                    <input type="text" name="slug" placeholder="otomatis bila dikosongkan" value="{{ old('slug', $challenge->slug) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Picture Section -->
                        <div class="form-card">
                            <div class="form-card-header">PICTURE</div>
                            <div class="form-card-body">
                                <div class="form-field">
                                    <label>Cover Image</label>
                                    <button type="button" class="file-upload-btn" onclick="document.getElementById('cover_image').click()">
                                        Choose File No file chosen
                                    </button>
                                    <input type="file" id="cover_image" name="cover_image" class="file-upload-input" accept="image/*">
                                    <div class="upload-hint">
                                        Pratinjau otomatis setelah menyimpan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="form-card full-width">
                        <div class="form-card-header">DESCRIPTION</div>
                        <div class="form-card-body">
                            <div class="form-field">
                                <label>Deskripsi</label>
                                <textarea name="description" placeholder="Ceritakan tujuan dan dampak tantangan">{{ old('description', $challenge->description) }}</textarea>
                            </div>
                            <div class="form-field">
                                <label>Instruksi Peserta</label>
                                <textarea name="instruction" placeholder="Langkah-langkah, cara melapor, dsb.">{{ old('instruction', $challenge->instruction) }}</textarea>
                            </div>
                            <div class="form-field">
                                <label>Requirement (pisahkan baris)</label>
                                <textarea name="requirement" placeholder="Contoh:&#10;- Upload bukti foto mingguan&#10;- Catat pengurangan emisi">{{ old('requirement', $challenge->requirement) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Duration & Reward Section -->
                    <div class="form-card full-width">
                        <div class="form-card-header">DURATION & REWARD</div>
                        <div class="form-card-body">
                            <div class="two-cols">
                                <div class="form-field">
                                    <label>Mulai</label>
                                    <input type="date" name="start_date" value="{{ old('start_date', $challenge->start_date) }}">
                                </div>
                                <div class="form-field">
                                    <label>Berakhir</label>
                                    <input type="date" name="end_date" value="{{ old('end_date', $challenge->end_date) }}">
                                </div>
                            </div>

                            <div class="two-cols">
                                <div class="form-field">
                                    <label>Poin Reward*</label>
                                    <input type="number" name="point_reward" placeholder="0" value="{{ old('point_reward', $challenge->point_reward) }}" min="0" required>
                                </div>
                                <div class="form-field">
                                    <label>Bonus Poin</label>
                                    <input type="number" name="bonus_point" placeholder="0" value="{{ old('bonus_point', $challenge->bonus_point) }}" min="0">
                                </div>
                            </div>

                            <div class="two-cols">
                                <div class="form-field">
                                    <label>Kuota Peserta</label>
                                    <input type="text" name="participant_quota" placeholder="Kosongkan jika tidak dibatasi" value="{{ old('participant_quota', $challenge->participant_quota) }}">
                                </div>
                                <div class="form-field">
                                    <label>Visibilitas</label>
                                    <select name="visibility">
                                        <option value="public" {{ old('visibility', $challenge->visibility) == 'public' ? 'selected' : '' }}>Publik</option>
                                        <option value="private" {{ old('visibility', $challenge->visibility) == 'private' ? 'selected' : '' }}>Privat</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-field">
                                <label>Status</label>
                                <div class="status-buttons">
                                    <button type="button" class="status-btn {{ old('status', $challenge->status) == 'draft' ? 'active' : '' }}" data-status="draft">Draft</button>
                                    <button type="button" class="status-btn {{ old('status', $challenge->status) == 'upcoming' ? 'active' : '' }}" data-status="upcoming">Mendatang</button>
                                    <button type="button" class="status-btn {{ old('status', $challenge->status) == 'active' ? 'active' : '' }}" data-status="active">Aktif</button>
                                    <button type="button" class="status-btn {{ old('status', $challenge->status) == 'completed' ? 'active' : '' }}" data-status="completed">Selesai</button>
                                    <button type="button" class="status-btn {{ old('status', $challenge->status) == 'archived' ? 'active' : '' }}" data-status="archived">Arsip</button>
                                </div>
                                <input type="hidden" name="status" value="{{ old('status', $challenge->status) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="footer-actions">
                        <a href="{{ route('admin.challenges.show', $challenge) }}" class="btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save"></i> Update Challenge
                        </button>
                    </div>
                </form>
            </section>
        </div>

        <!-- Footer -->
        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>NolKarbon@gmail.com</p>
        </footer>
    </main>

    <script>
        // Status button toggle
        document.querySelectorAll('.status-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                document.querySelectorAll('.status-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                document.querySelector('input[name="status"]').value = btn.dataset.status;
            });
        });

        // File upload display
        document.getElementById('cover_image').addEventListener('change', (e) => {
            const fileName = e.target.files[0]?.name || 'Choose File No file chosen';
            document.querySelector('.file-upload-btn').textContent = fileName;
        });
    </script>
</body>
</html>