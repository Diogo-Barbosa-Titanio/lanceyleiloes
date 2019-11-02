<?php

namespace App\Http\Controllers\Admin;

use App\Comitente;
use App\Helper;
use App\Leilao;
use App\LeilaoNatureza;
use App\LeilaoTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LeilaoController extends Controller
{
    public function index()
    {
        $leiloes = new Leilao();
        $listarLeiloes = $leiloes->listarCadastros();

        $success = Session::get('leiloes_status');

        return view('admin/leiloes/leilao',['leiloes' => $listarLeiloes,'success' => $success]);
    }

    public function create()
    {
        $comitentes = new Comitente();
        $listarComitentes = $comitentes->listarCadastros();

        $tipos = new LeilaoTipo();
        $listarTipos = $tipos->listarCadastros();

        $naturezas = new LeilaoNatureza();
        $listarNaturezas = $naturezas->listarCadastros();

        return view('admin/leiloes/leilao_create', ['comitentes' => $listarComitentes, 'tipos' => $listarTipos, 'naturezas' => $listarNaturezas] );
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');

        $cadastro = new Leilao();
        $listarLeiloes = $cadastro->listarCadastro($id);

        $comitentes = new Comitente();
        $listarComitentes = $comitentes->listarCadastros();

        $tipos = new LeilaoTipo();
        $listarTipos = $tipos->listarCadastros();

        $naturezas = new LeilaoNatureza();
        $listarNaturezas = $naturezas->listarCadastros();


        return view('admin/leiloes/leilao_update',['leiloes' => $listarLeiloes,'comitentes' => $listarComitentes, 'tipos' => $listarTipos, 'naturezas' => $listarNaturezas]);


    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'codigo' => 'required',
            'descricao' => 'required',
            'comitente' => 'required',
            'tipo' => 'required',
            'natureza' => 'required',
            'edital' => 'required'
        ],$this->messages(),$this->attributes());


        $fileFoto = $request->file('foto');

        $pathFoto = Helper::createFile($fileFoto,'leiloes');

        $fileEdital = $request->file('edital');

        $pathEdital = Helper::createFile($fileEdital,'leiloes','editais');

        $dados = [
            ':nome' => $request->post('nome'),
            ':codigo' => $request->post('codigo'),
            ':descricao' => $request->post('descricao'),
            ':id_leiloes_comitentes' => $request->post('comitente'),
            ':id_leiloes_tipos' => $request->post('tipo'),
            ':id_leiloes_naturezas' => $request->post('natureza'),
            ':foto' => $pathFoto,
            ':edital' => $pathEdital
        ];

        $cadastro = new Leilao();

        if($cadastro->gravar($dados)){
            $request->session()->flash('leilao_status', 'Leilão gravado com sucesso.');
            return redirect('/admin/leiloes');
        }

        return redirect('/admin/leiloes/create');

    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'codigo' => 'required',
            'descricao' => 'required',
            'comitente' => 'required',
            'tipo' => 'required',
            'natureza' => 'required'
        ],$this->messages(),$this->attributes());

        $fileFoto = $request->file('foto');

        $pathFoto = Helper::createFile($fileFoto,'leiloes');

        if(!empty($pathFoto)) {
            $foto_antiga = 'public'.$request->post('foto_atual');
            Helper::deleteFile($foto_antiga);
        } else {
            $pathFoto = $request->post('foto_atual');
        }


        $fileEdital = $request->file('edital');

        $pathEdital = Helper::createFile($fileEdital,'leiloes','editais');

        if(!empty($pathEdital)) {
            $edital_antigo = 'public'.$request->post('edital_atual');
            Helper::deleteFile($edital_antigo);
        } else {
            $pathEdital = $request->post('edital_atual');
        }

        $dados = [
            ':id' => $request->post('id'),
            ':nome' => $request->post('nome'),
            ':codigo' => $request->post('codigo'),
            ':descricao' => $request->post('descricao'),
            ':id_leiloes_comitentes' => $request->post('comitente'),
            ':id_leiloes_tipos' => $request->post('tipo'),
            ':id_leiloes_naturezas' => $request->post('natureza'),
            ':foto' => $pathFoto,
            ':edital' => $pathEdital
        ];

        $cadastro = new Leilao();

        if($cadastro->alterar($dados)){
            $request->session()->flash('leilao_status', 'Leilão alterado com sucesso.');
            return redirect('/admin/leiloes');
        }

        $url = '/admin/leiloes/edit?id='.$dados[':id'];
        return redirect($url);
    }

    public function destroy(Request $request)
    {
        $foto = 'public'.$request->post('foto');
        Helper::deleteFile($foto);
        $edital = 'public'.$request->post('edital');
        Helper::deleteFile($edital);

        $dados = [
            ':id' => $request->post('id')
        ];

        $cadastro = new Leilao();

        if($cadastro->apagar($dados)){
            $request->session()->flash('leilao_status', 'Leilão apagado com sucesso.');
            return redirect('/admin/leiloes');
        }
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
