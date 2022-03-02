<?php
session_start();
// cek session.........................
if(isset($_SESSION['sessionLogin'])){
    header("Location: index.php");
    exit;
}


require "functions.php";
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo " <script>
                    alert('user baru berhasil ditambah ');
                    document.location.href = 'login.php';
            </script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="userName">User Name</label>
                <input type="text" name="userName" id="userName">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Sig up</button>
            </li>
        </ul>
        
    <p><a href="./login.php">sig in</a></p>
    </form>

</body>
</html>