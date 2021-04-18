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

    if (isset($_REQUEST['nome_modelo']) && !empty($_REQUEST['nome_modelo'])) {
        $nome_modelo = $_REQUEST['nome_modelo'];
    } else {
        $erro = 1;
    }
    
    if (isset($_REQUEST['tipo']) && !empty($_REQUEST['tipo'])) {
        $tipo = $_REQUEST['tipo'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['marca']) && !empty($_REQUEST['marca'])) {
        $marca = $_REQUEST['marca'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['ano']) && !empty($_REQUEST['ano'])) {
        $ano = $_REQUEST['ano'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['valor']) && !empty($_REQUEST['valor'])) {
        $valor = $_REQUEST['valor'];
    } else {
        $erro = 1;
    }

    if (!$erro) {
        $res = $pdo->prepare("UPDATE veiculo SET
                                nome_modelo = :n, tipo = :t, marca = :m, ano = :a, valor = :v WHERE id = :id");
        $res->bindValue(":n", $nome_modelo);
        $res->bindValue(":t", $tipo);
        $res->bindValue(":m", $marca);
        $res->bindValue(":a", $ano);
        $res->bindValue(":v", $valor);
        $res->bindValue(":id", $id);
        $res->execute();

        if ($res) {
            header("Location: ./list.php");
        } else {
            echo "Erro ao atualizar o banco de dados";
        }

    } else {
        echo "Erro nos dados. Falta algum valor";
    }

}

?>