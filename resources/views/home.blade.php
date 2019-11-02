@extends('layouts.app')

@section('content')
    <div class="container home">
        <div class="row">
            <div class="col-sm-12">
                <h2>
                   <span class="texto">Leilões em andamento</span>
                </h2>
            </div>
        </div>
        <div class="row">

          @foreach($leiloesAbertos as $leilao)

            <div class="col-sm-4">
               @include('leilao_box',['leilao' => $leilao])
            </div>

           @endforeach

           @foreach($leiloesEmLoteamento as $leilao)

               <div class="col-sm-4">
                  @include('leilao_box',['leilao' => $leilao])
               </div>

           @endforeach
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h2>
                    <span class="texto">Leilões finalizados</span>
                </h2>
            </div>
        </div>
        <div class="row">

            @foreach($leiloesNaoArrematados as $leilao)

                <div class="col-sm-4">
                    @include('leilao_box',['leilao' => $leilao])
                </div>

            @endforeach

            @foreach($leiloesArrematados as $leilao)

                <div class="col-sm-4">
                    @include('leilao_box',['leilao' => $leilao])
                </div>

            @endforeach
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
