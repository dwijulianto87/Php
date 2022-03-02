<?php
if( !isset($_GET["isNameDepan"]) ||
    !isset($_GET["isNameBelakang"])){
    // redirect
    header("Location: send-data.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>method get</title>
    <style>
        body{
            padding-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
<!-- /index1.php?isNameDepan=Tyas&isNameBelakang=Arumdani -->
<P>Nama <strong><?= $_GET["isNameDepan"]." ".$_GET["isNameBelakang"]?></strong> diambil dari url browser menggunakan method superglobal get</h1>
<div><a href="./send-data.php">Kembali</a></div>
</body>
</html>