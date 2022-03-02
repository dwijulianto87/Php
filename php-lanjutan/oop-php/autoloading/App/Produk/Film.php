<?php

class Film extends Produk implements InfoProduk, Kategori{
    private $durasi;

    public function __construct($jdl, $penulis, $penerbit, $thn, $harga, $durasi = 0){
        // overriding............................................................
        parent::__construct($jdl, $penulis, $penerbit, $thn, $harga);
            $this -> durasi = $durasi;
    }

    // implementasi method abstact..............................................................
    public function getInfo(){
        return "durasi : {$this->durasi}<br><br>";
    }
    
    // implementasi method interface ..............................................................
    public function getKategori(){
        return "Kategori Film<br>";
     }

    // implementasi method interface ..............................................................
    public function getInfoDetail(){
        return $this->getKategori() . $this->getData() . $this->getInfo();
    }

}