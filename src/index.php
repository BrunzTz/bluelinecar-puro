<?php
    
    include './Pages/login/validateUser.php';
    
    validarIndex();

?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index/index.scss">
        <link rel="stylesheet" href="./style/navbar/navbar.scss">
        <link rel="stylesheet" href="./style/modelos/modelos.scss">
        <link rel="stylesheet" href="./style/footer/footer.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Bluelinecar</title>
    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
            <img class="navbar-brand logo-size" src="./assets/images/logo.png" alt="">

            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-container" id="navbarSupportedContent">
                    
                    <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="./index.php">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="./index.php#modelo">Modelos</a>
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
                        <div class="btn-group mr-3">
                            <div class="dropdown ">
                                <a class="btn btn-primary dropdown-toggle size-button" href="#" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ações
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="./Pages/vendedores/list.php">Vendedores</a>
                                    <a class="dropdown-item" href="./Pages/clientes/clientList.php">Clientes</a>
                                    <a class="dropdown-item" href="./Pages/veiculos/list.php">Veículos</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./Pages/vendas/list.php">Vendas</a>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group mr-3">
                            <a href="./Pages/login/loginUser.php">
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
        <div class="container" style="margin-bottom: 60px;">
            <!-- Jumbotron -->
            <?php include 'shared/jumbotron/jumbotron.php'; ?>
    
            <!-- Modelos -->
            <?php 

            include './Database/config.php';

            $pdo = new Connect;
            $res = $pdo->prepare("SELECT * FROM veiculo WHERE foto is not null");
            $res->execute();
            $veiculos = $res->fetchAll(PDO::FETCH_ASSOC);
            $i = 0;
            ?>

            <div class="text-main" id="#modelo">Modelos</div>

            <div class="back-modelo">
                <div class="row">
                    
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php  foreach ($veiculos as $veiculo) { ?>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" class=" <?php 
                                        if($i == 0){
                                            echo "active";
                                        } else { echo ""; } 
                                    ?>">
                                <?php } ?>  
                            </ol>
                            <div class="carousel-inner">
                            <?php  foreach ($veiculos as $veiculo) { ?>
                                    <div class="carousel-item <?php 
                                        if($i == 0){
                                            echo "active";
                                        } else { echo ""; } 
                                    ?>">
                                        <img src="./assets/veiculos/<?php echo $veiculo['foto']; ?>" class="d-block w-100" alt="...">
                                    </div>
                            <?php 
                                $i++;               
                                } 
                            ?>  
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                </div>
                <!-- <div class="card card-size">
                    <img src="assets/veiculos/corolla.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Corolla 2021</h5>
                        <h6 class="card-subtitle mb-2 text-muted">R$114,090</h6>
                        <p class="card-text">A grade frontal cromada se combina harmoniosamente aos faróis dianteiros de LED3 com luzes diurnas (DRL) que conferem forte identidade ao modelo. </p>
                    </div>
                </div>

                <div class="card card-size">
                    <img src="assets/veiculos/onix.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Onix 2021</h5>
                        <h6 class="card-subtitle mb-2 text-muted">R$65,090</h6>
                        <p class="card-text">O Onix mais sofisticado da gama é o Premier. Ele agrega rodas de liga-leve de 16 polegadas com desenho exclusivo, faróis com projetores, luzes de posição em LED, lanternas traseiras em LED e bancos com revestimento parcial em couro sintético.</p>
                    </div>
                </div> -->
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>

</html>