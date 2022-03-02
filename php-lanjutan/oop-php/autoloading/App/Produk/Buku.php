<?php


class Buku extends Produk implements InfoProduk, Kategori{
    private $halaman;

    public function __construct($jdl, $penulis, $penerbit, $thn, $harga, $halaman = 0){

        // overriding..........................................
        parent::__construct($jdl, $penulis, $penerbit, $thn, $harga);
            $this -> halaman = $halaman;
    }

    // implementasi method abstact..............................................................
    public function getInfo(){
        return "Halaman : {$this->halaman}<br><br>";
    }

    // implementasi method interface ..............................................................
    public function getKategori(){
        return "Kategori Buku<br>";
    }

    // implementasi method interface ..............................................................
    public function getInfoDetail(){
        return $this->getKategori() . $this->getData() . $this->getInfo();
    }


}