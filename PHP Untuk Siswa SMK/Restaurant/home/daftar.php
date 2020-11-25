<h1>Insert Pelanggan </h1>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama pelanggan</label>
            <input type="text" name="pelanggan" id="" class="form-control" required placeholder="nama pelanggan">
        </div>
        </div>
        <div class="form-group w-50">
            <label for="">Alamat</label>
            <input type="text" name="alamat" id="" class="form-control" required placeholder="alamat">
        </div>
        <div class="form-group w-50">
            <label for="">telp</label>
            <input type="text" name="telp" id="" class="form-control" required placeholder="telp">
        </div>
        <div class="form-group w-50">
            <label for="">email</label>
            <input type="email" name="email" id="" class="form-control" required placeholder="email">
        </div>
        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" required placeholder="password">
        </div>
        <div class="form-group w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" id="" class="form-control" required placeholder="password">
        </div>
        <div>
            <input type="submit" value="simpan" class="btn btn-primary" name="simpan">
        </div>
    </form>
</div>

<?php 

    if(isset($_POST['simpan'])){
        $pelanggan = $_POST['pelanggan'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        
        if($password === $konfirmasi){
            $sql = "INSERT INTO tblpelanggan VALUES ('','$pelanggan','$alamat','$telp','$email','$password',1)";
            $db->runSQL($sql);

            header('location:?f=home&m=info');
        } else {
            echo "<h2>Password Tidak Sesuai Konfirmasi</h2>";
        }

    }

?>