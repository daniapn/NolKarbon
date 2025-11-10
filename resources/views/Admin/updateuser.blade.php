<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NolKarbon - Edit User</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
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
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        /* Form Container */
        .form-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            position: relative;
        }

        /* Close Button */
        .close-btn {
            position: absolute;
            top: 25px;
            right: 25px;
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .close-btn:hover {
            background: #F5F5F5;
            border-radius: 50%;
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .form-icon {
            width: 50px;
            height: 50px;
            background: #001d5c;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-header-text h2 {
            font-size: 24px;
            color: #001d5c;
            font-weight: 700;
        }

        .form-subtitle {
            color: #666;
            font-size: 14px;
        }

        .form-subtitle-main {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #001d5c;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group label .required {
            color: #E53935;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 20px;
            border: 1px solid #E0E0E0;
            border-radius: 50px;
            font-size: 14px;
            font-family: 'Lexend', sans-serif;
            transition: all 0.3s;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #001d5c;
        }

        .form-group input::placeholder {
            color: #999;
        }

        /* Alert Messages */
        .alert {
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #E8F5E9;
            color: #388E3C;
            border: 1px solid #388E3C;
        }

        .alert-error {
            background: #FFEBEE;
            color: #D32F2F;
            border: 1px solid #D32F2F;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Form Note */
        .form-note {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .form-note svg {
            width: 16px;
            height: 16px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 14px 28px;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Lexend', sans-serif;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel {
            background: #E0E0E0;
            color: #666;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: #BDBDBD;
            text-decoration: none;
        }

        .btn-submit {
            background: #001d5c;
            color: white;
        }

        .btn-submit:hover {
            background: #003399;
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

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            .main-content {
                margin-left: 80px;
            }
            .nav-item span {
                display: none;
            }
            .form-container {
                padding: 25px;
            }
            .content {
                padding: 20px;
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

            <a href="{{ route('admin.usermanagement') }}" class="nav-item active">
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
                <h2>User Management</h2>
            </div>
            <div class="user-profile">
                <div class="user-avatar">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name ?? 'Miguel Alexandro' }}</div>
                    <div class="user-email">{{ Auth::user()->email ?? 'miguel@gmail.com' }}</div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="content">
            <div class="form-container">
                <!-- Close Button -->
                <a href="{{ route('admin.usermanagement') }}" class="close-btn">
                    <svg width="24" height="24" fill="#666" viewBox="0 0 24 24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </a>

                <!-- Form Header -->
                <div class="form-header">
                    <div class="form-icon">
                        <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="form-header-text">
                        <h2>Edit User</h2>
                        <p class="form-subtitle">Update user information</p>
                    </div>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('admin.updateuser.update', $user->idPengguna) }}">
                    @csrf
                    @method('PUT')

                    <!-- Full Name -->
                    <div class="form-group">
                        <label for="name">Full Name <span class="required">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Type your text here" value="{{ old('name', $user->username) }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Type your text here" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <!-- University -->
                    <div class="form-group">
                        <label for="universitas">University <span class="required">*</span></label>
                        <input type="text" id="universitas" name="universitas" placeholder="Type your text here" value="{{ old('universitas', $user->universitas) }}" required>
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role">
                            <option value="User" {{ old('role', $user->role) == 'User' ? 'selected' : '' }}>User</option>
                            <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Kontributor" {{ old('role', $user->role) == 'Kontributor' ? 'selected' : '' }}>Kontributor</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="Active" {{ old('status', $user->status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status', $user->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Form Note -->
                    <div class="form-note">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                        </svg>
                        <span>Input marked with * are required.</span>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.usermanagement') }}" class="btn btn-cancel">Cancel</a>
                        <button type="submit" class="btn btn-submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <img src="/images/logo.png" alt="NolKarbon Logo">
            <p>NolKarbon@gmail.com</p>
        </footer>
    </main>
</body>
</html>