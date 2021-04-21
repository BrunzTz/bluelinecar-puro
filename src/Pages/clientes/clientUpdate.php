<?php
    include '../../Database/config.php';
    include '../login/validateUser.php';
    validarList();

    if (isset($_REQUEST['id']) and !empty($_REQUEST['id'])) {

        $id = $_REQUEST['id'];

        $pdo = new Connect;
        $res = $pdo->prepare("SELECT * FROM cliente WHERE id = :id");
        $res->bindValue(":id", $id);
        $res->execute();
        $cliente = $res->fetch(PDO::FETCH_ASSOC);
        //print_r($cliente);

        if (!$cliente) {
            echo "<p>Cliente não encontrado, volte a listagem</p>";
            echo "<a href='./list.php'>Listagem de clientes</a>";
        }

    } else {
        header("Location: ./clientlist.php");
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
        <link rel="stylesheet" href="./style/list.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Bluelinecar - Atualização de cliente</title>
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
                                        <a class="dropdown-item" href="./clientList.php">Clientes</a>
                                        <a class="dropdown-item" href="../veiculos/list.php">Veículos</a>
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
        
            <div class="text-main size-cadastro">Atualizar Cliente</div>
            
            <!-- Cadastro de Vendedores -->
            <form class="formulario" action="salvarUpdate.php?id=<?php echo $id; ?>" method="post">
                <div class="m-4">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cliente['nome'] ?>" placeholder="José" required>
                </div>
                <div class="m-4">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" value="<?php echo $cliente['endereco'] ?>" name="endereco" required>
                </div>
                <div class="m-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" value="<?php echo $cliente['cidade'] ?>" name="cidade" required>
                </div>
                <div class="form-outline m-4">
                    <label class="form-label" for="estado">Estado</label>
                    <input class="custom-select" list="estado" name="estado">
                    <datalist id="estado" name="estado" required>
                        <option value="AC">
                        <option value="AL">
                        <option value="AP">
                        <option value="AM">
                        <option value="BA">
                        <option value="CE">
                        <option value="DF">
                        <option value="ES">
                        <option value="GO">
                        <option value="MA">
                        <option value="MT">
                        <option value="MS">
                        <option value="MG">
                        <option value="PA">
                        <option value="PB">
                        <option value="PR">
                        <option value="PE">
                        <option value="PI">
                        <option value="RJ">
                        <option value="RN">
                        <option value="RS">
                        <option value="RO">
                        <option value="RR">
                        <option value="SC">
                        <option value="SE">
                        <option value="SP">
                        <option value="TO">
                    </datalist>
                </div>
                
                <div class="m-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $cliente['email'] ?>" name="email" placeholder="name@example.com" required>
                </div>

                <input type="submit" class="btn btn-success m-4" value="Salvar" name="btnEditarCliente" id="btnEditarCliente">
                <a href="./clientList.php"><button type="button" class="btn btn-danger m-4">Cancelar</button></a>
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>