<?php
session_start();

require './config/db_connect.php';

class UserRegistration
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function registerUser($nama, $email, $password)
    {
        $role = 'karyawan';

        $usedEmail = mysqli_query($this->conn, "SELECT email FROM login WHERE email = '$email'");
        if (mysqli_num_rows($usedEmail) > 0) {
            $_SESSION['registration_message'] = "Email sudah digunakan";
            header('Location: registration.php'); // Redirect to registration page on error
            die;
        }

        // $password = password_hash($password, PASSWORD_DEFAULT);

        $users = mysqli_query($this->conn, "INSERT INTO login (nama,email, password,role) VALUES
                            ('$nama','$email','$password','$role')");

        $getUserData = mysqli_query($this->conn, "SELECT nama, role FROM login WHERE email = '$email'");

        $sessionData = mysqli_fetch_assoc($getUserData);

        $_SESSION['nama'] = $sessionData['nama'];
        $_SESSION['role'] = $sessionData['role'];
        $_SESSION['registration_message'] = "Registrasi berhasil!";

        // Add a JavaScript script for the pop-up message
        echo '<script>';
        echo 'alert("Registrasi berhasil !!! Sekarang Anda sudah bisa mengakses Management Laboratorium Kalibrasi !! Silahkan Login untuk melanjutkan");';
        echo 'window.location.href = "login.php";'; // Redirect to login page after displaying the pop-up message
        echo '</script>';
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRegistration = new UserRegistration($conn);
    $userRegistration->registerUser($nama, $email, $password);
}
?>
