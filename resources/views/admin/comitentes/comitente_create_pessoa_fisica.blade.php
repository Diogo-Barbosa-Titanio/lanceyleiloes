@extends('layouts.admin')

@section('titulo','Cadastro de Comitentes')

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
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Comitente - Pessoa Física</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{url('/admin/comitentes/store')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tipo" value="PF">
                            <div class="form-group">
                                <label for="nome">
                                    Nome
                                </label>
                                <input type="text" id="nome" name="nome" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="cpf_cnpj">
                                    CPF
                                </label>
                                <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="foto">
                                    Enviar arquivo
                                </label>
                                <input type="file" id="foto" name="foto" class="form-control-file">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <span class="text">Enviar</span>
                            </button>

                            <a href="{{url('/admin/comitentes')}}" class="btn btn-secondary">
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
