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
    <link rel="stylesheet" type="text/css" href="perfil.css"/>
    <title>Perfil</title>
</head>

<body>
    <!-- Cabeçalho da Página -->
    <header>

        <!-- Cabeçalho - Barra de Navegação -->
        <nav>
            <ul>
                <li><a href="..\painel.php" target="_self">Painel</a></li>
                <li><a href="..\Desenvolvimento/desen.php" target="_self">Desenvolvimento</a></li>
                <li><a class="active" href="..\Perfil/perfil.php" target="_self">Perfil</a></li>
            </ul>
        </nav>
    </header>

    <!-- Principal - Seções -->
    <main>
        <br><br>
        <!-- Principal - Seção - Titular -->
        <section class="scn_title">
            <h1>Perfil</h1>
        </section>

        <br><br>

        <figure>
            <img src="" alt="">
        </figure>
        <section class="scn_pfl">
            <?php
                echo "<h1>Nome:</h1>".$_SESSION["Usuario"]->nome."
                <h1>Username:</h1>".$_SESSION["Usuario"]->username."
                <h1>Gênero:</h1>".$_SESSION["Usuario"]->genero."
                <h1>Idade:</h1>".$_SESSION["Usuario"]->idade;
            ?>
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

</body>

</html>