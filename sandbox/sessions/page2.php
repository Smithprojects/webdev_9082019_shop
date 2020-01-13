<?php
    session_start();
    //cho $_SESSION['count'];

    if ( empty($_SESSION['count'])) {
        $_SESSION['count'] = 1;
    } else {
        $_SESSION['count']++;
    }

    echo $_SESSION['count'];
?>