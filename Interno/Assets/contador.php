<!-- function SendCookies(){

if (window.XMLHttpRequest)/* code for IE7+, Firefox, Chrome, Opera, Safari */
{ xmlhttp=new XMLHttpRequest(); }
else /* code for IE6, IE5 */
{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }

xmlhttp.onreadystatechange=function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status == 200)
    {
        alert('done');
    }
}

xmlhttp.open("GET", "/web/DEV/Classes/SetCookie.php?time=" + new Date());
xmlhttp.send();

} -->
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
//Se o cookie não existir, inicia uma
 if (!isset($_COOKIE["Vils"])){
    setcookie("Vils", "true", time()+60*60*24);
    $con = new Conexao();
    
    $con->Con_InsUpd_Vils(date("Y-m-d"));
 }
}

?>