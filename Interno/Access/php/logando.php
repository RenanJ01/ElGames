<?php
    //Login
    require_once("../../Assets/conection.php");
    require_once("../../Assets/functions.php");
    require_once("../../Assets/usuario.php");

    //Criando variaveis de classes
    $con = new Conexao();
    $user = new Usuario();

    //Logando
    Login($con, $user);
?>