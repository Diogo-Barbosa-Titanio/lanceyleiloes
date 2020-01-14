@extends('layouts.app')

@section('styles')

    <!-- CSS Slideshow -->
    <link href="{{ asset('/css/slideshow.css') }}" rel="stylesheet">

    <link href="{{ asset('/vendor/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/vendor/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">

@endsection


@section('content')
    <div class="container lote">

            <div class="row">
                <div class="col s12 xl6">

                     <h3 class="cabecalho">
                         <span class="texto">Leilão:</span><span class="valor"> {{$leilao[0]->nome_leilao}}</span>
                     </h3>

                </div>

                <div class="col s12 xl6">
                    <h3 class="cabecalho">
                        <span class="texto">Código do leilão:</span><span class="valor"> {{$leilao[0]->codigo_leilao}}</span>
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col s12 xl12">

                    <h3 class="cabecalho"><span class="texto">Lote:</span><span class="valor">{{$leilao[0]->lote_ordem}} {{$leilao[0]->nome_lote}}</span></h3>

                </div>
            </div>

        <div class="row">
            <div class="col s12 xl12">
                <div class="card horizontal">

                    <div class="card-image">
                        @if(!empty($leilao[0]->foto_leilao))
                            <a href="#">
                                <img src="{{asset('storage'.$leilao[0]->foto_leilao)}}"
                                     class="responsive-img"
                                     alt="{{$leilao[0]->nome_leilao}}">
                            </a>
                        @endif
                    </div>
                    <div class="card-stacked">
                        <div class="card-content comitente">
                            <p>
                                <span class="texto">Comitente:</span>
                                <span>{{$leilao[0]->comitente_leilao}}</span>
                            </p>

                            <p>
                                <span class="texto">Data de início:</span>
                                <span>{{$leilao[0]->data_inicio}}</span>
                            </p>

                            <p>
                                <span class="texto">Data de Término:</span>
                                <span>{{$leilao[0]->data_fim}}</span>
                            </p>

                            <p>
                                <span class="texto">Situação:</span>
                                <span>{{$leilao[0]->nome_situacao}}</span>
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn">{{$leilao[0]->natureza}}</a>
                            <a href="#" class="btn">HABILITAR-SE PARA O LEILÃO</a>
                            <a href="#" class="btn">REFAZER BUSCA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


           <div class="row">
                <div class="col s12 xl12">

                    <div class="card">

                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 xl4">

                                    <div class="owl-carousel owl-theme">
                                        <div class="item"><img src="{{asset('/storage/images/lotes/lotes_1_20191112_163649_800.jpeg')}}"> </div>
                                        <div class="item"><img src="{{asset('/storage/images/lotes/lotes_1_20191112_170206_651.jpeg')}}"></div>
                                        <div class="item"><img src="{{asset('/storage/images/lotes/lotes_1_20191112_170207_711.jpeg')}}"></div>
                                    </div>

                                </div>

                                <div class="col s12 xl4">

                                    <div class="informacoes">

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-flag"></i></span>
                                            <span class="texto">Lote: </span>
                                            <span class="valor">2345 / 2</span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-calendar-alt"></i></span>
                                            <span class="texto">Início: </span>
                                            <span class="valor"> {{$leilao[0]->data_inicio}} {{$leilao[0]->hora_inicio}}</span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-calendar-alt"></i></span>
                                            <span class="texto">Término: </span>
                                            <span class="valor"> {{$leilao[0]->data_fim}} {{$leilao[0]->hora_fim}}</span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="texto">Localidade: </span>
                                            <span class="valor"> {{$leilao[0]->cidade}} , {{$leilao[0]->estado}}</span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-database"></i></span>
                                            <span class="texto">Comissão do Leiloeiro: </span>
                                            <span class="valor">5% </span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-dollar-sign"></i></span>
                                            <span class="texto">Lance Inicial:</span>
                                            <span class="valor">R$ {{$leilao[0]->lance_inicial}}</span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col s12 xl4">
                                    <div class="cronometro_leilao">
                                        <div class="leilao_situacao" situacao="{{$leilao[0]->situacao_cor}}">
                                            {{$leilao[0]->situacao_nome}}
                                        </div>

                                        <div class="data_hora">
                                            <div>LEILÃO ENCERRA EM</div>
                                            <div class="tempo_restante"></div>
                                            <div class="texto">DIAS &nbsp;&nbsp;&nbsp; HORAS &nbsp;&nbsp;&nbsp; MIN &nbsp;&nbsp; SEG
                                            </div>
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
                                                    <input type="text" class="form-control mb-1"
                                                           placeholder="Informe o valor (Ex. R$ 15.000,00)">

                                                    <button class="btn btn-cor-secundaria btn-block">Confirmar lance</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col s12 xl12">

                    <div class="card">

                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                @if(!empty($leilao[0]->descricao_lote))
                                 <li class="tab"><a href="#tab_descricao">Descrição</a></li>
                                @endif
                                <li class="tab"><a class="active" href="#tab_detalhes">Detalhes</a></li>
                                <li class="tab"><a href="#tab_infraestrutura">Infraestrutura</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            @if(!empty($leilao[0]->descricao_lote))
                            <div id="tab_descricao">
                                {{$leilao[0]->descricao_lote}}
                            </div>
                            @endif
                            <div id="tab_detalhes">
                                <div class="icones">
                                    <i class="far fa-object-ungroup"></i> <span class="texto">Tamanho do móvel:</span><span
                                        class="valor"> {{$leilao[0]->area_privativa}} m²</span>
                                    <i class="fas fa-car"></i> <span class="texto">Número de vagas: </span><span
                                        class="valor">{{$leilao[0]->vagas}}</span>
                                    <i class="fas fa-bed"></i> <span class="texto">Número de quartos: </span><span
                                        class="valor">{{$leilao[0]->quartos}}</span>
                                    <i class="fas fa-crown"></i> <span class="texto">Número de suítes: </span><span
                                        class="valor">{{$leilao[0]->suites}}</span>
                                </div>
                            </div>
                            <div id="tab_infraestrutura">
                                <div class="infraestrutura">

                                    <p>
                                        @if($leilao[0]->academia == 'S')
                                            <span class="infra">Academia</span>
                                        @endif

                                        @if($leilao[0]->bicicletario == 'S')
                                            <span class="infra">Bicicletário</span>
                                        @endif

                                        @if($leilao[0]->brinquedoteca == 'S')
                                            <span class="infra">Brinquedoteca</span>
                                        @endif

                                        @if($leilao[0]->campo_de_futebol == 'S')
                                            <span class="infra">Campo de futebol</span>
                                        @endif

                                        @if($leilao[0]->churrasqueira == 'S')
                                            <span class="infra">Churrasqueira</span>
                                        @endif

                                        @if($leilao[0]->cinema == 'S')
                                            <span class="infra">Cinema</span>
                                        @endif


                                        @if($leilao[0]->pet_care == 'S')
                                            <span class="infra">Pet care</span>
                                        @endif

                                        @if($leilao[0]->piscina == 'S')
                                            <span class="infra">Piscina</span>
                                        @endif

                                        @if($leilao[0]->piscina_infantil == 'S')
                                            <span class="infra">Piscina infantil</span>
                                        @endif

                                        @if($leilao[0]->pista_de_skate == 'S')
                                            <span class="infra">Pista de skate</span>
                                        @endif

                                        @if($leilao[0]->playground == 'S')
                                            <span class="infra">Playground</span>
                                        @endif

                                        @if($leilao[0]->quadra_de_squash == 'S')
                                            <span class="infra">Quadra de squash</span>
                                        @endif

                                        @if($leilao[0]->quadra_de_tenis == 'S')
                                            <span class="infra">Quadra de tênis</span>
                                        @endif

                                        @if($leilao[0]->restaurante == 'S')
                                            <span class="infra">Restaurante</span>
                                        @endif

                                        @if($leilao[0]->sala_de_massagem == 'S')
                                            <span class="infra">Sala de massagem</span>
                                        @endif

                                        @if($leilao[0]->salao_de_beleza == 'S')
                                            <span class="infra">Salão de beleza</span>
                                        @endif

                                        @if($leilao[0]->salao_de_festas == 'S')
                                            <span class="infra">Salão de festas</span>
                                        @endif

                                        @if($leilao[0]->salao_de_festas_infantil == 'S')
                                            <span class="infra">Salão de festas infantil</span>
                                        @endif

                                        @if($leilao[0]->salao_de_jogos == 'S')
                                            <span class="infra">Salão de jogos</span>
                                        @endif

                                        @if($leilao[0]->sauna == 'S')
                                            <span class="infra">Sauna</span>
                                        @endif

                                        @if($leilao[0]->spa == 'S')
                                            <span class="infra">Spa</span>
                                        @endif

                                        @if($leilao[0]->vagas_de_visitantes == 'S')
                                            <span class="infra">Vagas de visitantes</span>
                                        @endif
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>





    </div>
@endsection

@section('scripts')

    <script src="{{ asset('/vendor/owl-carousel/owl.carousel.min.js') }}"></script>

    <script type="text/javascript">

        const data_fim_contador = new Date('{{ date('Y/m/d',strtotime($leilao[0]->data_fim)) }} {{ $leilao[0]->hora_fim }}');

        $(".tempo_restante")
            .countdown(data_fim_contador, function (event) {
                $(this).text(
                    event.strftime('%D : %H : %M : %S')
                );

                console.log(event);

                if (event.type == 'finish') {
                    console.log('Operação chegou ao final');
                }
            });


        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin: 10,
                nav:true,
                items: 1,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
        });


    </script>
@endsection
