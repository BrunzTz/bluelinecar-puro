<?php
    include '../../Database/config.php';
    include '../login/validateUser.php';
    validarList();

    if (isset($_REQUEST['id']) and !empty($_REQUEST['id'])) {

        $id = $_REQUEST['id'];

        $pdo = new Connect;
        $res = $pdo->prepare("SELECT * FROM veiculo WHERE id = :id");
        $res->bindValue(":id", $id);
        $res->execute();
        $veiculo = $res->fetch(PDO::FETCH_ASSOC);
        //print_r($veiculo);

        if (!$veiculo) {
            echo "<p>Veículo não encontrado, volte a listagem</p>";
            echo "<a href='./list.php'>Listagem de veículos</a>";
        }

    } else {
        header("Location: ./list.php");
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
        <title>Bluelinecar - Atualização de veículos</title>
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
                                <a class="nav-link" href="../../index.php#modelo">Modelos</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#">Avaliações</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#">Dashboard</a>
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
                                        <a class="dropdown-item" href="./list.php">Veículos</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../vendas/list.php">Vendas</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group mr-3">
                            <a href="../login/loginUser.php">
                                <button class="btn btn-success size-button">
                                    <?php echo $_SESSION['nome']; ?>
                                </button>

                                <button class="btn btn-danger size-button">
                                    Logout
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </nav>

        <!-- Content -->
        <div class="container">
        
        <div class="text-main size-cadastro">Atualizar Veículo</div>
            
            <!-- Cadastro de Veículo -->
            <form class="formulario" action="salvar.php?id=<?php echo $id; ?>" method="post"  enctype="multipart/form-data">
                <div class="m-4">
                    <label for="nome_modelo" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome_modelo" name="nome_modelo" value="<?php echo $veiculo['nome_modelo'] ?>" placeholder="Corolla" required>
                </div>
                <div class="m-4">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $veiculo['tipo'] ?>" required>
                </div>
                <div class="m-4">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $veiculo['marca'] ?>" required>
                </div>
                <div class="m-4">
                    <label for="ano" class="form-label">Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" value="<?php echo $veiculo['ano'] ?>" required>
                </div>
                <div class="m-4">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" class="form-control" id="valor" name="valor" value="<?php echo $veiculo['valor'] ?>"  required>
                </div>
                <div class="input-group px-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="text" hidden class="custom-file-input" value="<?php echo $veiculo['foto'] ?>" id="nome_bd_arquivo" name="nome_bd_arquivo">
                        <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                        <label class="custom-file-label" for="arquivo">Escolher arquivo</label>
                    </div>
                </div>

                <input type="submit" class="btn btn-success m-4" value="Salvar" name="btnEditar" id="btnEditar">
                <a href="./list.php"><button type="button" class="btn btn-danger m-4">Cancelar</button></a>
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>