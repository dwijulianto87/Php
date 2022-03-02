<?php
class Produk{

    // visibility - property = value.........................................
    public  $judul, $penulis, $penerbit, $tahun;

    // constructor...........................................................
    public function __construct( $jdl = "Si doel", $penulis = "Rano karno", $penerbit = "Ronos film", $thn = 0){
        $this->judul = $jdl;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->tahun = $thn;
    }

}

$film = new Produk('naruto', 'sipuden', 'naruto aja');

echo $film->judul;
echo '<br>';
echo $film->tahun = 1999;
echo '<br>';

