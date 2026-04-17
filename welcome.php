<?php 
include ('menu.php');
if (isset($_POST['menu']) && $_POST['menu'] == 'logout') {
    include('logout.php');
    exit();
}
?>

    <div style=" position: relative; left: 80px; top: 100px;">
     <?php 
   
    if($_POST['menu'] == 'logout'){include('logout.php');}
        if($_POST['menu'] == 'Pengesahan BPPA'){include('bppa.php');}
        if($_POST['menu'] == 'Pengesahan TPO'){include('tpo.php');}
        if($_POST['menu'] == 'aduan'){include('aduan_user.php');}
        if($_POST['menu'] == 'semakan'){include('laporan_admin.php');}
        if($_POST['menu'] == NULL or $_POST['menu'] == 'home' ){include('main.php');}
        if($_POST['menu'] == 'senarai' ){include('user.php');}
    ?>
    </div>


