# Deploy WordPress no Dokploy

O repositório é uma aplicação Docker Compose: WordPress com o tema Dog Shop Sinop e MySQL. Os dados do site e do banco ficam em volumes nomeados persistentes, então um novo deploy não apaga conteúdo publicado.

## Criar a aplicação

1. No Dokploy, crie um projeto e ambiente para a Dog Shop Sinop.
2. Adicione uma aplicação do tipo **Docker Compose** conectada a `https://github.com/reactflowbrasil-star/dogshop`, branch `main`, arquivo `docker-compose.yml`.
3. Configure estas variáveis no ambiente da aplicação:
   - `DB_NAME=dogshop`
   - `DB_USER=dogshop`
   - `DB_PASSWORD`: uma senha forte gerada para este banco.
   - `DB_ROOT_PASSWORD`: outra senha forte, diferente da senha do usuário do WordPress.
4. Faça o deploy. O serviço `wordpress` expõe a porta 80 internamente; associe o domínio a esse serviço na seção de Domains do Dokploy. O Dokploy deve criar HTTPS pelo proxy configurado.
5. Abra o domínio e conclua a configuração inicial do WordPress. Ative **Dog Shop Sinop** em **Aparência → Temas**.
6. Configure os dados reais da loja em **Aparência → Personalizar → Dados da loja** e instale WooCommerce para cadastrar produtos e processar o catálogo.

## Persistência e segurança

- `wordpress_data` mantém arquivos e mídia; `database_data` mantém o banco.
- Guarde os dois valores de senha como variáveis protegidas no Dokploy. Não os publique no repositório.
- Faça backups regulares dos volumes e do banco de dados antes de atualizações relevantes.
- Para backup/migração, inclua o banco MySQL e o volume `wordpress_data`.

## Domínio

O domínio usado neste deploy é `dogshopsinop.com.br`. Aponte o DNS para o servidor Dokploy e configure o domínio na aplicação WordPress. O DNS precisa chegar ao servidor e as portas HTTP/HTTPS precisam estar acessíveis para emissão do certificado TLS.
