<?php
include('db.php');

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
    <title>SAKA - Dashboard Pengguna</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
        $total_query = "SELECT COUNT(*) as total FROM `tbl_semakan` WHERE emel = '".$userdata['emel']."'";
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

    <h2 class="page-title">Senarai Aduan Kerosakan Aset</h2>
    <div class="user-email"><?php echo($userdata['emel']); ?></div>

    <div class="table-container">
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
                    <th>Perihal Kerosakan</th>
                    <th>Bukti</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM `tbl_semakan` WHERE emel = '".$userdata['emel']."' ORDER BY tarikh_rosak DESC";
            $result = mysqli_query($conn, $sql);
            if ($result && $result->num_rows > 0) {
                $count = 1;
                while ($data = $result->fetch_assoc()) {
                    $imgId = "imgModal".$count;
            ?>
                <tr>
                    <td style="text-align:center;"><?php echo $count; ?></td>
                    <td><?php echo htmlspecialchars($data['role'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($data['tarikh_rosak'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($data['nama'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($data['jenis_aset'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($data['no_siri'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($data['tempat_rosak'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($data['userterakhir'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($data['ulasan'] ?? '-'); ?></td>
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
                    <td style="text-align:center;">
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
                $count++;
                }
            } else {
                echo "<tr><td colspan='11' style='text-align:center;'>Tiada data ditemui.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery + DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#aduanTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 20, 50],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/ms.json'
        }
    });
});
</script>

</body>
</html>
