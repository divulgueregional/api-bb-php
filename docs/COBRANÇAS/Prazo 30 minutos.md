# PRAZO 30 MINUTOS

## Prazo para alterar os dados de um boleto
Após boleto gerado, poderá alterar ele só apos 30 minutos.<br>
Após já ter alterado uma vez o boleto, só poderá fazer outra alteração depois de 30 minutos<br>

## Verificar prazo 30 minutos
Esse é um exemplo simples para verificar se já passou os 30 minutos.<br>
Quando incluir o boleto guarde a data e hora da inclusão<br>
Quando alterar o boleto guarde a data e hora da alteração<br>


```php
#############################################
######## PRAZO PARA ALTERAR/BAIXAR ##########
#############################################
public function boleto_bb_alterar_tempo(){
    $boleto_inclusao = '2022-08-30 14:14:15';//dados do seu banco de dados
    $boleto_alterado = '';//dados do seu banco de dados

    if($boleto_alterado == ''){
        //verificar o tempo só pela inclusão
        $resp = $this->prazo_banco($boleto_inclusao);
    }else{
        //verificar o tempo só pela alteração
        $resp = $this->prazo_banco($boleto_alterado);
    }
    return $resp;
}

//caso o boleto ainda não foi alterado então pega a data da sua inclusão
private function prazo_banco(String $data_hora_bd){
    //regra de tempo
    $HoraEntrada = new DateTime($data_hora_bd);
    $HoraSaida   = new DateTime(date('Y-m-d H:i:s'));

    $diffHoras = $HoraSaida->diff($HoraEntrada)->format('%H:%I:%S');// echo $diffHoras;
    $horaatual = strtotime("{$diffHoras}");
    $horafixa = strtotime("00:30:00");

    if($horaatual > $horafixa){
        // Liberado
        return 'ok';
    }else{
        // Bloqueado
        $dt_alteracao = $this->Functions->dataComHora($data_hora_bd, 1);
        $hr_alteracao = $this->Functions->dataComHora($data_hora_bd, 3);
        $dt_agora = date('d/m/Y');
        $hr_agora = date('H:i:s');
        $min_passados = substr($diffHoras, 3);

        $texto = "<label class='col-pink font-bold font-18'>ALTERAÇÃO NEGADA</label><br>";
        $texto .= "Última Alteração : {$dt_alteracao} ás {$hr_alteracao}<br>";
        $texto .= "Data e hora atual: {$dt_agora} ás {$hr_agora}<br>";
        $texto .= "Tempo Passado: {$min_passados} minutos.<br>";
        $texto .= "Tempo Minimo: 30 minutos.<br>";
        $texto .= "Após uma inclusão de boleto ou da última alteração, o banco requer um tempo minimo de 30 minutos para processar a operação em seus dados.<br>";

        return $texto;
    }
}
#############################################
######## TRATA A DATA COM HORA ##############
#############################################
//2022-12-01 14:11:05
// $opcao: 1- retorna data PT de uma data us
// $opcao: 2- retorna data us de uma data PT
// $opcao: 3- retorna hora
public function dataComHora(String $data_com_horas, Int $opcao){
    switch ($opcao) {
        case '1':
            $dt_us = substr($data_com_horas, 0, 10);
            return $this->data_us_pt($dt_us);
        break;
        case '2':
            $dt_us = substr($data_com_horas, 0, 10);
            return $this->data_us_pt($dt_us);
        break;
        case '3':
            return substr($data_com_horas, 11);
        break;
        default:
            return null;
        break;    
    }         
}
```