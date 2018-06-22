<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 20/06/2018
 * Time: 07:52
 */

class Erro
{

    private $erro;
    private $resposta;

    /**
     * @return mixed
     */
    public function getErro()
    {
        return $this->erro;
    }

    /**
     * @param mixed $erro
     */
    public function setErro($erro)
    {
        $this->erro = $erro;
    }

    /**
     * @return mixed
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * @param mixed $resposta
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    }


}