<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

//Verificar Login
VerfLogin();

$con = new Conexao();

$user = $_SESSION["Usuario"]->username;
$pathFile = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Imagem');

$tipos = [".png", ".jpg", ".jpeg"];

//Verificar se a imagem foi enviada
if (isset($_FILES["fileuser"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username_users='$user';");
    $fileimg = $_FILES["fileuser"];

    if (count($verf) > 0) {

        $id_user = $verf[0]["id_users"];

        if ($pathFile) {

            $query = $con->Con_Select("SELECT * FROM tb_usuarios_img WHERE id_users = '$id_user';");

            if (count($query) > 0) {
                //Atualizar o caminho para a imagem
                echo "Atualizar o caminho para a imagem";
            } else {
                //Inserir o caminho para a imagem
                $msg = SalvarImagem($fileimg, $pathFile, $tipos);

                //echo "Inserir o caminho para a imagem";
            }
        }
    } else {
        echo "Erro";
    }
} else {
    echo "Não foi enviado a imagem<br>";
    print_r($_FILES);
}
