<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 23:51
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . "\..\util\Funcoes.php";
require_once RAIZ . '\..\model\Transportador.php';
require_once RAIZ . '\..\dao\TransportadorDAO.php';

$app->group('/transportador', function () use ($app) {

    $app->get('/getlista', function (Request $request, Response $response){
        $dao = new transportadorDAO();
        $response->getBody()->write(json_encode($dao->getLista()));
    });

    $app->post('/inserir', function (Request $request, Response $response) {

        $verifica = parametros('transportador');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria transportador
            $transportador = new Transportador();
            $transportador->setCnh($requestData['cnh']);
            $transportador->setEmail($requestData['email']);
            $transportador->setSenha($requestData['senha']);
            $transportador->setCpf($requestData['cpf']);

            //Insere
            $dao = new transportadorDAO();
            $resposta = resposta($dao->inserir($transportador));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/alterar', function (Request $request, Response $response) {

        $verifica = parametros('transportador');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria transportador
            $transportador = new Transportador();
            $transportador->setIdTransportador($requestData['idtransportador']);
            $transportador->setCnh($requestData['cnh']);
            $transportador->setEmail($requestData['email']);
            $transportador->setSenha($requestData['senha']);
            $transportador->setCpf($requestData['cpf']);

            //Altera
            $dao = new transportadorDAO();
            $resposta = resposta($dao->alterar($transportador));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/excluir', function (Request $request, Response $response) {

        $verifica = parametros('transportador');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria transportador
            $transportador = new Transportador();
            $transportador->setIdTransportador($requestData['idtransportador']);

            //Exclui
            $dao = new transportadorDAO();
            $resposta = resposta($dao->alterar($transportador));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/pesquisar', function (Request $request, Response $response) {

    });

});