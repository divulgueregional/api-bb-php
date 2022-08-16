# SOBRE O TOKEN

## Introdução
O token pode ser gerado e guardado no banco e depois você pode colocar o token armazenado em cada processo que irá utilizar das funções de cobrança

## Não quero guardar o token
No config vai ter a opção de colocar vazio ('')<br>
''= a biblioteca vai gerar sempre um token novo<br>

```php
'token' => '',
```

## Observação
Não é recomendados deixar '' para geração de boletos em massa ou consulta em massa.