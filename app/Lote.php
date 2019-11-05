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

        $query = $this->sqlQueryInsert();

        DB::transaction(function () use ($query, $dados) {

            DB::insert($query, [
                ':id_leiloes_comitentes' => $dados[':id_leiloes_comitentes'],
                ':id_leiloes_tipos' => $dados[':id_leiloes_tipos'],
                ':id_leiloes_naturezas' => $dados[':id_leiloes_naturezas'],
                ':nome' => $dados[':nome'],
                ':descricao' => $dados[':descricao'],
                ':codigo' => $dados[':codigo'],
                ':edital' => $dados[':edital'],
                ':foto' => $dados[':foto']
            ]);

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


    protected function sqlInsert()
    {
        $query = 'INSERT INTO lotes (id_leiloes,
                                     id_lotes_situacoes,
                                     id_lotes_categorias,
                                     nome,
                                     descricao,
                                     lance_inicial,
                                     lance_minimo,
                                     data_inicio,
                                     data_fim,
                                     codigo,
                                     created_at,
                                     updated_at)
                       VALUES (:id_leiloes,
                               :id_lotes_situacoes,
                               :id_lotes_categorias,
                               :nome,
                               :descricao,
                               :lance_inicial,
                               :lance_minimo,
                               :data_inicio,
                               :data_fim,
                               :codigo,
                               NOW(),
                               NOW())';
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
