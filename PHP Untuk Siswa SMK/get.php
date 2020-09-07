<form action="" method="get">
    email:
    <input type="text" name="nama">
    password:
    <input type="text" name="alamat">
    <input type="submit" value='simpan' name="kirim">
</form>

<?php 

if(isset($_GET['kirim'])){
    $nama = $_GET['email'];
    $alamat = $_GET['alamat'];

    echo $nama.'<br>'.$alamat;
}



?>