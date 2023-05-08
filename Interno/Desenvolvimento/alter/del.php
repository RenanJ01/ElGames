<?php
require_once("..\\..\\Assets\\conection.php");
require_once("..\\..\\Assets\\functions.php");
require_once("..\\..\\Assets\\usuario.php");

$con = new Conexao();

// Verifica se houve POST e se foi inserido as variaveis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fidDel"])) {
        header("Location: ..\\desen.php");
        exit;
    } else {
        $id = tratar_input($_POST["fidDel"]);
    }
} else {
    header("Location: ..\\desen.php");
    exit;
}

//Atualizar a fase
$verf = $con->Con_Delete_Fase($id);
if ($verf) {
    header("Location: ..\\desen.php");
    exit;
} else {
    //Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado.
    echo "Inserção inválidada!";
    exit;
}

?>