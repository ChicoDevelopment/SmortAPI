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
require_once RAIZ . '\..\model\Veiculo.php';
require_once RAIZ . '\..\model\TipoVeiculo.php';
require_once RAIZ . '\..\model\Marca.php';
require_once RAIZ . '\..\model\Transportador.php';
require_once RAIZ . '\..\dao\VeiculoDAO.php';

$app->group('/veiculo', function () use ($app) {

    $app->get('/getlista', function (Request $request, Response $response) {
        $dao = new veiculoDAO();
        $response->getBody()->write(json_encode($dao->getLista()));
    });

    $app->post('/inserir', function (Request $request, Response $response) {

        $verifica = parametros('veiculo');

        if ($verifica->getErro()) {

            $dadosGerais = $request->getParsedBody();

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo->setModelo($dadosGerais['modelo']);
            $veiculo->setCor($dadosGerais['cor']);
            $veiculo->setPlaca($dadosGerais['placa']);

            //Cria tipo
            $dadosTipo = $dadosGerais['tipo'];
            $tipo = new TipoVeiculo();
            $tipo->setIdTipo($dadosTipo['idtipo']);
            $veiculo->setTipo($tipo);

            //Cria marca
            $dadosMarca = $dadosGerais['marca'];
            $marca = new Marca();
            $marca->setIdMarca($dadosMarca['idmarca']);
            $veiculo->setMarca($marca);

            //Cria transportador
            $dadosTransportador = $dadosGerais['transportador'];
            $transportador = new Transportador();
            $transportador->setIdTransportador($dadosTransportador['idtransportador']);
            $veiculo->setTransportador($transportador);

            //Insere
            $dao = new veiculoDAO();

            $resposta = resposta($dao->inserir($veiculo));

        } else {

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/alterar', function (Request $request, Response $response) {

        $verifica = parametros('veiculo');

        if ($verifica->getErro()) {

            $dadosGerais = $request->getParsedBody();

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo->setIdVeiculo($dadosGerais['idveiculo']);
            $veiculo->setModelo($dadosGerais['modelo']);
            $veiculo->setCor($dadosGerais['cor']);
            $veiculo->setPlaca($dadosGerais['placa']);

            //Cria tipo
            $dadosTipo = $dadosGerais['tipo'];
            $tipo = new TipoVeiculo();
            $tipo->setIdTipo($dadosTipo['idtipo']);
            $veiculo->setTipo($tipo);

            //Cria marca
            $dadosMarca = $dadosGerais['marca'];
            $marca = new Marca();
            $marca->setIdMarca($dadosMarca['idmarca']);
            $veiculo->setMarca($marca);

            //Cria transportador
            $dadosTransportador = $dadosGerais['transportador'];
            $transportador = new Transportador();
            $transportador->setIdTransportador($dadosTransportador['idtransportador']);
            $veiculo->setTransportador($transportador);

            //Altera
            $dao = new veiculoDAO();
            $resposta = resposta($dao->alterar($veiculo));

        } else {

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/excluir', function (Request $request, Response $response) {

        $verifica = parametros('veiculo');

        if ($verifica->getErro()) {

            $dadosGerais = $request->getParsedBody();

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo->setIdVeiculo($dadosGerais['idveiculo']);

            //Exclui
            $dao = new veiculoDAO();


            /*$resposta = array();
            $resposta['erro'] = false;
            $resposta['mensagem'] = json_encode($dadosGerais);
            */

            $resposta = resposta($dao->excluir($veiculo));

        } else {

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/pesquisar', function (Request $request, Response $response) {

        $verifica = parametros('veiculo');

        if ($verifica->getErro()) {

            $dadosGerais = $request->getParsedBody();

            //Cria veiculo
            $veiculo = new Veiculo();
            $veiculo->setPlaca($dadosGerais['placa']);

            //Pesquisa
            $dao = new veiculoDAO();
            $resposta = $dao->pesquisar($veiculo);

        } else {

            $response->withStatus(202);

        }

        if (is_array($resposta)){
            $response->getBody()->write(json_encode($resposta, JSON_UNESCAPED_UNICODE));
        }
    });

});