<?php
include_once('../asset/koneksi.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$password_hash = password_hash($password, PASSWORD_DEFAULT);

if(isset($_POST['submit'])){
    $QregisterA = "INSERT INTO admins (username, PASSWORD) VALUES ('$username', '$password_hash')";
    $RregisterA = mysqli_query($conn, $QregisterA);
    
    if($RregisterA){
        echo "<script>
        alert('Berhasil Register Silahkan Login');
        window.location.href = '../index.php';
        </script>";
    }else{
        echo "<script>
        alert('Maaf Sepertinya Ada Yang Salah');
        window.location.href = 'registeradmin.php';
        </script>";
    }
}
?>