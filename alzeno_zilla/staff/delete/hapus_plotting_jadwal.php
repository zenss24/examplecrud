<?php

require '../../config/db_connect.php';

$id_jadwal = $_POST['id_jadwal'];

$sql_hapus_jadwal = "DELETE FROM plot_jadwal WHERE id_jadwal='$id_jadwal'";
$plotting_alat = mysqli_query($conn, $sql_hapus_jadwal);


mysqli_close($conn);

header('Location: ../plotting_jadwal.php');

?>