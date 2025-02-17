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

    <!-- datatable -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    <style>
        body{
            justify-content: center;
            text-align: center;
        }
        .table {
        place-items: center;
        }
        .content {
            margin-left: 148px; /* Geser dashboard ke kanan */
    /* padding: 20px; Tambahkan padding agar lebih rapi */
}
    </style>
</head>
<body>
<div class="d-flex">
        <?php
    include('../asset/navbar.php');
    ?>
    <div class="content">
<div class="content flex-grow-1">
    </div>

    <!-- table -->
    <div class="table gap-3">
        <h2>Data Siswa :</h2>
        <div class="filter container-fluid" style="display : flex;">
            <form method="GET" action="" class="d-flex align-items-center gap-3 container-fluid" style="white-space: nowrap;">
            <nav class="navbar navbar-expand-lg container-fluid">
            <!-- <a class="btn btn-primary" href="../asset/create.php">Add</a> -->
            
            <!-- <input type="text" name="cari">
            <input type="submit" name="cari"> -->
            <!-- <div class="d-flex">
                <input class="" type="text" name="cari" id="cari">
                <input type="submit" name="cari" value="Search">
            </div> -->
            <?php if($role == 'admin' || in_array('edit', $permissions)): ?>
            <a class="btn btn-primary" aria-current="page" href="../asset/create.php"><i class="bi bi-database-add"></i></a>
            <?php endif ?>
            <label for="filter-kota" class="ms-3">Kota :</label>
            <select name="kota" id="filter-kota" class="form-select ms-3">
                <option value="">None</option>
                <?php
                include_once('../asset/koneksi.php');
                
                $Qkota = "SELECT DISTINCT asalkota FROM users ORDER BY asalkota ASC";
                $Rkota = mysqli_query($conn, $Qkota);
                while ($row = mysqli_fetch_assoc($Rkota)) {
                    $selected = (isset($_GET['kota']) && $_GET['kota'] == $row['asalkota']) ? "selected" : "";
                    echo "<option value='{$row['asalkota']}' $selected>{$row['asalkota']}</option>";
                }
                ?>
            </select>

            <label for="kelas" class="ms-3">Kelas</label>
            <select name="kelas" class="form-select ms-3">
                <option value="">None</option>
                <option value="10" <?php echo (isset($_GET['kelas']) && $_GET['kelas'] == '10') ? 'selected' : ''; ?>>10</option>
                <option value="11" <?php echo (isset($_GET['kelas']) && $_GET['kelas'] == '11') ? 'selected' : ''; ?>>11</option>
                <option value="12" <?php echo (isset($_GET['kelas']) && $_GET['kelas'] == '12') ? 'selected' : ''; ?>>12</option>
            </select>
            
            <label for="jeniskelamin" class="ms-3">Jenis Kelamin :</label>
            <select name="jeniskelamin" class="form-select ms-3">
                <option value="">None</option>
                <option value="laki-laki" <?php echo (isset($_GET['jeniskelamin']) && $_GET['jeniskelamin'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="perempuan" <?php echo (isset($_GET['jeniskelamin']) && $_GET['jeniskelamin'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>

            <label for="agama" class="ms-3">Agama :</label>
            <select name="agama" class="form-select ms-3">
                <option value="">None</option>
                <option value="islam" <?php echo (isset($_GET['agama']) && $_GET['agama'] == 'islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="kristen" <?php echo (isset($_GET['agama']) && $_GET['agama'] == 'kristen') ? 'selected' : ''; ?>>Kristen</option>
                <option value="hindu" <?php echo (isset($_GET['agama']) && $_GET['agama'] == 'hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="budha" <?php echo (isset($_GET['agama']) && $_GET['agama'] == 'budha') ? 'selected' : ''; ?>>Budha</option>
                <option value="konghucu" <?php echo (isset($_GET['agama']) && $_GET['agama'] == 'konghucu') ? 'selected' : ''; ?>>Konghucu</option>
            </select>
            <button type="submit" class="btn btn-dark ms-3">Tampilkan</button>
        </nav>
        </form>
    </div>

        <table border="1" id="tableku" class="table table-striped table-bordered border-dark">
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <th>Foto Siswa</th>
                <th>NISN</th>
                <th>Username</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Asal Kota</th>
                <th>Alamat</th>
                <th>Agama</th>
                <?php if($role == 'admin'): ?>
                <th colspan="3" style="text-align: center;">Action</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once('../asset/koneksi.php');

            $whereClause = "";
            if (isset($_GET['kota']) && $_GET['kota'] != "") {
                $Qkota = mysqli_real_escape_string($conn, $_GET['kota']);
                $whereClause .= "WHERE asalkota = '$Qkota'";
            }

            if(isset($_GET['kelas']) && $_GET['kelas'] != ""){
                $Qkelas = mysqli_real_escape_string($conn, $_GET['kelas']);

                if($whereClause == ""){
                    $whereClause .= "WHERE kelas='$Qkelas'";
                }else{
                    $whereClause .= "AND kelas='$Qkelas'";
                }
            }

            if(isset($_GET['jeniskelamin']) && $_GET['jeniskelamin'] != ""){
                $Qjeniskelamin = mysqli_real_escape_string($conn, $_GET['jeniskelamin']);

                if($whereClause == ""){
                    $whereClause .= "WHERE jeniskelamin='$Qjeniskelamin'";
                }else{
                    $whereClause .= "AND jeniskelamin='$Qjeniskelamin'";
                }
            }

            if(isset($_GET['agama']) && $_GET['agama'] != ""){
                $Qagama = mysqli_real_escape_string($conn, $_GET['agama']);

                if($whereClause == ""){
                    $whereClause .= "WHERE agama='$Qagama'";
                }else{
                    $whereClause .= " AND agama='$Qagama'";
                }
            }

            $Vquery = "SELECT * FROM users $whereClause ORDER BY asalkota ASC";
            $Vresult = mysqli_query($conn, $Vquery);

            while($tampil = mysqli_fetch_array($Vresult)){
            ?>
            <tr>
                <!-- <td><?php echo $tampil['id']; ?></td> -->
                <td><img src="<?= $tampil['gambarsiswa']; ?>" width="80" height="80"></td>
                <td><?php echo $tampil['nisn'] ?></td>
                <td><?php echo $tampil['username'] ?></td>
                <td><?php echo $tampil['kelas'] ?></td>
                <td><?php echo $tampil['jurusan'] ?></td>
                <td><?php echo $tampil['jeniskelamin'] ?></td>
                <td><?php echo $tampil['asalkota'] ?></td>
                <td><?php echo $tampil['alamat'] ?></td>
                <td><?php echo $tampil['agama'] ?></td>
                <?php if($role == 'admin' || in_array('edit', $permissions) || in_array('delete', $permissions)): ?>
                <td class="gap-1">
                    <?php if($role == 'admin' || in_array('edit', $permissions)): ?>
                    <a class="btn btn-warning" href="../asset/edituser.php?id=<?php echo $tampil['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                    <?php endif ?>
                </td>
                <td class="gap-1">
                    <?php if($role == 'admin' || in_array('delete', $permissions)): ?>
                    <a class="btn btn-danger" href="?id=<?php echo $tampil['id'] ?>"><i class="bi bi-trash"></i></a>
                    <?php endif ?>
                </td>
                <td class="gap-1"><a class="btn btn-success" href="../asset/izinuser.php?id=<?php echo $tampil['id']; ?>">Izin</a></td>
                <?php endif ?>
            </tr>

            <?php } ?>
        </tbody>
        </table>
    </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../asset/tilt.js/vanilla-tilt.js"></script>
    <script>
        new DataTable('#tableku');
    </script>
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