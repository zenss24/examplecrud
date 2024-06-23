<?php

require '../../config/db_connect.php';

// $id_jadwal = $_POST['id_jadwal'];
$id_alat = $_POST['id_alat'];
$expired_kalibrasi = $_POST['expired_kalibrasi'];
$jadwal_baru = $_POST['jadwal_baru'];

$sql = "INSERT INTO plot_jadwal(id_alat, expired_kalibrasi, jadwal_baru) values('$id_alat','$expired_kalibrasi','$jadwal_baru')";
$addtotable = mysqli_query($conn, $sql);

// $sql_cek_stok = "SELECT * FROM plot_jadwal WHERE nama_alat='$nama'";
// $cek_stok = mysqli_query($conn, $sql_cek_stok);
// $data_stok = mysqli_fetch_array($cek_stok);

//$sql_update_stok = "UPDATE plot_jadwal WHERE id_jadwal='$id_jadwal'";

mysqli_close($conn);

header('Location: ../plotting_jadwal.php');

?>