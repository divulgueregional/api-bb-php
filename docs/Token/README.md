# SOBRE O TOKEN

## Introdução
O token pode ser gerado e guardado no banco e depois você pode colocar o token armazenado em cada processo que irá utilizar das funções de cobrança

## Não quero guardar o token
No config vai ter a opção de colocar 1 ou ''<br>
1= a biblioteca vai gerar sempre um token <br>
''= você guarda e gerencia o token 

```php
'tokenAutomatico' => 1,
```

## Observação
Não é recomendados deixar 1 para geração de boletos em massa.