<?php

include '../../Database/config.php';
$pdo = new Connect;

if (isset($_REQUEST['btnEditar'])) {

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

    if (isset($_REQUEST['senha']) && !empty($_REQUEST['senha'])) {
        $senha = $_REQUEST['senha'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
    } else {
        $erro = 1;
    }

    if (!$erro) {
        $res = $pdo->prepare("UPDATE vendedor SET
                                nome = :n, senha = :s, email = :e WHERE codigo = :id");
        $res->bindValue(":n", $nome);
        $res->bindValue(":s", $senha);
        $res->bindValue(":e", $email);
        $res->bindValue(":id", $id);
        $res->execute();

        if ($res) {

            $teste = $pdo->prepare("SELECT * FROM vendedor WHERE codigo = :id");
            $teste->bindValue(":id", $id);
            $teste->execute();
            $vendedor = $teste->fetch();

            $venda = $pdo->prepare("UPDATE venda SET nome_vendedor = :nome_vendedor WHERE cpf_vendedor = :cpf");
            $venda -> bindValue(":nome_vendedor", $vendedor["nome"]);
            $venda -> bindValue(":cpf", $vendedor["cpf"]);
            $venda -> execute();

            return header("Location: ./list.php");
        } else {
            echo "Erro ao atualizar o banco de dados";
        }

    } else {
        echo "Erro nos dados. Falta algum valor";
    }

}

?>