<?php 

if(isset($_GET['total'])){
    $total = $_GET['total'];
    $idorder = idorder();
    $idpelanggan= $_SESSION['idpelanggan'];
    $tgl = date('Y-m-d');

    $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";

    $count = $db->rowCount($sql);
    
    if($count==0){
        insertOrder($idorder,$idpelanggan,$tgl,$total);
        insertOrderDetail($idorder);
    } else {
        insertOrderDetail($idorder);
    }

    kosongkanSession();
    header("location:?f=home&m=checkout");
} else {
    info();
}

function idorder(){
    global $db;

    $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";

    $jumlah = $db->rowCount($sql);

    if($jumlah == 0){
        $id = 1;
    } else{
        $item = $db->getITEM($sql);
        $id = $item['idorder']+1;
    }

    return $id;

}

function insertOrder($idorder, $idpelanggan, $tgl, $total){
    global $db;

    $sql = "INSERT INTO tblorder VALUES ($idorder,$idpelanggan,$tgl,$total,0,0,0)";
    $db->runSQL($sql);
}

function insertOrderDetail($idorder){
    global $db;
    
    foreach($_SESSION as $k => $v){
        if($k != 'pelanggan' && $k != 'idpelanggan'){
            $id = substr($k,1);

            $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
            $row = $db->getALL($sql);

            foreach ($row as $r){
                $idmenu = $r['idmenu'];
                $harga = $r['harga'];
                $sql = "INSERT INTO tblorderdetail VALUES ('',$idorder,$idmenu,$v,$harga)";
                $db->runSQL($sql);
            }
        }
    }      

}

function kosongkanSession(){
    foreach($_SESSION as $k => $v){
        if($k != 'pelanggan' && $k != 'idpelanggan'){
            $id = substr($k,1);

            unset($_SESSION['_'.$id]);
        }
    }
}

function info(){
    echo "<h4> Terimakasih Telah Berbelanja </h4>";
}


?>