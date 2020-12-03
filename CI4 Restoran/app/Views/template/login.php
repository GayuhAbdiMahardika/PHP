<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css')?>" >
    <title>Login Page</title>
</head>
<body>

<div class="container">

    <div class="row mt-5">
    <div class="col-5 mx-auto">
    <div class="col">
<?php 

    if (!empty($info)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $info;
        echo '</div>';
    }
   
?>
</div>
    <span>
        <h1>Login Admin</h1>
    </span>
    <hr>
<form action="<?= base_url('/Admin/Login')?>" method="post">
<div class="form-group">
<label for="Kategori">Email</label>
 <input type="email" name="email" required class="form-control">
    </div>
    <div class="form-group">
    <label for="Keterangan">Password</label>
     <input type="password" name="password" required class="form-control">
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="login" value="Login">
    </div>

</form>

</div>
    </div>

</div>
    



</body>
</html>

