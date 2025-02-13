<?php
include_once('koneksi.php');
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak!, Anda Bukan Admin'); window.location.href = '../login/dashboard.php';</script>";
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
        $izin = $data['izin'];
    }else{
        echo "<script>alert('Data Tidak Ada');
        location.href = '../login/dashboard.php';
        </script>";
    }
}

$Aizin = explode(',', $izin);

if (isset($_POST['updateizin'])) {
    $permissions = isset($_POST['permissions']) ? implode(',', $_POST['permissions']) : 'view';
    $update_query = "UPDATE users SET izin = '$permissions' WHERE id = '$id'";
    mysqli_query($conn, $update_query);

    echo "<script>alert('Izin berhasil diperbarui!'); window.location.href = '../login/dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>izin untuk <?php echo $username; ?></h1>
    <p>Izin <?php echo $username ?> adalah :</p>
    <form method="POST">
        <input type="checkbox" name="permissions[]" value="view" <?= in_array('view', $Aizin) ? 'checked' : '' ?>> View<br>
        <input type="checkbox" name="permissions[]" value="edit" <?= in_array('edit', $Aizin) ? 'checked' : '' ?>> Edit<br>
        <input type="checkbox" name="permissions[]" value="delete" <?= in_array('delete', $Aizin) ? 'checked' : '' ?>> Delete<br>
        <br>
        <div>
            <a class="btn btn-primary" href="../login/dashboard.php">Back</a>
            <input type="submit" class="btn btn-success" name="updateizin" value="Update Izin">
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>