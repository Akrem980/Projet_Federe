<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Web_Pages/HealthCare.html");
exit();
?>
