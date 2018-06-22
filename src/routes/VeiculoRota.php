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
require_once RAIZ.'\..\model\Veiculo.php';
require_once RAIZ.'\..\model\TipoVeiculo.php';
require_once RAIZ.'\..\model\Marca.php';
require_once RAIZ.'\..\model\Transportador.php';
require_once RAIZ . '\..\dao\VeiculoDAO.php';

$app->group('/veiculo', function () use ($app) {

    $app->get('/getlista', function (Request $request, Response $response){
        $dao = new veiculoDAO();
        $response->getBody()->write(json_encode($dao->getLista()));
    });

    $app->post('/inserir', function (Request $request, Response $response) {

        $verifica = parametros('veiculo');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo->setModelo($requestData['modelo']);
            $veiculo->setCor($requestData['cor']);
            $veiculo->setPlaca($requestData['placa']);
            
            //Cria tipo
            $tipo = new TipoVeiculo();
            $tipo->setIdTipo($requestData['idtipo']);
            $veiculo->setTipo($tipo);

            //Cria transportador
            $transportador = new Transportador();
            $transportador->setIdTransportador($requestData['idtransportador']);
            $veiculo->setTransportador($transportador);

            //Insere
            $dao = new veiculoDAO();
            $resposta = resposta($dao->inserir($veiculo));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));
        
    });

    $app->post('/alterar', function (Request $request, Response $response) {

        $verifica = parametros('veiculo');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo->setIdVeiculo($requestData['idveiculo']);
            $veiculo->setModelo($requestData['modelo']);
            $veiculo->setCor($requestData['cor']);
            $veiculo->setPlaca($requestData['placa']);

            //Cria tipo
            $tipo = new TipoVeiculo();
            $tipo->setIdTipo($requestData['idtipo']);
            $veiculo->setTipo($tipo);

            //Cria transportador
            $transportador = new Transportador();
            $transportador->setIdTransportador($requestData['idtransportador']);
            $veiculo->setTransportador($transportador);

            //Insere
            $dao = new veiculoDAO();
            $resposta = resposta($dao->alterar($veiculo));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));
        
    });

    $app->post('/excluir', function (Request $request, Response $response) {

        $verifica = parametros('veiculo');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo->setIdVeiculo($requestData['idveiculo']);

            //Exclui
            $dao = new veiculoDAO();
            $resposta = resposta($dao->alterar($veiculo));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/pesquisar', function (Request $request, Response $response) {

    });

});