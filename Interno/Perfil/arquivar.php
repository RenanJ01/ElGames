<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

//Verificar Login
VerfLogin();

//Verificar se a imagem foi enviada
if(isset($HTTP_POST_FILES["fileimg"]))
{
    $con = new Conexao();
    $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username = " . $_SESSION["Usuario"]->username . ";");
    if(count($verf)){
        $id_user = $verf[0]["id_users"];

        $query = $con->Con_Select("SELECT * FROM tb_usuarios_img WHERE username = " . $id_user . ";");
        if(count($query) > 0){
            //Atualizar o caminho para a imagem

        }else{
            //Inserir o caminho para a imagem
        }
    }else{
        echo "Erro";
    }
}
?>