<?php


require_once "App/Init.php";

// echo '<br><br>';
// new App\Produk\User();
// new App\Service\User();


// memakai use untuk menyingkat namespace
use App\Produk\User as ProdukUser;
use App\Service\User as ServiceUser;

new ProdukUser();
echo '<br>';
new ServiceUser();
