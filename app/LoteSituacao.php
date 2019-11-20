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


    public function arrematado()
    {
        DB::transaction(function (){
            $campos = ['id_lotes_situacoes'=> 3,'updated_at' => date('Y-m-d H:i:s')];

            $lotes = new Lote();

            $listarLotes = $lotes->listarCadastros();

            foreach ($listarLotes as $cadastroLote) {

                // se o lance atual >= lance mínimo e a data_fim for menor que a data atual
                if(($cadastroLote->lance_atual >= $cadastroLote->lance_minimo) && ($cadastroLote->data_fim < date('Y-m-d')) ) {

                    //Se a data de fim do leilão for "<" a data atual
                    DB::table('lotes')->where('data_fim','<',date('Y-m-d'))
                                            ->where('lance_minimo','<=',$cadastroLote->lance_atual)
                                            ->where('id','=', $cadastroLote->id)
                                            ->update($campos);

                }


                // se o lance atual >= lance mínimo  e a data_fim for "=" data atual e a hora fim maior que a hora atual
                if(($cadastroLote->lance_atual >= $cadastroLote->lance_minimo) && ($cadastroLote->data_fim == date('Y-m-d')) ) {

                    //Se a data de fim do leilão for "<" a data atual
                    DB::table('lotes')->where('data_fim','=',date('Y-m-d'))
                                            ->where('hora_fim','>',date('H:i:s'))
                                            ->where('lance_minimo','<=',$cadastroLote->lance_atual)
                                            ->where('id','=', $cadastroLote->id)
                                            ->update($campos);

                }

            }

        });


        return true;
    }


    public function naoArrematado()
    {
        DB::transaction(function (){
            $campos = ['id_lotes_situacoes'=> 4,'updated_at' => date('Y-m-d H:i:s')];

            $lotes = new Lote();

            $listarLotes = $lotes->listarCadastros();

            foreach ($listarLotes as $cadastroLote) {

                // se o lance atual for null ou vazio e a data_fim for menor que a data atual
                if(empty($cadastroLote->lance_atual) && ($cadastroLote->data_fim < date('Y-m-d')) ) {

                    //Se a data de fim do leilão for "<" a data atual
                    DB::table('lotes')->where('data_fim','<',date('Y-m-d'))
                                            ->where('id','=', $cadastroLote->id)
                                            ->update($campos);

                }


                // se o lance atual for null ou vazio e a data_fim for "=" data atual e a hora fim maior que a hora atual
                if(empty($cadastroLote->lance_atual) && ($cadastroLote->data_fim == date('Y-m-d')) ) {

                    //Se a data de fim do leilão for "<" a data atual
                    DB::table('lotes')->where('data_fim','=',date('Y-m-d'))
                                            ->where('hora_fim','>',date('H:i:s'))
                                            ->where('id','=', $cadastroLote->id)
                                            ->update($campos);

                }

            }

        });


        return true;
    }


    public function emCondicional()
    {
        DB::transaction(function (){
            $campos = ['id_lotes_situacoes'=> 5,'updated_at' => date('Y-m-d H:i:s')];

            $lotes = new Lote();

            $listarLotes = $lotes->listarCadastros();

            foreach ($listarLotes as $cadastroLote) {

                // se o lance atual >= lance inicial  e a data_fim for menor que a data atual
                if(($cadastroLote->lance_atual >= $cadastroLote->lance_inicial) && ($cadastroLote->data_fim < date('Y-m-d')) ) {

                    //Se a data de fim do leilão for "<" a data atual
                    DB::table('lotes')->where('data_fim','<',date('Y-m-d'))
                        ->where('lance_minimo','>',$cadastroLote->lance_atual)
                        ->where('lance_incial','<=',$cadastroLote->lance_atual)
                        ->where('id','=', $cadastroLote->id)
                        ->update($campos);

                }


                // se o lance atual >= lance inicial e a data_fim for "=" data atual e a hora fim maior que a hora atual
                if(($cadastroLote->lance_atual >= $cadastroLote->lance_incial) && ($cadastroLote->data_fim == date('Y-m-d')) ) {

                    //Se a data de fim do leilão for "<" a data atual
                    DB::table('lotes')->where('data_fim','=',date('Y-m-d'))
                        ->where('hora_fim','>',date('H:i:s'))
                        ->where('lance_minimo','>',$cadastroLote->lance_atual)
                        ->where('lance_incial','<=',$cadastroLote->lance_atual)
                        ->where('id','=', $cadastroLote->id)
                        ->update($campos);

                }

            }

        });


        return true;
    }



}
