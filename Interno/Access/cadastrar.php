<?php
//Cadastrar
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
    <link rel="stylesheet" type="text/css" href="cadastrar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
    <link rel="shortcut icon" href="../../Imagens/icone.ico" type="image/x-icon">
    <title>Cadastrar</title>
</head>

<body>
    <div class="limiter">
        <div class="ctn-login">
            <div class="wrap-login">
                <form action="php/cadastro.php" method="post">
                    <!-- 
                        <span class="login-form-logo"> <i class="">Imagem</i> 
                            <img src="../../Imagens/icone.ico" alt="ElGames">
                        </span>
                     -->

                    <span class="login-form-logo">
                        <!-- <i class="">Imagem</i>  -->
                        <img src="../../Imagens/icone.ico" alt="ElGames">
                    </span><br />

                    <span class="login-form-title">Cadastrar</span><br />

                    <div class="wrap-input validate-input" data-validate="Entre Nome">
                        <input type="text" id="fname" name="fname" placeholder="Nome" class="input" required>
                        <span class="focus-input" data-placeholder="&#xf2c3;"></span>
                    </div>

                    <div class="wrap-input validate-input" data-validate="Entre Username">
                        <input type="text" id="fuser" name="fuser" placeholder="Nome do Usuario" class="input" required>
                        <span class="focus-input" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input validate-input" data-validate="Entre Senha">
                        <input type="password" id="fpass" name="fpass" placeholder="Senha" class="input" required>
                        <span class="focus-input" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="wrap-input validate-input" data-validate="Entre Genero">
                        <label class="lbl_form" for="fgenero">Gênero:</label><br>
                        <input type="radio" id="fgenero" name="fgenero" checked="true" value="M"><label for="mas">Masculino</label><br>
                        <input type="radio" id="fgenero" name="fgenero" value="F"><label for="fem">Feminino</label><br>
                        <input type="radio" id="fgenero" name="fgenero" value="O"><label for="out">Outro</label>
                    </div>

                    <div class="wrap-input validate-input" data-validate="Entre idade">
                        <input type="number" id="fidade" name="fidade" min="1" max="127" placeholder="Idade" class="input" required />
                        <span class="focus-input" data-placeholder="&#xf332;"></span>
                    </div>

                    <div class="ctn-login-form-btn">
                        <button class="login-form-btn" type="submit">Cadastrar</button><br />
                        <button class="login-form-btn" type="reset">Redefinir</button>
                    </div>
                    <br />
                </form>
            </div>
        </div>
    </div>
</body>

</html>