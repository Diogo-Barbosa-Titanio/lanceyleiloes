<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comitente extends Model
{

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

            DB::insert($query, $dados);

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

    public function listarCadastro($id)
    {
        $query = $this->sqlQuery();
        $query .= ' WHERE id = '.$id;

        $cadastro = DB::select($query);

        return $cadastro;
    }

    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $cadastros = DB::select($query);

        return $cadastros;
    }

    protected function sqlQuery()
    {
        $query = 'SELECT id,
                         nome,
                         foto,
                         cpf_cnpj,
                         tipo
                   FROM leiloes_comitentes';
        return $query;
    }

    protected function sqlQueryInsert()
    {
        $query = 'INSERT INTO leiloes_comitentes  
                              (nome,foto,cpf_cnpj,tipo,created_at,updated_at)
                       VALUES (:nome,:foto, :cpf_cnpj, :tipo,NOW(),NOW())';
        return $query;
    }

    protected function sqlQueryUpdate()
    {
        $query = 'UPDATE leiloes_comitentes  
                     SET nome = :nome,
                         foto = :foto,                         
                         cpf_cnpj = :cpf_cnpj,
                         updated_at = NOW()
                   WHERE id = :id';
        return $query;
    }

    protected function sqlQueryDelete()
    {
        $query = 'DELETE FROM leiloes_comitentes WHERE id = :id';

        return $query;
    }
}
