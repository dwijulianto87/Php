<?php

// require_once "Produk/Produk.php";
// require_once "Produk/InfoProduk.php";
// require_once "Produk/CetakProduk.php";
// require_once "Produk/Kategori.php";
// require_once "Produk/Film.php";
// require_once "Produk/Buku.php";


// autoloading -> memanggil file/class tanpa require
spl_autoload_register(function( $class ){
    // require_once 'Produk/'. $class . '.php';
    require_once __DIR__ .'/Produk/'. $class . '.php';
});