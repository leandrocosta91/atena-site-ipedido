@extends('layouts.default')

<?php
$cliente = \App\Cliente::find($pedido->idcliente);
$produto = \App\Produto::find($pedido->idproduto);
?>
@section('content')
<h3>Ver Pedido</h3>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th scope="row">Cliente</th>
            <td>{{$cliente->nome}}</td>
        </tr>
        <tr>
            <th scope="row">Produto</th>
            <td>{{$produto->nome}}</td>
        </tr>
        <tr>
            <th scope="row">Quantidade</th>
            <td>{{$pedido->quantidade}}</td>
        </tr>
        <tr>
            <th scope="row">Preço Unitário</th>
            <td>{{$pedido->preco_unitario}}</td>
        </tr>
        <?php
            $produto_rentabilidade = \App\Produto::findOrFail($pedido->idproduto);
        ?>
        <tr>
            <th scope="row">Rentabilidade</th>
            <td>{{$pedido->calcula_rentabilidade($pedido, $produto_rentabilidade)}}</td>
        </tr>
    </tbody>
</table>

<a class="btn btn-default" href="{{ route('pedidos.index') }}">Voltar</a>
<a class="btn btn-default" href="{{ route('pedidos.edit', ['pedido' => $pedido->idpedido]) }}">Editar</a>
<a class="btn btn-default" href="{{ route('pedidos.destroy', ['pedido' => $pedido->idpedido]) }}" id="btn-delete">Excluir</a>
<form action="{{ route('pedidos.destroy', ['pedido' => $pedido->idpedido]) }}" method="POST" id="form-delete">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
<script>
    document.getElementById("form-delete").style.display = "none";

    document.getElementById("btn-delete").addEventListener("click", function(event){
        event.preventDefault();
        if(confirm('Deseja excluir este registro?')){
            document.getElementById("form-delete").submit();
        }
    });
</script>
@endsection