# REGISTRAR BOLETO-BB

## Gerar ou criar um boleto
Para gerar o boleto precisa informar os dados necessários em cada campo.<br>
As informações colocadas no exemplo foram retiradas no site: https://apoio.developers.bb.com.br/referency/post/5ffc477c3b02bd0012ecaa1a <br>
Cobrança - Dados fictícios para Testes

```php
    require_once './api-bb-php/vendor/autoload.php';

    use Divulgueregional\ApiBbPhp\BankingBB;

    $config = [
        'endPoints' => 2, //1-Produção; 2- Homologação
        'client_id' => '',
        'client_secret' => '',
        'application_key' => '',
        'numeroConvenio' => '3128557',
        'tokenAutomatico' => 1,//1- gera o token novo a cada requisição; vazio- você gera o token, guarda e seta ele
    ];

    //gerar o token ou setToken

    //REGISTRAR BOLETO
    $seq = '000001';//sequencia do boleto
    $numeroConvenio = 3128557;
    $nossonumero = '000'.$numeroConvenio.str_pad($seq,10,'0',STR_PAD_LEFT);

    $dadosBoleto = [
        "numeroConvenio" => $config['numeroConvenio'],
        "numeroCarteira" => 17,
        "numeroVariacaoCarteira" => 35,
        "codigoModalidade" => '01', //01- SIMPLES; 04- VINCULADA
        "dataEmissao" => date('d.m.Y'),
        "dataVencimento" => str_replace("/", ".", "30/06/2022"),
        "valorOriginal" => 10.50,
        "valorAbatimento" => 0,
        "quantidadeDiasProtesto" => 0,
        "quantidadeDiasNegativacao" => 0,
        "orgaoNegativador" => '',
        "indicadorAceiteTituloVencido" => 'S',//S- aceita após o vencimento; N- não aceita após o vencimento
        "numeroDiasLimiteRecebimento" => 30,
        "codigoAceite" =>'A',//A - Aceito; N - Não aceito
        "codigoTipoTitulo" => 2,//2-fixo
        "descricaoTipoTitulo" => 'DUPLICATA MERCANTIL',
        "indicadorPermissaoRecebimentoParcial" => 'N',
        "numeroTituloBeneficiario" => 12501,//seu número para identificar o boleto
        "campoUtilizacaoBeneficiario" => '',
        "mensagemBloquetoOcorrencia" => '',
        "numeroTituloCliente" => $nossonumero,
        "desconto" => [
            "tipo" => '',
            "dataExpiracao" => '',
            "porcentagem" => '',
            "valor" => '',
        ],
        "segundoDesconto" => [
            "dataExpiracao" => '',
            "porcentagem" => '',
            "valor" => '',
        ],
        "terceiroDesconto" => [
            "dataExpiracao" => '',
            "porcentagem" => '',
            "valor" => '',
        ],
        "jurosMora" => [
            "tipo" => '',
            "porcentagem" => '',
            "valor" => '',
        ],
        "multa" => [
            "tipo" => '',
            "data" => '',
            "porcentagem" => '',
            "valor" => '',
        ],
        "pagador" => [
            "tipoInscricao" => 1,
            "numeroInscricao" => 96050176876,
            "nome" => 'VALERIO DE AGUIAR ZORZATO',
            "endereco" => 'RUA TESTE COM COMPLEMENTO E NUMERO',
            "cep" => 74715715,
            "cidade" => 'CIDADE DO CLIENTE',
            "bairro" => 'BAIRRO DO CLIENTE',
            "uf" => 'GO',
            "telefone" => 62999999999,
        ],
        "beneficiarioFinal" => [
            "tipoInscricao" => 2,
            "numeroInscricao" => 92862701000158,
            "nome" => 'DOCERIA BARBOSA DE ALMEIDA',
        ],
        "indicadorPix" => 'S',// S=mostra o pix ou N
    ];

    try {
        $BankingBB = new BankingBB($config);
        
        $registrarBoleto = $BankingBB->registrarBoleto($dadosBoleto);
        echo "<pre>";
        print_r($registrarBoleto);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }   
```