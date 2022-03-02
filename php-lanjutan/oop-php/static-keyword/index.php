<?php
// static nilainya tetap(tidak direset)
class ContohStatic{
    public static $angka = 1;

    public static function salam(){
        return "hello world";
    }

    public static function ulang(){
        return "ulang - ". self::$angka++;
    }
}

echo ContohStatic::$angka;
echo '<br>';
echo ContohStatic::salam();
echo '<br>';
echo ContohStatic::ulang();
echo '<br>';
echo ContohStatic::ulang();

echo '<hr>';


$obj = new ContohStatic;
echo $obj->ulang();
echo '<br>';
echo $obj->ulang();
echo '<br>';
echo $obj->ulang();

echo '<hr>';

$obj2 = new ContohStatic;
echo $obj2->ulang();
echo '<br>';
echo $obj2->ulang();
echo '<br>';
echo $obj2->ulang();