<?php 

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

require_once 'koneksi.php';

$id=$_GET['id'];

mysqli_query($conn, "DELETE FROM nilai WHERE id=$id");

if(mysqli_affected_rows($conn)>0){
    header('Location: index.php');
}

?>