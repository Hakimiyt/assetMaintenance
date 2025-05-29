
<?php 
session_start();

// Check if user is logged in, redirect if not
if (!isset($_SESSION['ic'])) {
    // Redirect to login page with error message
    $_SESSION['error'] = "Sila log masuk untuk akses sistem.";
    header("Location: index.php");
    exit();
}

include('db.php');
$sql = "SELECT * FROM tbl_daftar WHERE `ic`='".$_SESSION['ic']."'";
$akaun = mysqli_query($conn, $sql);

// Check if query was successful and returned results
if ($akaun && mysqli_num_rows($akaun) > 0) {
    $row_akaun = mysqli_fetch_assoc($akaun);
    $totalRows_akaun = mysqli_num_rows($akaun);
} else {
    // Handle case where user exists in session but not in database
    session_destroy();
    header("Location: index.php?error=invalid_user");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Senarai Aduan Kerosakan Aset</title>

    <style>
        :root {
            --primary: #3366CC;
            --secondary: #1E3A8A;
            --accent: #FFB347;
            --danger: #FF5A5A;
            --light-bg: #F5F7FA;
            --border-color: #D1D5DB;
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --white: #FFFFFF;
        }

        body {
            background: var(--light-bg);
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Arial', sans-serif;
            color: var(--text-dark);
        }

        /* Navbar styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 12px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--white);
        }

        .navbar-brand h4 {
            margin: 0 0 0 15px;
            font-size: 18px;
            font-weight: 700;
        }

        .navbar-brand img {
            height: 50px;
            filter: drop-shadow(1px 1px 2px rgba(0,0,0,0.2));
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .btn-logout {
            background-color: var(--danger);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #ff3333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 90, 90, 0.3);
        }

        /* Main content container */
        .main-container {
            max-width: 1400px;
            margin: 30px auto;
            background-color: var(--white);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            flex: 1;
        }

        /* Page title */
        .page-title {
            color: var(--secondary);
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            border-bottom: 2px solid var(--primary);
            padding-bottom: 10px;
        }

        .user-email {
            color: var(--primary);
            font-weight: 600;
        }

        /* Table styles */
        .table-container {
            overflow-x: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: var(--white);
            border: none;
            padding: 12px 15px;
            font-weight: 600;
            text-align: center;
            position: sticky;
            top: 0;
        }

        .table thead th:first-child {
            border-top-left-radius: 8px;
        }

        .table thead th:last-child {
            border-top-right-radius: 8px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(51, 102, 204, 0.05);
        }

        .table tbody td {
            background-color: transparent;
            border-bottom: 1px solid var(--border-color);
            padding: 12px 15px;
            vertical-align: middle;
        }

        /* Button styles */
        .btn-info, .btn-warning {
            border: none;
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin: 2px;
        }

        .btn-info {
            background-color: var(--primary);
            color: white;
        }

        .btn-info:hover {
            background-color: #2855b0;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(51, 102, 204, 0.3);
        }

        .btn-warning {
            background-color: var(--accent);
            color: var(--text-dark);
        }

        .btn-warning:hover {
            background-color: #ffa52e;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 179, 71, 0.3);
        }

        /* Status badge styles */
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-approved {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-rejected {
            background-color: #FEE2E2;
            color: #991B1B;
        }

        /* Empty state styles */
        .empty-state {
            text-align: center;
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-top: 20px;
        }

        .empty-state i {
            font-size: 48px;
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .empty-state p {
            color: var(--text-light);
            font-size: 16px;
            margin-bottom: 20px;
        }

        /* Footer styles */
        .footer {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            padding: 20px;
            text-align: center;
            margin-top: auto;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }

        /* Responsive styles */
        @media (max-width: 991px) {
            .main-container {
                margin: 20px 15px;
                padding: 20px;
            }
            
            .page-title {
                font-size: 24px;
            }
        }

        @media (max-width: 767px) {
            .navbar {
                flex-direction: column;
                padding: 10px;
            }
            
            .navbar ul {
                margin-top: 10px;
            }
            
            .navbar-brand h4 {
                font-size: 16px;
            }
        }

        @media (max-width: 575px) {
            .navbar-brand {
                flex-direction: column;
                text-align: center;
            }
            
            .navbar-brand h4 {
                margin: 10px 0 0 0;
            }
            
            .main-container {
                padding: 15px 10px;
            }
            
            .page-title {
                font-size: 20px;
            }
            
            .table thead th, 
            .table tbody td {
                font-size: 12px;
                padding: 8px 5px;
            }
            
            .btn-info, 
            .btn-warning {
                padding: 4px 8px;
                font-size: 12px;
                display: block;
                width: 100%;
                margin: 2px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a class="navbar-brand" href="dashboard.php">
            <img src="img/305199717_985453492342369_1200662185772088661_n.png" alt="Sistem Aduan Kerosakan Aset" />
            <h4>SISTEM ADUAN KEROSAKAN ASET</h4>
        </a>
        <ul>
            <li><a href="index.php" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Log Keluar</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-container">
        <h2 class="page-title">
            Senarai Aduan Kerosakan Aset
            <span class="user-email"><?php echo htmlspecialchars($row_akaun['emel']); ?></span>
        </h2>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Bil.</th>
                        <th>Kategori</th>
                        <th>Tarikh Kerosakan</th>
                        <th>Nama Dan Jawatan</th>
                        <th>Jenis Aset</th>
                        <th>Nombor Siri Pendaftaran</th>
                        <th>Pengguna Terakhir</th>
                        <th>Tempat Rosak</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('db.php');
                
                // Use prepared statement to prevent SQL injection
                $stmt = $conn->prepare("SELECT * FROM tbl_semakan WHERE role = ?");
                $stmt->bind_param("s", $row_akaun['role']);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $count = 1;
                    while ($data = $result->fetch_assoc()) {
                        // Map status text to a CSS class
                        $statusClass = '';
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
                    <td class="text-center"><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($data['role']); ?></td>
                    <td><?php echo htmlspecialchars($data['tarikh_rosak']); ?></td>
                    <td><?php echo htmlspecialchars($data['nama']); ?></td>
                    <td><?php echo htmlspecialchars($data['jenis_aset']); ?></td>
                    <td><?php echo htmlspecialchars($data['no_siri']); ?></td>
                    <td><?php echo htmlspecialchars($data['userterakhir']); ?></td>
                    <td><?php echo htmlspecialchars($data['tempat_rosak']); ?></td>
                    <td class="text-center">
                        <span class="status-badge <?php echo $statusClass; ?>">
                            <?php echo htmlspecialchars($data['lulus_jabatan']); ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="view_staff.php?no_id=<?php echo $data['no_id'];?>" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="edit_bppa.php?no_id=<?php echo $data['no_id'];?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
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
                            <p>Tiada rekod aduan dijumpai buat masa ini.</p>
                            <a href="add_complaint.php" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Aduan Baru
                            </a>
                        </div>
                    </td>
                </tr>
                <?php
                }
                $stmt->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> ILP Kuala Langat Selangor | Sistem Aduan Kerosakan Aset</p>
            <small>Dibangunkan oleh Unit Teknologi Maklumat</small>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>