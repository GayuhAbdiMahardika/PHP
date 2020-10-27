<?php 
    $jumlahData = $db->rowCOUNT("SELECT idkategori FROM tblkategori");
    $banyak = 3;
    $halaman = ceil($jumlahData / $banyak);

    if(isset($_GET['p'])){
        $mulai = ($_GET['p'] * $banyak) - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $a=1+$mulai;
?>

<a href="?f=kategori&m=insert" class="btn btn-primary float-left mr-4">Tambah</a>

<h3 class="mb-4">Kategori</h3>

<table class="table table-border w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)) :?>
            <?php foreach($row as $r): ?>
            <tr>
                <td><?= $a++ ?></td>
                <td><?= $r['kategori'] ?></td>
                <td> <a href="?f=kategori&m=delete&id=<?= $r['idkategori'] ?>">Delete</a> </td>
                <td> <a href="?f=kategori&m=update&id=<?= $r['idkategori'] ?>">Update</a> </td>
            </tr>
            <?php endforeach; ?>
        <?php endif?>
    </tbody>
</table>

<?php 
    for($i=1; $i<=$halaman; $i++){
        echo"<a href='?f=kategori&m=select&p=$i'>$i</a>";
        echo"&nbsp &nbsp &nbsp";
    }
?>




