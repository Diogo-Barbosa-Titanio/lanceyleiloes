@extends('layouts.app')

@section('content')

    <div class="container pessoa_fisica">

        <div class="row">
            <div class="col-12 col-sm-12 mt-4">
                @include('alert_danger')
            </div>
        </div>

        <form action="{{url('/')}}/pessoa_fisica/store" method="post">
            @csrf
            <div class="form-row">
                <div class="col-sm-12">
                    <h2>
                        <span class="texto">Faça seu cadastro</span>
                    </h2>
                </div>
            </div>

            <div class="form-row botoes">
                <div class="col-sm-3">
                    <a href="{{url('/')}}/pessoa_fisica" class="btn btn-cor-principal">Pessoa Física</a>

                    <a href="{{url('/')}}/pessoa_juridica" class="btn btn-cor-auxiliar">Pessoa Jurídica</a>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nome">Nome*</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" name="nome" id="nome" required placeholder="nome">

                    @error('nome')
                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" required placeholder="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="cpf">CPF*</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}" name="cpf" id="cpf" required placeholder="000.000.000-00">

                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6">
                    <label for="rg">RG*</label>
                    <input type="text" class="form-control @error('rg') is-invalid @enderror" value="{{ old('rg') }}" name="rg" id="rg" required placeholder="00.000.000-0">

                    @error('rg')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="sexo">Sexo*</label>
                    <select name="sexo" id="sexo" class="custom-select form-control @error('sexo') is-invalid @enderror">
                        <option value="">Selecione</option>
                        <option value="0" {{'F'.old('sexo') == 'F0' ? 'selected' : ''}}>Feminino</option>
                        <option value="1" {{old('sexo') == 1 ? 'selected' : ''}}>Masculino</option>
                    </select>

                    @error('sexo')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6">
                    <label for="nascimento">Data de Nascimento*</label>
                    <input type="date" class="form-control @error('nascimento') is-invalid @enderror" value="{{ old('nascimento') }}" name="nascimento" id="nascimento" required placeholder="00/00/0000">

                    @error('nascimento')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="telefone">Telefone*</label>
                    <input type="text" class="form-control  @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}" name="telefone" id="telefone" placeholder="">

                    @error('telefone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6">
                    <label for="celular">Celular</label>
                    <input type="tel" class="form-control" value="{{ old('celular') }}" name="celular" id="celular" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label for="cep">Cep*</label>
                    <input type="text" class="form-control @error('cep') is-invalid @enderror" value="{{ old('cep') }}" name="cep" id="cep" placeholder="">

                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="form-group col-sm-6">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" value="{{ old('endereco') }}" name="endereco" id="endereco" placeholder="">
                </div>

                <div class="form-group col-sm-2">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" value="{{ old('numero') }}" name="numero" id="numero" placeholder="">
                </div>

                <div class="form-group col-sm-2">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" value="{{ old('complemento') }}" name="complemento" id="complemento" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" value="{{ old('bairro') }}" name="bairro" id="bairro" placeholder="">
                </div>

                <div class="form-group col-sm-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" value="{{ old('cidade') }}" name="cidade" id="cidade" placeholder="">
                </div>

                <div class="form-group col-sm-3">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" value="{{ old('estado') }}" name="estado" id="estado" placeholder="">
                </div>

                <div class="form-group col-sm-3">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" value="{{ old('pais') }}" name="pais" id="pais" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="login">Login*</label>
                    <input type="text" class="form-control  @error('login') is-invalid @enderror" value="{{ old('login') }}" name="login" id="login" placeholder="">

                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="form-group col-sm-4">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="">
                </div>

                <div class="form-group col-sm-4">
                    <label for="confirma_senha">Confirma Senha</label>
                    <input type="password" class="form-control" name="confirma_senha" id="confirma_senha"
                           placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-10">
                    <input class="" type="checkbox" id="termo_de_uso" name="termo_de_uso">
                    <label for="termo_de_uso">
                        Eu aceito os Termos de Uso
                    </label>
                </div>

                <div class="form-group col-sm-2 text-right">
                    <button class="btn btn-cor-principal">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

@endsection
