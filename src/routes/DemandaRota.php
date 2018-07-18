<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 23:50
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . "\..\util\Funcoes.php";
require_once RAIZ.'\..\model\Demanda.php';
require_once RAIZ.'\..\model\Veiculo.php';
require_once RAIZ.'\..\model\Usuario.php';
require_once RAIZ . "\..\dao\DemandaDAO.php";

$app->group('/demanda', function () use ($app) {

    $app->get('/getlista', function (Request $request, Response $response){

        $dao = new demandaDAO();
        $response->getBody()->write(json_encode($dao->getLista()));

    });

    $app->post('/inserir', function (Request $request, Response $response) {

        $verifica = parametros('demanda');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria demanda
            $demanda = new Demanda();
            $demanda->setEstado($requestData['estado']);
            $demanda->setNota($requestData['nota']);
            $demanda->setComentario($requestData['comentario']);

            //Cria usuario
            $usuario = new Usuario();
            $usuario->setIdUsuario($requestData['idusuario']);
            $demanda->setUsuario($usuario);

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo ->setIdVeiculo($requestData['idveiculo']);
            $demanda->setVeiculo($veiculo);

            //Insere
            $dao = new demandaDAO();
            $resposta = resposta($dao->inserir($demanda));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/alterar', function (Request $request, Response $response) {

        $verifica = parametros('demanda');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria demanda
            $demanda = new Demanda();
            $demanda->setIdDemanda($requestData['iddemanda']);
            $demanda->setEstado($requestData['estado']);
            $demanda->setNota($requestData['nota']);
            $demanda->setComentario($requestData['comentario']);

            //Cria usuario
            $usuario = new Usuario();
            $usuario->setIdUsuario($requestData['idusuario']);
            $demanda->setUsuario($usuario);

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo ->setIdVeiculo($requestData['idveiculo']);
            $demanda->setVeiculo($veiculo);

            //Altera
            $dao = new demandaDAO();
            $resposta = resposta($dao->alterar($demanda));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/cancelar', function (Request $request, Response $response) {

        $verifica = parametros('demanda');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Seta demanda
            $demanda = new Demanda();
            $demanda->setIdDemanda($requestData['iddemanda']);

            //Cancela
            $dao = new demandaDAO();
            $resposta = resposta($dao->excluir($demanda));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/pesquisar', function (Request $request, Response $response) {

        $verifica = parametros('idveiculo');

        if ($verifica->getErro()){

        }else{

        }

    });

});