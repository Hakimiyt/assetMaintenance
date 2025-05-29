<!-- login proses user -->
<?php
include "db.php";
session_start();

$sql = "SELECT * FROM tbl_daftar ";
$akaun = mysqli_query($conn, $sql);
$row_akaun = mysqli_fetch_assoc($akaun) ;
$totalRows_akaun = mysqli_num_rows($akaun);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginuser'])) {
    $ic = trim($_POST['ic']);
    $password = trim($_POST['password']);

    $result = $conn->prepare("SELECT password FROM tbl_daftar WHERE ic = ?");
    $result->bind_param("s", $ic);
    $result->execute();
    $result->bind_result($hashed_password);
    
    if ($result->fetch() && password_verify($password, $hashed_password)) {
       echo '>>>'. $_SESSION['ic'] = $ic;
        header("Location: user.php");
        //exit();
    } else {
        $_SESSION['message'] = "Identify Card or password is incorrect.";
        $_SESSION['msg_type'] = "danger";
        header("Location: login_user.php");
        exit();
    }
    $result->close();
}
?>
<!-- login proses bppa -->
<?php
include "db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginuser'])) {
    $ic = trim($_POST['ic']);
    $password = trim($_POST['password']);

    $result = $conn->prepare("SELECT password FROM tbl_daftar WHERE ic = ?");
    $result->bind_param("s", $ic);
    $result->execute();
    $result->bind_result($hashed_password);
    
    if ($result->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['ic'] = $ic;
        header("Location: bppa.php");
        exit();
    } else {
        $_SESSION['message'] = "Identify Card or password is incorrect.";
        $_SESSION['msg_type'] = "danger";
        header("Location: login_user.php");
        exit();
    }
    $result->close();
}
?>
<!-- login proses admin -->
<?php
include "db.php";
session_start();
if(isset($_POST['loginadmin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
//echo $username;
//echo $password;
//Checking is user existing in the database or not
    $query = "SELECT * FROM admin WHERE username='{$username}'and password='{$password}'";
    $result = mysqli_query($conn,$query);
//semak@baca coding satu persatu baris
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        
        header("Location: admin.php");
    }else{
        $_SESSION['message'] = "Username or password is incorrect.";
        $_SESSION['msg_type'] = "danger";
        header("Location: login_admin.php");
        exit();
    }
}else{
}
?>
<!-- login proses pengarah -->
<?php
include "db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginpengarah'])) {
    $ic = trim($_POST['ic']);
    $password = trim($_POST['password']);

    $result = $conn->prepare("SELECT password FROM tbl_pengarah WHERE ic = ?");
    $result->bind_param("s", $ic);
    $result->execute();
    $result->bind_result($hashed_password);
    
    if ($result->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['ic'] = $ic;
        header("Location: pengarah.php");
        exit();
    } else {
        $_SESSION['message'] = "Identify Card or password is incorrect.";
        $_SESSION['msg_type'] = "danger";
        header("Location: login_pengarah.php");
        exit();
    }
    $result->close();
}
?>
