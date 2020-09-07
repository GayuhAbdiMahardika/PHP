<form action="" method="post" enctype="multipart/form-data">

    Pilih file gambar :
    <input type="file" name="upload">
    <input type="submit" name="kirim" value="simpan">

</form>

<?php 

    if(isset($_POST['kirim'])){
        // foreach($_FILES['upload'] as $k => $v){
        //     echo $k.'=>'.$v.'<br>';
        // }

        $name = $_FILES['upload']['name'];
        $temp = $_FILES['upload']['tmp_name'];

        move_uploaded_file($temp,'gambar/'.$name);
    }



?>