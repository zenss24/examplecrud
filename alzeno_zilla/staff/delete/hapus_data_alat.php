<?php

require '../../config/db_connect.php';

$id_alat = $_POST['id_alat'];

$sql_hapus_data = "DELETE FROM alat WHERE id_alat='$id_alat'";
$data_alat = mysqli_query($conn, $sql_hapus_data);


mysqli_close($conn);

header('Location: ../home.php');

?>