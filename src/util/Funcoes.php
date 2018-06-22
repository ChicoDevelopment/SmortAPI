<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 20/06/2018
 * Time: 07:38
 */

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . '\..\model\Erro.php';


function parametros($camposrequeridos)
{

    $erro = new Erro();
    $bool = true;
    $msg = array();

    $verifica = false;
    $camposerro = "";
    $parametros = $_REQUEST;

    foreach ($camposrequeridos as $campo) {
        if (!isset($parametros[$campo]) || strlen(trim($parametros[$campo])) <= 0) {
            $verifica = true;
            $camposerro .= $campo . ', ';
        }
    }

    if ($verifica) {
        $msg['erro'] = true;
        $msg['mensagem'] = 'Campo(s) requerido(s) ' . substr($camposerro, 0, -2) . ' estao faltando ou vazios';
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
        $resposta['mensagem'] = 'Acao realizada com sucesso';
    } else {
        $resposta['erro'] = true;
        $resposta['mensagem'] = 'Algum erro ocorreu';
    }

    return $resposta;
}