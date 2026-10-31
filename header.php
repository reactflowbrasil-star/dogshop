<?php
/**
 * Header template.
 *
 * @package DogShopSinop
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="topbar"><?php echo esc_html( get_theme_mod( 'dogshop_announcement', 'Tudo para o seu melhor amigo, pertinho de você 🐾' ) ); ?></div>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
            <span class="brand-mark" aria-hidden="true">🐾</span>
            <span><?php echo esc_html( get_bloginfo( 'name' ) ?: 'Dog Shop Sinop' ); ?><small>carinho em cada detalhe</small></span>
        </a>
        <nav class="nav" aria-label="<?php esc_attr_e( 'Menu principal', 'dogshop-sinop' ); ?>">
            <?php if ( has_nav_menu( 'primary' ) ) { wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'items_wrap' => '%3$s' ) ); } else { ?>
                <a href="<?php echo esc_url( home_url( '/#categorias' ) ); ?>">Categorias</a><a href="<?php echo esc_url( home_url( '/#produtos' ) ); ?>">Produtos</a><a href="<?php echo esc_url( home_url( '/#sobre' ) ); ?>">A loja</a><a href="<?php echo esc_url( home_url( '/#contato' ) ); ?>">Contato</a>
            <?php } ?>
        </nav>
        <a class="button" href="<?php echo esc_url( dogshop_sinop_whatsapp_url( 'Olá! Gostaria de conhecer a Dog Shop Sinop.' ) ); ?>" target="_blank" rel="noopener">Fale conosco <span aria-hidden="true">↗</span></a>
    </div>
</header>
