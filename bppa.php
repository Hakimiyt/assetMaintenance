<?php 
include('db.php');
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Senarai Aduan Kerosakan Aset</title>

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
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-light);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container-dashboard {
            width: 100%;
            max-width: 1200px;
            margin: 25px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .page-title {
            text-align: center;
            margin-bottom: 15px;
            font-size: 1.6rem;
            color: var(--secondary-color);
            position: relative;
        }

        .page-title:after {
            content: "";
            width: 80px;
            height: 3px;
            background: var(--accent-color);
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .user-email {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(200px,1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: #fff;
            border-left: 4px solid var(--primary-color);
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: 0.3s;
        }

        .stat-card:hover { transform: translateY(-3px); }

        .stat-card .icon {
            background: var(--primary-color);
            color: #fff;
            width: 45px;
            height: 45px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .stat-title { font-size: 0.85rem; color: #666; }
        .stat-value { font-size: 1.4rem; font-weight: 600; }

        .table-container { width: 100%; }

        table.dataTable {
            width: 100% !important;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .aduanTable thead th {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .aduanTable tbody td {
            padding: 10px;
            border: 1px solid var(--divider-color);
            text-align: left;
        }

        .aduanTable tbody tr:hover td { background: #f9f9f9; }

        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            display: inline-block;
            text-align: center;
        }
        .badge-pending { background: #FFF3CD; color: #856404; }
        .badge-approved { background: #D4EDDA; color: #155724; }
        .badge-rejected { background: #F8D7DA; color: #721C24; }

        /* Modal untuk gambar */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.8);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255,255,255,0.3);
        }

        .modal:target {
            display: flex;
        }

        .close-btn {
            position: absolute;
            top: 20px; right: 30px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-dashboard">
    <!-- Stats cards row -->
    <div class="stats-container">
        <?php
        $total_query = "SELECT COUNT(*) as total FROM `tbl_semakan` WHERE role = '".$row_akaun['role']."'";
        $total_result = mysqli_query($conn, $total_query);
        $total_data = mysqli_fetch_assoc($total_result);
        $total_complaints = $total_data['total'];
        ?>
        <div class="stat-card">
            <div class="icon"><i class="fas fa-file-alt"></i></div>
            <div>
                <div class="stat-title">Jumlah Aduan</div>
                <div class="stat-value"><?php echo $total_complaints; ?></div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="main-container">
        <h2 class="page-title">
            Senarai Aduan Kerosakan Aset
            <span class="user-email"><?php echo htmlspecialchars($row_akaun['emel']); ?></span>
        </h2>
        <?php if (isset($_SESSION["update"])): ?>
            <div style="background:#D1FAE5;color:#065F46;padding:10px;border-radius:6px;margin-bottom:15px;">
                <?php echo $_SESSION["update"]; unset($_SESSION["update"]); ?>
            </div>
        <?php endif; ?>

            <table id="aduanTable" class="aduanTable">
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
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $stmt = $conn->prepare("SELECT * FROM tbl_semakan WHERE role = ?");
                $stmt->bind_param("s", $row_akaun['role']);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $count = 1;
                    while ($data = $result->fetch_assoc()) {
                        $statusClass = '';
                        $imgId = "imgModal".$count;
                        switch(strtolower($data['lulus_jabatan'])) {
                            case 'lulus': case 'ya': $statusClass = 'status-approved'; break;
                            case 'tidak': case 'ditolak': $statusClass = 'status-rejected'; break;
                            default: $statusClass = 'status-pending'; break;
                        }
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($data['role']); ?></td>
                    <td><?php echo htmlspecialchars($data['tarikh_rosak']); ?></td>
                    <td><?php echo htmlspecialchars($data['nama']); ?></td>
                    <td><?php echo htmlspecialchars($data['jenis_aset']); ?></td>
                    <td><?php echo htmlspecialchars($data['no_siri']); ?></td>
                    <td><?php echo htmlspecialchars($data['tempat_rosak']); ?></td>
                    <td><?php echo htmlspecialchars($data['userterakhir']); ?></td>
                     <td>
                        <?php if(!empty($data['image'])): ?>
                            <a href="#<?php echo $imgId; ?>">
                                <img src="bukti/<?php echo $data['image']; ?>" width="80" style="cursor:pointer;">
                            </a>
                            <div id="<?php echo $imgId; ?>" class="modal">
                                <a href="#" class="close-btn">&times;</a>
                                <img src="bukti/<?php echo $data['image']; ?>">
                            </div> 
                        <?php else: ?>
                            Tiada bukti
                        <?php endif; ?>
                    </td>
                    <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($data['lulus_jabatan']); ?></span></td>
                    <td>
                        <a href="view_staff.php?no_id=<?php echo $data['no_id'];?>" style="color: #1E3A8A; text-decoration: none; background-color: #f0f4f8; padding: 5px 10px; border-radius: 4px;">Lihat</a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                ?>
                <tr>
                    <td colspan="11">
                        <div class="empty-state">
                            <i>📋</i>
                            <p>Tiada rekod aduan dijumpai buat masa ini.</p>
                            <a href="add_complaint.php" class="btn btn-info">Tambah Aduan Baru</a>
                        </div>
                    </td>
                </tr>
                <?php } $stmt->close(); ?>
                </tbody>
            </table>
        </div>
</body>
</html>
