<?php

include '../../Database/config.php';
$pdo = new Connect;

if (isset($_REQUEST['id'])) {
    
    $id = $_REQUEST['id'];

    $res = $pdo->prepare("DELETE FROM venda WHERE id = :id");
    $res->bindValue(":id", $id);
    $res->execute();

    if ($res) {
        echo "<script>alert('Venda {$id} excluida com sucesso');</script>";
    } else {
        echo "<script>alert('Falha ao excluir venda {$id}');</script>";
    }

}

header("Location: ./list.php");

?>