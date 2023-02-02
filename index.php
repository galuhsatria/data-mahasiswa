<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


require 'functions.php';

$datamahasiswa = mysqli_query($conect,"SELECT * FROM db_kelas_b");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

    <a href="logout.php" class="logout"><button>Logout</button></a>
    <div class="container">

        <div class="tittle">
            <h2>Data Mahasiswa Kelas B</h2>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Cari Dong" id="search-input">
        </div>
        <div class="create">
            <a href="create.php"><button tittle="tambah data">Tambah</button></a>
        </div>
        <div class="card">
            <ul class="data-mahasiswa">
            <?php foreach($datamahasiswa as $data) :?>
                <li>
                <div class="btn-d-u">
                <a href="ubah.php?nama=<?= $data["nama"]; ?>" class="ubah" onclick="return confirm('anda yakin ingin mengubah')"><i class="bi bi-pencil-square"></i></i></a>

                <a href="delete.php?nama=<?= $data["nama"]; ?>" class="delete" onclick="return confirm('anda yakin ingin menghapus')"><i class="bi bi-trash-fill"></i></a>
            </div>
            <br>
                <img src="asset/<?= $data["foto"] ?>" alt="foto-mahasiswa" class="foto-profil">
                <p><b><?= $data["nama"]; ?></b></p>
                <div class="detail-mhs">
                <p><?= $data["nim"]; ?></p>
                <div class="btn">

                <a href="detail.php?nama=<?= $data["nama"]; ?>"><button class="detail hubungi">Detail</button></a>

                <br>
                <div class="sosmed">
                <a href="https://wa.me/<?= $data["no_tlpn"]; ?>"><i class="bi bi-whatsapp"></i></a>
                <a href="https://instagram.com/<?= $data["instagram"]; ?>"><i class="bi bi-instagram"></i></i></a>
            </div>
            </div>
            </div>

            </li>

                <?php endforeach; ?> 
            </ul>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>