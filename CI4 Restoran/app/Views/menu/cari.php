<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php 

    if (isset($_GET['page'])) {
       $page = $_GET['page'];
       $jumlah = 3;

       $no = ($jumlah * $page) - $jumlah+1;
    }else{
        $no = 1;
    }

?>

<div class="row">

<div class="col-4">
<a class="btn btn-primary" href="<?= base_url('/Admin/menu/create') ?>" role="button">Tambah Data</a>

</div>

<div class="col">

<h3> <?= $judul;?></h3>
</div>


</div>

<div class="row mt-2">

    <div class="col-4">
    
        <form action="<?= base_url('/Admin/menu/read')?>" method="get">
            <?= view_cell('\App\Controllers\Admin\Menu::option') ?>
        
        </form>
    
    </div>

</div>

<div class="row mt-2">

<div class="col">

<table class="table">

<tr>
    <th>No</th>
    <th>menu</th>
    <th>Foto</th>
    <th>Harga</th>
    <th>Aksi</th>
  
</tr>
<?php $no ?>
<?php foreach($menu as $key => $value): ?>
<tr>

    <td><?= $no++ ?></td>
    <td><?= $value['menu'] ?></td>
    <td><img style="width:70px;"src="<?=base_url('/upload/'. $value['gambar'].''); ?>" alt=""></td>
    <td><?= number_format($value['harga'])  ?></td>
    <td><a href="<?= base_url()?>/Admin/menu/delete/<?= $value['idmenu']?>"><img src="<?=base_url('/icon/can.svg')?>"></a>
    <a href="<?= base_url()?>/Admin/menu/find/<?= $value['idmenu']?>"><img src="<?=base_url('/icon/pen.svg')?>"></a></td>

</tr>
<?php endforeach; ?>

</table>

<?= $pager->makeLinks(1, $tampil, $total, 'bootstrap') ?>

</div>

</div>

<?= $this->endSection() ?>