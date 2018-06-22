<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 20:29
 */

require_once __DIR__ . "/../util/constantes.php";
require_once RAIZ."\..\model\Pessoa.php";

class Transportador extends Pessoa
{

    private $idTransportador;
    private $cnh;
    private $reputacao;
    private $pessoa;
    private $listaVeiculo;

    /**
     * @return mixed
     */
    public function getIdTransportador()
    {
        return $this->idTransportador;
    }

    /**
     * @param mixed $idTransportador
     */
    public function setIdTransportador($idTransportador)
    {
        $this->idTransportador = $idTransportador;
    }

    /**
     * @return mixed
     */
    public function getCnh()
    {
        return $this->cnh;
    }

    /**
     * @param mixed $cnh
     */
    public function setCnh($cnh)
    {
        $this->cnh = $cnh;
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
    public function getListaVeiculo()
    {
        return $this->listaVeiculo;
    }

    /**
     * @param mixed $listaVeiculo
     */
    public function setListaVeiculo($listaVeiculo)
    {
        $this->listaVeiculo = $listaVeiculo;
    }

}