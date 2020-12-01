<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>


<h1><?= $judul ?></h1>

<?php foreach($kategori as $k) : ?>
<?= $k['kategori'] ?>
<?= $k['idkategori'] ?>
<?php endforeach ?>


<?= $this->endSection() ?>