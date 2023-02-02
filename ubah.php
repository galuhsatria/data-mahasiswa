
<?php 
  session_start();

  if(!isset($_SESSION["login"])){
      header("Location: login.php");
      exit;
  }

$conect = mysqli_connect("localhost","root","","db_mahasiswa");

$sql = mysqli_query($conect, "SELECT * FROM db_kelas_b WHERE nama='$_GET[nama]'");

$data = mysqli_fetch_array($sql);

include 'functions.php';

if ( isset($_POST["submit"])) {

   if(ubah($_POST) > 0){
    echo "
    <script>
    alert('data berhasil diubah');
    document.location.href = 'index.php';
    </script>
    ";
   }else{
    echo "
    <script>
    alert('data gagal diubah');
    document.location.href = 'index.php';
    </script>
    "; 
   }
}    
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <form action="" method="post" class="form-create" enctype="multipart/form-data">

    <label for="nama" id="nama">Nama</label>
    <input type="text" id="name" name="nama" required placeholder="Your name" value="<?= $data['nama'];?>">

    <label for="nim" id="nama">NIM</label>
    <input type="number" id="nim" name="nim" required min="0" placeholder="210100xxxx" value="<?= $data['nim'];?>">

    <label for="no_tlpn" id="no-tlpn">NO Tlpn</label>
    <input type="number" id="no-tlpn" name="no_tlpn" required min="0" placeholder="62xxxxxxx" value="<?= $data['no_tlpn'];?>">

    <label for="alamat" id="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" required value="<?= $data['alamat'];?>">

    <label for="email" id="email">E-mail</label>
    <input type="email" id="email" name="email" required placeholder="example@gmail.com" value="<?= $data['email'];?>">

    <label for="instagram" id="instagram">Instagram</label>
    <input type="text" id="instagram" name="instagram" required placeholder="Input Your Instagram Name" value="<?= $data['instagram'];?>">

    <label for="foto" id="foto">Foto</label>
    <input type="file" id="foto" name="foto" required>

        <button class="submit" type="submit" name="submit">Submit</button>
    </form>

    <a href="index.php" class="back"><button>Kembali</button></a>


</body>
</html>