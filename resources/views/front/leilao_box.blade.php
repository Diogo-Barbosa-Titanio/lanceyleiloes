<div class="leilao_box">
<a href="{{url('/')}}/lote/{{$leilao->id}}" class="leilao_link">
    <div class="leilao_box_espaco">
        <div class="leilao_topo">
            <div class="leilao_natureza">
                <span class="texto">{{$leilao->natureza}}</span>
            </div>
            <div class="leilao_tipo">
                {{$leilao->tipo_leilao}}
            </div>
        </div>
        <div class="leilao_foto">
            <img src="{{asset('storage')}}{{$leilao->foto}}" class="img-fluid" alt="{{$leilao->nome_lote}}">
        </div>

        <div class="leilao_situacao" situacao= {{App\Helper::kebabComRemoverAcentos($leilao->nome_situacao)}}>
            {{$leilao->nome_situacao}}
        </div>

        <div class="leilao_praca_1">
            <span class="texto">1ª Praça: </span> <span class="data"> 01/07/2019 10:00:00</span>
        </div>

        <div class="leilao_praca_2">
            <span class="texto">2ª Praça: </span> <span class="data"> 01/08/2019 15:10:00</span>
        </div>

        <div class="leilao_nome">
                    <span class="texto">
                        {{$leilao->nome_lote}}
                    </span>
        </div>

        <div class="leilao_caracteristicas">
            <div class="icone">
                <div class="figura">
                    <i class="fas fa-bed"></i>
                </div>

                <div class="texto">
                    {{ $leilao->quartos }}
                </div>
            </div>

            <div class="icone">
                <div class="figura">
                    <i class="fas fa-crown"></i>
                </div>

                <div class="texto">
                    {{ $leilao->suites }}
                </div>
            </div>

            <div class="icone">
                <div class="figura">
                    <i class="fas fa-car"></i>
                </div>

                <div class="texto">
                    {{ $leilao->vagas }}
                </div>
            </div>

            <div class="icone">
                <div class="figura">
                    <i class="far fa-object-ungroup"></i>
                </div>

                <div class="texto">
                    {{ $leilao->area_privativa }} m²
                </div>
            </div>

        </div>

        <div class="leilao_lance">
            <div class="inicial">
                <span class="texto">Lance inicial:</span>
                <span class="valor">R$ {{number_format($leilao->lance_inicial,2,',','.')}}</span>
            </div>

            <div class="atual">
                <span class="texto">Lance atual:</span>
                <span class="valor">R$ {{number_format($leilao->lance_atual,2,',','.')}}</span>
            </div>
        </div>

        <div class="leilao_info">
            <div class="dados">
                <span class="figura"><i class="fas fa-flag"></i></span>
                <span class="valor">{{$leilao->codigo_leilao}}</span>
            </div>

            <div class="dados">
                <span class="figura"><i class="fas fa-map-marker-alt"></i></span>
                <span class="valor">{{$leilao->cidade}} , {{$leilao->estado}}</span>
            </div>

            <div class="dados">
                <span class="figura"><i class="fas fa-calendar-alt"></i></span>
                <span class="texto">Início:</span>
                <span class="valor">{{date('d-m-Y',strtotime($leilao->data_inicio))}} {{$leilao->hora_inicio}}</span>
            </div>

            <div class="dados">
                <span class="figura"><i class="fas fa-calendar-alt"></i></span>
                <span class="texto">Término:</span>
                <span class="valor">{{date('d-m-Y',strtotime($leilao->data_fim))}} {{$leilao->hora_fim}}</span>
            </div>

            <div class="dados">
                <span class="texto">Fase da obra:</span>
                <span class="valor">{{$leilao->fase_da_obra}}</span>
            </div>
        </div>
    </div>
</a>
</div>

