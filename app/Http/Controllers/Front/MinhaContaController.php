<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MinhaContaController extends Controller
{

    public function Cadastro()
    {
        if(Auth::check()) {
            return view('front.minha_conta.cadastro');
        }

        return redirect('login');
    }

    public function Documentos()
    {

    }

    public function LeiloesQueParticipo()
    {

    }

    public function LotesArrematados()
    {

    }

    public function MeusLances()
    {

    }

}
