<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeilaoNatureza extends Model
{
    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $leiloes = DB::select($query);

        return $leiloes;

    }

    protected function sqlQuery()
    {
        $query = 'SELECT id, 
                         nome
                    FROM leiloes_naturezas';
        return $query;
    }


}
