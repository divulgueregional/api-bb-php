# DETALHAR BOLETO-BB

## Buscar os dados de um boleto
Mostra todos os dados que estão em um boleto gerado.

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
    $BankingBB = new BankingBB($config);

    //DETALHA UM DO BOLETO
    $id = '00031285570000150019';//Número do título de cobrança.

    try {
        $resp = $BankingBB->detalheDoBoleto($id);
        echo "<pre>";
        print_r($resp);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }  
```