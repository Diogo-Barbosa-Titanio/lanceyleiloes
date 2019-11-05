<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoteCategoria extends Model
{

    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $categorias = DB::select($query);

        return $categorias;
    }

    protected function sqlQuery()
    {
        $query = 'SELECT 
                        id,
                        nome
                    FROM
                        lotes_categorias
                   WHERE
                        1 = 1';
        return $query;
    }
}
