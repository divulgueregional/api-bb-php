# API-BB PHP

## Introdução

Esse projeto foi implementado as funcionalidades de COBRANÇA, utilizando comunicação e funcionalidades fornecidas pela API do Banco do Berasil. Essa biblioteca pode ser facilmente integrada ao seu software e/ou ERP.

## Como usar:
<b>Instalação: </b>
Para utilizar a biblioteca através do composer:
```php
composer require divulgueregional/api-bb-php
```
## Atualizar:
```php
composer update
```
<b>Ou pela última tag: </b>
```php
composer update divulgueregional/api-bb-php 1.0.2
```

## Documentação:
Acesse a pasta docs e leia o README.md

## O QUE VOCÊ PODE UTILIZAR
<b>SEGURANÇA</b><br>
- Gerar o token

<b>COBRANÇA</b><br>

- Incluir/Registrar boleto de cobrança
- Detalhar um boleto
- Alterar dados de um boleto
- Baixar Boleto
- Listar Boletos (falta fazer)
- Consultar pix de um boleto
- Cancelar pix de um boleto
- Gerar pix de um boleto (Falta fazer)

<b>PIX</b><br>

- Criar cobrança. (Falta fazer)
- Revisar cobrança. (Falta fazer)
- Consultar cobrança. (Falta fazer)
- Consultar Pix recebidos. (Falta fazer)
- Consultar Pix. (Falta fazer)
- Solicitar devolução. (Falta fazer)
- Consultar devolução. (Falta fazer)

<b>SIMULAÇÃO PAGAMENTO DE BOLETO E PIX</b><br>

- Paga um boleto pela linha digitável. (Falta fazer)
- Paga um boleto de pix. (Falta fazer)

<b>QRCODES</b><br>

- Gerar QRCode. (Falta fazer)
- Consultar QRCode. (Falta fazer)
- Alterar QRCode. (Falta fazer)
- Baixar QRCode. (Falta fazer)
- Consultar QRCode a partir de um pagamento. (Falta fazer)
- Consultar lista de pagamentos por código de barras. (Falta fazer)
- Retorna uma lista de pagamentos Pix na arrecadação quando informado o código de barras. (Falta fazer)
- Retorna uma lista de pagamentos Pix na arrecadação quando informado o ID de transação. (Falta fazer)

<b>AUTORIZAÇÃO</b><br>

- Incluir Autorização de Débito Automático. (Falta fazer)

## PAGAMENTOS EM LOTES
<b>GPS</b><br>

- Consultar uma Guia da Previdência Social específica. (Falta fazer)
- Efetuar Solicitação de Pagamentos em Lote de Guia da Previdência Social - GPS. (Falta fazer)
- Consultar Resposta de Solicitação de Pagamentos de GPS em Lote. (Falta fazer)
- Consultar Pagamentos. (Falta fazer)

<b>GRU</b><br>

- Consultar uma Guia de Recolhimento da União específica. (Falta fazer)
- Consultar Resposta de Solicitação de Pagamentos de GRU em Lote. (Falta fazer)
- Consultar Pagamentos. (Falta fazer)
- Solicita Pagamentos GRU. (Falta fazer)

<b>DARF</b><br>

- Consulta Pagamentos em Lote de DARF Preto. (Falta fazer)
- Efetuar Solicitação de Pagamentos em Lote de Darf Normal e Darf Preto. (Falta fazer)
- Consultar Resposta de Solicitação de Pagamentos de DARF Preto Normal em Lote. (Falta fazer)
- Consultar Pagamentos. (Falta fazer)

<b>PAGAMENTOS</b><br>

- Consultar um Lote de Pagamentos. (Falta fazer)
- Consultar sobre a Solicitação de um Lote de Pagamentos. (Falta fazer)
- Cancelar Lote de Pagamentos. (Falta fazer)
- Liberar Pagamentos. (Falta fazer)
- Consultar Pagamentos. (Falta fazer)
- Consultar um Pagamento Específico de um Lote de Transferências. (Falta fazer)

<b>CÓDIGO DE BARRAS</b><br>

- Consulta Pagamentos em Lote de Guias com Código de Barras. (Falta fazer)
- Enviar Solicitação de Pagamento em Lote de Guias Com Código de Barras. (Falta fazer)
- Consultar Solicitação de um Lote de Pagamentos via Guias com Código de Barras. (Falta fazer)
- Consultar Pagamentos. (Falta fazer)
- Consultar Pagamentos Vinculados a um Código de Barras em um Lote de Pagamentos. (Falta fazer)

<b>TRANSFERÊNCIA</b><br>

- Consultar Transferências por Beneficiário. (Falta fazer)
- Consulta Lote de Pagamentos realizados via Transferênciass. (Falta fazer)
- Efetua Lote de Pagamentos realizados via Transferências. (Falta fazer)
- Consultar Pagamentos. (Falta fazer)

<b>BOLETOS</b><br>

- Consultar um Pagamento Específico de um Lote de Boletos. (Falta fazer)
- Efetuar Solicitação de Pagamentos em Lote de Boleto. (Falta fazer)
- Consultar Solicitação de um Lote de Pagamentos via Boletos. (Falta fazer)
- Consultar Pagamentos. (Falta fazer)


<b>WHEBHOOK</b><br>

- Webhook é feito direto no portal do desenvolvedor
- Após os testes concluídos é hora de habilitar o Webhook em produção. O Webhook é um serviço vinculado a uma aplicação, e essa deverá estar em produção.
- No cadastro do evento é necessário especificar a URL que vai receber as requisições do Webhook. Além disso no caso de PIX é necessário informar a chave PIX, e no caso do Cobrança o convênio.

## Autor:
Roseno Matos (developer) rosenomatos@gmail.com<br>

## Licença:
A API-BB-PHP é licenciado sob a Licença MIT (MIT). Você pode usar, copiar, modificar, integrar, publicar, distribuir e/ou vender cópias dos produtos finais, mas deve sempre declarar que Roseno Matos (rosenomatos@gmail.com) é o autor original destes códigos e atribuir um link para https://github.com/divulgueregional/api-bb-php

## Comunidade:
## Facilitou sua vida?
Se o projeto o ajudou em uma tarefa excencial a sua aplicação de uma forma simples e se gostaria de contribuir com uma pequena doação ao autor, faça pelo PIX abaixo<br><hr>

Chave Pix E-MAIL: roseno@divulgueregional.com.br
