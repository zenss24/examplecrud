<?php

function connectToDatabase() {
    $conn = mysqli_connect("localhost", "root", "", "sql_alzeno_if22g");
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
}

// Menggunakan fungsi untuk membuat koneksi
$conn = connectToDatabase();


?>
