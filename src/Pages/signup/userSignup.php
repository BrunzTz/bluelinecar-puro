<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../style/index/index.css">
        <link rel="stylesheet" href="../../style/navbar/navbar.css">
        <link rel="stylesheet" href="../../style/modelos/modelos.css">
        <link rel="stylesheet" href="../../style/footer/footer.css">
        <link rel="stylesheet" href="../../style/signup/userSignup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Signup</title>
    </head>
    <body>

        <!--Navbar-->
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
                                        <a class="dropdown-item" href="#">Clientes</a>
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
                                    <a class="btn btn-success dropdown-toggle size-button" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Login
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                                        <a class="dropdown-item" href="../login/loginSeller.php">Vendedores</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../login/loginUser.php">Clientes</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            
        </nav>

        <!--Formulário-->
        <div class="container">
            <div class="row justify-content-md-center">
                <form class="col-10 formulario">
                    
                    <div class="form-outline m-4">
                        <label class="form-label" for="nome">Nome Completo</label>
                        <input type="text" id="nome" class="form-control" required/>
                    </div>

                    <div class="form-outline m-4">
                        <label class="form-label" for="cpf">Seu CPF</label>
                        <input type="text" id="cpf" class="form-control" required/>  
                    </div>

                    <div class="form-outline m-4">
                        <label class="form-label" for="rg">Seu RG</label>
                        <input type="text" id="rg" class="form-control" required/>               
                    </div>

                    <div class="form-outline m-4">
                        <label class="form-label" for="endereco">Endereço</label>
                        <input type="text" id="endereco" class="form-control" required/>
                    </div>

                    <div class="form-outline m-4">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input type="text" id="cidade" class="form-control" required/>
                    </div>

                    <div class="form-outline m-4">
                        <label class="form-label" for="estado">Estado</label>
                        <select class="custom-select" id="estado" required>
                            <option selected>Escolher...</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                
                    <!-- Email input -->
                    <div class="form-outline m-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control" required/>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline m-4">
                        <label class="form-label" for="senha">Senha</label>
                        <input type="password" id="senha" class="form-control" required/>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg m-4">Cadastrar-se</button>
                </form>
            
            </div>
        </div>

        <!--footer-->
        <?php
            require '../../shared/footer/footer.php';
        ?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>