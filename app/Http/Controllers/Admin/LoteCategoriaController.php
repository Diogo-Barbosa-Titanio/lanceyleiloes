<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LoteCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoteCategoriaController extends Controller
{
    public function index()
    {
        $lotesCategorias = new LoteCategoria();
        $listarLotesCategorias = $lotesCategorias->listarCadastros();

        $success = Session::get('lote_categoria_status');

        return view('admin/lotes_categorias/lote_categoria',['lotes_categorias' => $listarLotesCategorias,'success' => $success]);
    }

    public function create()
    {
        return view('admin/lotes_categorias/lote_categoria_create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required',
            'tipo' => 'required'
        ],$this->messages(),$this->attributes());

        $dados = ['nome' => $request->post('nome'), 'tipo' =>  $request->post('tipo')];

        $lotesCategorias = new LoteCategoria();

        if($lotesCategorias->gravar($dados)) {

            $request->session()->flash('lote_categoria_status', 'Nova categoria gravada com sucesso.');

            return redirect('/admin/lotes_categorias');

        }

        return redirect('/admin/lotes_categorias/create');

    }

    protected function messages() {
        //Example: return ['nome.required' => 'O :attribute é obrigatório.'];
        return [];
    }

    protected function attributes() {
        //Example: return ['nome' => 'Nome'];
        return [];
    }
}
