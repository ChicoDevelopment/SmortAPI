<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 22/06/2018
 * Time: 23:05
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once __DIR__ . "/../util/Constantes.php";

require_once RAIZ . "\..\dao\MarcaDAO.php";

$app->group('/marca', function () use ($app) {

    $app->get('/getlista', function (Request $request, Response $response) {

        $dao = new MarcaDAO();
        $response->getBody()->write(json_encode($dao->getLista(), JSON_UNESCAPED_UNICODE));

    });
});
