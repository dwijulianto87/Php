<?php
if( isset( $_POST["isSubmit"] ) ){
    if( $_POST["isUsername"] == "admin" && $_POST["isPassword"] == "12345"){

        // redirect
        header("Location: admin.php");
        exit;
    }else{
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Method Post</title>
    <style>
        .container{
            width: 50%;
            margin: 100px auto;
        }
        .red{
            color:red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Masukan username dan password</h3>

        <?php if(isset($error)) :?>
            <p class='red'><strong>username</strong> dan <strong>password</strong> salah !!</p>
        <?php endif ?>
        
        <form action="" method="post">
            <label for="isUsername">Username : </label>
            <input type="text" name="isUsername" id="isUsername">
            <br><br>
            <label for="isPassword">Password : </label>
            <input type="password" name="isPassword" id="isPassword">
            <br><br>
            <button type="submit" name="isSubmit">Login</button>
        </form>
    </div>
</body>
</html>
