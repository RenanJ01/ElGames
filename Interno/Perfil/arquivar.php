<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

//Verificar Login
VerfLogin();

$user = $_SESSION["Usuario"]->username;
print_r($_FILES);
echo "<br><br>";

//Verificar se a imagem foi enviada
if(isset($_FILES["fileuser"]) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $con = new Conexao();
    $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username_users='$user';");
    print_r($verf);
    echo "<br><br>";

    if(count($verf) > 0){
        $id_user = $verf[0]["id_users"];

        $query = $con->Con_Select("SELECT * FROM tb_usuarios_img WHERE id_users = '$id_user';");
        if(count($query) > 0){
            //Atualizar o caminho para a imagem
            echo "Atualizar o caminho para a imagem";
        }else{
            //Inserir o caminho para a imagem
            echo "Inserir o caminho para a imagem";
        }
    }else{
        echo "Erro";
    }
}else{
    echo "Não foi enviado a imagem<br>";
    print_r($_FILES);
}
?>