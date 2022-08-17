# Importando dados CSV 

## Library CSV Import

Library utilizada para o processamento do arquivo CSV.

https://github.com/bradstinson/csv-import


## Configurações do PHP

Alterar no php.ini

memory_limit = 300M
max_execution_time = 300
max_input_time = 300
post_max_size 128M
upload_max_filesize 20M


## Configurações do DB

Criar a base de dados "teste_uello" e fazer a importação das tabelas através do arquivo "teste_uello.sql" que esta na raiz do projeto.
todas as informações de conexão estão no arquivo database.php em "application/config"

## Especificações

Projeto feito com CodeIgniter V3.0.6
PHP 7.4.26
MySql 8.0.27
