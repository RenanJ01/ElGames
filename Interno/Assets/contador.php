
<?php
include_once("conection.php");
include_once("functions.php");

$verf = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["cont"])) {
        $verf = false;
    } else {
        $cont = tratar_input($_POST["cont"]);
        $verf = true;
    }
}

if($verf){
//Se o cookie não existir, cria uma
 if (!isset($_COOKIE["Vils"])){
    setcookie("Vils", "true", time()+60*60*24);
    $con = new Conexao();
    
    $con->Con_InsUpd_Vils(date("Y-m-d"));
 }
}

?>