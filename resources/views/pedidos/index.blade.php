@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Listagem de pedidos</h3>
    </div>
    <div class="col-md-6">
        <a class="btn btn-default pull-right hidden-xs margin-bottom-md" href="{{ route('pedidos.create') }}">Criar novo</a>
        <a class="btn btn-default btn-block hidden-lg hidden-md hidden-sm margin-bottom-md" href="{{ route('pedidos.create') }}">Criar novo</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="break-word">Cliente</th>
                    <th class="break-word">Produto</th>
                    <th class="break-word">Quantidade</th>
                    <th class="break-word">Preço Unitário</th>
                    <th class="break-word">Rentabilidade</th>
                    <th class="break-word">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <?php 
                    $cliente = \App\Cliente::find($pedido->idcliente);
                    $produto = \App\Produto::find($pedido->idproduto);
                ?>
                <tr>
                    <td class="break-word">{{$cliente->nome}}</td>
                    <td class="break-word">{{$produto->nome}}</td>
                    <td class="break-word">{{$pedido->quantidade}}</td>
                    <td class="break-word">{{$pedido->preco_unitario}}</td>
                    <td class="break-word">{{$pedido->calcula_rentabilidade($pedido, $produto)}}</td>
                    <td class="break-word">
                        <a href="{{route('pedidos.show',['pedido' => $pedido->idpedido])}}">
                            <i class="material-icons">search</i>
                        </a>
                        <a href="{{route('pedidos.edit',['pedido' => $pedido->idpedido])}}">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection