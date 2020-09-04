<?php 

function belajar(){
    echo "Saya Belajar PHP";
}

function luasPersegi($p=5, $l=3){
    echo $p*$l;
}

function luas($p=5, $l=3){
    return $p*$l;
}

function output()
{
    return "Belajar Function";
}

echo luas(100,3)*5;

?>