@extends('layouts.admin')

@section('styles')
    @include('admin.components.table.style')
@endsection

@section('titulo','Cadastro de Leilões')

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
            <h1 class="h3 mb-2 text-gray-800">Leilões</h1>
        @endslot

        @slot('helper')
            <a href="{{url('/admin/leiloes/create')}}" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Leilão</span>
            </a>
        @endslot

        <thead>
        <tr>
            <th>Nome</th>
            <th>Foto</th>
            <th>Código</th>
            <th>Editar / Apagar</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nome</th>
            <th>Foto</th>
            <th>Código</th>
            <th>Editar / Apagar</th>
        </tr>
        </tfoot>
        <tbody>

        @foreach($leiloes as $leilao)
            <tr>
                <td class="align-middle">{{$leilao->nome}}</td>
                <td class="align-middle text-center">@if($leilao->foto)
                        <img src="{{asset('/storage')}}/{{$leilao->foto}}" class="img-fluid" style="max-width: 80px;">
                    @else
                        <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="text">Sem imagem</span>
                        </a>
                    @endif</td>
                <td class="align-middle">{{$leilao->codigo}}</td>

                <td class="align-middle">
                    <a href="{{url('/admin/leiloes/edit')}}?id={{$leilao->id}}" class="btn btn-info btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Editar</span>
                    </a>

                    <form method="post" action="{{url('/admin/leiloes/delete')}}" class="d-inline-block" onsubmit="return confirm('Confirma exclusão de {{addslashes($leilao->nome)}} ?')">
                        @csrf
                        @method('delete')

                        <input type="hidden" name="id" value="{{$leilao->id}}">
                        <input type="hidden" name="foto" value="{{$leilao->foto}}">
                        <input type="hidden" name="edital" value="{{$leilao->edital}}">

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
