
# Projeto Layouts Behance

Estou com uma série de projetos que irei fazer ao longo do tempo com o objetivo de reimaginar da forma mais parecida os layouts que estão disponíveis na https://www.behance.com e também aprimorar meus conhecimentos em C#, PHP, Api.


## Descrição

Utilizei fontes parecidas encontradas no Google Fonts, e algumas imagens para ilustração para ilustração para o desenvolvimento.

O link para o projeto em qual foi utilizado: https://www.behance.net/gallery/159520991/Ethereum-Dashboard-design?tracking_source=search_projects%7Cdashboard

Abaixo estarei mostrandoi a imagem de layout e também o resultado:

<img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/d5b36c159520991.63a08578670cb.png" width="850" height="550"/>
<img src="https://i.imgur.com/ObFrLvN.png" width="950" height="500"/>

Além disso, fiz o uso de uma API, que forneci pelo C#.

## Stack utilizada

**Front-end:** PHP

**Back-end:** PHP, Javascript, C# e EntityFramework .NET.

**DB:** MySql

**Libs:** Chart.Js

## Api EndPoints e Resultados Esperados

**/api/Coins** -> Pega moedas de exmplo para mostrar nos cards.

Exemplo de Resultado:

```
[
  {
    "id": 0,
    "name": "string",
    "abbreviation": "string", // Abreviação
    "value": 0, // Valor atual da moeda
    "image": "string", //Link da imagem da moeda
    "lastValue": 0, // O Último valor fornecido
    "color": "string" // Cor atribuida a moeda
  }
]
```
##
**/api/Coins/{id}** -> Pega uma das moedas em específico.
```
{
  "id": 0,
  "name": "string",
  "abbreviation": "string",
  "value": 0,
  "image": "string",
  "lastValue": 0,
  "color": "string"
}
```
##
**/api/Historico/market** -> Recebe uma lista de compras fictícias realizadas de determinada moeda.

```
[
  {
    "id": 0,
    "value": 0,
    "date": "2023-01-24T00:00:00.645Z",
    "idCoin": 0
  }
]
```
##
**/api/Historico/coin/{idCoin}** -> Mostra o histórico de mudança da moeda, para colocar no gráfico.
```
[
  {
    "id": 0,
    "value": 0,
    "date": "2023-01-24T00:00:00.645Z",
    "idCoin": 0
  }
]
```
##
**/api/HistoricoCompras/carteira/{idCarteira}** -> Mostra suas compras e vendas da sua carteira.
```
[
  {
    "id": 0,
    "valor": 0,
    "idCarteira": 0,
    "idCoin": 0,
    "data_transacao": "2023-01-24T00:00:00.645Z",
    "isCompra": 0 // Se é foi uma compra o valor é 1, caso contrário é 0.
  }
]
```

## Conclusão

Como já tenho mais familiaridade com o Front End, foi fácil desenvolver o layout do site. Demorei algum tempo até entender como deixar o gráfico do **Chart.Js** da maneira como eu queria. Também tive dificuldades com a implementação da Api no C#, mas acabou tudo dando certo. Além disso, acho que eu poderia ter melhorado a relação das coisas e deixar mais bem feito com relação ao banco de dados. 
