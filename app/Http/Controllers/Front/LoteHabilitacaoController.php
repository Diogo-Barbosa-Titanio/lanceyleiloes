<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\LeilaoHabilitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoteHabilitacaoController extends Controller
{
    public function habilitar(Request $request)
    {
        if(Auth::check()) {
            $id_user = $request->post('id_user');
            $id_leilao = $request->post('id_leilao');
            $id_lote = $request->post('id_lote');

            $dados=[];
            $dados['id_lote'] = $id_lote;
            $dados['id_leilao'] = $id_leilao;
            $dados['id_user'] =  $id_user;

            $leilaoHabilitacao = new LeilaoHabilitacao();

            $leilaoHabilitacao->gravar($dados);
        }
    }
}
