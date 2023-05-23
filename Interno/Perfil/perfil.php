<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

//Verificar Login
VerfLogin();

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
        <!-- Principal - Seção - Titular -->
        <section class="scn_title">
            <h1>Perfil</h1>
        </section>

        <!-- Container - Principal -->
        <div class="ctn_perfil">
            <!-- Profile -->
            <div class="scn_perfil fd_color">
                <div>
                    <h4>
                        <?php
                            echo $_SESSION["Usuario"]->username;
                        ?>
                    </h4>
                    <p class="p_img">
                        <?php
                            echo '<img src="../../Imagens/icone.ico" alt="Avatar">';
                        ?>
                    </p>
                    <hr>
                    <p><i class="fa fa-id-card fa-fw "></i> 
                        <?php
                            echo $_SESSION["Usuario"]->nome
                        ?>
                    </p>
                    <p><i class="fa fa-birthday-cake fa-fw "></i> 
                        <?php
                            echo $_SESSION["Usuario"]->idade
                        ?>
                    </p>
                    <p><i class="fa fa-neuter fa-fw "></i> 
                        <?php
                            $g = $_SESSION["Usuario"]->genero;
                            switch ($g) {
                                case 'M':
                                    echo "Masculino";
                                    break;
                                case 'F':
                                    echo "Feminino";
                                    break;

                                default:
                                    echo "Outro";
                                    break;
                            }
                        ?>
                    </p>
                </div>
            </div>
            <br>

            <!-- Abas -->
            <div class="scn_abas">
                <div class="fd_color">
                    <button onclick="myFunction('Demo1')" class="btn_aba">
                        <i class="fa fa-group fa-fw"></i> Meu Grupo</button>
                    <div id="Demo1" class="dpy_aba hide">
                        <p>David, Eriel, Jonatas, Juan, Lucas, Matheus, Wictor</p>
                    </div>
                    <button onclick="myFunction('Demo2')" class="btn_aba"><i class="fa fa-calendar-check-o fa-fw"></i> Meu Objetivo</button>
                    <div id="Demo2" class="dpy_aba hide">
                        <p>Fazer um bom TCC e zapar!</p>
                    </div>
                </div>
            </div>
            <br>

            <!-- Interesses -->
            <div class="scn_tags fd_color">
                <div>
                    <p>Interesses</p>
                    <p>
                        <span class="spn_tags">IFSP</span>
                        <span class="spn_tags">Game</span>
                        <span class="spn_tags">ElGames</span>
                        <span class="spn_tags">TCC</span>
                        <span class="spn_tags">Design</span>
                        <span class="spn_tags">Programação</span>
                        <span class="spn_tags">Amigos</span>
                        <span class="spn_tags">Arte</span>
                        <span class="spn_tags">Lembranças</span>
                    </p>
                </div>
            </div>
            <br>

            <!-- Fim do Container -->
        </div>      

        <br><br>
    </main>

    <!-- Rodapé da Pagina -->
    <footer class="main_footer container">
        <div class="content">

            <!-- Menu -->
            <div class="subfooter">

                <h3 class="titleFooter">Menu</h3>

                <ul>
                    <li><a ref="painel.php" title="Painel" target="_self">Painel</a></li>
                    <li><a href="/php/Desenvolvimento/desen.php" title="Desenvolvimento" target="_self">Desenvolvimento</a></li>
                    <li><a href="/php/Perfil/perfil.php" title="Perfil" target="_self">Perfil</a></li>
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
    </script>
</body>

</html>