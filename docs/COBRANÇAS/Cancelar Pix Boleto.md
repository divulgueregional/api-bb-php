# CANCELAR PIX BOLETO-BB

## Cancelar pix de um boleto
Cancelar Pix vinculado a um boleto de cobrança.

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

    //CANCELAR PIX DO BOLETO
    $nossonumero = '00031285570000150024';

    try {
        $BankingBB = new BankingBB($config);
        
        $cancelarPixBoleto = $BankingBB->cancelarPixBoleto($nossonumero);
        echo "<pre>";
        print_r($cancelarPixBoleto);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```