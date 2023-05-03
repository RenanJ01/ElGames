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
    <title>Painel</title>
</head>

<body>
    <!-- Cabeçalho da Página -->
    <header>

        <!-- Cabeçalho - Barra de Navegação -->
        <nav>
            <ul>
                <li><a href="../painel.php" target="_self">Painel</a></li>
                <li><a class="active" href="../Desenvolvimento/desen.php" target="_self">Desenvolvimento</a></li>
                <li><a href="../Perfil/perfil.php" target="_self">Perfil</a></li>
            </ul>
        </nav>
    </header>

    <!-- Principal - Seções -->
    <main>
        <br><br>
        <!-- Principal - Seção - Titular -->
        <section class="scn_title">
            <h1>Desenvolvimento</h1>
        </section>

        <br>
        <h3 class="submenu" id="h3_fases" onclick="ShowAba();">Cadastrar Fase</h3>
        <br>

        <section id="scn_fases" class="hide">
            <form action="fase.php" method="post">
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
                    
                    foreach ($res as $row => $item) {
                        echo '<tr>';
                        echo '<td> '. $item['id_fases'] .'</td>';
                        echo '<td> '. $item['title_fases'] .'</td>';
                        echo '<td> '. $item['desc_fases'] .'</td>';
                        echo '<td> '. $item['data_fases'] .'</td>';
                        echo '<td> ferramentas </td>';
                        echo '</tr>';
                    }

                ?>
            </table>
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
    </script>
</body>

</html>
