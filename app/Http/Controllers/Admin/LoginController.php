<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Verificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $login = $request->post('login');
        $password = $request->post('password');

        $verificacao = new Verificacao();
        $email = $verificacao->loginAdmin($login);

       if($email) {

           //Se for jogado o valor false diretamente no email ele só validará o password
           $credentials = ['email' => $email, 'password' => $password];

           if (Auth::attempt($credentials)) {
               // Authentication passed...
               return redirect('admin/home');
           }

       }

       return view('admin/login_admin');
    }
}
