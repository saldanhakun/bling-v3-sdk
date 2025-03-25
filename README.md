# Bling v3 SDK


---
Integração com a API do Bling ERP v3

## Instalação

Você pode instalar o pacote via composer:

```bash
composer require saldanhakun/bling-v3-sdk
```

## Autenticação

### Solicitar autorização

```php

use Saldanhakun\Bling\Bling;

// Instancia o objeto
$bling = new Bling(
    "CLIENT ID",
    "SECRET KEY",
);

// Adiciona a url de callback caso seja diferente da cadastrada no Bling
$bling->setCallbackURL("URL PARA RETORNO");

// Solicita a autenticação
// O usuário será redirecionado para uma página de autenticação do Bling
$bling->requestAuthorization();
```

### Obter token de acesso

```php
$retorno = $bling->requestToken($_GET["code"]);
```

### Dados do `$retorno`

```php
[
    "access_token" => "TOKEN PARA REQUISIÇÕES",
    "refresh_token" => "TOKEN PARA RENOVAÇÂO DO accessToken",
    "token_validate" => "Data de validade do token em segundos"
]
```

### Renovar token de acesso

```php
// Solicita a atualizacao
$retorno = $bling->refreshToken($refreshToken);
```

### Definindo o token de acesso

```php
// A partir daqui, informe o token toda vez que for utilizar a API
$bling->setAccessToken("Access Token");
```

## Produtos

### Listar produtos

```php
//Retorna um array com todos os produtos
$bling->produtos()->get();

//Retorna um array com todos os produtos na pagina 2 com 10 itens por pagina
$bling->produtos()->get(2, 10);
```

### Criando um produto

```php
//Criando um produto simples
$response = $this->bling
    ->produtos()
    ->create([
        'nome'     => 'Bolacha recheada (e não biscoito)',
        'codigo'   => '123456789',
        'tipo'     => 'P', //P - Produto
        'situacao' => 'A', //A - Ativo
        'formato'  => 'S', //S - Simples
    ]);
```

### Atualizando um produto

```php
//Atualizando um produto simples
$response = $this->bling
    ->produtos()
    ->update($id, [
        'nome'     => 'Agora sim biscoito recheado',
        'codigo'   => '123456789',
        'tipo'     => 'P', //P - Produto
        'situacao' => 'A', //A - Ativo
        'formato'  => 'S', //S - Simples
    ]);
```

### Deletando um produto

```php
//Deletando um produto
$this->bling
    ->produtos()
    ->deleteById($id);
```

### Buscando um produto

```php
//Buscando um produto
$this->bling
    ->produtos()
    ->getById($id);
```

## Testando

Para rodar os testes, baixe as dependências de desenvolvimento e execute:
```bash
php vendor/bin/codecept run
```

## Lista de rotas

- [X] - Categorias - Produtos
- [X] - Contatos
- [X] - Contatos - Tipos
- [X] - Depositos
- [X] - Formas de Pagamentos
- [X] - Estoques
- [X] - Notas Fiscais de Consumidor Eletrônicas
- [X] - Pedidos - Vendas
- [X] - Situações
- [X] - Situações Módulos
- [X] - Produtos

## Créditos

- [Kallef Alexandre](https://github.com/prhost)
- [Marcelo Saldanha](https://www.marcelosaldanha.com.br/)

## Licença

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
