<?php



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