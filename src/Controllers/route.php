<?php

    //rota cuidando do CRUD.

    require_once '../Database/config.php';
    require_once '../Controllers/users/authUser.php';

    $user2 = new LoginUser;
    echo $user2 -> Login();

?>