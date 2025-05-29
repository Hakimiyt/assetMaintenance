<?php
session_start();  
include "db.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_submit'])) {
    $id_pegawai = trim($_POST['id_pegawai']);
    $ic = trim($_POST['ic']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password hashing
    $nama = trim($_POST['nama']);
    $emel = trim($_POST['emel']);
    $notel = trim($_POST['notel']);
    $role = trim($_POST['role']);

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tbl_daftar (id_pegawai, ic, password, nama, emel, notel, role) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $id_pegawai, $ic, $password, $nama, $emel, $notel, $role);

    if ($stmt->execute()) {
        echo "
        <script>
        alert('Akaun berjaya didaftar!');
        document.location.href = 'create_user.php';
        </script>";
    } else {
        $_SESSION['message1'] = "Error: " . $stmt->error;
        $_SESSION['msg_type1'] = "danger";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Aduan Kerosakan Aset - Daftar Pengguna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3a36e4;
            --secondary-color: #f3f6ff;
            --text-color: #333;
            --accent-color: #6b66ff;
            --success-color: #00c853;
            --error-color: #f44336;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: #f0f4ff;
            background-image: linear-gradient(135deg, #f5f7ff 0%, #e3eaff 100%);
            min-height: 100vh;
        }

        /* Navbar styles */
        .navbar {
            background-color: white;
            padding: 15px 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1400px;
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
            height: 60px;
            transition: var(--transition);
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .navbar-nav {
            list-style: none;
            display: flex;
        }

        .button {
            display: inline-block;
            padding: 10px 22px;
            color: white;
            background-color: var(--primary-color);
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(58, 54, 228, 0.3);
        }

        .button:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(58, 54, 228, 0.4);
        }

        .button.secondary {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

        .button.secondary:hover {
            background-color: var(--secondary-color);
        }

        .button i {
            margin-right: 8px;
        }

        /* Form section styles */
        .form-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            max-width: 600px;
            width: 100%;
            box-shadow: var(--shadow);
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            margin-bottom: 30px;
            text-align: center;
        }

        h2 {
            color: var(--primary-color);
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .form-subtitle {
            color: #666;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: var(--transition);
            background-color: #fafafa;
            color: #333;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(107, 102, 255, 0.15);
            background-color: white;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .input-with-icon input, .input-with-icon select {
            padding-left: 42px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        button {
            padding: 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            flex: 1;
            transition: var(--transition);
            border: none;
        }

        button[type="submit"] {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 2px 8px rgba(58, 54, 228, 0.3);
        }

        button[type="submit"]:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(58, 54, 228, 0.4);
        }

        button[type="reset"] {
            background-color: white;
            color: #f44336;
            border: 1px solid #f44336;
        }

        button[type="reset"]:hover {
            background-color: #fff5f5;
        }

        /* Alert styles */
        .alert {
            padding: 16px 20px;
            margin: 20px 0;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert i {
            margin-right: 12px;
            font-size: 20px;
        }

        .alert-success {
            background-color: var(--success-color);
        }

        .alert-danger {
            background-color: var(--error-color);
        }

        /* Form validation styling */
        .valid-feedback, .invalid-feedback {
            font-size: 12px;
            margin-top: 5px;
            position: absolute;
            bottom: -20px;
        }

        .valid-feedback {
            color: var(--success-color);
        }

        .invalid-feedback {
            color: var(--error-color);
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 30px 20px;
            }

            .button-group {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 24px;
            }

            .navbar-brand img {
                height: 50px;
            }

            .form-section {
                padding: 20px 0;
            }

            input, select, button {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Sistem Aduan Kerosakan Aset" loading="lazy">
            </a>
            <ul class="navbar-nav">
                <li>
                    <a class="button secondary" href="pilih_daftar.php"><i class="fas fa-arrow-left"></i> Kembali</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php if (isset($_SESSION['message1'])): ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type1']; ?>">
            <?php if ($_SESSION['msg_type1'] === 'success'): ?>
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
    </div>

    <section class="form-section">
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <h2>Daftar Pengguna Baharu</h2>
                    <p class="form-subtitle">Sila masukkan maklumat anda untuk mendaftar akaun</p>
                </div>
                <form action="create_user.php" method="POST" id="registerForm">
                    <div class="form-group">
                        <label for="id_pegawai">ID Pegawai:</label>
                        <div class="input-with-icon">
                            <i class="fas fa-id-card input-icon"></i>
                            <input type="text" id="id_pegawai" name="id_pegawai" placeholder="Masukkan ID Pegawai" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ic">No Kad Pengenalan (IC):</label>
                        <div class="input-with-icon">
                            <i class="fas fa-address-card input-icon"></i>
                            <input type="text" id="ic" name="ic" placeholder="Contoh: 990101012345" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Laluan:</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" placeholder="Masukkan kata laluan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Penuh:</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama penuh" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emel">Emel:</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="emel" name="emel" placeholder="contoh@email.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notel">No Telefon:</label>
                        <div class="input-with-icon">
                            <i class="fas fa-phone input-icon"></i>
                            <input type="text" id="notel" name="notel" placeholder="Contoh: 0123456789" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role">Pilih Peranan:</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user-tag input-icon"></i>
                            <select name="role" id="role" required>
                                <option value="" selected disabled>--Pilih Peranan--</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="Pengajar">Pengajar</option>
                            </select>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="submit" name="btn_submit"><i class="fas fa-user-plus"></i> Daftar Akaun</button>
                        <button type="reset"><i class="fas fa-redo"></i> Set Semula</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        // Simple form validation
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            const ic = document.getElementById('ic').value;
            const email = document.getElementById('emel').value;
            const phone = document.getElementById('notel').value;
            
            // IC validation - numeric and 12 digits
            if (!/^\d{12}$/.test(ic)) {
                alert('No. Kad Pengenalan mestilah 12 digit nombor tanpa tanda sengkang.');
                event.preventDefault();
                return;
            }
            
            // Email validation
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert('Sila masukkan format emel yang betul.');
                event.preventDefault();
                return;
            }
            
            // Phone validation
            if (!/^01\d{8,9}$/.test(phone)) {
                alert('No. telefon mestilah bermula dengan 01 dan mempunyai 10-11 digit.');
                event.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>