<?php

require '../../config/db_connect.php';

$id_alat = $_POST['id_alat'];
$nama_alat = $_POST['nama_alat'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO alat (id_alat,nama_alat, jumlah, deskripsi) values('$id_alat','$nama_alat', '$jumlah', '$deskripsi')";
$addtotable = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: ../home.php');

?>