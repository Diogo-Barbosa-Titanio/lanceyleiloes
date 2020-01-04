<div class="leilao_box">
    <a href="{{url('/')}}/lote/{{$leilao->id}}" class="leilao_link">
        <div class="card leilao">
            <div class="card-image">
                <div class="leilao_foto">
                    <img src="{{asset('storage')}}{{$leilao->foto}}" class="responsive-img"
                         alt="{{$leilao->nome_lote}}">
                </div>

                <a class="activator btn-floating halfway-fab waves-effect waves-light">
                    <i class="material-icons">add</i></a>

            </div>

            <div class="card-content">
            <span class="card-title">
               <h5 class="leilao_titulo">{{$leilao->nome_lote}}</h5>
            </span>

                <div class="leilao_imovel">
                    <div class="detalhes">
                        <div class="quantidade">
                            <i class="fas fa-bath" title="Banheiros"></i>
                            <span class="valor">{{ $leilao->banheiros }}</span>
                        </div>
                        <div class="quantidade">
                            <i class="fas fa-bed" title="Quartos"></i>
                            <span class="valor">{{ $leilao->quartos }}</span>
                        </div>
                        <div class="quantidade">
                            <i class="fas fa-chess-queen" title="Suítes"></i>
                            <span class="valor">{{ $leilao->suites }}</span>
                        </div>
                        <div class="quantidade">
                            <i class="fas fa-car" title="Vagas"></i>
                            <span class="valor">{{ $leilao->vagas }}</span>
                        </div>
                        <div class="quantidade">
                            <i class="fas fa-vector-square" title="Área"></i>
                            <span class="valor">{{ $leilao->area_privativa }} m²</span>
                        </div>
                    </div>
                </div>

                <div class="leilao_lance">
                    <h5 class="inicial"><span class="texto">Lance inicial:</span> <span
                            class="valor">R$ {{number_format($leilao->lance_inicial,2,',','.')}}</span>
                    </h5>
                    <h6 class="atual">Lance atual: <span
                            class="valor">R$ {{number_format($leilao->lance_atual,2,',','.')}}</span></h6>
                </div>

                <div class="leilao_informacoes">

                    <p><i class="fas fa-flag"></i><span class="campo">Código:</span><span
                            class="valor">{{$leilao->codigo_leilao}}</span></p>
                    <p><i class="fas fa-map-marker-alt"></i><span class="campo">Localidade:</span><span
                            class="valor">{{$leilao->cidade}} , {{$leilao->estado}}</span></p>
                    <p><i class="fas fa-calendar-alt"></i><span class="campo">Início:</span><span
                            class="valor">{{date('d-m-Y',strtotime($leilao->data_inicio))}} {{$leilao->hora_inicio}}</span>
                    </p>
                    <p><i class="fas fa-calendar-alt"></i><span class="campo">Fim:</span><span
                            class="valor">{{date('d-m-Y',strtotime($leilao->data_fim))}} {{$leilao->hora_fim}}</span>
                    </p>
                    <p><i class="fas fa-stopwatch"></i><span class="campo">Fase da obra:</span><span
                            class="valor">{{$leilao->fase_da_obra}}</span></p>

                </div>

                <div class="leilao_detalhes">

                    <a class="btn btn-small leilao_natureza">
                        {{$leilao->natureza}}
                    </a>

                    <a class="btn btn-small leilao_tipo purple darken-3">
                        {{$leilao->tipo_leilao}}
                    </a>

                    <a class="btn btn-small leilao_situacao grey"
                       situacao={{App\Helper::kebabComRemoverAcentos($leilao->nome_situacao)}}>
                        {{$leilao->nome_situacao}}
                    </a>


                </div>

            </div>

            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">
                {{$leilao->nome_lote}}<i class="material-icons right">close</i>
            </span>

                <p>{{$leilao->descricao_lote}}</p>


            </div>

            <div class="card-action">
                <a class="waves-effect waves-light btn" href="{{url('/')}}/lote/{{$leilao->id}}">Visualizar</a>
            </div>

            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#observacoes_{{$leilao->id}}">Observações</a></li>
                    <li class="tab"><a class="active" href="#edital_{{$leilao->id}}">Edital</a></li>
                    <li class="tab"><a href="#detalhes_{{$leilao->id}}">Detalhes</a></li>
                </ul>
            </div>

            <div class="card-content grey lighten-4">
                <div id="observacoes_{{$leilao->id}}">O leilão pode ser cancelado sem aviso prévio. Leia o edital para
                    maiores
                    detalhes.
                </div>
                <div id="edital_{{$leilao->id}}"><a href="{{asset('storage'.$leilao->edital_leilao)}}" target="_blank">Edital do leilão <span class="leilao_nome">{{$leilao->nome_leilao}}</span> (Formato em PDF)</a></div>
                <div id="detalhes_{{$leilao->id}}">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac rutrum metus, ut finibus
                        erat. Maecenas ut est malesuada, rhoncus lacus id, pellentesque ipsum. Nullam scelerisque magna
                        vitae consectetur mollis. Sed a turpis a diam placerat pretium. Cras eu ante eu arcu pharetra
                        viverra. Nulla eget magna lacus. Nullam lectus dui, blandit et dui sit amet, dictum mattis
                        sapien. Integer pretium sagittis lectus, eu ornare lorem interdum imperdiet. Aliquam efficitur
                        euismod justo, sed convallis urna finibus consectetur. Sed tellus nibh, posuere at orci vel,
                        porta pulvinar dui.
                    </p>
                </div>
            </div>


        </div>
    </a>
</div>

