<?php

sleep(1);
require"functions.php";

$mahasiswa = cari($_GET['keyword']);
?>

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
<?php if($mahasiswa != 0) : ?>
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