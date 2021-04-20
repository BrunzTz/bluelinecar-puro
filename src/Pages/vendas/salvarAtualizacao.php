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

    if (isset($_REQUEST['cpf_cliente']) && !empty($_REQUEST['cpf_cliente'])) {
        $cpf_cliente = $_REQUEST['cpf_cliente'];
    } else {
        $erro = 1;
    }
    
    if (isset($_REQUEST['cpf_vendedor']) && !empty($_REQUEST['cpf_vendedor'])) {
        $cpf_vendedor = $_REQUEST['cpf_vendedor'];
    } else {
        $erro = 1;
    }

    if (isset($_REQUEST['id_veiculo']) && !empty($_REQUEST['id_veiculo'])) {
        $id_veiculo = $_REQUEST['id_veiculo'];
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

        $teste = $pdo -> prepare("SELECT vendedor.nome as nome_vendedor, cliente.nome as nome_cliente, veiculo.nome_modelo as nome_modelo, veiculo.valor as valor
                FROM cliente 
                LEFT OUTER JOIN vendedor on vendedor.cpf = :cpf_vendedor
                LEFT OUTER JOIN veiculo on veiculo.id = :id_veiculo
                WHERE cliente.cpf = :cpf_cliente"
        );

        $teste -> bindValue(":cpf_cliente", $cpf_cliente);
        $teste -> bindValue(":cpf_vendedor", $cpf_vendedor);
        $teste -> bindValue(":id_veiculo", $id_veiculo);
        $teste -> execute();

        $dados = $teste -> fetch();

        if(!$dados["nome_cliente"]){
            echo 'Cliente inexistente';
        }else if(!$dados["nome_vendedor"]){
            echo 'Vendedor inexistente';
        }else if(!$dados['nome_modelo']){
            echo 'Veículo inexistente';
        }

        $res = $pdo->prepare("UPDATE venda SET
                                cpf_cliente = :cpf_cliente, nome_cliente = :nome_cliente, cpf_vendedor = :cpf_vendedor, 
                                nome_vendedor = :nome_vendedor, id_veiculo = :id_veiculo, nome_modelo = :nome_modelo, quantidade = :quantidade, 
                                valor_veiculo = :valor_veiculo, desconto = :desconto, data_venda = :data_venda WHERE id = :id");
        $res->bindValue(":cpf_cliente", $cpf_cliente);
        $res->bindValue(":nome_cliente", $dados["nome_cliente"]);
        $res->bindValue(":cpf_vendedor", $cpf_vendedor);
        $res->bindValue(":nome_vendedor", $dados["nome_vendedor"]);
        $res->bindValue(":id_veiculo", $id_veiculo);
        $res->bindValue(":nome_modelo", $dados["nome_modelo"]);
        $res->bindValue(":quantidade", $quantidade);
        $res->bindValue(":valor_veiculo", $dados["valor"]);
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