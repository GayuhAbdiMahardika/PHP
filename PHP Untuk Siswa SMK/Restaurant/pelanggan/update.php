<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $row = $db->getITEM("SELECT * FROM tblpelanggan WHERE idpelanggan = $id");

    if($row['aktif'] == 1){
        $aktif = 0;
    } else {
        $aktif = 1;
    }

    $sql = "UPDATE tblpelanggan SET aktif=$aktif WHERE idpelanggan=$id";
    var_dump($sql);
    $db->runsql($sql);

    header("location:?f=pelanggan&m=select");
}

?>