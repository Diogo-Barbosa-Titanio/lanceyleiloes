@extends('layouts.app')

@section('content')
    <div class="container lote">

        <div class="espacamento">
            <div class="row">
                <div class="col-md-7">
                    <a href="#" class=" btn btn-cor-secundaria ml-1 mr-1 font-weight-bold">REFAZER BUSCA</a>
                </div>

                <div class="col-md-5 text-right">
                    <a href="#" class=" btn btn-cor-auxiliar ml-1 mr-1 font-weight-bold">{{$leilao[0]->natureza}}</a>
                    <a href="#" class=" btn btn-cor-principal ml-1 mr-1 font-weight-bold">HABILITAR-SE PARA O
                        LEILÃO</a>
                </div>
            </div>
        </div>


        <div class="border cabecalho">
            <div class="row align-items-end">
                <div class="col-md-2 text-center">
                    @if(!empty($leilao[0]->foto_leilao))
                        <a href="#">
                            <img src="{{url('/')}}/../../web/fotos/{{$leilao[0]->foto_leilao}}"
                                 style="max-width: 150px; max-height: 100px;" class="db w100p" alt="{{$leilao[0]->nome_leilao}}">
                        </a>
                    @endif
                </div>

                <div class="col-md-5">
                    <h2>
                        <span class="texto">{{$leilao[0]->codigo_leilao}} - {{$leilao[0]->nome_leilao}}</span>
                    </h2>

                    <div>
                        <span class="texto">Comitente:</span>
                        <span>{{$leilao[0]->nome_comitente}}</span>
                    </div>

                    <div>
                        <span class="texto">Data de início:</span>
                        <span>{{$leilao[0]->data_ini}}</span>
                    </div>
                </div>

                <div class="col-md-5">
                    <div>
                        <span class="texto">Modalidade:</span>
                        <span>{{$leilao[0]->situacao_nome}}</span>
                    </div>

                    <div>
                        <span class="texto">Data de Término:</span>
                        <span>{{$leilao[0]->data_fim}}</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="espacamento">

            <div class="row">
                <div class="col-md-12">
                    <h3>Lote {{$leilao[0]->lote_ordem}} - {{$leilao[0]->nome_lote}}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span class="btn border">{{$leilao[0]->natureza}}</span>
                    <span class="btn border">{{$leilao[0]->tipo_leilao}}</span>
                    <span class="btn border">PRAÇA ÚNICA</span>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <span class="pr-2"><i class="far fa-eye"></i></span> {{$leilao[0]->count}} <span class="pl-2">visualizações</span>
                </div>
                <div class="col-md-2">
                    <span class="pr-2"><i class="far fas fa-gavel"></i></span> 0 <span class="pl-2">lance(s)</span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <img src="{{url('/')}}/../../web/fotos/lotes_30_casa-prime-itau-290-m-sup2-vila-kosmos-rio-de-janeiro_192.168.50.71_zz87e8bb4569.jpg" style="max-width: 350px; max-height: 250px;">
                </div>

                <div class="col-md-4">
                        <div class="border informacoes">

                            <div>
                                 <h2>
                                     <span class="texto">Informações</span>
                                 </h2>
                            </div>

                            <div class="dados">
                               <span class="icone"><i class="fas fa-flag"></i></span>
                               <span class="texto">Lote</span>
                               <span class="valor">2345 / 2</span>
                            </div>

                            <div class="dados">
                                <span class="icone"><i class="fas fa-calendar-alt"></i></span>
                                <span class="texto">Início:</span>
                                <span class="valor"> {{$leilao[0]->data_ini}}</span>
                            </div>

                            <div class="dados">
                                <span class="icone"><i class="fas fa-calendar-alt"></i></span>
                                <span class="texto">Término:</span>
                                <span class="valor"> {{$leilao[0]->data_fim}}</span>
                            </div>

                            <div class="dados">
                                <span class="icone"><i class="fas fa-map-marker-alt"></i></span>
                                <span class="texto">Localidade:</span>
                                <span class="valor"> {{$leilao[0]->cidade_lote}}, {{$leilao[0]->estado_lote}}</span>
                            </div>

                            <div class="dados">
                                <span class="icone"><i class="fas fa-database"></i></span>
                                <span class="texto">Comissão do Leiloeiro:</span>
                                <span class="valor"> {{$leilao[0]->comissao}} %</span>
                            </div>

                            <div class="dados">
                                <div><span class="texto">Lance Inicial:</span></div>
                                <h2><span class="texto">R$ {{$leilao[0]->lance_ini}}</span></h2>
                            </div>

                        </div>
                </div>

                <div class="col-md-4">
                    <div class="cronometro_leilao">
                        <div class="leilao_situacao" situacao="{{$leilao[0]->situacao_cor}}">
                            {{$leilao[0]->situacao_nome}}
                        </div>

                        <div class="data_hora">
                            <div>LEILÃO ENCERRA EM</div>
                            <div class="tempo_restante"></div>
                            <div class="texto">DIAS &nbsp;&nbsp;&nbsp; HORAS &nbsp;&nbsp;&nbsp; MIN &nbsp;&nbsp; SEG  </div>
                        </div>

                        <div class="lance_atual">
                            <div class="texto">
                                LANCE ATUAL:
                            </div>
                            <div class="valor">
                                R$ {{$leilao[0]->lance_atual}}
                            </div>
                            <div class="data">
                                {{$leilao[0]->lance_data_atual}}
                            </div>
                            <div class="usuario">
                                Usuário: {{$leilao[0]->login}}
                            </div>
                        </div>

                        <div class="lance">
                            <div class="texto">
                                Dê seu lance
                            </div>
                            <div class="formulario">
                                <form>
                                    <input type="text" class="form-control mb-1" placeholder="Informe o valor (Ex. R$ 15.000,00)">

                                    <button class="btn btn-cor-secundaria btn-block">Confirmar lance</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="espacamento">

            @if(!empty($loteDescricao))
                <div class="row">
                    <div class="col-md-12">
                      <h2>
                          <span class="texto"> Descrição </span>
                      </h2>

                      <div>
                          {!! $loteDescricao !!}
                      </div>

                    </div>
                </div>

                <hr>
            @endif


            <div class="row">
                <div class="col-md-12">
                    <h2>
                        <span class="texto"> Detalhes </span>
                    </h2>

                    <div class="icones">
                        <i class="far fa-object-ungroup"></i> <span class="texto">Tamanho do móvel:</span><span class="valor"> {{$leilao[0]->area_privativa}} m²</span>
                        <i class="fas fa-car"></i> <span class="texto">Número de vagas: </span><span class="valor">{{$leilao[0]->vagas}}</span>
                        <i class="fas fa-bed"></i> <span class="texto">Número de quartos: </span><span class="valor">{{$leilao[0]->quartos}}</span>
                        <i class="fas fa-crown"></i> <span class="texto">Número de suítes: </span><span class="valor">{{$leilao[0]->suites}}</span>
                    </div>

                </div>
            </div>

            <hr>

        </div>

    </div>
@endsection

@section('scripts')


    <script type="text/javascript">

        const data_fim_contador = new Date('{{$leilao[0]->data_fim_contador}}');

        $(".tempo_restante")
            .countdown(data_fim_contador, function(event) {
                $(this).text(
                    event.strftime('%D : %H : %M : %S')
                );

                console.log(event);

                if(event.type == 'finish'){
                    alert('Operação chegou ao final');
                }
        });
    </script>

@endsection
