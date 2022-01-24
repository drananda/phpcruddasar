<?php 

session_start();
require_once 'koneksi.php';
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $result=mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){
            $_SESSION['username']=$row['username'];
            header('Location: index.php');
        }else{
            echo '<script>alert("Username atau password salah");</script>';
        }
    }else{
        echo '<script>alert("Username atau password salah");</script>';
    }
}

?>

<?php require_once 'header.php'; ?>

<div class="login">
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="paswword">
        <br>
        
        <button type="submit" name="login">Login</button>
    </form>
</div>

<?php require_once 'footer.php'; ?>