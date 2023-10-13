<?php
require_once("../Assets/conection.php");
require_once("../Assets/functions.php");
require_once("../Assets/usuario.php");

//Verificar Login
VerfLogin(1);

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
                            if(isset($_SESSION["Usuario"]->img)){
                                echo '<img id="img_perfil" src="'.".".str_replace(dirname(__FILE__), "", $_SESSION["Usuario"]->img).'" alt="Avatar">';
                            }else{
                                echo '<img id="img_perfil" src="../../Imagens/icone.ico" alt="Avatar">';
                            }
                        ?>
                        <span id="btn_img" onclick="ViewModal();">Editar</span>
                    </p>
                    <hr>
                    <p><i class="fa fa-id-card fa-fw "></i>
                        <?php
                        echo $_SESSION["Usuario"]->nome
                        ?>
                    </p>
                    <p><i class="fa fa-birthday-cake fa-fw "></i>
                        <?php
                        echo $_SESSION["Usuario"]->idade . " anos";
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

            <!-- Modal - Imagem -->
            <div id="ctn_modal" class="modal">

                <!-- Modal content -->
                <div class="modal-content wrap-login">
                    <span class="close">&times;</span>

                    <form id="form_img" action="arquivar.php" method="post" enctype="multipart/form-data">

                        <span class="login-form-title">Imagem</span><br /><br />
                        
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

                        <input type="file" accept="image/*" id="fileuser" name="fileuser" class="input" style="-webkit-text-fill-color: #000; padding: 0;" required>

                        <div class="ctn-login-form-btn">
                            <button id="btn_imagem" class="login-form-btn" type="submit" value="Enviar" form="form_img">Enviar</button>
                            <button id="btn_cancelar" class="login-form-btn" type="reset" value="Cancelar">Cancelar</button>
                        </div>
                        <br />
                    </form>

                </div>

            </div>
            
            <!-- Modal - Visualizar Imagem -->
            <div id="ctn_modal2" class="modal-img">
                    <span class="close">&times;</span>
                    
                    <img class="modal-content-img" id="ViuImg">
                    <div id="caption"></div>
            </div>


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

        //Modal
        var modal = document.getElementById("ctn_modal");
        var btn_can = document.getElementById("btn_cancelar");
        var span = document.getElementsByClassName("close")[0];
        
        //Modal 2
        var modal2 = document.getElementById("ctn_modal2");
        var span2 = document.getElementsByClassName("close")[1];
        var img = document.getElementById("img_perfil");
        var modalImg = document.getElementById("ViuImg");
        var captionText = document.getElementById("caption");

        img.onclick = function(){
          modal2.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        function ViewModal() {
            modal.style.display = "block";
        }

        //Span close
        span.onclick = function() {
            modal.style.display = "none";
        }
        span2.onclick = function() {
            modal2.style.display = "none";
        }

        //Button Cancelar
        btn_can.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal) {
                modal2.style.display = "none";
            }
        }
    </script>
</body>

</html>