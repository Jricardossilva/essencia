# Essência · Fisioterapia Integrada

Site institucional **multipágina** + painel administrativo.
Stack: **Laravel 13 (PHP 8.3) · Blade · MySQL 8 · Docker (Apache)**. Sem Node — o CSS/JS ficam em `public/`.

## Subir o projeto (2 containers: app + banco)

```bash
docker compose up -d --build
```

- Site:   http://localhost:8080
- Painel: http://localhost:8080/login  →  **admin@essencia.com.br** / **essencia2026**

> Na **primeira subida**, o container instala dependências, gera a APP_KEY, espera o MySQL,
> roda `migrate --seed` (cria tabelas + admin + conteúdo de exemplo) e sobe o Apache.
> Pode levar 1–2 minutos no primeiro boot.

### Sobre o erro de porta que você teve
O MySQL do container foi publicado em **3307** no host (`3307:3306`), justamente para **não
conflitar** com o MySQL que você já tem rodando na 3306 no Windows. A aplicação acessa o banco
internamente como `db:3306`. Se ainda assim quiser, pode remover a linha `ports:` do serviço `db`.

## Páginas (cada uma é uma rota/arquivo Blade próprio)
| Rota | View |
|---|---|
| `/` | `pages/home` (carrossel de banners, áreas, serviços, gestantes, depoimentos, blog) |
| `/sobre` | `pages/sobre` |
| `/atendimento/{slug}` | `pages/area` (gestantes, saude-pelvica, idoso, atletas) |
| `/servicos/{slug}` | `pages/servico` (terapia-manual, treinamento-funcional, pilates, reabilitacao-idosos) |
| `/blog` e `/blog/{slug}` | `pages/blog`, `pages/post` |
| `/contato` | `pages/contato` |
| `/login`, `/admin/*` | painel protegido por login |

Menu com **submenu de Serviços** e **submenu de Atendimento**, **Blog no menu**, avaliação em **modal**
(perguntas em etapas), **depoimentos em carrossel** e **WhatsApp flutuante**.

## Painel / Gerenciador (`/admin`)
Login via autenticação do Laravel. Gerencia:
- **Blog** — criar/editar/excluir artigos.
- **Depoimentos** — criar/editar/excluir, com ordem e publicação.
- **Leads** — todas as avaliações recebidas (somente leitura).

## Avaliações — trava de 1 por e-mail
O `POST /avaliacao` calcula o resultado e grava em `leads`. A trava é o índice único
`(calculadora, email)` na tabela `leads`: se o e-mail repetir, retorna **409** e o site orienta
o contato pelo WhatsApp. Há `throttle:15,1` por IP para evitar abuso de terceiros.

## Onde editar
- **WhatsApp:** `WHATSAPP_NUMBER` no `.env`.
- **Áreas/serviços (textos e cores):** `config/site.php`.
- **Logo e banners (imagens):** `public/assets/*.svg`.
- **Senha do admin:** troque após o primeiro login (ou no `DatabaseSeeder`).

## Imagens
As imagens são **ilustrações SVG na identidade da marca** (`public/assets/banner-*.svg`).
Para usar **fotos reais**, basta substituir o arquivo (mantendo o nome) ou trocar o `src` nas views.
Bancos gratuitos recomendados: **Unsplash**, **Pexels**, **Freepik** — buscas como
"fisioterapia", "gestante pilates", "idoso exercício", "saúde da mulher".
