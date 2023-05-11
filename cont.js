function SendCookies() {

    if (window.XMLHttpRequest){
        /* code for IE7+, Firefox, Chrome, Opera, Safari */
        xmlhttp = new XMLHttpRequest(); 
    }
    else{
         /* code for IE6, IE5 */ 
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
    }

    //http://localhost:8080/ElGames/Interno/Assets/contador.php
    xmlhttp.open("POST", "http://localhost:8080/ElGames/Interno/Assets/contador.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xmlhttp.setRequestHeader("Content-type", "multipart/form-data");
    xmlhttp.send("cont=1");
    
}