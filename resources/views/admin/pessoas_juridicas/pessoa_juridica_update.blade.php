@extends('layouts.admin')

@section('titulo','Cadastro de Pessoa Jurídica')

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
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Pessoa Jurídica</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{url('/admin/pessoa_juridica/update')}}"
                              enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$pessoa_juridica[0]->id}}" id="id" name="id">
                            <div class="form-row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="nome">
                                            Nome
                                        </label>
                                        <input type="text" id="nome" name="nome"
                                               class="form-control @error('nome') is-invalid @enderror"
                                               value="{{ old('nome',$pessoa_juridica[0]->nome) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                        </label>
                                        <input type="email" id="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email',$pessoa_juridica[0]->email) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="cnpj">
                                            CNPJ
                                        </label>
                                        <input type="text" id="cnpj" name="cnpj"
                                               class="form-control cnpj @error('cnpj') is-invalid @enderror"
                                               value="{{ old('cnpj',$pessoa_juridica[0]->cnpj) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="rg">
                                            Inscrição estadual
                                        </label>
                                        <input type="text" id="inscricao_estadual" name="inscricao_estadual"
                                               class="form-control @error('inscricao_estadual') is-invalid @enderror"
                                               value="{{ old('inscricao_estadual',$pessoa_juridica[0]->inscricao_estadual) }}">
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
                                               value="{{ old('telefone',$pessoa_juridica[0]->telefone) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="celular">
                                            Celular
                                        </label>
                                        <input type="text" id="celular" name="celular"
                                               class="form-control celular @error('celular') is-invalid @enderror"
                                               value="{{ old('celular',$pessoa_juridica[0]->celular) }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="cep">Cep</label>
                                        <input type="text" class="form-control cep @error('cep') is-invalid @enderror"
                                               value="{{ old('cep',$pessoa_juridica[0]->cep) }}" name="cep" id="cep"
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" class="form-control"
                                               value="{{ old('endereco',$pessoa_juridica[0]->endereco) }}"
                                               name="endereco" id="endereco" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="number" class="form-control"
                                               value="{{ old('numero',$pessoa_juridica[0]->numero) }}"
                                               name="numero" id="numero" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control"
                                               value="{{ old('complemento',$pessoa_juridica[0]->complemento) }}"
                                               name="complemento" id="complemento" placeholder="">
                                    </div>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control"
                                               value="{{ old('bairro',$pessoa_juridica[0]->bairro) }}"
                                               name="bairro" id="bairro" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control"
                                               value="{{ old('cidade',$pessoa_juridica[0]->cidade) }}"
                                               name="cidade" id="cidade" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control"
                                               value="{{ old('estado',$pessoa_juridica[0]->estado) }}"
                                               name="estado" id="estado" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-3">
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <input type="text" class="form-control"
                                               value="{{ old('pais',$pessoa_juridica[0]->pais) }}" name="pais"
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
                                               value="{{ old('login',$pessoa_juridica[0]->login) }}">
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

                            <a href="{{url('/admin/pessoa_juridica')}}" class="btn btn-secondary">
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
