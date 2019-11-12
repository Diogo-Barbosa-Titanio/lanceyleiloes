<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoteFoto extends Model
{

    public function listarCadastro(int $id)
    {
            $campos = ['id','id_lotes','nome','foto'];
            $lotesFotos = DB::table('lotes_fotos')
                           ->where('id_lotes','=',$id)
                           ->select($campos)
                           ->get();

            return $lotesFotos;
    }

    public function gravar(array $dados)
    {
        DB::transaction(function () use ($dados) {

            $dados_lotes_fotos = [
              'id_lotes' => $dados[':id_lotes'],
              'foto' => $dados[':foto'],
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
            ];

            DB::table('lotes_fotos')->insert($dados_lotes_fotos);

        });

    }


    public function alterar(array $dados)
    {
        DB::transaction(function () use ($dados) {

            $dados_lotes_fotos = [
                'foto' => $dados[':foto'],
                'updated_at' => date('Y-m-d H:i:s')
            ];

            DB::table('lotes_fotos')
                ->where('id','=',$dados[':id'])
                ->update($dados_lotes_fotos);

        });

    }
}
