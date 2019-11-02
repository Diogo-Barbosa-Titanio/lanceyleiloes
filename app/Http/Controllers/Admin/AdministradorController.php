<?php

namespace App\Http\Controllers\Admin;

use App\Administrador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdministradorController extends Controller
{
    public function index()
    {
        $usuarios = new Administrador();
        $listarAdministradores = $usuarios->listarCadastros();

        $success = Session::get('administrador_status');

        return view('admin/administradores/administrador',['cadastros' => $listarAdministradores,'success' => $success]);
    }

    public function create(Request $request)
    {
         return view('admin/administradores/administrador_create');
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');

        $cadastro = new Administrador();
        $administradores = $cadastro->listarCadastro($id);

        return view('admin/administradores/administrador_update',['administradores'=>$administradores]);

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

        $cadastro = new Administrador();

        if($cadastro->gravar($dados)){
            $request->session()->flash('administrador_status', 'Novo administrador gravado com sucesso.');
            return redirect('/admin/administradores');
        }

        return redirect('/admin/administradores/create');

    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'login' => 'required',
            'password' => '',
            'confirm_password' => 'same:password'
        ],$this->messages(),$this->attributes());

        $dados = [
            ':id' => $request->post('id'),
            ':nome' => $request->post('nome'),
            ':email' => $request->post('email'),
            ':login' => $request->post('login'),
            ':password' => $request->post('password')
        ];

        $cadastro = new Administrador();

        if($cadastro->alterar($dados)){
            $request->session()->flash('administrador_status', 'Administrador alterado com sucesso.');
            return redirect('/admin/administradores');
        }

    }

    public function destroy(Request $request)
    {

        $dados = [
            ':id' => $request->post('id')
        ];

        $cadastro = new Administrador();

        if($cadastro->apagar($dados)){
            $request->session()->flash('administrador_status', 'Administrador apagado com sucesso.');
            return redirect('/admin/administradores');
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
            'password' => 'Senha',
            'confirm_password' => 'Confirma Senha'
        ];
    }
}
