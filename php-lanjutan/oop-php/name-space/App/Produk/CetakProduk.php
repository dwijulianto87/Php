<?php

class CetakProduk{
    private $produks = [];

    public function print(Produk $item){
        $this->produks[] = $item;
    }

    public function cetak(){
        $str = "<h2>Daftar produk :</h2><ul>";

        foreach( $this->produks as $produk){
            $str .= "<li>{$produk->getInfoDetail()}</li>";
        }
        echo $str."</ul>";
    }

}