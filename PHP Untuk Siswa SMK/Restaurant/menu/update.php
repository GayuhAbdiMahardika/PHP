<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
    
    $item = $db->getITEM($sql);
}

$row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC"); 
?>
    
<h1>insert Menu </h1>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">kategori</label> <br>
            <select name="idkategori" id="">
                <?php foreach($row as $r): ?>
                    <option <?php if($r['idkategori'] == $item['idkategori']) echo "selected"; ?> value="<?= $r['idkategori'] ?>"><?= $r['kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group w-50">
            <label for="">Nama menu</label>
            <input type="text" name="menu" id="" class="form-control" required value="<?= $item['menu'] ?>">
        </div>

        <div class="form-group w-50">
            <label for="">Harga</label>
            <input type="text" name="harga" id="" class="form-control" number required value="<?= $item['harga'] ?>">
        </div>

        <div class="form-group w-50">
            <label for="">Gambar</label>
            <input type="file" name="gambar" id="" class="" placeholder="isi menu">
        </div>

        <div>
            <input type="submit" value="simpan" class="btn btn-primary" name="simpan">
        </div>
    </form>
</div>

<?php 

    if(isset($_POST['simpan'])){
        
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $item['gambar'];
        //$gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if(!empty($temp)){
            $gambar = $_FILES['gambar']['name'];
            move_uploaded_file($temp,'../upload/'.$gambar);
        }

        $sql = "UPDATE tblmenu SET idkategori=$idkategori, menu='$menu', gambar='$gambar', harga=$harga WHERE idmenu=$id";

        $db->runSQL($sql);
        header('location:?f=menu&m=select');

        

    }

?>