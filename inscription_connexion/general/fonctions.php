<?php

    function logged_only()
    {
        //if(session_status() == PHP_SESSION_NONE)
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!isset($_SESSION['user']))
        {
            header('Location: ../connexionEleve.php');
            exit();
        }
    }
?>

