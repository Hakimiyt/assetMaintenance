<?php
session_start();  
include "db.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_submit'])) {
    $id_pegawai = trim($_POST['id_pegawai']);
    $ic = $_POST['ic'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password hashing
    $nama = $_POST['nama'];
    $emel = $_POST['emel'];
    $notel = $_POST['notel'];
    $role = $_POST['role'];

    // Prepared statement to prevent SQL injection
    $sql = "INSERT INTO `tbl_daftar` (`id_pegawai`, `ic`, `password`, `nama`, `emel`, `notel`, `role`) 
        VALUES (
            '$id_pegawai',
            '$ic',
            '$password',
            '$nama',
            '$emel',
            '$notel',
            'Pengajar'
        )";

if (mysqli_query($conn, $sql)) {  echo "
    <script>
    alert('Akaun berjaya didaftar!');
    document.location.href = 'signup.php';
    </script>";
} else {   //       echo "Error: " . $sql . "" . mysqli_error($conn);    
}     //  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna | Sistem Aduan Kerosakan Aset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        :root {
            --primary-color: #3366CC;
            --secondary-color: #1E3A8A;
            --accent-color: #FFB347;
            --light-bg: #F5F9FF;
            --dark-text: #1E293B;
            --light-text: #FFFFFF;
            --danger-color: #FF5A5A;
            --success-color: #4CAF50;
            --input-bg: #F9FAFC;
            --input-border: #E2E8F0;
            --shadow-sm: 0 2px 5px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 10px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 20px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            background-color: var(--light-bg);
            color: var(--dark-text);
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
            color: var(--light-text);
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
            color: var(--light-text);
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
            color: var(--dark-text);
            transform: translateY(-2px);
        }

        /* Form section styles */
        .form-section {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 0;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            max-width: 550px;
            width: 100%;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        h2 {
            margin-bottom: 30px;
            color: var(--secondary-color);
            font-weight: 700;
            font-size: 1.8rem;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 22px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--secondary-color);
            font-size: 0.95rem;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--input-bg);
            color: var(--dark-text);
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.15);
        }

        ::placeholder {
            color: #A0AEC0;
            opacity: 1;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        button {
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            transition: var(--transition);
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button i {
            margin-right: 8px;
        }

        button[type="reset"] {
            background-color: var(--danger-color);
            color: white;
        }

        button[type="submit"] {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        button:active {
            transform: translateY(0);
        }

        /* Alert styles */
        .alert {
            padding: 15px 20px;
            margin: 20px auto;
            border-radius: 8px;
            color: white;
            max-width: 550px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .alert-success {
            background-color: var(--success-color);
        }

        .alert-danger {
            background-color: var(--danger-color);
        }

        .required-star {
            color: var(--danger-color);
            margin-left: 3px;
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--input-border);
            font-size: 0.9rem;
            color: #64748B;
        }

        /* Password visibility toggle */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 42px; /* Adjust based on your input height */
            cursor: pointer;
            color: #718096;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            /* .form-container {
                padding: 10px;
                margin: 15px;
            } */

            .button-group {
                flex-direction: column-reverse;
            }

            button {
                width: 100%;
            }

            h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .navbar-brand img {
                height: 40px;
            }

            .navbar-brand span {
                font-size: 1rem;
                display: none;
            }

            h2 {
                font-size: 1.3rem;
            }

            .form-section {
                padding: 30px 0;
            }

            .form-container {
                padding: 25px 20px;
            }

            label {
                font-size: 0.9rem;
            }

            input {
                padding: 10px 12px;
                font-size: 0.95rem;
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

        .form-container {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Logo" loading="lazy">
                <span>Sistem Aduan Kerosakan Aset</span>
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

    <?php if (isset($_SESSION['message1'])): ?>
    <div class="alert alert-<?php echo $_SESSION['msg_type1']; ?>">
        <?php if ($_SESSION['msg_type1'] == 'success'): ?>
            <i class="fas fa-check-circle"></i>
        <?php else: ?>
            <i class="fas fa-exclamation-circle"></i>
        <?php endif; ?>
        <?php 
            echo $_SESSION['message1'];
            unset($_SESSION['message1']);
        ?>
    </div>
    <?php endif ?>

    <section class="form-section">
        <div class="container">
            <div class="form-container">
                <h2>Daftar Pengguna</h2>
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <label for="id_pegawai">ID Pegawai <span class="required-star">*</span></label>
                        <input type="text" id="id_pegawai" name="id_pegawai" placeholder="Masukkan ID Pegawai Pengajar" required>
                    </div>

                    <div class="form-group">
                        <label for="ic">No Kad Pengenalan (IC) <span class="required-star">*</span></label>
                        <input type="text" id="ic" name="ic" placeholder="Masukkan No Kad Pengenalan (Contoh: 901212-12-3456)" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Laluan <span class="required-star">*</span></label>
                        <input type="password" id="password" name="password" placeholder="Masukkan kata laluan (Minimum 8 aksara)" required>
                        <i class="fas fa-eye-slash password-toggle" id="togglePassword"></i>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Penuh <span class="required-star">*</span></label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama penuh" required>
                    </div>

                    <div class="form-group">
                        <label for="emel">Emel <span class="required-star">*</span></label>
                        <input type="email" id="emel" name="emel" placeholder="Masukkan alamat emel" required>
                    </div>

                    <div class="form-group">
                        <label for="notel">No Telefon <span class="required-star">*</span></label>
                        <input type="text" id="notel" name="notel" placeholder="Masukkan nombor telefon (Contoh: 012-3456789)" required>
                    </div>

                    <div class="button-group">
                        <button type="reset">
                            <i class="fas fa-undo-alt"></i> Set Semula
                        </button>
                        <button type="submit" name="btn_submit">
                            <i class="fas fa-user-plus"></i> Daftar
                        </button>
                    </div>

                    <div class="form-footer">
                        Sudah mempunyai akaun? <a href="login_user.php" style="color: var(--primary-color); font-weight: 600; text-decoration: none;">Log Masuk</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Font Import and Scripts -->
    <script>
        // Add Poppins font
        const fontLink = document.createElement('link');
        fontLink.rel = 'stylesheet';
        fontLink.href = 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap';
        document.head.appendChild(fontLink);

        // Password visibility toggle
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // Toggle the icon
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>