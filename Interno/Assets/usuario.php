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
    if (isset($file)) {
        $nomeOriginal = $file["name"];
        $nomeFinal = hash("sha256", $_SESSION["Usuario"]->username.date("mdYHis"));
        $tipo = strrchr($file["name"], ".");
        $tamanho = $file["size"];

        for ($i = 0; $i <= count($tipos); $i++) {
            if ($tipos[$i] == $tipo) {
                $arquivoPermitido = true;
            }
        }

        if ($arquivoPermitido == false) {
            echo "Extensão de arquivo não permitido!!";
            exit;
        }

        if (move_uploaded_file($file["tmp_name"], $pasta . $nomeFinal . $tipo)) {
            return true;
        } else {
            return false;
        }
    }
}

?>