<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Leilao;
use App\Lote;
use App\LoteCategoria;
use App\LoteFaseDaObra;
use App\LoteSituacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = new Lote();
        $listarLotes = $lotes->listarCadastros();

        $success = Session::get('lote_status');

        return view('admin/lotes/lote',['lotes' => $listarLotes,'success' => $success]);
    }

    public function create()
    {
        $leiloes = new Leilao();
        $listarLeiloes = $leiloes->listarCadastros();

        $categorias = new LoteCategoria();
        $listarCategorias = $categorias->listarCadastros();

        $situacoes = new LoteSituacao();
        $listarSituacoes = $situacoes->listarCadastros();

        $fases_das_obras = new LoteFaseDaObra();
        $listarFasesDasObras = $fases_das_obras->listarCadastros();

        return view('admin/lotes/lote_create',[
                                         'leiloes' => $listarLeiloes,
                                         'categorias' => $listarCategorias,
                                         'situacoes' => $listarSituacoes,
                                         'fases_das_obras' => $listarFasesDasObras]);
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $cadastro = new Lote();
        $lote = $cadastro->listarCadastro($id);

        $leiloes = new Leilao();
        $listarLeiloes = $leiloes->listarCadastros();

        $categorias = new LoteCategoria();
        $listarCategorias = $categorias->listarCadastros();

        $situacoes = new LoteSituacao();
        $listarSituacoes = $situacoes->listarCadastros();

        $fases_das_obras = new LoteFaseDaObra();
        $listarFasesDasObras = $fases_das_obras->listarCadastros();

        return view('admin/lotes/lote_update',['lote'=>$lote,
            'leiloes' => $listarLeiloes,
            'categorias' => $listarCategorias,
            'situacoes' => $listarSituacoes,
            'fases_das_obras' => $listarFasesDasObras]);

    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'leilao' => 'required',
            'categoria' => 'required',
            'lance_inicial' => 'required',
            'lance_minimo' => 'required',
            'data_inicio'  => 'required',
            'data_fim' => 'required',
            'nome' => 'required',
            'cep' => 'required',
            'fase_da_obra' => 'required'
        ],$this->messages(),$this->attributes());

        $lance_inicial = str_replace('.','',$request->post('lance_inicial'));
        $lance_inicial = str_replace(',','.',$lance_inicial);

        $lance_minimo = str_replace('.','',$request->post('lance_minimo'));
        $lance_minimo = str_replace(',','',$lance_minimo);

        $dados = [
            ':id_leiloes' => $request->post('leilao'),
            ':id_lotes_categorias' => $request->post('categoria'),
            ':nome' => $request->post('nome'),
            ':descricao' => $request->post('descricao'),
            ':lance_inicial' => $lance_inicial,
            ':lance_minimo' => $lance_minimo,
            ':data_inicio'=> Helper::data($request->post('data_inicio')),
            ':data_fim'=> Helper::data($request->post('data_fim')),
            ':hora_inicio'=> $request->post('hora_inicio'),
            ':hora_fim'=> $request->post('hora_fim'),
            ':cep'=> $request->post('cep'),
            ':pais'=> $request->post('pais'),
            ':estado'=> $request->post('estado'),
            ':cidade'=> $request->post('cidade'),
            ':bairro'=> $request->post('bairro'),
            ':endereco'=> $request->post('endereco'),
            ':id_lotes_fases_das_obras' => $request->post('fase_da_obra'),
            ':area_privativa'=> $request->post('area_privativa'),
            ':quartos'=> $request->post('quartos'),
            ':suites'=> $request->post('suites'),
            ':vagas'=> $request->post('vagas'),
            ':banheiros'=> $request->post('banheiros'),
            ':desocupado'=> $request->post('desocupado'),
            ':academia'=> $request->post('academia'),
            ':bicicletario'=> $request->post('bicicletario'),
            ':brinquedoteca'=> $request->post('brinquedoteca'),
            ':campo_de_futebol'=> $request->post('campo_de_futebol'),
            ':churrasqueira'=> $request->post('churrasqueira'),
            ':cinema'=> $request->post('cinema'),
            ':pet_care'=> $request->post('pet_care'),
            ':piscina'=> $request->post('piscina'),
            ':piscina_infantil'=> $request->post('piscina_infantil'),
            ':pista_de_skate'=> $request->post('pista_de_skate'),
            ':playground'=> $request->post('playground'),
            ':quadra_de_squash'=> $request->post('quadra_de_squash'),
            ':quadra_de_tenis'=> $request->post('quadra_de_tenis'),
            ':restaurante'=> $request->post('restaurante'),
            ':sala_de_massagem'=> $request->post('sala_de_massagem'),
            ':salao_de_beleza'=> $request->post('salao_de_beleza'),
            ':salao_de_festas'=> $request->post('salao_de_festas'),
            ':salao_de_festas_infantil'=> $request->post('salao_de_festas_infantil'),
            ':salao_de_jogos'=> $request->post('salao_de_jogos'),
            ':sauna'=> $request->post('sauna'),
            ':spa'=> $request->post('spa'),
            ':vagas_de_visitantes'=> $request->post('vagas_de_visitantes')
        ];

        $cadastro = new Lote();

        if($cadastro->gravar($dados)){
            $request->session()->flash('lote_status', 'Novo lote gravado com sucesso.');
            return redirect('/admin/lotes');
        }

        return redirect('/admin/lotes/create');

    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'leilao' => 'required',
            'categoria' => 'required',
            'lance_inicial' => 'required',
            'lance_minimo' => 'required',
            'data_inicio'  => 'required',
            'data_fim' => 'required',
            'nome' => 'required',
            'cep' => 'required',
            'fase_da_obra' => 'required'
        ],$this->messages(),$this->attributes());

        $lance_inicial = str_replace('.','',$request->post('lance_inicial'));
        $lance_inicial = str_replace(',','.',$lance_inicial);

        $lance_minimo = str_replace('.','',$request->post('lance_minimo'));
        $lance_minimo = str_replace(',','.',$lance_minimo);

        $dados = [
            ':id' => $request->post('id'),
            ':id_leiloes' => $request->post('leilao'),
            ':id_lotes_categorias' => $request->post('categoria'),
            ':nome' => $request->post('nome'),
            ':descricao' => $request->post('descricao'),
            ':lance_inicial' => $lance_inicial,
            ':lance_minimo' => $lance_minimo,
            ':data_inicio'=> Helper::data($request->post('data_inicio')),
            ':data_fim'=> Helper::data($request->post('data_fim')),
            ':hora_inicio'=> $request->post('hora_inicio'),
            ':hora_fim'=> $request->post('hora_fim'),
            ':cep'=> $request->post('cep'),
            ':pais'=> $request->post('pais'),
            ':estado'=> $request->post('estado'),
            ':cidade'=> $request->post('cidade'),
            ':bairro'=> $request->post('bairro'),
            ':endereco'=> $request->post('endereco'),
            ':id_lotes_fases_das_obras' => $request->post('fase_da_obra'),
            ':area_privativa'=> $request->post('area_privativa'),
            ':quartos'=> $request->post('quartos'),
            ':suites'=> $request->post('suites'),
            ':vagas'=> $request->post('vagas'),
            ':banheiros'=> $request->post('banheiros'),
            ':desocupado'=> $request->post('desocupado'),
            ':academia'=> $request->post('academia'),
            ':bicicletario'=> $request->post('bicicletario'),
            ':brinquedoteca'=> $request->post('brinquedoteca'),
            ':campo_de_futebol'=> $request->post('campo_de_futebol'),
            ':churrasqueira'=> $request->post('churrasqueira'),
            ':cinema'=> $request->post('cinema'),
            ':pet_care'=> $request->post('pet_care'),
            ':piscina'=> $request->post('piscina'),
            ':piscina_infantil'=> $request->post('piscina_infantil'),
            ':pista_de_skate'=> $request->post('pista_de_skate'),
            ':playground'=> $request->post('playground'),
            ':quadra_de_squash'=> $request->post('quadra_de_squash'),
            ':quadra_de_tenis'=> $request->post('quadra_de_tenis'),
            ':restaurante'=> $request->post('restaurante'),
            ':sala_de_massagem'=> $request->post('sala_de_massagem'),
            ':salao_de_beleza'=> $request->post('salao_de_beleza'),
            ':salao_de_festas'=> $request->post('salao_de_festas'),
            ':salao_de_festas_infantil'=> $request->post('salao_de_festas_infantil'),
            ':salao_de_jogos'=> $request->post('salao_de_jogos'),
            ':sauna'=> $request->post('sauna'),
            ':spa'=> $request->post('spa'),
            ':vagas_de_visitantes'=> $request->post('vagas_de_visitantes')
        ];

        $cadastro = new Lote();

        if($cadastro->alterar($dados)){
            $request->session()->flash('lote_status', 'Novo lote alterado com sucesso.');
            return redirect('/admin/lotes');
        }

        return redirect('/admin/lotes/edit?id='.$dados[':id']);

    }


    public function destroy(Request $request)
    {

        $dados = [
            ':id' => $request->post('id')
        ];

        $cadastro = new Lote();

        if($cadastro->apagar($dados)){
            $request->session()->flash('lote_status', 'Lote apagado com sucesso.');
            return redirect('/admin/lotes');
        }
    }


    protected function messages() {
        //Example: return ['nome.required' => 'O :attribute é obrigatório.'];
        return [];
    }

    protected function attributes() {
        return [
            'nome' => 'Nome',
            'codigo' => 'Código',
            'descricao' => 'Descrição',
            'tipo' => 'Tipo de leilão',
            'comitente' => 'Comitentes',
            'natureza' => 'Natureza',
            'edital' => 'Edital'
        ];
    }

}
