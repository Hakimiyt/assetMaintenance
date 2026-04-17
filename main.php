<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sistem Aduan Kerosakan Aset</title>
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
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      background-color: var(--light-bg);
      color: var(--dark-text);
      overflow-x: hidden;
    }

    /* Navbar Styling
    nav.navbar {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 15px 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      margin-left: 200px; /* ikut sidebar 
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    } */

    .navbar-brand {
      display: flex;
      align-items: center;
      text-decoration: none;
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

    .nav-container {
      display: flex;
      align-items: center;
      gap: 15px;
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
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 18px;
    }

    .social-links .btn:hover {
      background-color: var(--accent-color);
      color: var(--dark-text);
      transform: translateY(-3px);
    }

    /* .home-btn {
      border-radius: 30px;
      padding: 8px 20px;
      border: none;
      background-color: rgba(255, 255, 255, 0.2);
      color: var(--light-text);
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
    } */

    /* .home-btn:hover {
      background-color: var(--accent-color);
      color: var(--dark-text);
      transform: translateY(-3px);
    } */

    /* Banner Styling */
    .banner {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/banner.png') center center no-repeat;
      background-size: cover;
      height: 450px;
      position: relative;
      margin: 40px auto 60px auto;
      border-radius: 20px;
      box-shadow: var(--box-shadow);
      margin-left: 200px; /* ikut sidebar */
      width: 80%;
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

    /* Intro Section */
    .intro {
      margin: 10px 20px;
      margin-left: 350px;   /* ikut sidebar */
      max-width: 900px;
      font-size: 18px;
      line-height: 1.8;
      text-align: justify;
      background: #ffffff;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .intro h2 {
      color: var(--secondary-color);
      margin-bottom: 10px;
    }

    /* Footer Styling */
    /* .footer {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 20px;
      text-align: center;
      font-size: 16px;
      color: var(--light-text);
      font-weight: 500;
      letter-spacing: 0.5px;
      border-radius: 20px 0 0 0;
      margin-top: 200px;
      margin-left: 200px; ikut sidebar 
      width: calc(100% - 200px);
    } */

    /* Responsive tweaks */
    @media (max-width: 991px) {
      nav.navbar, .banner, .footer, .intro {
        margin-left: 0;
        width: 100%;
      }
      .intro {
        margin: 20px auto;
      }
      .navbar-brand span {
        font-size: 20px;
      }
      .banner-text h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar
  <nav class="navbar">
    <a class="navbar-brand" href="#">
      <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Logo" />
      <span>Sistem Aduan Kerosakan Aset</span>
    </a>
    <div class="nav-container">
      <a class="home-btn" href="https://www.ilpkls.gov.my">🏠 Laman Utama ILPKLS</a>
      <div class="social-links">
        <a class="btn" href="https://www.facebook.com/ILPKUALALANGAT/">📘</a>
        <a class="btn" href="https://www.youtube.com/@ILPKUALALANGAT">▶️</a>
        <a class="btn" href="https://www.tiktok.com/@ilpkualalangat_official">🎵</a>
      </div>
    </div>
  </nav>  -->

  <!-- Banner -->
  <div style="margin-top: -8vh; margin-left: -8vh;">
    <div class="banner">
      <div class="banner-text">
        <h1>Sistem <span class="highlight">Aduan Aset Kerosakan</span></h1>
        <p>Sistem ini adalah satu alternatif bagi memudahkan pelajar, pensyarah dan kakitangan ILPKLS membuat aduan kerosakan secara atas talian dengan cepat dan efisien</p>
      </div>
    </div>
  </div>

  <!-- Pengenalan Sistem -->
  <div class="intro">
    <h2>Pengenalan Sistem</h2>
    <p>
      Sistem Tempahan Bilik Mesyuarat ini dibangunkan bagi memudahkan proses 
      pengurusan dan penempahan bilik mesyuarat di ILP Selandar. 
      Dengan adanya sistem ini, semua staf, pensyarah dan pentadbir boleh membuat 
      tempahan secara atas talian tanpa perlu menggunakan kaedah manual. 
      Sistem ini juga membantu mengelakkan pertindihan jadual serta memastikan 
      penggunaan bilik mesyuarat lebih teratur dan efisien.
    </p>
  </div>

  <!-- Footer
  <div class="footer">
    <div>&copy; 2025 ILP Kuala Langat Selangor | Sistem Aduan Kerosakan Aset | Hak Cipta Terpelihara</div>
  </div> -->

</body>
</html>
