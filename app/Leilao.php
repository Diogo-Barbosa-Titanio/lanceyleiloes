<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Leilao extends Model
{

    public function listarCadastro($id)
    {
        $query = $this->sqlQuery();
        $query .= ' AND a.id = '.$id;

        $cadastro = DB::select($query);

        return $cadastro;
    }

    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $leiloes = DB::select($query);

        return $leiloes;

    }

    public function alterar(array $dados)
    {

        $query = $this->sqlQueryUpdate();

        DB::transaction(function () use ($query, $dados) {

            DB::update($query, $dados);

        });

        return true;
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

    public function apagar(array $dados)
    {

        $query = $this->sqlQueryDelete();

        DB::transaction(function () use ($query, $dados) {

            DB::delete($query, $dados);

        });

        return true;
    }

    protected function sqlQuery()
    {
        $query = 'SELECT a.id, 
                         a.id_leiloes_comitentes,
                         a.id_leiloes_tipos,
                         a.id_leiloes_naturezas,
                         a.nome,
                         a.descricao,
                         a.foto,
                         a.codigo,
                         a.edital,
                         b.nome as tipo,
                         c.nome as comitente,
                         d.nome as natureza
                    FROM leiloes as a 
               LEFT JOIN leiloes_tipos as b
                      ON a.id_leiloes_tipos = b.id
               LEFT JOIN leiloes_comitentes as c
                      ON a.id_leiloes_comitentes = c.id 
               LEFT JOIN leiloes_naturezas as d
                      ON a.id_leiloes_naturezas = d.id 
                   WHERE 1 = 1';
        return $query;
    }


    protected function sqlQueryInsert()
    {
        $query = 'INSERT INTO leiloes  
                              (id_leiloes_comitentes,id_leiloes_tipos,id_leiloes_naturezas,nome,descricao,foto,codigo,edital,created_at,updated_at)
                       VALUES (:id_leiloes_comitentes,:id_leiloes_tipos,:id_leiloes_naturezas,:nome,:descricao,:foto,:codigo,:edital,NOW(),NOW())';
        return $query;
    }

    protected function sqlQueryUpdate()
    {
        $query = 'UPDATE leiloes  
                     SET id_leiloes_comitentes = :id_leiloes_comitentes,
                         id_leiloes_tipos = :id_leiloes_tipos,
                         id_leiloes_naturezas = :id_leiloes_naturezas,
                         nome = :nome,
                         descricao = :descricao,                         
                         foto = :foto,                         
                         codigo = :codigo,
                         edital = :edital,
                         updated_at = NOW()
                   WHERE id = :id';
        return $query;
    }

    protected function sqlQueryDelete()
    {
        $query = 'DELETE FROM leiloes WHERE id = :id';

        return $query;
    }

}
