<?php
include('../asset/koneksi.php');
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../index.php');
};

$role = $_SESSION['role'];
$permissions = explode(',', $_SESSION['user']['izin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body{
            margin-left: 148px;
        }
    </style>
</head>
<body>
<?php
    include('../asset/navbar.php');
?>

<h1 style="text-align: left;">Dashboard</h1>
    <nav id="dashboard" class="navbar bg-body-tertiary d-flex">
        <div class="btnall">
            <div class="btn btn-success ms-1 p-1" style="width: 200px; height: 130px;">
            <div class="d-flex align-items-center">
                <p class="m-0 ms-4" style="font-size: 80px;"><i class="bi bi-people-fill">:</i></p>
                <?php
                
                $Qjumlahsiswa = "SELECT * FROM users";
                $Rjumlahsiswa = mysqli_query($conn, $Qjumlahsiswa);

                if($jumlahsiswa = mysqli_num_rows($Rjumlahsiswa)){
                    echo '<p class="ms-1 m-0" style="font-size: 80px;"> '.$jumlahsiswa.' </p>';
                }
                
                ?>
            </div>
        </div>
        <a>
            <div class="btn btn-outline-primary ms-1 p-1" style="width: 200px; height: 130px;">
                <div class="d-flex align-items-center">
                    <p class="m-0" style="font-size: 80px;"><i class="bi bi-person-standing">:</i></p>
                    <?php
                    
                    $Qjmllakilaki = "SELECT * FROM users WHERE jeniskelamin = 'laki-laki'";
                    $Rjmllakilaki = mysqli_query($conn, $Qjmllakilaki);
                    
                    if($jmllakilaki = mysqli_num_rows($Rjmllakilaki)){
                        echo '<p class="ms-1 m-0" style="font-size: 80px;"> '.$jmllakilaki.' </p>';
                    }
                    
                    ?>
                </div>
            </div>
        </a>
        <a>
            <div class="btn btn-outline-danger ms-1 p-1" style="width: 200px; height: 130px;">
                <div class="d-flex align-items-center">
                    <p class="m-0" style="font-size: 80px;"><i class="bi bi-person-standing-dress">:</i></p>
                    <?php
                    
                    $Qjmllakilaki = "SELECT * FROM users WHERE jeniskelamin = 'perempuan'";
                    $Rjmllakilaki = mysqli_query($conn, $Qjmllakilaki);
                    
                    if($jmllakilaki = mysqli_num_rows($Rjmllakilaki)){
                        echo '<p class="ms-1 m-0" style="font-size: 80px;"> '.$jmllakilaki.' </p>';
                    }
                    
                    ?>
                </div>
            </div>
        </a>
        <!-- <a class="btn btn-primary" aria-current="page" href="../asset/create.php">Tambah</a> -->
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>