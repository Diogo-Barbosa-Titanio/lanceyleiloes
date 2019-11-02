@extends('layouts.admin')

@section('styles')
    @include('admin.components.table.style')
@endsection

@section('titulo','Cadastro de Comitentes')

@section('content')

    @if($success)
        <div class="container-fluid">
            @component('admin.components.alert.success')
                {{$success}}
            @endcomponent
        </div>
    @endif

    @component('admin.components.table.content')

        @slot('title')
            <h1 class="h3 mb-2 text-gray-800">Comitentes</h1>
        @endslot

        @slot('helper')

            <a href="{{url('/admin/comitentes/create')}}?tipo=pf" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Pessoa Física</span>
            </a>

            <a href="{{url('/admin/comitentes/create')}}?tipo=pj" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Pessoa Jurídica</span>
            </a>
        @endslot

        <thead>
        <tr>
            <th>Nome</th>
            <th>Foto</th>
            <th>CPF/CNPJ</th>
            <th>Editar / Apagar</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nome</th>
            <th>Foto</th>
            <th>CPF/CNPJ</th>
            <th>Editar / Apagar</th>
        </tr>
        </tfoot>
        <tbody>

        @foreach($comitentes as $comitente)
            <tr>
                <td class="align-middle">{{$comitente->nome}}</td>
                <td class="text-center align-middle">
                    @if($comitente->foto)
                      <img src="{{asset('/storage')}}/{{$comitente->foto}}" class="img-fluid" style="max-width: 80px;">
                    @else
                        <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="text">Sem imagem</span>
                        </a>
                    @endif
                </td>
                <td class="align-middle">{{$comitente->cpf_cnpj}}</td>
                <td class="align-middle">
                    <a href="{{url('/admin/comitentes/edit')}}?id={{$comitente->id}}&tipo={{strtolower($comitente->tipo)}}" class="btn btn-info btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Editar</span>
                    </a>

                    <form method="post" action="{{url('/admin/comitentes/delete')}}" class="d-inline-block" onsubmit="return confirm('Confirma exclusão de {{addslashes($comitente->nome)}} ?')">
                        @csrf
                        @method('delete')

                        <input type="hidden" name="id" value="{{$comitente->id}}">
                        <input type="hidden" name="foto" value="{{$comitente->foto}}">

                        <button class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Apagar</span>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    @endcomponent

@endsection

@section('scripts')
    @include('admin.components.table.script')
@endsection
