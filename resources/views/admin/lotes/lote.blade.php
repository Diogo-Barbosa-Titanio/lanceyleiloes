@extends('layouts.admin')

@section('styles')
    @include('admin.components.table.style')
@endsection

@section('titulo','Cadastro de Lotes')

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
            <h1 class="h3 mb-2 text-gray-800">Lotes</h1>
        @endslot

        @slot('helper')
            <a href="{{url('/admin/lotes/create')}}" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Novo Lote</span>
            </a>
        @endslot

        <thead>
        <tr>
            <th>Nome</th>
            <th>Leilão</th>
            <th>Situação</th>
            <th>Categoria</th>
            <th>Editar / Apagar</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nome</th>
            <th>Leilão</th>
            <th>Situação</th>
            <th>Categoria</th>
            <th>Editar / Apagar</th>
        </tr>
        </tfoot>
        <tbody>

        @foreach($lotes as $lote)
            <tr>
                <td>{{$lote->nome_lote}}</td>
                <td>{{$lote->nome_leilao}}</td>
                <td>{{$lote->nome_situacao}}</td>
                <td>{{$lote->nome_categoria}}</td>

                <td class="align-middle">
                    <a href="{{url('/admin/lotes/edit')}}?id={{$lote->id}}" class="btn btn-info btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Editar</span>
                    </a>

                    <form method="post" action="{{url('/admin/lotes/delete')}}" class="d-inline-block" onsubmit="return confirm('Confirma exclusão de {{addslashes($lote->nome_lote)}} ?')">
                        @csrf
                        @method('delete')

                        <input type="hidden" name="id" value="{{$lote->id}}">

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
