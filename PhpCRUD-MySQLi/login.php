<?php
// star session ................................
session_start();

require "functions.php";

// cek cookie.........................
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $user = mysqli_fetch_assoc($result);

    if($key === hash('sha256', $user['username'])){
        $_SESSION['sessionLogin'] = true;
    }
}


// cek session.........................
if(isset($_SESSION['sessionLogin'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["login"])){
    $username = $_POST['userName'];
    $password = $_POST['password'];
    
    $user = cekUserName($username);
    if($user !== null){
        if(password_verify($password, $user['password'])){

            // set session ..........................
            $_SESSION['sessionLogin'] = true;

            // set cookie ..........................
            if( isset($_POST['remember']) ){
                // buat cookie -> setcookie('key', 'value', waktu);
                // setcookie('cookieLogin', 'true', time() + 60);
                setcookie('id', $user['id'], time() + 60);
                setcookie('key', hash('sha256', $user['username']), time() + 60);

            }
            
            header("Location: index.php");
            exit;
        }
    }
    $error='periksa username dan password anda !';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <p><a href="./registrasi.php">sig up</a></p>
    <?php if(isset($error)):?> 
        <p><?= $error ?></p>
    <?php endif; ?>
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
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember">
            </li>
            <li>
                <button type="submit" name="login">Log in</button>
            </li>
        </ul>
    </form>
</body>
</html>