<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Administrador extends Model
{

    public function alterar(array $dados)
    {

        $query = $this->sqlQueryUpdate();

        DB::transaction(function () use ($query, $dados) {


            $id = $dados[':id'];
            $email = $dados[':email'];
            $password = $dados[':password'];
            $name = $dados[':nome'];
            $login = $dados[':login'];

            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;

            if(!empty($password)){
                $user->password = Hash::make($password);
            }

            $user->save();

            DB::update($query, [':login' => $login, ':id' => $id]);

        });

        return true;
    }

    public function gravar(array $dados)
    {

        $query = $this->sqlQueryInsert();

        DB::transaction(function () use ($query, $dados) {


            $user = User::create([
                'name' => $dados[':nome'],
                'email' => $dados[':email'],
                'password' => Hash::make($dados[':password'])
            ]);

            $dados[':id_users'] = $user->id;


            DB::insert($query, [':id_users' => $user->id, ':login' => $dados[':login'], ':tipo' => 'AD' ] );

        });

        return true;
    }


    public function apagar(array $dados)
    {

        $query = $this->sqlQueryDelete();

        DB::transaction(function () use ($query, $dados) {

            DB::delete($query, $dados);

            DB::delete('DELETE FROM users WHERE id = :id',$dados);

        });

        return true;
    }

    public function listarCadastro($id)
    {
        $query = $this->sqlQuery();
        $query .= ' AND a.id = '.$id;

        $cadastro = DB::select($query);

        return $cadastro;
    }

    public function listarCadastros()
    {
        $query = $this->sqlQuery();

        $cadastros = DB::select($query);

        return $cadastros;
    }

    protected function sqlQuery()
    {
        $query = 'SELECT a.id as id,
                         a.email as email,
                         a.name as nome,
                         b.login as login,
                         b.tipo as tipo                        
                    FROM users as a
               LEFT JOIN users_administradores as b
                      ON a.id = b.id_users 
                   WHERE 1 = 1
                     AND b.tipo = "AD"';

        return $query;
    }

    protected function sqlQueryInsert()
    {
        $query = 'INSERT INTO users_administradores  
                              (id_users,login,tipo,created_at,updated_at)
                       VALUES (:id_users,:login,:tipo,NOW(),NOW())';
        return $query;
    }

    protected function sqlQueryUpdate()
    {
        $query = 'UPDATE users_administradores  
                     SET login = :login,                        
                         updated_at = NOW()
                   WHERE id_users = :id';
        return $query;
    }

    protected function sqlQueryDelete()
    {
        $query = 'DELETE FROM users_administradores WHERE id_users = :id';

        return $query;
    }
}
