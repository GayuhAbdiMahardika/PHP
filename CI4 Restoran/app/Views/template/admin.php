<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran CI4</title>
</head>
<body>
    
<nav>
    <ul>
        <li>  <a href="<?=base_url() ?>/admin/kategori">Select</a> </li>
        <li>  <a href="<?=base_url() ?>/admin/kategori/form">Insert</a> </li>
        <li>  <a href="<?=base_url() ?>/admin/kategori/update/5">Update</a> </li>
    </ul>
</nav>

<?= $this->renderSection('content') ?>

</body>
</html>