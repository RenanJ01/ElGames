<?php

//Login//
function Login($con, $user)
{
    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fpass"])) {
            header("Location: .\Access\login.html");
            exit;
        } else {
            $pass = tratar_input($_POST["fpass"]);
        }
        if (empty($_POST["fuser"])) {
            header("Location: .\Access\login.html");
            exit;
        } else {
            $username = tratar_input($_POST["fuser"]);
        }
    } else {
        header("Location: .\Access\login.html");
        exit;
    }

    //Verificação do usuário/senha digitados
    $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username_users = '". $username."' AND senha_users = '".$pass."' LIMIT 1;");
    if (count($verf) == 1) {

        // Salva os dados encontados na variável $resultado
        $resultado = $verf;
        
        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION))session_start();

        // Salva os dados encontrados na sessão
        $user->username = $resultado[0]['username_users'];
        $user->nome = $resultado[0]['nome_users'];
        $user->genero = $resultado[0]['genero_users'];
        $user->idade = $resultado[0]['idade_users'];
        $_SESSION["Usuario"] = $user;
        header("Location: ..\painel.php");
        exit;
    } else {
        //Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado.
        echo "Login inválido!";
        exit;
    }
}

function VerfLogin()
{
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();

    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION["Usuario"])) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: ..\Access\login.html");
        exit;
    }
}

//Logoff//
function Logoff()
{
    session_start();
    session_destroy();
    header("Location: ..\Access\login.html");
    exit;
}

//Cadastro//

/*Verificação dos Valores das variaveis*/
function Verif_var($data)
{
    if (is_string($data)) {
        if (($data == "") || ($data == null)) {
            $data = "Desconhecido";
        }
    } else if (is_int($data)) {
        if (($data == "") || ($data == null)) {
            $data = 0;
        }
    }
}

// Funções de Segurança na Inserção
function tratar_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Inserção das variaveis
function Cadastro($conc)
{
    //$name = $username = $senha = $idade = $gender = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $nameErr = "Nome é requisitada.";
        } else {
            $name = tratar_input($_POST["fname"]);
        }
        if (empty($_POST["fuser"])) {
            $usernameErr = "Username é requisitada.";
        } else {
            $username = tratar_input($_POST["fuser"]);
        }
        if (empty($_POST["fpass"])) {
            $senhaErr = "Senha é requisitada.";
        } else {
            $senha = tratar_input($_POST["fpass"]);
        }
        if (empty($_POST["fidade"])) {
            $idadeErr = "Idade é requisitada.";
        } else {
            $idade = tratar_input($_POST["fidade"]);
        }
        if (empty($_POST["fgenero"])) {
            $genderErr = "Genero é requisitada.";
        } else {
            $gender = tratar_input($_POST["fgenero"]);
        }
    }

    Verif_var($name);
    Verif_var($username);
    Verif_var($senha);
    Verif_var($idade);
    Verif_var($gender);

    $res = $conc->Con_Insert_cadastro($name, $username, $senha, $gender, $idade);

    if ($res) {
        return $res = "bem Sucedido";
    }
}
