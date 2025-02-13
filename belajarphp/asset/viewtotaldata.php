<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
                    Jumlah Siswa :
                    <?php
                    
                    $Qjumlahsiswa = "SELECT * FROM users";
                    $Rjumlahsiswa = mysqli_query($conn, $Qjumlahsiswa);

                    if($jumlahsiswa = mysqli_num_rows($Rjumlahsiswa)){
                        echo '<h4> '.$jumlahsiswa.' </h4>';
                    }
                    
                    ?>
                </div>
</body>
</html>