<?php

    // End session of logged in customer
    session_start();

    unset($_SESSION["student_email"]);    
    unset($_SESSION["username"]);

    echo "<script>window.open('index.php', '_self')</script>";

?>