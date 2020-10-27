<?php
    session_start();
    require_once 'DB_Controller.php';

    $sql = "SELECT * FROM tblkategori ORDER BY kategori";
    $row=$db->getALL($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran Padika | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="bs/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2> <a href="index.php">Restoran Padika</a> </h2>
            </div>
            <div class="col md-9">
                <div class="float-right mt-3 "> logout</div>
                <div class="float-right mt-3 mr-4"> <a href="admin">login</a></div>
                <div class="float-right mt-3 mr-4">Pelanggan</div>
                <div class="float-right mt-3 mr-4">Daftar</div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3">
                <h3>Kategori</h3>
                <hr>
                <ul class="nav flex-column">
                    <?php if(!empty($row)): ?>
                        <?php foreach($row as $r): ?>
                            <li class="nav-item"><a href="?f=home&m=produk&id=<?= $r['idkategori'] ?>" class="nav-link"><?= $r['kategori'] ?></a></li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>            
            </div>
            <div class="col-md-9">
                <?php 
                    if(isset($_GET['f']) && isset($_GET['m'])){
                        $f=$_GET['f'];
                        $m=$_GET['m'];

                        $file = $f.'/'.$m.'.php';
                        require_once $file;


                    } else {
                        require_once "home/produk.php";
                    }
                ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <p class="text-center">2020 - copyright@smkrevit.com</p>
            </div>
        </div>
    </div>
</body>
</html>