<?php 

include 'functions.php';


$sql = mysqli_query($conect, "SELECT * FROM db_kelas_b WHERE nama='$_GET[nama]'");

$data = mysqli_fetch_array($sql);

$foto = trim($data["foto"]);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container-detail">
        <h2>Detail Mahasiswa</h2>
        <div class="main-profil">
        <div class="foto-profil-detail">
            <img src="asset/<?= $foto; ?>" alt="">
        </div>
        <div class="name">
            <h1><?= $data["nama"]; ?></h1>
        </div>
</div>
        <div class="detail">
            <ul class="detail-mahasiswa"> 
                <label for="">NIM</label>
                <li><?= $data["nim"]; ?></li>
                <label for="">Alamat</label>
                <li><?= $data["alamat"]; ?></li>
                <label for="">Instagram</label>
                <li><?= $data["instagram"]; ?></li>
                <label for="">NO Tlpn</label>
                <li><?= $data["no_tlpn"]; ?></li>
                <label for="">Email</label>
                <li><?= $data["email"]; ?></li>
            </ul>
        </div>


        <a href="index.php" id="back"><button class="kembali">Kembali</button></a>
    </div>
</body>
</html>