<!-- old process bppa v1-->
<?php
include 'db.php';
session_start();
if (isset($_POST["bppaedit"])) {
    $no_id = mysqli_real_escape_string($conn, $_POST["no_id"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $jenis_aset = mysqli_real_escape_string($conn, $_POST["jenis_aset"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $no_siri = mysqli_real_escape_string($conn, $_POST["no_siri"]);
    $tempat_rosak = mysqli_real_escape_string($conn, $_POST["tempat_rosak"]);
    $tarikh_rosak = mysqli_real_escape_string($conn, $_POST["tarikh_rosak"]);
    $userterakhir = mysqli_real_escape_string($conn, $_POST["userterakhir"]);
    $ulasan = mysqli_real_escape_string($conn, $_POST["ulasan"]);

    $sqlUpdate = "UPDATE tbl_semakan SET nama = '$nama', jenis_aset = '$jenis_aset', role = '$role', no_siri = '$no_siri', tempat_rosak = '$tempat_rosak', tarikh_rosak = '$tarikh_rosak', userterakhir = '$userterakhir', ulasan = '$ulasan' WHERE no_id = '$no_id'";
    
    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Pemohonan berjaya dikemas kini!";
        header("Location: bppa.php");
    } else {
        die("Terdapat masalah.");
    }
}
?>

<!-- new process bppa v2 -->
<?php
include 'db.php';
session_start();
if (isset($_POST["staffedit"])) {
    $no_id = mysqli_real_escape_string($conn, $_POST["no_id"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $jenis_aset = mysqli_real_escape_string($conn, $_POST["jenis_aset"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $no_siri = mysqli_real_escape_string($conn, $_POST["no_siri"]);
    $tempat_rosak = mysqli_real_escape_string($conn, $_POST["tempat_rosak"]);
    $tarikh_rosak = mysqli_real_escape_string($conn, $_POST["tarikh_rosak"]);
    $userterakhir = mysqli_real_escape_string($conn, $_POST["userterakhir"]);
    $ulasan = mysqli_real_escape_string($conn, $_POST["ulasan"]);
    $lulus_jabatan = mysqli_real_escape_string($conn, $_POST["lulus_jabatan"]);


    $sqlUpdate = "UPDATE tbl_semakan SET nama = '$nama', jenis_aset = '$jenis_aset', role = '$role', no_siri = '$no_siri', tempat_rosak = '$tempat_rosak', tarikh_rosak = '$tarikh_rosak', userterakhir = '$userterakhir', ulasan = '$ulasan', lulus_jabatan = '$lulus_jabatan' WHERE no_id = '$no_id'";
    
    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Pemohonan berjaya dikemas kini!";
        header("Location: bppa.php");
    } else {
        die("Terdapat masalah.");
    }
}
?>

<?php
include 'db.php';
session_start();
if (isset($_POST["adminedit"])) {
    $no_id = mysqli_real_escape_string($conn, $_POST["no_id"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $jenis_aset = mysqli_real_escape_string($conn, $_POST["jenis_aset"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $no_siri = mysqli_real_escape_string($conn, $_POST["no_siri"]);
    $tempat_rosak = mysqli_real_escape_string($conn, $_POST["tempat_rosak"]);
    $tarikh_rosak = mysqli_real_escape_string($conn, $_POST["tarikh_rosak"]);
    $userterakhir = mysqli_real_escape_string($conn, $_POST["userterakhir"]);
    $ulasan = mysqli_real_escape_string($conn, $_POST["ulasan"]);
    $lulus_jabatan = mysqli_real_escape_string($conn, $_POST["lulus_jabatan"]);


    $sqlUpdate = "UPDATE tbl_semakan SET nama = '$nama', jenis_aset = '$jenis_aset', role = '$role', no_siri = '$no_siri', tempat_rosak = '$tempat_rosak', tarikh_rosak = '$tarikh_rosak', userterakhir = '$userterakhir', ulasan = '$ulasan', lulus_jabatan = '$lulus_jabatan' WHERE no_id = '$no_id'";
    
    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Pemohonan berjaya dikemas kini!";
        header("Location: maklumat_user.php");
    } else {
        die("Terdapat masalah.");
    }
}
?>