@extends('layouts.default')

@section('content')
    <h3>Novo Pedido</h3>
    @include('pedidos._form_errors')
    <form action="{{ route('pedidos.store') }}" method="POST" >
        @include('pedidos._form')
        {{ csrf_field() }}
        <button type="subimit" class="btn btn-default">Salvar</button>
        <a class="btn btn-default" href="{{ route('pedidos.index') }}">Voltar</a>
    </form>
@endsection