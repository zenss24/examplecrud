<?php

require '../config/db_connect.php';

$sql = "SELECT * FROM aktualisasi INNER JOIN alat ON aktualisasi.id_alat=alat.id_alat";
$sql_kalibrasi = "SELECT * FROM alat";

$result = mysqli_query($conn, $sql);
$result_kalibrasi = mysqli_query($conn, $sql_kalibrasi);

$data_aktualisasi_kalibrasi = mysqli_fetch_all($result, MYSQLI_ASSOC);

$data_kalibrasi = mysqli_fetch_all($result_kalibrasi, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>