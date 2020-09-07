<?php 


session_start();

foreach($_SESSION as $k => $v){
    echo $k.'=>'.$v.'<br>';
}