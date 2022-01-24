
<?php 

session_start();

if(!isset($_SESSION['username'])){
    header('Location: index');
}

require_once 'koneksi.php';

$row=[];
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $result=mysqli_query($conn, "SELECT * FROM nilai WHERE id=$id");
    $row=mysqli_fetch_assoc($result);
}

if(isset($_POST['edit'])){
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $kelas=$_POST['kelas'];
    $nilai=$_POST['nilai'];
    mysqli_query($conn, "UPDATE nilai SET nama='$nama', kelas='$kelas', nilai=$nilai WHERE id=$id");
    if(mysqli_affected_rows($conn)>0){
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
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="input-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $row['nama'] ?>">
            </div>

            <div class="input-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" value="<?= $row['kelas'] ?>">
            </div>

            <div class="input-group">
                <label for="nilai">Nilai</label>
                <input type="text" name="nilai" id="nilai" value="<?= $row['nilai'] ?>">
            </div>
            <button type="submit" name="edit">Submit</button>
        </form>
    </div>
</body>
</html>