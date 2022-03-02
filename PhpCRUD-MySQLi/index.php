<?php

session_start();
if(!isset($_SESSION['sessionLogin'])){
    header("Location: login.php");
    exit;
}



require"functions.php";

$mahasiswa =[];
// cek apakah tombol submit sudah pernah ditekan atau belum
if(isset($_POST['cari'])){
    if(cari($_POST['keyword']) > 0){
        $mahasiswa = cari($_POST['keyword']);
    }else{
        $mahasiswa = [];
    }
}else{
    $halamanAktiv = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

    // seluruh item
    $jmlDataPerHalaman = 4;
    $jmlData = count(query("SELECT * FROM mahasiswa"));
    $jmlHalaman = floor($jmlData / $jmlDataPerHalaman);
    $sisaBagi = $jmlData % $jmlDataPerHalaman;
    $jmlHalaman = ($sisaBagi > 0) ? $jmlHalaman + 1 : $jmlHalaman;
    
    $awalDataPerHalaman = $halamanAktiv * $jmlDataPerHalaman - $jmlDataPerHalaman;

    // hal 1 mulai 0          1 x 4 - 4 = 0
    // hal 2 mulai 4          2 x 4 - 4 = 4
    // hal 3 mulai 8          3 x 4 - 4 = 8
    // hal 4 mulai 12         4 x 4 - 4 = 12

    // SELECT * FROM mahasiswa LIMIT awalData, $jmlDataPerHalaman
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalDataPerHalaman, $jmlDataPerHalaman");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data base</title>
    <style>
        table{
            margin: auto;
        }
        .aktiv{
            font-weight: bold;
            font-size: 1.1em;
        }
        .img-loading{
            width: 30px;
            height: 30px;
            position: relative;
            top: 10px;
            /* left: -5px; */
            z-index: -1;
            display: none;
        }
    </style>
</head>
<body>
    <br>
    <a name="logout" href="logout.php">logout</a>
    <br><br>
    <a href="cetak.php" target="blank">Cetak</a>
    <h1>Daftar mahasiswa</h1>
    <form action="" method="POST" name='form'>
        <input id="keyword" type="text" name="keyword" placeholder="cari.." required>
        <img id="img-loading" class="img-loading" src="img/loading.gif">
        <button id="tombol-keyword" type="submit" name="cari" hidden> Cari</button>
    </form>
    <br><br>
        <a href="tambah.php">Tambah data mahasiswa</a>
        <br><br>
        <?php if(!isset($_POST['keyword'])) : ?>
        <?php if($halamanAktiv > 1) : ?>
            <a href="?halaman=<?= $halamanAktiv -1?>">&laquo;</a>
        <?php endif; ?>


        <?php for($i = 1; $i <= $jmlHalaman; $i++) :?>
            <?php if($i == $halamanAktiv) : ?>
                <a class="aktiv" href="?halaman=<?=$i?>"> <?= $i?> </a>   
            <?php else :?>
                <a href="?halaman=<?=$i?>"> <?= $i?> </a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if($halamanAktiv < $jmlHalaman) : ?>
            <a href="?halaman=<?= $halamanAktiv +1?>">&raquo;</a>
            <?php endif; ?>
        <?php endif; ?>

        <br><br>

<div id="container">
    <table border = "1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Nrp</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = (isset($awalDataPerHalaman)) ? $awalDataPerHalaman : 1 ?>
        <?php if(count($mahasiswa)) : ?>
        <?php foreach($mahasiswa as $mhs) :?>
            <?php $i++; ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a  href="ubah.php?id= <?= $mhs['id'] ?>">Ubah</a> <strong>|</strong>
                <a onclick= "return confirm('Yakin ?')" href="hapus.php?id=<?= $mhs['id'] ?>&nama=<?= $mhs['nama'] ?>">Hapus</a>
            </td>
            <td><img src="img/<?= $mhs['gambar']; ?>" alt=""></td>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['nrp']; ?></td>
            <td><?= $mhs['email']; ?></td>
            <td><?= $mhs['jurusan']; ?></td>
        </tr>
        <?php endforeach ?>
        <?php endif; ?>
    </table>
</div>

    <br><br>
    
<script src="js/script.js"></script>
</body>
</html>