<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 20/06/2018
 * Time: 07:38
 */

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . '\..\model\Erro.php';

//Working

function parametros($camposrequerido)
{

    $erro = new Erro();
    $bool = true;
    $msg = array();

    $verifica = false;
    $camposerro = "";
    $parametros = $_REQUEST;

    if (!isset($camposrequerido)) {
        $verifica = true;
    }

    if ($verifica) {
        $msg['erro'] = true;
        $msg['mensagem'] = 'Há um campo faltando...';
        $bool = false;

        $erro->setResposta($msg);
    }

    $erro->setErro($bool);

    return $erro;

}

function resposta($resultado)
{

    $resposta = array();

    if ($resultado == true) {
        $resposta['erro'] = false;
        $resposta['mensagem'] = 'Açãoo realizada com sucesso';
    } else {
        $resposta['erro'] = true;
        $resposta['mensagem'] = 'Algum erro ocorreu';
    }

    return $resposta;
}