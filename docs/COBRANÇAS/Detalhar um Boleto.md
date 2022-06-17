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
        'tokenAutomatico' => 1,//1- gera o token novo a cada requisição; vazio- você gera o token, guarda e seta ele
    ];

    //DETALHA UM DO BOLETO
    $id = '00031285570000150019';//Número do título de cobrança.

    try {
        $BankingBB = new BankingBB($config);
        
        $detalheDoBoleto = $BankingBB->detalheDoBoleto($id, $numeroConvenio);
        echo "<pre>";
        print_r($detalheDoBoleto);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }  
```