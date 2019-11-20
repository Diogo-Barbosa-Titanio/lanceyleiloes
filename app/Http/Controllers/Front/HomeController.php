<?php

namespace App\Http\Controllers\Front;

use App\Lote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $leiloes = new Lote();
        /*$leiloes = new LeiloesCadastrados();
        $listarLeiloes = $leiloes->listarLeiloes();*/

        $leiloesAbertos = $leiloes->listarLeiloesAbertos();

        $leiloesNaoArrematados = $leiloes->listarLeiloesNaoArrematados();
      //  $leiloesArrematados = $leiloes->leiloesArrematados();


        return view('front/home',['leiloesAbertos' => $leiloesAbertos,
                                        'leiloesNaoArrematados' => $leiloesNaoArrematados ]);
    }
}
