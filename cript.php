<?php
// Chave para criptografia
$key = "1409";

// Dados a serem criptografados
$data = "Gab";

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

// Exemplo de uso
$encrypted = encryptData($data, $key);
echo "Dado criptografado: " . $encrypted . "<br>";

$keyuser = password_hash("Gab0123", PASSWORD_DEFAULT);
echo "Dado hashado: " . $keyuser . "<br>";
$gab = '$2y$10$K80BFB.N9didhnPZufmKJuRtVISbsnfonfD5Jv4cRrKJ6nlN3WHMG';
$gabse = '$2y$10$I0ZsbGSn7FYlq/kWKsMOQeB5NqCjEc9PH.gAREi2.OOY3jLdEsMeC';

if(password_verify("Gab0123", $gabse)){
    echo "Deu bom<br>";
}

$decrypted = decryptData($encrypted, $key);
echo "Dado descriptografado: " . $decrypted;
?>
