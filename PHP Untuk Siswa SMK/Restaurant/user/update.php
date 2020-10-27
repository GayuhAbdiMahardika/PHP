<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $row = $db->getITEM("SELECT * FROM tbluser WHERE iduser = $id");

    if($row['aktif'] == 1){
        $aktif = 0;
    } else {
        $aktif = 1;
    }

    $sql = "UPDATE tbluser SET aktif=$aktif WHERE iduser=$id";
    var_dump($sql);
    $db->runsql($sql);

    header("location:?f=user&m=select");
}

?>