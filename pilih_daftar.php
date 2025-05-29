<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <title>SAKA | Sistem Aduan Kerosakan Aset</title>
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

    * {
      box-sizing: border-box;
    }

    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
      color: var(--primary-dark);
    }

    a {
      text-decoration: none;
      color: var(--text-dark);
      transition: all 0.3s ease;
    }

    a:hover {
      color: var(--primary);
      transform: translateY(-3px);
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
      color: var(--white);
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(30, 58, 138, 0.15);
    }

    .btn-outline-danger {
      color: var(--danger);
      border-color: var(--danger);
      padding: 8px 16px;
      font-size: 1.1rem;
    }

    .btn-outline-danger:hover {
      color: var(--white);
      background-color: var(--danger);
    }

    .container-fluid {
      width: 90%;
      margin: auto;
      max-width: 1400px;
    }

    /* Navbar Styles */
    .navbar {
      background-color: var(--white);
      padding: 15px 0;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .navbar .container-fluid {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      height: 60px;
      margin-right: 15px;
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

    #kembali {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 1.2rem;
      padding: 0;
    }

    #kembali b {
      margin-top: -2px;
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
    #newsletter {
      background-color: var(--text-dark);
      color: var(--white);
      padding: 15px 0;
      text-align: center;
      margin-bottom: 40px;
      border-radius: 8px;
    }

    #newsletter h1 {
      color: white;
      margin: 0;
      font-size: 1.8rem;
    }

    /* Boxes Section */
    #boxes {
      padding: 30px 0 60px;
    }

    #boxes .container {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    #boxes .box {
      width: 280px;
      background-color: var(--white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      text-align: center;
      padding: 30px 20px;
      border-top: 4px solid transparent;
    }

    #boxes .box:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    #boxes .box:nth-child(1):hover {
      border-top-color: var(--primary);
    }

    #boxes .box:nth-child(2):hover {
      border-top-color: var(--accent);
    }

    #boxes .box:nth-child(3):hover {
      border-top-color: var(--success);
    }

    #boxes .box img {
      width: 100px;
      height: 100px;
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }

    #boxes .box:hover img {
      transform: scale(1.1);
    }

    #boxes .box h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: var(--primary-dark);
      transition: all 0.3s ease;
    }

    #boxes .box:hover h3 {
      color: var(--primary);
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
      
      .navbar-brand img {
        height: 50px;
      }
      
      #banner h1 {
        font-size: 1.5rem;
      }
      
      #banner p {
        font-size: 1rem;
      }
      
      #newsletter h1 {
        font-size: 1.4rem;
      }
      
      #boxes .box {
        width: 45%;
      }
    }

    @media (max-width: 576px) {
      .container-fluid {
        width: 92%;
      }
      
      .navbar-brand img {
        height: 40px;
      }
      
      #boxes .box {
        width: 100%;
        max-width: 320px;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-brand">
        <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Logo Sistem Aduan Kerosakan Aset">
      </div>
      <ul class="navbar-links">
        <li><a href="admin.php" class="btn btn-outline-danger" id="kembali"><b><i class="fas fa-arrow-left"></i></b></a></li>
      </ul>
    </div>
  </nav>

  <!-- Banner -->
  <section id="banner">
    <div class="container">
      <h1><span class="highlight">SISTEM ADUAN KEROSAKAN ASET DI ILPKLS</span></h1>
      <p>Sistem ini adalah satu alternatif baru bagi memudahkan pelajar, pensyarah dan kakitangan di ILPKLS untuk membuat aduan kerosakan aset secara atas talian</p>
    </div>
  </section>

  <!-- Admin Header -->
  <div class="container">
    <section id="newsletter">
      <div class="container">
        <h1><i class="fas fa-user-shield me-2"></i> PENDAFTARAN PENTADBIR</h1>
      </div>
    </section>
  </div>

  <!-- Role Selection Boxes -->
  <section id="boxes">
    <div class="container">
      <div class="box">
        <a href="create_user.php">
          <img src="img/team.png" alt="USER">
          <h3>PENGGUNA</h3>
          <p>Daftar akaun pengguna biasa untuk laporan aduan kerosakan aset</p>
        </a>
      </div>
      <div class="box">
        <a href="create_bppa.php">
          <img src="img/staff.png" alt="STAFF">
          <h3>BPPA</h3>
          <p>Daftar pegawai BPPA untuk mengesahkan dan memproses aduan</p>
        </a>
      </div>
      <div class="box">
        <a href="create_pengarah.php">
          <img src="img/boss.png" alt="PENGARAH">
          <h3>PENGARAH</h3>
          <p>Daftar akaun pengarah untuk kelulusan dan pengesahan aduan</p>
        </a>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
</body>
</html>