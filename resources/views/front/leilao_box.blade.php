<div class="leilao_box">
<a href="{{url('/')}}/lote/{{$leilao->id}}" class="leilao_link">
    <div class="card leilao">
        <div class="card-image">
            <div class="leilao_foto">
                <img src="{{asset('storage')}}{{$leilao->foto}}" class="responsive-img" alt="{{$leilao->nome_lote}}">
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
                <h5 class="inicial"><span class="texto">Lance inicial:</span> <span class="valor">R$ {{number_format($leilao->lance_inicial,2,',','.')}}</span>
                </h5>
                <h6 class="atual">Lance atual: <span class="valor">R$ {{number_format($leilao->lance_atual,2,',','.')}}</span></h6>
            </div>

            <div class="leilao_informacoes">
                <p><i class="fas fa-flag"></i><span class="campo">Código:</span><span
                        class="valor">{{$leilao->codigo_leilao}}</span></p>
                <p><i class="fas fa-map-marker-alt"></i><span class="campo">Localidade:</span><span
                        class="valor">{{$leilao->cidade}} , {{$leilao->estado}}</span></p>
                <p><i class="fas fa-calendar-alt"></i><span class="campo">Início:</span><span
                        class="valor">{{date('d-m-Y',strtotime($leilao->data_inicio))}} {{$leilao->hora_inicio}}</span></p>
                <p><i class="fas fa-calendar-alt"></i><span class="campo">Fim:</span><span
                        class="valor">{{date('d-m-Y',strtotime($leilao->data_fim))}} {{$leilao->hora_fim}}</span></p>
                <p><i class="fas fa-stopwatch"></i><span class="campo">Fase da obra:</span><span
                        class="valor">{{$leilao->fase_da_obra}}</span></p>
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

            <span class="new badge yellow darken-4" data-badge-caption="">{{$leilao->natureza}}</span>
        </div>

        <div class="leilao_topo">
            <div class="leilao_natureza">
                <span class="texto">{{$leilao->natureza}}</span>
            </div>
            <div class="leilao_tipo">
                {{$leilao->tipo_leilao}}
            </div>
        </div>

        <div class="leilao_situacao" situacao= {{App\Helper::kebabComRemoverAcentos($leilao->nome_situacao)}}>
            {{$leilao->nome_situacao}}
        </div>

    </div>
</a>
</div>

