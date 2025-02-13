<?php
if (isset($_POST['btnupdate'])){
    // $nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $jeniskelamin = mysqli_real_escape_string($conn, $_POST['jeniskelamin']);
    $asalkota = mysqli_real_escape_string($conn, $_POST['asalkota']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);

    if (!empty($_FILES['gambarsiswa']['name'])) {
        $folder_upload = "uploads/";
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
        $Uquery = "UPDATE users SET username='$nama', kelas='$kelas', jurusan='$jurusan', jeniskelamin='$jeniskelamin', asalkota='$asalkota', alamat='$alamat', agama='$agama', gambarsiswa='$file_name' WHERE id='$id'";
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