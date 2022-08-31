# ALTERAR BOLETO-BB

## Altera os dados de um boleto
Altera algumas informações de um boleto gerado.

## Regras
1- Só pode alterar uma boleto após 30 minutos de seu registro.<br>
2- Boleto alterado. Só pode alterar novamente após 30 minutos da sua última alteração.<br>
3- Guarde a data e hora de inclusão para quando alterar poder verificar se está no tempo hábil para poder fazer a alteração.
4- Guarde a data e hora da alteração para quando alterar novamente poder verificar se está no tempo hábil para poder fazer a nova alteração.

```php
    require_once './api-bb-php/vendor/autoload.php';
    use Divulgueregional\ApiBbPhp\BankingBB;

    $config = [
        'endPoints' => 2, //1-Produção; 2- Homologação
        'client_id' => '',
        'client_secret' => '',
        'application_key' => '',
        'token' => $token,//vazio- um token novo será gerado a cada requisição;
    ];
    $BankingBB = new BankingBB($config);

    //ALTERAR BOLETO
    $nossonumero = '00031285570000150019';//Número do título de cobrança.
    $dadosAlterar = [
        "numeroConvenio" => 3128557,
        "indicadorNovaDataVencimento" => 'S',// obrigatorio
        "alteracaoData" => [
            "novaDataVencimento" => '08.07.2022',
        ],
        "indicadorAtribuirDesconto" => 'N',// obrigatorio
        // "desconto" => [
        //     "tipoPrimeiroDesconto" => '',
        //     "valorPrimeiroDesconto" => '',
        //     "percentualPrimeiroDesconto" => '',
        //     "dataPrimeiroDesconto" => '',
        //     "tipoSegundoDesconto" => '',
        //     "valorSegundoDesconto" => '',
        //     "percentualSegundoDesconto" => '',
        //     "dataSegundoDesconto" => '',
        //     "tipoTerceiroDesconto" => '',
        //     "valorTerceiroDesconto" => '',
        //     "percentualTerceiroDesconto" => '',
        //     "dataTerceiroDesconto" => '',
        // ],
        "indicadorAlterarDesconto" => 'N',// obrigatorio
        // "alteracaoDesconto" => [
        //     "tipoPrimeiroDesconto" => '',
        //     "novoValorPrimeiroDesconto" => '',
        //     "novoPercentualPrimeiroDesconto" => '',
        //     "novaDataLimitePrimeiroDesconto" => '',
        //     "tipoSegundoDesconto" => '',
        //     "novoValorSegundoDesconto" => '',
        //     "novoPercentualSegundoDesconto" => '',
        //     "novaDataLimiteSegundoDesconto" => '',
        //     "tipoTerceiroDesconto" => '',
        //     "novoValorTerceiroDesconto" => '',
        //     "novoPercentualTerceiroDesconto" => '',
        //     "novaDataLimiteTerceiroDesconto" => '',
        // ],
        "indicadorAlterarDataDesconto" => 'N',// obrigatorio
        // "alteracaoDataDesconto" => [
        //     "novaDataLimitePrimeiroDesconto" => '',
        //     "novaDataLimiteSegundoDesconto" => '',
        //     "novaDataLimiteTerceiroDesconto" => '',
        // ],
        "indicadorProtestar" => 'N',// obrigatorio
        // "protesto" => [
        //     "quantidadeDiasProtesto" => '',
        // ],
        "indicadorSustacaoProtesto" => 'N',// obrigatorio
        "indicadorCancelarProtesto" => 'N',// obrigatorio
        "indicadorIncluirAbatimento" => 'N',// obrigatorio
        // "abatimento" => [
        //     "valorAbatimento" => '',
        // ],
        "indicadorCancelarAbatimento" => 'N',// obrigatorio
        // "alteracaoAbatimento" => [
        //     "novoValorAbatimento" => '',
        // ],
        "indicadorCobrarJuros" => 'N',// obrigatorio
        // "juros" => [
        //     "tipoJuros" => '',
        //     "valorJuros" => '',
        //     "taxaJuros" => '',
        // ],
        "indicadorDispensarJuros" => 'N',// obrigatorio
        "indicadorCobrarMulta" => 'N',// obrigatorio
        // "juros" => [
        //     "tipoMulta" => '',
        //     "valorMulta" => '',
        //     "dataInicioMulta" => '',
        //     "taxaMulta" => '',
        // ],
        "indicadorDispensarMulta" => 'N',// obrigatorio
        "indicadorNegativar" => 'N',// obrigatorio
        // "negativacao" => [
        //     "quantidadeDiasNegativacao" => '',
        //     "tipoNegativacao" => '',
        // ],
        "indicadorAlterarSeuNumero" => 'N',// obrigatorio
        // "alteracaoSeuNumero" => [
        //     "codigoSeuNumero" => '',
        // ],
        "indicadorAlterarEnderecoPagador" => 'N',// obrigatorio
        // "alteracaoEndereco" => [
        //     "enderecoPagador" => '',
        //     "bairroPagador" => '',
        //     "cidadePagador" => '',
        //     "UFPagador" => '',
        //     "CEPPagador" => '',
        // ],
        "indicadorAlterarPrazoBoletoVencido" => 'N',// obrigatorio
        // "alteracaoPrazo" => [
        //     "quantidadeDiasAceite" => '',
        // ],
    ];
    // echo "<pre>";
    // print_r($dadosAlterar);die;

    try {
        $alterarBoleto = $BankingBB->alterarBoleto($nossonumero, $dadosAlterar);
        echo "<pre>";
        print_r($alterarBoleto);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```

## Verificar prazo 30 minutos
Arquivo Prazo 30 miutos<br>
