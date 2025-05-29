<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Terperinci Tentang Aduan Aset</title>
    
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
        
        .detail-card {
            background-color: var(--card-bg);
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 5px solid var(--primary);
        }
        
        .detail-section {
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
        }
        
        .detail-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 0.3rem;
            font-size: 1rem;
        }
        
        .detail-value {
            font-size: 1.1rem;
            padding: 0.5rem;
            background-color: var(--light-bg);
            border-radius: 0.5rem;
        }
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: bold;
            display: inline-block;
        }
        
        .status-pending {
            background-color: #FFF3CD;
            color: #856404;
        }
        
        .status-approved {
            background-color: #D4EDDA;
            color: #155724;
        }
        
        .status-rejected {
            background-color: #F8D7DA;
            color: #721C24;
        }
        
        .highlight {
            background-color: var(--accent);
            padding: 0.2rem 0.5rem;
            border-radius: 0.3rem;
            font-weight: 500;
        }
        
        .icon-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            margin-right: 0.75rem;
        }
        
        .footer {
            background-color: var(--secondary);
            color: white;
            padding: 1rem 0;
            margin-top: 3rem;
        }
        
        @media (max-width: 768px) {
            .detail-card {
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
                    <h1 class="mb-0">Maklumat Terperinci Aduan</h1>
                    <p class="mb-0 text-white-50">Lihat maklumat lengkap mengenai aduan kerosakan aset</p>
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
        <div class="detail-card">
            <!-- PHP Code to retrieve and display data -->
            <?php
            include 'db.php'; // Ensure your database connection is correct
            
            // Check if 'noid' is present in the GET request and is numeric
            if (isset($_GET['no_id']) && is_numeric($_GET['no_id'])) {
                $no_id = $_GET['no_id'];
                $sql = "SELECT * FROM tbl_semakan WHERE no_id = $no_id";
                $result = mysqli_query($conn, $sql);
                
                // Check if the query returned any results
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
            ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-section">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle">
                                    <i class="fas fa-user"></i>
                                </div>
                                <h5 class="mb-0">Maklumat Pemohon</h5>
                            </div>
                            <div class="detail-label">Nama dan Jawatan:</div>
                            <div class="detail-value"><?php echo $row["nama"]; ?></div>
                        </div>
                        
                        <div class="detail-section">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <h5 class="mb-0">Kategori:</h5>
                            </div>
                            <div class="detail-value"><?php echo $row["role"]; ?></div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="detail-section">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle">
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <h5 class="mb-0">Maklumat Aset</h5>
                            </div>
                            <div class="detail-label">Jenis Aset:</div>
                            <div class="detail-value"><?php echo $row["jenis_aset"]; ?></div>
                            
                            <div class="detail-label mt-3">No Siri Pendaftaran Aset:</div>
                            <div class="detail-value highlight"><?php echo $row["no_siri"]; ?></div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="detail-section">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h5 class="mb-0">Lokasi Kerosakan</h5>
                            </div>
                            <div class="detail-label">Tempat Kerosakan:</div>
                            <div class="detail-value"><?php echo $row["tempat_rosak"]; ?></div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="detail-section">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <h5 class="mb-0">Tarikh & Pengguna</h5>
                            </div>
                            <div class="detail-label">Tarikh Kerosakan:</div>
                            <div class="detail-value"><?php echo $row["tarikh_rosak"]; ?></div>
                            
                            <div class="detail-label mt-3">Pengguna Terakhir:</div>
                            <div class="detail-value"><?php echo $row["userterakhir"]; ?></div>
                        </div>
                    </div>
                </div>
                
                <div class="detail-section mt-3">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h5 class="mb-0">Perihal Kerosakan</h5>
                    </div>
                    <div class="detail-value"><?php echo $row["ulasan"]; ?></div>
                </div>
                
                <div class="detail-section mt-3">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h5 class="mb-0">Status Pengesahan</h5>
                    </div>
                    <?php
                        $status = strtolower($row["lulus_jabatan"]);
                        $statusClass = "status-pending";
                        $statusIcon = "question-circle";
                        
                        if (strpos($status, 'lulus') !== false || strpos($status, 'sah') !== false) {
                            $statusClass = "status-approved";
                            $statusIcon = "check-circle";
                        } else if (strpos($status, 'tidak') !== false || strpos($status, 'tolak') !== false) {
                            $statusClass = "status-rejected";
                            $statusIcon = "times-circle";
                        }
                    ?>
                    <div class="status-badge <?php echo $statusClass; ?>">
                        <i class="fas fa-<?php echo $statusIcon; ?> me-2"></i>
                        <?php echo $row["lulus_jabatan"]; ?>
                    </div>
                </div>
            <?php
                } else {
                    echo '<div class="alert alert-warning" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Tiada pemohonan dijumpai. ID aduan tidak wujud atau telah dipadam.
                    </div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    ID aduan tidak sah. Sila kembali ke halaman utama.
                </div>';
            }
            ?>
        </div>
        
       
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">© 2025 Sistem Aduan Kerosakan Aset. Hak Cipta Terpelihara.</p>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>