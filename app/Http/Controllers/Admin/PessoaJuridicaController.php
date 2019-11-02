<?php

namespace App\Http\Controllers\Admin;

use App\PessoaJuridica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PessoaJuridicaController extends Controller
{
    public function index()
    {
        $usuarios = new PessoaJuridica();
        $listarCadastros = $usuarios->listarCadastros();

        $success = Session::get('pessoa_juridica_status');

        return view('admin/pessoas_juridicas/pessoa_juridica',['cadastros' => $listarCadastros,'success' => $success]);
    }

    public function create()
    {
        return view('admin/pessoas_juridicas/pessoa_juridica_create');
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');

        $cadastro = new PessoaJuridica();
        $pessoa_juridica = $cadastro->listarCadastro($id);

        return view('admin/pessoas_juridicas/pessoa_juridica_update',['pessoa_juridica'=>$pessoa_juridica]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cnpj' => 'required',
            'inscricao_estadual' => 'required',
            'celular' => 'required',
            'cep' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ],$this->messages(),$this->attributes());

        $dados = [
            ':nome' => $request->post('nome'),
            ':email' => $request->post('email'),
            ':cnpj' => $request->post('cnpj'),
            ':inscricao_estadual' => $request->post('inscricao_estadual'),
            ':telefone' => $request->post('telefone'),
            ':celular' => $request->post('celular'),
            ':cep' => $request->post('cep'),
            ':endereco' => $request->post('endereco'),
            ':numero' => $request->post('numero'),
            ':complemento' => $request->post('complemento'),
            ':bairro' => $request->post('bairro'),
            ':cidade' => $request->post('cidade'),
            ':estado' => $request->post('estado'),
            ':pais' => $request->post('pais'),
            ':login' => $request->post('login'),
            ':password' => $request->post('password')
        ];

        $cadastro = new PessoaJuridica();

        if($cadastro->gravar($dados)){
            $request->session()->flash('pessoa_juridica_status', 'Nova pessoa jurídica gravada com sucesso.');
            return redirect('/admin/pessoa_juridica');
        }

        return redirect('/pessoa_juridica/create');

    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'cnpj' => 'required',
            'inscricao_estadual' => 'required',
            'celular' => 'required',
            'cep' => 'required',
            'password' => '',
            'confirm_password' => 'same:password'
        ],$this->messages(),$this->attributes());

        $dados = [
            ':id' => $request->post('id'),
            ':nome' => $request->post('nome'),
            ':email' => $request->post('email'),
            ':cnpj' => $request->post('cnpj'),
            ':inscricao_estadual' => $request->post('inscricao_estadual'),
            ':telefone' => $request->post('telefone'),
            ':celular' => $request->post('celular'),
            ':cep' => $request->post('cep'),
            ':endereco' => $request->post('endereco'),
            ':numero' => $request->post('numero'),
            ':complemento' => $request->post('complemento'),
            ':bairro' => $request->post('bairro'),
            ':cidade' => $request->post('cidade'),
            ':estado' => $request->post('estado'),
            ':pais' => $request->post('pais'),
            ':login' => $request->post('login'),
            ':password' => $request->post('password')
        ];

        $cadastro = new PessoaJuridica();

        if($cadastro->alterar($dados)){
            $request->session()->flash('pessoa_juridica_status', 'Pessoa jurídica alterado com sucesso.');
            return redirect('/admin/pessoa_juridica');
        }

    }


    public function destroy(Request $request)
    {

        $dados = [
            ':id' => $request->post('id')
        ];

        $cadastro = new PessoaJuridica();

        if($cadastro->apagar($dados)){
            $request->session()->flash('pessoa_juridica_status', 'Pessoa jurídica apagada com sucesso.');
            return redirect('/admin/pessoa_juridica');
        }
    }

    protected function messages() {
        //Example: return ['nome.required' => 'O :attribute é obrigatório.'];
        return [];
    }

    protected function attributes() {
        return [
            'nome' => 'Nome',
            'email' => 'Email',
            'cnpj' => 'CNPJ',
            'telefone' => 'Telefone',
            'cep' => 'CEP',
            'inscricao_estadual' => 'Inscrição estadual',
            'password' => 'Senha',
            'confirm_password' => 'Confirmar Senha'
        ];
    }
}
