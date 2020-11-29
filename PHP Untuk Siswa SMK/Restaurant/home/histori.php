<?php
    $email = $_SESSION['pelanggan'];
    $jumlahData = $db->rowCOUNT("SELECT idorder FROM vorder WHERE email = '$email'");
    $banyak = 3;
    $halaman = ceil($jumlahData / $banyak);

    if(isset($_GET['p'])){
        $mulai = ($_GET['p'] * $banyak)  - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM vorder WHERE email = '$email' ORDER BY tglorder DESC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $a=1+$mulai;
?>

<h3 class="mb-4">Histori Pembelian</h3>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)) :?>
            <?php foreach($row as $r): ?>
            <tr>
                <td><?= $a++ ?></td>
                <td><?= $r['tglorder'] ?></td>
                <td><?= $r['total'] ?></td>
                <td><a href="?f=home&m=detail&id=<?= $r['idorder'] ?>">Detail</a> </td>
            <?php endforeach; ?>
        <?php endif?>
    </tbody>
</table>

<?php 
    for($i=1; $i<=$halaman; $i++){
        echo"<a href='?f=home&m=histori&p=$i'>$i</a>";
        echo"&nbsp &nbsp &nbsp";
    }
?>




