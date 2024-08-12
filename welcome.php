<!-- welcome.php -->
<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

echo "Login Successful! Welcome, " . $_SESSION['user'];
?>
