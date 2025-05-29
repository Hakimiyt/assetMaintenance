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
    $no_siri = isset($_POST['nomborsiri']) ? trim($_POST['nomborsiri']) : '';
    $tempat_rosak = isset($_POST['tempat']) ? trim($_POST['tempat']) : '';
    $userterakhir = isset($_POST['kerosakan']) ? trim($_POST['kerosakan']) : '';
    $ulasan = isset($_POST['text']) ? trim($_POST['text']) : '';
    $nama = isset($_POST['Nama_dan_Jawatan']) ? trim($_POST['Nama_dan_Jawatan']) : '';
    $emel = isset($_POST['emel']) ? trim($_POST['emel']) : '';
    $tarikh_rosak = isset($_POST['Tarikh_kerosakan']) ? $_POST['Tarikh_kerosakan'] : null;

    // Check if all required fields are filled
    if (!empty($role) && !empty($jenis_aset) && !empty($no_siri) && !empty($tempat_rosak) && !empty($userterakhir) && !empty($ulasan) && !empty($nama) && !empty($tarikh_rosak) && !empty($emel)) {
        // Default value for 'lulus_jabatan'
        $lulus_jabatan = 'Dalam Proses';

        // Prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO tbl_semakan (role, jenis_aset, no_siri, tempat_rosak, userterakhir, ulasan, nama, emel, tarikh_rosak, lulus_jabatan) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $role, $jenis_aset, $no_siri, $tempat_rosak, $userterakhir, $ulasan, $nama, $emel, $tarikh_rosak, $lulus_jabatan);

        if ($stmt->execute()) {
            // PHPMailer code to send email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();                                      // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                             // Enable SMTP authentication
                $mail->Username   = 'bppa3602@gmail.com';             // SMTP username (your Gmail address)
                $mail->Password   = 'brrekdgrcnyzpxio';               // SMTP password (your Gmail password or app password)
                $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption
                $mail->Port       = 465;                              // TCP port to connect to

                // Recipients
                $mail->setFrom($emel, $nama);                         // Sender's email and name (from form)
                $mail->addAddress('bppa3602@gmail.com');              // Recipient's email

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Aduan Kerosakan Baru Dihantar';
                $mail->Body    = "
                <p>Aduan Kerosakan Baru:</p>
                <p>role: $role</p>
                <p>Jenis Aset: $jenis_aset</p>
                <p>Nombor Siri Pendaftaran Aset: $no_siri</p>
                <p>Tempat Rosak: $tempat_rosak</p>
                <p>Pengguna Terakhir: $userterakhir</p>
                <p>Perihal Kerosakan: $ulasan</p>
                <p>Nama dan Jawatan: $nama</p>
                <p>Tarikh Kerosakan: $tarikh_rosak</p>
                <p>Status: $lulus_jabatan</p>
                ";
                $mail->AltBody = "Aduan Kerosakan Baru:\nrole: $role\nJenis Aset: $jenis_aset\nNombor Siri Pendaftaran: $no_siri\nTempat Rosak: $tempat_rosak\nPengguna Terakhir: $userterakhir\nPerihal Kerosakan: $ulasan\nNama dan Jawatan: $nama\nTarikh Kerosakan: $tarikh_rosak\nStatus: $lulus_jabatan";  // Plain-text version for non-HTML clients

                $mail->send();
                
                echo "
                <script>
                alert('Aduan berjaya dihantar dan Email telah dihantar!');
                document.location.href = 'aduan_user.php';
                </script>
                ";
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

