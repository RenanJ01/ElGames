<?php
    require_once("..\\Interno\\Assets\\conection.php");

    $con = new Conexao();
    $qt_fases = false;
    $fases = $con->Con_Select("SELECT * FROM tb_fases;");
    if (count($fases) != 0) {                
        $qt_fases = true;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="desen.css">
    <link type="image/ico" rel="icon" href="../Imagens/icone.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>El Games</title>
</head>

<body>

    <!-- Cabeçalho da Página -->
    <header>

        <!-- Cabeçalho - Barra de Navegação -->
        <nav>
            <ul>
                <div>
                    <a class="logoBarra" href="../Inicio.html"><img src="../Imagens/ElGames_logo2.png"
                            alt="ElGames" height="30"></a>
                </div>
                <li><a href="../Inicio.html" target="_self">Inicio</a></li>
                <li><a href="../Jogo/jogo.html" target="_self">Jogo</a></li>
                <li><a class="active" href="#" target="_self">Desenvolvimento</a></li>
                <li><a href="../Membros/membros.html" target="_self">Membros</a></li>
                <li><a href="../Interno/Access/login.html" class="img_avatar" title="Login">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    <!-- <img src="../Imagens/login-user.png" alt="Avatar"> -->
                </a></li>
            </ul>
        </nav>

        <div class="div_img">
            <img class="hdr_img" src="Desenvolvimento.png" alt="">
        </div>
        <br><br>
    </header>

    <!-- Principal - Seções -->
    <main>
        <!-- Principal - Seção - Titular -->
        <section class="scn_title">
            <h1>Fases do Desenvolvimento</h1>
            <p>A seguir estão etapas do desenvolvimento do jogo "Nome do jogo".</p>
        </section>

        <br><br>
        <?php
            if ($qt_fases) {
                foreach ($fases as $row => $item) {
                    echo '<section class="scn_fase">';
                    echo '<h3>'.$item['title_fases'].' - Fase N° ' . $item['id_fases'] . '</h3>';
                    echo '<p> ' . $item['desc_fases'] . '</p>';
                    echo '<span class="dt"> ' . $item['data_fases'] . '</span>';
                    echo '</section>';
                }
            }else{
                echo '<section class="scn_fase">';
                echo '<h3> Não há Fases - Fase N° ?? </h3>';
                echo '<p> Nenhum </p>';
                echo '</section>';
            }
        ?>
        <br><br>
    </main>

    <!-- Rodapé da Pagina -->
    <footer class="main_footer container">
        <div class="content">

            <!-- Menu -->
            <div class="subfooter">

                <h3 class="titleFooter">Menu</h3>

                <ul>
                    <li><a href="../Inicio.html" title="Página Inícial" target="_self">Página Inícial</a></li>
                    <li><a href="../Jogo/jogo.html" title="jogo" target="_self">Jogo</a></li>
                    <li><a href="../Desenvolvimento/desen.html" title="Desenvolvimento"
                            target="_self">Desenvolvimento</a></li>
                    <li><a href="../Membros/membros.html" title="Membros" target="_self">Membros</a></li>
                </ul>

            </div>

            <!-- Contato -->
            <div class="subfooter">

                <h3 class="titleFooter">Contato</h3>

                <p><i class="fa fa-envelope"></i> elgames@gmail.com.br</p>
                <p><i class="fa fa-phone"></i> 11 99999-9999</p>
                <p><i class="fa fa-whatsapp"></i> 11 99999-9999</p>

            </div>

            <!-- Rede Sociais -->

            <div class="subfooter">

                <h3 class="titleFooter"> Redes Sociais</h3>

                <a href="#" class="botao"><span> <i class="fa fa-facebook"></i>
                    </span></a>
                <a href="#" class="botao"><span> <i class="fa fa-instagram"></i>
                    </span></a>
                <a href="#" class="botao"><span> <i class="fa fa-twitter"></i>
                    </span></a>
                <a href="#" class="botao"><span> <i class="fa fa-pinterest"></i>
                    </span></a>
            </div>

        </div>

        <div class="main_footer_copy">

            <p class="m-b-footer"> ElGames - 2023, todos os direitos
                reservados.</p>
            <p class="by">Desenvolvido por: <a href="#" title="Jonatas
                        Renan">Jonatas Renan</a></p>

        </div>

    </footer>

</body>

</html>