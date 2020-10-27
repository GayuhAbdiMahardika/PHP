<?php 
$row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC"); 
?>
    
<h1>insert Menu </h1>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">kategori</label> <br>
            <select name="idkategori" id="">
                <?php foreach($row as $r): ?>
                    <option value="<?= $r['idkategori'] ?>"><?= $r['kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group w-50">
            <label for="">Nama menu</label>
            <input type="text" name="menu" id="" class="form-control" required placeholder="isi menu">
        </div>

        <div class="form-group w-50">
            <label for="">Harga</label>
            <input type="text" name="harga" id="" class="form-control" number required placeholder="isi menu">
        </div>

        <div class="form-group w-50">
            <label for="">Gambar</label>
            <input type="file" name="gambar" id="" class="" required placeholder="isi menu">
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
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if(empty($gambar)){
            echo "Gambar Kosong";
        } else {
            $sql = "INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
            // echo $temp;
            // die;
            move_uploaded_file($temp,'../upload/'.$gambar);
            $db->runSQL($sql);
            header('location:?f=menu&m=select');
        }

        

    }

?>