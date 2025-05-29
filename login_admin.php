<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Login Pentadbir - Sistem Aduan Kerosakan Aset</title>

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
        }
        
        body {
            height: 100vh;
            display: flex;
            background-color: var(--secondary-light);
            background-image: linear-gradient(135deg, var(--secondary-light) 0%, var(--secondary) 100%);
            background-repeat: no-repeat;
            background-size: cover;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            background-color: var(--white);
            display: flex;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(30, 58, 138, 0.15);
            overflow: hidden;
            flex-direction: column;
        }

        .login-form {
            width: 100%;
            padding: 30px;
            text-align: center;
        }

        .login-form h2 {
            margin-top: 20px;
            font-size: 1.8rem;
            color: var(--primary-dark);
            font-weight: 700;
            border-bottom: 3px solid var(--accent);
            padding-bottom: 10px;
            display: inline-block;
            margin-bottom: 25px;
        }

        .login-image {
            width: 100%;
            height: 250px;
            background: url('img/unauthorized-person.png') no-repeat center center;
            background-size: cover;
            position: relative;
        }
        
        .login-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(51, 102, 204, 0.7) 0%, rgba(30, 58, 138, 0.8) 100%);
            z-index: 1;
        }
        
        .login-image-content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            z-index: 2;
            padding: 20px;
            text-align: center;
        }
        
        .login-image-content h3 {
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.6rem;
        }
        
        .login-image-content p {
            font-size: 1rem;
            opacity: 0.9;
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.25);
            background-color: var(--secondary-light);
        }

        .input-group {
            position: relative;
        }

        .input-group .form-control {
            padding-left: 45px;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            z-index: 10;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
            width: 100%;
            padding: 12px;
            font-weight: 600;
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.3s ease;
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
            border-radius: 6px;
            transition: all 0.3s ease;
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-outline-danger:hover {
            background-color: var(--danger);
            color: white;
        }

        .alert-danger {
            background-color: #FEE2E2;
            color: var(--danger);
            border: none;
            border-left: 4px solid var(--danger);
            border-radius: 6px;
            padding: 12px 15px;
            margin-bottom: 25px;
            font-weight: 500;
        }
        
        .alert-success {
            background-color: #ECFDF5;
            color: var(--success);
            border: none;
            border-left: 4px solid var(--success);
            border-radius: 6px;
            padding: 12px 15px;
            margin-bottom: 25px;
            font-weight: 500;
        }
        
        .system-logo {
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .system-logo img {
            height: 60px;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            cursor: pointer;
            z-index: 10;
        }

        /* Tablet view adjustments */
        @media (min-width: 600px) and (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-image {
                height: 200px;
            }
        }

        /* Desktop view adjustments */
        @media (min-width: 769px) {
            .login-container {
                flex-direction: row;
                height: 550px;
            }

            .login-form {
                width: 60%;
                padding: 40px 50px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .login-image {
                width: 40%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <div class="login-image-content">
                <h3><i class="fas fa-shield-alt me-2"></i>AKSES PENTADBIR</h3>
                <p>Sistem pengurusan aduan kerosakan aset. Masuk untuk menguruskan aduan, menyelenggara sistem dan memantau status.</p>
            </div>
        </div>

        <div class="login-form">
            
            
            <div class="system-logo">
                <img src="img/logo.png" alt="Logo Sistem">
            </div>
            
            <?php
                if (isset($_SESSION['message'])) {
                    $msgType = isset($_SESSION['msg_type']) ? $_SESSION['msg_type'] : 'danger';
                    echo "<div class='alert alert-{$msgType}'>";
                    if ($msgType == 'danger') {
                        echo "<i class='fas fa-exclamation-circle me-2'></i>";
                    } else {
                        echo "<i class='fas fa-check-circle me-2'></i>";
                    }
                    echo "{$_SESSION['message']}</div>";
                    unset($_SESSION['message']);
                }
            ?>
            
            <h2>LOGIN PENTADBIR</h2>
            <form action="login_proses.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username pentadbir" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required/>
                        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                    </div>
                </div>
                <button type="submit" name="loginadmin" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Log Masuk
                </button>
            </form>
            
            <div class="login-footer">
                <p>&copy; 2025 Sistem Aduan Kerosakan Aset. Hak Cipta Terpelihara.</p>
            </div>
        </div>
    </div>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>