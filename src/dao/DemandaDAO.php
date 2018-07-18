<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 19:55
 */

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . "\..\util\Conexao.php";
require_once RAIZ . "\..\dao\DemandaDAO.php";

class demandaDAO
{

    /*
    private $con;

    function __construct()
    {
        $db = new Conexao();
        $this->con = $db->connect();
    }

    function inserir(Demanda $demanda)
    {
        $stmt = $this->con->prepare("INSERT INTO demanda (idUsuario, estado, nota, comentario, idVeiculo) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("isdsi",
            $demanda->getUsuario()->getIdUsuario(),
            $demanda->getEstado(),
            $demanda->getEstado(),
            $demanda->getComentario(),
            $demanda->getVeiculo()->getIdVeiculo());

        return $stmt->execute();
    }

    function alterar(Demanda $demanda)
    {
        $stmt = $this->con->prepare("UPDATE demanda SET idUsuario = ?, estado = ?, nota= ?, comentario = ?, idVeiculo = ? WHERE idDemanda like ?;");

        $stmt->bind_param("isdsi",
            $demanda->getUsuario()->getIdUsuario(),
            $demanda->getEstado(),
            $demanda->getEstado(),
            $demanda->getComentario(),
            $demanda->getVeiculo()->getIdVeiculo(),
            $demanda->getIdDemanda());

        return $stmt->execute();
    }

    function getLista()
    {

        $stmt = $this->con->prepare("SELECT * FROM demanda;");
        $stmt->execute();

        $stmt->bind_result($idDemanda, $idUsuario, $estado, $nota, $comentario, $idVeiculo);
        $listaDemandas = array();

        while ($stmt->fetch()) {

            $demanda = array();
            $demanda["iddemanda"] = $idDemanda;
            $demanda["idusuario"] = $idUsuario;
            $demanda["estado"] = $estado;
            $demanda["nota"] = $nota;
            $demanda["comentario"] = $comentario;
            $demanda["idveiculo"] = $idVeiculo;

            array_push($listaDemandas, $demanda);
        }

        return $listaDemandas;

    }

    function excluir(Demanda $demanda)
    {

        $stmt = $this->con->prepare("DELETE FROM demanda WHERE idDemanda like ?;");

        $stmt->bind_param(i,
            $demanda->getIdDemanda());

        return $stmt->execute();
    }

    function pesquisar(Demanda $demanda)
    {

        $stmt = $this->con->prepare("SELECT * FROM demanda d 
                                             JOIN usuario u ON u.idUsuario = d.idUsuario 
                                             JOIN veiculo v ON v.idVeiculo = d.idVeiculo 
                                            WHERE d.idUsuario = ?;");

        $stmt->bind_param("s",
            $demanda->getUsuario()->getIdUsuario());

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
*/
}