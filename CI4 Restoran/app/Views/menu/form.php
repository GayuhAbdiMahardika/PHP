<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
<?= view_cell('\App\Controllers\Admin\Menu::option') ?>

</div>

<div class="row">




<h1> Upload Gambar</h1>

<form action="<?= base_url('/Admin/menu/insert')?>" method="post" enctype="multipart/form-data">

    Gambar : <input type="file" name="gambar" required>
    
    <br>
    <input type="submit" name="simpan" value="simpan">

</form>
</div>

<?= $this->endSection() ?>