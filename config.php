<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'medical_appointment_db');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

function redirectWithMessage($message, $type = 'error', $page = '../Web_Pages/HealthCare.html') {
    header("Location: $page?message=" . urlencode($message) . "&type=" . $type);
    exit();
}

function checkAuth($required_role = null) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (empty($_SESSION['user_id']) || empty($_SESSION['logged_in'])) {
        header("Location: ../Web_Pages/HealthCare.html");
        exit();
    }
    if ($required_role && $_SESSION['user_role'] !== $required_role) {
        header("Location: ../Web_Pages/HealthCare.html");
        exit();
    }
}
?>
