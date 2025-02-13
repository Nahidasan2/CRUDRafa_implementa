<?php
include_once('koneksi.php');
session_start();

// Pastikan user sudah login
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

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $SIDquery = "SELECT * FROM users WHERE id='$id'";
    $SIDresult = mysqli_query($conn, $SIDquery);
    
    if (mysqli_num_rows($SIDresult) == 1){
        $data = mysqli_fetch_assoc($SIDresult);
        $nisn = $data['nisn'];
        $username = $data['username'];
        $kelas = $data['kelas'];
        $jurusan = $data['jurusan'];
        $jeniskelamin = $data['jeniskelamin'];
        $asalkota = $data['asalkota'];
        $alamat = $data['alamat'];
        $agama = $data['agama'];
        $gambarsiswa = $data['gambarsiswa'];
    }else{
        echo "<script>alert('Data Tidak Ada');
        location.href = '../login/dashboard.php';
        </script>";
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
    <script src='asset/sweetalert/sweetalert2.all.min.js'></script>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form action="" method="POST" class="row p-4 border rounded shadow bg-light" style="width :70%;" enctype="multipart/form-data">
            <div class="addbox container-fluid">
                <h1>Edit Data Siswa</h1>
                <div class="d-flex">
                    <div class="col-md-3 ">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" value="<?php echo $username; ?>" required><br>
                    </div>
                    <div class="col-3 ms-5">
                    <label for="jurusan" class="form-label">Kelas :</label>
                        <select name="jurusan" id="jurusan" class="form-select" required>
                            <option value="10" <?php if ($kelas == "10") echo "selected"; ?>>10</option>
                            <option value="11" <?php if ($kelas == "11") echo "selected"; ?>>11</option>
                            <option value="12" <?php if ($kelas == "12") echo "selected"; ?>>12</option>
                        </select><br>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col-2">
                        <label for="jurusan" class="form-label">Jurusan :</label>
                        <select name="jurusan" id="jurusan" class="form-select" required>
                            <option value="PPLG" <?php if ($jurusan == "PPLG") echo "selected"; ?>>PPLG</option>
                            <option value="TJKT" <?php if ($jurusan == "TJKT") echo "selected"; ?>>TJKT</option>
                            <option value="DKV" <?php if ($jurusan == "DKV") echo "selected"; ?>>DKV</option>
                            <option value="MPLB" <?php if ($jurusan == "MPLB") echo "selected"; ?>>MPLB</option>
                        </select><br>
                    </div>
                    <div class="ms-5">
                        <label for="jeniskelamin">Jenis Kelamin :</label><br>
                        <input type="radio" name="jeniskelamin" id="cowo" value="laki-laki" class="form-check-input" <?php if ($jeniskelamin == "laki-laki") echo "checked"; ?> required>
                        <label for="" class="form-check-label">Laki-Laki</label><br>
                        <input type="radio" name="jeniskelamin" id="cewe" value="perempuan" class="form-check-input" <?php if ($jeniskelamin == "perempuan") echo "checked"; ?> required>
                        <label for="" class="form-check-label">Perempuan</label><br>
                    </div>
                    <div class="ms-5">
                        <th>
                            <tr>
                                <label for="agama">Agama :</label><br>
                                <input type="radio" name="agama" id="islam" value="islam" class="form-check-input" <?php if ($agama == "islam") echo "checked"; ?> required>Islam 
                                <input type="radio" name="agama" id="kristen" value="kristen" class="form-check-input" <?php if ($agama == "kristen") echo "checked"; ?> required>Kristen
                            </tr>
                        </th>
                        <th>
                            <tr>
                                <input type="radio" name="agama" id="hindu" value="hindu" class="form-check-input" <?php if ($agama == "hindu") echo "checked"; ?> required>Hindu 
                                <input type="radio" name="agama" id="budha" value="budha" class="form-check-input" <?php if ($agama == "budha") echo "checked"; ?> required>Budha 
                                <input type="radio" name="agama" id="konghucu" value="konghucu" class="form-check-input" <?php if ($agama == "konghucu") echo "checked"; ?> required>Konghucu
                            </tr>
                        </th>
                        <!-- <p id="errAgama"></p> -->
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col-2">
                        <label for="asalkota" class="form-label" >Asal Kota :</label>
                        <select name="kota" class="form-select">
                            <option value="">Pilih Kota</option>
                            <?php
                            include_once('../asset/koneksi.php');

                            // Ambil data kota dari database
                            $Qkota = "SELECT DISTINCT asalkota FROM kota ORDER BY asalkota ASC";
                            $Rkota = mysqli_query($conn, $Qkota);

                            // Ambil data pengguna yang sedang diedit
                            $user_id = $_GET['id']; // Misalnya user_id dikirim melalui URL
                            $queryUser = "SELECT asalkota FROM users WHERE id = '$user_id'";
                            $resultUser = mysqli_query($conn, $queryUser);
                            $userData = mysqli_fetch_assoc($resultUser);
                            $asalkota = $userData['asalkota']; // Kota sebelumnya

                            while ($row = mysqli_fetch_assoc($Rkota)) {
                                $selected = ($asalkota == $row['asalkota']) ? "selected" : "";
                                echo "<option value='{$row['asalkota']}' $selected>{$row['asalkota']}</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-floatinf col-6 ms-5 col-md-3">
                        <label for="alamat">Alamat :</label><br>
                        <textarea class="form-control" name="alamat" id="alamat" autocomplete="off" maxlength="50" title="max 50 Huruf" required placeholder="Maksimal 50 Huruf"><?php echo $alamat; ?></textarea>
                        <!-- <small id="help" class="form-text text-muted">Maksimal 17 karakter.</small> -->
                    </div>
                    <div class="col-2 ms-4">
                        <label for="gambarsiswa">Gambar Siswa :</label><br>

                        <!-- Menampilkan gambar yang sudah ada -->
                        <?php if (!empty($gambarsiswa)) { ?>
                            <img src="<?php echo $gambarsiswa; ?>" alt="Gambar Siswa" width="100"><br>
                        <?php } ?>
                        
                        <!-- Input file untuk upload gambar baru -->
                        <input type="file" class="input-text" name="gambarsiswa" id="gambarsiswa" class="form-control">
                    </div>
                </div>
                <!-- <label for="password">Password :</label>
                <input type="password" name="password" id="password"><br> -->
                <div class="btnadd" style="text-align :right;">
                    <a class="btn btn-outline-primary" href="../login/dashboard.php">Back</a>
                    <input type="submit" name="btnupdate" id="btnupdate" value="Update" class="btn btn-outline-primary" required>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['btnupdate'])){
    // $nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $jeniskelamin = mysqli_real_escape_string($conn, $_POST['jeniskelamin']);
    $asalkota = mysqli_real_escape_string($conn, $_POST['kota']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);

    if (!empty($_FILES['gambarsiswa']['name'])) {
        $folder_upload = "../asset/allimage/";
        $file_name = $_FILES['gambarsiswa']['name'];
        $file_tmp = $_FILES['gambarsiswa']['tmp_name'];

        // Ambil gambar lama dari database
        $query_old_image = "SELECT gambarsiswa FROM users WHERE id='$id'";
        $result_old_image = mysqli_query($conn, $query_old_image);
        $row_old_image = mysqli_fetch_assoc($result_old_image);

        // Hapus gambar lama jika ada
        if (!empty($row_old_image['gambarsiswa']) && file_exists($folder_upload . $row_old_image['gambarsiswa'])) {
            unlink($folder_upload . $row_old_image['gambarsiswa']);
        }

        // Pindahkan file baru ke folder uploads
        move_uploaded_file($file_tmp, $folder_upload . $file_name);

        // Update database dengan gambar baru
        $Uquery = "UPDATE users SET username='$nama', kelas='$kelas', jurusan='$jurusan', jeniskelamin='$jeniskelamin', asalkota='$asalkota', alamat='$alamat', agama='$agama', gambarsiswa='../asset/allimage/$file_name' WHERE id='$id'";
    } else {
        // Jika tidak ada gambar baru, update tanpa mengubah gambar
        $Uquery = "UPDATE users SET username='$nama', kelas='$kelas', jurusan='$jurusan', jeniskelamin='$jeniskelamin', asalkota='$asalkota', alamat='$alamat', agama='$agama' WHERE id='$id'";
    }

    $Uresult = mysqli_query($conn, $Uquery);

    if ($Uresult) {
        echo "<script>
        alert('Berhasil Update');
        window.location.href = '../login/dashboard.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Update');
        window.location.href = 'edituser.php';
        </script>";
    }
}

?>