<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/register.css">
</head>
<body>
    <form action="prosesregis.php" method="POST">
        <div class="submitbox">
            <h1>Register</h1>
            <label for="nisn">NISN :</label>
            <input type="number" name="nisn" id="nisn"><br>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama"><br>
            <label for="kelas">Kelas :</label>
            <input type="kelas" name="kelas" id="kelas"><br>
            <label for="jurusan">Jurusan :</label>
            <select name="jurusan" id="jurusan">
                <option>PPLG</option>
                <option>TJKT</option>
                <option>DKV</option>
                <option>MPLB</option>
            </select><br>
            <label for="jk">Jenis Kelamin :</label><br>
            <input type="radio" name="jk" id="cowo" value="laki-laki">Laki-Laki
            <input type="radio" name="jk" id="cewe" value="perempuan">Perempuan<br>
            <label for="askot">Asal Kota :</label>
            <input type="text" name="askot" id="askot"><br>
            <label for="alamat">Alamat :</label><br>
            <textarea name="alamat" id="alamat"></textarea><br>
            <label for="agama">Agama :</label><br>
            <input type="radio" name="agama" id="islam" value="islam">Islam
            <input type="radio" name="agama" id="kristen" value="kristen">Kristen
            <input type="radio" name="agama" id="hindu" value="hindu">Hindu
            <input type="radio" name="agama" id="budha" value="budha">Buddha <br>
            <input type="radio" name="agama" id="konghucu" value="konghucu">Konghucu <br>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password"><br>
            <div class="btnregis">
                <input type="submit" name="submit" id="submit" value="Register">
                <a href="../login/login.php">Sudah Ada Akun</a>
            </div>
        </div>
    </form>
</body>
</html>