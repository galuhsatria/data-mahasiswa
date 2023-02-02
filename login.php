<?php 

session_start();


if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

include "functions.php";

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conect , "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row["password"])){

            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    } 
    $eror = true;

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container-sistem-login">
        <h2>Halaman Login</h2>

        <form action="" method="POST">
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
                    <button type="submit" name="login">Login</button>
                </li>
                <li>
                    <h4>Don't have account?<a href="registrasi.php"> Register</a></h4>
                </li>
            </ul>

        <?php 
        if(isset($eror)){
            echo "<p>*Username/password salah</p>";
        }
        ?>
        </form>
    </div>
</body>
</html>