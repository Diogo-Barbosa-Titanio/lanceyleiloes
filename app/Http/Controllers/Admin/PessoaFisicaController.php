<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\PessoaFisica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PessoaFisicaController extends Controller
{

    public function index()
    {
        $usuarios = new PessoaFisica();
        $listarCadastros = $usuarios->listarCadastros();

        $success = Session::get('pessoa_fisica_status');

        return view('admin/pessoas_fisicas/pessoa_fisica',['cadastros' => $listarCadastros,'success' => $success]);
    }

    public function create()
    {
        return view('admin/pessoas_fisicas/pessoa_fisica_create');
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');

        $cadastro = new PessoaFisica();
        $pessoa_fisica = $cadastro->listarCadastro($id);

        return view('admin/pessoas_fisicas/pessoa_fisica_update',['pessoa_fisica'=>$pessoa_fisica]);

    }

    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'sexo' => 'required',
            'nascimento' => 'required',
            'celular' => 'required',
            'cep' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ],$this->messages(),$this->attributes());

         $dados = [
             ':nome' => $request->post('nome'),
             ':email' => $request->post('email'),
             ':cpf' => $request->post('cpf'),
             ':rg' => $request->post('rg'),
             ':sexo' => $request->post('sexo'),
             ':nascimento' => Helper::data($request->post('nascimento')),
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

         $cadastro = new PessoaFisica();

         if($cadastro->gravar($dados)){
             $request->session()->flash('pessoa_fisica_status', 'Nova pessoa física gravada com sucesso.');
             return redirect('/admin/pessoa_fisica');
         }

         return redirect('/pessoa_fisica/create');

    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'sexo' => 'required',
            'nascimento' => 'required',
            'celular' => 'required',
            'cep' => 'required',
            'password' => '',
            'confirm_password' => 'same:password'
        ],$this->messages(),$this->attributes());

        $dados = [
            ':id' => $request->post('id'),
            ':nome' => $request->post('nome'),
            ':email' => $request->post('email'),
            ':cpf' => $request->post('cpf'),
            ':rg' => $request->post('rg'),
            ':sexo' => $request->post('sexo'),
            ':nascimento' => Helper::data($request->post('nascimento')),
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

        $cadastro = new PessoaFisica();

        if($cadastro->alterar($dados)){
            $request->session()->flash('pessoa_fisica_status', 'Pessoa física alterado com sucesso.');
            return redirect('/admin/pessoa_fisica');
        }

    }


    public function destroy(Request $request)
    {

        $dados = [
            ':id' => $request->post('id')
        ];

        $cadastro = new PessoaFisica();

        if($cadastro->apagar($dados)){
            $request->session()->flash('pessoa_fisica_status', 'Pessoa física apagada com sucesso.');
            return redirect('/admin/pessoa_fisica');
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
            'cpf' => 'CPF',
            'rg' => 'RG',
            'sexo' => 'Sexo',
            'nascimento' => 'Data de Nascimento',
            'telefone' => 'Telefone',
            'cep' => 'CEP',
            'password' => 'Senha',
            'confirm_password' => 'Confirmar Senha'
        ];
    }

}
