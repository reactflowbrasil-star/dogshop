FROM wordpress:php8.3-apache

# Configura uploads grandes para o WordPress.
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# Instala o tema durante a inicialização do volume oficial do WordPress.
COPY style.css functions.php header.php footer.php front-page.php index.php /usr/src/wordpress/wp-content/themes/dogshop-sinop/
