<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 19/06/2018
 * Time: 20:32
 */

class FormaPagamento
{

    private $idForma;
    private $descricao;
    private $tipo;

    /**
     * @return mixed
     */
    public function getIdForma()
    {
        return $this->idForma;
    }

    /**
     * @param mixed $idForma
     */
    public function setIdForma($idForma)
    {
        $this->idForma = $idForma;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }


}