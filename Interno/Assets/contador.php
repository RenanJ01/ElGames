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
include_once("..\\..\\Assets\\connection.php");

$cont = $_POST["cont"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["cont"])) {
        header("Location: ..\Access\login.html");
        exit;
    } else {
        $pass = tratar_input($_POST["cont"]);
    }
}

// Se o cookie não existir, inicia uma
if (!isset($_COOKIE["Vils"])){
    setcookie("Vils", "1", time()+60*60*24);

}

?>