@extends('layouts.admin')

@section('styles')
    @include('admin.components.table.style')
@endsection

@section('titulo','Cadastro de Lotes')

@section('content')

    @component('admin.components.table.content')

        @slot('title')
            <h1 class="h3 mb-2 text-gray-800">Lotes</h1>
        @endslot

        @slot('helper')
            <h6 class="m-0 font-weight-bold text-primary">Listagem</h6>
        @endslot

        <thead>
        <tr>
            <th>Nome</th>
            <th>Lance Atual</th>
            <th>Leilões</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nome</th>
            <th>Lance Atual</th>
            <th>Leilões</th>
        </tr>
        </tfoot>
        <tbody>

        @foreach($lotes as $lote)
            <tr>
                <td>{{$lote->nome}}</td>
                <td>{{$lote->lances}}</td>
                <td>{{$lote->leiloes}}</td>
            </tr>
        @endforeach

        </tbody>

    @endcomponent

@endsection

@section('scripts')
    @include('admin.components.table.script')
@endsection
