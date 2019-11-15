<?php

namespace App\Http\Controllers\Admin;

use App\Comitente;
use App\Helper;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ComitenteController extends Controller
{
    public function index()
    {
        $comitentes = new Comitente();
        $listarComitentes = $comitentes->listarCadastros();

        $success = Session::get('comitente_status');

        return view('admin/comitentes/comitente',['comitentes' => $listarComitentes,'success' => $success]);
    }

    public function create(Request $request)
    {
        $tipo = $request->get('tipo') ;

        switch($tipo){
            case 'pf':
                return view('admin/comitentes/comitente_create_pessoa_fisica');
            break;

            case 'pj':
                return view('admin/comitentes/comitente_create_pessoa_juridica');
            break;

            default:
                return redirect('admin/comitentes');
        }

    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $tipo = $request->get('tipo') ;

        $cadastro = new Comitente();
        $comitentes = $cadastro->listarCadastro($id);

        switch($tipo){
            case 'pf':
                return view('admin/comitentes/comitente_update_pessoa_fisica',['comitentes' => $comitentes]);
                break;

            case 'pj':
                return view('admin/comitentes/comitente_update_pessoa_juridica',['comitentes' => $comitentes]);
                break;

            default:
                return redirect('admin/comitentes');
        }

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'cpf_cnpj' => 'required',
            'tipo' => 'required'
        ],$this->messages(),$this->attributes());

        $file = $request->file('foto');

        $path = Helper::createFile($file,'comitentes');

        $dados = [
            ':nome' => $request->post('nome'),
            ':cpf_cnpj' => $request->post('cpf_cnpj'),
            ':tipo' => $request->post('tipo'),
            ':foto' => $path
        ];

        $cadastro = new Comitente();

        if($cadastro->gravar($dados)){
            $request->session()->flash('comitente_status', 'Comitente gravado com sucesso.');
            return redirect('/admin/comitentes');
        }

        return redirect('/admin/comitentes/create');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'cpf_cnpj' => 'required',
            'tipo' => 'required'
        ],$this->messages(),$this->attributes());

        $file = $request->file('foto');

        $path = Helper::createFile($file,'comitentes');

        if(!empty($path)) {
            $foto_antiga = 'public'.$request->post('foto_atual');
            Helper::deleteFile($foto_antiga);
        } else {
            $path = $request->post('foto_atual');
        }

        $dados = [
            ':id' => $request->post('id'),
            ':nome' => $request->post('nome'),
            ':cpf_cnpj' => $request->post('cpf_cnpj'),
            ':foto' => $path
        ];

        $cadastro = new Comitente();

        if($cadastro->alterar($dados)){
            $request->session()->flash('comitente_status', 'Comitente alterado com sucesso.');
            return redirect('/admin/comitentes');
        }

        $url = '/admin/comitentes/edit?id='.$dados[':id'].'&tipo='.$dados['tipo'];

        return redirect($url);
    }

    public function destroy(Request $request)
    {
        $foto = 'public'.$request->post('foto');
        Helper::deleteFile($foto);

        $dados = [
            ':id' => $request->post('id')
        ];

        $cadastro = new Comitente();

        if($cadastro->apagar($dados)){
            $request->session()->flash('comitente_status', 'Comitente apagado com sucesso.');
            return redirect('/admin/comitentes');
        }
    }

    public function comitenteJson()
    {
        $comitentes = new Comitente();
        $listarComitentes = $comitentes->listarCadastros();

        return response()->json($listarComitentes);
    }

    protected function messages() {
        //Example: return ['nome.required' => 'O :attribute é obrigatório.'];
        return [];
    }

    protected function attributes() {
        return [
            'nome' => 'Nome',
            'cpf_cnpj' => 'CPF/CNPJ'
        ];
    }
}
