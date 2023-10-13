<?php
require_once("../Assets/conection.php");
require_once("../Assets/functions.php");
require_once("../Assets/usuario.php");

$con = new Conexao();

// Verifica se houve POST e se foi inserido as variaveis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["ftitle"])) {
        header("Location: desen.php");
        exit;
    } else {
        $title = tratar_input($_POST["ftitle"]);
    }
    if (empty($_POST["fdesc"])) {
        header("Location: desen.php");
        exit;
    } else {
        $descr = tratar_input($_POST["fdesc"]);
    }
    if (empty($_POST["fdata"])) {
        header("Location: desen.php");
        exit;
    } else {
        $data = tratar_input($_POST["fdata"]);
    }
} else {
    header("Location: desen.php");
    exit;
}

//Inserção da fase
$verf = $con->Con_Insert_Fase($title, $descr, $data);
if ($verf) {
    header("Location: desen.php");
    exit;
} else {
    //Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado.
    echo "Inserção inválidada!";
    exit;
}

?>