# Desafio Prático – Processo Seletivo Hardness Sistemas

Este projeto é uma aplicação CRUD simples feita como parte do processo seletivo para estágio em Desenvolvimento de Sistemas na Hardness Sistemas.

O objetivo é permitir o cadastro, listagem, edição e exclusão de clientes, usando as tecnologias propostas.

## 🧰 Tecnologias usadas

- PHP
- MySQL
- HTML
- CSS (modo escuro e visual mais limpo)
- JavaScript (somente para confirmações)
- Boostrap (desing e responsividade)

## 📋 Funcionalidades

- Cadastrar novos clientes
- Listar todos os clientes já cadastrados
- Editar os dados de um cliente
- Excluir um cliente com confirmação
- Código (ID) gerado automaticamente pelo banco de dados

## 🗂️ Estrutura do projeto

```
crud-clientes/
├── index.php        - Lista todos os clientes
├── create.php       - Cadastra novos clientes
├── edit.php         - Permite editar dados
├── delete.php       - Exclui um cliente
├── db.php           - Conexão com o banco MySQL
├── style.css        - Estilo em modo escuro
├── script.js        - Script opcional (não usado por enquanto)
└── README.md        - Este arquivo :)
```

## 🧪 Como testar o projeto

1. Instale o XAMPP (https://www.apachefriends.org/pt_br/index.html) e inicie Apache + MySQL
2. Coloque a pasta do projeto em `C:/xampp/htdocs/`
3. Acesse `http://localhost/phpmyadmin` e crie o banco:

```sql
CREATE DATABASE crud;

USE crud;

CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  telefone VARCHAR(20),
  endereco VARCHAR(255)
);
```

4. Acesse no navegador:
   ```
   http://localhost/crud-clientes
   ```

## 👨‍💻 Observações

- Projeto desenvolvido do zero com foco em simplicidade e organização.
- O layout foi feito com um estilo mais limpo e escuro para melhor leitura e aparência moderna.
- Para melhorar a aparência e a responsividade da interface, optei por utilizar o framework **Bootstrap**.
- Toda a lógica de conexão, inserção, edição e exclusão está implementada com `mysqli` e prepared statements.
- Utilizei o **XAMPP** para simular um ambiente de servidor local com suporte a PHP e MySQL.
- Caso deseje visualizar o código em uma versão mais “crua” e sem a integração com o Bootstrap, basta acessar um commit anterior neste repositório via Git.


---

Feito por **Gregory Junior**
