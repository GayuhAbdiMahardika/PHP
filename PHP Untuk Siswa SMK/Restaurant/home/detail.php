<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $jumlahData = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail WHERE idorder = $id");
    $banyak = 3;
    $halaman = ceil($jumlahData / $banyak);

    if(isset($_GET['p'])){
        $mulai = ($_GET['p'] * $banyak)  - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM vorderdetail WHERE idorder = $id ORDER BY idorderdetail ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $a=1+$mulai;
?>

<h3 class="mb-4">Histori Pembelian</h3>

<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)) :?>
            <?php foreach($row as $r): ?>
            <tr>
                <td><?= $a++ ?></td>
                <td><?= $r['tglorder'] ?></td>
                <td><?= $r['menu'] ?></td>
                <td><?= $r['harga'] ?></td>
                <td><?= $r['jumlah'] ?></td>
                <?php endforeach; ?>
        <?php endif?>
    </tbody>
</table>

<?php 
    for($i=1; $i<=$halaman; $i++){
        echo"<a href='?f=home&m=detail&id=".$r['idorder']."&p=$i'>$i</a>";
        echo"&nbsp &nbsp &nbsp";
    }
?>




