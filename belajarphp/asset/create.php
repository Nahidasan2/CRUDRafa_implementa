<?php
include('../asset/navbar.php');
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Akses Ditolak! Silakan login.'); window.location.href = '../index.php';</script>";
    exit();
}

// Ambil role dan izin dari session
$role = $_SESSION['role'];
$permissions = isset($_SESSION['user']['izin']) ? explode(',', $_SESSION['user']['izin']) : [];

// Jika bukan admin dan tidak memiliki izin, tolak akses
if ($role !== 'admin' && !in_array('edit', $permissions) && !in_array('delete', $permissions)) {
    echo "<script>alert('Akses Ditolak! Anda tidak memiliki izin.'); window.location.href = '../login/dashboard.php';</script>";
    exit();
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='asset/sweetalert/sweetalert2.all.min.js'></script>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form action="sistemcreate.php" method="POST" class="row p-4 border rounded shadow bg-light" style="width :70%;" enctype="multipart/form-data">
            <div class="addbox container-fluid">
                <h1>Tambah Data</h1>
                <div class="d-flex">
                    <div class="col-md-3">
                        <label for="nisn" class="form-label">NISN :</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" autocomplete="off" pattern="[0-9]{10}" title="Hanya Bisa Diisi Dengan Angka dan Berisi 10 digit" required><br>
                    </div>
                    <div class="col-md-3 ms-5">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required><br>
                    </div>
                    <div class="col-3 ms-5">
                        <label for="kelas" class="form-label">Kelas :</label><br>
                        <select name="kelas" class="form-select" required>
                            <option value="">None</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
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
                                <input type="radio" name="agama" id="budha" value="budha" class="form-check-input" required>Budha 
                                <input type="radio" name="agama" id="konghucu" value="konghucu" class="form-check-input" required>Konghucu
                            </tr>
                        </th>
                        <!-- <p id="errAgama"></p> -->
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col-2">
                        <label for="kota" class="form-label" >Asal Kota :</label>
                        <!-- <input type="text" name="asalkota" id="asalkota" class="form-control" autocomplete="off" pattern="[a-zA-Z]{1,17}" title="Max 17 Huruf" required><br> -->
                         <select name="kota" class="form-select">
                                 <option value="">None</option>
                                 <?php
                                include_once('../asset/koneksi.php');
                                
                                $Qkota = "SELECT DISTINCT asalkota FROM kota ORDER BY asalkota ASC";
                                $Rkota = mysqli_query($conn, $Qkota);
                                while ($row = mysqli_fetch_assoc($Rkota)) {
                                    $selected = (isset($_GET['kota']) && $_GET['kota'] == $row['asalkota']) ? "selected" : "";
                                    echo "<option value='{$row['asalkota']}' $selected>{$row['asalkota']}</option>";
                                }
                                ?>
                    </select>
                    </div>
                    <div class="form-floatinf col-6 ms-5 col-md-3">
                        <label for="alamat">Alamat :</label><br>
                        <textarea class="form-control" name="alamat" id="alamat" autocomplete="off" maxlength="50" title="max 50 Huruf" required placeholder="Maksimal 50 Huruf"></textarea>
                        <!-- <small id="help" class="form-text text-muted">Maksimal 17 karakter.</small> -->
                    </div>
                    <div class="col-2 ms-4">
                        <label for="gambarsiswa">Gambar Siswa :</label>
                        <input type="file" name="gambarsiswa" required>
                    </div>
                </div>
                <!-- <label for="password">Password :</label>
                <input type="password" name="password" id="password"><br> -->
                <div class="btnadd" style="text-align :right;">
                    <a class="btn btn-primary" href="../login/dashboard.php">Back</a>
                    <input type="submit" name="submit" id="submit" value="Create" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>