<div class="leilao_box">
<a href="{{url('/')}}/lote/{{$leilao->id_lote}}" class="leilao_link">
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
            <img src="{{url('/')}}/../../web/fotos/{{$leilao->foto}}" alt="{{$leilao->nome_lote}}">
        </div>

        <div class="leilao_situacao" situacao= {{$leilao->situacao_cor}}>
            {{$leilao->situacao_nome}}
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
                <span class="valor">R$ {{$leilao->lance_ini}}</span>
            </div>

            <div class="atual">
                <span class="texto">Lance inicial:</span>
                <span class="valor">R$ {{$leilao->lance_recente}}</span>
            </div>
        </div>

        <div class="leilao_info">
            <div class="dados">
                <span class="figura"><i class="fas fa-flag"></i></span>
                <span class="valor">{{$leilao->codigo_leilao}}</span>
            </div>

            <div class="dados">
                <span class="figura"><i class="fas fa-map-marker-alt"></i></span>
                <span class="valor">{{$leilao->cidade_lote}},{{$leilao->estado_lote}}</span>
            </div>

            <div class="dados">
                <span class="figura"><i class="fas fa-calendar-alt"></i></span>
                <span class="texto">Início:</span>
                <span class="valor">{{$leilao->data_ini}}</span>
            </div>

            <div class="dados">
                <span class="figura"><i class="fas fa-calendar-alt"></i></span>
                <span class="texto">Término:</span>
                <span class="valor">{{$leilao->data_fim}}</span>
            </div>

            <div class="dados">
                <span class="texto">Fase da obra:</span>
                <span class="valor">{{$leilao->obra}}</span>
            </div>
        </div>
    </div>
</a>
</div>

