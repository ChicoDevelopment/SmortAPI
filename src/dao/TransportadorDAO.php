<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 19:56
 */

require_once __DIR__ . "/../util/Constantes.php";

require_once RAIZ . "\..\util\Conexao.php";
require_once RAIZ . "\..\model\Transportador.php";

class transportadorDAO
{

    private $con;

    function __construct()
    {
        $db = new Conexao();
        $this->con = $db->connect();
    }

    function inserir(Transportador $transportador)
    {
        $stmt = $this->con->prepare("INSERT INTO transportador (reputacao, email, senha, nome, cnh) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("dsssi",
            $transportador->getReputacao(),
            $transportador->getEmail(),
            $transportador->getSenha(),
            $transportador->getNome(),
            $transportador->getCnh());

        return $stmt->execute();
    }

    function alterar(Transportador $transportador)
    {
        $stmt = $this->con->prepare("UPDATE transportador SET reputacao = ?, email = ?, senha = ?, nome = ?, cnh = ? WHERE idTransportador like ?;");

        $stmt->bind_param("dsssii",
            $transportador->getReputacao(),
            $transportador->getEmail(),
            $transportador->getSenha(),
            $transportador->getNome(),
            $transportador->getCnh(),
            $transportador->getIdTransportador());

        return $stmt->execute();
    }

    function getLista()
    {

        $stmt = $this->con->prepare("SELECT * FROM transportador;");

        $stmt->execute();

        $stmt->bind_result($idTransportador, $reputacao, $email, $senha, $nome, $cnh, $cpf);
        $listaTransportadores = array();

        while ($stmt->fetch()) {

            $transportador = array();
            $transportador["idtransportador"] = $idTransportador;
            $transportador["reputacao"] = $reputacao;
            $transportador["email"] = $email;
            $transportador["senha"] = $senha;
            $transportador["nome"] = $nome;
            $transportador["cnh"] = $cnh;
            $transportador["cpf"] = $cpf;

            array_push($listaTransportadores, $transportador);
        }

        return $listaTransportadores;

    }

    function excluir(Transportador $transportador)
    {

        $stmt = $this->con->prepare("DELETE FROM transportador WHERE idTransportador like ?;");

        $stmt->bind_param(i,
            $transportador->getIdTransportador());

        return $stmt->execute();
    }

}