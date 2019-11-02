@extends('layouts.admin')

@section('titulo','Alterar Leilão')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-12 mt-4">
                @include('alert_danger')
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Alterar Leilão</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{url('/admin/leiloes/update')}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$leiloes[0]->id}}">
                            <input type="hidden" name="foto_atual" value="{{$leiloes[0]->foto}}">
                            <input type="hidden" name="edital_atual" value="{{$leiloes[0]->edital}}">

                            <div class="form-row">

                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="nome">
                                            Nome
                                        </label>
                                        <input type="text" id="nome" name="nome"
                                               class="form-control @error('nome') is-invalid @enderror"
                                               value="{{ old('nome',$leiloes[0]->nome) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="nome">
                                            Código
                                        </label>
                                        <input type="text" id="codigo" name="codigo"
                                               class="form-control @error('codigo') is-invalid @enderror"
                                               value="{{ old('codigo',$leiloes[0]->codigo) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="descricao">
                                            Descrição
                                        </label>
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3">
                                            {{old('descricao',$leiloes[0]->descricao)}}
                                        </textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="comitente">
                                            Comitentes
                                        </label>
                                        <select name="comitente" id="comitente" class="custom-select form-control @error('comitente') is-invalid @enderror">
                                            <option value="">Selecione</option>

                                            @foreach($comitentes as $comitente)
                                                 <option value="{{$comitente->id}}" {{old('comitente',$leiloes[0]->id_leiloes_comitentes) == $comitente->id ? 'selected' : ''}}>{{$comitente->nome}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="tipo">
                                            Tipo de leilão
                                        </label>
                                        <select name="tipo" id="tipo"
                                                class="custom-select form-control @error('tipo') is-invalid @enderror">
                                            <option value="">Selecione</option>
                                              @foreach($tipos as $tipo)
                                                <option value="{{$tipo->id}}" {{old('tipo',$leiloes[0]->id_leiloes_tipos) == $tipo->id ? 'selected' : ''}}>{{$tipo->nome}}</option>
                                               @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="natureza">
                                            Natureza
                                        </label>
                                        <select name="natureza" id="natureza"
                                                class="custom-select form-control @error('natureza') is-invalid @enderror">
                                            <option value="">Selecione</option>
                                            @foreach($naturezas as $natureza)
                                                <option value="{{$natureza->id}}" {{old('natureza',$leiloes[0]->id_leiloes_naturezas) == $natureza->id ? 'selected' : ''}}>{{$natureza->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-6 mt-1 mb-1">
                                    <div class="form-group">
                                        <label for="foto" class="font-weight-bold">
                                            Enviar Foto
                                        </label>
                                        <input type="file" id="foto" name="foto" class="form-control-file">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 mt-1 mb-1">
                                    <div class="form-group">
                                        <label for="edital" class="font-weight-bold">
                                            Enviar Edital
                                        </label>
                                        <input type="file" id="edital" name="edital" class="form-control-file @error('natureza') is-invalid @enderror">
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">
                                 <span class="text">Enviar</span>
                            </button>

                            <a href="{{url('/admin/leiloes')}}" class="btn btn-secondary">
                                 <span class="text">Cancelar</span>
                            </a>

                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection

@section('scripts')

    <script>

        $(document).ready(function () {

            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#cep').mask('00000-000');
            $('#telefone').mask('(00) 0000-0000');
            $('#nascimento').mask('00/00/0000');

            let CLMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            };

            let clOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(CLMaskBehavior.apply({}, arguments), options);
                }
            };

            $('#celular').mask(CLMaskBehavior, clOptions);

            $('#rg').mask('99.999.999-9')

        });

    </script>

@endsection
