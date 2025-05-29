<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Login Sistem Aduan Kerosakan Asset</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #3366CC;
            --secondary-color: #1E3A8A;
            --accent-color: #FFB347;
            --danger-color: #FF5A5A;
            --light-bg: #f0f4f8;
            --text-dark: #2d3748;
            --text-light: #ffffff;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 10px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }
        
        /* Navbar styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 15px 0;
            box-shadow: var(--shadow-md);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 50px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .navbar-brand span {
            color: var(--text-light);
            font-weight: 600;
            font-size: 1.2rem;
            margin-left: 15px;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .navbar-nav {
            list-style: none;
            display: flex;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.15);
            color: var(--text-light);
            text-decoration: none;
            border-radius: 30px;
            font-weight: 500;
            transition: var(--transition);
            border: none;
        }

        .back-button i {
            margin-right: 8px;
        }

        .back-button:hover {
            background-color: var(--accent-color);
            color: var(--text-dark);
            transform: translateY(-2px);
        }

        .login-container {
            width: 100%;
            max-width: 500px;
            background-color: white;
            display: flex;
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            flex-direction: column;
            margin: auto;
            margin-top: 20px;
            /* position: absolute; */
            /* top: 100px; */
            /* left: 50%; */
            transform: translate(-50%, -50%);
        }

        .login-header {
            width: 100%;
            padding: 20px 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            text-align: center;
        }

        .login-header h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .login-header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .login-form {
            width: 100%;
            padding: 30px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form h2 {
            margin: 0 0 25px;
            color: var(--secondary-color);
            font-size: 1.5rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        .login-form h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .login-form form {
            width: 100%;
            max-width: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
            width: 100%;
            position: relative;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            margin-top: 15px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .link-group {
            margin-top: 25px;
            text-align: center;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0;
        }
        
        .link-group a {
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .link-group a.create-account {
            color: var(--danger-color);
            font-weight: 600;
        }

        .link-group a.forgot-password {
            color: var(--primary-color);
        }

        .link-group a:hover {
            opacity: 0.8;
        }

        .alert-danger {
            margin-bottom: 20px;
            background-color: rgba(255, 90, 90, 0.1);
            border-color: var(--danger-color);
            color: var(--danger-color);
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            outline: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        input[type=text]:focus, input[type=password]:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(255, 179, 71, 0.2);
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .system-name {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--accent-color);
            font-weight: 600;
        }

        /* Responsive design */
        @media (max-width: 576px) {
            .login-container {
                width: 90%;
                max-width: none;
                min-height: auto;
                border-radius: 8px;
                margin-bottom: 10px;
            }
            
            .login-form {
                padding: 20px;
            }

            .navbar-brand span {
                display: none;
            }

            .navbar-brand img {
                height: 40px;
            }
        }
        
        /* Tablet view */
        @media (min-width: 577px) and (max-width: 768px) {
            .login-container {
                width: 80%;
                border-radius: 12px;
            }
        }
        
        /* Desktop view */
        @media (min-width: 769px) {
            .login-container {
                width: 450px;
                border-radius: 12px;
            }
        }

        /* Animation */
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

        .login-container {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Logo" loading="lazy">
                <span class="fw-bold">Sistem Aduan Kerosakan Aset</span>
            </a>
            <ul class="navbar-nav">
                <li>
                    <a class="back-button" href="index.php">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="login-container">
        <div class="login-header">
            <div class="system-name">SAKA</div>
            <h1>Sistem Aduan Kerosakan Asset</h1>
            <p>Sila log masuk untuk melaporkan kerosakan</p>
        </div>

        <div class="login-form">
            <h2>Log Masuk</h2>
            <form action="loginsession.php" method="post">
                <div class="form-group">
                    <label for="ic">No Kad Pengenalan (IC):</label>
                    <div class="input-icon">
                        <input type="text" id="ic" name="ic" placeholder="Contoh: 880101012222" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Kata Laluan:</label>
                    <div class="input-icon">
                        <input type="password" id="password" name="password" placeholder="Masukkan kata laluan anda" required/>
                    </div>
                </div>
                <button type="submit" name="loginuser" class="btn btn-primary">Log Masuk</button>
                <div class="link-group">
                    <a href="signup.php" class="create-account">Daftar Akaun</a>
                    <a href="forg_pass.php" class="forgot-password">Lupa Kata Laluan?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Poppins font -->
    <script>
        const fontLink = document.createElement('link');
        fontLink.rel = 'stylesheet';
        fontLink.href = 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap';
        document.head.appendChild(fontLink);
    </script>
</body>
</html>