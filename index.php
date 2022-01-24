
<?php 

session_start();


require_once 'header.php';

$query="SELECT * FROM nilai";

if(isset($_POST['asc'])){
    $query="SELECT * FROM nilai ORDER BY nilai ASC";
}
if(isset($_POST['desc'])){
    $query="SELECT * FROM nilai ORDER BY nilai DESC";
}

$result=mysqli_query($conn, $query);
$rows=[];
while($row=mysqli_fetch_assoc($result)){
    $rows[]=$row;
}

?>

<?php require_once 'header.php' ?>

    <div class="container">
    <?php if(isset($_SESSION['username'])): ?>
    <a href="tambah.php">Tambah data</a>
    <a href="logout.php">Logout</a>
    <?php else: ?>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <?php endif; ?>
    <form action="" method="post">
        <button type="submit" name="asc">Terkecil -> terbesar</button>
        <button type="submit" name="desc">Terbesar -> terkecil</button>
    </form>
        <table cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nilai</th>
                    <?php if(isset($_SESSION['username'])): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['kelas'] ?></td>
                        <td><?= $row['nilai'] ?></td>
                        <?php if(isset($_SESSION['username'])): ?>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                            <!-- <a href="view.php?id=<?= $row['id'] ?>">View</a> -->
                            <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php require_once 'footer.php' ?>