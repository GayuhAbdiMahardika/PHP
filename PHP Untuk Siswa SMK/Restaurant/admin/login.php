<?php 
    session_start();
    require_once '../DB_Controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="stylesheet" href="../bs/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
            <h1>Login </h1>
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
</body>
</html>

<?php 
    if(isset($_POST['simpan'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";

        $count = $db->rowCount($sql);

        if($count == 0){
            echo "<center><h3>Email atau password salah<h3></center>";
        } else {
            $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
            $row = $db->getITEM($sql);

            $_SESSION['user'] = $row['email'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['iduser'] = $row['iduser'];

            header("location:index.php");
        }
    }
?>