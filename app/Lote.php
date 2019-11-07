<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lote extends Model
{

    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $lotes = DB::select($query);

        return $lotes;
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
                'data_inicio' => $dados[':data_inicio'],
                'data_fim' => $dados[':data_fim'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $id_lote = DB::table('lotes')->insertGetId($dados_lote);

            $dados_lote_endereco = [
                'id_lotes' => $id_lote,
                'cep' => $dados[':cep'],
                'pais' => $dados[':pais'],
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


    protected function sqlQuery()
    {
        $query = 'SELECT a.id as id,                         
                         a.id_leiloes as id_leiloes,
                         a.id_lotes_situacoes as id_lotes_situacoes,
                         a.id_lotes_categorias as id_lotes_categorias,
                         a.nome as nome_lote,
                         a.descricao as descricao_lote,
                         a.lance_inicial as lance_inicial,
                         a.lance_minimo as lance_minimo,
                         a.data_inicio as data_inicio,
                         a.data_fim as data_fim,
                         a.codigo as codigo_lote,
                         b.nome as nome_leilao,
                         c.nome as nome_situacao,
                         d.nome as nome_categoria                         
                    FROM lotes as a
               LEFT JOIN leiloes as b 
                      ON a.id_leiloes = b.id 
               LEFT JOIN lotes_situacoes as c 
                      ON a.id_lotes_situacoes = c.id
               LEFT JOIN lotes_categorias as d 
                      ON a.id_lotes_categorias = d.id ';
        return $query;
    }



    protected function sqlInsertSegundaPraca()
    {
        $query = 'INSERT INTO lotes_segundas_pracas (id_lotes
                                                     data_ini_segunda_praca,
                                                     data_fim_segunda_praca,
                                                     lance_inicial_segunda_praca,
                                                     lance_minimo_segunda_placa,
                                                     created_at,
                                                     updated_at)
                       VALUES (:id_lotes,
                               :data_ini_segunda_praca,
                               :data_fim_segunda_praca,
                               :lance_inicial_segunda_praca,
                               :lance_minimo_segunda_placa,
                               NOW(),
                               NOW())';

        return $query;
    }
}
