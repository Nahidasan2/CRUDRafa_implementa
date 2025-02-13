<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Perempuan</h1>
    <div>
        <table class="table table-striped">
            <tr>
                <th>
                <th>NISN</th>
                <th>Username</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Asal Kota</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th colspan="2">Action</th>
                </th>
            </tr>
            <?php
            include_once('../asset/koneksi.php');

            $ViweQuery = "SELECT * FROM users WHERE jeniskelamin = 'perempuan'";
            $ViewResult = mysqli_query($conn, $ViweQuery);

            while($tampil = mysqli_fetch_array($ViewResult)){
                ?>
                <tr>
                <td><?php echo $tampil['nisn'] ?></td>
                <td><?php echo $tampil['username'] ?></td>
                <td><?php echo $tampil['kelas'] ?></td>
                <td><?php echo $tampil['jurusan'] ?></td>
                <td><?php echo $tampil['jeniskelamin'] ?></td>
                <td><?php echo $tampil['asalkota'] ?></td>
                <td><?php echo $tampil['alamat'] ?></td>
                <td><?php echo $tampil['agama'] ?></td>
                <td class="gap-1"><a class="btn btn-warning" href="../asset/edituser.php?id=<?php echo $tampil['id']; ?>">Edit</a></td>
                <td class="gap-1"><a class="btn btn-danger" href="?id=<?php echo $tampil['id'] ?>">Hapus</a></td>
                </tr>
           <?php }
            ?>
        </table>
    </div>
    <div class="btn btn-outline-primary">
        <a href="dashboard.php">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

$getdata = mysqli_query($conn, "SELECT * FROM users WHERE username");
$jumlahdata = mysqli_num_rows($getdata);

if (isset($_GET['id'])){
    $Dquery = "DELETE FROM users WHERE id='$_GET[id];'";
    $Dresult = mysqli_query($conn, $Dquery);

    if ($Dresult){
        echo "<script>alert('Data Sudah Dihapus');
        location.href = 'dashboard.php';
        </script>";
    }
}
?>