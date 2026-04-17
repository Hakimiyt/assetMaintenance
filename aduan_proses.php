<?php
session_start();  
include "db.php"; 
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aduanuser'])) {
    // Validate all inputs
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';
    $jenis_aset = isset($_POST['jenis_aset']) ? trim($_POST['jenis_aset']) : '';
    $no_siri = isset($_POST['no_siri']) ? trim($_POST['no_siri']) : '';
    $tempat_rosak = isset($_POST['tempat_rosak']) ? trim($_POST['tempat_rosak']) : '';
    $userterakhir = isset($_POST['userterakhir']) ? trim($_POST['userterakhir']) : '';
    $ulasan = isset($_POST['ulasan']) ? trim($_POST['ulasan']) : '';
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $emel = isset($_POST['emel']) ? trim($_POST['emel']) : '';
    // $image = isset($_POST['image']) ? trim($_POST['image']) : '';
    $tarikh_rosak = isset($_POST['tarikh_rosak']) ? $_POST['tarikh_rosak'] : null;
    $image = null;

   // Upload gambar
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $target_dir = "bukti/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image = time() . "_" . basename($_FILES['image']['name']);
        $target_file = $target_dir . $image;

        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($file_type, $allowed_types)) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                die("Gagal memuat naik gambar.");
            }
        } else {
            die("Jenis fail tidak dibenarkan!");
        }
    }

    // Check if all required fields are filled
    if (!empty($role) && !empty($jenis_aset) && !empty($no_siri) && !empty($tempat_rosak) && !empty($userterakhir) && !empty($ulasan) && !empty($nama) && !empty($tarikh_rosak) && !empty($image) && !empty($emel)) {
        // Default value for 'lulus_jabatan'
        $lulus_jabatan = 'Dalam Proses';

        // Prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO tbl_semakan (role, jenis_aset, no_siri, tempat_rosak, userterakhir, ulasan, nama, emel, tarikh_rosak, image, lulus_jabatan) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $role, $jenis_aset, $no_siri, $tempat_rosak, $userterakhir, $ulasan, $nama, $emel, $tarikh_rosak, $image,$lulus_jabatan);

        if ($stmt->execute()) {
            // PHPMailer code to send email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();                                      // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                             // Enable SMTP authentication
                $mail->Username   = 'sarashinax@gmail.com';             // SMTP username (your Gmail address)
                $mail->Password   = 'ngzhpycxmchfcruj';               // SMTP password (your Gmail password or app password)
                $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption
                $mail->Port       = 465;                              // TCP port to connect to

                // Recipients
                $mail->setFrom($emel, $nama);                         // Sender's email and name (from form)
                $mail->addAddress('sarashinax@gmail.com');              // Recipient's email

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Aduan Kerosakan Baru Dihantar';
                $mail->Body    = "
                <p>Aduan Kerosakan Baru:</p>
                <p>Kategori: $role</p>
                <p>Jenis Aset: $jenis_aset</p>
                <p>Nombor Siri Pendaftaran Aset: $no_siri</p>
                <p>Tempat Rosak: $tempat_rosak</p>
                <p>Pengguna Terakhir: $userterakhir</p>
                <p>Perihal Kerosakan: $ulasan</p>
                <p>Nama dan Jawatan: $nama</p>
                <p>Tarikh Kerosakan: $tarikh_rosak</p>
                <p><img src='bukti/$image' width='200'></p>
                <p>Status: $lulus_jabatan</p>
                ";
                $mail->AltBody = "Aduan Kerosakan Baru:\nrole: $role\nJenis Aset: $jenis_aset\nNombor Siri Pendaftaran: $no_siri\nTempat Rosak: $tempat_rosak\nPengguna Terakhir: $userterakhir\nPerihal Kerosakan: $ulasan\nNama dan Jawatan: $nama\nTarikh Kerosakan: $tarikh_rosak\nBuktiran: $image\nStatus: $lulus_jabatan";  // Plain-text version for non-HTML clients

                $mail->send();
                
                
                $_SESSION['message'] = "Aduan berjaya dihantar dan email telah dihantar.";
                $_SESSION['msg_type'] = "success";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        $stmt->close();
    } else {
        // If any required field is empty
        $_SESSION['message'] = "Sila pastikan semua medan diisi.";
        $_SESSION['msg_type'] = "danger";
    }

    $conn->close();
}
?>

