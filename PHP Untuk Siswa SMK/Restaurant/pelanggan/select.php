<?php 
    $jumlahData = $db->rowCOUNT("SELECT idpelanggan FROM tblpelanggan");
    $banyak = 3;
    $halaman = ceil($jumlahData / $banyak);

    if(isset($_GET['p'])){
        $mulai = ($_GET['p'] * $banyak) - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM tblpelanggan ORDER BY pelanggan ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $a=1+$mulai;
?>

<a href="?f=pelanggan&m=insert" class="btn btn-primary float-left mr-4">Tambah</a>

<h3 class="mb-4">pelanggan</h3>

<table class="table table-border w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>pelanggan</th>
            <th>alamat</th>
            <th>telp</th>
            <th>email</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?= $a++ ?></td>
            <td><?= $r['pelanggan'] ?></td>
            <td><?= $r['alamat'] ?></td>
            <td><?= $r['telp'] ?></td>
            <td><?= $r['email'] ?></td>
            <td> <a href="?f=pelanggan&m=delete&id=<?= $r['idpelanggan'] ?>">Delete</a> </td>
            <td> <a href="?f=pelanggan&m=update&id=<?= $r['idpelanggan'] ?>"><?= ($r['aktif']==1) ? 'aktif' : 'tidak aktif'?></a> </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    for($i=1; $i<=$halaman; $i++){
        echo"<a href='?f=pelanggan&m=select&p=$i'>$i</a>";
        echo"&nbsp &nbsp &nbsp";
    }
?>