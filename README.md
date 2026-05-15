My Progress
My Progress é uma plataforma privada de vídeo e gestão de conhecimento, com foco em progresso de estudos, organização de conteúdos, anotações por timestamp e futura integração com IA local.
O objetivo do projeto é permitir que vídeos privados sejam organizados em cursos e módulos, acompanhados com controle de progresso, anotações inteligentes, transcrição, busca semântica e recursos de RAG utilizando IA local.
---
Objetivo do projeto
Criar uma plataforma própria para centralizar conteúdos em vídeo e transformar esses conteúdos em conhecimento pesquisável, estruturado e reutilizável.
A proposta principal é unir:
vídeos privados;
cursos e módulos;
progresso de estudos;
anotações por timestamp;
transcrição automática;
busca semântica;
IA local para consulta ao conhecimento.
---
Stack inicial
O projeto está sendo desenvolvido com:
Laravel — framework principal da aplicação;
Filament — painel administrativo;
PostgreSQL — banco de dados principal;
Redis — filas e cache em etapas futuras;
Docker Compose — ambiente de desenvolvimento;
Nginx — servidor web;
PHP 8.4 — runtime da aplicação;
FFmpeg — processamento de vídeo em etapas futuras;
Whisper — transcrição de áudio em etapas futuras;
pgvector — busca vetorial em etapas futuras;
Ollama — IA local em etapas futuras.
---
Estado atual do projeto
Até o momento, o projeto possui:
ambiente Docker configurado;
aplicação Laravel rodando;
PostgreSQL configurado;
Redis disponível;
Filament instalado;
painel administrativo funcional;
usuário admin inicial;
paleta visual/documentação inicial;
estrutura inicial de banco em desenvolvimento.
---
Estrutura planejada
A primeira estrutura de domínio do projeto será composta por:
`users` — usuários autenticáveis da aplicação;
`profiles` — dados complementares dos usuários;
`courses` — cursos ou trilhas de conhecimento;
`modules` — módulos pertencentes aos cursos;
`videos` — vídeos da plataforma;
`module_video` — relacionamento entre módulos e vídeos.
Futuramente, serão adicionadas estruturas para:
progresso dos vídeos;
anotações;
transcrições;
embeddings;
busca semântica;
conversas com IA/RAG.
---
Ambiente de desenvolvimento
Pré-requisitos
Antes de rodar o projeto, é necessário ter instalado:
Docker Desktop;
WSL2/Ubuntu;
Git;
DBeaver ou outro cliente PostgreSQL, opcional.
---
Subindo o projeto
Clone o repositório:
```bash
git clone https://github.com/balenaV/my-progress.git
cd my-progress
```
Copie o arquivo de ambiente:
```bash
cp .env.example .env
```
Suba os containers:
```bash
docker compose up -d --build
```
Entre no container da aplicação:
```bash
docker exec -it my_progress_app bash
```
Instale as dependências:
```bash
composer install
```
Gere a chave da aplicação:
```bash
php artisan key:generate
```
Rode as migrations:
```bash
php artisan migrate
```
A aplicação ficará disponível em:
```text
http://localhost:8000
```
O painel administrativo ficará disponível em:
```text
http://localhost:8000/admin
```
---
Banco de dados
A conexão local com PostgreSQL pode ser feita pelo DBeaver usando:
```text
Host: localhost
Port: 5432
Database: my_progress
Username: my_progress_user
Password: my_progress_password
```
Dentro do Docker, a aplicação usa o host:
```text
postgres
```
---
Design system
A identidade visual inicial está documentada em:
```text
docs/design/design-system.md
```
A paleta principal é baseada em:
roxo/índigo para identidade e foco cognitivo;
verde para progresso, IA e estados ativos;
laranja/dourado para anotações e timestamps;
neutros quentes para leitura e superfícies;
tons terrosos para erros e alertas.
---
Roadmap inicial
Fase 1 — Base da aplicação
configurar Laravel;
configurar Docker;
configurar PostgreSQL;
configurar Redis;
instalar Filament;
configurar autenticação inicial;
versionar projeto no GitHub.
Fase 2 — Estrutura principal do banco
criar `profiles`;
criar `courses`;
criar `modules`;
criar `videos`;
criar `module_video`;
configurar relacionamentos entre models.
Fase 3 — Painel administrativo
criar Resource de cursos;
criar Resource de módulos;
criar Resource de vídeos;
organizar formulários;
organizar listagens;
aplicar estados e ordenação.
Fase 4 — Upload e player inicial
implementar upload simples de vídeo;
salvar caminho do arquivo original;
criar player básico;
validar reprodução de vídeos.
Fase 5 — Progresso e anotações
salvar progresso do usuário;
retomar vídeo de onde parou;
criar anotações por timestamp;
listar e editar anotações.
Fase 6 — Processamento e IA
processar vídeo com FFmpeg;
gerar HLS;
extrair áudio;
transcrever com Whisper;
gerar embeddings;
implementar busca semântica;
integrar RAG com IA local.
---
Convenções iniciais
Commits
Sugestão de padrão:
```text
feat: nova funcionalidade
fix: correção de bug
chore: configuração ou manutenção
docs: documentação
style: ajuste visual
refactor: melhoria interna sem alterar comportamento
```
Exemplos:
```bash
git commit -m "feat: add initial database structure"
git commit -m "docs: add project readme"
git commit -m "style: add default system color palette"
```
---
Observações
Este projeto está em fase inicial de desenvolvimento.  
A prioridade atual é construir uma base sólida antes de avançar para processamento de vídeo, transcrição, embeddings e IA local.