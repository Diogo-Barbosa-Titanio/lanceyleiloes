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
     * @param string $subPasta
     * @param string $pasta
     * @return string
     */
    public static function createFile($file, string $subPasta, string $pasta = 'images')
    {
        $path = '';

        if (!empty($file)) {
            if ($file->isValid()) {
                $id_user = Auth::user()->id;
                $data = date('Ymd_His');
                $numero_aleatorio = mt_rand(1, 1000);
                $arquivo_nome = $subPasta . '_' . $id_user . '_' . $data . '_' . $numero_aleatorio;
                $arquivo_extensao = $file->extension();
                $arquivo = $arquivo_nome . '.' . $arquivo_extensao;
                $path = Storage::putFileAs('public/' . $pasta . '/' . $subPasta, $file, $arquivo);
                $path = Str::replaceFirst('public', '', $path);
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
        $resultado = Storage::delete($file);

        return $resultado;
    }


    /**
     * Com esta função formato a data de d/m/Y para o padrão Y-m-d
     * @param string $data
     * @param string $delimitador
     * @return string
     */

    public static function data(string $data, string $delimitador = '/')
    {
        $data = explode($delimitador, $data);
        $ano = $data[2];
        $mes = $data[1];
        $dia = $data[0];

        return $ano . '-' . $mes . '-' . $dia;
    }

    /**
     * Com esta função retorno um código aleatório baseado no dia para o lote
     *
     * @return string
     */
    public static function gerarCodigoLote()
    {

        $tempo = date('Y') + date('m') + date('d') + date('H') + date('i') + date('s');
        $numero_aleatorio = mt_rand(1000, 9999);
        $numero_gerado = $numero_aleatorio . $tempo;

        return $numero_gerado;

    }


    /**
     * Removo acentos das palavras
     *
     * @param string $palavra
     * @return mixed
     */
    public static function removerAcentos(string $palavra = '')
    {
        $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

        $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');


        return str_replace($comAcentos, $semAcentos, $palavra);
    }

    /**
     * Utilizo a função kebab do laravel mais a remover acentos que criei
     *
     * @param string $palavra
     * @return string
     */
    public static function kebabComRemoverAcentos(string $palavra = '')
    {
        $palavraSemAcentos = Helper::removerAcentos($palavra);

        return Str::kebab($palavraSemAcentos);
    }

}
