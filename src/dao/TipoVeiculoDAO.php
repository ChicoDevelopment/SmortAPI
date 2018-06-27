<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 22/06/2018
 * Time: 22:55
 */

require_once __DIR__ . "/../util/Constantes.php";

require_once RAIZ . "\..\util\Conexao.php";
require_once RAIZ . "\..\model\TipoVeiculo.php";

class TipoVeiculoDAO
{
    private $con;

    function __construct()
    {
        $db = new Conexao();
        $this->con = $db->connect();
    }

    function getLista()
    {

        $stmt = $this->con->prepare("SELECT * FROM tipoveiculo;");
        $stmt->execute();

        $stmt->bind_result($idTipo, $descricao);
        $listaTipos = array();

        while ($stmt->fetch()) {

            $tipo = array();
            $tipo["idtipo"] = $idTipo;
            $tipo["descricaotipo"] = $descricao;

            array_push($listaTipos, $tipo);
        }

        return $listaTipos;

    }

}