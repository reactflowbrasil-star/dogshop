FROM wordpress:php8.3-apache

# Configura uploads grandes para o WordPress.
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# Instala o tema durante a inicialização do volume oficial do WordPress.
COPY style.css functions.php header.php footer.php front-page.php index.php /usr/src/wordpress/wp-content/themes/dogshop-sinop/

# Serve a página inicial fora do volume persistente, mantendo o WordPress.
RUN mkdir -p /opt/dogshop \
    && printf '%s\n' '<!doctype html><html lang="pt-BR"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"><title>Dog Shop Sinop</title><style>html,body{width:100%;height:100%;margin:0;padding:0;overflow:hidden}iframe{position:fixed;inset:0;display:block;width:100%;height:100%;height:100dvh;border:0}</style></head><body><iframe src="https://dogshopsinop.lovable.app/" title="Dog Shop Sinop — Banho, tosa e tudo para o seu pet" allowfullscreen loading="eager"></iframe></body></html>' > /opt/dogshop/index.html \
    && printf '%s\n' 'AliasMatch "^/$" "/opt/dogshop/index.html"' '<Directory "/opt/dogshop">' '    Require all granted' '</Directory>' > /etc/apache2/conf-available/dogshop-home.conf \
    && a2enconf dogshop-home
