# ipedido

Aplicação web simulando de forma simplificada a emissão de pedidos.

O usuário desta aplicação poderá criar novos pedidos e alterar os pedidos existentes. Portanto, é indispensável que estas informações sejam armazenadas de forma persistente.

Um pedido é composto pelas seguintes informações:

Cliente: O usuário deve escolher uma opção entre os clientes pré-cadastrados no sistema

Itens: Cada item do pedido é composto pelas seguintes informações:
- Produto: o usuário deve escolher uma opção entre os produtos pré-cadastrados no sistema (tabela 2).
- Quantidade: a quantidade do produto deve ser um número inteiro maior que zero.
- Preço unitário: o sistema deve sugerir o preço unitário do produto, mas deve permitir que o usuário o altere (tanto para mais quanto para menos). O preço deve ter no máximo 2 casas decimais e precisa ser maior que zero.

# Informações pré-cadastradas

A tabelas a seguir listam as informações utilizadas no pedido que devem ser pré-cadastradas no sistema.

Clientes

<table>
  <tr>
    <td>ID</td>
    <td>Nome</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Darth Vader</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Obi-Wan Kenobi</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Luke Skywalker</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Imperador Palpatine</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Han Solo</td>
  </tr>
</table>

Produtos

<table>
  <tr>
    <td>ID</td>
    <td>Nome</td>
    <td>Preço Unitário (R$)</td>
    <td>Múltiplo</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Millenium Falcon</td>
    <td>550.000,00</td>
    <td></td>
  </tr>
  <tr>
    <td>2</td>
    <td>X-Wing</td>
    <td>60.000,00</td>
    <td>2</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Super Star Destroyer</td>
    <td>4.570.000,00</td>
    <td></td>
  </tr>
  <tr>
    <td>4</td>
    <td>TIE Fighter</td>
    <td>75.000,00</td>
    <td>2</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Lightsaber</td>
    <td>6.000,00</td>
    <td>5</td>
  </tr>
  <tr>
    <td>6</td>
    <td>DLT-19 Heavy Blaster Rifle</td>
    <td>5.800,00</td>
    <td></td>
  </tr>
  <tr>
    <td>7</td>
    <td>DL-44 Heavy Blaster Pistol</td>
    <td>1.500,00</td>
    <td>10</td>
  </tr>
</table>

# Regras de negócio

Rentabilidade

Os itens do pedido devem ser classificados em três níveis de rentabilidade, de acordo com a diferença entre o preço do item (que é informado pelo usuário) e o preço do produto (que é fixo):

Rentabilidade ótima: quando o preço usado no pedido é maior que o preço do produto. Ex: se o preço do produto é de R$ 100, a rentabilidade será ótima se o item for vendido por R$ 100,01 (inclusive) ou mais.

Rentabilidade boa: quando o preço do item é no máximo 10% menor que o preço do produto. Ex: se o preço do produto é de R$ 100, a rentabilidade será boa se o item for vendido por qualquer preço entre R$ 90 (inclusive) e R$ 100 (inclusive).

Rentabilidade ruim: quando o preço do item é inferior ao preço do produto menos 10%. Ex: se o preço do produto é de R$ 100, a rentabilidade será ruim se o preço for menor ou igual a R$ 89,99.

Quando o usuário escolher o produto para inserir no pedido, o sistema deve calcular e exibir a rentabilidade na tela. Sempre que o preço for modificado, a rentabilidade deve ser recalculada e reexibida. Itens que ficarem com rentabilidade ruim não podem ser inseridos no pedido.

Múltiplo de venda

Alguns produtos só podem ser vendidos em quantidades múltiplas de um determinado número. Por exemplo, o produto X-Wing só pode ser vendido em múltiplos de 2, por exemplo, 2, 4, 6, 8, etc. Já o produto Lightsaber só pode ser vendido em múltiplos de 5, ou seja, 5, 10, 15, 20 e assim por diante. Produtos que não possuem múltiplos podem ser vendidos em qualquer quantidade.

# Executando a aplicação

A aplicação pode ser executada usando docker, bastando executar o comando docker-compose up -d no diretório raiz.

Ela foi construída usando Laravel 5.5, PHP 7.2, PhpMyadmin 4.9, MySql 5.7.22 e Nginx alpine.

Após subir o ambiente é preciso baixar as dependências do projeto (diretório vendor). Para isso, dê o comando ```docker-compose exec php sh```, depois o comando composer install.

Em seguida, dê o comando php artisan migrate para gerar as tabelas.
