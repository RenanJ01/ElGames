<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

//Verificar Login
VerfLogin(1);

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
            $nomeFinal = $_SESSION["Usuario"]->username;
            $tipo = strrchr($fileimg["name"], ".");

            if (count($query) > 0) {
                //Atualizar o caminho para a imagem
                $id_img = $query[0]["id_users_img"];
                $sqlimg = $con->Con_Update_Img($id_img, $pathFile . DIRECTORY_SEPARATOR . $nomeFinal . $tipo);

                $msg = SalvarImagem($fileimg, $pathFile, $tipos);
            } else {
                //Inserir o caminho para a imagem
                $sqlimg = $con->Con_Insert_Img($id_user, $pathFile . DIRECTORY_SEPARATOR . $nomeFinal . $tipo);

                $msg = SalvarImagem($fileimg, $pathFile, $tipos);
            }
        }
    } else {
        $msg = "O usuario não é válido.";
    }
} else {
    $msg = "Não foi enviado a imagem<br>";
}
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="perfil.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="../../Imagens/icone.ico" type="image/x-icon">
    <title>Perfil</title>
</head>

<body>
    <!-- Cabeçalho da Página -->
    <header>

        <!-- Cabeçalho - Barra de Navegação -->
        <nav>
            <ul>
                <li><a href="../painel.php" target="_self" title="Painel">
                        <i class="fa fa-home"> Painel</i>
                    </a></li>
                <li><a href="../Desenvolvimento/desen.php" target="_self" title="Desenvolvimento">
                        <i class="fa fa-gears"> Desenvolvimento</i>
                    </a></li>
                <li><a class="active" href="../Perfil/perfil.php" target="_self" title="Perfil">
                        <i class="fa fa-vcard"> Perfil</i>
                    </a></li>
                <li>
                    <div class="user">
                        <i class="fa fa-user-circle" style="color: #fff;"></i>

                        <div class="dropdown">
                            <i class="dropbtn fa fa-sort-down"></i>
                            <div class="dropdown-content">
                                <a href="../Access/login.html" target="_self">Login</a>
                                <a href="../Access/logoff.php" target="_self">Logoff</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Principal - Seções -->
    <main>
        <br><br><br>
        <!-- Principal - Seção - ElGames -->
        <section class="scn_title">
            <h1>Comunicado</h1>
            <p>
                <?php
                echo $msg;
                ?>
            </p>
            <br>
            <i class="fa fa-spinner fa-spin" style="font-size:24px; color: var(--e-global-color-1);"></i>
        </section>

        <br><br>
    </main>

    <!-- Rodapé da Pagina -->
    <footer class="main_footer container">
        <div class="content">

            <!-- Menu -->
            <div class="subfooter">

                <h3 class="titleFooter">Menu</h3>

                <ul>
                    <li><a href="../painel.php" title="Painel" target="_self">Painel</a></li>
                    <li><a href="../Desenvolvimento/desen.php" title="Desenvolvimento" target="_self">Desenvolvimento</a></li>
                    <li><a href="../Perfil/perfil.php" title="Perfil" target="_self">Perfil</a></li>
                </ul>

            </div>
        </div>

        <div class="main_footer_copy">

            <p class="m-b-footer">ElGames - 2023, todos os direitos reservados.</p>
            <p class="by">Desenvolvido por: <a href="#" title="Jonatas Renan">Jonatas Renan</a></p>
        </div>

    </footer>
    <script>
        // Accordion
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("show") == -1) {
                x.className += " show";
                x.previousElementSibling.className += " btn_template";
            } else {
                x.className = x.className.replace("show", "");
                x.previousElementSibling.className = x.previousElementSibling.className.replace(" btn_template", "");
            }
        }

        // Used to toggle the menu on smaller screens when clicking on the menu button
        function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("show") == -1) {
                x.className += " show";
            } else {
                x.className = x.className.replace(" show", "");
            }
        }

        // Redireciona o usuário para a página principal - painel
        setTimeout(function() {
            window.location.href = "perfil.php";}, 5000);
    </script>
</body>

</html>