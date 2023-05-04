<?php
//Cadastrar
//require_once("..\\Assets\\conection.php");
//include_once("..\\Assets\\functions.php");

// $conc = new Conexao();
// $nameErr = $usernameErr = $senhaErr = $genderErr = $idadeErr = "";
// $name = $username = $senha = $gender = $idade = "";

//Codigo de redirecionamento
//header("Location: .$newURL.php");
//die();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cadastrar.css" />
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
                    <br />
                    <span class="login-form-title">
                        Entrar
                    </span>
                    <br>
                    <div class="wrap-input validate-input" data-validate="Entre username">
                        <input class="input" type="text" id="fuser" name="fuser" placeholder="Nome do Usuario" required>
                        <span class="focus-input" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="wrap-input validate-input" data-validate="Entre password">
                        <input class="input" type="password" id="fpass" name="fpass" placeholder="Senha" required>
                        <span class="focus-input" data-placeholder="&#xf191;"></span>
                    </div>
                    <br />
                    <div class="ctn-login-form-btn">
                        <button class="login-form-btn">
                            Login
                        </button>
                    </div> -->
                    <span class="login-form-title">Cadastrar</span><br>

                    <label for="fname">Nome:</label><br>
                    <input type="text" id="fname" name="fname" required><br><br>

                    <label for="fuser">Username:</label><br>
                    <input type="text" id="fuser" name="fuser" required><br><br>

                    <label for="fpass">Senha:</label><br>
                    <input type="password" id="fpass" name="fpass" required><br><br>

                    <label for="fgenero">Genero:</label><br>
                    <input type="radio" id="fgenero" name="fgenero" checked="true" value="M"><label for="mas">Masculino</label><br>
                    <input type="radio" id="fgenero" name="fgenero" value="F"><label for="fem">Feminino</label><br>
                    <input type="radio" id="fgenero" name="fgenero" value="O"><label for="out">Outro</label><br><br>

                    <label for="fidade">Idade:</label><br>
                    <input type="number" id="fidade" name="fidade" value="1" min="1" max="127" /><br><br>
                    <div class="ctn-login-form-btn">
                        <button class="login-form-btn" type="submit">Cadastrar</button><br/>
                        <button class="login-form-btn" type="reset">Redefinir</button>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</body>

</html>