<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Admin</title>
</head>
<body>
<form action="prosesregisadmin.php" method="POST" class="p-4 border rounded shadow bg-light">
        <div class="login text-center">
            <h1>Register For Admin</h1>
            <div class="">
                <label for="username" class="form-table">Nama</label><br>
                <input type="text" name="username" id="username" class="form-control" placeholder="username" autocomplete="off" autofocus required><br>
            </div>
            <div class="">
                <label for="password" class="form-table">Password</label><br>
                <input type="password" name="password" id="password" class="form-control" placeholder="password" autocomplete="off" required><br>
            </div>
            <input type="submit" name="submit" id="submit" value="Register" class="btn btn-success">
            <!-- <a href="../register/register.php">Belum Punya Akun</a> -->
        </div>
    </form>
</body>
</html>

<?php
// include_once('../asset/koneksi.php');

// $username = mysqli_real_escape_string($conn, $_POST['username']);
// $password = mysqli_real_escape_string($conn, $_POST['password']);

// $password_hash = password_hash($password, PASSWORD_DEFAULT);

// if(isset($_POST['submit'])){
//     $QregisterA = "INSERT INTO admins (username, PASSWORD) VALUES ('$username', '$password_hash')";
//     $RregisterA = mysqli_query($conn, $QregisterA);
    
//     if($RregisterA){
//         echo "<script>
//         alert('Berhasil Register Silahkan Login');
//         window.location.href = '../index.php';
//         </script>";
//     }else{
//         echo "<script>
//         alert('Maaf Sepertinya Ada Yang Salah');
//         window.location.href = 'registeradmin.php';
//         </script>";
//     }
// }
?>