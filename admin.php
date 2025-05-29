<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <title>Dashboard Admin - SAKA | Sistem Aduan Kerosakan Aset</title>
  <style>
    :root {
      --primary: #3366CC;
      --primary-dark: #1E3A8A;
      --secondary: #C4D7FF;
      --secondary-light: #EEF2FF;
      --accent: #FFB347;
      --danger: #FF5A5A;
      --success: #4CAF50;
      --text-dark: #2D3748;
      --text-light: #718096;
      --white: #FFFFFF;
      --gray-100: #F7FAFC;
      --gray-200: #EDF2F7;
      --gray-300: #E2E8F0;
    }

    /* General Styles */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: var(--secondary-light);
      color: var(--text-dark);
    }

    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
      color: var(--primary-dark);
    }

    a {
      text-decoration: none;
      color: var(--primary);
      transition: all 0.3s ease;
    }

    a:hover {
      color: var(--primary-dark);
    }

    .btn {
      border-radius: 6px;
      font-weight: 600;
      padding: 10px 20px;
      transition: all 0.3s ease;
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(30, 58, 138, 0.15);
    }

    .btn-danger {
      background-color: var(--danger);
      border-color: var(--danger);
    }

    .btn-danger:hover {
      background-color: #E53E3E;
      border-color: #E53E3E;
    }

    .btn-outline-danger {
      color: var(--danger);
      border-color: var(--danger);
    }

    .btn-outline-danger:hover {
      color: white;
      background-color: var(--danger);
    }

    /* Navbar Styles */
    .navbar {
      background-color: var(--white);
      padding: 15px 0;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
      display: flex;
      align-items: center;
    }

    .brand-logo {
      display: flex;
      align-items: center;
    }

    .logo-image {
      height: 45px;
      margin-right: 12px;
    }

    .brand-text {
      display: flex;
      flex-direction: column;
    }

    .brand-name {
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--primary-dark);
      letter-spacing: 0.5px;
      margin: 0;
      line-height: 1.2;
    }

    .brand-tagline {
      font-size: 0.875rem;
      color: var(--text-light);
      font-weight: 500;
    }

    .navbar-links {
      list-style-type: none;
      display: flex;
      margin: 0;
      padding: 0;
      align-items: center;
    }

    .navbar-links li {
      margin-left: 20px;
    }

    .navbar-links .nav-link {
      font-size: 1rem;
      color: var(--text-dark);
      font-weight: 600;
    }

    .navbar-links .nav-link:hover {
      color: var(--primary);
    }

    .container-fluid {
      width: 90%;
      margin: auto;
      max-width: 1400px;
    }

    /* Banner Styles */
    #banner {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      padding: 60px 0;
      text-align: center;
      color: white;
      border-radius: 0 0 10px 10px;
      margin-bottom: 40px;
    }

    #banner h1 {
      color: white;
      font-size: 2.2rem;
      margin-bottom: 20px;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #banner p {
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.1rem;
      max-width: 800px;
      margin: 0 auto;
      line-height: 1.6;
    }

    .highlight {
      color: var(--accent);
      position: relative;
      display: inline-block;
    }

    .highlight::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 3px;
      background-color: var(--accent);
      border-radius: 3px;
    }

    /* Admin Header Section */
    .admin-header {
      background-color: var(--text-dark);
      color: var(--white);
      padding: 15px 0;
      text-align: center;
      margin-bottom: 40px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .admin-header h2 {
      color: white;
      margin: 0;
      font-size: 1.5rem;
    }

    .admin-header i {
      margin-right: 10px;
      color: var(--accent);
    }

    /* Dashboard Cards Section */
    .dashboard-section {
      padding: 0 0 50px 0;
    }

    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      margin-bottom: 40px;
    }

    .dashboard-card {
      background-color: var(--white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      border-top: 3px solid var(--primary);
    }

    .card-header {
      background-color: var(--secondary-light);
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid var(--gray-200);
    }

    .card-icon {
      width: 80px;
      height: 80px;
      margin: 0 auto 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: var(--white);
      border-radius: 50%;
      box-shadow: 0 5px 15px rgba(51, 102, 204, 0.15);
    }

    .card-icon i {
      font-size: 36px;
      color: var(--primary);
    }

    .card-body {
      padding: 20px;
      text-align: center;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card-title {
      margin-bottom: 15px;
      font-size: 1.25rem;
      color: var(--primary-dark);
    }

    .card-description {
      color: var(--text-light);
      margin-bottom: 25px;
      line-height: 1.5;
    }

    .card-action {
      margin-top: auto;
    }

    /* Stats Row */
    .stats-row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 40px;
    }

    .stat-card {
      background-color: var(--white);
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }

    .stat-value {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 5px;
    }

    .stat-label {
      color: var(--text-light);
      font-size: 0.9rem;
      font-weight: 500;
    }

    /* Footer Styles */
    .footer {
      background-color: var(--white);
      padding: 25px 0;
      text-align: center;
      color: var(--text-light);
      border-top: 1px solid var(--gray-200);
      margin-top: 40px;
    }

    .footer-content {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .footer-logo {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .footer-logo img {
      height: 30px;
      margin-right: 10px;
    }

    .footer-logo-text {
      font-weight: 700;
      font-size: 1.1rem;
      color: var(--primary-dark);
    }

    .footer-links {
      display: flex;
      gap: 20px;
      margin: 15px 0;
    }

    .footer-links a {
      color: var(--text-light);
      font-size: 0.9rem;
    }

    .footer-links a:hover {
      color: var(--primary);
    }

    .footer-copyright {
      font-size: 0.9rem;
      margin-top: 15px;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
      .container-fluid {
        width: 95%;
      }
      
      #banner {
        padding: 40px 0;
      }
      
      #banner h1 {
        font-size: 1.8rem;
      }
    }

    @media (max-width: 768px) {
      .navbar {
        padding: 10px 0;
      }
      
      .brand-name {
        font-size: 1.3rem;
      }
      
      .brand-tagline {
        font-size: 0.75rem;
      }
      
      .logo-image {
        height: 40px;
      }
      
      #banner h1 {
        font-size: 1.5rem;
      }
      
      #banner p {
        font-size: 1rem;
      }
      
      .admin-header h2 {
        font-size: 1.3rem;
      }
    }

    @media (max-width: 576px) {
      .container-fluid {
        width: 92%;
      }
      
      .navbar-brand {
        max-width: 200px;
      }
      
      .brand-tagline {
        display: none;
      }
      
      .dashboard-cards {
        grid-template-columns: 1fr;
      }
      
      .stats-row {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="brand-logo">
        <img src="img/logo.png" alt="Logo Sistem" class="logo-image">
        <div class="brand-text">
          <div class="brand-name">SAKA</div>
          <div class="brand-tagline">Sistem Aduan Kerosakan Aset</div>
        </div>
      </div>
      <ul class="navbar-links">
        <li><a href="index.php" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt me-1"></i> Log Keluar</a></li>
      </ul>
    </div>
  </nav>

  <!-- Banner -->
  <section id="banner">
    <div class="container">
      <h1>Selamat Datang ke <span class="highlight">Dashboard Pentadbir</span></h1>
      <p>Sistem Aduan Kerosakan Aset (SAKA) adalah platform yang memudahkan pelajar, pensyarah dan kakitangan di ILP Kuala Langat Selangor mengisi dan mengesahkan borang kerosakan aset secara digital.</p>
    </div>
  </section>

  <!-- Admin Header -->
  <div class="container">
    <div class="admin-header">
      <i class="fas fa-user-shield fa-lg"></i>
      <h2>PANEL KAWALAN PENTADBIR</h2>
    </div>
  </div>

  <!-- Stats Overview -->
  <section class="dashboard-section">
    <div class="container">
      <div class="stats-row">
        <div class="stat-card">
          <i class="fas fa-exclamation-circle fa-2x mb-3" style="color: var(--danger);"></i>
          <div class="stat-value">12</div>
          <div class="stat-label">Aduan Belum Selesai</div>
        </div>
        <div class="stat-card">
          <i class="fas fa-clock fa-2x mb-3" style="color: var(--accent);"></i>
          <div class="stat-value">5</div>
          <div class="stat-label">Aduan Dalam Proses</div>
        </div>
        <div class="stat-card">
          <i class="fas fa-check-circle fa-2x mb-3" style="color: var(--success);"></i>
          <div class="stat-value">43</div>
          <div class="stat-label">Aduan Selesai</div>
        </div>
        <div class="stat-card">
          <i class="fas fa-users fa-2x mb-3" style="color: var(--primary);"></i>
          <div class="stat-value">58</div>
          <div class="stat-label">Jumlah Pengguna</div>
        </div>
      </div>

      <div class="dashboard-cards">
        <div class="dashboard-card">
          <div class="card-header">
            <div class="card-icon">
              <i class="fas fa-user-plus"></i>
            </div>
          </div>
          <div class="card-body">
            <h3 class="card-title">DAFTAR PENGGUNA</h3>
            <p class="card-description">Daftar pengguna baru atau urus akaun sedia ada dalam sistem.</p>
            <div class="card-action">
              <a href="pilih_daftar.php" class="btn btn-primary">Akses Pendaftaran</a>
            </div>
          </div>
        </div>

        <div class="dashboard-card">
          <div class="card-header">
            <div class="card-icon">
              <i class="fas fa-clipboard-list"></i>
            </div>
          </div>
          <div class="card-body">
            <h3 class="card-title">ADUAN PENGGUNA</h3>
            <p class="card-description">Semak dan proses aduan kerosakan aset daripada pengguna.</p>
            <div class="card-action">
              <a href="maklumat_user.php" class="btn btn-primary">Lihat Aduan</a>
            </div>
          </div>
        </div>

        <div class="dashboard-card">
          <div class="card-header">
            <div class="card-icon">
              <i class="fas fa-chart-bar"></i>
            </div>
          </div>
          <div class="card-body">
            <h3 class="card-title">LAPORAN</h3>
            <p class="card-description">Jana dan lihat laporan analitik mengenai aduan dan penyelesaian.</p>
            <div class="card-action">
              <a href="laporan_admin.php" class="btn btn-primary">Akses Laporan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-logo">
          <img src="img/logo.png" alt="Logo Sistem" height="30">
          <span class="footer-logo-text">SAKA</span>
        </div>
        
        <div class="footer-copyright">
          ILP Kuala Langat Selangor &copy; 2025 Sistem Aduan Kerosakan Aset (SAKA). Hak Cipta Terpelihara.
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>