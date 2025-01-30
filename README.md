# Documentacao
Projeto de um CRUD de vagas, utilizando php com laravel.

# Primeiros passos

- Certifique-se de que o PHP e o Composer estão instalados na sua máquina. Em um terminal use esse comando para verificar:
```
php -v

composer -v
```

- Após clonar o repositório, navegue até a pasta do projeto e instale as dependências com o Composer:
```
composer install
```
# Configuração de ambiente

- copie o arquivo .env.example para .env:
```
cp .env.example .env
```
- Configure as variáveis de ambiente, como as credenciais do seu banco de dados, no arquivo .env.
```
vim .env
```
Exemplo de configurações para banco de dados mysql:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```
- Gerar a Chave de aplicação
```
php artisan key:generate
```
- Execute as migrações para criar as tabelas no banco de dados:
```
php artisan migrate
```
Se necessário, você pode desfazer as migrações com o seguinte comando:
```
php artisan migrate:rollback
```
- Agora a aplicação está pronta para ser executada. Use o seguinte comando para iniciar o servidor local:
```
php artisan serve
```

## URL
```
http://127.0.0.1:8000/vagas
```