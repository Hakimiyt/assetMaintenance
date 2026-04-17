<?php include ('header_print.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistem Aduan Kerosakan Aset</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
:root {
    --primary: #3366CC;
    --dark: #1E3A8A;
    --light: #F8F9FA;
}

/* ===== GENERAL ===== */
body {
    background: var(--light);
    font-family: 'Segoe UI', sans-serif;
}

/* ===== CONTAINER ===== */
.container-card {
    max-width: 1400px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-left: 200px; /* anjakkan ikut sidebar */ 
    
}

/* ===== HEADER ===== */
.page-header {
    text-align: center;
    border-bottom: 2px solid var(--primary);
    margin-bottom: 20px;
}

.page-header h2 {
    font-size: 1.5rem;
    color: var(--dark);
}

/* ===== STATS ===== */
.stats-row {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.stat-card {
    flex: 1;
    min-width: 200px;
    background: #fff;
    padding: 15px;
    border-left: 4px solid var(--primary);
    border-radius: 6px;
}

.stat-card h4 {
    font-size: 0.9rem;
}

.stat-card .number {
    font-size: 1.6rem;
    font-weight: bold;
}

/* ===== BUTTON ===== */
.action-buttons {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.btn-export {
    flex: 1;
    padding: 10px;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 5px;
}

.btn-word { background: #2196F3; }
.btn-excel { background: #4CAF50; }

/* ===== TABLE ===== */
.table thead {
    background: linear-gradient(135deg, var(--primary), var(--dark));
    color: white;
}

.table th, .table td {
    white-space: nowrap;
    font-size: 0.85rem;
}

/* ===== STATUS ===== */
.status-badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
}

.status-pending { background: orange; color: #000; }
.status-approved { background: green; color: #fff; }
.status-rejected { background: red; color: #fff; }

/* ===== MOBILE ===== */
@media (max-width:768px) {

    .stats-row {
        flex-direction: column;
    }

    .action-buttons {
        flex-direction: column;
    }

    .btn-export {
        width: 100%;
    }

    .table th, .table td {
        font-size: 0.7rem;
        padding: 6px;
    }
}
</style>
</head>

<body>

<section class="container-card">

<div class="page-header">
    <h2><i class="fas fa-clipboard-list"></i> Laporan Aduan Pengguna</h2>
</div>

<!-- STATS -->
<div class="stats-row">
<?php include('db.php'); ?>

<div class="stat-card">
<h4>Jumlah Aduan</h4>
<div class="number">
<?php
$q = mysqli_query($conn,"SELECT COUNT(*) total FROM tbl_semakan");
echo mysqli_fetch_assoc($q)['total'];
?>
</div>
</div>

<div class="stat-card">
<h4>Dalam Proses</h4>
<div class="number">
<?php
$q = mysqli_query($conn,"SELECT COUNT(*) total FROM tbl_semakan WHERE lulus_jabatan='Dalam Proses'");
echo mysqli_fetch_assoc($q)['total'];
?>
</div>
</div>

<div class="stat-card">
<h4>Selesai</h4>
<div class="number">
<?php
$q = mysqli_query($conn,"SELECT COUNT(*) total FROM tbl_semakan WHERE lulus_jabatan='Selesai'");
echo mysqli_fetch_assoc($q)['total'];
?>
</div>
</div>
</div>

<!-- BUTTON -->
<div class="action-buttons">
<button class="btn-export btn-word">Export Word</button>
<button class="btn-export btn-excel">Export Excel</button>
</div>

<!-- TABLE -->
<div class="table-responsive">
<table id="aduanTable" class="table table-striped nowrap" style="width:100%">

<thead>
<tr>
<th>Bil</th>
<th>Kategori</th>
<th>Tarikh</th>
<th>Nama</th>
<th>Jenis Aset</th>
<th>No Siri</th>
<th>Tempat</th>
<th>Pengguna</th>
<th>Perihal</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<?php
$sql = mysqli_query($conn,"SELECT * FROM tbl_semakan ORDER BY tarikh_rosak DESC");
$i=1;

while($row = mysqli_fetch_assoc($sql)){

$status = $row['lulus_jabatan'];

$class = ($status=="Dalam Proses") ? "status-pending" :
         (($status=="Selesai") ? "status-approved" : "status-rejected");
?>
<tr>
<td><?= $i++ ?></td>
<td><?= htmlspecialchars($row['role']) ?></td>
<td><?= $row['tarikh_rosak'] ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['jenis_aset'] ?></td>
<td><?= $row['no_siri'] ?></td>
<td><?= $row['tempat_rosak'] ?></td>
<td><?= $row['userterakhir'] ?></td>
<td><?= $row['ulasan'] ?></td>
<td><span class="status-badge <?= $class ?>"><?= $status ?></span></td>
</tr>
<?php } ?>
</tbody>

</table>
</div>

</section>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function () {
    $('#aduanTable').DataTable({
        responsive: true,
        scrollX: true,
        autoWidth: false,
        pageLength: 5
    });
});
</script>

</body>
</html>