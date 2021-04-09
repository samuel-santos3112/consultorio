<?php

namespace App\Util;

use App\Entity\Especialidade;

class EspecialidadeUtil
{
    /**
     * @param string $dados
     * @return Especialidade
     */
    public static function parseJsonToObject($dados) : Especialidade
    {
        $especialidade = new Especialidade();
        $especialidade->setDescricao($dados->descricao);

        return $especialidade;
    }

}