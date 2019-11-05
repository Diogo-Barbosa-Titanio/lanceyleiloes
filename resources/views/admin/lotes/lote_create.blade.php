@extends('layouts.admin')

@section('titulo','Cadastro de Lote')

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
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Lote</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{url('/admin/lotes/store')}}" enctype="multipart/form-data">
                            @csrf


                            <fieldset>
                                <legend>
                                    Dados do lote
                                </legend>


                                <div class="form-row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="leilao">
                                                Leilão
                                            </label>
                                            <select name="leilao" id="leilao"
                                                    class="custom-select form-control @error('leilao') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                @foreach($leiloes as $leilao)
                                                    <option value="{{$leilao->id}}" {{old('leilao') == $leilao->id ? 'selected' : ''}}>{{$leilao->nome}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="categoria">
                                                Categoria
                                            </label>
                                            <select name="categoria" id="categoria"
                                                    class="custom-select form-control @error('categoria') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}" {{old('categoria') == $categoria->id ? 'selected' : ''}}>{{$categoria->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="lance_inicial">
                                                Lance inicial
                                            </label>
                                            <input type="text" id="lance_inicial" name="lance_inicial"
                                                   class="form-control @error('lance_inicial') is-invalid @enderror" value="{{ old('lance_inicial') }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="lance_minimo">
                                                Lance mínimo
                                            </label>
                                            <input type="text" id="lance_minimo" name="lance_minimo"
                                                   class="form-control @error('lance_minimo') is-invalid @enderror" value="{{ old('lance_minimo') }}">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="data_inicio">
                                                Data de início
                                            </label>
                                            <input type="text"
                                                   class="form-control @error('data_inicio') is-invalid @enderror"
                                                   value="{{ old('data_inicio') }}" name="data_inicio" id="data_inicio"
                                                   placeholder="00/00/0000">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="data_fim">
                                                Data de Encerramento
                                            </label>
                                            <input type="text"
                                                   class="form-control @error('data_fim') is-invalid @enderror"
                                                   value="{{ old('data_fim') }}" name="data_fim" id="data_fim"
                                                   placeholder="00/00/0000">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="nome">
                                                Nome
                                            </label>
                                            <input type="text" id="nome" name="nome"
                                                   class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
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
                                            {{old('descricao')}}
                                        </textarea>
                                        </div>
                                    </div>

                                </div>


                            </fieldset>


                            <fieldset>
                                <legend>Endereço do imóvel</legend>


                                <div class="form-row">

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="cep">Cep*</label>
                                            <input type="text" class="form-control @error('cep') is-invalid @enderror"
                                                   value="{{ old('cep') }}" name="cep" id="cep" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="endereco">Endereço</label>
                                            <input type="text" class="form-control" value="{{ old('endereco') }}"
                                                   name="endereco" id="endereco" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <input type="number" class="form-control" value="{{ old('numero') }}"
                                                   name="numero" id="numero" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <div class="form-group">
                                            <label for="complemento">Complemento</label>
                                            <input type="text" class="form-control" value="{{ old('complemento') }}"
                                                   name="complemento" id="complemento" placeholder="">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" class="form-control" value="{{ old('bairro') }}"
                                                   name="bairro" id="bairro" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" class="form-control" value="{{ old('cidade') }}"
                                                   name="cidade" id="cidade" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <input type="text" class="form-control" value="{{ old('estado') }}"
                                                   name="estado" id="estado" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label for="pais">País</label>
                                            <input type="text" class="form-control" value="{{ old('pais') }}" name="pais"
                                                   id="pais" placeholder="">
                                        </div>
                                    </div>

                                </div>

                            </fieldset>

                            <fieldset>
                                 <legend>Características do Imóvel</legend>

                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="fase_da_obra">
                                                Fase da Obra
                                            </label>
                                            <select name="leilao" id="leilao"
                                                    class="custom-select form-control @error('fase_da_obra') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                @foreach($fases_das_obras as $fase_da_obra)
                                                    <option value="{{$fase_da_obra->id}}" {{old('$fase_da_obra') == $fase_da_obra->id ? 'selected' : ''}}>{{$fase_da_obra->nome}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </fieldset>



                            <button type="submit" class="btn btn-primary">
                                <span class="text">Enviar</span>
                            </button>

                            <a href="{{url('/admin/lotes')}}" class="btn btn-secondary">
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
                    onKeyPress: function(val, e, field, options) {
                        field.mask(CLMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#celular').mask(CLMaskBehavior, clOptions);

            $('#rg').mask('99.999.999-9')

        });

    </script>

@endsection
