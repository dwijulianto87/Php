<?php

session_start();
if(!isset($_SESSION['sessionLogin'])){
    header("Location: login.php");
    exit;
}

require"functions.php";

// cek apakah tombol submit sudah pernah ditekan atau belum

if(isset($_POST['submit'])){
    // var_dump($_FILES['gambar']['name']); die;

    if( insert($_POST) > 0 ) {
        echo "<script>
                alert('data berhasil ditambah');
                document.location.href = 'index.php';
            </script>";
    }else{
        echo "<script>
                alert('data gagal ditambah');
                document.location.href = 'index.php';
            </script>";
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
    <style>
        .img{
            border: 2px solid black;
        }
    </style>
</head>
<body>
   <h1>Tambah data mahasiswa</h1>
   <form action="" method="POST" enctype="multipart/form-data">
       <ul>
           <li>
               <label for="nrp">NRP :</label>
               <input type="text" name="nrp" id="nrp" required>
           </li>
           <br>
           <li>
               <label for="nama">NAMA :</label>
               <input type="text" name="nama" id="nama" required>
            </li>
            <br>
           <li>
               <label for="email">EMAIL :</label>
               <input type="text" name="email" id="email" required>
            </li>
            <br>
           <li>
               <label for="jurusan">JURUSAN :</label>
               <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <br>
            <li>
               <label for="gambar">GAMBAR :</label>
               <img src="" alt=""> <br>  
               <input type="file" name="gambar" id="gambar" required>
           </li>
           <br>
           <li><button type="submit" name="submit">Tambah Data</button></li>
       </ul>
   </form>
</body>
</html>