<?php
const criptkey = "1409";

//Login//
function Login($con, $user)
{
    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fpass"])) {
            header("Location: ..\login.html");
            exit;
        } else {
            $pass = tratar_input($_POST["fpass"]);
        }
        if (empty($_POST["fuser"])) {
            header("Location: ..\login.html");
            exit;
        } else {
            $username = tratar_input($_POST["fuser"]);
        }
    } else {
        header("Location: ..\login.html");
        exit;
    }

    //Verificação do usuário/senha digitados
    $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username_users = '" . $username . "' LIMIT 1;");
    // $verf = $con->Con_Select("SELECT * FROM tb_usuarios WHERE username_users = '". $username."' AND senha_users = '".$pass."' LIMIT 1;");

    if (count($verf) == 1 && password_verify($pass, $verf[0]['senha_users'])) {

        // Salva os dados encontados na variável $resultado
        $resultado = $verf;
        $sqlimg = $con->Con_Select("SELECT * FROM tb_usuarios_img WHERE id_users = '" . $resultado[0]['id_users'] . "' LIMIT 1;");

        /* define o limitador de cache para 'private' */
        session_cache_limiter('private');
        $cache_limiter = session_cache_limiter();

        /* define o prazo do cache em 30 minutos */
        session_cache_expire(30);
        $cache_expire = session_cache_expire();

        //session_set_cookie_params(30*60, '/;', $_SERVER['HTTP_HOST'], true, true);
        $samesite = "lax";

        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)){session_set_cookie_params(30*60, '/; samesite='.$samesite, null, true, true); session_start();}

        // Salva os dados encontrados na sessão
        $user->username = $resultado[0]['username_users'];
        $user->nome = decryptData($resultado[0]['nome_users'], criptkey);
        $user->genero = $resultado[0]['genero_users'];
        $user->idade = $resultado[0]['idade_users'];
        if (count($sqlimg) == 1) {
            $user->img = $sqlimg[0]['caminho_users_img'];
        } else {
            $user->img = null;
        }
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

function VerfLogin($nivel)
{
    $samesite = "lax";
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) {
        //session_set_cookie_params(30*60, '/; samesite='.$samesite, null, true, true);
        session_start();
    }

    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION["Usuario"])) {
        Logoff($nivel);
    }
}

//Logoff//
function Logoff($nivel)
{
    session_start();
    // Apaga todas as variáveis da sessão
    $_SESSION = array();

    // Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
    // Nota: Isto destruirá a sessão, e não apenas os dados!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Por último, destrói a sessão
    session_destroy();
    switch ($nivel) {
        case -1:
            header("Location: login.html");
            break;
        case 0:
            header("Location: .\Access\login.html");
            break;
        case 1:
            header("Location: ..\Access\login.html");
            break;
        case 2:
            header("Location: ..\..\Access\login.html");
            break;
        case 3:
            header("Location: ..\..\..\Access\login.html");
            break;
    }
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
    } else {
        return $res = "Ocorreu um erro.";
    }
}

// Função para criptografar
function encryptData($data, $key)
{
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    $encryptedData = base64_encode($iv . $encryptedData);
    return $encryptedData;
}

// Função para descriptografar
function decryptData($encryptedData, $key)
{
    $encryptedData = base64_decode($encryptedData);
    $ivSize = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($encryptedData, 0, $ivSize);
    $encryptedData = substr($encryptedData, $ivSize);
    $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return $decryptedData;
}

?>