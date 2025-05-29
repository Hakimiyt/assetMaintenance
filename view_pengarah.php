<?php include ("header_print.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Terperinci Tentang Aduan Aset</title>

    <style>
       .book-details{
            background-color:#EEEEEE;
            box-shadow: 1px 1px 1px 1px black;
        }
        #back{
            margin-left: 1rem;
            margin-top: 10px
            
        }
        body {
            background-color: #C4D7FF;
        }
    </style>
</head>
<body>
    <div class="container 1">
        <header class="d-flex justify-content-betweenmy-4">
            <h1>Keterangan</h1>
            <div>
            <a href="pengarah.php" class="btn btn-primary" id="back">Kembali</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include 'db.php'; // Ensure your database connection is correct

            // Check if 'noid' is present in the GET request and is numeric
            if (isset($_GET['no_id']) && is_numeric($_GET['no_id'])) {
                $no_id = $_GET['no_id'];
                $sql = "SELECT * FROM tbl_semakan WHERE no_id = $no_id";
                $result = mysqli_query($conn, $sql);
            
                // Check if the query returned any results
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <h3>Nama dan Jawatan:</h3>
                <p><?php echo $row["nama"]; ?></p>

                <h3>Kategori</h3>
                <p><?php echo $row["kategori"]; ?></p>

                <h3>Jenis Aset:</h3>
                <p><?php echo $row["jenis_aset"]; ?></p>

                <h3>No Siri Pendaftaran Aset:</h3>
                <p><?php echo $row["no_siri"]; ?></p>

                <h3>Tempat Kerosakan</h3>
                <p><?php echo $row["tempat_rosak"]; ?></p>

                <h3>Tarikh Kerosakan</h3>
                <p><?php echo $row["tarikh_rosak"]; ?></p>

                <h3>Pengguna Terakhir</h3>
                <p><?php echo $row["userterakhir"]; ?></p>

                <h3>Perihal Kerosakan</h3>
                <p><?php echo $row["ulasan"]; ?></p>

                <h3>Disahkan</h3>
                <p><?php echo $row["lulus_jabatan"]; ?></p>
        
                <?php
                }
            }
        }
            else{
                echo "<h3>Tiada pemohonan dijumpai.</h3>";
            }
        
        ?>
            </div>
        </div>
</body>
</html>