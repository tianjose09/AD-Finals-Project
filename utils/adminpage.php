<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /main.php");
    exit;
}

// Optional role check
if (isset($requiredRole) && $_SESSION['user']['role'] !== $requiredRole) {
    header("Location: /main.php");
    exit;
}

$user = $_SESSION['user'];

// Handle logout
if (isset($_GET['logout']) || (isset($_POST['action']) && $_POST['action'] === 'logout')) {
    session_unset();
    session_destroy();
    header("Location: /main.php");
    exit;
}
