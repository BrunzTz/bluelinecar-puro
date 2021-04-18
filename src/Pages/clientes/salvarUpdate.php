<?php

include '../../Database/config.php';
$pdo = new Connect;

if (isset($_REQUEST['btnEditarCliente'])) {

    $erro = 0;

    if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
    } else {
        $erro = 1;
    } 

    if (isset($_REQUEST['nome']) && !empty($_REQUEST['nome'])) {
        $nome = $_REQUEST['nome'];
    } else {
        $erro = 1;
    }
    
    if (isset($_REQUEST['cpf']) && !empty($_REQUEST['cpf'])) {
        $cpf = $_REQUEST['cpf'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['rg']) && !empty($_REQUEST['rg'])) {
        $rg = $_REQUEST['rg'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['endereco']) && !empty($_REQUEST['endereco'])) {
        $endereco = $_REQUEST['endereco'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['cidade']) && !empty($_REQUEST['cidade'])) {
        $cidade = $_REQUEST['cidade'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['estado']) && !empty($_REQUEST['estado'])) {
        $estado = $_REQUEST['estado'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
    } else {
        $erro = 1;
    }

    if (!$erro) {
        $res = $pdo->prepare("UPDATE cliente SET nome = :nome, cpf = :cpf, rg = :rg, endereco = :endereco, cidade = :cidade, estado = :estado, email = :email WHERE id = :id");
        
        $res->bindValue(":nome", $nome);
        $res->bindValue(":cpf", $cpf);
        $res->bindValue(":rg", $rg);
        $res->bindValue(":endereco", $endereco);
        $res->bindValue(":cidade", $cidade);
        $res->bindValue(":estado", $estado);
        $res->bindValue(":email", $email);
        $res->bindValue(":id", $id);
        $res->execute();

        if ($res) {
            header("Location: ./clientList.php");
        } else {
            echo "Erro ao atualizar o banco de dados";
        }

    } else {
        echo "Erro nos dados. Falta algum valor";
    }

}

?>