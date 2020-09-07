<form action="" method="post">
    email:
    <input type="email" name="email">
    password:
    <input type="password" name="password">
    <input type="submit" value='login' name="kirim">
</form>

<?php 

if(isset($_POST['kirim'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $email.'<br>'.$password;
}



?>