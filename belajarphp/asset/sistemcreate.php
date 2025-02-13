<?php
include_once('koneksi.php');

if(isset($_POST['submit'])){
    $nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
    $username = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $jeniskelamin = mysqli_real_escape_string($conn, $_POST['jeniskelamin']);
    $asalkota = mysqli_real_escape_string($conn, $_POST['kota']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);

    $gambarsiswa = $_FILES['gambarsiswa']['name'];
    $tmp = $_FILES['gambarsiswa']['tmp_name'];


    // $password = mysqli_real_escape_string($conn, $_POST['password']);

    // if(empty($nisn) || empty($username) || empty($kelas) || empty($jurusan) || empty($jeniskelamin) || empty($asalkota) || empty($alamat) || empty($agama)){
    //     echo "<script>
    //     alert('Datanya Jangan Dikosongin Dong!');
    //     window.location.href('create.php');
    //     </script>";
        // $Aquery = "INSERT INTO users (nisn, username, kelas, jurusan, jeniskelamin, asalkota, alamat, agama, gambarsiswa) VALUES ('$nisn', '$username', '$kelas', '$jurusan', '$jeniskelamin', '$asalkota', '$alamat', '$agama', '$gambarsiswa')";
        // $Aresult = mysqli_query($conn, $Aquery);
        
        $lokasi = '../asset/allimage/'.$gambarsiswa;

        // move_uploaded_file($tmp, $lokasi);

        // $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        // $file_extension = pathinfo($image, PATHINFO_EXTENSION);
        // var_dump($file_extension);

        //validasi gambar
        // if (!in_array(strtolower($file_extension), $allowed_extensions)) {
        //     echo "<script>alert('Format file tidak didukung! Hanya JPG, JPEG, PNG, GIF.'); window.location.href = 'create.php';</script>";
        // }
        
    if (move_uploaded_file($tmp, $lokasi)) {
        $gambarsiswa = $lokasi;

        // Simpan ke Database
        $Aquery = "INSERT INTO users (nisn, username, kelas, jurusan, jeniskelamin, asalkota, alamat, agama, gambarsiswa) 
                   VALUES ('$nisn', '$username', '$kelas', '$jurusan', '$jeniskelamin', '$asalkota', '$alamat', '$agama', '$gambarsiswa')";
        $Aresult = mysqli_query($conn, $Aquery);

        if ($Aresult) {
            echo "<script>
            alert('Data Sudah Ditambahkan');
            window.location.href = '../login/dashboard.php';
            </script>";
        } else {
            echo "<script>
            alert('Sepertinya Ada Yang Salah nich, Coba lagi ya!');
            window.location.href = 'create.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Gagal mengupload gambar, coba lagi!');
        window.location.href = 'create.php';
        </script>";
    }
}

?>