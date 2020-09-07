<nav>
    <ul>
        <li><a href="?menu=isi">isi</a></li>
        <li><a href="?menu=hapus">hapus</a></li>
        <li><a href="?menu=destroy">destroy</a></li>
    </ul>
</nav>

<?php 
session_start();

echo $_GET['menu'].'<br>';

var_dump($_SESSION);

if(isset($_GET['menu'])){
    switch($_GET['menu']){
        case 'isi':
            isi_session();
            break;
        case 'hapus':
            unset($_SESSION['user']);
            break;
        case 'destroy':
            session_destroy();
            break;
    }
}


function isi_session(){
    $_SESSION['user'] = 'Padika';
    $_SESSION['nama'] = 'Dika';
    $_SESSION['alamat'] = 'Sidoarjo';
}

?>