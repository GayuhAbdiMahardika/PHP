<?php 

require_once '../function.php';

$sql = "DELETE FROM tblkategori WHERE idkategori = $id";

mysqli_query($conn, $sql);

header("location:http://localhost/sekolah/Temporary/phpsmk/code/Restaurant/category/select.php");

?>