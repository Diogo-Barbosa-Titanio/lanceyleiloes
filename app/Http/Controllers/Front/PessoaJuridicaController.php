<?php

namespace App\Http\Controllers;

use App\PessoaJuridica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PessoaJuridicaController extends Controller
{
    public function create()
    {
       return view('pessoa_juridica');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'razao_social' => 'required',
            'email' => 'required',
            'cnpj' => 'required',
            'ie' => 'required',
            'telefone' => 'required',
            'cep' => 'required',
            'senha' => 'required',
            'confirma_senha' => 'required|same:senha'
        ],$this->messages(),$this->attributes());

        $dados = [
            ':razao_social' => $request->post('razao_social'),
            ':email' => $request->post('email'),
            ':cnpj' => $request->post('cnpj'),
            ':ie' => $request->post('ie'),
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

        $cadastro = new PessoaJuridica();

        if($cadastro->gravar($dados)){

            if($this->login($dados[':email'],$dados[':senha'])){

                return redirect('/home');

            }

        }

        return redirect('pessoa_juridica');
    }

    protected function messages() {
        //Example: return ['nome.required' => 'O :attribute é obrigatório.'];
        return [];
    }

    protected function attributes() {
        return [
            'razao_social' => 'Razão Social',
            'email' => 'Email',
            'cnpj' => 'CNPJ',
            'ie' => 'Inscrição Estadual',
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
