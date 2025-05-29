<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Kemas Kini Aduan</title>
    
    <style>
        :root {
            --primary: #3366CC;
            --secondary: #1E3A8A;
            --accent: #FFB347;
            --danger: #FF5A5A;
            --light-bg: #F0F5FF;
            --card-bg: #FFFFFF;
            --text-dark: #333333;
            --text-muted: #6C757D;
            --border-color: #E0E0E0;
        }
        
        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background-color: var(--secondary);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        
        .page-header {
            background-color: var(--primary);
            color: white;
            padding: 1.5rem 0;
            border-radius: 0 0 1rem 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }
        
        .btn-danger {
            background-color: var(--danger);
            border-color: var(--danger);
        }
        
        .back-btn {
            background-color: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            transition: all 0.3s;
        }
        
        .back-btn:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .form-card {
            background-color: var(--card-bg);
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 5px solid var(--primary);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(51, 102, 204, 0.25);
        }
        
        .form-select {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(51, 102, 204, 0.25);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-section {
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .section-title {
            color: var(--secondary);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .icon-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            margin-right: 0.75rem;
            font-size: 0.9rem;
        }
        
        .submit-btn {
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .footer {
            background-color: var(--secondary);
            color: white;
            padding: 1rem 0;
            margin-top: 3rem;
        }
        
        /* Status select styling */
        .status-select {
            background-position: right 1rem center;
            background-size: 16px 12px;
        }
        
        .status-option-process {
            background-color: #FFF3CD;
            color: #856404;
        }
        
        .status-option-accepted {
            background-color: #D4EDDA;
            color: #155724;
        }
        
        .status-option-rejected {
            background-color: #F8D7DA;
            color: #721C24;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-card {
                padding: 1.5rem;
            }
            
            .page-header {
                padding: 1rem 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tools me-2"></i>
                Sistem Aduan Kerosakan Aset
            </a>
        </div>
    </nav>
    
    <!-- Header Section -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-0">Kemas Kini Aduan</h1>
                    <p class="mb-0 text-white-50">Kemaskini maklumat aduan kerosakan aset</p>
                </div>
                <div>
                    <a href="bppa.php" class="btn back-btn">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container">
        <!-- Notification Area -->
        <div id="notification-area">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>' . $_SESSION['success_message'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_SESSION['success_message']);
            }
            
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>' . $_SESSION['error_message'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_SESSION['error_message']);
            }

            // For AJAX success messages
            if (isset($_GET['saved']) && $_GET['saved'] == 'true') {
                echo '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>Aduan berjaya dikemas kini!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
        </div>
        
        <?php
        if (isset($_GET['no_id'])) {
            include("db.php");

            // Dapatkan ID dari URL
            $no_id = $_GET['no_id'];

            // Betulkan query
            $sql = "SELECT * FROM tbl_semakan WHERE no_id = $no_id";
            $result = mysqli_query($conn, $sql);

            // Semak jika rekod wujud
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
        ?>
        <div class="form-card">
            <form id="updateForm" action="process_edit.php" method="POST">
                <input type="hidden" name="no_id" value="<?php echo $no_id; ?>">
                
                <!-- Maklumat Pemohon Section -->
                <div class="form-section">
                    <h5 class="section-title">
                        <div class="icon-circle">
                            <i class="fas fa-user"></i>
                        </div>
                        Maklumat Pemohon
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama dan Jawatan</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama dan jawatan" value="<?php echo $row["nama"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role" class="form-label">Kategori</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="" disabled>Pilih kategori</option>
                                    <option value="Bangunan/Sivil" <?php if($row["role"] == "Bangunan/Sivil") { echo "selected"; } ?>>Bangunan/Sivil (Encik Kamal)</option>
                                    <option value="Mekanikal/Elektrikal/Aircond" <?php if($row["role"] == "Mekanikal/Elektrikal/Aircond") { echo "selected"; } ?>>Mekanikal/Elektrikal/Aircond (Encik Hairul)</option>
                                    <option value="Komputer/ICT" <?php if($row["role"] == "Komputer/ICT") { echo "selected"; } ?>>Komputer/ ICT (Encik Hadi)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Maklumat Aset Section -->
                <div class="form-section">
                    <h5 class="section-title">
                        <div class="icon-circle">
                            <i class="fas fa-desktop"></i>
                        </div>
                        Maklumat Aset
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_aset" class="form-label">Jenis Aset</label>
                                <input type="text" class="form-control" id="jenis_aset" name="jenis_aset" placeholder="Masukkan jenis aset" value="<?php echo $row["jenis_aset"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_siri" class="form-label">No Siri Pendaftaran Aset</label>
                                <input type="text" class="form-control" id="no_siri" name="no_siri" placeholder="Masukkan nombor siri" value="<?php echo $row["no_siri"]; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Maklumat Kerosakan Section -->
                <div class="form-section">
                    <h5 class="section-title">
                        <div class="icon-circle">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        Maklumat Kerosakan
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_rosak" class="form-label">Tempat Kerosakan</label>
                                <input type="text" class="form-control" id="tempat_rosak" name="tempat_rosak" placeholder="Masukkan tempat kerosakan" value="<?php echo $row["tempat_rosak"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tarikh_rosak" class="form-label">Tarikh Kerosakan</label>
                                <input type="date" class="form-control" id="tarikh_rosak" name="tarikh_rosak" value="<?php echo $row["tarikh_rosak"]; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userterakhir" class="form-label">Pengguna Terakhir</label>
                        <input type="text" class="form-control" id="userterakhir" name="userterakhir" placeholder="Masukkan pengguna terakhir" value="<?php echo $row["userterakhir"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ulasan" class="form-label">Perihal Kerosakan</label>
                        <textarea class="form-control" id="ulasan" name="ulasan" rows="4" placeholder="Masukkan perihal kerosakan" required><?php echo $row["ulasan"]; ?></textarea>
                    </div>
                </div>
                
                <!-- Status Section -->
                <div class="form-section">
                    <h5 class="section-title">
                        <div class="icon-circle">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        Status Aduan
                    </h5>
                    <div class="form-group">
                        <label for="lulus_jabatan" class="form-label">Status Pengesahan</label>
                        <select name="lulus_jabatan" id="lulus_jabatan" class="form-select status-select" required>
                            <option value="Dalam Proses" <?php if($row["lulus_jabatan"] == "Dalam Proses") { echo "selected"; } ?>>Dalam Proses</option>
                            <option value="Diterima" <?php if($row["lulus_jabatan"] == "Diterima") { echo "selected"; } ?>>Diterima</option>
                            <option value="Ditolak" <?php if($row["lulus_jabatan"] == "Ditolak") { echo "selected"; } ?>>Ditolak</option>
                            <option value="Sedang Dibaiki" <?php if($row["lulus_jabatan"] == "Sedang Dibaiki") { echo "selected"; } ?>>Sedang Dibaiki</option>
                            <option value="Siap Dibaiki" <?php if($row["lulus_jabatan"] == "Siap Dibaiki") { echo "selected"; } ?>>Siap Dibaiki</option>
                        </select>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-2"></i>Set Semula
                    </button>
                    <button type="submit" name="staffedit" class="btn btn-primary submit-btn" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
        <?php
            } else {
                echo '<div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Permohonan tidak wujud.
                </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                ID aduan tidak ditemui.
            </div>';
        }
        ?>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">© 2025 Sistem Aduan Kerosakan Aset. Hak Cipta Terpelihara.</p>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
            
            // Submit form with AJAX to prevent page reload
            const form = document.getElementById('updateForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                const submitBtn = document.getElementById('submitBtn');
                const originalBtnHtml = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...';
                submitBtn.disabled = true;
                
                // Create FormData object
                const formData = new FormData(form);
                
                // Send AJAX request
                fetch('process_edit.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Display success message
                    const notificationArea = document.getElementById('notification-area');
                    notificationArea.innerHTML = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">' +
                        '<i class="fas fa-check-circle me-2"></i>Aduan berjaya dikemas kini!' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';
                    
                    // Scroll to top to show the message
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    
                    // Reset button state
                    submitBtn.innerHTML = originalBtnHtml;
                    submitBtn.disabled = false;
                    
                    // Auto-dismiss the new alert
                    const newAlert = notificationArea.querySelector('.alert');
                    setTimeout(function() {
                        const bsAlert = new bootstrap.Alert(newAlert);
                        bsAlert.close();
                    }, 5000);
                })
                .catch(error => {
                    // Display error message
                    const notificationArea = document.getElementById('notification-area');
                    notificationArea.innerHTML = '<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">' +
                        '<i class="fas fa-exclamation-circle me-2"></i>Ralat semasa menyimpan perubahan. Sila cuba lagi.' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';
                    
                    // Scroll to top to show the message
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    
                    // Reset button state
                    submitBtn.innerHTML = originalBtnHtml;
                    submitBtn.disabled = false;
                    
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>