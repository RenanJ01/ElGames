<?php

class Usuario
{
    public $username;
    public $nome;
    public $genero;
    public $idade;
    public $img;
}

function SalvarImagem($file, $pasta, $tipos)
{
    $nomeFinal = $_SESSION["Usuario"]->username;
    $tipo = strrchr($file["name"], ".");
    $tamanho = $file["size"];
    $arquivoPermitido = false;

    for ($i = 0; $i < count($tipos); $i++) {
        if ($tipos[$i] == $tipo) {
            $arquivoPermitido = true;
        }
    }

    if ($arquivoPermitido == false) {
        return "Extensão de arquivo não permitida!";
    }

    if (move_uploaded_file($file["tmp_name"], $pasta . DIRECTORY_SEPARATOR . $nomeFinal . $tipo)) {
        return "O arquivo foi salvo com sucesso.";
    } else {
        return "O arquivo não foi salvo com sucesso.";
    }
}
