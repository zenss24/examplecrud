<?php

require '../../config/db_connect.php';

$id_kalibrasi = $_POST['id_kalibrasi'];
$id_alat = $_POST['id_alat'];
$realisasi = $_POST['realisasi'];
$tgl_berlaku = $_POST['tgl_berlaku'];
$status_alat = $_POST['status_alat'];
$checker = $_POST['checker'];


$sql_edit_aktualisasi = "UPDATE aktualisasi SET id_kalibrasi='$id_kalibrasi', id_alat='$id_alat', realisasi='$realisasi', tgl_berlaku='$tgl_berlaku', status_alat='$status_alat', checker='$checker' WHERE id_alat='$id_alat'";
$edit_aktualisasi_kalibrasi = mysqli_query($conn, $sql_edit_aktualisasi);

mysqli_close($conn);

header('Location: ../aktualisasi_kalibrasi.php');

?>