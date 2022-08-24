# LISTAR BOLETOS-BB

## Buscar uma lista de boleto
Mostra todos os boletos conforme o filtro.<br>
Os filtros contidos no array filters ainda não estão colocados todos os campos, mas dessa forma já vai mostrar a lista de boletos.

```php
    require_once './api-bb-php/vendor/autoload.php';
    use Divulgueregional\ApiBbPhp\BankingBB;

    $config = [
        'endPoints' => 1, //1-Produção; 2- Homologação
        'client_id' => '',
        'client_secret' => '',
        'application_key' => '',
        'numeroConvenio' => $numeroConvenio,
        'token' => $token,
    ];
    $BankingBB = new BankingBB($config);

    //DETALHA UM DO BOLETO
    $filters = [
        "boletoVencido" => 'S',// S para boletos vencidos - N para boletos não vencidos
        "indicadorSituacao" => 'A',//A - Em ser. B - Baixados/Protestados/Liquidados
        "contaBeneficiario" => $contaBeneficiario,
        "agenciaBeneficiario" => $agenciaBeneficiario,
        "codigoEstadoTituloCobranca" => 1,
    ];

    $resp = $BankingBB->listarBoletos($filters);
    echo "<pre>";
    print_r($resp); 
```