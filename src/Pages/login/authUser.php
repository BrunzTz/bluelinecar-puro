<?php

    include '../../Database/config.php';

    if (isset($_REQUEST['btnLogar'])) 
    {
    
        $erro = 0;
    
        if (isset($_REQUEST['senha']) && !empty($_REQUEST['senha'])) 
        {
            $senha = $_REQUEST['senha'];
        } 
        else 
        {
            $erro = 1;
        }
    
        if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) 
        {
            $email = $_REQUEST['email'];
        } else 
        {
            $erro = 1;
        }

        if (!$erro) 
        {
            $pdo = new Connect;
            $res = $pdo->prepare("SELECT * FROM vendedor WHERE email = :email AND senha = :senha");
            $res->bindValue(":senha", $senha);
            $res->bindValue(":email", $email);
            $res->execute();
            

            if ($res and $res->rowCount() == 1) 
            {
                $vendedor = $res->fetch();
                ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
                session_start();
                
                $_SESSION["nome"] = $vendedor['nome'];
                $_SESSION["email"] = $vendedor['email'];
                $_SESSION["cpf"] = $vendedor['cpf'];
                $_SESSION["login"] = True;

                header('Location:../../index.php');
            } 
            else 
            {
                echo "Erro ao executar o SQL";
                header('Location:loginUser.php');
            }
        } 
        else 
        {
            echo "Erro nos dados. Falta algum valor";
            header('Location:loginUser.php');
        }

    }

?>