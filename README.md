# Plataforma web do projeto de loja virtual de produtos musicais LaMusic. 


### Contexto e Visão Técnica

#### Tecnologias utilizadas:
 - Frontend: HTML, CSS, JavaScript, PHP
 - Backend: Lógica embutida em PHP com acesso direto a banco SQLite (sem API intermediária)
 - Banco de Dados: SQLite (local)
 - Estilização: Bootstrap
 - Funcionalidades cliente: jQuery

#### Arquitetura:
 - Aplicação Web desenvolvida em PHP puro
 - O backend realiza operações diretamente sobre um banco de dados SQLite via PDO
 - O frontend é executado em um servidor PHP local
 - A comunicação entre frontend e backend é feita através de requisições PHP e chamadas JavaScript

#### Configuração do Ambiente
 **Requisitos:**
 - Servidor Web PHP (ex: Apache, Nginx, XAMPP ou Laragon)
 - acesso ao banco de dados SQLite


#### Passo a Passo para rodar localmente (Linux/macOS):
bash 

git clone https://github.com/orgjr/LaMusic_web.git

cd LaMusic_web

php -S localhost:8080

 #### Acesse no navegador:
 http://localhost:8080


 #### Windows:
 - Utilize XAMPP ou Laragon
 - Coloque os arquivos na pasta htdocs (XAMPP) ou www (Laragon)
 - Inicie o Apache e acesse http://localhost/LaMusic_web


#### Estrutura do Repositório

 **Principais Diretórios:**
Caminho	Descrição
/	Páginas PHP (ponto de entrada do sistema)
/assets/css	Arquivos CSS personalizados
/assets/img	Imagens do site
/assets/js	Scripts JavaScript e chamadas AJAX
/db	Banco de dados SQLite
 

 **Navegação básica via terminal:**
bash
cd LaMusic_web
cd assets/css
cd assets/img
cd assets/js
cd db

#### Dependências e Build
 **Bibliotecas utilizadas:**
 - Bootstrap
 - jQuery
 - Unpkg CDN

**Build e testes:**
Como o projeto usa PHP puro e arquivos estáticos, não há necessidade de compilação.
 Testes são feitos em tempo de execução, simulando chamadas à API.

#### Fluxo de Desenvolvimento
 **Branches:**
 - main – branch principal e estável
 - develop – branch para evolução contínua (sugestão futura)
 - feature/[nome-da-feature] – para novas funcionalidades (sugestão futura)
 **Boas práticas:**
 - Criação de Pull Requests para revisão de código
 - Integração contínua (CI) futura via GitHub Actions ou GitLab CI

#### Testes
Como o projeto frontend não utiliza TypeScript ou Node.js diretamente, testes automatizados ainda não estão implementados.
Sugestão futura: configurar testes para as chamadas AJAX usando Jest + jsdom, ou para o backend com JUnit.

#### Deployment
 Ambiente de produção:
 - Frontend: executado em servidor PHP local (ex: XAMPP, VPS ou localhost)
 - Backend: integração direta com banco de dados SQLite via PDO
 **Processo de deploy:**
 - Clonar o projeto e colocar os arquivos no servidor PHP
 - Garantir que o banco de dados SQLite esteja presente na pasta /db

#### Guia de Estilo
 - Organização dos arquivos: padrão MVC simplificado (PHP + JS/CSS separados)
 - Boas práticas de código:
 - Comentários explicativos
 - Funções JS bem nomeadas
 - Código limpo e modular
 **Commits:**
 - feat: para funcionalidades
 - fix: para correções
 - refactor: para melhorias internas
#### Documentação de APIs
 - A lógica de persistência de dados é feita diretamente no banco SQLite usando comandos SQL via PDO.
 - Não há uso de Swagger/Postman, pois não existe camada intermediária de API REST.

#### Segurança e Boas Práticas
 - Autenticação básica via sessão PHP (implementação local)
 - Validação de formulários no frontend (JS)
 - Tratamento de erros de conexão com o banco SQLite
 - HTTPS recomendado em produção
 - Validação e sanitização de entradas via prepared statements (PDO)

#### Manutenção e Contribuição
 **Reportar bugs:**
 - Via GitHub Issues no repositório oficial
 **Contribuição:**
 - Fork do repositório
 - Branch de feature com nome adequado
 - Pull request para main ou develop
 - Rodar testes (futuros) antes de submeter

