<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Reports - Nol Karbon</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;300;400;500;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Lexend', sans-serif;
            background: #EEE8DF;
            overflow-x: hidden;
        }
        
        .sidebar {
            width: 230px;
            height: 100vh;
            background: #000862;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
        }
        
        .logo {
            padding: 18px 20px;
            margin-bottom: 50px;
        }
        
        .logo-text {
            color: white;
            font-size: 28px;
            font-weight: 700;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            margin: 8px 20px;
            border-radius: 12px;
            transition: all 0.3s;
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .nav-item.active {
            background: rgba(253, 243, 214, 0.60);
            color: #000862;
        }
        
        .nav-icon {
            width: 28px;
            height: 28px;
            margin-right: 15px;
        }
        
        .divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.3);
            margin: 30px 20px;
        }
        
        .logout-btn {
            position: absolute;
            bottom: 30px;
            left: 20px;
            right: 20px;
            background: #CFE1F4;
            border: 1px solid #86654B;
            border-radius: 100px;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        
        .logout-btn span {
            color: black;
            font-size: 18px;
            font-weight: 600;
        }
        
        .main-content {
            margin-left: 230px;
            min-height: 100vh;
        }
        
        .header {
            background: white;
            padding: 30px 40px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-title {
            color: #000862;
            font-size: 28px;
            font-weight: 600;
            line-height: 1.2;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(238, 232, 223, 0.30);
            padding: 12px 24px;
            border-radius: 100px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        
        .user-avatar {
            width: 48px;
            height: 48px;
            background: #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .user-info {
            text-align: left;
        }
        
        .user-name {
            color: #000862;
            font-size: 15px;
            font-weight: 500;
        }
        
        .user-email {
            color: #000862;
            font-size: 12px;
            font-weight: 100;
        }
        
        .content-section {
            padding: 40px;
        }
        
        .section-title {
            text-align: center;
            color: black;
            font-size: 40px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            margin-bottom: 30px;
            letter-spacing: 0.8px;
        }
        
        .data-table {
            background: #FFFDFD;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 50px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            border-bottom: 1px solid rgba(0, 8, 98, 0.50);
        }
        
        th {
            color: #000862;
            font-size: 20px;
            font-weight: 600;
            padding: 20px;
            text-align: left;
        }
        
        tr {
            border-bottom: 1px solid rgba(0, 8, 98, 0.50);
        }
        
        tbody tr:last-child {
            border-bottom: none;
        }
        
        td {
            padding: 20px;
            color: #000862;
            font-size: 12px;
            font-weight: 500;
        }
        
        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .user-icon {
            width: 29px;
            height: 29px;
            border: 1.5px solid black;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        
        .status-badge {
            background: #CFE1F4;
            padding: 4px 12px;
            border-radius: 15px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
        }
        
        .status-dot {
            width: 10px;
            height: 10px;
            background: #000862;
            border-radius: 50%;
        }
        
        .point-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .star-icon {
            color: #FFD660;
            font-size: 18px;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 20px;
            font-size: 14px;
            color: #000862;
        }
        
        .pagination button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #000862;
        }
        
        .user-activity-btn {
            background: #000862;
            color: white;
            padding: 12px 24px;
            border-radius: 100px;
            border: none;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            float: right;
            margin-top: 20px;
        }
        
        .footer {
            background: #000862;
            padding: 60px;
            text-align: center;
            color: #FDF3D6;
            margin-left: -230px;
        }
        
        .footer-logo {
            margin-bottom: 20px;
        }
        
        .footer-contact {
            font-size: 18px;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <div class="logo-text">NOL<br>KARBON</div>
        </div>
        
        <div class="divider"></div>
        
        <a href="#" class="nav-item">
            <span class="nav-icon">📊</span>
            Dashboard
        </a>
        
        <a href="#" class="nav-item">
            <span class="nav-icon">👥</span>
            User Management
        </a>
        
        <a href="#" class="nav-item">
            <span class="nav-icon">🏢</span>
            Communities
        </a>
        
        <a href="#" class="nav-item">
            <span class="nav-icon">📄</span>
            Content
        </a>
        
        <a href="#" class="nav-item">
            <span class="nav-icon">🎮</span>
            Challenges
        </a>
        
        <a href="#" class="nav-item active">
            <span class="nav-icon">📈</span>
            Reports
        </a>
        
        <a href="#" class="nav-item">
            <span class="nav-icon">💳</span>
            Emission Card
        </a>
        
        <button class="logout-btn">
            <span>↪</span>
            <span>Logout</span>
        </button>
    </div>
    
    <div class="main-content">
        <div class="header">
            <div class="header-title">Management<br>Reports</div>
            <div class="user-profile">
                <div class="user-avatar">👤</div>
                <div class="user-info">
                    <div class="user-name">Miguel Alexandro</div>
                    <div class="user-email">miguel@gmail.com</div>
                </div>
            </div>
        </div>
        
        <div class="content-section">
            <h1 class="section-title">Explore Emission Insights</h1>
            
            <div class="data-table">
                <table>
                    <thead>
                        <tr>
                            <th>University</th>
                            <th>Emissions Total</th>
                            <th>Average monthly emissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Brawijaya University
                                </div>
                            </td>
                            <td>1050 Kg CO2</td>
                            <td>763 Kg CO2</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Indosian University
                                </div>
                            </td>
                            <td>1050 kg CO2</td>
                            <td>763 Kg CO2</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Airlangga University
                                </div>
                            </td>
                            <td>1050 Kg CO2</td>
                            <td>763 Kg CO2</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Gadjah Mada University
                                </div>
                            </td>
                            <td>1050 Kg CO2</td>
                            <td>763 Kg CO2</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="pagination">
                    <button>‹</button>
                    <span>1</span>
                    <span>2</span>
                    <span>...</span>
                    <span>5</span>
                    <button>›</button>
                </div>
            </div>
            
            <h1 class="section-title">Challenge Participation</h1>
            
            <div class="data-table">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Peserta</th>
                            <th>Nama Challenge</th>
                            <th>Point</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Kucing Marah
                                </div>
                            </td>
                            <td>Sepeda 30 Hari</td>
                            <td>
                                <div class="point-cell">
                                    <span class="star-icon">⭐</span>
                                    95 Point
                                </div>
                            </td>
                            <td>
                                <span class="status-badge">
                                    <span class="status-dot"></span>
                                    Active
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Kucing Marah
                                </div>
                            </td>
                            <td>Sepeda 30 Hari</td>
                            <td>
                                <div class="point-cell">
                                    <span class="star-icon">⭐</span>
                                    95 Point
                                </div>
                            </td>
                            <td>
                                <span class="status-badge">
                                    <span class="status-dot"></span>
                                    Active
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Kucing Marah
                                </div>
                            </td>
                            <td>Sepeda 30 Hari</td>
                            <td>
                                <div class="point-cell">
                                    <span class="star-icon">⭐</span>
                                    95 Point
                                </div>
                            </td>
                            <td>
                                <span class="status-badge">
                                    <span class="status-dot"></span>
                                    Active
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <span class="user-icon">👤</span>
                                    Kucing Marah
                                </div>
                            </td>
                            <td>Sepeda 30 Hari</td>
                            <td>
                                <div class="point-cell">
                                    <span class="star-icon">⭐</span>
                                    95 Point
                                </div>
                            </td>
                            <td>
                                <span class="status-badge">
                                    <span class="status-dot"></span>
                                    Active
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="pagination">
                    <button>‹</button>
                    <span>1</span>
                    <span>2</span>
                    <span>...</span>
                    <span>5</span>
                    <button>›</button>
                </div>
                
                <button class="user-activity-btn">User Activity</button>
            </div>
        </div>
        
        <div class="footer">
            <div class="footer-logo">
                <div style="font-size: 32px; font-weight: 700; margin-bottom: 10px;">NOL KARBON</div>
            </div>
            <div class="footer-contact">Contact Us</div>
        </div>
    </div>
</body>
</html>