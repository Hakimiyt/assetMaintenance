<?php 
include('db.php');

// Semak sama ada pengguna sudah login
if (!isset($_SESSION['ic'])) {
    header("Location: index.php?error=not_logged_in");
    exit();
}

$sql = "SELECT * FROM tbl_daftar WHERE `ic`='".$_SESSION['ic']."'";
$akaun = mysqli_query($conn, $sql);

if ($akaun && mysqli_num_rows($akaun) > 0) {
    $row_akaun = mysqli_fetch_assoc($akaun);
    $totalRows_akaun = mysqli_num_rows($akaun);
} else {
    session_destroy();
    header("Location: index.php?error=invalid_user");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>TPO - Senarai Aduan Kerosakan Aset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #2C5282;
            --accent-color: #FFB347;
            --danger-color: #FF5A5A;
            --light-bg: #F7FAFC;
            --text-dark: #2d3748;
            --text-light: #ffffff;
            --divider-color: #e2e8f0;
            --success-color: #38A169;
            --warning-color: #F59E0B;
            --info-color: #3B82F6;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 60px;
            width: var(--sidebar-width);
            height: calc(100vh - 60px);
            background: #2C5282;
            padding: 20px 0;
            overflow-y: auto;
            z-index: 999;
            transition: transform 0.3s ease;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 25px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: var(--accent-color);
        }

        .menu-item.active {
            background: rgba(255,255,255,0.15);
            color: white;
            border-left-color: var(--accent-color);
            font-weight: 600;
        }

        .menu-item i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* Mobile Toggle */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 70px;
            left: 10px;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: 60px;
            padding: 25px;
            min-height: calc(100vh - 60px);
        }

        .container-dashboard {
            max-width: 100%;
            background: #fff;
            padding: 30px;
            margin-right: 150px;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .page-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid var(--accent-color);
        }

        .page-title {
            font-size: 1.8rem;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #666;
            font-size: 0.95rem;
        }

        /* Statistics Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #fff, #f8fafc);
            border-left: 5px solid var(--primary-color);
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .stat-card:hover { 
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        }

        .stat-card.pending {
            border-left-color: var(--warning-color);
        }

        .stat-card.approved {
            border-left-color: var(--success-color);
        }

        .stat-card.rejected {
            border-left-color: var(--danger-color);
        }

        .stat-card .icon {
            background: var(--primary-color);
            color: #fff;
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-card.pending .icon {
            background: var(--warning-color);
        }

        .stat-card.approved .icon {
            background: var(--success-color);
        }

        .stat-card.rejected .icon {
            background: var(--danger-color);
        }

        .stat-content {
            flex: 1;
            min-width: 0;
        }

        .stat-title { 
            font-size: 0.8rem; 
            color: #666;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value { 
            font-size: 1.8rem; 
            font-weight: 700;
            color: var(--text-dark);
        }

        /* Table */
        .table-container { 
            width: 100%; 
            overflow-x: auto;
            margin-top: 20px;
        }

        table.aduanTable {
            width: 100% !important;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        .aduanTable thead th {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: #fff;
            padding: 12px 8px;
            text-align: center;
            font-weight: 600;
            border: none;
            white-space: nowrap;
            font-size: 0.85rem;
        }

        .aduanTable tbody td {
            padding: 10px 8px;
            border: 1px solid var(--divider-color);
            text-align: left;
            vertical-align: middle;
        }

        .aduanTable tbody tr:hover {
            background: #f8fafc;
        }

        .aduanTable tbody tr:nth-child(even) {
            background: #fafbfc;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.75rem;
            display: inline-block;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        .status-pending { 
            background: #FEF3C7; 
            color: #92400E;
            border: 1px solid #FCD34D;
        }

        .status-approved { 
            background: #D1FAE5; 
            color: #065F46;
            border: 1px solid #6EE7B7;
        }

        .status-rejected { 
            background: #FEE2E2; 
            color: #991B1B;
            border: 1px solid #FCA5A5;
        }

        /* Buttons */
        .btn {
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.8rem;
            display: inline-block;
            margin: 2px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-weight: 500;
            white-space: nowrap;
        }

        .btn-info {
            background: var(--info-color);
            color: #fff;
        }

        .btn-info:hover {
            background: #2563EB;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: var(--warning-color);
            color: #fff;
        }

        .btn-warning:hover {
            background: #D97706;
            transform: translateY(-2px);
        }

        .action-buttons {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Image Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; 
            top: 0;
            width: 100%; 
            height: 100%;
            background: rgba(0,0,0,0.85);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(255,255,255,0.3);
        }

        .modal:target {
            display: flex;
        }

        .close-btn {
            position: absolute;
            top: 20px; 
            right: 40px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-btn:hover {
            color: var(--accent-color);
        }

        .thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            border: 2px solid var(--divider-color);
        }

        .thumbnail:hover {
            transform: scale(1.1);
            border-color: var(--primary-color);
        }

        /* Alerts */
        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #D1FAE5;
            color: #065F46;
            border-left: 4px solid #10B981;
        }

        /* DataTables Customization */
        .dataTables_wrapper {
            padding: 20px 0;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 15px;
        }

        .dataTables_wrapper .dataTables_length select {
            padding: 5px 10px;
            border-radius: 6px;
            border: 1px solid var(--divider-color);
            margin: 0 5px;
        }

        .dataTables_wrapper .dataTables_filter input {
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid var(--divider-color);
            margin-left: 8px;
        }

        .dataTables_wrapper .dataTables_info {
            padding-top: 15px;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding-top: 15px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 4px 10px;
            margin: 0 2px;
            border-radius: 5px;
            border: 1px solid var(--divider-color);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--primary-color) !important;
            color: white !important;
            border: 1px solid var(--primary-color) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--light-bg) !important;
            color: var(--text-dark) !important;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .navbar-brand {
                font-size: 1rem;
            }

            .user-name {
                font-size: 0.8rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .container-dashboard {
                padding: 15px;
            }

            .page-title {
                font-size: 1.4rem;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-value {
                font-size: 1.5rem;
            }

            .table-container {
                margin: 0 -15px;
            }

            .aduanTable {
                font-size: 0.75rem;
            }

            .aduanTable thead th,
            .aduanTable tbody td {
                padding: 8px 5px;
            }

            .btn {
                padding: 5px 10px;
                font-size: 0.75rem;
            }

            .thumbnail {
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 12px 15px;
            }

            .user-info {
                display: none;
            }

            .page-title {
                font-size: 1.2rem;
            }

            .stat-title {
                font-size: 0.7rem;
            }

            .stat-value {
                font-size: 1.3rem;
            }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .empty-state p {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-dashboard">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Panel TPO - Senarai Aduan Kerosakan Aset</h1>
                <p class="page-subtitle">Paparan semua aduan kerosakan aset daripada semua pengguna</p>
            </div>

            <!-- Alert Messages -->
            <?php if (isset($_SESSION["update"])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo $_SESSION["update"]; unset($_SESSION["update"]); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    Tindakan berjaya dilaksanakan!
                </div>
            <?php endif; ?>

            <!-- Statistics Cards -->
            <div class="stats-container">
                <?php
                // Total semua aduan
                $total_query = "SELECT COUNT(*) as total FROM `tbl_semakan`";
                $total_result = mysqli_query($conn, $total_query);
                $total_data = mysqli_fetch_assoc($total_result);
                $total_complaints = $total_data['total'];

                // Aduan belum selesai/pending
                $pending_query = "SELECT COUNT(*) as total FROM `tbl_semakan` WHERE lulus_jabatan NOT IN ('lulus', 'ya')";
                $pending_result = mysqli_query($conn, $pending_query);
                $pending_data = mysqli_fetch_assoc($pending_result);
                $pending_complaints = $pending_data['total'];

                // Aduan diluluskan
                $approved_query = "SELECT COUNT(*) as total FROM `tbl_semakan` WHERE lulus_jabatan IN ('lulus', 'ya')";
                $approved_result = mysqli_query($conn, $approved_query);
                $approved_data = mysqli_fetch_assoc($approved_result);
                $approved_complaints = $approved_data['total'];

                // Aduan ditolak
                $rejected_query = "SELECT COUNT(*) as total FROM `tbl_semakan` WHERE lulus_jabatan IN ('tidak', 'ditolak')";
                $rejected_result = mysqli_query($conn, $rejected_query);
                $rejected_data = mysqli_fetch_assoc($rejected_result);
                $rejected_complaints = $rejected_data['total'];
                ?>

                <div class="stat-card">
                    <div class="icon"><i class="fas fa-clipboard-list"></i></div>
                    <div class="stat-content">
                        <div class="stat-title">Jumlah Aduan</div>
                        <div class="stat-value"><?php echo $total_complaints; ?></div>
                    </div>
                </div>

                <div class="stat-card pending">
                    <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                    <div class="stat-content">
                        <div class="stat-title">Belum Selesai</div>
                        <div class="stat-value"><?php echo $pending_complaints; ?></div>
                    </div>
                </div>

                <div class="stat-card approved">
                    <div class="icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-content">
                        <div class="stat-title">Diluluskan</div>
                        <div class="stat-value"><?php echo $approved_complaints; ?></div>
                    </div>
                </div>

                <div class="stat-card rejected">
                    <div class="icon"><i class="fas fa-times-circle"></i></div>
                    <div class="stat-content">
                        <div class="stat-title">Ditolak</div>
                        <div class="stat-value"><?php echo $rejected_complaints; ?></div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table id="aduanTable" class="aduanTable display">
                    <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Kategori</th>
                            <th>Tarikh</th>
                            <th>Nama Pengadu</th>
                            <th>Emel</th>
                            <th>Jenis Aset</th>
                            <th>No. Siri</th>
                            <th>Tempat</th>
                            <th>User</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Query untuk mendapatkan semua aduan
                    $stmt = $conn->prepare("SELECT * FROM tbl_semakan ORDER BY tarikh_rosak DESC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($data = $result->fetch_assoc()) {
                            $statusClass = '';
                            $imgId = "imgModal".$count;
                            
                            // Tentukan kelas status
                            switch(strtolower($data['lulus_jabatan'])) {
                                case 'lulus': 
                                case 'ya': 
                                    $statusClass = 'status-approved'; 
                                    break;
                                case 'tidak': 
                                case 'ditolak': 
                                    $statusClass = 'status-rejected'; 
                                    break;
                                default: 
                                    $statusClass = 'status-pending'; 
                                    break;
                            }
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count++; ?></td>
                        <td><?php echo htmlspecialchars($data['role']); ?></td>
                        <td><?php echo htmlspecialchars($data['tarikh_rosak']); ?></td>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['emel']); ?></td>
                        <td><?php echo htmlspecialchars($data['jenis_aset']); ?></td>
                        <td><?php echo htmlspecialchars($data['no_siri']); ?></td>
                        <td><?php echo htmlspecialchars($data['tempat_rosak']); ?></td>
                        <td><?php echo htmlspecialchars($data['userterakhir']); ?></td>
                        <td style="text-align: center;">
                            <?php if(!empty($data['image'])): ?>
                                <a href="#<?php echo $imgId; ?>">
                                    <img src="bukti/<?php echo htmlspecialchars($data['image']); ?>" 
                                         class="thumbnail" 
                                         alt="Bukti">
                                </a>
                                <div id="<?php echo $imgId; ?>" class="modal">
                                    <a href="#" class="close-btn">&times;</a>
                                    <img src="bukti/<?php echo htmlspecialchars($data['image']); ?>" alt="Bukti Kerosakan">
                                </div> 
                            <?php else: ?>
                                <span style="color: #999; font-size: 0.8rem;">Tiada</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <span class="status-badge <?php echo $statusClass; ?>">
                                <?php echo htmlspecialchars($data['lulus_jabatan']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="view_staff.php?no_id=<?php echo $data['no_id'];?>" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="edit_bppa.php?no_id=<?php echo $data['no_id'];?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="12">
                            <div class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <p>Tiada rekod aduan dijumpai buat masa ini.</p>
                            </div>
                        </td>
                    </tr>
                    <?php } 
                    $stmt->close(); 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Toggle Sidebar for Mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });

        // Initialize DataTable
        $(document).ready(function() {
            $('#aduanTable').DataTable({
                "language": {
                    "lengthMenu": "Papar _MENU_ rekod",
                    "zeroRecords": "Tiada rekod dijumpai",
                    "info": "Halaman _PAGE_ / _PAGES_",
                    "infoEmpty": "Tiada rekod",
                    "infoFiltered": "(ditapis dari _MAX_ rekod)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "›",
                        "previous": "‹"
                    }
                },
                "order": [[2, 'desc']], // Sort by tarikh
                "pageLength": 10,
                "responsive": true,
                "autoWidth": false,
                "columnDefs": [
                    { "orderable": false, "targets": [9, 11] } // Disable sorting for Bukti and Tindakan columns
                ]
            });
        });
    </script>
</body>
</html>
<?php
mysqli_free_result($akaun);
mysqli_close($conn);
?>