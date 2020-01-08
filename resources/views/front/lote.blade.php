@extends('layouts.app')

@section('styles')

    <!-- CSS Slideshow -->
    <link href="{{ asset('/css/slideshow.css') }}" rel="stylesheet">


@endsection


@section('content')
    <div class="container lote">

            <div class="row">
                <div class="col s12 xl7">

                </div>

                <div class="col s12 xl5">

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
                        <div class="card-content">
                            <p>
                                {{$leilao[0]->codigo_leilao}} - {{$leilao[0]->nome_leilao}}
                            </p>
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
                <div class="col xl12">
                    <h3>Lote {{$leilao[0]->lote_ordem}} - {{$leilao[0]->nome_lote}}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col xl12">
                    <span class="btn border">{{$leilao[0]->natureza}}</span>
                    <span class="btn">{{$leilao[0]->tipo_leilao}}</span>
                </div>
            </div>

            <div class="row">
                <div class="col xl2">
                    <span class="pr-2"><i class="far fa-eye"></i></span> {{$leilao[0]->count}} <span class="pl-2">visualizações</span>
                </div>
                <div class="col xl2">
                    <span class="pr-2"><i class="far fas fa-gavel"></i></span> 0 <span class="pl-2">lance(s)</span>
                </div>
            </div>

            <div class="row">
                <div class="col s12 xl4">
                    <div id="container">
                        <div id="slideshow" class="fullscreen">
                            <!-- Below are the images in the gallery -->
                            <div id="img-1" data-img-id="1" class="img-wrapper active"
                                 style="background-image: url('{{asset('/storage/images/lotes/lotes_1_20191112_163649_800.jpeg')}}')"></div>
                            <div id="img-2" data-img-id="2" class="img-wrapper"
                                 style="background-image: url('{{asset('/storage/images/lotes/lotes_1_20191112_170206_651.jpeg')}}')"></div>
                            <div id="img-3" data-img-id="3" class="img-wrapper"
                                 style="background-image: url('{{asset('/storage/images/lotes/lotes_1_20191112_170207_711.jpeg')}}')"></div>

                            <!-- Below are the thumbnails of above images -->
                            <div class="thumbs-container bottom">
                                <div id="prev-btn" class="prev">
                                    <i class="fa fa-chevron-left fa-3x"></i>
                                </div>

                                <ul class="thumbs">
                                    <li data-thumb-id="1" class="thumb active"
                                        style="background-image: url('{{asset('/storage/images/lotes/lotes_1_20191112_163649_800.jpeg')}}')"></li>
                                    <li data-thumb-id="2" class="thumb"
                                        style="background-image: url('{{asset('/storage/images/lotes/lotes_1_20191112_170206_651.jpeg')}}')"></li>
                                    <li data-thumb-id="3" class="thumb"
                                        style="background-image: url('{{asset('/storage/images/lotes/lotes_1_20191112_170207_711.jpeg')}}')"></li>
                                </ul>

                                <div id="next-btn" class="next">
                                    <i class="fa fa-chevron-right fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12  xl4">
                    <div class="border informacoes">

                        <div>
                            <h2>
                                <span class="texto">Informações</span>
                            </h2>
                        </div>

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
                            <div><span class="texto">Lance Inicial:</span></div>
                            <h2><span class="texto">R$ {{$leilao[0]->lance_inicial}}</span></h2>
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


        <!-- espacamento -->

        <div class="espacamento">

            @if(!empty($leilao[0]->descricao_lote))
                <div class="row">
                    <div class="col xl12">
                        <h2>
                            <span class="texto"> Descrição </span>
                        </h2>

                        <div>
                            {{$leilao[0]->descricao_lote}}
                        </div>

                    </div>
                </div>

                <hr>
            @endif


            <div class="row">
                <div class="col xl12">
                    <h2>
                        <span class="texto"> Detalhes </span>
                    </h2>

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
            </div>

            <hr>

            <div class="row">
                <div class="col xl12">
                    <h2>
                        <span class="texto"> Infraestrutura </span>
                    </h2>

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

            <hr>

        </div>

    </div>
@endsection

@section('scripts')


    <!-- Galeria de imagens -->
    <script src="{{asset('/js/gallery.js')}}"></script>

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
    </script>

@endsection
