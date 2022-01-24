<?php 

require_once 'koneksi.php';

if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
    $result=mysqli_query($conn, "INSERT INTO users VALUES(null, '$username', '$password')");
    if(mysqli_affected_rows($conn)>0){
        header('Location: login.php');
    }
}

?>

<?php require_once 'header.php'; ?>

<div class="register">
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="paswword">
        <br>
        
        <button type="submit" name="register">Register</button>
    </form>
</div>

<?php require_once 'footer.php'; ?>