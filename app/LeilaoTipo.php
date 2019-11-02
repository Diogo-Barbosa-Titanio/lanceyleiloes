<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeilaoTipo extends Model
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
                    FROM leiloes_tipos';
        return $query;
    }


}
