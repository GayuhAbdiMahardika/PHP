<?php 
    if(isset($_POST['opsi'])){
        $opsi = $_POST['opsi'];

        $where = "WHERE idkategori=$opsi";
    }else{
        $opsi = 0;

        $where = "";
    }    
?>

<a href="?f=menu&m=insert" class="btn btn-primary float-left mr-4">Tambah</a>
<h3 class="mb-4">Menu</h3>

<div class="mt-4 mb-4">
    <?php $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC"); ?>
    <form action="" method="post">    
        <select name="opsi" id="" onchange="this.form.submit()">
            <?php foreach($row as $r): ?>
                <option <?php if($r['idkategori']==$opsi) echo "selected" ?> value="<?= $r['idkategori'] ?>"><?= $r['kategori'] ?></option>
            <?php endforeach; ?>
        </select>
    </form>
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

<table class="table table-border w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)) :?>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?= $a++ ?></td>
            <td><?= $r['menu'] ?></td>
            <td><?= $r['harga'] ?></td>
            <td> <img width="100px" src="../upload/<?= $r['gambar'] ?>" alt="" srcset=""> </td>
            <td> <a href="?f=menu&m=delete&id=<?= $r['idmenu'] ?>">Delete</a> </td>
            <td> <a href="?f=menu&m=update&id=<?= $r['idmenu'] ?>">Update</a> </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php 
    for($i=1; $i<=$halaman; $i++){
        echo"<a href='?f=menu&m=select&p=$i'>$i</a>";
        echo"&nbsp &nbsp &nbsp";
    }
?>




