# CRUD com Laravel 12 + Bootstrap 5

Este é um projeto de CRUD (Create, Read, Update, Delete) desenvolvido com **Laravel 12** e integração do **Bootstrap 5** via NPM utilizando o **Vite** como bundler de assets.

---

## 🧰 Tecnologias utilizadas

- Laravel 12
- PHP 8+
- Bootstrap 5 (via NPM)
- Vite (para assets)
- Blade Templates
- MySQL
- Laravel Mix removido (uso exclusivo do Vite)

---

## 🚀 Funcionalidades

- Listagem de usuários
- Criação de novos usuários
- Edição de usuários existentes
- Exclusão com confirmação
- Validação com mensagens de erro e flash alerts
- Layouts e formulários responsivos com Bootstrap 5

---

## ⚙️ Instalação

1. Clone o repositório:
   git clone https://github.com/francisco-artur-dev/Painel-de-Registos.git
   cd seu-repositorio

2. Instale as dependências do PHP:
composer install
Instale as dependências do Node:
npm install

3. Copie o arquivo .env:
cp .env.example .env
4. Gere a key da aplicação:
php artisan key:generate

5. Configure o banco de dados no arquivo .env.

6. Rode as migrations (e seeds, se tiver):
php artisan migrate

🧪 Executando o projeto

1. Inicie o Vite (compilação dos assets):
npm run dev

2. Inicie o servidor Laravel:
php artisan serve
Acesse no navegador: http://localhost:8000

📁 Estrutura
resources/views/layouts/admin.blade.php: layout base com Bootstrap e @vite

resources/views/users/: views do CRUD

routes/web.php: rotas web

app/Http/Controllers/UserController.php: lógica do CRUD

public/build/: assets gerados pelo Vite

✅ Requisitos
PHP >= 8.1

Composer

Node.js e NPM

Banco de dados compatível (MySQL, PostgreSQL, SQLite, Laragon, etc)

## License
Este projeto está sob a licença MIT.
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

