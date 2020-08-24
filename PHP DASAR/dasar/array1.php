<?php

$buah = ['mangga','jeruk',500,'apel',300,2.5];

var_dump($buah);

echo "<br>";

echo $buah[4];

foreach($buah as $key => $value){
    echo $key . "=>" . $value;
    echo "<br>";
}

//Associative Array

$harga = ['mangga'=>300, 'apel'=>200, 'jeruk'=>100];

$var_dump($harga);

echo '<br>';

foreach($harga as $key => $value){
    echo $key." harganya ".$value.'<br>';
}

echo $harga['mangga']."<br>";
$isi = array_keys($harga);
var_dump($isi);
echo'<br>';
echo $sisi[0];