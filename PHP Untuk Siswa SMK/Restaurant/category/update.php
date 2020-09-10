

<?php 
require_once '../function.php';

$sql = "SELECT * FROM tblkategori WHERE idkategori=$id";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);



?>

<form action="" method="post">
    category : 

    <input type="text" name="category" value="<?= $row['kategori']?>">
    <input type="submit" name="submit" value="submit">
</form>

<?php 

if(isset($_POST['submit'])){
    $value = $_POST['category'];
    $sql ="UPDATE tblkategori SET kategori='$value' WHERE idkategori=$id";
    mysqli_query($conn, $sql);
    header("location:http://localhost/sekolah/Temporary/phpsmk/code/Restaurant/category/select.php");
}

?>