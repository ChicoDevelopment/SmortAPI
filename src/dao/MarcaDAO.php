<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 22/06/2018
 * Time: 23:04
 */

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . "\..\util\Conexao.php";
require_once RAIZ . "\..\model\Marca.php";

//Working
class MarcaDAO
{
    private $con;

    function __construct()
    {
        $db = new Conexao();
        $this->con = $db->connect();
    }

    function getLista()
    {

        $stmt = $this->con->prepare("SELECT * FROM marca;");
        $stmt->execute();

        $stmt->bind_result($idMarca, $descricao);
        $listaMarcas = array();

        while ($stmt->fetch()) {

            $marca = array();
            $marca["idmarca"] = $idMarca;
            $marca["descricaomarca"] = $descricao;

            array_push($listaMarcas, $marca);
        }

        return $listaMarcas;

    }

}