<?php
    include "config.php";
    session_start();
    session_unset();
    session_destroy();
    header("Location: http://localhost/PHP/third_year_project/enews/login.php");
?>