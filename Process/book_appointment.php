<?php
session_start();
require_once '../config.php';
checkAuth('patient');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $doctor_id  = intval($_POST['doctor_id']);
    $appt_date  = mysqli_real_escape_string($conn, $_POST['date']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $end_time   = mysqli_real_escape_string($conn, $_POST['end_time']);
    $user_id    = $_SESSION['user_id'];

    // Get patient id
    $stmt = mysqli_prepare($conn, "SELECT id FROM patients WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $patient = mysqli_fetch_assoc($res);

    if (!$patient) {
        redirectWithMessage("Patient introuvable.", 'error', '../Dashboards/dashboard_patient.php');
    }

    $patient_id = $patient['id'];

    // Check slot not already taken
    $check = mysqli_prepare($conn,
        "SELECT id FROM appointments
         WHERE doctor_id=? AND appointment_date=? AND start_time=? AND status != 'cancelled'");
    mysqli_stmt_bind_param($check, "iss", $doctor_id, $appt_date, $start_time);
    mysqli_stmt_execute($check);
    $check_res = mysqli_stmt_get_result($check);
    if (mysqli_num_rows($check_res) > 0) {
        redirectWithMessage("Ce créneau est déjà pris. Veuillez en choisir un autre.", 'error', '../Dashboards/find_doctor.php');
    }

    // Insert appointment
    $ins = mysqli_prepare($conn,
        "INSERT INTO appointments (patient_id, doctor_id, appointment_date, start_time, end_time, status)
         VALUES (?, ?, ?, ?, ?, 'scheduled')");
    mysqli_stmt_bind_param($ins, "iisss", $patient_id, $doctor_id, $appt_date, $start_time, $end_time);

    if (mysqli_stmt_execute($ins)) {
        redirectWithMessage("Rendez-vous réservé avec succès !", 'success', '../Dashboards/dashboard_patient.php');
    } else {
        redirectWithMessage("Erreur lors de la réservation: " . mysqli_error($conn), 'error', '../Dashboards/find_doctor.php');
    }

} else {
    header("Location: ../Dashboards/find_doctor.php");
    exit();
}

mysqli_close($conn);
?>
