<div class="row">
        
        <div class="col-4 mx-auto mt-5">
        
        <div class="form-group">

        <div>
            <h3>Login Pelanggan</h3>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email"name="email" required class="form-control">
            </div>

            <div class="form-group">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Password</label>
                <input type="password"name="password" required class="form-control">
            </div>

            <div>
            
                <input type="submit" name="login" value="Login" class="btn btn-primary">
            
            </div>
            </form>

        </div>
        
        </div>
    
    </div>

    <?php 

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = hash('sha256',$_POST['password']);
        // $password = $_POST['password'];

        $sql = "SELECT * FROM tblpelanggan WHERE email = '$email' AND password='$password' AND aktif=1 ";

        $count = $db->rowCount($sql);

        if ($count == 0) {
            echo "<h3>Email atau Password Salah</h3>";
        }else{
            $sql = "SELECT * FROM tblpelanggan WHERE email = '$email' AND password='$password' AND aktif=1 ";
            $row=$db->getITEM($sql);

            $_SESSION['pelanggan']=$row['email'];
            $_SESSION['idpelanggan']=$row['idpelanggan'];

            header("location:index.php");
        }

        
    }


?>