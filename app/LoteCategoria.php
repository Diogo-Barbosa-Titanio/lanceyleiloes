<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoteCategoria extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lotes_categorias';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    /**
     * Aqui posso guardar o id do lote e recuperar
     *
     * @var int
     */
    private $id_lote_categoria;

    /**
     * Aqui insiro os campos que desejo usar na minha consulta com seus respectivos "aliases"
     *
     * @var array
     */
    private $campos = ['lotes_categorias.id as id',
                       'lotes_categorias.nome as nome',
                       'lotes_categorias.tipo as tipo'
        ];


    protected function sqlQuerySelect(array $campos)
    {
        $query = LoteCategoria::select($campos)
                          ->selectRaw('(CASE
                                            WHEN lotes_categorias.tipo = 1 THEN "Residencial"
                                            WHEN lotes_categorias.tipo = 2 THEN "Comercial"
                                            ELSE "Indefinido"
                                         END) as tipo_nome');
        return $query;
    }

    public function listarCadastros()
    {
        $query = $this->sqlQuerySelect($this->campos)->get();

        return $query;
    }

    public function gravar(array $dados)
    {
        $lotesCategorias = new LoteCategoria();

        $lotesCategorias->nome = $dados['nome'];
        $lotesCategorias->tipo = $dados['tipo'];

        $lotesCategorias->save();

        return true;
    }

}
