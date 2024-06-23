<?php

require '../../config/db_connect.php';

$id_jadwal = $_POST['id_jadwal'];
$id_alat = $_POST['id_alat'];
$expired_kalibrasi = $_POST['expired_kalibrasi'];
$jadwal_baru = $_POST['jadwal_baru'];

$sql_edit_plot = "UPDATE plot_jadwal SET id_alat='$id_alat', expired_kalibrasi='$expired_kalibrasi',jadwal_baru='$jadwal_baru' WHERE id_alat='$id_alat'";
$edit_plotting_jadwal = mysqli_query($conn, $sql_edit_plot);

mysqli_close($conn);

header('Location: ../plotting_jadwal.php');

?>