<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $query = $this->select($campos)
                      ->selectRaw('(CASE
                                        WHEN lotes_categorias.tipo = 1 THEN "Residencial"
                                        WHEN lotes_categorias.tipo = 2 THEN "Comercial"
                                        ELSE "Indefinido"
                                    END) as tipo_nome');
        return $query;
    }

    public function listarCadastros()
    {
        $result = $this->sqlQuerySelect($this->campos)->get();

        return $result;
    }

    public function listarCadastro(int $id)
    {

        $result = $this->sqlQuerySelect($this->campos)
            ->where('lotes_categorias.id', '=', $id)
            ->get();

        return $result;
    }


    public function gravar(array $dados)
    {
        $this->nome = $dados['nome'];
        $this->tipo = $dados['tipo'];

        if ($this->save()) {
            return true;
        }

        return false;

    }

    public function alterar(array $dados)
    {
        $id = $dados[':id'];
        $nome = $dados[':nome'];
        $tipo = $dados[':tipo'];


        $lote_categoria = $this->find($id);

        $lote_categoria->nome = $nome;
        $lote_categoria->tipo = $tipo;

        if ($lote_categoria->save()) {
            return true;
        }

        return false;

    }

    public function apagar(array $dados)
    {
        $id = $dados[':id'];

        if ($this->destroy($id)) {
            return true;
        }

        return false;
    }

}
