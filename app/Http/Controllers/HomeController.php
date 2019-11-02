<?php

namespace App\Http\Controllers;

use App\LeiloesCadastrados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $leiloes = new LeiloesCadastrados();
        $listarLeiloes = $leiloes->listarLeiloes();

        $leiloesAbertos = $leiloes->leiloesAbertos();
        $leiloesEmLoteamento = $leiloes->leiloesEmLoteamento();

        $leiloesNaoArrematados = $leiloes->leiloesNaoArrematados();
        $leiloesArrematados = $leiloes->leiloesArrematados();


        return view('home',['leiloesAbertos' => $leiloesAbertos,
                                  'leiloesEmLoteamento' => $leiloesEmLoteamento,
                                  'leiloesNaoArrematados' => $leiloesNaoArrematados,
                                  'leiloesArrematados' => $leiloesArrematados,]);
    }
}
