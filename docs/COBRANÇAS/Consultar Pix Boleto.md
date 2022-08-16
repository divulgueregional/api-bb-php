# CONSULTAR PIX BOLETO-BB

## Consultar pix de um boleto
Consultar os dados de um Pix vinculado a um boleto de cobrança.

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

    //CONSULTAR PIX BOLETO
    $nossonumero = '00031285570000150018';

    try {
        $BankingBB = new BankingBB($config);
        
        $consultaPixBoleto = $BankingBB->consultaPixBoleto($nossonumero);
        echo "<pre>";
        print_r($consultaPixBoleto);

    } catch (\Exception $e) {
        echo $e->getMessage();
    } 
```