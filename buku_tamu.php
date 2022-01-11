<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
<div class="header">
  <a href="#default" class="logo">BookList</a>
  <div class="header-right">
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="product.html">Buku</a>
    <a href="buku_tamu.php" class="active">Buku Tamu</a>
  </div>
</div>
<div class="jumbotron">
  <div class="container">
    <h1 class="title">Form buku Tamu</h1>
  </div>
</div>
<div class="form-tamu" style="min-height: 700px;">
  <div class="form-tamu-content">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label>
          <span>Nama Lengkap</span>
          <input name="nama" type="text" placeholder="Ex: Rajendra Nohan"/>
        </label>
        <label>
            <span>Jenis Kelamin</span>
            <br>
            <label>
                <input type="radio" checked name="jeniskelamin" value="Laki-laki"><span>Laki-laki</span>
            </label>
            <label>
                <input type="radio" name="jeniskelamin" value="Perempuan"><span>Perempuan</span>
            </label>
            <br>
        </label>
        <label>
            <span>Alamat Tinggal</span>
            <input type="text" name="alamat" placeholder="Ex: Jalan Karangrejo Selatan"/>
        </label>
        <label>
            <span>Email</span>
            <input type="email" name="email" placeholder="Ex: rajendranohan4@gmail.com"/>
        </label>
        <label>
            <span>Mengetahui web ini dari :</span>
            <select name="rekomendasi" id="">
                <option value="">-= Pilih =-</option>
                <option value="Whatsapp">Whatsapp</option>
                <option value="Teman">Teman</option>
                <option value="Facebook">Grup Facebook</option>
                <option value="Instagram">Instagram</option>
            </select>
        </label>
        <label>
            <span>Pesan :</span>
            <textarea name="pesan" id="pesan" cols="30" rows="10"></textarea>
        </label>
        <button type="submit" class="button">Kirim</button>
        <button type="reset" class="button-orange">Reset</button>
    </form>
  </div>
</div>
<div class="form-tamu">
  <div class="form-tamu-content">
    <div class="form-tamu-title">
      <h1>Form Tabel</h1>
      <table class="table">
        <tr>
          <th>Nama Lengkap</th>
          <th>Jenis Kelamin</th>
          <th>Alamat Tinggal</th>
          <th>Email</th>
          <th>Rekomendasi</th>
          <th>Pesan</th>
        </tr>
        <?php
          if(isset($_POST['nama'])){
            echo "
            <tr>
              <td>".$_POST['nama']."</td>
              <td>".$_POST['jeniskelamin']."</td>
              <td>".$_POST['alamat']."</td>
              <td>".$_POST['email']."</td>
              <td>".$_POST['rekomendasi']."</td>
              <td>".$_POST['pesan']."</td>
            </tr>
            ";
          }
        ?>
      </table>
    </div>
  </div>
</div>
<div class="footer">
  <p align="center">&copy; Copyright 2022 Martabak Code</p>
</div>
</body>
</html>