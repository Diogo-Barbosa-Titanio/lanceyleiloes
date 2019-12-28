<?php

namespace App\Http\Controllers\Front;

use App\PessoaFisica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PessoaFisicaController extends Controller
{
    public function create()
    {
        return view('front/pessoa_fisica');
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
            'telefone' => 'required',
            'cep' => 'required',
            'senha' => 'required',
            'confirma_senha' => 'required|same:senha'
        ],$this->messages(),$this->attributes());

         $dados = [
             ':nome' => $request->post('nome'),
             ':email' => $request->post('email'),
             ':cpf' => $request->post('cpf'),
             ':rg' => $request->post('rg'),
             ':sexo' => $request->post('sexo'),
             ':nascimento' => $request->post('nascimento'),
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
             ':senha' => $request->post('senha')
         ];

         $cadastro = new PessoaFisica();

         if($cadastro->gravar($dados)){

             if($this->login($dados[':email'],$dados[':senha'])){

                 return redirect('/home');

             }

         }

         return redirect('/pessoa_fisica');

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
            'cep' => 'CEP'
        ];
    }

    protected function login($email,$password)
    {
        $credentials = ['email' => $email, 'password' => $password];

        if(Auth::attempt($credentials)){
            return true;
        }
        return false;
    }

}
