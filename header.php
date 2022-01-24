<?php require_once 'koneksi.php' ?>
<?php 

if(isset($_POST['tambah'])){
    $nama=$_POST['nama'];
    $kelas=$_POST['kelas'];
    $nilai=$_POST['nilai'];

    $result=mysqli_query($conn, "INSERT INTO nilai VALUES(null, '$nama', '$kelas', $nilai)");
    if(mysqli_affected_rows($conn)){
        header('Location: index.php');
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width: 80%;
            margin: 0 auto;
        }
        table{
            width: 100%;
        }
        table, th, td{
            border: solid 1px black;
        }
        table tr{
            text-align: center;
        }
        .tambah{
            margin: 1em 0;
            display: inline-block;
        }
    </style>
</head>
<body>