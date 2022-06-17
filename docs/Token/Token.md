# TOKEN-BB

## Geração do Token
Obter token oAuth

```php
    require_once './api-bb-php/vendor/autoload.php';

    use Divulgueregional\ApiBbPhp\BankingBB;

    $config = [
        'endPoints' => 2, //1-Produção; 2- Homologação
        'client_id' => '',
        'client_secret' => '',
        'application_key' => '',
    ];
 
    //gerar o token
    try {
        $BankingBB = new BankingBB($config);
        $token = $BankingBB->gerarToken();
        echo "<pre>";
        print_r("novoToken: ". $token);//guardar no banco, duração de 10 minutos
    
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    //tendo o token, colocar ele na aplicação
    $BankingBB = new BankingBB($config);
    $token = $BankingBB->setToken($token);

    //buscar o token que está na aplicação
    $BankingBB = new BankingBB($config);
    $token = $BankingBB->getToken($token);
    echo "<pre>";
    print_r($token);
```

## Observação
Armazene e controle o token da forma que achar mais conveniente para você<br>
Pois para poder usar as funcionalidades da API vai precisar desse token<br>
O Token tem uma válidade de 10 minutos após ele ser gerado.

## Controle do Token
Segue um exemplo simples que auxilia uma forma de verificar o tempo do token guardado no banco.<br>
Caso não atualizar a data e hora, sempre vai gerar um token novo

```php
    date_default_timezone_set('America/Sao_Paulo');
    $BankingBB = new BankingBB($config);
    $hoje = date('Y-m-d');
    $dataBanco = '2022-06-17';
    if($dataBanco == $hoje){
        $token_banco = '';//token armazenado no banco
        $horaTokenGerado = '11:43:00';//traz do banco
        $dateTimeObject1 = date_create($horaTokenGerado); 
        $dateTimeObject2 = date_create(date('H:i:s')); 
            
        $difference = date_diff($dateTimeObject1, $dateTimeObject2); 
        $minutes = $difference->days * 24 * 60;
        $minutes += $difference->h * 60;
        $minutes += $difference->i;
        
        if($minutes < 9){
            $BankingBB->setToken($token_banco);//colocar o token na aplicação
            echo "<pre>";
            print_r($token_banco);
        }else{
            try {
                $token = $BankingBB->gerarToken();//ao gerar o token ele ja está na aplicação
                echo "<pre>";
                print_r("novoToken: ". $token);
                //guardar no banco: token, data e hora
            
            } catch (\Exception $e) {
                echo $e->getMessage();
            } 
        }
    }else{
        //gerar o token
        try {
            $token = $BankingBB->gerarToken();//ao gerar o token ele ja está na aplicação
            echo "<pre>";
            print_r("novoToken: ". $token);
            //guardar no banco: token, data e hora
        
        } catch (\Exception $e) {
            echo $e->getMessage();
        } 
    }
```