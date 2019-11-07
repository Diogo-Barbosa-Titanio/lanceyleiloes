<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helper extends Model
{

    /**
     * Com esta função eu crio o arquivo dentro da pasta indicada
     * e retorno seu endereço e nome.
     * @param mixed $file
     * @param  string $subPasta
     * @param  string $pasta
     * @return string
     */
    public static function createFile($file, string $subPasta, string $pasta = 'images')
    {
        $path = '';

        if(!empty($file)){
            if($file->isValid()) {
                $id_user = Auth::user()->id;
                $data = date('Ymd_His');
                $arquivo_nome = $subPasta.'_'.$id_user.'_'.$data;
                $arquivo_extensao = $file->extension();
                $arquivo = $arquivo_nome.'.'.$arquivo_extensao;
                $path = Storage::putFileAs('public/'.$pasta.'/'.$subPasta, $file,$arquivo);
                $path = Str::replaceFirst('public','',$path);
            }
        }

        return $path;
    }


    /**
     * Com esta função eu deleto o arquivo dentro da pasta indicada
     * @param string $file
     * @return bool
     */

    public static function deleteFile(string $file)
    {
       $resultado =  Storage::delete($file);

       return $resultado;
    }


    /**
     * Com esta função formato a data de d/m/Y H:i:s para o padrão Y-m-d H:i:s
     * @param string $data
     * @param string $delimitador
     * @return string
     */

    public static function data(string $data, string $delimitador = '/')
    {
        $data = explode($delimitador,$data[0]);
        $ano_hora = explode(' ',$data[2]);

        $ano = $ano_hora[0];
        $hora = $ano_hora[1];

        $mes = $data[1];
        $dia = $data[0];

        return $ano.'-'.$mes.'-'.$dia.' '.$hora;
    }

}
