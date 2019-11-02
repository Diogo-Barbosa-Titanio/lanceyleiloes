<?php

namespace App\Http\Controllers\Admin;

use App\Lote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = new Lote();
        $listarLotes = $lotes->listarLotes();

        $success = Session::get('lote_status');

        return view('admin/lotes/lote',['lotes' => $listarLotes,'success' => $success]);
    }

    public function create(Request $request)
    {
        return view('admin/lotes/lote_create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'login' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'

        ],$this->messages(),$this->attributes());


        $dados = [
            ':nome' => $request->post('nome'),
            ':email' => $request->post('email'),
            ':password' => $request->post('password'),
            ':login' => $request->post('login')
        ];

        $cadastro = new Lote();

        if($cadastro->gravar($dados)){
            $request->session()->flash('lote_status', 'Novo lote gravado com sucesso.');
            return redirect('/admin/lotes');
        }

        return redirect('/admin/lotes/create');

    }
}
