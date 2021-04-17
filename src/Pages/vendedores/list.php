<?php
    include '../../Database/config.php';

    $pdo = new Connect;
    $res = $pdo->prepare("SELECT * FROM vendedor");
    $res->execute();
    $vendedores = $res->fetchAll(PDO::FETCH_ASSOC);

    include '../login/validateUser.php';
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
    session_start();
    validarList();

?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../style/index/index.css">
        <link rel="stylesheet" href="../../style/navbar/navbar.css">
        <link rel="stylesheet" href="../../style/footer/footer.css">
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
                                        <a class="dropdown-item" href="../../Pages/vendedores/list.php">Vendedores</a>
                                        <a class="dropdown-item" href="../../Pages/user/clientList.php">Clientes</a>
                                        <a class="dropdown-item" href="#">Veículos</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Vendas</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group mr-3" dropdown>
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <button class="btn btn-success dropdown-toggle size-button" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Login
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                                        <a class="dropdown-item" href="../login/loginUser.php">Vendedores</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </nav>

        <!-- Content -->
        <div class="container">
            
            <!-- Listagem de Vendedores -->
            <div class="text-main size-list">Vendedores</div>

            <div class="button-novo-registro">
                <a href="./cadastro.php"><button type="button" class="btn btn-success">Novo Registro</button></a>
            </div>

            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center" width="100">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendedores as $vendedor) { ?>
                        <tr>
                            <td><?php echo $vendedor["codigo"]; ?></td>
                            <td><?php echo $vendedor["nome"]; ?></td>
                            <td><?php echo $vendedor["cpf"]; ?></td>
                            <td><?php echo $vendedor["email"]; ?></td>
                            <td width="200">
                                <div class="acoes-flex-button">
                                    <?php echo "<a href='./atualizacao.php?id={$vendedor['codigo']}' class='btn btn-warning'>Atualizar</a>"; ?>
                                    <?php echo "<a href='./exclusao.php?id={$vendedor['codigo']}' class='btn btn-danger'>Excluir</a>"; ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        
        <div class="fixed-button-bottom">
            <!-- Footer -->
            <?php require '../../shared/footer/footer.php'; ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>