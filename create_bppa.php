<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar BPPA | Sistem Aduan Kerosakan Aset</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #3366CC;
            --primary-dark: #1E3A8A;
            --secondary: #E2E8F0;
            --accent: #FFB347;
            --danger: #FF5A5A;
            --success: #4CAF50;
            --text-dark: #1E293B;
            --text-light: #64748B;
            --white: #FFFFFF;
            --light-bg: #F8FAFC;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }

        /* Navbar styles */
        .navbar {
            background-color: var(--white);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        }

        .navbar-brand img {
            height: 60px;
            margin-right: 10px;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .brand-tagline {
            font-size: 12px;
            color: var(--text-light);
        }

        .navbar-nav {
            list-style: none;
            display: flex;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            border: 2px solid var(--primary);
            border-radius: 6px;
            transition: all 0.3s ease;
            gap: 8px;
        }

        .button:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(51, 102, 204, 0.2);
        }

        /* Form section styles */
        .form-section {
            min-height: calc(100vh - 90px);
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .form-container {
            background-color: var(--white);
            padding: 40px;
            border-radius: 12px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border-top: 4px solid var(--primary);
            margin: 0 auto;
        }

        h2 {
            margin-bottom: 25px;
            color: var(--primary-dark);
            font-size: 24px;
            position: relative;
            padding-bottom: 10px;
        }

        h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s ease;
            color: var(--text-dark);
            background-color: var(--light-bg);
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.15);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%231E293B' viewBox='0 0 16 16'%3E%3Cpath d='M8 11.5l-5-5h10l-5 5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        button[type="submit"] {
            background-color: var(--primary);
            color: white;
        }

        button[type="reset"] {
            background-color: var(--white);
            color: var(--danger);
            border: 1px solid var(--danger);
        }

        button[type="submit"]:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(51, 102, 204, 0.2);
        }

        button[type="reset"]:hover {
            background-color: var(--danger);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(255, 90, 90, 0.2);
        }

        /* Alert styles */
        .alert {
            padding: 15px;
            margin: 20px auto;
            border-radius: 6px;
            max-width: 550px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background-color: rgba(76, 175, 80, 0.1);
            border-left: 4px solid var(--success);
            color: var(--success);
        }

        .alert-danger {
            background-color: rgba(255, 90, 90, 0.1);
            border-left: 4px solid var(--danger);
            color: var(--danger);
        }

        .alert-icon {
            font-size: 18px;
        }

        /* Form input decorations */
        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 15px;
            color: var(--text-light);
        }

        .has-icon {
            padding-left: 45px;
        }

        /* Password toggle */
        .password-toggle {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
            cursor: pointer;
            color: var(--text-light);
            background: none;
            border: none;
            padding: 0;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 25px;
            }

            .button-group {
                flex-direction: column;
            }

            button {
                width: 100%;
            }

            .navbar-brand img {
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .navbar-brand .brand-text {
                display: none;
            }

            h2 {
                font-size: 20px;
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
            <a class="navbar-brand" href="index.php">
                <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Logo" loading="lazy">
                <div class="brand-text">
                    <span class="brand-name">Sistem Aduan Kerosakan Aset</span>
                    <span class="brand-tagline">Menguruskan Aduan dengan Efisien</span>
                </div>
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
    <div class="alert alert-<?php echo $_SESSION['msg_type1']; ?>">
        <?php if ($_SESSION['msg_type1'] == 'success'): ?>
            <i class="fas fa-check-circle alert-icon"></i>
        <?php else: ?>
            <i class="fas fa-exclamation-circle alert-icon"></i>
        <?php endif; ?>
        <div>
            <?php 
                echo $_SESSION['message1'];
                unset($_SESSION['message1']);
            ?>
        </div>
    </div>
    <?php endif ?>

    <section class="form-section">
        <div class="container">
            <div class="form-container">
                <h2>Daftar BPPA</h2>
                <form action="create_bppa.php" method="POST">
                    <div class="form-group">
                        <label for="id_pegawai">ID Pegawai:</label>
                        <div class="input-wrapper">
                            <i class="fas fa-id-card input-icon"></i>
                            <input type="text" id="id_pegawai" name="id_pegawai" class="has-icon" placeholder="Masukkan ID Pegawai Pengajar" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ic">No Kad Pengenalan(IC):</label>
                        <div class="input-wrapper">
                            <i class="fas fa-id-badge input-icon"></i>
                            <input type="text" id="ic" name="ic" class="has-icon" placeholder="Masukkan No Kad Pengenalan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Laluan:</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" class="has-icon" placeholder="Masukkan katalaluan" required>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="nama" name="nama" class="has-icon" placeholder="Masukkan nama" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emel">Email:</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="emel" name="emel" class="has-icon" placeholder="Masukkan email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notel">No Telefon:</label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone input-icon"></i>
                            <input type="text" id="notel" name="notel" class="has-icon" placeholder="Masukkan nombor telefon" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role">Kategori:</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user-tag input-icon"></i>
                            <select name="role" id="role" class="has-icon" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="Bangunan/Sivil">Bangunan/Sivil (Encik Kamal)</option>
                                <option value="Mekanikal/Elektrikal/Aircond">Mekanikal/Elektrikal/Aircond (Encik Hairul)</option>
                                <option value="Komputer/ICT">Komputer/ ICT (Encik Hadi)</option>     
                            </select>
                        </div>
                    </div>

                    <div class="button-group">
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
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>