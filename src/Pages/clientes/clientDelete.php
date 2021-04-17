<?php

include '../../Database/config.php';
$pdo = new Connect;

if (isset($_REQUEST['id'])) {
    
    $id = $_REQUEST['id'];

    $res = $pdo->prepare("DELETE FROM cliente WHERE id = :id");
    $res->bindValue(":id", $id);
    $res->execute();

    if ($res) {
        echo "<script>alert('Cliente {$id} excluido com sucesso');</script>";
    } else {
        echo "<script>alert('Falha ao excluir Cliente {$id}');</script>";
    }

}

header("Location: ./clientList.php");

?>