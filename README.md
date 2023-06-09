![image](https://github.com/ThiagoBrunoPereira/laravel-import-files/assets/21248731/df1290b4-3708-4ab3-ba57-2eb180c6583f)


### Requimentos
1. PHP 8.1 >
2. SQLite

### Instalação

Este teste utiliza PHP 8.1, Laravel 10 e um banco de dados SQLite simples.

1. Faça o clone desse repositório;
2. Execute o `composer install`;
3. Crie o arquivo `.env` a partir do `.env.example`, e nele modifique as seguintes variaveis
  * QUEUE_CONNECTION=redis
  * DB_CONNECTION=sqlite
4. Execute as migrations e os seeders;

### Inicializando projeto

Utiliza o comando `php -S localhost:8080 -t public` para inicializar o projeto ou como configurar.

Nesse projeto foi utilizado o 'phpredis' para trabalhar com as filas, utilize o comando `php artisan queue:work --queue=high,default`, para o funcionando das filas.


O que foi feito:
1. Migrations: 
    * Adicionado timestamps
    * Ajustado a orden de criação do campos;
    * Campo `Name` da tabela categories ajustado para `unique`;
    * Campo `category_id` alterado o tipo para `foreignId`;
    
 2. Seeds:
    * Invocado o metodo call para as seeds criadas no arquivo `DatabaseSeeder.php`;
    * Na seed de categorias foi modificado o método `create` para `updateOrCreate`;
    
 3. Migrations:
  Havia um erro ao executar as migrations dizendo que algumas tabelas já existiam, o erro occoria devido ao schema ter o nome de umas das migrations diferente, foi ajustado os nomes e rodou sem erros;
      
 4. Arquivo JSON:
    * Atualizado as chaves `conteúdo` para `conteudo`;
  
 5. Models criados:
    * Document 
    * Category

 
 6. Rotas:
    * [http://localhost:8080/](http://localhost:8080/) Acesso inicial com botão e form de envio;
    * [http://localhost:8080/send](http://localhost:8080/send) Envia arquivo e cria os processos;
    
7. Implementação: 
    O controller ficou responsável para criar a ação do usuário responsável para tratativa da ação, primeiro o arquivo que vem da requisição é guardado em Storage depois é invocado o service `sendToQueue` que é reponsável para armazenar os dados do arquivo e em seguida disparar todos os items da fila até o `DocumentJob`,  O  `DocumentJob` encontra a categoria atravez do `categoryRepository` com os parametros recebidos e em seguida o `DocumentJob` salva o job na tabela documents.

