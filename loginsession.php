<?php
include "db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginuser'])) {
    $ic = trim($_POST['ic']);
    $password = trim($_POST['password']);
    
    // Prepare statement to get user data including password and role
    $stmt = $conn->prepare("SELECT id_pegawai, nama, password, role FROM tbl_daftar WHERE ic = ?");
    $stmt->bind_param("s", $ic);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];
        
        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Store user data in session
            $_SESSION['user_id'] = $user['id_pegawai'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['ic'] = $ic;
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on role
            switch (strtolower($user['role'])) {
                case 'pengajar':
                    header("Location: user.php");
                    break;
                case 'pengarah':
                    header("Location: pengarah.php");
                    break;
                case 'komputer/ict':
                    header("Location: bppa.php");
                    break;
                case 'bangunan/sivil':
                    header("Location: bppa.php");
                    break;
                case 'mekanikal/elektrikal/aircond':
                    header("Location: bppa.php");
                    break;
                case 'admin':
                    header("Location: bppa.php");
                    break;

            }
            exit();
        } else {
            $_SESSION['message'] = "IC number or password is incorrect.";
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "User not found.";
        $_SESSION['msg_type'] = "danger";
    }
    
    // Redirect back to login if authentication fails
    header("Location: login_user.php");
    exit();
}
?>