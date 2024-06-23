<?php

require '../../config/db_connect.php';

$id_kalibrasi = $_POST['id_kalibrasi'];

$sql_hapus_aktualisasi = "DELETE FROM aktualisasi WHERE id_kalibrasi='$id_kalibrasi'";
$kalibrasi_alat = mysqli_query($conn, $sql_hapus_aktualisasi);


mysqli_close($conn);

header('Location: ../aktualisasi_kalibrasi.php');

?>