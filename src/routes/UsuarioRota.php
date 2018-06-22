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
require_once RAIZ.'\..\model\Usuario.php';
require_once RAIZ.'\..\dao\UsuarioDAO.php';

$app->group('/usuario', function () use ($app) {

    $app->get('/getlista', function (Request $request, Response $response){
        $dao = new usuarioDAO();
        $response->getBody()->write(json_encode($dao->getLista()));
    });

    $app->post('/inserir', function (Request $request, Response $response) {

        $verifica = parametros('usuario');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria usuario
            $usuario = new Usuario();
            $usuario->setEmail($requestData['email']);
            $usuario->setSenha($requestData['senha']);
            $usuario->setCpf($requestData['cpf']);

            //Insere
            $dao = new usuarioDAO();
            $resposta = resposta($dao->inserir($usuario));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/alterar', function (Request $request, Response $response) {

        $verifica = parametros('usuario');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria usuario
            $usuario = new Usuario();
            $usuario->setIdUsuario($requestData['idusuario']);
            $usuario->setEmail($requestData['email']);
            $usuario->setSenha($requestData['senha']);
            $usuario->setCpf($requestData['cpf']);

            //Altera
            $dao = new usuarioDAO();
            $resposta = resposta($dao->alterar($usuario));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/excluir', function (Request $request, Response $response) {

        $verifica = parametros('usuario');

        if ($verifica->getErro()){

            $requestData = $request->getParsedBody();

            //Cria usuario
            $usuario = new Usuario();
            $usuario->setIdUsuario($requestData['idusuario']);

            //Exclui
            $dao = new usuarioDAO();
            $resposta = resposta($dao->alterar($usuario));

        }else{

            $resposta = $verifica->getResposta();

        }

        $response->getBody()->write(json_encode($resposta));

    });

    $app->post('/pesquisar', function (Request $request, Response $response) {

    });

});