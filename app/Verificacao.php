<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Verificacao extends Model
{
    public function loginAdmin($login)
    {
        $query = 'SELECT id,
                         id_users,
                         login
                    FROM users_administradores 
                   WHERE login = :login ';

        $user = DB::select($query,[':login' => $login]);

        if(!empty($user[0]->id)){

            $id_users = $user[0]->id_users;
            $usuario = User::find($id_users);
            return $usuario->email;
        }

        return false;
    }

    public function loginPessoaFisica($login)
    {
        $query = 'SELECT id,
                         id_users,
                         login
                    FROM users_pessoas_fisicas 
                   WHERE login = :login ';

        $user = DB::select($query,['login' => $login]);

        if(!empty($user[0]->id)){

            $id_uses = $user[0]->id_users;
            $usuario = User::find($id_uses);
            return $usuario->email;
        }

        return false;
    }

    public function loginPessoaJuridica($login)
    {
        $query = 'SELECT id,
                         id_users,
                         login
                    FROM users_pessoas_juridicas 
                   WHERE login = :login ';

        $user = DB::select($query,['login' => $login]);

        if(!empty($user[0]->id)){

            $id_uses = $user[0]->id_users;
            $usuario = User::find($id_uses);
            return $usuario->email;
        }

        return false;
    }
}
