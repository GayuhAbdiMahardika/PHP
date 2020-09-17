<h1>insert kategori </h1>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama Kategori</label>
            <input type="text" name="kategori" id="" class="form-control" required placeholder="isi kategori">
        </div>
        <div>
            <input type="submit" value="simpan" class="btn btn-primary" name="simpan">
        </div>
    </form>
</div>

<?php 

    if(isset($_POST['simpan'])){
        $kategori = $_POST['kategori'];

        $sql = "INSERT INTO tblkategori VALUES ('','$kategori')";
        $db->runSQL($sql);

        header('location:?f=kategori&m=select');
    }

?>