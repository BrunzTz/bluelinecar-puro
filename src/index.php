<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index/index.css">
        <link rel="stylesheet" href="./style/navbar/navbar.css">
        <link rel="stylesheet" href="./style/modelos/modelos.css">
        <link rel="stylesheet" href="./style/footer/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Bluelinecar</title>
    </head>

    <body>
        
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
                                    <buton class="btn btn-primary dropdown-toggle size-button" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Vendedores</a>
                                        <a class="dropdown-item" href="#">Clientes</a>
                                        <a class="dropdown-item" href="#">Veículos</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Vendas</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <a href="./Pages/login/login.php" class="btn btn-success size-button" type="submit">Login</a>
                    </div>
                </div>
                
            </div>
            
        </nav>

        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4 text-dark">Seja bem-vindo a BLueLineCar!</h1>
                <p class="lead text-dark">Precisa realizar a compra de algum veículo novo ou deseja conhecer nossos modelos de carro que seja sua cara? Encontre em contato conosco.</p>
                <hr class="my-4 text-dark">
                <p class="text-dark">Caso deseje realizar uma compra, ou se cadastrar em nosso site. Clique no botão abaixo:</p>
                <a class="btn btn-primary btn-lg" routerLink="signup" role="button">Cadastre-se</a>
            </div>


            <div class="text-main">Modelos</div>

            <div class="back-modelo">
                <div class="card card-size">
                    <img src="assets/veiculos/mustang.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mustang</h5>
                        <h6 class="card-subtitle mb-2 text-muted">R$ 396,900</h6>
                        <p class="card-text">Novo design e detalhes exclusivos. Conheça o Novo Mustang Black Shadow! Confira as novidades da Edição Especial de 55 anos do Ícone do mundo.</p>
                    </div>
                </div>

                <div class="card card-size">
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
                </div>
            </div>
        </div>

        <div class="social_links">
            <a href="#">
                <span class="fa-stack fa-lg ig combo">
                    <i class="fa fa-circle fa-stack-2x circle"></i>
                    <i class="fa fa-instagram fa-stack-1x fa-inverse icon"></i>
                </span>
            </a>
            <a href="#">
                <span class="fa-stack fa-lg fb combo">
                    <i class="fa fa-circle fa-stack-2x circle"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse icon"></i>
                </span>
            </a>
            <a href="#">
                <span class="fa-stack fa-lg yt combo">
                    <i class="fa fa-circle fa-stack-2x circle"></i>
                    <i class="fa fa-youtube-play fa-stack-1x fa-inverse icon"></i>
                </span>
            </a>
            <a href="#">
                <span class="fa-stack fa-lg tw combo">
                    <i class="fa fa-circle fa-stack-2x circle"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse icon"></i>
                </span>
            </a>
            <a href="#">
                <span class="fa-stack fa-lg gt combo">
                    <i class="fa fa-circle fa-stack-2x circle"></i>
                    <i class="fa fa-codepen fa-stack-1x fa-inverse icon"></i>
                </span>
            </a>
            <a href="#">
                <span class="fa-stack fa-lg tw combo">
                    <i class="fa fa-circle fa-stack-2x circle"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse icon"></i>
                </span>
            </a>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

</html>