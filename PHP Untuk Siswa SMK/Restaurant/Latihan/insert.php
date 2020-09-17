<form action="" method="post">
    Category :
    <input type="text" name="category" id="">
    <input type="submit" name="submit" value="save">
</form>

<?php 

require_once '../function.php';

if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $sql =  "INSERT INTO tblkategori VALUES ('','$category')";
    mysqli_query($conn, $sql);
    header("location:http://localhost/sekolah/Temporary/phpsmk/code/Restaurant/category/select.php");
}

?>