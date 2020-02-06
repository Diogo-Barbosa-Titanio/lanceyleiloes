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
                         <span class="texto">Leilão:</span><span class="valor"> {{$lote[0]->nome_leilao}}</span>
                     </h3>

                </div>

                <div class="col s12 xl6">
                    <h3 class="cabecalho">
                        <span class="texto">Código do leilão:</span><span class="valor"> {{$lote[0]->codigo_leilao}}</span>
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col s12 xl12">

                    <h3 class="cabecalho"><span class="texto">Lote:</span><span class="valor">{{$lote[0]->lote_ordem}} {{$lote[0]->nome_lote}}</span></h3>

                </div>
            </div>

        <div class="row">
            <div class="col s12 xl12">
                <div class="card horizontal">

                    <div class="card-image">
                        @if(!empty($lote[0]->foto_leilao))
                            <a href="#">
                                <img src="{{asset('storage'.$lote[0]->foto_leilao)}}"
                                     class="responsive-img"
                                     alt="{{$lote[0]->nome_leilao}}">
                            </a>
                        @endif
                    </div>
                    <div class="card-stacked">
                        <div class="card-content comitente">
                            <p>
                                <span class="texto">Comitente:</span>
                                <span>{{$lote[0]->comitente_leilao}}</span>
                            </p>

                            <p>
                                <span class="texto">Data de início:</span>
                                <span>{{$lote[0]->data_inicio}}</span>
                            </p>

                            <p>
                                <span class="texto">Data de Término:</span>
                                <span>{{$lote[0]->data_fim}}</span>
                            </p>

                            <p>
                                <span class="texto">Situação:</span>
                                <span>{{$lote[0]->nome_situacao}}</span>
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn">{{$lote[0]->natureza}}</a>


                            @if(Auth::check())

                               <leilao-habilitacao lote_id="{{$lote[0]->id}}" leilao_id="{{$lote[0]->id_leiloes}}" user_id="{{Auth::id()}}" :habilitado="{{$habilitado}}" ></leilao-habilitacao>

                            @endif

                            <a href="#" class="btn">{{$lote[0]->nome_situacao}}</a>
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

                                        @foreach($fotos as $foto)
                                            @if(!empty($foto->foto))
                                                <div class="item"><img src="{{asset('/storage'.$foto->foto)}}"> </div>
                                            @endif
                                       @endforeach

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
                                            <span class="valor"> {{\App\Helper::formataData($lote[0]->data_inicio)}} {{$lote[0]->hora_inicio}}</span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-calendar-alt"></i></span>
                                            <span class="texto">Término: </span>
                                            <span class="valor"> {{\App\Helper::formataData($lote[0]->data_fim)}} {{$lote[0]->hora_fim}}</span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="texto">Localidade: </span>
                                            <span class="valor"> {{$lote[0]->cidade}} , {{$lote[0]->estado}}</span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-database"></i></span>
                                            <span class="texto">Comissão do Leiloeiro: </span>
                                            <span class="valor">5% </span>
                                        </div>

                                        <div class="dados">
                                            <span class="icone"><i class="fas fa-dollar-sign"></i></span>
                                            <span class="texto">Lance Inicial:</span>
                                            <span class="valor">R$ {{\App\Helper::formatoEmReal($lote[0]->lance_inicial)}}</span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col s12 xl4">
                                    <div class="cronometro_leilao">
                                        <div class="leilao_situacao" situacao="{{$lote[0]->situacao_cor}}">
                                            {{$lote[0]->situacao_nome}}
                                        </div>

                                        <div class="data_hora">
                                            <div class="titulo">LEILÃO ENCERRA EM</div>
                                            <div class="tempo_restante row">
                                                <div class="valor dias tempo_restante_dias col xl3"></div>
                                                <div class="valor horas tempo_restante_horas col xl3"></div>
                                                <div class="valor minutos tempo_restante_minutos col xl3"></div>
                                                <div class="valor segundos tempo_restante_segundos col xl3"></div>
                                            </div>
                                            <div class="texto row">
                                                <div class="titulo dias col xl3">DIAS</div>
                                                <div class="titulo horas col xl3">HORAS</div>
                                                <div class="titulo minutos col xl3">MIN</div>
                                                <div class="titulo segundos col xl3">SEG</div>
                                            </div>

                                        </div>

                                        <leilao-maior-lance></leilao-maior-lance>

                                        @if(Auth::check())
                                             <leilao-lances></leilao-lances>
                                        @endif


                                        <leilao-cronometro></leilao-cronometro>
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
                                @if(!empty($lote[0]->descricao_lote))
                                 <li class="tab"><a href="#tab_descricao">Descrição</a></li>
                                @endif
                                <li class="tab"><a class="active" href="#tab_detalhes">Detalhes</a></li>
                                <li class="tab"><a href="#tab_infraestrutura">Infraestrutura</a></li>
                            </ul>
                        </div>
                        <div class="card-content grey lighten-4">
                            @if(!empty($lote[0]->descricao_lote))
                            <div id="tab_descricao">
                                {{$lote[0]->descricao_lote}}
                            </div>
                            @endif
                            <div id="tab_detalhes">
                                <div class="icones">
                                    <i class="far fa-object-ungroup"></i> <span class="texto">Tamanho do móvel:</span><span
                                        class="valor"> {{$lote[0]->area_privativa}} m²</span>
                                    <i class="fas fa-car"></i> <span class="texto">Número de vagas: </span><span
                                        class="valor">{{$lote[0]->vagas}}</span>
                                    <i class="fas fa-bed"></i> <span class="texto">Número de quartos: </span><span
                                        class="valor">{{$lote[0]->quartos}}</span>
                                    <i class="fas fa-crown"></i> <span class="texto">Número de suítes: </span><span
                                        class="valor">{{$lote[0]->suites}}</span>
                                </div>
                            </div>
                            <div id="tab_infraestrutura">
                                <div class="infraestrutura">

                                    <p>
                                        @if($lote[0]->academia == 'S')
                                            <span class="infra">Academia</span>
                                        @endif

                                        @if($lote[0]->bicicletario == 'S')
                                            <span class="infra">Bicicletário</span>
                                        @endif

                                        @if($lote[0]->brinquedoteca == 'S')
                                            <span class="infra">Brinquedoteca</span>
                                        @endif

                                        @if($lote[0]->campo_de_futebol == 'S')
                                            <span class="infra">Campo de futebol</span>
                                        @endif

                                        @if($lote[0]->churrasqueira == 'S')
                                            <span class="infra">Churrasqueira</span>
                                        @endif

                                        @if($lote[0]->cinema == 'S')
                                            <span class="infra">Cinema</span>
                                        @endif


                                        @if($lote[0]->pet_care == 'S')
                                            <span class="infra">Pet care</span>
                                        @endif

                                        @if($lote[0]->piscina == 'S')
                                            <span class="infra">Piscina</span>
                                        @endif

                                        @if($lote[0]->piscina_infantil == 'S')
                                            <span class="infra">Piscina infantil</span>
                                        @endif

                                        @if($lote[0]->pista_de_skate == 'S')
                                            <span class="infra">Pista de skate</span>
                                        @endif

                                        @if($lote[0]->playground == 'S')
                                            <span class="infra">Playground</span>
                                        @endif

                                        @if($lote[0]->quadra_de_squash == 'S')
                                            <span class="infra">Quadra de squash</span>
                                        @endif

                                        @if($lote[0]->quadra_de_tenis == 'S')
                                            <span class="infra">Quadra de tênis</span>
                                        @endif

                                        @if($lote[0]->restaurante == 'S')
                                            <span class="infra">Restaurante</span>
                                        @endif

                                        @if($lote[0]->sala_de_massagem == 'S')
                                            <span class="infra">Sala de massagem</span>
                                        @endif

                                        @if($lote[0]->salao_de_beleza == 'S')
                                            <span class="infra">Salão de beleza</span>
                                        @endif

                                        @if($lote[0]->salao_de_festas == 'S')
                                            <span class="infra">Salão de festas</span>
                                        @endif

                                        @if($lote[0]->salao_de_festas_infantil == 'S')
                                            <span class="infra">Salão de festas infantil</span>
                                        @endif

                                        @if($lote[0]->salao_de_jogos == 'S')
                                            <span class="infra">Salão de jogos</span>
                                        @endif

                                        @if($lote[0]->sauna == 'S')
                                            <span class="infra">Sauna</span>
                                        @endif

                                        @if($lote[0]->spa == 'S')
                                            <span class="infra">Spa</span>
                                        @endif

                                        @if($lote[0]->vagas_de_visitantes == 'S')
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

        const data_fim_contador = new Date('{{ date('Y/m/d',strtotime($lote[0]->data_fim)) }} {{ $lote[0]->hora_fim }}');

          $(".tempo_restante_dias")
            .countdown(data_fim_contador, function (event) {
                $(this).text(
                    event.strftime('%D')
                );

                console.log(event);

                if (event.type == 'finish') {
                    console.log('Operação chegou ao final');
                }
            });

         $(".tempo_restante_horas")
            .countdown(data_fim_contador, function (event) {
                $(this).text(
                    event.strftime('%H')
                );

                console.log(event);

                if (event.type == 'finish') {
                    console.log('Operação chegou ao final');
                }
            });

         $(".tempo_restante_minutos")
            .countdown(data_fim_contador, function (event) {
                $(this).text(
                    event.strftime('%M')
                );

                console.log(event);

                if (event.type == 'finish') {
                    console.log('Operação chegou ao final');
                }
            });


        $(".tempo_restante_segundos")
            .countdown(data_fim_contador, function (event) {
                $(this).text(
                    event.strftime('%S')
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
