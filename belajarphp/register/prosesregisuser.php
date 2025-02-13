<?php

include_once('../asset/koneksi.php');

$nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
$nama = mysqli_real_escape_string($conn,$_POST['nama']);
$kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
$jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
$jk = mysqli_real_escape_string($conn, $_POST['jk']);
$asalkota = mysqli_real_escape_string($conn, $_POST['askot']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$agama = mysqli_real_escape_string($conn, $_POST['agama']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (empty($password)){
    echo "<script>
    alert('Passwordnya jangan kosong dong wir');
    window.location.href = 'register.php';
    </script>";
    exit;
}

// $Hpassword = password_hash($password, PASSWORD_BCRYPT);

// $Cquery = "SELECT * FROM users WHERE password = '$password'";
// $Cresult = mysqli_query($conn, $Cquery);

if (mysqli_num_rows($Cresult) > 0){
    echo "<script>
    alert('Password Sudah Ada, Coba Yang Lain');
    window.location.href = 'register.php';
    </script>";
    exit;
}else{
    $Rquery = "INSERT INTO users (nisn, username, kelas, jurusan, jeniskelamin, asalkota, alamat, agama, password) VALUES ('$nisn', '$nama', '$kelas', '$jurusan', '$jk', '$asalkota', '$alamat', '$agama',  '$password')";
    $Rresult = mysqli_query($conn, $Rquery);

    if ($Rresult){
        echo "<script>
        alert('Berhasil Masuk');
        window.location.href = '../login/login.php';
        </script>";
    }else{
        echo "<script>
        alert('gagal masuk silahkan coba lagi');
        window.location.href = 'register.php';
        </script>";
    }
}


?>