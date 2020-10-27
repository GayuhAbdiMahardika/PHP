

<h3 class="mb-4">Menu</h3>

<div class="mt-4 mb-4">
    <?php 
        if(isset($_GET['id'])){
            $id=$_GET['id'];

            $where = "WHERE idkategori=$id";
            $id="&id=".$id;


        } else {
            $where = '';
            $id="";
        }
    ?>
</div>

<?php 
    $jumlahData = $db->rowCOUNT("SELECT idmenu FROM tblmenu $where");
    $banyak = 3;
    $halaman = ceil($jumlahData / $banyak);

    if(isset($_GET['p'])){
        $mulai = ($_GET['p'] * $banyak) - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $a=1+$mulai;
?>

        <?php if(!empty($row)) :?>
        <?php foreach($row as $r): ?>
            <div class="card" style="width: 15rem; float:left; margin:10px;">
                <img style="height:150px" src="upload/<?= $r['gambar'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $r['menu'] ?></h5>
                    <p class="card-text"><?= $r['harga'] ?></p>
                    <a href="?f=user&m=insert" class="btn btn-primary float-left mr-4">Beli</a>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>



<div style='clear:both;'>
    <?php 
        for($i=1; $i<=$halaman; $i++){
            echo"<a href='?f=home&m=produk&p=$i.$id'>$i</a>";
            echo"&nbsp &nbsp &nbsp";
        }
    ?>
</div>





