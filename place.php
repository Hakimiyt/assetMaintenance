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
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Navbar Styling */
    nav.navbar {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 15px 0;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      margin-left: 200px; /* anjakkan ikut sidebar */
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
      margin: 40px auto 60px auto;
      border-radius: 20px;
      box-shadow: var(--box-shadow);
      margin-left: 200px; /* anjakkan ikut sidebar */
      width: calc(100% - 220px);
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

    /* Footer Styling */
    .footer {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 20px;
      text-align: center;
      font-size: 16px;
      color: var(--light-text);
      font-weight: 500;
      letter-spacing: 0.5px;
      border-radius: 20px 0 0 0;
      margin-top: 60px;
      margin-left: 200px; /* ikut sidebar */
      width: calc(100% - 200px);
    }

    /* Responsive tweaks */
    @media (max-width: 991px) {
      nav.navbar, .banner, .footer {
        margin-left: 0;
        width: 100%;
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
            <i class="fas fa-home me-1"></i> Laman Utama ILPKLS
          </a>
          <div class="social-links">
            <a class="btn" href="https://www.facebook.com/ILPKUALALANGAT/"><i class="fa-brands fa-facebook-f"></i></a>
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
      <h1>Sistem <span class="highlight">Aduan Aset Kerosakan</span></h1>
      <p>Sistem ini adalah satu alternatif bagi memudahkan pelajar, pensyarah dan kakitangan ILPKLS membuat aduan kerosakan secara atas talian dengan cepat dan efisien</p>
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
