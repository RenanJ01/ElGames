<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

$con = new Conexao();
$id = $title = $descr = $data = 0;

// Verifica se houve POST e se foi inserido as variaveis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fidUpd"])) {
        header("Location: ..\\desen.php");
        exit;
    } else {
        $id = tratar_input($_POST["fidUpd"]);
    }
    if (empty($_POST["ftitleUpd"])) {
        header("Location: ..\\desen.php");
        exit;
    } else {
        $title = tratar_input($_POST["ftitleUpd"]);
    }
    if (empty($_POST["fdescUpd"])) {
        header("Location: ..\\desen.php");
        exit;
    } else {
        $descr = tratar_input($_POST["fdescUpd"]);
    }
    if (empty($_POST["fdataUpd"])) {
        header("Location: ..\\desen.php");
        exit;
    } else {
        $data = tratar_input($_POST["fdataUpd"]);
    }
} else {
    header("Location: ..\\desen.php");
    exit;
}

//Atualizar a fase
$verf = $con->Con_Update_Fase($id, $title, $descr, $data);
if ($verf) {
    echo "Inserção válidada!";
    header("Location: ..\\desen.php");
    exit;
} else {
    //Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado.
    echo "Inserção inválidada!";
    exit;
}

?>