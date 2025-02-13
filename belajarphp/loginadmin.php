<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .login input::placeholder{
            opacity: 0.5;
        }
        .password-container {
            position: relative;
            display: inline-block;
        }
        .password-container input {
            padding-right: 55px; /* Beri ruang untuk ikon */
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            border: none;
            background: none;
        }

    </style>
    <script src='asset/sweetalert/sweetalert2.all.min.js'></script>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="login card shadow-lg" style="width: 100%; max-width: 300px; border-radius: 10px;">
        <form action="loginadmin.php" method="POST" class="p-4 border rounded shadow bg-light">
                <h1 class="text-center">Admin</h1>
                <div class="">
                    <label for="username" class="form-table">Nama</label><br>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" autocomplete="off" autofocus required><br>
                </div>
                <div class="password-container">
                    <label for="password" class="form-lable">Password</label>
                    <button type="button" class="toggle-password" onclick="togglePassword()"><i class="bi bi-eye"></i></button><br>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" autocomplete="off" required><br>
                </div>
                <div class="d-grid">
                    <input type="submit" name="submit" id="submit" value="Login" class="btn btn-primary">
                </div>
                <!-- <a href="../register/register.php">Belum Punya Akun</a> -->
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleBtn = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleBtn.innerHTML = "<i class='bi bi-eye-slash'></i>";
            } else {
                passwordInput.type = "password";
                toggleBtn.innerHTML = "<i class='bi bi-eye'></i>";
            }
        }
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include_once('asset/koneksi.php');
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    $nama = mysqli_escape_string($conn,$_POST['username']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $Lquery = "SELECT * FROM admins WHERE username = '$nama'";
    $Lresult = mysqli_query($conn, $Lquery);

    if(mysqli_num_rows($Lresult) > 0){
        $data = mysqli_fetch_array($Lresult);
        $password_hash = $data['PASSWORD'];

        if(password_verify($password, $password_hash)){

            $_SESSION['user'] = $data;
            $_SESSION['role'] = 'admin';
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
                    text: 'Password Salah',
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
    }
};

?>