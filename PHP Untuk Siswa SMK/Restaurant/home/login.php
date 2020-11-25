<div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
            <h1>Login Pelanggan</h1>
                <div class="form-group">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" required placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" required placeholder="password">
                        </div>
                        <div>
                            <input type="submit" value="login" class="btn btn-primary" name="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<?php 
    if(isset($_POST['simpan'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";

        $count = $db->rowCount($sql);

        if($count == 0){
            echo "<center><h3>Email atau password salah<h3></center>";
        } else {
            $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";
            $row = $db->getITEM($sql);

            $_SESSION['pelanggan'] = $row['email'];
            $_SESSION['idpelanggan'] = $row['idpelanggan'];

            header("location:index.php");
        }
    }
?>