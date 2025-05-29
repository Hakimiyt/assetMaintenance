<?php include ("header_print.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous"/>
    <title>SAKA - Terperinci Tentang Aduan Aset</title>

    <style>
        :root {
            --primary-color: #3366CC;
            --secondary-color: #1E3A8A;
            --accent-color: #FFB347;
            --danger-color: #FF5A5A;
            --success-color: #38A169;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-dark: #2d3748;
            --text-muted: #718096;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --gradient-primary: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --gradient-accent: linear-gradient(135deg, var(--accent-color), #ff9f43);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light-bg);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header Styling */
        .page-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
        }

        .page-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title i {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.75rem;
            border-radius: 12px;
            font-size: 1.5rem;
        }

        /* Back Button */
        .btn-back {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Main Container */
        .main-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Detail Card */
        .detail-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .card-header {
            background: var(--gradient-primary);
            color: white;
            padding: 1.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: rotate(45deg);
        }

        .card-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .card-body {
            padding: 2rem;
        }

        /* Detail Grid */
        .detail-grid {
            display: grid;
            gap: 2rem;
        }

        .detail-item {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .detail-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(51, 102, 204, 0.02));
            pointer-events: none;
        }

        .detail-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            background: #ffffff;
        }

        .detail-label {
            font-weight: 700;
            color: var(--secondary-color);
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-label i {
            color: var(--primary-color);
            font-size: 1.1rem;
            width: 20px;
        }

        .detail-value {
            color: var(--text-dark);
            font-size: 1.1rem;
            line-height: 1.6;
            word-wrap: break-word;
            position: relative;
            z-index: 1;
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow-sm);
        }

        .status-approved {
            background: linear-gradient(135deg, #38A169, #48BB78);
            color: white;
        }

        .status-pending {
            background: linear-gradient(135deg, var(--accent-color), #ff9f43);
            color: var(--text-dark);
        }

        .status-rejected {
            background: linear-gradient(135deg, var(--danger-color), #ff6b6b);
            color: white;
        }

        /* Error State */
        .error-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
        }

        .error-icon {
            font-size: 4rem;
            color: var(--danger-color);
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .error-message {
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem 0;
            }

            .page-header .container {
                flex-direction: column;
                text-align: center;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .page-title i {
                font-size: 1.2rem;
                padding: 0.5rem;
            }

            .main-container {
                padding: 0 0.75rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .detail-item {
                padding: 1.25rem;
            }

            .btn-back {
                padding: 0.625rem 1.25rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.25rem;
            }

            .card-header {
                padding: 1.25rem 1.5rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .detail-item {
                padding: 1rem;
            }

            .detail-label {
                font-size: 0.85rem;
            }

            .detail-value {
                font-size: 1rem;
            }
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
            }

            .page-header,
            .btn-back {
                display: none;
            }

            .detail-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .detail-item {
                background: white;
                border: 1px solid #eee;
            }
        }

        /* Animation */
        .detail-item {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .detail-item:nth-child(1) { animation-delay: 0.1s; }
        .detail-item:nth-child(2) { animation-delay: 0.2s; }
        .detail-item:nth-child(3) { animation-delay: 0.3s; }
        .detail-item:nth-child(4) { animation-delay: 0.4s; }
        .detail-item:nth-child(5) { animation-delay: 0.5s; }
        .detail-item:nth-child(6) { animation-delay: 0.6s; }
        .detail-item:nth-child(7) { animation-delay: 0.7s; }
        .detail-item:nth-child(8) { animation-delay: 0.8s; }
        .detail-item:nth-child(9) { animation-delay: 0.9s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">
                <i class="fas fa-clipboard-list"></i>
                Keterangan Aduan Aset
            </h1>
            <a href="maklumat_user.php" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <?php
        include 'db.php'; // Ensure your database connection is correct

        // Check if 'no_id' is present in the GET request and is numeric
        if (isset($_GET['no_id']) && is_numeric($_GET['no_id'])) {
            $no_id = $_GET['no_id'];
            $sql = "SELECT * FROM tbl_semakan WHERE no_id = $no_id";
            $result = mysqli_query($conn, $sql);
        
            // Check if the query returned any results
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="detail-card">
                    <div class="card-header">
                        <h2>Maklumat Lengkap Aduan</h2>
                    </div>
                    <div class="card-body">
                        <div class="detail-grid">
                            
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-user"></i>
                                    Nama dan Jawatan
                                </div>
                                <div class="detail-value"><?php echo htmlspecialchars($row["nama"]); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-tags"></i>
                                    Kategori
                                </div>
                                <div class="detail-value"><?php echo htmlspecialchars($row["role"]); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-desktop"></i>
                                    Jenis Aset
                                </div>
                                <div class="detail-value"><?php echo htmlspecialchars($row["jenis_aset"]); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-barcode"></i>
                                    No Siri Pendaftaran Aset
                                </div>
                                <div class="detail-value"><?php echo htmlspecialchars($row["no_siri"]); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Tempat Kerosakan
                                </div>
                                <div class="detail-value"><?php echo htmlspecialchars($row["tempat_rosak"]); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-calendar-alt"></i>
                                    Tarikh Kerosakan
                                </div>
                                <div class="detail-value"><?php echo htmlspecialchars($row["tarikh_rosak"]); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-user-check"></i>
                                    Pengguna Terakhir
                                </div>
                                <div class="detail-value"><?php echo htmlspecialchars($row["userterakhir"]); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-comment-alt"></i>
                                    Perihal Kerosakan
                                </div>
                                <div class="detail-value"><?php echo nl2br(htmlspecialchars($row["ulasan"])); ?></div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-check-circle"></i>
                                    Status Pengesahan
                                </div>
                                <div class="detail-value">
                                    <?php 
                                    $status = $row["lulus_jabatan"];
                                    $badgeClass = '';
                                    $icon = '';
                                    
                                    if ($status == 'Disahkan') {
                                        $badgeClass = 'status-approved';
                                        $icon = '<i class="fas fa-check-circle"></i>';
                                    } elseif ($status == 'Ditolak') {
                                        $badgeClass = 'status-rejected';
                                        $icon = '<i class="fas fa-times-circle"></i>';
                                    } else {
                                        $badgeClass = 'status-pending';
                                        $icon = '<i class="fas fa-clock"></i>';
                                        $status = 'Belum Disahkan';
                                    }
                                    ?>
                                    <span class="status-badge <?php echo $badgeClass; ?>">
                                        <?php echo $icon; ?>
                                        <?php echo htmlspecialchars($status); ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        <?php
                }
            } else {
                ?>
                <div class="error-state">
                    <i class="fas fa-exclamation-triangle error-icon"></i>
                    <h3 class="error-title">Aduan Tidak Dijumpai</h3>
                    <p class="error-message">Maaf, tiada maklumat aduan dijumpai untuk ID yang diminta.</p>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="error-state">
                <i class="fas fa-exclamation-triangle error-icon"></i>
                <h3 class="error-title">Parameter Tidak Sah</h3>
                <p class="error-message">ID aduan tidak sah atau tidak disediakan.</p>
            </div>
            <?php
        }
        ?>
    </div>

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to detail items
            const detailItems = document.querySelectorAll('.detail-item');
            
            detailItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
    
    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(51, 102, 204, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
    </style>
</body>
</html>