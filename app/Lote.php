<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lote extends Model
{
    public function listarLotes()
    {
        $query = $this->sqlQuery();

        $lotes = DB::select($query);

        return $lotes;
    }

    protected function sqlQuery()
    {
        $query = 'SELECT nome,
                         lances,
                         leiloes
                   FROM lotes';
        return $query;
    }
}
