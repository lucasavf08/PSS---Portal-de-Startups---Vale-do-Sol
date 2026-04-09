```markdown
# Portal de Startups - Desafio Full Stack Laravel

Sistema web funcional para o cadastro e gestão de startups, focado na integridade das informações e na atualização dinâmica da interface conforme os requisitos do desafio técnico.

## Requisitos Técnicos Atendidos
- **Backend:** API REST desenvolvida em PHP utilizando o framework Laravel 11.
- **Frontend:** Interface responsiva construída com HTML5 semântico e estilizada com Tailwind CSS.
- **Banco de Dados:** Persistência de dados em PostgreSQL com controle de versão via Migrations.
- **Interatividade:** Consumo de API via JavaScript Assíncrono (Fetch API) para garantir a atualização dinâmica da interface (Single Page Application behavior).
- **Validação:** Implementação de regras de negócio para campos obrigatórios e restrição de unicidade para o campo CNPJ.

---

## Tecnologias Utilizadas
- **Laravel 11**: Framework PHP para o desenvolvimento da API.
- **PostgreSQL**: Sistema de gerenciamento de banco de dados relacional.
- **Tailwind CSS**: Framework CSS utilitário para design responsivo.
- **JavaScript (ES6+)**: Para manipulação do DOM e requisições assíncronas.

---

## Instalação e Configuração Local

Siga as instruções abaixo para preparar o ambiente de execução:

### 1. Clonar o Repositório
```bash
git clone [https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git](https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git)
cd NOME_DO_REPOSITORIO
```

### 2. Instalar Dependências do PHP
```bash
composer install
```

### 3. Configurar o Arquivo de Ambiente
Crie uma cópia do arquivo `.env.example` e renomeie para `.env`:
```bash
cp .env.example .env
```

Abra o arquivo `.env` e configure as credenciais do seu banco de dados PostgreSQL:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=startup_db
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Gerar a Chave da Aplicação
```bash
php artisan key:generate
```

### 5. Executar as Migrations
Com o banco de dados criado no PostgreSQL, execute o comando para criar a estrutura das tabelas:
```bash
php artisan migrate
```

### 6. Iniciar o Servidor de Desenvolvimento
```bash
php artisan serve
```
Acesse a aplicação através do endereço: [http://127.0.0.1:8000/startups](http://127.0.0.1:8000/startups)

---

## Funcionalidades e Uso
1. **Cadastro**: O usuário preenche os campos Nome Fantasia, Setor e CNPJ no formulário lateral.
2. **Validação em Tempo Real**: O backend valida se todos os campos estão presentes e se o CNPJ já não consta na base de dados.
3. **Listagem Dinâmica**: Após o cadastro bem-sucedido, a lista de startups é atualizada imediatamente via JavaScript, sem a necessidade de recarregar a página (F5).
4. **Responsividade**: O layout se adapta automaticamente para visualização em dispositivos móveis ou desktops.

---
Desenvolvido por Lucas Alves Verissimo da Fonseca - Abril de 2026
```