<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login input::placeholder{
            opacity: 0.5;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <script src='asset/sweetalert/sweetalert2.all.min.js'></script>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="login card shadow-lg" style="width: 100%; max-width: 400px; border-radius: 10px;">
        <form action="loginuser.php" method="POST" class="p-4 border rounded shadow bg-light">
                <h1 class="text-center">User</h1>
                <div class="">
                    <label for="username" class="form-table">Nama</label><br>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" autocomplete="off" autofocus required><br>
                </div>
                <div class="">
                    <label for="nisn" class="form-table">NISN</label><br>
                    <input type="number" name="nisn" id="nisn" class="form-control" min="0" placeholder="NISN" autocomplete="off" required><br>
                </div>
                <div class="d-grid">
                    <input type="submit" name="submit" id="submit" value="Login" class="btn btn-primary">
                </div>
                <!-- <a href="../register/register.php">Belum Punya Akun</a> -->
            </form>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include_once('asset/koneksi.php');
session_start();

if(isset($_POST['username']) && isset($_POST['nisn'])){
    $nama = mysqli_escape_string($conn,$_POST['username']);
    $nisn = mysqli_escape_string($conn, $_POST['nisn']);

    $Lquery = "SELECT * FROM users WHERE username = '$nama' AND nisn = '$nisn'";
    $Lresult = mysqli_query($conn, $Lquery);

    if(mysqli_num_rows($Lresult) > 0){
        $data = mysqli_fetch_array($Lresult);

        $_SESSION['user'] = $data;
        $_SESSION['role'] = 'user';
        $username = $data['username'];
        echo "<script>
                alert('Selamat Datang ". $username ."') 
                location.href = 'login/dashboard.php';
            </script>";
        }else{
            echo "
            <script src='assets/sweetalert/sweetalert2.all.min.js'></script>
            <script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'NISN Salah',
                    icon: 'error',
                    confirmButtonText: 'Coba Lagi'
                });
            </script>";
        }
    }else{
        echo "
        <script src='assets/sweetalert/sweetalert2.all.min.js'></script>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Username Salah',
                icon: 'error',
                confirmButtonText: 'Coba Lagi'
            });
        </script>";
};

?>