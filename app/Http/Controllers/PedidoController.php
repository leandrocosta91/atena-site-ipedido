<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view ('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientes = \App\Cliente::all();
        $produtos = \App\Produto::all();
        $pedido = new Pedido();
        return view("pedidos.create",compact('pedido' ,'clientes', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        Pedido::create([
            'idcliente' => $request->idcliente,
            'idproduto' => $request->idproduto,
            'quantidade' => $request->quantidade,
            'preco_unitario' => $request->preco_unitario,
        ]);
        return redirect()->route('pedidos.index')->with('message','Pedido cadastrado com suscesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('pedidos.show',compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $clientes = \App\Cliente::all();
        $produtos = \App\Produto::all();
        return view('pedidos.edit',compact('pedido' ,'clientes', 'produtos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoRequest $request, Pedido $pedido)
    {
        $pedido->fill([
            'idcliente' => $request->idcliente,
            'idpedido' => $request->idpedido,
            'quantidade' => $request->quantidade,
            'preco_unitario' => $request->preco_unitario,
        ]);
        $pedido->save();
        return redirect()->route('pedidos.index')->with('message','Pedido alterado com suscesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('message','Pedido excluído com sucesso.');
    }

    public function calcula_rentabilidade(Pedido $pedido, Produto $produto)
    {
        return $pedido->calcula_rentabilidade($pedido, $produto);
    }

    public function calcula_rentabilidade_ajax(Request $request)
    {
        $produto = Produto::findOrFail($request->idproduto);

        return json_encode([
            'rentabilidade' => Pedido::calcula_rentabilidade_ajax($request->preco_unitario, $produto)
        ]);
    }

    public function aprova_multiplo_ajax(Request $request)
    {
        $produto = Produto::findOrFail($request->idproduto);

        return json_encode([
            'retorno' => $request->quantidade % $produto->multiplo == 0 ? true : false
        ]);
    }
}
