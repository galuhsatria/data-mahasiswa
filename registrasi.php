<?php 


include 'functions.php';

if( isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
        
        alert('Selamat akun anda terdaftar');
        
        </script>";
        header("Location: login.php");
    }else{
        echo mysqli_error($conect);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container-sistem-login">
        <h2>Registrasi</h2>

        <form action="" method="post">
            
            <ul>
                <li>
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="confirm-password">Konfirmasi Password</label>
                    <input type="password" name="confirm-password" id="confirm-password">
                </li>
                <li>
                    <button type="submit" name="register">Register</button>
                </li>
                <li>
                    <h4>Already have account? <a href="login.php"> Login</a></h4>
                </li>
            </ul>

        </form>
    </div>
</body>
</html>