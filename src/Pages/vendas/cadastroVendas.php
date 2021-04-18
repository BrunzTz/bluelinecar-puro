<?php
    include '../../Database/config.php';
    include '../login/validateUser.php';
    validarList();

    if (isset($_REQUEST['btnCadastrar'])) {
        
        $erro = 0;
    
        if (isset($_REQUEST['id_cliente']) && !empty($_REQUEST['id_cliente'])) {
            $id_cliente = $_REQUEST['id_cliente'];
        } else {
            $erro = 1;
        }

        
        if (isset($_REQUEST['codigo_vendedor']) && !empty($_REQUEST['codigo_vendedor'])) {
            $codigo_vendedor = $_REQUEST['codigo_vendedor'];
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

        if (isset($_REQUEST['id_veiculo']) && !empty($_REQUEST['id_veiculo'])) {
            $id_veiculo = $_REQUEST['id_veiculo'];
        } else {
            $erro = 1;
        }

        if (isset($_REQUEST['data_venda']) && !empty($_REQUEST['data_venda'])) {
            $data_venda = $_REQUEST['data_venda'];
        } else {
            $erro = 1;
        }   
        
        if (!$erro) {
            $pdo = new Connect;

            $resvendedor = $pdo->prepare("SELECT * FROM vendedor WHERE codigo = :codigo");
            $resvendedor->bindValue(":codigo", $codigo_vendedor);
            $resvendedor->execute();
            $vendedor = $resvendedor->fetch();

            $rescliente = $pdo->prepare("SELECT * FROM cliente WHERE id = :id");
            $rescliente->bindValue(":id", $id_cliente);
            $rescliente->execute();
            $cliente = $rescliente->fetch();

            $resveiculo = $pdo->prepare("SELECT * FROM veiculo WHERE id = :id");
            $resveiculo->bindValue(":id", $id_veiculo);
            $resveiculo->execute();
            $veiculo = $resveiculo->fetch();

            $res = $pdo->prepare("INSERT INTO venda (id_cliente, nome_cliente, codigo_vendedor, nome_vendedor, id_veiculo, nome_modelo, quantidade, valor_veiculo, desconto, data_venda) 
            VALUES (:id_cliente, :nome_cliente, :codigo_vendedor, :nome_vendedor, :id_veiculo, :nome_modelo, :quantidade, :valor_veiculo, :desconto, :data_venda)");
            $res->bindValue(":id_cliente", $id_cliente);
            $res->bindValue(":nome_cliente", $cliente["nome"]);
            $res->bindValue(":codigo_vendedor", $codigo_vendedor);
            $res->bindValue(":nome_vendedor", $vendedor["nome"]);
            $res->bindValue(":id_veiculo", $id_veiculo);
            $res->bindValue(":nome_modelo", $veiculo["nome_modelo"]);
            $res->bindValue(":quantidade", $quantidade);
            $res->bindValue(":valor_veiculo", $veiculo["valor"]);
            $res->bindValue(":desconto", $desconto);
            $res->bindValue(":data_venda", $data_venda);
            $res->execute();
    
            if ($res) {
                header("Location: ./list.php");
            } else {
                echo "Erro ao executar o SQL";
            }
        } else {
            echo "Erro nos dados. Falta algum valor";
        }
    
    }
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../style/index/index.scss">
        <link rel="stylesheet" href="../../style/navbar/navbar.scss">
        <link rel="stylesheet" href="../../style/footer/footer.scss">
        <link rel="stylesheet" href="style/list.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Bluelinecar</title>
    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
            <img class="navbar-brand logo-size" src="../../assets/images/logo.png" alt="">

            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-container" id="navbarSupportedContent">
                    
                    <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="../../index.php">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#">Modelos</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#">Avaliações</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#">Sobre</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <div class="btn-group mr-3" dropdown>
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="btn btn-primary dropdown-toggle size-button" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="../vendedores/list.php">Vendedores</a>
                                        <a class="dropdown-item" href="../clientes/clientList.php">Clientes</a>
                                        <a class="dropdown-item" href="../veiculos/list.php">Veículos</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="./list.php">Vendas</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group mr-3">
                            <a href="../login/loginUser.php">
                                <button class="btn btn-success size-button">
                                    Login
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </nav>

        <!-- Content -->
        <div class="container">
        
            <div class="text-main size-cadastro">Cadastrar Venda</div>
            
            <!-- Cadastro de Veículo -->
            <form class="formulario" method="POST" action="./cadastroVendas.php">
                <div class="m-4">
                    <label for="id_cliente" class="form-label">Id Cliente</label>
                    <input type="text" class="form-control" id="id_cliente" name="id_cliente" required>
                </div>
                <div class="m-4">
                    <label for="codigo_vendedor" class="form-label">Código Vendedor</label>
                    <input type="text" class="form-control" id="codigo_vendedor" name="codigo_vendedor" required>
                </div>
                <div class="m-4">
                    <label for="id_veiculo" class="form-label">Id Veículo</label>
                    <input type="text" class="form-control" id="id_veiculo" name="id_veiculo" required>
                </div>
                <div class="m-4">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                </div>
                <div class="m-4">
                    <label for="desconto" class="form-label">Desconto</label>
                    <input type="number" class="form-control" id="desconto" name="desconto" required>
                </div>
                <div class="m-4">
                    <label for="data_venda" class="form-label">Data</label>
                    <input type="text" class="form-control" id="data_venda" name="data_venda" required>
                </div>

                <input type="submit" class="btn btn-success m-4" value="Cadastrar" name="btnCadastrar" id="btnCadastrar">
                <a href="./list.php"><button type="button" class="btn btn-danger m-4">Cancelar</button></a>
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>