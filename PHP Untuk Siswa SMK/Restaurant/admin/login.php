<?php 

    session_start();
    require_once "../DB_Controller.php";


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
        
            <div class="col-4 mx-auto mt-5">
            
            <div class="form-group">

            <div>
                <h3>Login</h3>
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
    
    </div>
    
</body>
</html>

<?php 

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = hash('sha256',$_POST['password']);
        // $password = $_POST['password'];

        $sql = "SELECT * FROM tbluser WHERE email = '$email' AND password='$password' ";

        $count = $db->rowCOUNT($sql);

        if ($count == 0) {
            echo "<center><h3>Email atau Password Salah</center></h3>";
        }else{
            $sql = "SELECT * FROM tbluser WHERE email = '$email' AND password='$password' ";
            $row=$db->getITEM($sql);
            $_SESSION['user']=$row['email'];
            $_SESSION['level']=$row['level'];
            $_SESSION['iduser']=$row['iduser'];

            header("location:index.php");
        }

        
    }


?>