<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

//Verificar Login
VerfLogin();

$username = $file = null;

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fuser"])) {
        header("Location: ..\Access\login.html");
        exit;
    } else {
        $username = tratar_input($_POST["fuser"]);
    }
    if (empty($_POST["fimg"])) {
        header("Location: ..\Access\login.html");
        exit;
    } else {
        $file = tratar_input($_POST["fimg"]);
    }
} else {
    header("Location: ..\Access\login.html");
    exit;
}

$con = new Conexao();
$verf = $con->Con_Select("SELECT * FROM tb_imagens WHERE username = " . $username . ";");
if(count($verf)){

}else{

}
?>