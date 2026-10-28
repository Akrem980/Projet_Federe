<?php
session_start();
require_once '../config.php';
checkAuth();

$user_id = $_SESSION['user_id'];
$role    = $_SESSION['user_role'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'update_profile') {
        $first_name = mysqli_real_escape_string($conn, trim($_POST['first_name']));
        $last_name  = mysqli_real_escape_string($conn, trim($_POST['last_name']));
        $phone      = mysqli_real_escape_string($conn, trim($_POST['phone']));
        $city       = isset($_POST['city']) ? mysqli_real_escape_string($conn, trim($_POST['city'])) : '';

        // Update users table
        mysqli_query($conn, "UPDATE users SET first_name='$first_name', last_name='$last_name', phone='$phone' WHERE id='$user_id'");

        if ($role === 'patient') {
            mysqli_query($conn, "UPDATE patients SET first_name='$first_name', last_name='$last_name', phone='$phone' WHERE user_id='$user_id'");
        } elseif ($role === 'doctor') {
            $city_upd = $city ? "city='$city'," : "";
            mysqli_query($conn, "UPDATE doctors SET first_name='$first_name', last_name='$last_name', phone='$phone', {$city_upd} user_id=user_id WHERE user_id='$user_id'");
        }

        redirectWithMessage("Profil mis à jour avec succès.", 'success', '../Dashboards/settings.php');

    } elseif ($action === 'update_password') {
        $current  = $_POST['current_password'];
        $new_pw   = $_POST['new_password'];
        $confirm  = $_POST['confirm_password'];

        if ($new_pw !== $confirm) {
            redirectWithMessage("Les nouveaux mots de passe ne correspondent pas.", 'error', '../Dashboards/settings.php');
        }
        if (strlen($new_pw) < 6) {
            redirectWithMessage("Le mot de passe doit comporter au moins 6 caractères.", 'error', '../Dashboards/settings.php');
        }

        $res  = mysqli_query($conn, "SELECT password FROM users WHERE id='$user_id'");
        $user = mysqli_fetch_assoc($res);

        if (!password_verify($current, $user['password'])) {
            redirectWithMessage("Mot de passe actuel incorrect.", 'error', '../Dashboards/settings.php');
        }

        $hashed = password_hash($new_pw, PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE users SET password='$hashed' WHERE id='$user_id'");
        redirectWithMessage("Mot de passe mis à jour avec succès.", 'success', '../Dashboards/settings.php');
    }
}

header("Location: ../Dashboards/settings.php");
exit();
?>
