<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lote extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lotes';

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
    private $id_lote;

    /**
     * Aqui insiro os campos que desejo usar na minha consulta com seus respectivos "aliases"
     *
     * @var array
     */
    private $campos = ['lotes.id as id',
                       'lotes.id_leiloes as id_leiloes',
                       'lotes.id_lotes_categorias as id_lotes_categorias',
                       'lotes.nome as nome_lote',
                       'lotes.descricao as descricao_lote',
                       'lotes.data_inicio as data_inicio',
                       'lotes.data_fim as data_fim',
                       'lotes.hora_inicio as hora_inicio',
                       'lotes.hora_fim as hora_fim',
                       'lotes.lance_inicial as lance_inicial',
                       'lotes.lance_minimo as lance_minimo',
                       'leiloes.nome as nome_leilao',
                       'lotes_situacoes.nome as nome_situacao',
                       'lotes_categorias.nome as nome_categoria',
                       'lotes_enderecos.cep as cep',
                       'lotes_enderecos.endereco as endereco',
                       'lotes_enderecos.numero as numero',
                       'lotes_enderecos.complemento as complemento',
                       'lotes_enderecos.bairro as bairro',
                       'lotes_enderecos.cidade as cidade',
                       'lotes_enderecos.estado as estado',
                       'lotes_caracteristicas.id_lotes_fases_das_obras as id_lotes_fases_das_obras',
                       'lotes_caracteristicas.area_privativa as area_privativa',
                       'lotes_caracteristicas.quartos as quartos',
                       'lotes_caracteristicas.suites as suites',
                       'lotes_caracteristicas.vagas as vagas',
                       'lotes_caracteristicas.banheiros as banheiros',
                       'lotes_caracteristicas.desocupado as desocupado',
                       'lotes_caracteristicas.academia as academia',
                       'lotes_caracteristicas.bicicletario as bicicletario',
                       'lotes_caracteristicas.brinquedoteca as brinquedoteca',
                       'lotes_caracteristicas.campo_de_futebol as campo_de_futebol',
                       'lotes_caracteristicas.churrasqueira as churrasqueira',
                       'lotes_caracteristicas.cinema as cinema',
                       'lotes_caracteristicas.pet_care as pet_care',
                       'lotes_caracteristicas.piscina as piscina',
                       'lotes_caracteristicas.piscina_infantil as piscina_infantil',
                       'lotes_caracteristicas.pista_de_skate as pista_de_skate',
                       'lotes_caracteristicas.playground as playground',
                       'lotes_caracteristicas.quadra_de_squash as quadra_de_squash',
                       'lotes_caracteristicas.quadra_de_tenis as quadra_de_tenis',
                       'lotes_caracteristicas.restaurante as restaurante',
                       'lotes_caracteristicas.sala_de_massagem as sala_de_massagem',
                       'lotes_caracteristicas.salao_de_beleza as salao_de_beleza',
                       'lotes_caracteristicas.salao_de_festas as salao_de_festas',
                       'lotes_caracteristicas.salao_de_festas_infantil as salao_de_festas_infantil',
                       'lotes_caracteristicas.salao_de_jogos as salao_de_jogos',
                       'lotes_caracteristicas.sauna as sauna',
                       'lotes_caracteristicas.spa as spa',
                       'lotes_caracteristicas.vagas_de_visitantes as vagas_de_visitantes'];



    protected function sqlQuerySelect(array $campos)
    {

        $lotes = Lote::select($campos)
                    ->selectRaw('(select nome from leiloes_tipos where id = leiloes.id_leiloes_tipos) as tipo_leilao')
                    ->selectRaw('(select nome from leiloes_naturezas where id = leiloes.id_leiloes_naturezas) as natureza')
                    ->selectRaw('(select nome from lotes_fases_das_obras where id = lotes_caracteristicas.id_lotes_fases_das_obras) as fase_da_obra')
                    ->selectRaw('(select foto from lotes_fotos where id_lotes = lotes.id and foto is not NULL order by id limit 1) as foto')
                    ->selectRaw('(select max(lances) from lotes_lances where id_lotes = lotes.id) as lance_atual')
                    ->leftJoin('leiloes', 'lotes.id_leiloes', '=', 'leiloes.id' )
                    ->leftJoin('lotes_situacoes', 'lotes.id_lotes_situacoes', '=', 'lotes_situacoes.id' )
                    ->leftJoin('lotes_categorias', 'lotes.id_lotes_categorias', '=', 'lotes_categorias.id' )
                    ->leftJoin('lotes_enderecos', 'lotes.id', '=', 'lotes_enderecos.id_lotes')
                    ->leftJoin('lotes_caracteristicas', 'lotes.id', '=', 'lotes_caracteristicas.id_lotes');


        /*$lotes = DB::table('lotes')
            ->leftJoin('leiloes', 'lotes.id_leiloes', '=', 'leiloes.id' )
            ->leftJoin('lotes_situacoes', 'lotes.id_lotes_situacoes', '=', 'lotes_situacoes.id' )
            ->leftJoin('lotes_categorias', 'lotes.id_lotes_categorias', '=', 'lotes_categorias.id' )
            ->leftJoin('lotes_enderecos', 'lotes.id', '=', 'lotes_enderecos.id_lotes')
            ->leftJoin('lotes_caracteristicas', 'lotes.id', '=', 'lotes_caracteristicas.id_lotes')
            ->select($campos);*/

        return $lotes;
    }


    public function listarCadastro(int $id)
    {

        $lotes = $this->sqlQuerySelect($this->campos)
                      ->where('lotes.id','=',$id)
                      ->get();

        return $lotes;
    }


    public function listarCadastros()
    {

        $lotes = $this->sqlQuerySelect($this->campos)->get();

        return $lotes;

    }

    public function listarLeiloesAbertos()
    {
        $lotes = $this->sqlQuerySelect($this->campos)
                      ->where('lotes_situacoes.id','=',2)
                      ->get();

        return $lotes;
    }

    public function listarLeiloesNaoArrematados()
    {
        $lotes = $this->sqlQuerySelect($this->campos)
            ->where('lotes_situacoes.id','=',4)
            ->get();

        return $lotes;
    }

    public function alterar(array $dados)
    {

        DB::transaction(function () use ($dados) {

            $dados_lote = [
                'id_leiloes' => $dados[':id_leiloes'],
                'id_lotes_categorias' => $dados[':id_lotes_categorias'],
                'nome' => $dados[':nome'],
                'descricao' => $dados[':descricao'],
                'lance_inicial' => $dados[':lance_inicial'],
                'lance_minimo' => $dados[':lance_minimo'],
                'data_inicio' => $dados[':data_inicio'],
                'data_fim' => $dados[':data_fim'],
                'hora_inicio' => $dados[':hora_inicio'],
                'hora_fim' => $dados[':hora_fim'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->setIdLote($dados[':id']);

            Lote::where('id',$dados[':id'])->update($dados_lote);

            /*DB::table('lotes')->where('id',$dados[':id'])->update($dados_lote);*/

            $dados_lote_endereco = [
                'cep' => $dados[':cep'],
                'estado' => $dados[':estado'],
                'cidade' => $dados[':cidade'],
                'bairro' => $dados[':estado'],
                'endereco' => $dados[':endereco'],
                'updated_at' => date('Y-m-d H:i:s')
            ];

            DB::table('lotes_enderecos')
                ->where('id_lotes','=',$dados[':id'])
                ->update($dados_lote_endereco);

            $dados_lote_caracteristicas = [
                'id_lotes_fases_das_obras' => $dados[':id_lotes_fases_das_obras'],
                'area_privativa' => $dados[':area_privativa'],
                'quartos' => $dados[':quartos'],
                'suites' => $dados[':suites'],
                'vagas' => $dados[':vagas'],
                'banheiros' => $dados[':banheiros'],
                'desocupado' => $dados[':desocupado'],
                'academia' => $dados[':academia'],
                'bicicletario' => $dados[':bicicletario'],
                'brinquedoteca' => $dados[':brinquedoteca'],
                'campo_de_futebol' => $dados[':campo_de_futebol'],
                'churrasqueira' => $dados[':churrasqueira'],
                'cinema' => $dados[':cinema'],
                'pet_care' => $dados[':pet_care'],
                'piscina' => $dados[':piscina'],
                'piscina_infantil' => $dados[':piscina_infantil'],
                'pista_de_skate' => $dados[':pista_de_skate'],
                'playground' => $dados[':playground'],
                'quadra_de_squash' => $dados[':quadra_de_squash'],
                'quadra_de_tenis' => $dados[':quadra_de_tenis'],
                'restaurante' => $dados[':restaurante'],
                'sala_de_massagem' => $dados[':sala_de_massagem'],
                'salao_de_beleza' => $dados[':salao_de_beleza'],
                'salao_de_festas' => $dados[':salao_de_festas'],
                'salao_de_festas_infantil' => $dados[':salao_de_festas_infantil'],
                'salao_de_jogos' => $dados[':salao_de_jogos'],
                'sauna' => $dados[':sauna'],
                'spa' => $dados[':spa'],
                'vagas_de_visitantes' => $dados[':vagas_de_visitantes'],
                'updated_at' => date('Y-m-d H:i:s')

            ];

            DB::table('lotes_caracteristicas')
                ->where('id_lotes','=',$dados[':id'])
                ->update($dados_lote_caracteristicas);

        });

        return true;
    }

    public function gravar(array $dados)
    {

        DB::transaction(function () use ($dados) {

            $dados_lote = [
                'id_leiloes' => $dados[':id_leiloes'],
                'id_lotes_categorias' => $dados[':id_lotes_categorias'],
                'nome' => $dados[':nome'],
                'descricao' => $dados[':descricao'],
                'lance_inicial' => $dados[':lance_inicial'],
                'lance_minimo' => $dados[':lance_minimo'],
                'data_inicio' => $dados[':data_inicio'],
                'data_fim' => $dados[':data_fim'],
                'hora_inicio' => $dados[':hora_inicio'],
                'hora_fim' => $dados[':hora_fim'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $id_lote = DB::table('lotes')->insertGetId($dados_lote);

            $this->setIdLote($id_lote);

            $dados_lote_endereco = [
                'id_lotes' => $id_lote,
                'cep' => $dados[':cep'],
                'estado' => $dados[':estado'],
                'cidade' => $dados[':cidade'],
                'bairro' => $dados[':estado'],
                'endereco' => $dados[':endereco'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            DB::table('lotes_enderecos')->insert($dados_lote_endereco);

            $dados_lote_caracteristicas = [
                'id_lotes' => $id_lote,
                'id_lotes_fases_das_obras' => $dados[':id_lotes_fases_das_obras'],
                'area_privativa' => $dados[':area_privativa'],
                'quartos' => $dados[':quartos'],
                'suites' => $dados[':suites'],
                'vagas' => $dados[':vagas'],
                'banheiros' => $dados[':banheiros'],
                'desocupado' => $dados[':desocupado'],
                'academia' => $dados[':academia'],
                'bicicletario' => $dados[':bicicletario'],
                'brinquedoteca' => $dados[':brinquedoteca'],
                'campo_de_futebol' => $dados[':campo_de_futebol'],
                'churrasqueira' => $dados[':churrasqueira'],
                'cinema' => $dados[':cinema'],
                'pet_care' => $dados[':pet_care'],
                'piscina' => $dados[':piscina'],
                'piscina_infantil' => $dados[':piscina_infantil'],
                'pista_de_skate' => $dados[':pista_de_skate'],
                'playground' => $dados[':playground'],
                'quadra_de_squash' => $dados[':quadra_de_squash'],
                'quadra_de_tenis' => $dados[':quadra_de_tenis'],
                'restaurante' => $dados[':restaurante'],
                'sala_de_massagem' => $dados[':sala_de_massagem'],
                'salao_de_beleza' => $dados[':salao_de_beleza'],
                'salao_de_festas' => $dados[':salao_de_festas'],
                'salao_de_festas_infantil' => $dados[':salao_de_festas_infantil'],
                'salao_de_jogos' => $dados[':salao_de_jogos'],
                'sauna' => $dados[':sauna'],
                'spa' => $dados[':spa'],
                'vagas_de_visitantes' => $dados[':vagas_de_visitantes'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ];

            DB::table('lotes_caracteristicas')->insert($dados_lote_caracteristicas);

        });

        return true;
    }


    public function apagar(array $dados)
    {

        DB::transaction(function () use ($dados) {

            DB::table('lotes_fotos')->where('id_lotes','=',$dados[':id'])->delete();

            DB::table('lotes_caracteristicas')->where('id_lotes','=',$dados[':id'])->delete();

            DB::table('lotes_enderecos')->where('id_lotes','=',$dados[':id'])->delete();

            DB::table('lotes')->where('id','=',$dados[':id'])->delete();

        });

        return true;

    }


    final private function setIdLote(int $id) {
        $this->id_lote = $id;
    }


    final public function getIdLote()
    {
        return $this->id_lote;
    }


}
