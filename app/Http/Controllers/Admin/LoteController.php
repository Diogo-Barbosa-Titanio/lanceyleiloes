<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Leilao;
use App\Lote;
use App\LoteCategoria;
use App\LoteFaseDaObra;
use App\LoteFoto;
use App\LoteSituacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoteController extends Controller
{
    public function index()
    {
        $this->verificaSituacoes();

        $lotes = new Lote();
        $listarLotes = $lotes->listarCadastros();

        $success = Session::get('lote_status');

        return view('admin/lotes/lote',['lotes' => $listarLotes,'success' => $success]);
    }

    public function create()
    {

        $this->verificaSituacoes();

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
        $this->verificaSituacoes();

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

        $lotes_fotos = new LoteFoto();
        $listarLoteFoto = $lotes_fotos->listarCadastro($id);

        return view('admin/lotes/lote_update',[
                          'lote'=>$lote,
                          'leiloes' => $listarLeiloes,
                          'categorias' => $listarCategorias,
                          'situacoes' => $listarSituacoes,
                          'fases_das_obras' => $listarFasesDasObras,
                          'fotos' => $listarLoteFoto]);

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
        $lance_minimo = str_replace(',','.',$lance_minimo);

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
        $cadastroFoto = new LoteFoto();

        if($cadastro->gravar($dados)){

            $this->inclusaoDeFotos($cadastro,$cadastroFoto,$request);

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
            ':lance_inicial' =>$lance_inicial,
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
        $cadastroFoto = new LoteFoto();

        if($cadastro->alterar($dados)){

            $this->alterarFotos($cadastro,$cadastroFoto,$request);

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

        $cadastroFoto = new LoteFoto();
        $this->apagarFotos($cadastroFoto,$dados[':id']);

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

    /**
     * Esta função incluí o local das fotos na tabela LotesFotos ou NULL caso não possua uma foto correspondente
     * os ids gerados são usados posteriormente para Updates na tabela LotesFotos
     * @param Lote $cadastro
     * @param LoteFoto $cadastroFoto
     * @param Request $request
     * @return void
     */
    protected function inclusaoDeFotos(Lote $cadastro, LoteFoto $cadastroFoto, Request $request)
    {
        $id_lote = $cadastro->getIdLote();

        //Verifico os 10 campos de fotos
        for ($i = 1; $i <= 10; $i++) {

            $nome_foto = 'foto_' . $i;
            $pathFoto = null;

            $arquivoFoto = $request->file($nome_foto);

            if(!empty($arquivoFoto)){
                if ($arquivoFoto->isValid()) {
                    $pathFoto = Helper::createFile($arquivoFoto, 'lotes');
                }
            }

            $cadastroFoto->gravar([':id_lotes' => $id_lote, ':foto' => $pathFoto]);
        }
    }

    /**
     * Esta função ajuda a alterar a foto
     * os ids gerados são usados posteriormente para Updates na tabela LotesFotos
     * @param Lote $cadastro
     * @param LoteFoto $cadastroFoto
     * @param Request $request
     * @return void
     */
    protected function alterarFotos(Lote $cadastro, LoteFoto $cadastroFoto, Request $request)
    {
        $id_lote = $cadastro->getIdLote();

        $fotos = $cadastroFoto->listarCadastro($id_lote);

        foreach ($fotos as $foto){

            $nome_foto = 'foto_'.$foto->id;

            $pathFoto = null;

            $arquivoFoto = $request->file($nome_foto);

            if(!empty($arquivoFoto)){
                if ($arquivoFoto->isValid()) {
                    $pathFoto = Helper::createFile($arquivoFoto, 'lotes');

                    $cadastroFoto->alterar([':id' => $foto->id, ':foto' => $pathFoto]);

                    $foto_antiga = 'public'.$foto->foto;
                    Helper::deleteFile($foto_antiga);
                }
            }

        }

    }

    /**
     * Com esta função apago todas as fotos na pasta referentes ao lote específico
     * @param LoteFoto $cadastroFoto
     * @param int $id
     * @return void
     */

    protected function apagarFotos(LoteFoto $cadastroFoto, int $id_lote){

        $listarLoteFoto = $cadastroFoto->listarCadastro($id_lote);

        foreach ($listarLoteFoto as $foto){
            $foto_antiga = 'public'.$foto->foto;
            Helper::deleteFile($foto_antiga);
        }
    }

    /**
     * Com esta função verifico e atualizo a situação dos lotes no sistema na tabela lotes
     * @return void
     */
    protected function verificaSituacoes(){
        $cadastroSituacao = new LoteSituacao();
        $cadastroSituacao->emLoteamento();
        $cadastroSituacao->aberto();
        $cadastroSituacao->naoArrematado();
    }

}
