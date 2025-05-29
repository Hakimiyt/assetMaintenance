<?php include ('header_print.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Sistem Aduan Kerosakan Aset</title>
    <style>
        :root {
            --primary-color: #3366CC;
            --primary-light: #6699FF;
            --primary-dark: #1E3A8A;
            --secondary-color: #EAEEFF;
            --accent-color: #FFB347;
            --danger-color: #FF5A5A;
            --success-color: #4CAF50;
            --warning-color: #FFC107;
            --info-color: #2196F3;
            --gray-light: #F8F9FA;
            --gray-medium: #E9ECEF;
            --gray-dark: #343A40;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --rounded-sm: 4px;
            --rounded-md: 8px;
            --rounded-lg: 16px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--gray-light);
            color: var(--gray-dark);
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-md);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .navbar-brand img {
            margin-right: 15px;
            border-radius: var(--rounded-sm);
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: var(--rounded-sm);
        }

        .navbar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .navbar ul li a.btn-danger {
            background-color: var(--danger-color);
            color: white;
            border: none;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .navbar ul li a.btn-danger:hover {
            background-color: #ff3333;
            transform: translateY(-2px);
        }

        .container-card {
            max-width: 1400px;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: var(--rounded-md);
            box-shadow: var(--shadow-sm);
        }

        .page-header {
            margin-bottom: 30px;
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 15px;
        }

        .page-header h2 {
            color: var(--primary-dark);
            margin: 0;
            font-weight: 700;
            font-size: 1.6rem;
            text-align: center;
        }

        .btn-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .btn-export {
            padding: 10px 20px;
            font-weight: 600;
            border: none;
            border-radius: var(--rounded-sm);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-export:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-word {
            background-color: var(--info-color);
            color: white;
        }

        .btn-excel {
            background-color: var(--success-color);
            color: white;
        }

        .stats-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .stat-card {
            flex: 1;
            min-width: 200px;
            background: white;
            padding: 20px;
            border-radius: var(--rounded-sm);
            border-left: 4px solid var(--primary-color);
            box-shadow: var(--shadow-sm);
        }

        .stat-card h4 {
            margin: 0;
            color: var(--gray-dark);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .stat-card .number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .table-container {
            border-radius: var(--rounded-sm);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            padding: 12px 15px;
            font-weight: 600;
            text-align: left;
            font-size: 0.9rem;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: var(--secondary-color);
        }

        .table tbody td {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid var(--gray-medium);
            padding: 12px 15px;
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-pending {
            background-color: var(--warning-color);
            color: #856404;
        }

        .status-approved {
            background-color: var(--success-color);
            color: white;
        }

        .status-rejected {
            background-color: var(--danger-color);
            color: white;
        }

        .footer {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 25px;
            text-align: center;
            margin-top: 40px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 25px;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            background-color: white;
            color: var(--primary-dark);
            border-radius: var(--rounded-sm);
            border: 1px solid var(--gray-medium);
            transition: all 0.3s ease;
        }

        .pagination li.active a,
        .pagination li a:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
                padding: 15px;
            }
            
            .navbar ul {
                margin-top: 15px;
            }
            
            .navbar ul li {
                margin-left: 10px;
            }
            
            .container-card {
                padding: 15px;
                margin: 15px;
            }
            
            .stats-row {
                flex-direction: column;
            }
            
            .stat-card {
                width: 100%;
            }
            
            .table-responsive-sm {
                border-radius: var(--rounded-sm);
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a class="navbar-brand" href="#">
            <img src="img/305199717_985453492342369_1200662185772088661_n.png" height="40" alt="Sistem Aduan Kerosakan Aset" />
            <span>SISTEM ADUAN KEROSAKAN ASET</span>
        </a>
        <ul>
            <li><a href="admin.php"><i class="fas fa-home"></i> Utama</a></li>
            <li><a href="maklumat_user.php"><i class="fas fa-plus-circle"></i> Aduan Baru</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <section class="content-section">
        <div class="container-card">
            <div class="page-header">
                <h2><i class="fas fa-clipboard-list"></i> Laporan Aduan Pengguna</h2>
            </div>
            
            <!-- Stats Row -->
            <div class="stats-row">
                <div class="stat-card">
                    <h4>Jumlah Aduan</h4>
                    <div class="number">
                        <?php
                        include('db.php');
                        $sql_count = "SELECT COUNT(*) as total FROM tbl_semakan";
                        $result_count = mysqli_query($conn, $sql_count);
                        $data_count = mysqli_fetch_assoc($result_count);
                        echo $data_count['total'];
                        ?>
                    </div>
                </div>
                <div class="stat-card">
                    <h4>Dalam Proses</h4>
                    <div class="number">
                        <?php
                        $sql_pending = "SELECT COUNT(*) as pending FROM tbl_semakan WHERE lulus_jabatan = 'Dalam Proses'";
                        $result_pending = mysqli_query($conn, $sql_pending);
                        $data_pending = mysqli_fetch_assoc($result_pending);
                        echo $data_pending['pending'];
                        ?>
                    </div>
                </div>
                <div class="stat-card">
                    <h4>Selesai</h4>
                    <div class="number">
                        <?php
                        $sql_completed = "SELECT COUNT(*) as completed FROM tbl_semakan WHERE lulus_jabatan = 'Selesai'";
                        $result_completed = mysqli_query($conn, $sql_completed);
                        $data_completed = mysqli_fetch_assoc($result_completed);
                        echo $data_completed['completed'];
                        ?>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <button onclick="exportToWord()" class="btn-export btn-word">
                    <i class="fas fa-file-word"></i> Export Word
                </button>
                <button onclick="exportToExcel()" class="btn-export btn-excel">
                    <i class="fas fa-file-excel"></i> Export Excel
                </button>
            </div>

            <div class="table-container">
                <div class="table-responsive-sm">
                    <!-- Table -->
                    <table id="aduanTable" class="table">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>Kategori</th>
                                <th>Tarikh Kerosakan</th>
                                <th>Nama Dan Jawatan</th>
                                <th>Jenis Aset</th>
                                <th>Nombor Siri</th>
                                <th>Tempat Rosak</th>
                                <th>Pengguna Terakhir</th>
                                <th>Perihal Kerosakan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM tbl_semakan ORDER BY tarikh DESC";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($data = $result->fetch_assoc()) {
                                $status_class = "";
                                $status_text = $data['lulus_jabatan'];
                                
                                if ($status_text == "Dalam Proses") {
                                    $status_class = "status-pending";
                                } else if ($status_text == "Selesai") {
                                    $status_class = "status-approved";
                                } else if ($status_text == "Ditolak") {
                                    $status_class = "status-rejected";
                                }
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo !empty($data['role']) ? htmlspecialchars($data['role']) : 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($data['tarikh_rosak']); ?></td>
                                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                <td><?php echo htmlspecialchars($data['jenis_aset']); ?></td>
                                <td><?php echo htmlspecialchars($data['no_siri']); ?></td>
                                <td><?php echo htmlspecialchars($data['tempat_rosak']); ?></td>
                                <td><?php echo htmlspecialchars($data['userterakhir']); ?></td>
                                <td><?php echo htmlspecialchars($data['ulasan']); ?></td>
                                <td><span class="status-badge <?php echo $status_class; ?>"><?php echo htmlspecialchars($data['lulus_jabatan']); ?></span></td>
                            </tr>
                        <?php
                            }
                        } else {
                        ?>
                            <tr>
                                <td colspan="10" class="text-center">Tiada rekod ditemui</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination -->
            <ul class="pagination">
                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>&copy; 2025 Sistem Kerosakan Aset. Hak Cipta Terpelihara.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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
                    infoEmpty: "Tiada rekod untuk dipaparkan",
                    infoFiltered: "(ditapis dari _MAX_ jumlah rekod)",
                    zeroRecords: "Tiada rekod ditemui",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Seterusnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        });

    </script>
</body>
</html>