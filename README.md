# Task Manager - Laravel

Este projeto é uma aplicação **Laravel 12** para gerenciamento de tarefas e tags.

---

## Pré-requisitos

Antes de rodar a aplicação, você precisa ter instalado em sua máquina:

- PHP >= 8.2  
- Composer  
- MySQL ou outro banco de dados compatível  
- Node.js e NPM (para assets, caso use Laravel Mix ou Vite)  
- Git (opcional, para clonar o projeto)  

---

## Passo 1 — Clonar o projeto

Se você tiver Git instalado, rode:

```bash
git clone <URL_DO_REPOSITORIO>
cd <NOME_DO_PROJETO>
```

Se não tiver Git, apenas baixe o ZIP do projeto e extraia.

---

## Passo 2 — Instalar dependências PHP

Dentro da pasta do projeto, rode:

```bash
composer install
```

Isso irá instalar todas as dependências do Laravel.

---

## Passo 3 — Configurar variáveis de ambiente

Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

Edite o `.env` para configurar o banco de dados:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

> Certifique-se de criar o banco de dados antes de rodar as migrations.

---

## Passo 4 — Gerar a chave da aplicação

```bash
php artisan key:generate
```

Isso garante que a aplicação terá a chave de criptografia necessária.

---

## Passo 5 — Rodar migrations e seeders (opcional)

Se quiser criar as tabelas do banco de dados:

```bash
php artisan migrate
```

Se houver seeders para dados iniciais:

```bash
php artisan db:seed
```

---

## Passo 6 — Rodar a aplicação local

Use o servidor embutido do Laravel:

```bash
php artisan serve
```

Isso iniciará o servidor em `http://127.0.0.1:8000`.

---

## Passo 7 — Criar usuário/admin

- Acesse `/register` para criar um usuário.  
- Depois faça login em `/login`.  

> O Laravel Breeze (ou outro sistema de autenticação) deve estar configurado.

---

## Passo 8 — Usar a aplicação

- **Tarefas**: criar, editar, atualizar status e deletar.  
- **Tags**: criar, deletar (com detach em cascade).  

---
