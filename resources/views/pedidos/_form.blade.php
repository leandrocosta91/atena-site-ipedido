<div id="div_erro"></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Cliente</label>
            <select class="form-control" name="idcliente" id="idcliente">
                <option value="0">Selecione</option>
                @foreach($clientes as $cliente)
                    @if($pedido->idcliente == $cliente->idcliente)
                        <option value="{{$cliente->idcliente}}" selected>{{$cliente->nome}}</option>
                    @else
                        <option value="{{$cliente->idcliente}}">{{$cliente->nome}}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Produto</label>
            <select class="form-control" name="idproduto" id="idproduto">
                <option value="0">Selecione</option>
                @foreach($produtos as $produto)
                    @if($pedido->idproduto == $produto->idproduto)
                        <option value="{{$produto->idproduto}}" selected>{{$produto->nome}}</option>
                    @else
                        <option value="{{$produto->idproduto}}">{{$produto->nome}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Quantidade</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" value="{{$pedido->quantidade}}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Preço Unitário</label>
            <input type="number" class="form-control" name="preco_unitario" id="preco_unitario" value="{{$pedido->preco_unitario}}" />
        </div>
    </div>
</div>
<?php
    if ($pedido->idproduto > 0) {
        $produto_rentabilidade = \App\Produto::findOrFail($pedido->idproduto);
    } else {
        $produto_rentabilidade = new \App\Produto();
    }
?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Rentabilidade</label>
            <input type="text" class="form-control" name="rentabilidade" id="rentabilidade" value="{{$pedido->calcula_rentabilidade($pedido, $produto_rentabilidade)}}" />
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#idproduto").change(function(){
            if($(this).val() > 0) {

                const url_rota = "/produtos/"+$(this).val();

                $.ajax({
                    type : "GET",
                    url : url_rota,
                    success : function(response) {
                        json_response = JSON.parse(response);

                        $("#preco_unitario").val(json_response.produto.preco_unitario);
                    }
                });
            }
        });
        $("#preco_unitario").focusout(function(){
            if($(this).val() > 0) {

                const preco_unitario = $(this).val();
                const idproduto = $("#idproduto").val();
                const url_rota = "/pedidos/ajax/calcula-rentabilidade?preco_unitario="+preco_unitario+"&idproduto="+idproduto;

                if(preco_unitario.length > 0 && parseInt(idproduto) > 0){
                    $.ajax({
                        type : "GET",
                        url : url_rota,
                        success : function(response) {
                            json_response = JSON.parse(response);
                            $("#rentabilidade").val(json_response.rentabilidade);
                        }
                    });
                }
            }
        });
        $("#quantidade").focusout(function(){
            if($(this).val() > 0) {

                const quantidade = $(this).val();
                const idproduto = $("#idproduto").val();
                const url_rota = "/pedidos/ajax/aprova-multiplo?quantidade="+quantidade+"&idproduto="+idproduto;

                if(parseInt(quantidade) > 0 && parseInt(idproduto) > 0){
                    $.ajax({
                        type : "GET",
                        url : url_rota,
                        success : function(response) {
                            
                            json_response = JSON.parse(response);
                            if (!json_response.retorno) {
                                const erro = 
                                ` <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Quantidade com múltiplo inválido.
                                </div>`;
                                $("#div_erro").html(erro);
                                $("#quantidade").val("");
                            }
                            $("#rentabilidade").val(json_response.rentabilidade);
                        }
                    });
                }
            }
        });
    });
</script>