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

class cetakInfo{
    // object type ..........................................
    public function cetak( Produk $produk ){
        $str = "{$produk->judul} | {$produk->penerbit}";
        return $str;
    }
}

$film = new Produk('naruto', 'sipuden', 'naruto aja');

$cetakFIlm = new cetakInfo();

echo ($cetakFIlm->cetak($film));

