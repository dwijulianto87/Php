<?php
class Produk{

// visibility - property = value
    public $judul = "Si doel";
    public $penulis = "Rano karno";
    public $penerbit = "Ronos film";
    public $tahun = 0;


// method
public function salam(){
    return 'Film dengan judul ' .$this -> judul . ', penulis '.$this -> penulis . ', penerbit '.$this->penerbit;
}
}

$film = new Produk();

echo $film->judul;
echo '<br>';
echo $film->tahun = 1999;
echo '<br>';
echo $film->salam();

