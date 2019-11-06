<?php

namespace App\Http\Controllers\Admin;

use App\Leilao;
use App\Lote;
use App\LoteCategoria;
use App\LoteFaseDaObra;
use App\LoteSituacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = new Lote();
        $listarLotes = $lotes->listarCadastros();

        $success = Session::get('lote_status');

        return view('admin/lotes/lote',['lotes' => $listarLotes,'success' => $success]);
    }

    public function create(Request $request)
    {
        $leiloes = new Leilao();
        $listarLeiloes = $leiloes->listarCadastros();

        $categorias = new LoteCategoria();
        $listarCategorias = $categorias->listarCadastros();

        $situacoes = new LoteSituacao();
        $listarSituacoes = $situacoes->listarCadastros();

        $fases_das_obras = new LoteFaseDaObra();
        $listarFasesDasObras = $fases_das_obras->listarCadastros();

        return view('admin/lotes/lote_create',[
                                         'leiloes' => $listarLeiloes,
                                         'categorias' => $listarCategorias,
                                         'situacoes' => $listarSituacoes,
                                         'fases_das_obras' => $listarFasesDasObras]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'leilao' => 'required',
            'categoria' => 'required',
            'lance_inicial' => 'required',
            'lance_minimo' => 'required'


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

    protected function messages() {
        //Example: return ['nome.required' => 'O :attribute é obrigatório.'];
        return [];
    }

    protected function attributes() {
        return [
            'nome' => 'Nome',
            'codigo' => 'Código',
            'descricao' => 'Descrição',
            'tipo' => 'Tipo de leilão',
            'comitente' => 'Comitentes',
            'natureza' => 'Natureza',
            'edital' => 'Edital'
        ];
    }

}
