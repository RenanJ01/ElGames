<?php
include_once("..//Assets//conection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $con = new Conexao();

    $res = $con->Con_Select("Select data_vils, cont_vils From tb_visualiz;");
    echo json_encode($res);
}
