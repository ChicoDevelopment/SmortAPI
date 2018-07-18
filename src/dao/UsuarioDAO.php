<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 19:56
 */

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ . "\..\util\Conexao.php";

class usuarioDAO
{

    private $con;

    function __construct()
    {
        $db = new Conexao();
        $this->con = $db->connect();
    }

    function inserir(Usuario $usuario)
    {
        $stmt = $this->con->prepare("INSERT INTO usuario (reputacao, email, senha, nome, cpf) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("dsssi",
            $usuario->getReputacao(),
            $usuario->getEmail(),
            $usuario->getSenha(),
            $usuario->getNome(),
            $usuario->getCpf());

        return $stmt->execute();
    }

    function alterar(Usuario $usuario)
    {
        $stmt = $this->con->prepare("UPDATE usuario SET reputacao = ?, email = ?, senha = ?, nome = ?, cpf = ? WHERE idUsuario like ?;");

        $stmt->bind_param("dsssii",
            $usuario->getReputacao(),
            $usuario->getEmail(),
            $usuario->getSenha(),
            $usuario->getNome(),
            $usuario->getCpf(),
            $usuario->getIdUsuario());

        return $stmt->execute();
    }

    function getLista()
    {

        $stmt = $this->con->prepare("SELECT * FROM usuario;");

        $stmt->execute();

        $stmt->bind_result($idUsuario, $reputacao, $email, $senha, $nome, $cpf);
        $listaUsuarios = array();

        while ($stmt->fetch()) {

            $usuario = array();
            $usuario["idusuario"] = $idUsuario;
            $usuario["reputacao"] = $reputacao;
            $usuario["email"] = $email;
            $usuario["senha"] = $senha;
            $usuario["nome"] = $nome;
            $usuario["cpf"] = $cpf;

            array_push($listaUsuarios, $usuario);
        }

        return $listaUsuarios;

    }

    function excluir($idUsuario)
    {

        $stmt = $this->con->prepare("DELETE FROM usuario WHERE idUsuario like ?;");

        $stmt->bind_param(i,
            $idUsuario);

        return $stmt->execute();
    }

}