<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeilaoHabilitacao extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leiloes_habilitacoes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';



    /**
     * Aqui insiro os campos que desejo usar na minha consulta com seus respectivos "aliases"
     *
     * @var array
     */
    private $campos = ['id','id_lotes','id_leiloes','id_users'];


    protected function sqlQuerySelect(array $campos)
    {
        $query = $this->select($campos);
        return $query;
    }

    public function listarCadastros()
    {
        $result = $this->sqlQuerySelect($this->campos)->get();

        return $result;
    }

    public function listarCadastro(int $id)
    {

        $result = $this->sqlQuerySelect($this->campos)->where('id', '=', $id)->get();

        return $result;
    }


    public function verificaHabilitacao(int $id_user, int $id_lote, int $id_leilao) {

        $result = $this->sqlQuerySelect($this->campos)
                        ->where('id_lotes', '=', $id_lote)
                        ->where('id_leiloes', '=', $id_leilao)
                        ->where('id_users', '=', $id_user)->get();

        foreach ($result as $habilitacao){
            return true;
        }

        return false;

    }

    public function gravar(array $dados)
    {
        $this->id_lotes = $dados['id_lote'];
        $this->id_leiloes = $dados['id_leilao'];
        $this->id_users = $dados['id_user'];

        if ($this->save()) {
            return true;
        }

        return false;

    }


}
