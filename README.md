# 3DW CRUD - Sistema de Cadastro de Alunos

Projeto em PHP com MySQL/MariaDB que implementa um CRUD (cadastrar, listar, alterar e excluir) de usuários/alunos, seguindo o padrão **MVC** com camada **DAO**. A interface usa um visual pixelado de jogo retrô em tons de rosa.

## Tecnologias

- PHP 7.4 ou superior
- MySQL / MariaDB (acesso via PDO)
- HTML e CSS
- XAMPP (Apache + MariaDB) para rodar localmente

## Estrutura do projeto

```
3dwcrud/
├── index.php                      # Página principal (formulário + lista)
├── Controle/
│   └── ControleUsuario.php        # Recebe as ações e chama o DAO
├── Modelo/
│   ├── ClassUsuario.php           # Classe modelo (idUsuario, nome, email)
│   └── DAO/
│       ├── conexao.php            # Conexão PDO com o banco
│       └── ClassUsuarioDAO.php    # Acesso aos dados (CRUD)
└── Visao/
    ├── FormCadUsuario.php         # Formulário de cadastro e edição
    └── ListarUsuario.php          # Tabela de usuários com Editar/Excluir
```

## Como executar

1. Instale o [XAMPP](https://www.apachefriends.org/) e inicie o **Apache** e o **MySQL** no painel.
2. Copie a pasta `3dwcrud` para `C:\xampp\htdocs\`.
3. Abra o phpMyAdmin (`http://localhost/phpmyadmin`), vá na aba **SQL** e execute o script abaixo.
4. Confira o usuário e a senha em `Modelo/DAO/conexao.php`. O padrão do XAMPP é `root` sem senha.
5. Acesse `http://localhost/3dwcrud/`.

## Banco de dados

```sql
CREATE DATABASE IF NOT EXISTS BDPOO
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE BDPOO;

CREATE TABLE IF NOT EXISTS usuario (
  idUsuario INT AUTO_INCREMENT PRIMARY KEY,
  nome      VARCHAR(100) NOT NULL,
  email     VARCHAR(100) NOT NULL
);
```

## Configuração da conexão

Em `Modelo/DAO/conexao.php`:

```php
$dsn  = 'mysql:host=localhost;dbname=BDPOO;charset=utf8mb4';
$user = 'root';
$pass = '';   // coloque a senha do MySQL, se houver
```

## Funcionalidades

| Ação      | Como usar                                           | Rota (controller)                                   |
|-----------|-----------------------------------------------------|-----------------------------------------------------|
| Cadastrar | Preencha nome e e-mail e clique em **Cadastrar**    | `Controle/ControleUsuario.php?ACAO=cadastrarUsuario` |
| Listar    | A tabela aparece abaixo do formulário               | `ClassUsuarioDAO::listaUsuario()`                   |
| Alterar   | Clique em **Editar**, mude os dados e salve         | `Controle/ControleUsuario.php?ACAO=alterarUsuario`   |
| Excluir   | Clique em **Excluir** e confirme                    | `Controle/ControleUsuario.php?ACAO=excluirUsuario&idex=ID` |

Após cada ação o controller redireciona para o `index.php` com uma mensagem (`?MSG=...`), exibida em um alerta.

## Problemas comuns

- **"Access denied for user 'root'@'localhost'"**: a senha em `conexao.php` não confere com a do MySQL.
- **"Unknown database 'BDPOO'"** ou **"Table 'usuario' doesn't exist"**: o script SQL ainda não foi executado.
- **Fonte pixelada não aparece**: a fonte "Press Start 2P" é carregada do Google Fonts e precisa de internet. Sem ela, o sistema usa uma fonte monoespaçada.

## Autoria

Projeto acadêmico da disciplina de Desenvolvimento Web (UniCEUB).
