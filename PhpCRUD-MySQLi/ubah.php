<?php

session_start();
if(!isset($_SESSION['sessionLogin'])){
    header("Location: login.php");
    exit;
}

require"functions.php";

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah pernah ditekan atau belum
if(isset($_POST['submit'])){
    
    if( ubah($_POST) > 0 ) {
        echo " <script>
                    alert('data berhasil dirubah');
                    document.location.href = 'index.php';
                </script>";
    }else{
        echo "<script>
                    alert('data gagal dirubah');
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
</head>
<body>
   <h1>Tambah data mahasiswa</h1>
   <form action="" method="POST" enctype="multipart/form-data">
       <input name= 'id' value= <?= $mhs['id'] ?> type= "hidden">
       <input name= 'gambarLama' value= "<?= $mhs['gambar'] ?>" type= "hidden">
       <ul>
           <li>
               <label for="nrp">NRP :</label>
               <input value= <?= $mhs['nrp'] ?> type="text" name="nrp" id="nrp" required>
           </li>
           <li>
               <label for="nama">NAMA :</label>
               <input value= <?= $mhs['nama'] ?> type="text" name="nama" id="nama" required>
            </li>
           <li>
               <label for="email">EMAIL :</label>
               <input value= <?= $mhs['email'] ?> type="text" name="email" id="email" required>
            </li>
           <li>
               <label for="jurusan">JURUSAN :</label>
               <input value= <?= $mhs['jurusan'] ?> type="text" name="jurusan" id="jurusan" required>
            </li>
           <li>
               <label for="gambar">GAMBAR :</label>
               <img src="img/<?= $mhs['gambar'] ?>" alt=""> <br>  
               <input type="file" name="gambar" id="gambar" required>
           </li>
           <li><button type="submit" name="submit">Ubah Data</button></li>
       </ul>
   </form>
</body>
</html>