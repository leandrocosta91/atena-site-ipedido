<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('pedidos', 'PedidoController');
// Route::get('/pedidos/{pedido}/{produto}', 'PedidoController@calcula_rentabilidade');
// Route::get('/pedidos/ajax/preco_unitario/{produto}', 'PedidoController@calcula_rentabilidade_ajax');
Route::get('/pedidos/ajax/calcula-rentabilidade', 'PedidoController@calcula_rentabilidade_ajax');
Route::get('/pedidos/ajax/aprova-multiplo', 'PedidoController@aprova_multiplo_ajax');
Route::get('/produtos/{produto}', 'ProdutoController@show_ajax');