<?php 
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
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: var(--secondary-light);
            color: var(--text-dark);
        }
        
        .container {
            max-width: 900px;
            margin: 40px auto;
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
            margin: 0;
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
        
        input[type="text"],
        input[type="date"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.25);
        }
        
        button {
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            font-size: 1rem;
            transition: 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(30, 58, 138, 0.15);
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: var(--white);
        }
        
        .btn-danger:hover {
            background-color: #e74c3c;
        }
        
        .back-button {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-right: auto;
        }
        
        .back-button:hover {
            color: var(--primary-dark);
            transform: translateX(-3px);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            display: block;
        }
        
        .form-text {
            color: var(--text-light);
            font-size: 0.875rem;
            margin-top: 5px;
        }
        
        .required-asterisk {
            color: var(--danger);
            margin-left: 4px;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            margin-bottom: 15px;
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
            flex-wrap: wrap;
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
        
        /* Layout utilities (pengganti d-flex & justify-content-between) */
        .flex {
            display: flex;
            align-items: center;
        }
        
        .space-between {
            justify-content: space-between;
        }
        
        /* Spacing custom */
        .spacing-bottom {
            margin-bottom: 1.5rem;
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
    <div style="margin-top: -8vh; overflow-y: hidden;">
    <div class="container">
        <div class="" style="text-align: center;">
            <div class="flex">
                <img src="img/logo.png" alt="Logo" height="80px" width="80px" style="margin-right:10px;">
                <h1>SISTEM ADUAN KEROSAKAN ASET</h1>
            </div>
        </div>
        
        <div class="header-card">
            <h2>📋 Borang Aduan Kerosakan</h2>
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

        <form action="aduan_proses.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <div class="section-title">🏷️ Maklumat Kategori</div>
                <div class="spacing-bottom">
                    <label for="role" class="form-label">Kategori Kerosakan<span class="required-asterisk">*</span></label>
                    <select name="role" id="role" required>
                        <option value="" selected disabled>-- Pilih Kategori --</option>
                        <option value="Bangunan/Sivil">Bangunan/Sivil (Encik Kamal)</option>
                        <option value="Mekanikal/Elektrikal/Aircond">Mekanikal/Elektrikal/Aircond (Encik Hairul)</option>
                        <option value="Komputer/ICT">Komputer/ ICT (Encik Hadi)</option>     
                    </select>
                    <div class="form-text">Pilih kategori yang bersesuaian dengan jenis kerosakan</div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-title">💻 Maklumat Aset</div>
                <div class="spacing-bottom">
                    <label for="jenis_aset" class="form-label">Jenis Aset<span class="required-asterisk">*</span></label>
                    <input type="text" id="jenis_aset" name="jenis_aset" placeholder="Contoh: Komputer, Projektor, Meja, Kerusi" required>
                </div>
                
                <div class="spacing-bottom">
                    <label for="no_siri" class="form-label">Nombor Siri Pendaftaran Aset<span class="required-asterisk">*</span></label>
                    <input type="text" id="no_siri" name="no_siri" placeholder="Contoh: AS-2023-1234" required>
                    <div class="form-text">Nombor siri yang terdapat pada aset</div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-title">📍 Lokasi & Kerosakan</div>
                <div class="spacing-bottom">
                    <label for="tempat_rosak" class="form-label">Lokasi Kerosakan<span class="required-asterisk">*</span></label>
                    <input type="text" id="tempat_rosak" name="tempat_rosak" placeholder="Contoh: Blok A, Bilik A-101" required>
                </div>
                
                <div class="spacing-bottom">
                    <label for="userterakhir" class="form-label">Pengguna Terakhir<span class="required-asterisk">*</span></label>
                    <input type="text" id="userterakhir" name="userterakhir" placeholder="Contoh: Ali bin Abu" required>
                </div>
                
                <div class="spacing-bottom">
                    <label for="ulasan" class="form-label">Perihal Kerosakan<span class="required-asterisk">*</span></label>
                    <textarea id="ulasan" name="ulasan" rows="4" placeholder="Sila berikan maklumat terperinci tentang kerosakan yang berlaku" required></textarea>
                    <div class="form-text">Huraikan dengan jelas masalah yang dihadapi</div>
                </div>

                <div class="spacing-bottom">
                    <label for="image" class="form-label">Bukti Gambar<span class="required-asterisk">*</span></label>
                    <input type="file" name="image" accept="image/*" required id="image"> 
                    <div class="form-text">Format yang disokong: JPEG, PNG, GIF</div>
                </div>
                
                <div class="spacing-bottom">
                    <label for="tarikh_rosak" class="form-label">Tarikh Kerosakan<span class="required-asterisk">*</span></label>
                    <input type="date" id="tarikh_rosak" name="tarikh_rosak" required>
                </div>
            </div>

            <div class="form-section">
                <div class="section-title">👤 Maklumat Pengadu</div>
                <div class="spacing-bottom">
                    <label for="nama" class="form-label">Nama dan Jawatan</label>
                    <input type="hidden" name="nama" value="<?php echo $row_akaun['nama'] ?>" required>
                    <input type="text" id="namaxx" name="namaxx" value="<?php echo $row_akaun['nama'] ?>" disabled>
                </div>
                
                <div class="spacing-bottom">
                    <label for="emel" class="form-label">Alamat Emel</label>
                    <input type="hidden" name="emel" value="<?php echo $row_akaun['emel'] ?>" required>
                    <input type="text" id="emelxx" name="emelxx" value="<?php echo $row_akaun['emel'] ?>" disabled>
                </div>
            </div>

            <div class="action-buttons">
                <button type="reset" class="btn-danger">✖ Reset</button>
                <button type="submit" name="aduanuser" class="btn-primary">📤 Hantar Aduan</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
