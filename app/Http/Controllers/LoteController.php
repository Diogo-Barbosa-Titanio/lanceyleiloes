<?php

namespace App\Http\Controllers;

use App\LeiloesCadastrados;
use Illuminate\Http\Request;

class LoteController extends Controller
{

    public function index(Request $request)
    {

        $id_lote = $request->id;

        $leilao = new LeiloesCadastrados();
        $listarLeilao = $leilao->listarLeilao($id_lote);
        $loteDescricao = $leilao->leilaoLoteDescricao($id_lote);


        return view('lote', ['leilao' => $listarLeilao, 'loteDescricao' => $loteDescricao]);
    }
}
