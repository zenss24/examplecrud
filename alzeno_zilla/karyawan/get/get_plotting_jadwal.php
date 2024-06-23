<?php

require '../config/db_connect.php';

$sql = "SELECT * FROM plot_jadwal INNER JOIN alat ON plot_jadwal.id_alat=alat.id_alat";
//$sql = "SELECT * FROM plot_jadwal WHERE 'nama_alat'=$nama_alat";

$sql_plot = "SELECT * FROM alat";

$result = mysqli_query($conn, $sql);
$result_alat = mysqli_query($conn, $sql_plot);

$data_plotting_jadwal = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data_plotting_alat = mysqli_fetch_all($result_alat, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>