<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 19:55
 */

require_once __DIR__ . "/../util/Constantes.php";

require_once RAIZ . "\..\util\Conexao.php";

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

        //$stmt->bind_param("i",
        //    $idTransportador);

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

    function excluirVeiculo($idVeiculo)
    {

        $stmt = $this->con->prepare("DELETE FROM veiculo WHERE idVeiculo like ?;");

        $stmt->bind_param(i,
            $idVeiculo);

        return $stmt->execute();
    }

}