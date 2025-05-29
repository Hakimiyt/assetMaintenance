<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Senarai Aduan | Sistem Aduan Kerosakan Aset</title>

    <style>
        :root {
            --primary: #3366CC;
            --secondary: #1E3A8A;
            --accent: #FFB347;
            --danger: #FF5A5A;
            --light-bg: #f5f7fa;
            --border-color: #dfe4ea;
            --success: #28a745;
            --warning: #FFC107;
            --info: #17a2b8;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: var(--light-bg);
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            position: relative;
        }

        /* Navbar styling */
        .navbar {
            background-color: var(--primary);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .navbar-brand img {
            height: 60px;
            margin-right: 15px;
        }
        
        .brand-text {
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin: 0;
        }
        
        .navbar-nav {
            display: flex;
            align-items: center;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        
        .navbar-nav li {
            margin-left: 15px;
        }
        
        .btn-primary-custom {
            background-color: var(--secondary);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .btn-primary-custom:hover {
            background-color: #15296b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-danger-custom {
            background-color: var(--danger);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .btn-danger-custom:hover {
            background-color: #e84545;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-danger-custom i {
            margin-right: 8px;
        }
        
        .btn-primary-custom i {
            margin-right: 8px;
        }

        /* Main content */
        .content-section {
            flex: 1;
            padding: 30px 20px;
        }
        
        .container-custom {
            max-width: 1500px;
            margin: 0 auto;
            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            position: relative;
        }
        
        .page-title {
            color: var(--secondary);
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 24px;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 60px;
            background-color: var(--accent);
            border-radius: 2px;
        }

        /* Table styling */
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: var(--primary);
            color: white;
            padding: 15px 10px;
            text-align: center;
            font-weight: 600;
            border: none;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .table thead th:first-child {
            border-top-left-radius: 8px;
        }
        
        .table thead th:last-child {
            border-top-right-radius: 8px;
        }
        
        .table tbody td {
            background-color: #ffffff;
            border-bottom: 1px solid var(--border-color);
            padding: 15px 10px;
            vertical-align: middle;
            color: #444;
            transition: background-color 0.3s ease;
        }
        
        .table tbody tr:hover td {
            background-color: #f9fafc;
        }
        
        .table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 8px;
        }
        
        .table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 8px;
        }
        
        /* Action buttons */
        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            justify-content: center;
        }
        
        .btn-action {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            color: white;
            display: inline-flex;
            align-items: center;
            border: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        
        .btn-action i {
            margin-right: 5px;
        }
        
        .btn-info-custom {
            background-color: var(--info);
        }
        
        .btn-info-custom:hover {
            background-color: #138496;
            transform: translateY(-2px);
        }
        
        .btn-warning-custom {
            background-color: var(--warning);
            color: #212529;
        }
        
        .btn-warning-custom:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }
        
        .btn-success-custom {
            background-color: var(--success);
        }
        
        .btn-success-custom:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        
        .btn-danger-custom-sm {
            background-color: var(--danger);
        }
        
        .btn-danger-custom-sm:hover {
            background-color: #e84545;
            transform: translateY(-2px);
        }

        /* Status badges */
        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            display: inline-block;
        }
        
        .badge-pending {
            background-color: #ffeeba;
            color: #856404;
        }
        
        .badge-approved {
            background-color: #d4edda;
            color: #155724;
        }
        
        .badge-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Footer styling */
        .footer {
            background-color: var(--primary);
            padding: 20px;
            text-align: center;
            color: white;
            font-weight: 500;
            margin-top: auto;
            box-shadow: 0 -4px 12px rgba(0,0,0,0.1);
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }
        
        .empty-state i {
            font-size: 60px;
            color: #ccc;
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            color: #666;
            margin-bottom: 10px;
        }
        
        .empty-state p {
            color: #888;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Utility classes */
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-truncate {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Responsiveness */
        @media (max-width: 992px) {
            .navbar-brand img {
                height: 50px;
            }
            
            .brand-text {
                font-size: 1.2rem;
            }
            
            .container-custom {
                padding: 20px 15px;
            }
            
            .btn-action {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 15px;
            }
            
            .navbar-brand {
                margin-bottom: 15px;
            }
            
            .navbar-nav {
                width: 100%;
                justify-content: space-between;
            }
            
            .navbar-nav li {
                margin: 0;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-action {
                width: 100%;
                justify-content: center;
                margin-bottom: 5px;
            }
            
            .page-title {
                font-size: 22px;
            }
        }
        
        @media (max-width: 576px) {
            .brand-text {
                font-size: 1rem;
            }
            
            .btn-primary-custom, .btn-danger-custom {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
            
            .footer {
                padding: 15px;
                font-size: 0.9rem;
            }
            
            .page-title {
                font-size: 20px;
            }
            
            .table thead th, .table tbody td {
                font-size: 0.85rem;
                padding: 10px 8px;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .container-custom {
            animation: fadeIn 0.5s ease forwards;
        }

        /* Loading spinner */
        .spinner-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Status styling */
        .status-pending {
            background-color: #FFF3CD;
            color: #856404;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .status-approved {
            background-color: #D4EDDA;
            color: #155724;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .status-rejected {
            background-color: #F8D7DA;
            color: #721C24;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Loading spinner (will be hidden after page loads) -->
    <div class="spinner-container" id="loadingSpinner">
        <div class="spinner"></div>
    </div>

    <!-- Navbar -->
    <div class="navbar">
        <a class="navbar-brand" href="#">
            <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Sistem Aduan Kerosakan Aset" />
            <h1 class="brand-text">SISTEM ADUAN KEROSAKAN ASET</h1>
        </a>
        <ul class="navbar-nav">
            <li>
                <a href="aduan_admin.php" class="btn-primary-custom">
                    <i class="fas fa-file-alt"></i> Mohon Aduan Aset
                </a>
            </li>
            <li>
                <a href="admin.php" class="btn-danger-custom">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="page-title"><i class="fas fa-clipboard-list me-2"></i>Senarai Aduan Kerosakan Aset</h2>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">Bil.</th>
                            <th width="8%">Kategori</th>
                            <th width="10%">Tarikh Kerosakan</th>
                            <th width="15%">Nama Dan Jawatan</th>
                            <th width="10%">Jenis Aset</th>
                            <th width="12%">No. Siri Pendaftaran</th>
                            <th width="10%">Pengguna Terakhir</th>
                            <th width="10%">Tempat Rosak</th>
                            <th width="8%">Status</th>
                            <th width="12%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM tbl_semakan";
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $count = 1;
                        while ($data = mysqli_fetch_assoc($result)) {
                            // Changed 'kategori' to 'role' to match database column name
                            $kategori = isset($data['role']) ? htmlspecialchars($data['role']) : 'N/A';
                            $tarikh_rosak = isset($data['tarikh_rosak']) ? htmlspecialchars($data['tarikh_rosak']) : 'N/A';
                            $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : 'N/A';
                            $jenis_aset = isset($data['jenis_aset']) ? htmlspecialchars($data['jenis_aset']) : 'N/A';
                            $no_siri = isset($data['no_siri']) ? htmlspecialchars($data['no_siri']) : 'N/A';
                            $userterakhir = isset($data['userterakhir']) ? htmlspecialchars($data['userterakhir']) : 'N/A';
                            $tempat_rosak = isset($data['tempat_rosak']) ? htmlspecialchars($data['tempat_rosak']) : 'N/A';
                            $lulus_jabatan = isset($data['lulus_jabatan']) ? htmlspecialchars($data['lulus_jabatan']) : 'Belum Disahkan';
                            $no_id = isset($data['no_id']) ? $data['no_id'] : '#';
                            
                            // Determine status class
                            $status_class = 'status-pending';
                            if ($lulus_jabatan == 'Diluluskan') {
                                $status_class = 'status-approved';
                            } elseif ($lulus_jabatan == 'Ditolak') {
                                $status_class = 'status-rejected';
                            }
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $count++; ?></td>
                            <td><?php echo $kategori; ?></td>
                            <td><?php echo $tarikh_rosak; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $jenis_aset; ?></td>
                            <td><?php echo $no_siri; ?></td>
                            <td><?php echo $userterakhir; ?></td>
                            <td><?php echo $tempat_rosak; ?></td>
                            <td class="text-center">
                                <span class="<?php echo $status_class; ?>">
                                    <?php echo $lulus_jabatan; ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="view_admin.php?no_id=<?php echo $no_id; ?>" class="btn-action btn-info-custom">
                                        <i class="fas fa-info-circle"></i> Lihat
                                    </a>
                                    <a href="edit_admin.php?no_id=<?php echo $no_id; ?>" class="btn-action btn-warning-custom">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="hantar.php?no_id=<?php echo $no_id; ?>" class="btn-action btn-success-custom">
                                        <i class="fas fa-paper-plane"></i> Hantar
                                    </a>
                                    <a href="delete.php?no_id=<?php echo $no_id; ?>" class="btn-action btn-danger-custom-sm" onclick="return confirm('Adakah anda pasti mahu membuang rekod ini?');">
                                        <i class="fas fa-trash-alt"></i> Buang
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="10">
                                <div class="empty-state">
                                    <i class="fas fa-clipboard-list"></i>
                                    <h3>Tiada Rekod Ditemui</h3>
                                    <p>Tiada aduan kerosakan aset yang telah didaftarkan setakat ini.</p>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p><i class="fas fa-building me-2"></i> ILP Kuala Langat Selangor &copy; 2024 Sistem Kerosakan Aset. All rights reserved.</p>
        </div>
    </div>

    <script>
        // Hide loading spinner when page is fully loaded
        window.addEventListener('load', function() {
            document.getElementById('loadingSpinner').style.display = 'none';
        });

        // Add hover effect to table rows
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseover', () => {
                row.style.backgroundColor = '#f8f9fa';
            });
            row.addEventListener('mouseout', () => {
                row.style.backgroundColor = '#ffffff';
            });
        });
        
        // Add confirmation for delete button
        const deleteButtons = document.querySelectorAll('.btn-danger-custom-sm');
        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                if (!confirm('Adakah anda pasti mahu membuang rekod ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>