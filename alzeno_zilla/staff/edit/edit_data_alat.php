<?php

require '../../config/db_connect.php';

$id_alat = $_POST['id_alat'];
$nama_alat = $_POST['nama_alat'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];

$sql_edit = "UPDATE alat SET id_alat='$id_alat', nama_alat='$nama_alat', jumlah='$jumlah' ,deskripsi='$deskripsi' WHERE id_alat='$id_alat'";
$edit_data_alat = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: ../home.php');

?>