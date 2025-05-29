<?php
    if (isset($_GET['no_id'])) {
        include("db.php");
        $no_id = $_GET['no_id'];

        $sql = "DELETE FROM tbl_semakan WHERE no_id ='$no_id'";
    if(mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["delete"] = "Pemohonan berjaya dibuang!";
        header("Location:bppa.php");
        exit;
    } else {
        die("Terdapat masalah semasa membuang rekod pemohonan ini!");
    } 
}
    else {
        echo "Tiada Pemohonan Pada Masa Kini.";
    }
?>