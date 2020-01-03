@extends('layouts.app')

@section('titulo','Home')

@section('content')
    <div class="container home">

        <div class="section">
            <div class="row">
                <div class="col s12">
                    <h2>
                       <span class="texto">Leilões em andamento</span>
                    </h2>
                </div>
            </div>

            <div class="row">

              @foreach($leiloesAbertos as $leilao)

                <div class="col s12 xl4">
                   @include('front.leilao_box',['leilao' => $leilao])
                </div>

               @endforeach

            </div>

            <div class="row">
                <div class="col s12">
                    <h2>
                        <span class="texto">Leilões finalizados</span>
                    </h2>
                </div>
            </div>
            <div class="row">

                @foreach($leiloesNaoArrematados as $leilao)

                    <div class="col s12 xl4">
                        @include('front.leilao_box',['leilao' => $leilao])
                    </div>

                @endforeach

            </div>

        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
           console.log(jQuery().jquery);
        });
    </script>

@endsection
