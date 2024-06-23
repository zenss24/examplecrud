<?php

require '../../config/db_connect.php';

$id_kalibrasi = $_POST['id_kalibrasi'];
$id_alat = $_POST['id_alat'];
$realisasi = $_POST['realisasi'];
$tgl_berlaku = $_POST['tgl_berlaku'];
$status_alat = $_POST['status_alat'];
$checker = $_POST['checker'];


$sql = "INSERT INTO aktualisasi (id_kalibrasi, id_alat, realisasi, tgl_berlaku, status_alat, checker) values('$id_kalibrasi','$id_alat','$realisasi','$tgl_berlaku','$status_alat','$checker')";
$addtotable = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: ../aktualisasi_kalibrasi.php');

?>