<?php
session_start();
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName = isset($_POST['firstName']) ? trim(mysqli_real_escape_string($conn, $_POST['firstName'])) : '';
    $lastName  = isset($_POST['lastName'])  ? trim(mysqli_real_escape_string($conn, $_POST['lastName']))  : '';
    $email     = isset($_POST['email'])     ? trim(mysqli_real_escape_string($conn, $_POST['email']))     : '';
    $phone     = isset($_POST['phone'])     ? trim(mysqli_real_escape_string($conn, $_POST['phone']))     : '';
    $password  = isset($_POST['password'])  ? $_POST['password'] : '';
    $confirm   = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
    $role      = isset($_POST['role'])      ? trim(mysqli_real_escape_string($conn, $_POST['role']))      : '';
    $city      = isset($_POST['city'])      ? trim(mysqli_real_escape_string($conn, $_POST['city']))      : '';
    $specialty = isset($_POST['specialty']) ? trim(mysqli_real_escape_string($conn, $_POST['specialty'])) : '';

    if (!$firstName || !$lastName || !$email || !$phone || !$password || !$confirm || !$role) {
        redirectWithMessage("Veuillez remplir tous les champs obligatoires.", 'error', '../Web_Pages/register.html');
    }

    if ($password !== $confirm) {
        redirectWithMessage("Les mots de passe ne correspondent pas.", 'error', '../Web_Pages/register.html');
    }

    if (strlen($password) < 6) {
        redirectWithMessage("Le mot de passe doit comporter au moins 6 caractères.", 'error', '../Web_Pages/register.html');
    }

    $valid_roles = ['admin', 'doctor', 'patient'];
    if (!in_array($role, $valid_roles)) {
        redirectWithMessage("Rôle invalide.", 'error', '../Web_Pages/register.html');
    }

    if ($role === 'doctor' && (!$city || !$specialty)) {
        redirectWithMessage("La ville et la spécialité sont requises pour les médecins.", 'error', '../Web_Pages/register.html');
    }

    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        redirectWithMessage("Cet email est déjà utilisé.", 'error', '../Web_Pages/register.html');
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, email, phone, password, role, is_active, created_at)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$hashed', '$role', 1, NOW())";

    if (!mysqli_query($conn, $sql)) {
        redirectWithMessage("Erreur lors de la création du compte: " . mysqli_error($conn), 'error', '../Web_Pages/register.html');
    }

    $user_id = mysqli_insert_id($conn);

    if ($role === 'patient') {
        $ins = "INSERT INTO patients (user_id, first_name, last_name, email, phone)
                VALUES ('$user_id', '$firstName', '$lastName', '$email', '$phone')";
        if (!mysqli_query($conn, $ins)) {
            redirectWithMessage("Erreur patient: " . mysqli_error($conn), 'error', '../Web_Pages/register.html');
        }
    } elseif ($role === 'doctor') {
        // Get specialty id
        $spec_clean = mysqli_real_escape_string($conn, $specialty);
        $spec_res = mysqli_query($conn, "SELECT id FROM specialties WHERE name='$spec_clean'");
        if (mysqli_num_rows($spec_res) == 0) {
            // Insert specialty if not exists
            mysqli_query($conn, "INSERT INTO specialties (name) VALUES ('$spec_clean')");
            $specialty_id = mysqli_insert_id($conn);
        } else {
            $spec_row = mysqli_fetch_assoc($spec_res);
            $specialty_id = $spec_row['id'];
        }
        $city_esc = mysqli_real_escape_string($conn, $city);
        $ins = "INSERT INTO doctors (user_id, first_name, last_name, phone, city, specialty_id)
                VALUES ('$user_id', '$firstName', '$lastName', '$phone', '$city_esc', '$specialty_id')";
        if (!mysqli_query($conn, $ins)) {
            redirectWithMessage("Erreur médecin: " . mysqli_error($conn), 'error', '../Web_Pages/register.html');
        }
    }

    $_SESSION['user_id']    = $user_id;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_role']  = $role;
    $_SESSION['logged_in']  = true;

    switch ($role) {
        case 'admin':
            header("Location: ../Dashboards/dashboard_admin.php");
            break;
        case 'doctor':
            header("Location: ../Dashboards/dashboard_doctor.php");
            break;
        default:
            header("Location: ../Dashboards/dashboard_patient.php");
    }
    exit();

} else {
    header("Location: ../Web_Pages/register.html");
    exit();
}

mysqli_close($conn);
?>
