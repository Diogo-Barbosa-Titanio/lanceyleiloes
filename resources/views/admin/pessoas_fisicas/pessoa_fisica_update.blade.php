@extends('layouts.admin')

@section('titulo','Alterar Pessoa Física')

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
                        <h6 class="m-0 font-weight-bold text-primary">Alterar Pessoa Física</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{url('/admin/pessoa_fisica/update')}}"
                              enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$pessoa_fisica[0]->id}}" name="id" id="id">
                            <div class="form-row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="nome">
                                            Nome
                                        </label>
                                        <input type="text" id="nome" name="nome"
                                               class="form-control @error('nome') is-invalid @enderror"
                                               value="{{ old('nome',$pessoa_fisica[0]->nome) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                        </label>
                                        <input type="email" id="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email',$pessoa_fisica[0]->email) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="cpf">
                                            CPF
                                        </label>
                                        <input type="text" id="cpf" name="cpf"
                                               class="form-control cpf @error('cpf') is-invalid @enderror"
                                               value="{{ old('cpf',$pessoa_fisica[0]->cpf) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="rg">
                                            RG
                                        </label>
                                        <input type="text" id="rg" name="rg"
                                               class="form-control rg @error('rg') is-invalid @enderror"
                                               value="{{ old('rg',$pessoa_fisica[0]->rg) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="telefone">
                                            Telefone
                                        </label>
                                        <input type="text" id="telefone" name="telefone"
                                               class="form-control telefone @error('telefone') is-invalid @enderror"
                                               value="{{ old('telefone',$pessoa_fisica[0]->telefone) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="celular">
                                            Celular
                                        </label>
                                        <input type="text" id="celular" name="celular"
                                               class="form-control celular @error('celular') is-invalid @enderror"
                                               value="{{ old('celular',$pessoa_fisica[0]->celular) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="sexo">
                                            Sexo
                                        </label>
                                        <select name="sexo" id="sexo"
                                                class="custom-select form-control @error('sexo') is-invalid @enderror">
                                            <option value="">Selecione</option>
                                            <option value="F" {{old('sexo', $pessoa_fisica[0]->sexo) == 'F' ? 'selected' : ''}}>Feminino</option>
                                            <option value="M" {{old('sexo', $pessoa_fisica[0]->sexo) == 'M' ? 'selected' : ''}}>Masculino
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="nascimento">
                                            Data de Nascimento
                                        </label>
                                        <input type="text"
                                               class="form-control data @error('nascimento') is-invalid @enderror"
                                               value="{{ old('nascimento', date('d/m/Y',strtotime($pessoa_fisica[0]->nascimento))) }}" name="nascimento" id="nascimento">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="cep">Cep*</label>
                                        <input type="text" class="form-control cep @error('cep') is-invalid @enderror"
                                               value="{{ old('cep', $pessoa_fisica[0]->cep) }}" name="cep" id="cep" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" class="form-control" value="{{ old('endereco', $pessoa_fisica[0]->endereco) }}"
                                               name="endereco" id="endereco" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="number" class="form-control" value="{{ old('numero', $pessoa_fisica[0]->numero) }}"
                                               name="numero" id="numero" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" value="{{ old('complemento', $pessoa_fisica[0]->complemento) }}"
                                               name="complemento" id="complemento" placeholder="">
                                    </div>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" value="{{ old('bairro', $pessoa_fisica[0]->bairro) }}"
                                               name="bairro" id="bairro" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control" value="{{ old('cidade', $pessoa_fisica[0]->cidade) }}"
                                               name="cidade" id="cidade" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control" value="{{ old('estado', $pessoa_fisica[0]->estado) }}"
                                               name="estado" id="estado" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <input type="text" class="form-control" value="{{ old('pais', $pessoa_fisica[0]->pais) }}" name="pais"
                                               id="pais" placeholder="">
                                    </div>
                                </div>

                            </div>


                            <div class="form-row">

                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="login">
                                            Login
                                        </label>
                                        <input type="text" id="login" name="login"
                                               class="form-control @error('login') is-invalid @enderror"
                                               value="{{ old('login', $pessoa_fisica[0]->login) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="password">
                                            Senha
                                        </label>
                                        <input type="password" id="password" name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               value="{{ old('password') }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="password">
                                            Confirmar Senha
                                        </label>
                                        <input type="password" id="confirm_password" name="confirm_password"
                                               class="form-control @error('confirm_password') is-invalid @enderror"
                                               value="{{ old('confirm_password') }}">
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">
                                <span class="text">Alterar</span>
                            </button>

                            <a href="{{url('/admin/pessoa_fisica')}}" class="btn btn-secondary">
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

    <!-- Máscara de formulários -->
    <script src="{{asset('/js/formulario_mascaras.js')}}"></script>

@endsection
