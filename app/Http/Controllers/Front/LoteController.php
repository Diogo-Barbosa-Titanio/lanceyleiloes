<?php

namespace App\Http\Controllers\Front;

use App\LeilaoHabilitacao;
use App\Lote;
use App\LoteFoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoteController extends Controller
{

    public function index(Request $request)
    {

        $id_lote = $request->id;

        $lote = new Lote();
        $listarLote = $lote->listarCadastro($id_lote);

        $leilaoHabilitacao = new LeilaoHabilitacao();

        $habilitado = $leilaoHabilitacao->verificaHabilitacao(Auth::id(), $listarLote[0]->id, $listarLote[0]->id_leiloes);
        $habilitado = $habilitado ? 'true': 'false';

        $loteFoto = new LoteFoto();
        $listarFotos = $loteFoto->listarCadastro($id_lote);

        return view('front/lote', ['lote' => $listarLote, 'fotos' => $listarFotos,'habilitado' => $habilitado]);
    }
}
