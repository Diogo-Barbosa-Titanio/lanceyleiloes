<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LotesLances extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lotes_lances';

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
    private $campos = [
                       'lotes_lances.id_lotes as id_lotes',
                       'lotes_lances.id_leiloes as id_leiloes',
                       'lotes_lances.id_users as id_users',
                       'lotes_lances.lances as lances',
                       'lotes_lances.data_lance as data_lance'];



    protected function sqlQuerySelect(array $campos)
    {
        $query = $this->select($campos)
                      ->selectRaw('(select name from users where id = lotes_lances.id_users) as nome');
        return $query;
    }

    public function maiorLance(int $id_lote)
    {
        $maior_lance = $this->sqlQuerySelect($this->campos)
                            ->where('lotes_lances.id_lotes','=',$id_lote)->max('lotes_lances.lances');

        $result = $this->sqlQuerySelect($this->campos)
                       ->where('lotes_lances.id_lotes','=',$id_lote)
                       ->where('lotes_lances.lances','=',$maior_lance)
                       ->get();

        return $result->toJson(JSON_PRETTY_PRINT);
    }


    public function gravar(array $dados)
    {
        $this->id_lotes = $dados['id_lote'];
        $this->id_leiloes = $dados['id_leilao'];
        $this->id_users = $dados['id_user'];
        $this->lances = $dados['lance'];
        $this->data_lance = date();

        if ($this->save()) {
            return true;
        }

        return false;

    }
}
