<?php
session_start();
//echo session_status();
if (!isset($_SESSION['dni'])) {
    header('Location: index.php');
    //echo 'No existe $_session[user]';
}

session_destroy();
//header('Location: ../Views/index.php');