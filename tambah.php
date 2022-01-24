<?php 

session_start();

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

?>

<?php require_once 'header.php' ?>

<div class="container">
    <form action="" method="post">
        <div class="input-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>

        <div class="input-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas">
        </div>

        <div class="input-group">
            <label for="nilai">Nilai</label>
            <input type="text" name="nilai" id="nilai">
        </div>
        <button type="submit" name="tambah">Submit</button>
    </form>
</div>

<?php require_once 'footer.php' ?>