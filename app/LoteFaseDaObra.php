<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoteFaseDaObra extends Model
{


    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $fases_das_obras = DB::select($query);

        return $fases_das_obras;
    }


    protected function sqlQuery()
    {
        $query = 'SELECT id, 
                         nome
                    FROM lotes_fases_das_obras';

        return $query;
    }
}
