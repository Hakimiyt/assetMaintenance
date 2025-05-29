<?php include('header_print.php');?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>SISTEM ADUAN KEROSAKAN ASET</title>
    <style>
        :root {
            --primary: #3366CC;
            --primary-light: #C4D7FF;
            --primary-dark: #1E3A8A;
            --accent: #FFB347;
            --danger: #FF5A5A;
            --success: #4CAF50;
            --light-bg: #F5F7FA;
            --dark-text: #0B192C;
            --light-text: #FFFFFF;
            --border-radius: 8px;
            --box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light-bg);
            color: var(--dark-text);
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--light-text);
        }

        .navbar-brand img {
            margin-right: 15px;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .navbar-brand h4 {
            color: var(--light-text);
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 10px;
        }

        /* Main content */
        .content-section {
            min-height: calc(100vh - 160px);
            padding: 30px 0;
        }

        .container-custom {
            max-width: 95%;
            margin: 0 auto;
            background-color: var(--light-text);
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .page-heading {
            color: var(--primary-dark);
            margin-bottom: 25px;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
            text-align: center;
        }

        .page-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent);
            border-radius: 2px;
        }

        /* Table styling */
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-custom {
            border-radius: var(--border-radius);
            padding: 8px 16px;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-export-word {
            background-color: var(--primary);
            color: var(--light-text);
            border: none;
        }

        .btn-export-word:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-export-excel {
            background-color: var(--accent);
            color: var(--dark-text);
            border: none;
        }

        .btn-export-excel:hover {
            background-color: #E69C31;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: var(--danger);
            border: none;
        }

        .btn-danger:hover {
            background-color: #E04545;
            transform: translateY(-2px);
        }

        /* DataTables styling */
        .table-responsive-sm {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        #aduanTable {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        #aduanTable thead th {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: var(--light-text);
            padding: 12px;
            font-weight: 600;
            text-align: left;
            border: none;
            position: relative;
        }

        #aduanTable tbody tr {
            transition: var(--transition);
        }

        #aduanTable tbody tr:hover {
            background-color: rgba(51, 102, 204, 0.05);
        }

        #aduanTable tbody td {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #EEE;
            padding: 12px;
        }

        /* DataTables custom styling */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 15px;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #DDD;
            border-radius: var(--border-radius);
            padding: 6px 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: var(--border-radius);
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--primary);
            color: white !important;
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--primary-light);
            color: var(--primary-dark) !important;
            border: none;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--light-text);
            padding: 20px;
            text-align: center;
            margin-top: 30px;
            box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .action-buttons {
                width: 100%;
                justify-content: space-between;
            }
            
            .container-custom {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a class="navbar-brand" href="#">
            <img src="img/305199717_985453492342369_1200662185772088661_n.png" height="50" alt="Sistem Aduan Kerosakan Aset" />
            <h4>SISTEM ADUAN KEROSAKAN ASET</h4>
        </a>
        <ul>
            <li><a href="index.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Log Keluar</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="page-heading">Senarai Aduan Kerosakan Aset</h2>
            
           

            <div class="table-header">
                <div class="search-filter">
                    <!-- Search and filter components could go here -->
                </div>
                <div class="action-buttons">
                    <button onclick="exportToWord()" class="btn-export btn-word">
                        <i class="fas fa-file-word"></i> Export Word
                    </button>
                    <button onclick="exportToExcel()" class="btn-export btn-excel">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </button>
                </div>
            </div>

            <div class="table-responsive-sm">
                <!-- Table -->
                <table id="aduanTable" class="table display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Kategori</th>
                            <th>Tarikh Kerosakan</th>
                            <th>Nama Dan Jawatan</th>
                            <th>Jenis Aset</th>
                            <th>Nombor Siri Pendaftaran Aset</th>
                            <th>Tempat Rosak</th>
                            <th>Pengguna Terakhir</th>
                            <th>Perihal Kerosakan</th>
                            <th>Disahkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('db.php');
                        $sql = "SELECT * FROM tbl_semakan";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($data = $result->fetch_assoc()) {
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
                            <td><?php echo htmlspecialchars($data['ulasan']); ?></td>
                            <td><?php echo htmlspecialchars($data['lulus_jabatan']); ?></td>
                        </tr>
                        <?php
                            }
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
            <p>&copy; 2024 Sistem Aduan Kerosakan Aset. Hak Cipta Terpelihara.</p>
        </div>
    </div>

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