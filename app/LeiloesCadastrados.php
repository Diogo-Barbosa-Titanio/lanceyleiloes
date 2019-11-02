<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeiloesCadastrados extends Model
{
    public function leiloesAbertos()
    {
        $query = $this->sqlQuery();
        $query .= ' AND (a.data_ini <= NOW() AND NOW() <= a.data_fim ) OR (a.data_ini1 <= NOW() AND NOW() <= a.data_fim1)';

        $leiloes = DB::select($query);

        return $leiloes;
    }

    public function leiloesEmLoteamento()
    {
        $query = $this->sqlQuery();
        $query .= ' AND (a.data_ini > NOW() AND NOW() <= a.data_fim ) OR (a.data_ini1 > NOW() AND NOW() <= a.data_fim1)';

        $leiloes = DB::select($query);

        return $leiloes;
    }


    public function leiloesNaoArrematados()
    {

        $query = $this->sqlQuery();
        $query .= '  AND a.situacao = 3';

        $leiloes = DB::select($query);

        return $leiloes;
    }

    public function leiloesArrematados()
    {

        $query = $this->sqlQuery();
        $query .= ' AND a.situacao = 2';

        $leiloes = DB::select($query);

        return $leiloes;
    }

    public function leiloesEmCondicional()
    {

        $query = $this->sqlQuery();
        $query .= ' AND a.situacao = 10';

        $leiloes = DB::select($query);

        return $leiloes;
    }

    public function listarLeilao($id)
    {
        $id_lote = $id;

        $query = $this->sqlQuery();
        $query .= '  AND a.id = :id';

        $leiloes = DB::select($query, ['id' => $id_lote]);

        return $leiloes;

    }

    public function listarLeiloes()
    {
        $query = $this->sqlQuery();
        $query .= ' ORDER BY FIELD(situacao_ordem,0,1,3,10,2)';

        $leiloes = DB::select($query);

        return $leiloes;
    }

    protected function situacaoDoLeilao()
    {
        $em_loteamento = '(SELECT situacao FROM lotes WHERE id = a.id AND (data_ini > NOW() AND NOW() <= data_fim ) OR (data_ini1 > NOW() AND NOW() <= data_fim1)) = 0';
        $aberto = '(SELECT situacao FROM lotes WHERE id = a.id AND (data_ini < NOW() AND NOW() <= data_fim ) OR (data_ini1 < NOW() AND NOW() <= data_fim1)) = 0';
        $arrematado = 'a.situacao = 2';
        $nao_arrematado = 'a.situacao = 3';
        $em_condicional = 'a.situacao = 10';

        $situacao_nome = 'if(' . $em_loteamento . ',"Em Loteamento",
                             if(' . $aberto . ',"Aberto",
                               if(' . $arrematado . ',"Arrematado",
                                  if(' . $nao_arrematado . ',"Não arrematado",
                                     if(' . $em_condicional . ',"Em condicional", "Situação Indefinida")))))';

        $situacao_cor = 'if(' . $em_loteamento . ',"em_breve",
                             if(' . $aberto . ',"aberto",
                               if(' . $arrematado . ',"arrematado",
                                  if(' . $nao_arrematado . ',"nao_arrematado",
                                     if(' . $em_condicional . ',"condicional", "Situação Indefinida")))))';

        return ['nome' => $situacao_nome, 'cor' => $situacao_cor];
    }

    protected function sqlQuery()
    {
        $situacao = $this->situacaoDoLeilao();

        $query = 'SELECT a.id as id_lote,
                         a.nome as nome_lote,
                         a.nome_meta,
                         (SELECT nome FROM lotes1_cate WHERE id = a.categorias) as tipo_imovel,
                         a.bairro,
                         a.cidades as cidade_lote,
                         a.estados as estado_lote,
                         a.quartos,
                         a.suites,
                         a.vagas,
                         a.area_privativa,
                         (SELECT login FROM cadastro WHERE  id = a.lances_cadastro) as login,
                         DATE_FORMAT(a.lances_data, "%d-%m-%Y %H:%i:%s") as lance_data_atual,
                         FORMAT(a.lances,2,"de_DE") as lance_atual,
                         FORMAT(a.lance_ini,2,"de_DE") as lance_ini,
                         FORMAT(a.lances,2,"de_DE") as lance_recente,
                         a.foto,
                         a.ordem as lote_ordem,
                         a.count,
                         a.comissao,
                         if((SELECT situacao FROM lotes WHERE id = a.id AND (data_ini > NOW() AND NOW() <= data_fim ) OR (data_ini1 > NOW() AND NOW() <= data_fim1)) = 0,1,a.situacao) as situacao,                             
                         if((SELECT situacao FROM lotes WHERE id = a.id AND (data_ini > NOW() AND NOW() <= data_fim ) OR (data_ini1 > NOW() AND NOW() <= data_fim1)) = 0,1,a.situacao) as situacao_ordem,
                         ' . $situacao['nome'] . ' as situacao_nome,
                         ' . $situacao['cor'] . ' as situacao_cor,                                                      
                         DATE_FORMAT(a.data_ini, "%d-%m-%Y %H:%i:%s") as data_ini,
                         DATE_FORMAT(a.data_fim, "%d-%m-%Y %H:%i:%s") as data_fim,
                         a.data_fim as data_fim_contador,
                         DATE_FORMAT(a.data_ini1, "%d-%m-%Y %H:%i:%s") as data_ini1,
                         DATE_FORMAT(a.data_fim1, "%d-%m-%Y %H:%i:%s") as data_fim1,
                         (SELECT fase_da_obra FROM fase_da_obra WHERE id = a.fase_da_obra) as obra,                             
                         (SELECT nome FROM natureza WHERE id = b.natureza) as natureza,
                         b.codigo as codigo_leilao,
                         (SELECT nome FROM tipos WHERE id = b.tipos) as tipo_leilao,
                         (REPLACE(b.comitentes,"-","")) as id_comitente,  
                         (SELECT foto FROM comitentes WHERE id = id_comitente) as foto_comitente,
                         (SELECT nome FROM comitentes WHERE id = id_comitente) as nome_comitente,   
                         b.foto as foto_leilao,
                         b.nome as nome_leilao                    
                    FROM lotes as a  
               LEFT JOIN leiloes as b 
                      ON a.leiloes = b.id 
                   WHERE 1 = 1';

        return $query;
    }

    public function LeilaoLoteDescricao($id)
    {
        $id_lote = $id;

        $query = 'SELECT txt 
                    FROM z_txt
                   WHERE 1 = 1 
                     AND tipo = 0
                     AND item = :id';

        $loteDescricao = DB::select($query, ['id' => $id_lote]);

        $texto = base64_decode($loteDescricao[0]->txt);
        $texto = html_entity_decode($texto);

        return $texto;

    }
}
