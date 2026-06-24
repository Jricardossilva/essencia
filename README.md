<div align="center">

# 🌿 Essência · Fisioterapia Integrada

**Site institucional + painel administrativo para uma clínica de fisioterapia domiciliar em João Pessoa/PB.**

_Movimento, equilíbrio e cuidado em todas as fases da vida._

[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?logo=docker&logoColor=white)](https://www.docker.com/)
[![Status](https://img.shields.io/badge/status-online-3FA34D)](https://essencia.projetointegrador.com.br)

🔗 **Demo:** [essencia.projetointegrador.com.br](https://essencia.projetointegrador.com.br)

</div>

---

## 📑 Sumário

- [Sobre o projeto](#-sobre-o-projeto)
- [Identidade visual](#-identidade-visual)
- [Funcionalidades](#-funcionalidades)
- [Stack e decisões técnicas](#-stack-e-decisões-técnicas)
- [Estrutura do projeto](#-estrutura-do-projeto)
- [Como rodar localmente](#-como-rodar-localmente)
- [Variáveis de ambiente](#-variáveis-de-ambiente)
- [Banco de dados e seeds](#-banco-de-dados-e-seeds)
- [Painel administrativo](#-painel-administrativo)
- [Avaliação online](#-avaliação-online)
- [Deploy (Hostinger)](#-deploy-hostinger)
- [Fluxo de versionamento (Git)](#-fluxo-de-versionamento-git)
- [Roadmap](#-roadmap)
- [Autor](#-autor)

---

## 🩺 Sobre o projeto

A **Essência Fisioterapia Integrada** é um site institucional desenvolvido para a fisioterapeuta
**Danielle Ferreira de Santana** (CREFITO 318169F · Mestranda em Funcionalidade Humana pela UFPB),
com atuação em **fisioterapia pélvica, saúde da mulher e do homem, saúde do idoso, atendimento
domiciliar, práticas integrativas e cuidados paliativos** em João Pessoa/PB.

O objetivo é triplo:

1. **Apresentar os serviços** de forma clara, acolhedora e baseada em evidências.
2. **Captar pacientes** por meio de CTA para WhatsApp, formulário de contato e uma **avaliação online**.
3. **Dar autonomia à profissional** com um painel administrativo para gerenciar blog, depoimentos,
   leads e usuários, sem depender de um desenvolvedor.

O conteúdo foi estruturado com foco em **SEO** e em uma arquitetura de informação pensada para
posicionar a clínica como referência em saúde da mulher e fisioterapia pélvica na região.

---

## 🎨 Identidade visual

A identidade nasce do logotipo — um emblema botânico/anatômico (figura em movimento, coluna em
dourado, folha e mão acolhedora dentro de um círculo de integralidade).

| Token | Cor | Uso |
|------|------|-----|
| Verde Floresta | `#475538` | Cor principal · textos e títulos |
| Verde Oliva | `#5A694B` | Apoio |
| Verde Sálvia | `#7F8A6A` | Secundária · saúde da mulher |
| Verde Folha | `#929B7C` | Gradientes e ilustrações |
| Dourado Champanhe | `#B8945A` | Acento · botões e linhas |
| Marfim | `#F7F5EE` | Fundo principal |
| Pedra | `#E3DFD1` | Neutro · bordas |

- **Tipografia:** `Cormorant Garamond` (títulos/display) + `Jost` (texto e rótulos).
- **Elemento de assinatura:** a *“coluna de pontos dourados”* (vértebras do logo), usada como
  divisor entre seções e selo de cuidado.
- Um **manual de identidade visual** acompanha o projeto, com variações da marca (colorida, monocromática,
  negativa), paleta, tipografia e aplicações.

---

## ✨ Funcionalidades

### Site público
- 🏠 **Home** com herói, áreas de atuação, diferenciais, depoimentos e prévia do blog.
- 👩‍⚕️ **Páginas por área**: Saúde da Mulher (Gestação, Pós-parto, Sexualidade Feminina, Fisioterapia
  Pélvica), Saúde do Homem, Saúde do Idoso, Atendimento Domiciliar, Práticas Integrativas e Cuidados Paliativos.
- 📖 Página rica de **Sexualidade na Gestação e no Pós-Parto** com linguagem acolhedora e baseada em evidências.
- 🧩 Página de **Serviços** com **carrossel de imagens** e descrições detalhadas.
- 📝 **Blog** com listagem paginada e artigo com **imagem de capa, imagem de abertura e imagem no meio do conteúdo**.
- 💬 **Widget flutuante de WhatsApp** com mensagens rápidas pré-definidas.
- 🧮 **Avaliação online** em modal com perguntas em etapas e resultado imediato (gera lead).
- 📱 **Layout 100% responsivo** (mobile-first).

### Painel administrativo (`/login`)
- 🔐 Autenticação de acesso.
- 📊 **Dashboard** com indicadores.
- 📝 **Gerenciador de Blog** com upload de 3 imagens (capa, principal e secundária), categorias e status.
- ⭐ **Gerenciador de Depoimentos**.
- 👥 **Leads** captados pela avaliação online.
- 🔑 **Troca de senha** do próprio usuário.
- 👤 **Cadastro e gestão de usuários** (criar, editar, excluir — com proteções).

---

## 🛠 Stack e decisões técnicas

| Camada | Tecnologia |
|--------|-----------|
| Backend | **PHP 8.3**, **Laravel 13** |
| Templating | **Blade** (multipáginas, sem SPA) |
| Banco de dados | **MySQL 8** |
| Frontend | **CSS puro** + **JavaScript vanilla** (sem Node/Vite) |
| Tipografia | Google Fonts (Cormorant Garamond + Jost) |
| Ambiente local | **Docker Compose** (Apache + MySQL) |
| Servidor de produção | Hostinger (hospedagem compartilhada · Apache/LiteSpeed) |

**Por que sem Node/Vite?** O frontend é leve e estático o suficiente para dispensar build step,
o que simplifica o deploy em hospedagem compartilhada (só Composer) e reduz dependências.

**Por que multipáginas com Blade?** Melhor para SEO e para um site institucional de conteúdo,
além de manter a stack enxuta.

---

## 📂 Estrutura do projeto

```
essencia/
├─ app/
│  ├─ Http/Controllers/
│  │  ├─ PageController.php            # páginas públicas
│  │  ├─ AvaliacaoController.php       # recebe a avaliação online (gera lead)
│  │  ├─ Auth/LoginController.php
│  │  └─ Admin/
│  │     ├─ DashboardController.php
│  │     ├─ PostController.php         # blog + upload de imagens
│  │     ├─ TestimonialController.php
│  │     ├─ LeadController.php
│  │     ├─ AccountController.php      # troca de senha
│  │     └─ UserController.php         # gestão de usuários
│  ├─ Models/                          # Post, Testimonial, Lead, User
│  └─ Services/AvaliacaoService.php    # regras das calculadoras
├─ config/site.php                     # contato, áreas, tópicos e diferenciais
├─ database/
│  ├─ migrations/                      # posts, testimonials, leads, users…
│  └─ seeders/DatabaseSeeder.php       # admin + conteúdo inicial
├─ public/
│  ├─ css/app.css                      # design system completo
│  ├─ js/app.js                        # menu, carrosséis, WhatsApp, modal
│  └─ assets/                          # logo, emblema e imagens de serviços
├─ resources/views/
│  ├─ layouts/app.blade.php
│  ├─ partials/                        # header, footer, whatsapp, modal, cards
│  ├─ pages/                           # home, quem-somos, serviços, blog, etc.
│  └─ admin/                           # painel
├─ routes/web.php
├─ docker/                             # Dockerfile + entrypoint (ambiente local)
└─ docker-compose.yml
```

---

## 🚀 Como rodar localmente

### Opção A — Docker (recomendado)

> Requisitos: Docker e Docker Compose.

```bash
git clone git@github.com:Jricardossilva/essencia.git
cd essencia
docker compose up -d --build
```

O `entrypoint` cuida de tudo automaticamente (copia o `.env`, instala dependências, gera a chave,
roda as migrações com seed e cria o `storage:link`).

- 🌐 Site: **http://localhost:8080**
- 🔐 Painel: **http://localhost:8080/login**
- 🗄️ MySQL exposto na porta **3307** (para não conflitar com um MySQL local na 3306).

### Opção B — Instalação manual

> Requisitos: PHP 8.3+, Composer, MySQL 8.

```bash
git clone git@github.com:Jricardossilva/essencia.git
cd essencia
cp .env.example .env
# edite o .env com as credenciais do seu banco
composer install
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

---

## 🔧 Variáveis de ambiente

Principais chaves do `.env`:

```env
APP_NAME="Essencia Fisioterapia Integrada"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://essencia.projetointegrador.com.br

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=essencia
DB_USERNAME=essencia
DB_PASSWORD=secret

# Número usado nos botões/widget de WhatsApp (formato internacional, só dígitos)
WHATSAPP_NUMBER=5583988874271
```

---

## 🗄 Banco de dados e seeds

O seeder cria o usuário administrador e o conteúdo inicial (depoimentos e artigos de exemplo).

**Credenciais padrão (troque após o primeiro acesso):**

```
E-mail: admin@essencia.com.br
Senha:  essencia2026
```

Principais tabelas: `users`, `posts`, `testimonials`, `leads`.
A tabela `leads` possui um índice único `(calculadora, email)` que garante **uma avaliação por e-mail**.

---

## 🖥 Painel administrativo

Acesse `/login` e gerencie:

- **Blog** — criar/editar artigos com capa, imagem de abertura e imagem secundária (upload em `storage/app/public`).
- **Depoimentos** — texto, autor, estrelas, ordenação e publicação.
- **Leads** — visualização das avaliações recebidas.
- **Minha senha** — troca de senha pedindo a senha atual.
- **Usuários** — criar, editar e remover acessos (com proteção contra excluir o próprio usuário).

---

## 🧮 Avaliação online

Um questionário em etapas (modal) que orienta o paciente e gera um lead:

- **Risco de quedas** — perguntas Sim/Não com faixas de risco (baixo / moderado / alto).
- **Ciclo / sintomas** — escala de 0 a 4 em 10 perguntas, com pontuação e sinalização de alerta.

A lógica de pontuação fica isolada em `app/Services/AvaliacaoService.php`, e o resultado é
apresentado na hora, com CTA para o WhatsApp. Cada e-mail só pode responder uma vez por tipo de avaliação.

> ⚕️ O conteúdo é informativo e **não substitui avaliação profissional individualizada**.

---

## 🌐 Deploy (Hostinger)

Hospedagem compartilhada (hPanel), Laravel servido nativamente (sem Docker em produção):

1. **Subdomínio** com *Document Root* apontando para a pasta **`/public`** do projeto.
2. **PHP 8.3** selecionado no hPanel.
3. **Banco MySQL** criado no hPanel (nome/usuário com prefixo da conta).
4. Clone via SSH e configuração:
   ```bash
   git clone git@github.com:Jricardossilva/essencia.git
   cd essencia
   cp .env.example .env      # ajuste APP_URL e DB_*
   composer install --no-dev --optimize-autoloader
   php artisan key:generate
   php artisan migrate --force --seed
   php artisan storage:link
   php artisan optimize
   chmod -R 775 storage bootstrap/cache
   ```
5. **SSL** emitido para o subdomínio.

**Atualizações em produção:**
```bash
git pull
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize:clear && php artisan optimize
```

---

## 🌱 Fluxo de versionamento (Git)

- **`main`** → produção.
- **`develop`** → desenvolvimento do dia a dia.

```bash
# desenvolvimento
git checkout develop
git add .
git commit -m "feat: descrição da mudança"
git push

# levar para produção
git checkout main
git merge develop
git push origin main
```

---

## 🗺 Roadmap

- [ ] Editor de conteúdo rico no blog (negrito, subtítulos, listas).
- [ ] Deploy automático (webhook/Action) ao dar merge na `main`.
- [ ] Agendamento online integrado.
- [ ] Página de identidade visual publicada como guia da marca.
- [ ] Testes automatizados (Pest/PHPUnit).

---

## 👤 Autor

**Jefferson Ricardo**
GitHub: [@Jricardossilva](https://github.com/Jricardossilva)

Projeto desenvolvido para a **Essência Fisioterapia Integrada**.
Disponibilizado no portfólio para fins de demonstração técnica.

---

<div align="center">
<sub>Feito com Laravel, café e atenção aos detalhes. 🌿</sub>
</div>