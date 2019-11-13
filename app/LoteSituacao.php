<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoteSituacao extends Model
{

    public function listarCadastros()
    {

        $campos = ['id','nome'];
        $situacoes = DB::table('lotes_situacoes')
                            ->select($campos)
                            ->get();

        return $situacoes;
    }



    public function emLoteamento()
    {

        DB::transaction(function (){
             $campos = ['id_lotes_situacoes'=> 1,'updated_at' => date('Y-m-d H:i:s')];

             //Se a data de início do leilão for ">" a data atual
              DB::table('lotes')->where('data_inicio','>',date('Y-m-d'))->update($campos);

              //Se a data de início do leilão for "=" a data atual e a hora de início ">" a hora atual
              DB::table('lotes')->where('data_inicio','=',date('Y-m-d'))
                                        ->where('hora_inicio','>',date('H:i:s'))
                                        ->update($campos);


        });

        return true;
    }

    public function aberto()
    {

        DB::transaction(function (){
            $campos = ['id_lotes_situacoes'=> 2,'updated_at' => date('Y-m-d H:i:s')];

            //Se a data de início do leilão for "<" a data atual e a data de finalização ">" que a data atual
            DB::table('lotes')->where('data_inicio','<',date('Y-m-d'))
                                    ->where('data_fim','>',date('Y-m-d'))
                                    ->update($campos);


            //Se a data de início do leilão for "=" a data atual e a hora de início for menor que a hora atual
            DB::table('lotes')->where('data_inicio','=',date('Y-m-d'))
                ->where('hora_inicio','<',date('H:i:s'))
                ->update($campos);

            //Se a data de finalização do leilão for "=" a data atual e a hora de finalização for menor que a hora atual
            DB::table('lotes')->where('data_fim','=',date('Y-m-d'))
                                    ->where('hora_fim','<',date('H:i:s'))
                                    ->update($campos);
        });


        return true;
    }





}
