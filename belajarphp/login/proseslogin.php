<?php
session_start();
include_once('../asset/koneksi.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $nama = $_POST['username'];
    $password = $_POST['password'];

    $Lquery = "SELECT * FROM admins WHERE username = '$nama' AND password = '$password'";
    $Lresult = mysqli_query($conn, $Lquery);

    if(mysqli_num_rows($Lresult) > 0){
        $data = mysqli_fetch_array($Lresult);
        $_SESSION['user'] = $data;
        echo "<script>
            alert('Selamat Datang') 
            location.href = 'dashboard.php';
        </script>";
    }else{
        echo "
        <script src='assets/sweetalert/sweetalert2.all.min.js'></script>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'NISN atau Token salah!, Silahkan Coba Lagi',
                icon: 'error',
                confirmButtonText: 'Coba Lagi'
            });
        </script>";
    }
};

?>