<?php
session_start();

require 'config/db_connect.php';

class Database {
    protected $conn;

    public function __construct() {
        $this->conn = connectToDatabase();
        
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        mysqli_close($this->conn);
    }
}

class Authentication extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function checkLogin() {
        if (isset($_SESSION['login'])) {
            $this->redirect('staff/home.php');
        }

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
            $cek_user = mysqli_query($this->getConnection(), $sql);

            if (mysqli_num_rows($cek_user) > 0) {
                $user = mysqli_fetch_assoc($cek_user);
                $this->handleSuccessfulLogin($user);
            } else {
                $this->handleFailedLogin();
            }
        }
    }

    private function handleSuccessfulLogin($user) {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $user['email'];

        // Check user role and redirect accordingly
        switch ($user['role']) {
            case 'staff':
                $this->redirect('staff/home.php');
                break;
            case 'karyawan':
                $this->redirect('karyawan/home.php');
                break;
            default:
                $this->redirect('staff/home.php');
                break;
        }
    }

    private function handleFailedLogin() {
        echo "
            <script>
                alert('Email atau password salah!');
                window.location.href='login.php';
            </script>
        ";
    }

    private function redirect($location) {
        header("Location: $location");
        exit;
    }
}

$authentication = new Authentication();
$authentication->checkLogin();

?>



<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Management Kalibrasi Alat" />
    <meta name="keywords" content="Management Kalibrasi Maintenance Tools" />
    <meta name="author" content="Final Project" />
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>Login Akun</title>
    <link href="css/login.css" rel="stylesheet" />
</head>

<body id="particles-js"></body>
<div class="animated bounceInDown">
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form method="POST" name="login" class="box" onsubmit="return checkStuff()">
            <h4>Laboratorium Kalibrasi <span>Metaform</span></h4>
            <h5>Silahkan Login terlebih dahulu</h5>
            <input class="form-control" type="text" name="email" id="inputEmail" placeholder="Masukkan Email" />
            <i class="typcn typcn-eye" id="eye"></i>
            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Masukkan Password" />
            <input type="submit" name="login" value="Login" class="btn1">
        </form>
        <a href="register.php" class="dnthave">Belum mempunyai akun? Register</a>
    </div>
</div>
<script src="js/login.js"></script>

</html>