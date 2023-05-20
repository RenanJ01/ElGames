<?php
require_once("Assets\\conection.php");
require_once("Assets\\functions.php");
require_once("Assets\\usuario.php");

//Verificar Login
VerfLogin();

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
            <p>BláBláBláBláBláBláBláBláBláBláBlá<br>BláBláBláBláBláBláBláBláBláBláBláBláBláBláBláBláBláBlá</p>
        </section>

        <br><br>

        <section>
            <h1>Menu</h1>
            <p>
                <a href="./Access/cadastrar.php" target="" class=""><i class="fa fa-"></i> Cadastro usuario</a>
            </p>
        </section>
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
                        color:{
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
    </script>
</body>

</html>