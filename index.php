<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sistem Aduan Kerosakan Aset</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    :root {
      --primary-color: #3366CC;
      --secondary-color: #1E3A8A;
      --accent-color: #FFB347;
      --light-bg: #F5F9FF;
      --dark-text: #1E293B;
      --light-text: #FFFFFF;
      --highlight: #FF6B6B;
      --box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: var(--light-bg);
      font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--dark-text);
    }

    /* Navbar Styling */
    nav.navbar {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 15px 0;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      height: 50px;
      width: auto;
      filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    }

    .navbar-brand span {
      color: var(--light-text);
      font-weight: 600;
      font-size: 25px;
      letter-spacing: 1px;
      margin-left: 10px;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .social-links {
      display: flex;
      gap: 8px;
    }

    .social-links .btn {
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      background-color: rgba(255, 255, 255, 0.2);
      color: var(--light-text);
      transition: all 0.3s ease;
    }

    .social-links .btn:hover {
      background-color: var(--accent-color);
      transform: translateY(-3px);
    }

    .home-btn {
      border-radius: 30px;
      padding: 8px 20px;
      border: none;
      background-color: rgba(255, 255, 255, 0.2);
      color: var(--light-text);
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .home-btn:hover {
      background-color: var(--accent-color);
      color: var(--dark-text);
      transform: translateY(-3px);
    }

    /* Banner Styling */
    .banner {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/banner.png') center center no-repeat;
      background-size: cover;
      height: 450px;
      position: relative;
      margin-bottom: 60px;
      border-radius: 0 0 30px 30px;
      box-shadow: var(--box-shadow);
    }

    .banner-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 85%;
      text-align: center;
      color: var(--light-text);
      padding: 30px;
      border-radius: 15px;
      background: rgba(30, 58, 138, 0.7);
      backdrop-filter: blur(5px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .banner-text h1 {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .highlight {
      color: var(--accent-color);
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .banner-text p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* Login Section Styling */
    .login-title {
      margin: 40px 0 30px;
      text-align: center;
      font-weight: 800;
      color: var(--secondary-color);
      font-size: 2.5rem;
      position: relative;
      padding-bottom: 15px;
    }

    .login-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: linear-gradient(to right, var(--primary-color), var(--accent-color));
      border-radius: 2px;
    }

    .boxes {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 60px;
      padding: 30px 0 80px;
    }

    .box {
      background: white;
      border-radius: 20px;
      box-shadow: var(--box-shadow);
      padding: 40px 30px;
      text-align: center;
      width: 300px;
      height: 280px;
      transition: all 0.4s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .box::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    }

    .box:hover {
      transform: translateY(-15px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .box img {
      width: 120px;
      height: 120px;
      margin-bottom: 25px;
      transition: transform 0.3s ease;
      filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
    }

    .box:hover img {
      transform: scale(1.1);
    }

    .box h3 {
      color: var(--primary-color);
      font-size: 22px;
      margin-top: 15px;
      font-weight: 700;
      letter-spacing: 0.5px;
      transition: color 0.3s ease;
    }

    .box:hover h3 {
      color: var(--highlight);
    }

    /* Footer Styling */
    .footer {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 25px;
      text-align: center;
      font-size: 16px;
      color: var(--light-text);
      font-weight: 500;
      letter-spacing: 0.5px;
      border-radius: 30px 30px 0 0;
      margin-top: 20px;
    }

    /* Animation for boxes */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .box {
      animation: fadeInUp 0.8s ease forwards;
    }

    .box:nth-child(2) {
      animation-delay: 0.2s;
    }

    /* Media queries for responsive design */
    @media (max-width: 991px) {
      .navbar-brand span {
        font-size: 10px;
      }
      
      .social-links {
        margin-top: 10px;
      }
      
      .banner {
        height: 350px;
      }

      .banner-text h1 {
        font-size: 2rem;
      }

      .login-title {
        font-size: 2rem;
      }
    }

    @media (max-width: 767px) {
      .navbar {
        padding: 10px 0;
      }
      
      .navbar-brand {
        margin-bottom: 5px;
      }
      
      .social-links {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-top: 15px;
      }
      
      .banner {
        height: 300px;
        margin-bottom: 40px;
      }
      
      .banner-text h1 {
        font-size: 1.8rem;
      }

      .banner-text p {
        font-size: 1rem;
      }
      
      .boxes {
        gap: 100px;
      }

      .login-title {
        font-size: 1.8rem;
      }
    }

    @media (max-width: 576px) {
      .navbar-brand img {
        height: 40px;
      }

      .navbar-brand span {
        font-size: 14px;
      }
      
      .nav-container {
        flex-direction: column;
      }
      
      .home-btn {
        margin-bottom: 10px;
        width: 100%;
      }
      
      .social-links {
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
      }
      
      .social-links .btn {
        width: 35px;
        height: 35px;
      }

      .banner {
        height: 250px;
        border-radius: 0 0 20px 20px;
      }

      .banner-text {
        padding: 20px 15px;
        width: 92%;
      }
      
      .banner-text h1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
      }

      .banner-text p {
        font-size: 0.9rem;
        line-height: 1.4;
      }
      
      .login-title {
        font-size: 1.5rem;
        margin: 20px 0;
      }

      .boxes {
        padding: 15px 0 50px;
        gap: 25px;
      }
      
      .box {
        width: 170px;
        height: 200px;
        padding: 1px;
      }

      .box img {
        width: 80px;
        height: 80px;
        margin-bottom: 10px;
      }

      .box h3 {
        font-size: 18px;
      }

      .footer {
        font-size: 14px;
        padding: 20px 10px;
        border-radius: 20px 20px 0 0;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Logo" />
        <span class="fw-bold">Sistem Aduan Kerosakan Aset</span>
      </a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="ms-auto nav-container d-flex align-items-center">
          <a class="btn home-btn me-3" href="https://www.ilpkls.gov.my">
            <i class="fas fa-home me-1"></i> Laman Utama
          </a>
          <div class="social-links">
            <a class="btn" href="https://www.facebook.com/ILPKUALALANGAT/"><i class="fa-brands fa-facebook-f"></i></a>
            <a class="btn" href="https://www.instagram.com/ilpkualalangat_official/?hl=en"><i class="fa-brands fa-instagram"></i></a>
            <a class="btn" href="https://www.youtube.com/@ILPKUALALANGAT"><i class="fa-brands fa-youtube"></i></a>
            <a class="btn" href="https://www.tiktok.com/@ilpkualalangat_official"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Banner -->
  <div class="banner">
    <div class="banner-text">
      <h1>Sistem <span class="highlight">Aduan Kerosakan</span> Aset</h1>
      <p>Sistem ini adalah satu alternatif bagi memudahkan pelajar, pensyarah dan kakitangan ILPKLS membuat aduan kerosakan secara atas talian dengan cepat dan efisien</p>
    </div>
  </div>

  <!-- Log Masuk Section -->
  <div class="container">
    <h2 class="login-title">LOG MASUK SISTEM</h2>
    <div class="boxes">
      <a href="signup.php" class="text-decoration-none">
        <div class="box">
          <img src="img/register_6851123.png" alt="Register">
          <h3>DAFTAR AKAUN</h3>
        </div>
      </a>
      <a href="login_user.php" class="text-decoration-none">
        <div class="box">
          <img src="img/login.png" alt="User">
          <h3>LOG MASUK</h3>
        </div> 
      </a>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div>&copy; 2025 ILP Kuala Langat Selangor | Sistem Aduan Kerosakan Aset | Hak Cipta Terpelihara</div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  
  <!-- Font Import -->
  <script>
    // Add Poppins font
    const fontLink = document.createElement('link');
    fontLink.rel = 'stylesheet';
    fontLink.href = 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap';
    document.head.appendChild(fontLink);
  </script>
</body>
</html>