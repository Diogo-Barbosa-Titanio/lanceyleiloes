@extends('layouts.admin')

@section('titulo','Cadastro de Administrador')

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
                        <h6 class="m-0 font-weight-bold text-primary">Alterar Administrador</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{url('/admin/administradores/update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="id" name="id" value="{{$administradores[0]->id}}">
                            <div class="form-group">
                                <label for="nome">
                                    Nome
                                </label>
                                <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome',$administradores[0]->nome) }}">
                            </div>

                            <div class="form-group">
                                <label for="email">
                                    Email
                                </label>
                                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$administradores[0]->email) }}">
                            </div>

                            <div class="form-group">
                                <label for="login">
                                    Login
                                </label>
                                <input type="text" id="login" name="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login',$administradores[0]->login) }}">
                            </div>

                            <div class="form-group">
                                <label for="password">
                                    Senha
                                </label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">
                                    Confirmar Senha
                                </label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" value="{{ old('confirm_password') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <span class="text">Enviar</span>
                            </button>

                            <a href="{{url('/admin/administradores')}}" class="btn btn-secondary">
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

             $('#cpf_cnpj').mask('000.000.000-00', {reverse: true});

        });

    </script>

@endsection
