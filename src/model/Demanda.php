<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 20:47
 */

class Demanda
{

    private $idDemanda;
    private $estado;
    private $nota;
    private $comentario;
    private $usuario;
    private $veiculo;

    /**
     * @return mixed
     */
    public function getIdDemanda()
    {
        return $this->idDemanda;
    }

    /**
     * @param mixed $idDemanda
     */
    public function setIdDemanda($idDemanda)
    {
        $this->idDemanda = $idDemanda;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * @param mixed $veiculo
     */
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;
    }


}