<?php 

require_once __DIR__ . '/vendor/autoload.php';
require'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// var_dump($mahasiswa); die;

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Daftar mahasiswa</h1>
<table border = "1" cellpadding="10" cellspacing="0">
<tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Nrp</th>
    <th>Email</th>
    <th>Jurusan</th>
</tr>';

$i = 1;
foreach($mahasiswa as $mhs){
    $html .= '<tr>
                <td>'.$i++.'</td>
                <td><img src=img/'.$mhs["gambar"].'></td>
                <td>'.$mhs["nama"].'</td>
                <td>'.$mhs["nrp"].'</td>
                <td>'.$mhs["email"].'</td>
                <td>'.$mhs["jurusan"].'</td>
            </tr>';
}

$html .= '</table> </body></html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);

?>

