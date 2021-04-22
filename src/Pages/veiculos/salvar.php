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

    if (isset($_REQUEST['nome_bd_arquivo']) && !empty($_REQUEST['nome_bd_arquivo'])) {
        $nome_bd_arquivo = $_REQUEST['nome_bd_arquivo'];
    }

    if (!$erro) {

        $arquivo 	= $_FILES['arquivo']['name'];
			
        //Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = './../../assets/veiculos/';
        
        //Tamanho máximo do arquivo em Bytes
        $_UP['tamanho'] = 1024*1024*100; //5mb
        
        //Array com a extensões permitidas
        $_UP['extensoes'] = array('png', 'jpg', 'jpeg');         
        
        //Renomeiar
        $_UP['renomeia'] = false;
        
        //Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
        
        //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
        if($_FILES['arquivo']['error'] != 0){
            die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
            exit; //Para a execução do script
        }
        
        //Faz a verificação da extensao do arquivo
        $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
        if(array_search($extensao, $_UP['extensoes'])=== false){	
            header("Location: ./list.php");	
            echo "A imagem não foi cadastrada extesão inválida.";
        }     
        
        //Faz a verificação do tamanho do arquivo
        else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
            header("Location: ./list.php");
            echo "Arquivo muito grande.";
        }
        
        //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
        else{
            //Primeiro verifica se deve trocar o nome do arquivo
            if($UP['renomeia'] == true){
                //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                $nome_final = time().'.jpg';
            }else{
                //mantem o nome original do arquivo
                $nome_final = $_FILES['arquivo']['name'];
            }
            //Verificar se é possivel mover o arquivo para a pasta escolhida
            if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
                //Upload efetuado com sucesso, exibe a mensagem
                
            }else{
                //Upload não efetuado com sucesso, exibe a mensagem
                header("Location: ./list.php");
                echo "Erro ao cadastrar.";
            }
        }
        
        $res = $pdo->prepare("UPDATE veiculo SET
                                    nome_modelo = :n, tipo = :t, marca = :m, ano = :a, valor = :v, foto = :f WHERE id = :id");
        $res->bindValue(":n", $nome_modelo);
        $res->bindValue(":t", $tipo);
        $res->bindValue(":m", $marca);
        $res->bindValue(":a", $ano);
        $res->bindValue(":v", $valor);
        $res->bindValue(":f", !!$nome_final ? $nome_final : $nome_bd_arquivo);
        $res->bindValue(":id", $id);
        $res->execute();

        if ($res) {

            $veiculo = $pdo -> prepare("SELECT * FROM veiculo WHERE id = :id");
            $veiculo -> bindValue(":id", $id);
            $veiculo -> execute();
            $result = $veiculo -> fetch();

            $update = $pdo -> prepare("UPDATE venda SET 
                                        nome_modelo = :nome_modelo, valor_veiculo = :valor WHERE id_veiculo = :id");

            $update -> bindValue(":id", $result["id"]);
            $update -> bindValue(":nome_modelo", $result["nome_modelo"]);
            $update -> bindValue(":valor", $result["valor"]);
            $update->execute();

            return header("Location: ./list.php");
        } else {
            echo "Erro ao executar o SQL";
        }
    } else {
        echo "Erro nos dados. Falta algum valor";
    }

}

?>