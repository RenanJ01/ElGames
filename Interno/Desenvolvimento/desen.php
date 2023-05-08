<?php
require_once("..\\Assets\\conection.php");
require_once("..\\Assets\\functions.php");
require_once("..\\Assets\\usuario.php");

//Verificar Login
VerfLogin();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="desen.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
    <link rel="shortcut icon" href="../../Imagens/icone.ico" type="image/x-icon">
    <title>Painel - Desenvolvimento</title>
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
                <li><a class="active" href="../Desenvolvimento/desen.php" target="_self" title="Desenvolvimento">
                        <i class="fa fa-gears"> Desenvolvimento</i>
                    </a></li>
                <li><a href="../Perfil/perfil.php" target="_self" title="Perfil">
                        <i class="fa fa-vcard"> Perfil</i>
                    </a></li>
                <li>
                    <div class="user">
                        <i class="fa fa-user"></i>

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
            <h1>Desenvolvimento</h1>
        </section>

        <br>
        <h3 class="submenu" id="h3_fases" onclick="ShowAba();">Cadastrar Fase</h3>
        <br>

        <section id="scn_fases" class="hide">
            <form action="fase.php" method="post"  visible="true">
                <fieldset class="fld_form">
                    <h1>Cadastrar Fase</h1><br>

                    <label for="ftitle">Título:</label><br>
                    <input type="text" id="ftitle" name="ftitle" required><br><br>

                    <label for="fdesc">Descrição:</label><br>
                    <textarea id="fdesc" name="fdesc" required></textarea><br><br>

                    <label for="fdata">Data:</label><br>
                    <input type="date" id="fdata" name="fdata" min="2023-01-01"><br><br>

                    <div class="btn_group">
                        <input class="btn_action" type="submit" value="Cadastrar">
                        <input class="btn_action" type="reset" value="Redefinir"><br>
                    </div>
                </fieldset>
            </form>
        </section>

        <br>
        <h3 class="submenu" id="h3_dados" onclick="ShowAba2();">Visualizar Fases</h3>
        <br>

        <section id="scn_dados" class="hide">
            <table>
                <tr>
                    <th>N° da Fase</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Funções</th>
                </tr>
                <?php
                $con = new Conexao();
                $res = $con->Con_Select("Select * From tb_fases");
                $ind = 0;

                foreach ($res as $row => $item) {
                    echo '<tr id="tr' . $ind . '">';
                    echo '<td> ' . $item['id_fases'] . '</td>';
                    echo '<td> ' . $item['title_fases'] . '</td>';
                    echo '<td> ' . $item['desc_fases'] . '</td>';
                    echo '<td> ' . $item['data_fases'] . '</td>';
                    echo '<td class="function"> 
                    <button class="btn_tabela" id="btn_delete" onclick="ViewModal2(' . $ind . ')" title="Deletar"><i class="fa fa-trash"></i></button>
                    <button class="btn_tabela" id="btn_update" onclick="ViewModal(' . $ind . ')" title="Editar"><i class="fa fa-pencil"></i></button> 
                    </td>';
                    echo '</tr>';
                    $ind++;
                }

                ?>
            </table>
        </section>
        
        <!-- Modal - Editar-->
        <iframe src="./alter/update.html" frameborder="0"></iframe>
        <!-- Modal - Deletar-->
        <iframe src="./alter/delete.html" frameborder="0"></iframe>

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
        function ShowAba() {
            var aba = document.getElementById("scn_fases");

            var dpy = aba.classList.contains("hide");
            if (dpy) {
                aba.classList.remove("hide");
            } else {
                aba.classList.add("hide");
            }
        }

        function ShowAba2() {
            var aba = document.getElementById("scn_dados");

            var dpy = aba.classList.contains("hide");
            if (dpy) {
                aba.classList.remove("hide");
            } else {
                aba.classList.add("hide");
            }
        }

        //Modal
        var form = document.getElementsByTagName("form");
        var modal = document.getElementById("ctn_modal");
        var modal2 = document.getElementById("ctn_modal2");
        var btn_can = document.getElementById("btn_cancelar");
        var btn_can2 = document.getElementById("btn_cancelar2");
        var span = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close")[1];

        function ViewModal(ind) {
            var tr = document.getElementById("tr" + ind);
            var td = [tr.getElementsByTagName("td")[0].innerText, tr.getElementsByTagName("td")[1].innerText, tr.getElementsByTagName("td")[2].innerText, tr.getElementsByTagName("td")[3].innerText];

            document.getElementById("fid_upd").setAttribute("value", td[0]);
            document.getElementById("ftitle_upd").setAttribute("value", td[1]);
            document.getElementById("fdesc_upd").innerText = td[2];
            document.getElementById("fdata_upd").setAttribute("value", td[3]);
            modal.style.display = "block";
            FormV(1);
        }

        function ViewModal2(ind) {
            var tr = document.getElementById("tr" + ind);
            var td = tr.getElementsByTagName("td")[0].innerText;

            document.getElementById("fidDel").setAttribute("value", td);
            modal2.style.display = "block";
            FormV(2);
        }

        //Span close
        span.onclick = function() {
            modal.style.display = "none";
            FormV(0);
        }
        span2.onclick = function() {
            modal2.style.display = "none";
            FormV(0);
        }

        //Button Cancelar
        btn_can.onclick = function() {
            modal.style.display = "none";
            FormV(0);
        }
        btn_can2.onclick = function() {
            modal2.style.display = "none";
            FormV(0);
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                FormV(0);
            }
            if (event.target == modal2) {
                modal2.style.display = "none";
                FormV(0);
            }
        }

        function FormV(frm){
            switch (frm) {
                case 0:
                    form[0].setAttribute("visible", "true");       
                    form[1].setAttribute("visible", "false");       
                    form[2].setAttribute("visible", "false");
                    console.log(form[0]);
                break;
                case 1:
                    form[0].setAttribute("visible", "false");       
                    form[1].setAttribute("visible", "true");       
                    form[2].setAttribute("visible", "false");       
                break;
                case 2:
                    form[0].setAttribute("visible", "false");       
                    form[1].setAttribute("visible", "false");       
                    form[2].setAttribute("visible", "true");       
                break;
                default:
                    form[0].setAttribute("visible", "true");       
                    form[1].setAttribute("visible", "false");       
                    form[2].setAttribute("visible", "false");       
                break;
            }            
        }
    </script>
</body>

</html>