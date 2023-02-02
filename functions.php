<?php
$conect = mysqli_connect("localhost","root","","db_mahasiswa");

function query($query){
    global $conect;

    $result = mysqli_query($conect,$query);
    $rows[] = "";
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;

}

 


function tambahData($data){

    global $conect;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $no_tlpn = htmlspecialchars($data["no_tlpn"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $instagram = htmlspecialchars($data["instagram"]);
    

    $foto = upload();

    if(!$foto){
        return false;
    }

    $query = "INSERT INTO db_kelas_b VALUES ('$nama','$nim','$no_tlpn','$foto','$alamat','$email','$instagram')";
      
    mysqli_query($conect, $query);


    return mysqli_affected_rows($conect);
}

function ubah($data){

    global $conect;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $no_tlpn = htmlspecialchars($data["no_tlpn"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $instagram = htmlspecialchars($data["instagram"]);
    

    $foto = upload();

    if(!$foto){
        return false;
    }

    $query = "UPDATE db_kelas_b SET nama = '$nama', nim = $nim, no_tlpn = $no_tlpn, foto = '$foto', alamat = '$alamat', email='$email',instagram = '$instagram' WHERE nama='$_GET[nama]'";
      
    mysqli_query($conect, $query);


    return mysqli_affected_rows($conect);
}
function upload(){

    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    if($error === 4){
        echo "<script>alert('Silahkan Pilih Gambar Terlebih Dahulu')</script>";

        return false;
    }

    if($ukuranfile > 2000000){
        echo "<script>alert('Silahkan Pilih Gambar Yang Ukuranya Lebih Kecil')</script>";

        return false;
    }


    move_uploaded_file($tmpName,'asset/'. $namafile);

    return $namafile;

    

}




function hapus($nama){
    global $conect;
     
    mysqli_query($conect,"DELETE FROM db_kelas_b WHERE nama='$nama'");

    return mysqli_affected_rows($conect);
}


function registrasi($data){
    global $conect;

    $username = strtolower(stripslashes($data["username"]));

    $password = mysqli_real_escape_string($conect,$data["password"]);

    $confirmPassword = mysqli_real_escape_string($conect,$data["confirm-password"]);

    


    if($password !== $confirmPassword){
        echo "<script>alert('Konfirmasi Password tidak sesuai')</script>";
        return false;
    }




    $password = password_hash($password, PASSWORD_DEFAULT); 

    mysqli_query($conect, "INSERT INTO users VALUES('','$username','$password')");

    return mysqli_affected_rows($conect);

}
?>