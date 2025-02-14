<?php
include('../asset/navbar.php');
include('../asset/koneksi.php');
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../index.php');
};

$role = $_SESSION['role'];
$permissions = explode(',', $_SESSION['user']['izin']);

//tambahkota
if(isset($_POST['btntambahkota'])){
    $kota = mysqli_real_escape_string($conn, $_POST['tambahkota']);

    $Qtambahkota = "INSERT INTO kota (asalkota) VALUE ('$kota')";
    $Rtambahkota = mysqli_query($conn, $Qtambahkota);

    if($Rtambahkota){
        echo "
        <script>
        alert('Kota Sudah Ditambahkan');
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Gagal');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>
<body>
    <div class="mt-2 ms-2">
        <a class="btn btn-dark" href="../login/dashboard.php"><i class="bi bi-backspace"></i></a>
        <!-- <a class="btn btn-success" href="">Tambah Kota</a> -->
        <?php if($role == 'admin' || in_array('edit', $permissions)): ?>
        <form action="" method="POST" class="d-flex mt-2">
            <!-- <label for="tambahkota">Tambah Kota :</label> -->
            <input class="form-control form-control-sm w-50 ms-2" type="text" name="tambahkota" placeholder="Tambah Kota">
            <div class="btn btn-success ms-2">
                <span><i class="bi bi-building-fill-add"></i></span>
                <input style="background: transparent; border: none; color: white;" type="submit" name="btntambahkota" value="Tambah">
            </div>
        </form>
        <?php endif ?>
    </div>
    <div style="width: 90%;" class="ms-5">
    <!-- <h1 style="text-align:center;">Kota</h1> -->
    <table id="tablekota" border="1" class="table table-striped table-bordered border-dark mt-2">
        <thead>
        <tr>
            <th style="text-align:center;">Kota</th>
            <th style="text-align:center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once('koneksi.php');

        $QkotaB = "SELECT * FROM kota";
        $RkotaB = mysqli_query($conn, $QkotaB);

        while($tampil = mysqli_fetch_array($RkotaB)){
        ?>

        <tr>
            <td style="text-align:center"><?php echo $tampil['asalkota'] ?></td>
            <td class="gap-1" style="text-align:center; width: 5%;">
                <?php if($role == 'admin' || in_array('delete', $permissions)): ?>
                <a class="btn btn-danger" href="?id=<?php echo $tampil['id'] ?>"><i class="bi bi-trash"></i></a>
                <?php endif ?>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script type="text/javascript" src="../asset/tilt.js/vanilla-tilt.js"></script> -->
    <script>
        new DataTable('#tablekota');
    </script>
</body>
</html>
<?php

$getdata = mysqli_query($conn, "SELECT * FROM users WHERE username");
$jumlahdata = mysqli_num_rows($getdata);

if (isset($_GET['id'])){
    $Dquery = "DELETE FROM kota WHERE id='$_GET[id];'";
    $Dresult = mysqli_query($conn, $Dquery);

    if ($Dresult){
        echo "<script>alert('Data Sudah Dihapus');
        location.href = 'kota.php';
        </script>";
    }
}
?>
