<?php 
session_start();
include ('db.php');

if(!isset($_POST['menu'])){
    $_POST['menu'] = NULL;
}

$stmt = $conn->prepare("SELECT * FROM tbl_daftar WHERE no_id = ?");
$stmt->bind_param("s", $_SESSION['id_user']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<title>Dashboard</title>

<style>
body{
    margin:0;
    font-family: Arial;
}

/* ===== TOPBAR ===== */
.topbar{
    background: linear-gradient(#3366CC,#1E3A8A);
    color:white;
    height:60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 15px;
    position:fixed;
    width:100%;
    z-index:1000;
}

.menu-btn{
    font-size:20px;
    cursor:pointer;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:220px;
    height:100%;
    position:fixed;
    top:60px; /* FIX */
    left:0;
    background: linear-gradient(#87CEFA,#6495ED);
    padding:15px;
    transition:0.3s;
    z-index:999;
}

.sidebar a{
    display:block;
    padding:12px;
    margin:10px 0;
    text-decoration:none;
    color:#1E3A8A;
    font-weight:bold;
    border-radius:5px;
}

.sidebar a:hover{
    background:#1E3A8A;
    color:white;
}

/* ===== CONTENT ===== */
.content{
    margin-left:220px;
    padding:20px;
    transition:0.3s;
}

/* ===== OVERLAY ===== */
#overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.4);
    display:none;
    z-index:998;
}

#overlay.active{
    display:block;
}

.menu-btn{
    display:none;
}

/* hanya muncul bila screen kecil */
@media (max-width:768px){
    .menu-btn{
        display:block;
    }
}

/* ===== MOBILE ===== */
@media (max-width:768px){

    .sidebar{
        left:-420px; /* FIX */
    }

    .sidebar.active{
        left:0;
    }

    .content{
        margin-left:0;
        padding:15px;
    }

    /* elak overflow */
    body{
        overflow-x:hidden;
    }

    /* topbar text kecil sikit */
    .topbar span{
        font-size:12px;
    }
}
</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
    <span class="menu-btn" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </span>

    <span>SISTEM ADUAN KEROSAKAN ASET</span>

    <span><?php echo $user["nama"]; ?></span>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

<a onclick="goMenu('home')">Home</a>
<a onclick="goMenu('aduan')">Aduan</a>

<?php if($user['bppa']==1){ ?>
<a onclick="goMenu('semakan')">Semakan</a>
<a onclick="goMenu('Pengesahan BPPA')">Pengesahan BPPA</a>
<?php } ?>

<?php if($user['tpo']==1){ ?>
<a onclick="goMenu('Pengesahan TPO')">Pengesahan TPO</a>
<?php } ?>

<a onclick="goMenu('senarai')">Senarai Aduan</a>
<a onclick="goMenu('logout')">Log Out</a>

</div>

<!-- OVERLAY -->
<div id="overlay" onclick="toggleMenu()"></div>

<!-- CONTENT -->
<div class="content">
    <!-- content kau -->
</div>

<form id="formGO" method="post">
<input type="hidden" name="menu" id="menu">
</form>

<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("overlay").classList.toggle("active");
}

function goMenu(value){
    document.getElementById("menu").value = value;
    document.getElementById("formGO").submit();
}
</script>

</body>
</html>