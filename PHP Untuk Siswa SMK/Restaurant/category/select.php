<div style="margin:auto; width:900px;">

<h3> <a href="http://localhost/sekolah/Temporary/phpsmk/code/Restaurant/category/insert.php">Insert Data</a></h3>
<?php 
require_once '../function.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    require_once 'delete.php';
}

if(isset($_GET['update'])){
    $id = $_GET['update'];
    require_once 'update.php';
}



$query = "SELECT idkategori FROM tblkategori";
$result = mysqli_query($conn, $query);

$data_amount = mysqli_num_rows($result);

$amount_per_page = 3;

$pages = ceil($data_amount / $amount_per_page);

for($i=1; $i<=$pages; $i++){
    echo"<a href='?p=$i'>$i</a>";
    echo"&nbsp &nbsp &nbsp";
}
echo '<br><br>';

if(isset($_GET['p'])){
    $start = ($_GET['p'] * $amount_per_page) - $amount_per_page;
} else {
    $start = 0;
}

$query = "SELECT * FROM tblkategori LIMIT $start, $amount_per_page";
$result =  mysqli_query($conn, $query);
//var_dump($result);
$count = mysqli_num_rows($result);
// echo $count;

echo '
    <table border="1px">
    <tr>
        <th>No</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
';
$no = $start+1;
if($count > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>'. 
        '<td>'.$no++.'</td>'.
        '<td>'.$row['kategori'].'</td>'.
        '<td><a href="?delete='.$row['idkategori'].'">Delete</a>  |  <a href="?update='.$row['idkategori'].'">Update</a></td>'.
        '</tr>' 
        ;
    }
}

echo '</table>'
?>
    <!-- Cara saya melooping tabel: -->
    <!-- <?php //$no = 1 ?>
     <table border="1px">
        <tr>
            <th>No</th>
            <th>Category</th>
        </tr>
        <?php //while($row = mysqli_fetch_assoc($result)): ?>
            <tr> 
            <td><?= $no++ ?></td>
            <td><?= $row['tblkategori'] ?> </td>
            </tr> 
        <?php //endwhile ?>
     </table> -->
     <!-- Akhir Cara Saya -->

</div>