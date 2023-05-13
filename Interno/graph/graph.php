<?php
include_once("..//Assets//conection.php");

header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = new Conexao();

    $res = $con->Con_Select("Select * From tb_visualiz;");

    echo json_encode($res);
}
