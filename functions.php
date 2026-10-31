<?php
/**
 * Dog Shop Sinop theme functions.
 *
 * @package DogShopSinop
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function dogshop_sinop_setup() {
    load_theme_textdomain( 'dogshop-sinop', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array( 'height' => 120, 'width' => 300, 'flex-height' => true, 'flex-width' => true ) );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'woocommerce' );
    register_nav_menus( array( 'primary' => __( 'Menu principal', 'dogshop-sinop' ) ) );
}
add_action( 'after_setup_theme', 'dogshop_sinop_setup' );

function dogshop_sinop_assets() {
    wp_enqueue_style( 'dogshop-sinop-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'dogshop_sinop_assets' );

function dogshop_sinop_customize( $wp_customize ) {
    $wp_customize->add_section( 'dogshop_store', array(
        'title' => __( 'Dados da loja', 'dogshop-sinop' ),
        'priority' => 30,
    ) );
    $fields = array(
        'dogshop_whatsapp' => array( 'WhatsApp (com código do país)', '5566999999999' ),
        'dogshop_phone' => array( 'Telefone', '(66) 99999-9999' ),
        'dogshop_address' => array( 'Endereço', 'Sinop, Mato Grosso' ),
        'dogshop_hours' => array( 'Horário de atendimento', 'Segunda a sábado, das 8h às 18h' ),
        'dogshop_announcement' => array( 'Faixa do topo', 'Tudo para o seu melhor amigo, pertinho de você 🐾' ),
    );
    foreach ( $fields as $id => $settings ) {
        $wp_customize->add_setting( $id, array( 'default' => $settings[1], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( $id, array( 'label' => $settings[0], 'section' => 'dogshop_store', 'type' => 'text' ) );
    }
}
add_action( 'customize_register', 'dogshop_sinop_customize' );

function dogshop_sinop_whatsapp_url( $message = '' ) {
    $number = preg_replace( '/\D+/', '', get_theme_mod( 'dogshop_whatsapp', '5566999999999' ) );
    return 'https://wa.me/' . $number . ( $message ? '?text=' . rawurlencode( $message ) : '' );
}

function dogshop_sinop_product_card( $product ) {
    if ( ! $product instanceof WC_Product ) { return; }
    ?>
    <article class="product-card">
        <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
            <?php if ( has_post_thumbnail( $product->get_id() ) ) { echo get_the_post_thumbnail( $product->get_id(), 'woocommerce_thumbnail' ); } else { ?><div class="product-placeholder" aria-hidden="true">🐾</div><?php } ?>
            <h3><?php echo esc_html( $product->get_name() ); ?></h3>
        </a>
        <div class="price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
        <a class="button" href="<?php echo esc_url( dogshop_sinop_whatsapp_url( 'Olá! Tenho interesse no produto ' . $product->get_name() . '.' ) ); ?>" target="_blank" rel="noopener">Consultar pelo WhatsApp</a>
    </article>
    <?php
}
