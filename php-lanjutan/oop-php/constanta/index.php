<?php

define("NAMA", "Dwi julianto");
const ANGKA = 10;

class ThisClass{
    public $kelas = __CLASS__;
}

echo ANGKA;
echo '<hr>';
echo NAMA;
echo '<hr>';
echo __FILE__;
echo '<hr>';
echo __LINE__;
echo '<hr>';
$obj = new ThisClass;
echo $obj->kelas;