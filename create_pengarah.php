
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
        document.location.href = 'create_pengarah.php';
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
    <title>Daftar Pengarah | Sistem Aduan Kerosakan Aset</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f5f7fa;
            color: #333;
        }

        /* Navbar styles */
        .navbar {
            background-color: #3366CC;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
        }

        .navbar-brand img {
            height: 70px;
            margin-right: 15px;
        }

        .brand-text {
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
        }

        .button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            color: white;
            background-color: #1E3A8A;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .button i {
            margin-right: 8px;
        }

        .button:hover {
            background-color: #15296b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Form section styles */
        .form-section {
            min-height: calc(100vh - 100px);
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            margin: 0 auto;
        }

        h2 {
            margin-bottom: 30px;
            color: #1E3A8A;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            position: relative;
            padding-bottom: 12px;
        }

        h2:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            height: 4px;
            width: 60px;
            background-color: #FFB347;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        input, select {
            width: 100%;
            padding: 14px;
            border: 2px solid #dfe4ea;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f9fafc;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #3366CC;
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.1);
            background-color: white;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #7a8894;
        }

        .input-group input, .input-group select {
            padding-left: 40px;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        button {
            padding: 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button i {
            margin-right: 8px;
        }

        button[type="submit"] {
            background-color: #3366CC;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #2857b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(51, 102, 204, 0.2);
        }

        button[type="reset"] {
            background-color: #FF5A5A;
            color: white;
        }

        button[type="reset"]:hover {
            background-color: #e84545;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 90, 90, 0.2);
        }

        /* Alert styles */
        .alert {
            padding: 16px;
            margin-bottom: 24px;
            border-radius: 8px;
            color: white;
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 12px;
            font-size: 24px;
        }

        .alert-success {
            background-color: #28a745;
        }

        .alert-danger {
            background-color: #FF5A5A;
        }

        /* Card effect for form */
        .card-effect {
            position: relative;
        }

        .card-effect:before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            z-index: -1;
            border-radius: 16px;
            opacity: 0.6;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 30px 20px;
            }

            .btn-group {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .navbar-brand img {
                height: 50px;
            }

            .brand-text {
                display: none;
            }

            h2 {
                font-size: 24px;
            }

            .form-section {
                padding: 20px 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Sistem Aduan Kerosakan Aset" loading="lazy">
                <span class="brand-text">Sistem Aduan Kerosakan Aset</span>
            </a>
            <ul class="navbar-nav">
                <li>
                    <a class="button" href="pilih_daftar.php">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (isset($_SESSION['message1'])): ?>
    <div class="container" style="margin-top: 20px;">
        <div class="alert alert-<?php echo $_SESSION['msg_type1']; ?>">
            <i class="fas fa-<?php echo $_SESSION['msg_type1'] === 'success' ? 'check-circle' : 'exclamation-circle'; ?>"></i>
            <?php 
                echo $_SESSION['message1'];
                unset($_SESSION['message1']);
            ?>
        </div>
    </div>
    <?php endif ?>

    <section class="form-section">
        <div class="container">
            <div class="form-container card-effect">
                <h2>Daftar Pengarah</h2>
                <form action="create_pengarah.php" method="POST">
                    <div class="form-group">
                        <label for="id_pegawai">ID Pegawai:</label>
                        <div class="input-group">
                            <i class="fas fa-id-card"></i>
                            <input type="text" id="id_pegawai" name="id_pegawai" placeholder="Masukkan ID Pegawai Pengajar" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ic">No Kad Pengenalan (IC):</label>
                        <div class="input-group">
                            <i class="fas fa-id-badge"></i>
                            <input type="text" id="ic" name="ic" placeholder="Masukkan No Kad Pengenalan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Laluan:</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Masukkan katalaluan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <div class="input-group">
                            <i class="fas fa-user"></i>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emel">Email:</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="emel" name="emel" placeholder="Masukkan email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notel">No Telefon:</label>
                        <div class="input-group">
                            <i class="fas fa-phone"></i>
                            <input type="text" id="notel" name="notel" placeholder="Masukkan nombor telefon" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role">Pilih Peranan:</label>
                        <div class="input-group">
                            <i class="fas fa-user-tag"></i>
                            <select name="role" id="role" required>
                                <option value="" selected disabled>--Pilih Peranan--</option>
                                <option value="Pengarah">Pengarah</option>
                            </select>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="submit" name="btn_submit">
                            <i class="fas fa-user-plus"></i> Daftar
                        </button>
                        <button type="reset">
                            <i class="fas fa-redo"></i> Set Semula
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        // Add subtle animation/transition effects
        document.addEventListener('DOMContentLoaded', function() {
            const formContainer = document.querySelector('.form-container');
            setTimeout(() => {
                formContainer.style.opacity = '1';
                formContainer.style.transform = 'translateY(0)';
            }, 100);
            
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('button, .button');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const x = e.clientX - e.target.getBoundingClientRect().left;
                    const y = e.clientY - e.target.getBoundingClientRect().top;
                    
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>
</html>