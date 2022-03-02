<?php

require_once "App/Init.php";

$ikatanCInta = new Film('Ikatan cinta', 'Hanum', 'Rama film', 2004, 500000, 145);
$matematika = new Buku('Matematika', 'Tejo', 'Erlangga', 2000, 20000, 100);


$cetak = new CetakProduk();
$cetak->print($ikatanCInta);
$cetak->print($matematika);

$cetak->cetak();
