<?php
    session_start();
    unset($_SESSION["login"]);
    header("Location: ../_login.php");
?>