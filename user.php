<?php
include('db.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['ic'])) {
    header("Location: index.php");
    exit();
}

// Get current user's information
$ic= $_SESSION['ic'];
$sql = "SELECT * FROM `tbl_daftar` WHERE ic = '$ic'";
$result = mysqli_query($conn, $sql);
$userdata = mysqli_fetch_assoc($result);

// If no user data found, redirect to login
if (!$userdata) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous"/>
    <title>SAKA - Dashboard Pengguna</title>

    <style>
        :root {
            --primary-color: #3366CC;
            --secondary-color: #1E3A8A;
            --accent-color: #FFB347;
            --danger-color: #FF5A5A;
            --light-bg: #f0f4f8;
            --text-dark: #2d3748;
            --text-light: #ffffff;
            --divider-color: #e2e8f0;
            --success-color: #38A169;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            margin: 0;
            padding: 0;
            color: var(--text-dark);
        }

        /* Navbar styling */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 0.75rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--text-light);
            flex: 1;
        }

        .navbar-brand img {
            margin-right: 15px;
            border-radius: 8px;
        }

        .navbar-brand h4 {
            color: var(--text-light);
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .navbar-nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .nav-btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            color: var(--text-light);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .nav-btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.25);
            color: var(--text-light);
        }

        .nav-btn-danger {
            background-color: rgba(255, 90, 90, 0.15);
            color: var(--text-light);
            border: 1px solid rgba(255, 90, 90, 0.3);
        }

        .nav-btn-danger:hover {
            background-color: var(--danger-color);
            color: var(--text-light);
        }

        /* User profile display */
        .user-profile {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 5px 12px;
            border-radius: 50px;
            margin-right: 15px;
        }

        .user-profile .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            font-weight: 600;
            margin-right: 8px;
            font-size: 0.8rem;
        }

        .user-profile .name {
            color: var(--text-light);
            font-size: 0.85rem;
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main content */
        .container-dashboard {
            max-width: 95%;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 25px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            border-radius: 10px;
        }

        .page-title {
            text-align: center;
            margin-bottom: 25px;
            color: var(--secondary-color);
            font-weight: 600;
            position: relative;
            padding-bottom: 12px;
            font-size: 1.8rem;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .user-email {
            text-align: center;
            color: var(--text-dark);
            margin-top: -15px;
            margin-bottom: 25px;
            font-size: 1rem;
            opacity: 0.8;
        }

        /* Table styling */
        .table-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }

        .custom-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .custom-table thead th {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            padding: 12px 15px;
            border: none;
            font-weight: 600;
            text-align: center;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            vertical-align: middle;
        }

        .custom-table tbody td {
            background-color: #ffffff;
            border: 1px solid var(--divider-color);
            padding: 12px 15px;
            text-align: left;
            vertical-align: middle;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .custom-table tbody tr:hover td {
            background-color: rgba(240, 244, 248, 0.7);
        }

        /* Expandable cell styles */
        .expandable-cell {
            position: relative;
            cursor: pointer;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .expandable-cell:hover {
            color: var(--primary-color);
        }
        
        .expandable-cell .full-content {
            display: none;
            position: absolute;
            left: 0;
            top: 100%;
            background: #ffffff;
            border: 1px solid var(--divider-color);
            padding: 15px;
            z-index: 100;
            width: 350px;
            white-space: normal;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 6px;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        .expandable-cell:hover .full-content {
            display: block;
        }

        /* Status badges */
        .badge {
            padding: 6px 10px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.8rem;
            text-align: center;
            display: inline-block;
            min-width: 80px;
        }

        .badge-pending {
            background-color: rgba(255, 179, 71, 0.15);
            color: #B45309;
        }

        .badge-approved {
            background-color: rgba(56, 161, 105, 0.15);
            color: #276749;
        }

        .badge-rejected {
            background-color: rgba(255, 90, 90, 0.15);
            color: #C53030;
        }

        /* DataTables custom styling */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid var(--divider-color);
            border-radius: 6px;
            padding: 5px 10px;
            color: var(--text-dark);
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.15);
        }

        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 20px;
            color: var(--text-dark);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 4px;
            border: 1px solid var(--divider-color);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: #ffffff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: rgba(51, 102, 204, 0.1) !important;
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }

        /* Stats/Info cards at the top */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            border-left: 4px solid var(--primary-color);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
            color: #ffffff;
        }

        .stat-card:nth-child(1) .icon {
            background-color: var(--primary-color);
        }

        .stat-card:nth-child(2) .icon {
            background-color: var(--accent-color);
        }

        .stat-card:nth-child(3) .icon {
            background-color: var(--success-color);
        }

        .stat-card .stat-content {
            flex: 1;
        }

        .stat-card .stat-title {
            color: #718096;
            font-size: 0.85rem;
            margin-bottom: 5px;
        }

        .stat-card .stat-value {
            color: var(--text-dark);
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Add button styling */
        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            margin-bottom: 25px;
            text-decoration: none;
        }

        .action-button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            color: white;
        }

        .button-container {
            text-align: center;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 15px 10px;
                text-align: center;
            }
            
            .navbar-brand {
                margin-bottom: 15px;
                justify-content: center;
                text-align: center;
            }
            
            .navbar-brand h4 {
                font-size: 1rem;
                text-align: center;
                white-space: normal;
                line-height: 1.3;
            }
            
            .navbar-nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .user-profile {
                margin-right: 0;
                margin-bottom: 10px;
                order: -1;
            }
            
            .nav-btn {
                font-size: 0.85rem;
                padding: 6px 12px;
            }
            
            .container-dashboard {
                padding: 15px;
                margin: 15px auto;
            }
            
            .page-title {
                font-size: 1.4rem;
                margin-bottom: 20px;
            }
            
            .user-email {
                font-size: 0.9rem;
                margin-bottom: 20px;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .stat-card {
                padding: 15px;
            }
            
            .stat-card .icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
                margin-right: 12px;
            }
            
            .stat-card .stat-value {
                font-size: 1.3rem;
            }
            
            .stat-card .stat-title {
                font-size: 0.8rem;
            }
            
            .action-button {
                width: 100%;
                max-width: 250px;
                padding: 12px 20px;
                font-size: 0.9rem;
            }
            
            .button-container {
                margin-bottom: 20px;
            }
            
            /* Mobile table adjustments */
            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .custom-table {
                min-width: 800px;
            }
            
            .custom-table thead th,
            .custom-table tbody td {
                padding: 8px 10px;
                font-size: 0.85rem;
            }
            
            .expandable-cell .full-content {
                width: 280px;
                padding: 12px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 10px 8px;
            }
            
            .navbar-brand img {
                height: 35px;
                margin-right: 10px;
            }
            
            .navbar-brand h4 {
                font-size: 0.9rem;
            }
            
            .container-dashboard {
                margin: 10px auto;
                padding: 12px;
            }
            
            .page-title {
                font-size: 1.2rem;
            }
            
            .user-email {
                font-size: 0.8rem;
            }
            
            .stat-card {
                padding: 12px;
            }
            
            .stat-card .icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
                margin-right: 10px;
            }
            
            .stat-card .stat-value {
                font-size: 1.1rem;
            }
            
            .action-button {
                padding: 10px 15px;
                font-size: 0.85rem;
            }
            
            .custom-table thead th,
            .custom-table tbody td {
                padding: 6px 8px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
<!-- Navbar -->
<div class="navbar">
    <a class="navbar-brand" href="#">
        <img src="img/305199717_985453492342369_1200662185772088661_n.png" height="40" alt="Sistem Aduan Kerosakan Aset" />
        <h4><b>SISTEM ADUAN KEROSAKAN ASET (SAKA)</b></h4>
    </a>
    <ul class="navbar-nav">
        <div class="user-profile">
            <div class="avatar">
                <?php echo substr($userdata['nama'] ?? 'User', 0, 1); ?>
            </div>
            <div class="name">
                <?php echo $userdata['nama'] ?? 'User'; ?>
            </div>
        </div>
        <li><a href="index.php" class="nav-btn nav-btn-danger"><i class="fas fa-sign-out-alt"></i> Log Keluar</a></li>
    </ul>
</div>

<!-- Main content -->
<div class="container-dashboard">
    <!-- Stats cards row -->
    <div class="stats-container">
        <?php
        // Count total complaints
        $total_query = "SELECT COUNT(*) as total FROM `tbl_semakan` WHERE emel = '".$userdata['emel']."'";
        $total_result = mysqli_query($conn, $total_query);
        $total_data = mysqli_fetch_assoc($total_result);
        $total_complaints = $total_data['total'];
        
        // Count pending complaints
        $pending_query = "SELECT COUNT(*) as pending FROM `tbl_semakan` WHERE emel = '".$userdata['emel']."' AND lulus_jabatan = 'Belum Disahkan'";
        $pending_result = mysqli_query($conn, $pending_query);
        $pending_data = mysqli_fetch_assoc($pending_result);
        $pending_complaints = $pending_data['pending'];
        
        // Count approved complaints
        $approved_query = "SELECT COUNT(*) as approved FROM `tbl_semakan` WHERE emel = '".$userdata['emel']."' AND lulus_jabatan = 'Disahkan'";
        $approved_result = mysqli_query($conn, $approved_query);
        $approved_data = mysqli_fetch_assoc($approved_result);
        $approved_complaints = $approved_data['approved'];
        ?>
        <div class="stat-card">
            <div class="icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-title">Jumlah Aduan</div>
                <div class="stat-value"><?php echo $total_complaints; ?></div>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <div class="stat-title">Belum Disahkan</div>
                <div class="stat-value"><?php echo $pending_complaints; ?></div>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-title">Disahkan</div>
                <div class="stat-value"><?php echo $approved_complaints; ?></div>
            </div>
        </div>
    </div>

    <h2 class="page-title">Senarai Aduan Kerosakan Aset</h2>
    <div class="user-email"><?php echo($userdata['emel']); ?></div>
    
    <div class="button-container">
        <a href="aduan_user.php" class="action-button">
            <i class="fas fa-plus-circle"></i> Borang Aduan
        </a>
    </div>

    <div class="table-container">
        <table id="aduanTable" class="custom-table table-bordered display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Bil.</th>
                    <th>Kategori</th>
                    <th>Tarikh Kerosakan</th>
                    <th>Nama</th>
                    <th>Jenis Aset</th>
                    <th>No. Siri Aset</th>
                    <th>Tempat Rosak</th>
                    <th>Pengguna Terakhir</th>
                    <th>Perihal Kerosakan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Filter by the current user's ID or IC number
            $sql = "SELECT * FROM `tbl_semakan` WHERE emel = '".$userdata['emel']."' ORDER BY tarikh_rosak DESC";
            $result = mysqli_query($conn, $sql);
            if ($result && $result->num_rows > 0) {
                $count = 1;
                while ($data = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="text-center"><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($data['role']); ?></td>
                    <td><?php echo htmlspecialchars($data['tarikh_rosak']); ?></td>
                    <td><?php echo htmlspecialchars($data['nama']); ?></td>
                    <td><?php echo htmlspecialchars($data['jenis_aset']); ?></td>
                    <td><?php echo htmlspecialchars($data['no_siri']); ?></td>
                    <td><?php echo htmlspecialchars($data['tempat_rosak']); ?></td>
                    <td><?php echo htmlspecialchars($data['userterakhir']); ?></td>
                    <td class="expandable-cell">
                        <?php echo htmlspecialchars(substr($data['ulasan'], 0, 50) . (strlen($data['ulasan']) > 50 ? '...' : '')); ?>
                        <?php if(strlen($data['ulasan']) > 50): ?>
                        <div class="full-content">
                            <?php echo nl2br(htmlspecialchars($data['ulasan'])); ?>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($data['lulus_jabatan'] == 'Disahkan'): ?>
                            <span class="badge badge-approved">Disahkan</span>
                        <?php elseif($data['lulus_jabatan'] == 'Ditolak'): ?>
                            <span class="badge badge-rejected">Ditolak</span>
                        <?php else: ?>
                            <span class="badge badge-pending">Belum Disahkan</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='10' class='text-center'>Tiada data ditemui.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="text-center p-3">
        <div class="mb-2">ILP Kuala Langat Selangor</div>
        <div>&copy; 2024 Sistem Aduan Kerosakan Aset (SAKA). Hak Cipta Terpelihara.</div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function () {
        $('#aduanTable').DataTable({
            responsive: true,
            scrollX: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            language: {
                search: "Carian:",
                lengthMenu: "Papar _MENU_ rekod",
                info: "Memaparkan _START_ hingga _END_ daripada _TOTAL_ rekod",
                infoEmpty: "Tiada rekod",
                emptyTable: "Tiada data dalam jadual",
                zeroRecords: "Tiada padanan rekod yang dijumpai",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Seterusnya",
                    previous: "Sebelumnya"
                }
            },
            order: [[2, 'desc']] // Order by date column descending
        });
    });
</script>
</body>
</html>