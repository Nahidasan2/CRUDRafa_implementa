<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <div>
      <img src="../asset/logosmk.png" alt="logo" width="40">
      <a class="navbar-brand text-white fs-2" href="https://smkn5tangerangkota.sch.id/" target="_blank">SMKN 5</a>
    </div>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white fs-5" aria-current="page" href="../login/dashboard.php"><i class="bi bi-clipboard-data"></i>DataSiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white fs-5" aria-current="page" href="../asset/kota.php"><i class="bi bi-building"></i>Kota</a>
        </li>
        <!-- <li class="nav-item">
          <p class="nav-link active text-white"><?php echo $username ?></p>
        </li> -->
        <li class="nav-item">
          <a class="nav-link fs-5" href="../logout/logout.php">LogOut <i class="bi bi-box-arrow-right"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>