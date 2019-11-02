<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PessoaFisica extends Model
{

    public function alterar(array $dados)
    {

        $query = $this->sqlQueryUpdate();

        DB::transaction(function () use ($query, $dados) {


            $id = $dados[':id'];
            $email = $dados[':email'];
            $cpf = $dados[':cpf'];
            $rg = $dados[':rg'];
            $telefone = $dados[':telefone'];
            $celular = $dados[':celular'];
            $sexo = $dados[':sexo'];
            $nascimento = $dados[':nascimento'];
            $password = $dados[':password'];
            $name = $dados[':nome'];
            $login = $dados[':login'];
            $cep = $dados[':cep'];
            $pais = $dados[':pais'];
            $estado = $dados[':estado'];
            $cidade = $dados[':cidade'];
            $bairro = $dados[':bairro'];
            $endereco = $dados[':endereco'];
            $numero = $dados[':numero'];
            $complemento = $dados[':complemento'];


            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;

            if(!empty($password)){
                $user->password = Hash::make($password);
            }

            $user->save();

            DB::update($query, [
                ':id' => $id,
                ':login' => $login,
                ':cpf' => $cpf,
                ':rg' => $rg,
                ':sexo' => $sexo,
                ':telefone' => $telefone,
                ':celular' => $celular,
                ':nascimento' => $nascimento

            ]);

            $sqlUpdateEndereco = 'UPDATE users_enderecos  
                                     SET cep = :cep,
                                         pais = :pais,
                                         estado = :estado, 
                                         cidade = :cidade,
                                         bairro = :bairro,
                                         endereco = :endereco,
                                         numero = :numero,
                                         complemento = :complemento,                       
                                         updated_at = NOW()
                                   WHERE id_users = :id';



            DB::update($sqlUpdateEndereco, [
                ':cep' => $cep,
                ':pais' => $pais,
                ':estado' => $estado,
                ':cidade' => $cidade,
                ':bairro' => $bairro,
                ':endereco' => $endereco,
                ':numero' => $numero,
                ':complemento' => $complemento,
                ':id' => $id
            ]);


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

            DB::insert($query, [
                   ':id_users' => $user->id,
                   ':login' => $dados[':login'],
                   ':tipo' => 'PF',
                   ':cpf' => $dados[':cpf'],
                   ':rg' => $dados[':rg'],
                   ':sexo' => $dados[':sexo'],
                   ':nascimento' => $dados[':nascimento'],
                   ':telefone' => $dados[':telefone'],
                   ':celular' => $dados[':celular']
            ]);


            $sqlInsertEndereco = 'INSERT INTO users_enderecos  
                                              (id_users,cep,pais,estado,cidade,bairro,endereco,numero,complemento,created_at,updated_at)
                                       VALUES (:id_users,:cep,:pais,:estado,:cidade,:bairro,:endereco,:numero,:complemento,NOW(),NOW())';

            DB::insert($sqlInsertEndereco,[
                ':id_users' => $user->id,
                ':cep' => $dados[':cep'],
                ':pais' => $dados[':pais'],
                ':estado' => $dados[':estado'],
                ':cidade' => $dados[':cidade'],
                ':bairro' => $dados[':bairro'],
                ':endereco' => $dados[':endereco'],
                ':numero' => $dados[':numero'],
                ':complemento' => $dados[':complemento']
            ]);

        });

        return true;
    }


    public function apagar(array $dados)
    {

        $query = $this->sqlQueryDelete();

        DB::transaction(function () use ($query, $dados) {

            DB::delete('DELETE FROM users_enderecos WHERE id_users = :id',$dados);

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
                         b.cpf as cpf,
                         b.rg as rg,
                         b.nascimento as nascimento,
                         b.sexo as sexo,
                         b.telefone as telefone,
                         b.celular as celular,
                         c.cep as cep,
                         c.pais as pais,
                         c.estado as estado,
                         c.cidade as cidade,
                         c.bairro as bairro,
                         c.endereco as endereco,
                         c.numero as numero,
                         c.complemento as complemento                       
                    FROM users as a
               LEFT JOIN users_pessoas_fisicas as b
                      ON a.id = b.id_users
               LEFT JOIN users_enderecos as c 
                      ON a.id = c.id_users 
                   WHERE 1 = 1
                     AND b.tipo = "PF"';

        return $query;
    }

    protected function sqlQueryInsert()
    {
        $query = 'INSERT INTO users_pessoas_fisicas  
                              (id_users,login,tipo,cpf,rg,nascimento,sexo,telefone,celular,created_at,updated_at)
                       VALUES (:id_users,:login,:tipo,:cpf,:rg,:nascimento,:sexo,:telefone,:celular,NOW(),NOW())';
        return $query;
    }

    protected function sqlQueryUpdate()
    {
        $query = 'UPDATE users_pessoas_fisicas  
                     SET login = :login,
                         cpf = :cpf,
                         rg = :rg,
                         sexo = :sexo, 
                         telefone = :telefone,
                         nascimento = :nascimento,
                         celular = :celular,                       
                         updated_at = NOW()
                   WHERE id_users = :id';
        return $query;
    }

    protected function sqlQueryDelete()
    {
        $query = 'DELETE FROM users_pessoas_fisicas WHERE id_users = :id';

        return $query;
    }

}
