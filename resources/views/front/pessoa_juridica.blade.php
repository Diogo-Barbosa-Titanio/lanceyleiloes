@extends('layouts.app')

@section('content')

    <div class="container pessoa_juridica">

        <div class="row">
            <div class="col s12 xl12">
                @include('alert_danger')
            </div>
        </div>

        <form action="{{url('/')}}/pessoa_juridica/store" method="post">
            @csrf
            <div class="row">
                <div class="col s12 xl12">
                    <h2>
                        <span class="texto">Faça seu cadastro</span>
                    </h2>
                </div>
            </div>

            <div class="row botoes">
                <div class="col s12 xl3">
                    <a href="{{url('/')}}/pessoa_fisica" class="btn btn-cor-auxiliar">Pessoa Física</a>

                    <a href="{{url('/')}}/pessoa_juridica" class="btn btn-cor-principal">Pessoa Jurídica</a>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 xl6">
                    <label for="razao_social">Razão Social*</label>
                    <input type="text" class="form-control @error('razao_social') is-invalid @enderror" value="{{ old('razao_social') }}" name="razao_social" id="razao_social" placeholder="">
                    @error('razao_social')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-field col s12 xl6">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 xl6">
                    <label for="cnpj">CNPJ*</label>
                    <input type="text" class="form-control @error('cnpj') is-invalid @enderror" value="{{ old('cnpj') }}" name="cnpj" id="cnpj" placeholder="">
                    @error('cnpj')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-field col s12 xl6">
                    <label for="ie">Inscrição Estadual*</label>
                    <input type="text" class="form-control @error('ie') is-invalid @enderror" value="{{ old('ie') }}" name="ie" id="ie" placeholder="">
                    @error('ie')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 xl6">
                    <label for="telefone">Telefone*</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}" name="telefone" id="telefone" placeholder="">
                    @error('ie')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-field col s12 xl6">
                    <label for="celular">Celular</label>
                    <input type="tel" class="form-control" value="{{old('celular')}}" name="celular" id="celular" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 xl2">
                    <label for="cep">Cep*</label>
                    <input type="text" class="form-control @error('cep') is-invalid @enderror" value="{{ old('cep') }}" name="cep" id="cep" placeholder="">
                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-field col s12 xl6">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" value="{{ old('endereco') }}" name="endereco" id="endereco" placeholder="">
                </div>

                <div class="input-field col s12 xl2">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" value="{{ old('numero') }}" name="numero" id="numero" placeholder="">
                </div>

                <div class="input-field col s12 xl2">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" value="{{ old('complemento') }}" name="complemento" id="complemento" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 xl3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" value="{{ old('bairro') }}" name="bairro" id="bairro" placeholder="">
                </div>

                <div class="input-field col s12 xl3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" value="{{ old('cidade') }}" name="cidade" id="cidade" placeholder="">
                </div>

                <div class="input-field col s12 xl3">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" value="{{ old('estado') }}" name="estado" id="estado" placeholder="">
                </div>

                <div class="input-field col s12 xl3">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" value="{{ old('pais') }}" name="pais" id="pais" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 xl4">
                    <label for="login">Login*</label>
                    <input type="text" class="form-control" value="{{ old('login') }}" name="login" id="login" placeholder="">
                </div>

                <div class="input-field col s12 xl4">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="">
                </div>

                <div class="input-field col s12 xl4">
                    <label for="confirma_senha">Confirma Senha</label>
                    <input type="password" class="form-control" name="confirma_senha" id="confirma_senha" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 xl10">
                    <label for="termo_de_uso">
                       <input class="" type="checkbox" id="termo_de_uso" name="termo_de_uso">
                       <span>Eu aceito os Termos de Uso</span>
                    </label>
                </div>

                <div class="input-field col s12 xl2">
                    <button class="btn btn-cor-principal">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

@endsection
