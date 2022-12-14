<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## TiSaude API

Esta aplicação foi criada para um processo seletivo.

### Get Started

Para buildar a aplicação usei o Laravel [sail](https://laravel.com/docs/9.x/sail#introduction) que facilita a utilização dos dockers containers. Recomendo criar um alias.
#### Gerando alias:
`alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`

Após gerar o alias, vc pode subir o container com a seguinte sintaxe:
`sail up`
Caso não tenha criado o alias, toda vez que desejar subir o container ou executar algum comando artisan dentro do container a sintaxe usada deve ser `./vendor/bin/sail up`. A mesma lógica de syntaxe deve ser usada caso queira usar algum comando `artisan` dentro do container.

#### Banco de dados:
Para facilitar os testes criei migrations e seeds com dados iniciais das entidades da aplicação. Para carregar os seeds e migrations, você pode executar o comando:

`sail php artisan migrate:fresh --seed`

#### Documentação:
A documentação da api está nesta [collection](Insomnia_collection.json) do Insomnia. Para importar você precisará criar uma nova collection request no insomnia em seguida clicar em `Import/Export`. Na aba Data, você precisará selecionar o arquivo através do botão `Import Data`.

