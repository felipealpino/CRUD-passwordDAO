# CRUD-passwordDAO

O banco de dados usado foi o MySql (PhpMyAdmin) e o Xampp

O banco de dados foi criado na estrutura chamada 'test' Sendo assim , no vale a pena conferir dentro do arquivo config.php os dados para fazer a conexão PDO Para isso basta trocar (caso necessário) as variaveis nas primeiras linhas de código

O nome da tabela é 'passwords', sempre criado no plural como o professor ensina em aula o nome das colunas são:
- id - int(10) AutoIncrement 
- software - varchar(50) 
- login - varchar(50) 
- senha - varchar (50)

Criar 02 pastas na raiz do projeto para adicionar os arquivos Password.php e PasswordDaoMysql.php

Crie a primeira pasta e renomeie para: dao 
Mova o arquivo PasswordDaoMysql.php para dentro dela

Crie a segunda pasta e renomeie para: models 
Mova o arquivo Password.php para dentro dela 

O restante pode continuar na raiz do projeto. 
