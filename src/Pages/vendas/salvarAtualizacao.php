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


    if (isset($_REQUEST['quantidade']) && !empty($_REQUEST['quantidade'])) {
        $quantidade = $_REQUEST['quantidade'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['desconto']) && !empty($_REQUEST['desconto'])) {
        $desconto = $_REQUEST['desconto'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['data_venda']) && !empty($_REQUEST['data_venda'])) {
        $data_venda = $_REQUEST['data_venda'];
    } else {
        $erro = 1;
    }

    if (!$erro) {


        $res = $pdo->prepare("UPDATE venda SET
                                quantidade = :quantidade, 
                                desconto = :desconto, data_venda = :data_venda WHERE id = :id");
        
        $res->bindValue(":quantidade", $quantidade);
        $res->bindValue(":desconto", $desconto);
        $res->bindValue(":data_venda", $data_venda);
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