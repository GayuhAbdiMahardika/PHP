<h3>Keranjang Belanja</h3>

<?php 
    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];

        unset($_SESSION['_'.$id]);
    }

    if(isset($_GET['tambah'])){
        $id = $_GET['tambah'];

        $_SESSION['_'.$id]++;
    }

    if(isset($_GET['kurang'])){
        $id = $_GET['kurang'];

        $_SESSION['_'.$id]--;

        if($_SESSION['_'.$id] == 0){
            unset($_SESSION['_'.$id]);
        }
    }

    if(!isset($_SESSION['pelanggan'])){
        header('location:?f=home&m=login');
    } else {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            isi($id);
            header('location:?f=home&m=beli');
        }else{
            keranjang();
        }
    }


        function isi($id){
            if(isset($_SESSION['_'.$id])){
                $_SESSION['_'.$id]++;
            } else {
                $_SESSION['_'.$id]=1;
            }
        }

        function keranjang(){ 
            global $db;
            $total = 0;
            echo'
            <table class="table table-bordered w-70">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>
            </thead>';

            foreach($_SESSION as $k => $v){
                if($k != 'pelanggan' && $k != 'idpelanggan'){
                    $id = substr($k,1);

                    $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
                    $row=$db->getALL($sql);

                    foreach($row as $r){
                    echo '
                    <tr>
                        <td>'.$r['menu'].'</td>
                        <td>'.$r['harga'].'</td>
                        <td> <a href="?f=home&m=beli&tambah='.$r['idmenu'].'"> [+] </a> &nbsp &nbsp'.$v.'&nbsp &nbsp <a href="?f=home&m=beli&kurang='.$r['idmenu'].'"> [-]</a></td>
                        <td>'.$r['harga']*$v.'</td>
                        <td><a href="?f=home&m=beli&hapus='.$r['idmenu'].'">Hapus</a></td>
                    </tr>';
                    $total = $total+($v*$r['harga']);             
                    }
                }
            }

            echo '<tr>
                <td colspan=4><h3>GRAND TOTAL : </h3></td>
                <td><h3>'.$total.'</h3></td>
                </tr>
            ';
            echo ' 
            </table>';
        }

;
    

?>