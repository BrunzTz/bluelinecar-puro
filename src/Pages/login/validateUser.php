<?php

    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
    session_start();

    function validarIndex()
    {
        if(!$_SESSION["login"])
        {
            header('Location: ./Pages/login/loginUser.php');
        }
    }

    function validarList()
    {
        if(!$_SESSION["login"])
        {
            header('Location: ../login/loginUser.php');
        }
    }

    
?>