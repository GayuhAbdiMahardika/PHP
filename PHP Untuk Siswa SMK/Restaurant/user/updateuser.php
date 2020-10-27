<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbluser WHERE iduser=$id";
        $row = $db->getITEM($sql);

    }
?>
<h1>insert user </h1>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama user</label>
            <input type="text" name="user" id="" class="form-control" required value="<?= $row['user'] ?>" >
        </div>
        <div class="form-group w-50">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control" required value="<?= $row['email'] ?>">
        </div>
        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" required value="<?= $row['password'] ?>" >
        </div>
        <div class="form-group w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" id="" class="form-control" required value="<?= $row['password'] ?>" >
        </div>
        <div class="form-group w-50">
            <label for="">Level</label> <br>
            <select name="level" id="">
                <option value="admin" <?php if($row['level'] == 'admin') echo 'selected'?>>admin</option>
                <option value="koki" <?php if($row['level'] == 'koki') echo 'selected'?>>koki</option>
                <option value="kasir" <?php if($row['level'] == 'kasir') echo 'selected'?> >kasir</option>
            </select>
        </div>
        <div>
            <input type="submit" value="simpan" class="btn btn-primary" name="simpan">
        </div>
    </form>
</div>

<?php 

    if(isset($_POST['simpan'])){
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level = $_POST['level'];
        
        if($password === $konfirmasi){
            $sql = "UPDATE tbluser SET user='$user', email='$email', password='$password', level='$level' WHERE iduser=$id";
            $db->runSQL($sql);

            header('location:?f=user&m=select');
        } else {
            echo "<h2>Password Tidak Sesuai Konfirmasi</h2>";
        }

    }

?>