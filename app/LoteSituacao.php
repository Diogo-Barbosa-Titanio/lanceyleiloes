<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoteSituacao extends Model
{

    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $situacoes = DB::select($query);

        return $situacoes;
    }


    protected function sqlQuery()
    {
        $query = 'SELECT
                        id, 
                        nome
                    FROM 
                        lotes_situacoes';
        return $query;
    }
}
