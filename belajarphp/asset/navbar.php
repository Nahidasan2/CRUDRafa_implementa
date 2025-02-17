<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .sidebar {
    height: 100vh; /* Sidebar mengikuti tinggi layar */
    position: fixed;
    top: 0;
    left: 0;
    width: 250px; /* Atur lebar sesuai kebutuhan */
    background-color: #007bff; /* Warna latar belakang */
    color: white;
    z-index: 1050;
    /* padding: 20px; */
}
    </style>
</head>
<body>
<div class="d-flex">
<nav class="sidebar d-flex flex-column vh-100 navbar navbar-expand-lg bg-primary" style="width: 140px; min-height: 100vh;">
  <div class="container-fluid">
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-column text-start">
        <div>
          <!-- <img src="../asset/logosmk.png" alt="logo" width="40"> -->
          <a class="navbar-brand text-white fs-2" href="https://smkn5tangerangkota.sch.id/" target="_blank">DATA</a>
        </div>
        <!-- <li>
          <a class="nav-link active text-white fs-5" href="#dashboard">Dashboard</a>
        </li> -->
        <li>
          <a class="nav-link active text-white fs-5 d-flex" href="dashboard1.php"><i class="bi bi-database-fill-check"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white fs-5 d-flex" aria-current="page" href="dashboard.php"><i class="bi bi-clipboard-data"></i>DataSiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white fs-5 d-flex" aria-current="page" href="kota.php"><i class="bi bi-building"></i>Kota</a>
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
</div>
</body>
</html>