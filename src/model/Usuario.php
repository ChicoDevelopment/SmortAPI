<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 20:12
 */

require_once __DIR__ . "/../util/Constantes.php";
require_once RAIZ."\..\model\Pessoa.php";

class Usuario extends Pessoa
{

    private $idUsuario;
    private $reputacao;
    private $pessoa;
    private $listaForma;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getReputacao()
    {
        return $this->reputacao;
    }

    /**
     * @param mixed $reputacao
     */
    public function setReputacao($reputacao)
    {
        $this->reputacao = $reputacao;
    }

    /**
     * @return mixed
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * @param mixed $pessoa
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
    }

    /**
     * @return mixed
     */
    public function getListaForma()
    {
        return $this->listaForma;
    }

    /**
     * @param mixed $listaForma
     */
    public function setListaForma($listaForma)
    {
        $this->listaForma = $listaForma;
    }

}