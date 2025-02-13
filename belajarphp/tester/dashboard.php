<?php
include('../asset/koneksi.php');
// session_start();

// if(!isset($_SESSION['user'])){
//     header('location:login.php');
// };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            justify-content: center;
            text-align: center;
        }
        .table {
        place-items: center;
        }
    </style>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="btnall container-fluid">
            <!-- <a class="btn btn-primary" href="../asset/create.php">Add</a> -->
            <!-- <div class="atas">
                <h1>DATABASE</h1>
            </div> -->
            <div class="btn btn-success ms-1 p-1">
            <div class="d-flex align-items-center">
                <p class="m-0">Siswa :</p>
                <?php
                
                $Qjumlahsiswa = "SELECT * FROM users";
                $Rjumlahsiswa = mysqli_query($conn, $Qjumlahsiswa);

                if($jumlahsiswa = mysqli_num_rows($Rjumlahsiswa)){
                    echo '<p class="ms-1 m-0"> '.$jumlahsiswa.' </p>';
                }
                
                ?>
            </div>
        </div>
            <div class="btn btn-outline-primary ms-1 p-1">
                <div class="d-flex align-items-center">
                    <p class="m-0">Laki-Laki :</p>
                    <?php
                    
                    $Qjmllakilaki = "SELECT * FROM users WHERE jeniskelamin = 'laki-laki'";
                    $Rjmllakilaki = mysqli_query($conn, $Qjmllakilaki);

                    if($jmllakilaki = mysqli_num_rows($Rjmllakilaki)){
                        echo '<p class="ms-1 m-0"> '.$jmllakilaki.' </p>';
                    }
                    
                    ?>
                </div>
            </div>
            <div class="btn btn-outline-danger ms-1 p-1">
                <div class="d-flex align-items-center">
                    <p class="m-0">Perempuan :</p>
                    <?php
                    
                    $Qjmllakilaki = "SELECT * FROM users WHERE jeniskelamin = 'perempuan'";
                    $Rjmllakilaki = mysqli_query($conn, $Qjmllakilaki);

                    if($jmllakilaki = mysqli_num_rows($Rjmllakilaki)){
                        echo '<p class="ms-1 m-0"> '.$jmllakilaki.' </p>';
                    }
                    
                    ?>
                </div>
            </div>
            <a class="btn btn-primary ms-auto" href="logout.php">Log Out</a>
        </div>
    </nav>
    <hr>
    <div class="table">
        <h2>Data Siswa :</h2>
        <div class="filter container-fluid" style="display : flex;">
            <form method="GET" action="" class="d-flex align-items-center gap-3 container-fluid" style="white-space: nowrap;">
            <nav class="navbar navbar-expand-lg container-fluid">
            <!-- <a class="btn btn-primary" href="../asset/create.php">Add</a> -->
             <button data-bs-toggle="create" data-bs-target="#create">Add</button>

            <form action="" method="POST" class="create row p-4 border rounded shadow bg-light" style="width :70%;">
        <div class="addbox container-fluid">
            <h1>Tambah Data</h1>
            <div class="d-flex">
                <div class="col-md-3">
                    <label for="nisn" class="form-label">NISN :</label>
                    <input type="number" name="nisn" id="nisn" class="form-control" required><br>
                </div>
                <div class="col-md-3 ms-5">
                    <label for="nama" class="form-label">Nama :</label>
                    <input type="text" name="nama" id="nama" class="form-control" required><br>
                </div>
                <div class="col-3 ms-5">
                    <label for="kelas" class="form-label">Kelas :</label>
                    <input type="kelas" name="kelas" id="kelas" class="form-control" required><br>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-2">
                    <label for="jurusan" class="form-label">Jurusan :</label>
                    <select name="jurusan" id="jurusan" class="form-select" required>
                        <option>PPLG</option>
                        <option>TJKT</option>
                        <option>DKV</option>
                        <option>MPLB</option>
                    </select><br>
                </div>
                <div class="ms-5">
                    <label for="jeniskelamin">Jenis Kelamin :</label><br>
                    <input type="radio" name="jeniskelamin" id="cowo" value="laki-laki" class="form-check-input" required>
                    <label for="" class="form-check-label">Laki-Laki</label><br>
                    <input type="radio" name="jeniskelamin" id="cewe" value="perempuan" class="form-check-input" required>
                    <label for="" class="form-check-label">Perempuan</label><br>
                </div>
                <div class="ms-5">
                    <th>
                        <tr>
                            <label for="agama">Agama :</label><br>
                            <input type="radio" name="agama" id="islam" value="islam" class="form-check-input" required>Islam 
                            <input type="radio" name="agama" id="kristen" value="kristen" class="form-check-input" required>Kristen
                        </tr>
                    </th>
                    <th>
                        <tr>
                            <input type="radio" name="agama" id="hindu" value="hindu" class="form-check-input" required>Hindu 
                            <input type="radio" name="agama" id="budha" value="budha" class="form-check-input" required>Buddha 
                            <input type="radio" name="agama" id="konghucu" value="konghucu" class="form-check-input" required>Konghucu
                        </tr>
                    </th>
                        <!-- <p id="errAgama"></p> -->
                </div>
            </div>
            <div class="d-flex">
                <div class="col-2">
                    <label for="asalkota" class="form-label" >Asal Kota :</label>
                    <input type="text" name="asalkota" id="asalkota" class="form-control" required><br>
                </div>
                <div class="form-floatinf col-6 ms-5 col-md-3">
                    <label for="alamat">Alamat :</label><br>
                    <textarea class="form-control" name="alamat" id="alamat" required></textarea><br>
                </div>
            </div>
            <!-- <label for="password">Password :</label>
            <input type="password" name="password" id="password"><br> -->
            <div class="btnadd" style="text-align :right;">
                <input type="submit" name="submit" id="submit" value="Create" class="btn btn-primary">
            </div>
        </div>
    </form>
            
            <!-- <input type="text" name="cari">
            <input type="submit" name="cari"> -->

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

        <table border="1" class="table table-striped">
            <tr>
                <!-- <th>No</th> -->
                <th>NISN</th>
                <th>Username</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Asal Kota</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            include_once('../asset/koneksi.php');

            $whereClause = "";
            if (isset($_GET['kota']) && $_GET['kota'] != "") {
                $Qkota = mysqli_real_escape_string($conn, $_GET['kota']);
                $whereClause .= "WHERE asalkota = '$Qkota'";
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

            <?php } ?>
        </table>
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