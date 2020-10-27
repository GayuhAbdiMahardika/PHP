<?php 
    $jumlahData = $db->rowCOUNT("SELECT iduser FROM tbluser");
    $banyak = 3;
    $halaman = ceil($jumlahData / $banyak);

    if(isset($_GET['p'])){
        $mulai = ($_GET['p'] * $banyak) - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $a=1+$mulai;
?>

<a href="?f=user&m=insert" class="btn btn-primary float-left mr-4">Tambah</a>

<h3 class="mb-4">user</h3>

<table class="table table-border w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>user</th>
            <th>email</th>
            <th>level</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?= $a++ ?></td>
            <td><?= $r['user'] ?></td>
            <td><?= $r['email'] ?></td>
            <td><?= $r['level'] ?></td>
            <td> <a href="?f=user&m=delete&id=<?= $r['iduser'] ?>">Delete</a> </td>
            <td> <a href="?f=user&m=update&id=<?= $r['iduser'] ?>"><?= ($r['aktif']==1) ? 'aktif' : 'Banned'?></a> </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    for($i=1; $i<=$halaman; $i++){
        echo"<a href='?f=user&m=select&p=$i'>$i</a>";
        echo"&nbsp &nbsp &nbsp";
    }
?>




