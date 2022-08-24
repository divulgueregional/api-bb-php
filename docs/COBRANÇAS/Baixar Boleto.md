# BAIXAR BOLETO-BB

## Baixar um boleto
Baixa um boleto gerado. O codigoEstadoTituloCobranca ficará = 7

```php
    require_once './api-bb-php/vendor/autoload.php';

    use Divulgueregional\ApiBbPhp\BankingBB;

    $config = [
        'endPoints' => 2, //1-Produção; 2- Homologação
        'client_id' => '',
        'client_secret' => '',
        'application_key' => '',
        'numeroConvenio' => '3128557',
        'token' => $token,//vazio- um token novo será gerado a cada requisição;
    ];

    //BAIXAR UM BOLETO
    $nossonumero = '00031285570000150019';

    try {
        $BankingBB = new BankingBB($config);
        
        $resp = $BankingBB->baixarBoleto($nossonumero);
        echo "<pre>";
        print_r($resp);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }  
```