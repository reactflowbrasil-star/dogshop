FROM wordpress:php8.3-apache

# Instala o tema durante a inicialização do volume oficial do WordPress.
COPY style.css functions.php header.php footer.php front-page.php index.php /usr/src/wordpress/wp-content/themes/dogshop-sinop/
