<?php
require_once("Assets/conection.php");
require_once("Assets/functions.php");
require_once("Assets/usuario.php");

//Verificar Login
VerfLogin(0);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="painel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="shortcut icon" href=".././Imagens/icone.ico" type="image/x-icon">
    <!-- Load c3.css -->
    <link href="./graph/c3.css" rel="stylesheet">
    <!-- Load d3Interno/painel.css.js and c3.js -->
    <script src="./graph/d3-5.8.2.min.js" charset="utf-8"></script>
    <script src="./graph/c3.min.js"></script>
    <script src="./graph/jquery-1.11.0.min.js"></script>

    <title>Painel</title>
</head>

<body onload="Graph();">
    <!-- Cabeçalho da Página -->
    <header>

        <!-- Cabeçalho - Barra de Navegação -->
        <nav>
            <ul>
                <li><a class="active" href="painel.php" target="_self" title="Painel">
                        <i class="fa fa-home"> Painel</i>
                    </a></li>
                <li><a href="./Desenvolvimento/desen.php" target="_self" title="Desenvolvimento">
                        <i class="fa fa-gears"> Desenvolvimento</i>
                    </a></li>
                <li><a href="./Perfil/perfil.php" target="_self" title="Perfil">
                        <i class="fa fa-vcard"> Perfil</i>
                    </a></li>
                <li>
                    <div class="user">
                        <i class="fa fa-user-circle" style="color: #fff;"></i>

                        <div class="dropdown">
                            <i class="dropbtn fa fa-sort-down"></i>
                            <div class="dropdown-content">
                                <a href="./Access/login.html" target="_self">Login</a>
                                <a href="./Access/logoff.php" target="_self">Logoff</a>
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
            <h1>Painel</h1>
            <p>
                <?php
                echo "Bem-vindo(a) de volta, " . $_SESSION['Usuario']->nome . "!";
                ?>
            </p>
        </section>

        <br><br>

        <section class="scn_menu">
            <h1>Menu
                <span>Funções</span>
            </h1>
            <a href="./Access/cadastrar.php" target="_self" class="btn_menu"><i class="fa fa-user-plus"></i> Cadastrar novo usuario</a>
            <button onclick="ViewModal(1);" target="_self" class="btn_menu"><i class="fa fa-user-times"></i> Deletar o usuario</button>
            <button onclick="ViewModal(0);" target="_self" class="btn_menu"><i class="fa fa-file-image-o"></i> Mudar a imagem de perfil</button>
        </section>

        <!-- Modal - Imagem -->
        <div id="ctn_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content wrap-login">
                <span class="close">&times;</span>

                <form id="form_img" action="./Perfil/arquivar.php"  method="post" enctype="multipart/form-data">

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

        <!-- Modal - Deletar -->
        <div id="ctn_modal2" class="modal">

            <!-- Modal content -->
            <div class="modal-content wrap-login">
                <span class="close">&times;</span>

                <form id="form_del" action="./Access/php/excluir.php" method="post">

                    <span class="login-form-title">Deletar Usuario</span><br /><br />

                    <div class="wrap-input validate-input" data-validate="Entre Descrição">
                        <span class="textarea">Você quer mesmo excluir seu usuario permanentemente?</span>
                    </div>

                    <div class="ctn-login-form-btn">
                        <button id="btn_apagar" class="login-form-btn" type="submit" value="Deletar" form="form_del">Confirmar</button>
                        <button id="btn_cancelar2" class="login-form-btn" type="reset" value="Cancela2">Cancelar</button>
                    </div>
                    <br />
                </form>


            </div>

        </div>

        <br><br>
        <section>
            <h1>Visitas</h1>
            <div id="grafico">

            </div>
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
                    <li><a href="painel.php" title="Painel" target="_self">Painel</a></li>
                    <li><a href="./Desenvolvimento/desen.php" title="Desenvolvimento" target="_self">Desenvolvimento</a></li>
                    <li><a href="./Perfil/perfil.php" title="Perfil" target="_self">Perfil</a></li>
                </ul>

            </div>
        </div>

        <div class="main_footer_copy">

            <p class="m-b-footer">ElGames - 2023, todos os direitos reservados.</p>
            <p class="by">Desenvolvido por: <a href="#" title="Jonatas Renan">Jonatas Renan</a></p>
        </div>

    </footer>
    <script>
        const dt = [],
            cont = [];

        function Graph() {

            if (window.XMLHttpRequest) {
                /* code for IE7+, Firefox, Chrome, Opera, Safari */
                xmlhttp = new XMLHttpRequest();
            } else {
                /* code for IE6, IE5 */
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            //http://localhost:8080/ElGames/Interno/Assets/contador.php
            xmlhttp.open("GET", "http://localhost:8080/ElGames/Interno/graph/graph.php");
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onload = function() {
                var dados = JSON.parse(this.responseText);
                if (dados.length > 0) {

                    cont.push('Visitantes');
                    dt.push('x');

                    $.each(dados, function(i, obj) {
                        cont.push(parseInt(obj.cont_vils));
                        dt.push(obj.data_vils);
                    })

                    var i = 0;
                    var chart = c3.generate({
                        bindto: '#grafico',
                        data: {
                            x: 'x',
                            columns: [dt, cont]
                        },
                        color: {
                            pattern: ['var(--e-global-color-6)']
                        },
                        axis: {
                            x: {
                                type: 'timeseries',
                                tick: {
                                    format: '%Y-%m-%d'
                                }
                            }
                        }
                    });
                } else {
                    $('#grafico').html('<span>Não foram encontrados os dados!</span>');
                }
            };
            xmlhttp.send();

        }

        function Log_off() {
            $.ajax({
                url: "/Access/logoff.php",
                success: function(result) {
                    $("div").text(result);
                }
            })
        }

        //Modal
        var modal = document.getElementById("ctn_modal");
        var modal2 = document.getElementById("ctn_modal2");
        var btn_can = document.getElementById("btn_cancelar");
        var btn_can2 = document.getElementById("btn_cancelar2");
        var span = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close")[1];

        function ViewModal(ind) {
            switch (ind) {
                case 0:
                    modal.style.display = "block";
                    break;
                case 1:
                    modal2.style.display = "block";
                    break;
            }
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
        btn_can2.onclick = function() {
            modal2.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    </script>
</body>

</html>