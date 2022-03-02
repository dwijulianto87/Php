<?php

// abstract class minimal memiliki 1 method abstact
// memaksa implemetasi method abstract di kelas turunannya

// class abstact..................................................................
abstract class Produk{
    
    private  $judul, $penulis, $penerbit, $tahun, $harga, $diskon;

    abstract public function infoProduk();
    
    protected function __construct( $jdl, $penulis = "Rano karno", $penerbit = "Ronos film", $thn = 0, $harga = 0){
        $this->judul = $jdl;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->tahun = $thn;
        $this->harga = $harga;
    }

    protected function getInfo(){
        $info = "judul : {$this->judul}, penulis : {$this->penulis}, penerbit : {$this->penerbit}, tahun : {$this->tahun}, harga : {$this->harga}";
        return $info;
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



    public function getDiskon(){
        $this-> harga = ($this-> diskon / 100) * $this -> harga;
        return "diskon : " .$this-> diskon. " = ". $this-> harga ; 
    }
}

class Film extends Produk{
    private $durasi;

    public function __construct($jdl, $penulis, $penerbit, $thn, $harga, $durasi = 0){
        // overriding............................................................
        parent::__construct($jdl, $penulis, $penerbit, $thn, $harga);
            $this -> durasi = $durasi;
    }

    // implementasi method abstact..............................................................
    public function infoProduk(){
        // overriding............................................................
        $info = parent::getInfo(). ", durasi : {$this->durasi}";
        return $info;
    }

    

}

class Buku extends Produk{
    private $halaman;

    public function __construct($jdl, $penulis, $penerbit, $thn, $harga, $halaman = 0){

        // overriding..........................................
        parent::__construct($jdl, $penulis, $penerbit, $thn, $harga);
            $this -> halaman = $halaman;
    }

    // implementasi method abstact..............................................................
    public function infoProduk(){
        // overriding............................................................
        $info = parent::getInfo(). ", halaman : {$this->halaman}";
        return $info;
    }

}



$ikatanCInta = new Film('Ikatan cinta', 'Hanum', 'Rama film', 2004, 500000, 145);
$kancil = new Buku('Kancil', 'Endang', 'Sekawan', 1995, 25000, 200);


echo $kancil->infoProduk();
echo '<br>';
echo '<br>';
echo $ikatanCInta->infoProduk();
echo '<br>';

echo $ikatanCInta->setDiskon(20);

echo '<br>';
echo $ikatanCInta->getDiskon();
echo '<br>';
echo $ikatanCInta->setJudul("aadc");
echo '<br>';
echo $ikatanCInta->getJudul();


