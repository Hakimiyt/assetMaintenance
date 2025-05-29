<?php session_start();
include('db.php');
$sql = "SELECT * FROM tbl_daftar WHERE `ic`='".$_SESSION['ic']."'";
$akaun = mysqli_query($conn, $sql);
$row_akaun = mysqli_fetch_assoc($akaun);
$totalRows_akaun = mysqli_num_rows($akaun);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>SISTEM ADUAN KEROSAKAN ASET</title>
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
            background-color: var(--secondary-light);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 30px;
        }
        
        h1 {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 1.8rem;
            border-bottom: 3px solid var(--accent);
            padding-bottom: 10px;
            display: inline-block;
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        
        .form-section {
            background-color: var(--secondary-light);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }
        
        .form-control {
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.25);
        }
        
        .form-select {
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            background-position: right 15px center;
        }
        
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(30, 58, 138, 0.15);
        }
        
        .btn-danger {
            background-color: var(--danger);
            border-color: var(--danger);
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 6px;
        }
        
        .btn-danger:hover, .btn-danger:focus {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        
        .back-button {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .back-button:hover {
            color: var(--primary-dark);
            transform: translateX(-3px);
        }
        
        .back-button i {
            margin-right: 5px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        
        .form-text {
            color: var(--text-light);
            font-size: 0.875rem;
        }
        
        .icon-input {
            position: relative;
        }
        
        .icon-input i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }
        
        .icon-input .form-control {
            padding-left: 45px;
        }
        
        .required-asterisk {
            color: var(--danger);
            margin-left: 4px;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
        }
        
        .header-card {
            background-color: var(--primary);
            color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-card h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .header-card .user-info {
            display: flex;
            align-items: center;
        }
        
        .header-card .user-avatar {
            width: 42px;
            height: 42px;
            background-color: var(--white);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 12px;
        }
        
        .header-card .user-details {
            line-height: 1.3;
        }
        
        .header-card .user-email {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }
            
            h1 {
                font-size: 1.5rem;
            }
            
            .header-card {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .header-card .user-info {
                flex-direction: column;
            }
            
            .header-card .user-avatar {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="user.php" class="back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <div class="d-flex align-items-center">
                <img src="img/logo.png" alt="Logo" height="40" class="me-2">
                <h1 class="mb-0">SISTEM ADUAN KEROSAKAN ASET</h1>
            </div>
        </div>
        
        <div class="header-card">
            <h2><i class="fas fa-clipboard-list me-2"></i> Borang Aduan Kerosakan</h2>
            <div class="user-info">
                <div class="user-avatar">
                    <?php echo substr($row_akaun['nama'], 0, 1); ?>
                </div>
                <div class="user-details">
                    <div><?php echo $row_akaun['nama']; ?></div>
                    <div class="user-email"><?php echo $row_akaun['emel']; ?></div>
                </div>
            </div>
        </div>

        <form action="aduan_proses.php" method="POST">
            <div class="form-section">
                <div class="section-title"><i class="fas fa-tags me-2"></i>Maklumat Kategori</div>
                <div class="mb-4">
                    <label for="role" class="form-label">Kategori Kerosakan<span class="required-asterisk">*</span></label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="" selected disabled>-- Pilih Kategori --</option>
                        <option value="Bangunan/Sivil">Bangunan/Sivil (Encik Kamal)</option>
                        <option value="Mekanikal/Elektrikal/Aircond">Mekanikal/Elektrikal/Aircond (Encik Hairul)</option>
                        <option value="Komputer/ICT">Komputer/ ICT (Encik Hadi)</option>     
                    </select>
                    <div class="form-text">Pilih kategori yang bersesuaian dengan jenis kerosakan</div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-title"><i class="fas fa-laptop me-2"></i>Maklumat Aset</div>
                <div class="mb-4">
                    <label for="jenis_aset" class="form-label">Jenis Aset<span class="required-asterisk">*</span></label>
                    <div class="icon-input">
                        <i class="fas fa-box"></i>
                        <input type="text" class="form-control" id="jenis_aset" name="jenis_aset" placeholder="Contoh: Komputer, Projektor, Meja, Kerusi" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="nomborsiri" class="form-label">Nombor Siri Pendaftaran Aset<span class="required-asterisk">*</span></label>
                    <div class="icon-input">
                        <i class="fas fa-barcode"></i>
                        <input type="text" class="form-control" id="nomborsiri" name="nomborsiri" placeholder="Contoh: AS-2023-1234" required>
                    </div>
                    <div class="form-text">Nombor siri yang terdapat pada aset</div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-title"><i class="fas fa-map-marker-alt me-2"></i>Lokasi & Kerosakan</div>
                <div class="mb-4">
                    <label for="tempat" class="form-label">Lokasi Kerosakan<span class="required-asterisk">*</span></label>
                    <div class="icon-input">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Contoh: Blok A, Bilik A-101" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="kerosakan" class="form-label">Pengguna Terakhir<span class="required-asterisk">*</span></label>
                    <div class="icon-input">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" id="kerosakan" name="kerosakan" placeholder="Contoh: Ali bin Abu" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="text" class="form-label">Perihal Kerosakan<span class="required-asterisk">*</span></label>
                    <textarea class="form-control" id="text" name="text" rows="4" placeholder="Sila berikan maklumat terperinci tentang kerosakan yang berlaku" required></textarea>
                    <div class="form-text">Huraikan dengan jelas masalah yang dihadapi</div>
                </div>
                
                <div class="mb-4">
                    <label for="Tarikh_kerosakan" class="form-label">Tarikh Kerosakan<span class="required-asterisk">*</span></label>
                    <div class="icon-input">
                        <i class="fas fa-calendar"></i>
                        <input type="date" class="form-control" id="Tarikh_kerosakan" name="Tarikh kerosakan" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-title"><i class="fas fa-user me-2"></i>Maklumat Pengadu</div>
                <div class="mb-4">
                    <label for="Nama_dan_Jawatan" class="form-label">Nama dan Jawatan</label>
                    <input type="hidden" name="Nama dan Jawatan" value="<?php echo $row_akaun['nama'] ?>" required>
                    <input type="text" class="form-control" id="Nama_dan_Jawatan" name="Nama dan Jawatanxxx" value="<?php echo $row_akaun['nama'] ?>" disabled>
                </div>
                
                <div class="mb-4">
                    <label for="emel" class="form-label">Alamat Emel</label>
                    <input type="hidden" name="emel" value="<?php echo $row_akaun['emel'] ?>" required>
                    <input type="text" class="form-control" id="emel" name="emelxx" value="<?php echo $row_akaun['emel'] ?>" disabled>
                </div>
            </div>

            <div class="action-buttons mt-4 mb-3">
                <button type="reset" class="btn btn-danger">
                    <i class="fas fa-times me-2"></i>Reset
                </button>
                <button type="submit" name="aduanuser" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i>Hantar Aduan
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>