<?php

class SessionManager {
    public function __construct() {
        session_start();
    }

    public function destroySession() {
        session_destroy();
        header('Location: index.php');
    }
}

// Contoh penggunaan:
$sessionManager = new SessionManager();
$sessionManager->destroySession();

?>
