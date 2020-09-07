<?php 
setcookie('user', 'dika');

setcookie('user', 'padika');

echo $_COOKIE['user'];

setcookie('user','',time()-3600);

echo '<br>';

var_dump($_COOKIE);