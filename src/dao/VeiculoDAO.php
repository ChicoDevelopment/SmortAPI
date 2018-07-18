<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 19:55
 */

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . "\..\util\Conexao.php";

//Working

class veiculoDAO
{

    private $con;

    function __construct()
    {
        $db = new Conexao();
        $this->con = $db->connect();
    }

    function inserir(Veiculo $veiculo)
    {
        $stmt = $this->con->prepare("INSERT INTO veiculo (idTipo, modelo, idMarca, cor, placa) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("isiss",
            $veiculo->getTipo()->getIdTipo(),
            $veiculo->getModelo(),
            $veiculo->getMarca()->getIdMarca(),
            $veiculo->getCor(),
            $veiculo->getPlaca());

            return $stmt->execute();
    }

    function alterar(Veiculo $veiculo)
    {

        $stmt = $this->con->prepare("UPDATE veiculo SET idTipo = ?, modelo = ?, idMarca = ?, cor = ?, placa = ? WHERE idVeiculo like ?;");

        $stmt->bind_param("isissi",
            $veiculo->getTipo()->getIdTipo(),
            $veiculo->getModelo(),
            $veiculo->getMarca()->getIdMarca(),
            $veiculo->getCor(),
            $veiculo->getPlaca(),
            $veiculo->getIdVeiculo());

        return $stmt->execute();

    }

    function getLista()
    {

        $stmt = $this->con->prepare("SELECT * FROM veiculo v JOIN marca m ON v.idMarca = m.idMarca;");

        $stmt->execute();

        $stmt->bind_result($idVeiculo, $idTipo, $modelo, $idMarca, $cor, $placa, $idTransportador, $idMarca, $descricao);
        $listaVeiculos = array();

        while ($stmt->fetch()) {

            $marca = array();
            $marca["idMarca"] = $idMarca;
            $marca["descricao"] = $descricao;

            $tipo = array();
            $tipo["idTipo"] = $idTipo;
            $tipo["descricao"] = $descricao;

            $veiculo = array();
            $veiculo["idveiculo"] = $idVeiculo;
            $veiculo["placa"] = $placa;
            $veiculo["modelo"] = $modelo;
            $veiculo["cor"] = $cor;
            $veiculo["marca"] = $marca;
            $veiculo["tipo"] = $tipo;

            array_push($listaVeiculos, $veiculo);
        }

        return $listaVeiculos;

    }

    function excluir(Veiculo $veiculo)
    {

        $stmt = $this->con->prepare("DELETE FROM veiculo WHERE idVeiculo like ?;");

        $stmt->bind_param(i,
            $veiculo->getIdVeiculo());

        return $stmt->execute();
    }

    function pesquisar(Veiculo $veiculo)
    {

        $stmt = $this->con->prepare("SELECT * FROM veiculo v 
                                             JOIN marca m ON v.idMarca = m.idMarca 
                                             JOIN tipoveiculo t ON v.idTipo = t.idTipo 
                                            WHERE placa = ?;");

        $stmt->bind_param("s",
        $veiculo->getPlaca());

        $stmt->execute();

        $stmt->bind_result($idVeiculo, $idTipo, $modelo, $idMarca, $cor, $placa, $idTransportador, $idMarca, $descricaoMarca, $idTipo, $descricaoTipo);

        while ($stmt->fetch()) {

            $marca = array();
            $marca["idmarca"] = $idMarca;
            $marca["descricaomarca"] = $descricaoMarca;

            $tipo = array();
            $tipo["idtipo"] = $idTipo;
            $tipo["descricaotipo"] = $descricaoTipo;

            $veiculo = array();
            $veiculo["idveiculo"] = $idVeiculo;
            $veiculo["placa"] = $placa;
            $veiculo["modelo"] = $modelo;
            $veiculo["cor"] = $cor;
            $veiculo["marca"] = $marca;
            $veiculo["tipo"] = $tipo;

        }

        return $veiculo;

    }

}