@extends('layouts.admin')

@section('styles')
    @include('admin.components.table.style')
@endsection

@section('titulo','Cadastro de Pessoa Jurídica')

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
            <h1 class="h3 mb-2 text-gray-800">Cadastro de Pessoa Jurídica</h1>
        @endslot

        @slot('helper')
            <a href="{{url('/admin/pessoa_juridica/create')}}" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">Nova pessoa jurídica</span>
            </a>
        @endslot

        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Login</th>
            <th>Editar / Apagar</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Login</th>
            <th>Editar / Apagar</th>
        </tr>
        </tfoot>
        <tbody>

        @foreach($cadastros as $cadastro)
            <tr>
                <td>{{$cadastro->nome}}</td>
                <td>{{$cadastro->email}}</td>
                <td>{{$cadastro->login}}</td>

                <td class="align-middle">
                    <a href="{{url('/admin/pessoa_juridica/edit')}}?id={{$cadastro->id}}" class="btn btn-info btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Editar</span>
                    </a>

                    <form method="post" action="{{url('/admin/pessoa_juridica/delete')}}" class="d-inline-block" onsubmit="return confirm('Confirma exclusão de {{addslashes($cadastro->nome)}} ?')">
                        @csrf
                        @method('delete')

                        <input type="hidden" name="id" value="{{$cadastro->id}}">

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
