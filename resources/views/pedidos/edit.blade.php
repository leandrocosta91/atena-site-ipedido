@extends('layouts.default')

@section('content')
    <h3>Editar Pedido</h3>
    @include('pedidos._form_errors')
    <form action="{{ route('pedidos.update', ['pedido' => $pedido->idpedido]) }}" method="POST" >
        @include('pedidos._form')
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <button type="subimit" class="btn btn-default">Salvar</button>
        <a class="btn btn-default" href="{{ route('pedidos.index') }}">Voltar</a>
    </form>
@endsection