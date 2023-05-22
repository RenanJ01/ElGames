<?php
const criptkey = "1409";

//Login//
function Login($con, $user)
{
    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fpass"])) {
            header("Location: ..\Access\login.html");
            exit;
        } else {
            $pass = tratar_input($_POST["fpass"]);
        }
        if (empty($_POST["fuser"])) {
            header("Location: ..\Access\login.html");
            exit;
        } else {
            $username = tratar_input($_POST["fuser"]);
        }
    } else {
        header("Location: ..\Access\login.html");
        exit;
    }

    //Verificação do usuário/senha digitados
    $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username_users = '". $username ."' LIMIT 1;");
    // $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username_users = '". $username."' AND senha_users = '".$pass."' LIMIT 1;");

    if (count($verf) == 1 && password_verify($pass, $verf[0]['senha_users'])) {

        // Salva os dados encontados na variável $resultado
        $resultado = $verf;
        
        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION))session_start();

        // Salva os dados encontrados na sessão
        $user->username = decryptData($resultado[0]['username_users'], criptkey);
        $user->nome = decryptData($resultado[0]['nome_users'], criptkey);
        $user->genero = $resultado[0]['genero_users'];
        $user->idade = $resultado[0]['idade_users'];
        $_SESSION["Usuario"] = $user;
        header("Location: ..\..\painel.php");
        exit;
    } else {
        //Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado.
        // echo "Login inválido!<br>";
        // echo $username."<br>";
        // print_r(count($verf));
        header("Location: ..\login.html");
        exit;
    }
}

function VerfLogin()
{
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) {
        session_start();
    }

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

    Verif_var($username);
    Verif_var($senha);
    Verif_var($idade);
    Verif_var($gender);
    Verif_var($name);

    $criptname = encryptData($name, criptkey);
    $criptsenha = password_hash($senha, PASSWORD_DEFAULT);

    $res = $conc->Con_Insert_cadastro($criptname, $username, $criptsenha, $gender, $idade);

    if ($res) {
        return $res = "Bem Sucedido";
    }else{
        return $res = "Ocorreu um erro.";
    }
}

// Função para criptografar
function encryptData($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    $encryptedData = base64_encode($iv . $encryptedData);
    return $encryptedData;
}

// Função para descriptografar
function decryptData($encryptedData, $key) {
    $encryptedData = base64_decode($encryptedData);
    $ivSize = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($encryptedData, 0, $ivSize);
    $encryptedData = substr($encryptedData, $ivSize);
    $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return $decryptedData;
}