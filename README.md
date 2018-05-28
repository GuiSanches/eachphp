# Importante! Comidinhas EACH - PHP Edition BETA.

## Criação do banco de dados

É fundamental que se crie o banco de dados a fim do site funcionar como deve, e para isso, executar os seguintes comandos no terminal do MySQL.

### Banco de dados
Este comando cria o banco de dados.

```
create database coolsunday
default character set utf8
default collate utf8_general_ci;

```

### Tabela de vendedores (para o Login/Cadastro)
Aqui é possível armazenar os cadastros de vendedores.

```
create table vendedor (
id int(11) auto_increment primary key,
usuario varchar(50),
senha varchar(50),
nome varchar(50)
);
```

### Tabela para produtos
Aqui é armazenado os produtos que serão listados na página inicial.

```
create table produtos (
id int(11) auto_increment primary key,
Nome varchar(25),
Preco decimal(4,2),
Vendedor varchar(30),
Descricao varchar(200),
Aprovado boolean not null default 1
);
```

E só (por enquanto).

