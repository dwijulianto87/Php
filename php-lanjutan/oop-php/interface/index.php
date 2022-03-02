<?php

// interface adalah abstract class yang sama sekali tidak memiliki implementasi...................
// murni hanya template, tidak boleh punya properti, hanya deklarasi method saja...................
// semua method harus dideklarasikan visibility public
// boleh deklarasikan __construct()
// satu class bisa implementasi banyak interface

// interface ..................................................................
interface InfoProduk{
    public function getInfoDetail();
}

interface CetakProduk{
    public function cetakProduk();
}

// abstract class...............................................................
abstract class Produk{
    
    private  $judul, $penulis, $penerbit, $tahun, $harga, $diskon;

    // abstract method.....................................................
    abstract function getInfo();
    
    protected function __construct( $jdl, $penulis = "Rano karno", $penerbit = "Ronos film", $thn = 0, $harga = 0){
        $this->judul = $jdl;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->tahun = $thn;
        $this->harga = $harga;
    }



    // setter dan getter.........................................................
    public function setJudul($judul){
        $this-> judul = $judul;
    }
    public function getJudul(){
        return $this-> judul;
    }

    public function setPenulis($penulis){
        $this-> penulis = $penulis;
    }

    public function getPenulis(){
        return $this-> penulis;
    }
    
    public function setPenerbit($penerbit){
        $this-> penerbit = $penerbit;
    }
    
    public function setTahun($tahun){
        $this-> tahun = $tahun;
    }
    
    public function getTahun(){
        return $this-> tahun;
    }

    public function setHarga($harga){
        $this-> harga = $harga;
    }
    public function getHarga(){
        return $this-> harga;
    }

    public function setDiskon($diskon){
        $this-> diskon = $diskon;
    }

    protected function getData(){
        $data =     "Judul : {$this->judul} <br>
                    Penulis : {$this->penulis} <br>
                    Penerbit : {$this->penerbit} <br>
                    Tahun : {$this->tahun} <br>
                    Harga : {$this->harga} <br>";

        return $data;
    }

    public function getDiskon(){
        $this-> harga = ($this-> diskon / 100) * $this -> harga;
        return "diskon : " .$this-> diskon. "<br>Harga ". $this-> harga ; 
    }
}

class Film extends Produk implements InfoProduk, CetakProduk{
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
    public function getInfoDetail(){
        $infoDetail = $this->getData() . $this->getInfo();
        return $infoDetail;
    }

    public function cetakProduk(){
        echo $this->getInfoDetail();
    }
}




$ikatanCInta = new Film('Ikatan cinta', 'Hanum', 'Rama film', 2004, 500000, 145);
$ikatanCInta->cetakProduk();
$ikatanCInta->setDiskon(25);

echo $ikatanCInta->getDiskon();

