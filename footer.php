<?php
/**
 * Footer template.
 *
 * @package DogShopSinop
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<footer class="site-footer" id="contato">
    <div class="container">
        <div class="footer-grid">
            <div><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="brand-mark">🐾</span><span style="color:#fff"><?php echo esc_html( get_bloginfo( 'name' ) ?: 'Dog Shop Sinop' ); ?><small style="color:#d4dfd2">carinho em cada detalhe</small></span></a><p>Um lugar feito para cuidar de quem deixa a vida mais feliz.</p></div>
            <div><div class="footer-title">Visite a loja</div><p><?php echo esc_html( get_theme_mod( 'dogshop_address', 'Sinop, Mato Grosso' ) ); ?><br><?php echo esc_html( get_theme_mod( 'dogshop_hours', 'Segunda a sábado, das 8h às 18h' ) ); ?></p></div>
            <div><div class="footer-title">Vamos conversar?</div><p><?php echo esc_html( get_theme_mod( 'dogshop_phone', '(66) 99999-9999' ) ); ?></p><a href="<?php echo esc_url( dogshop_sinop_whatsapp_url( 'Olá! Vim pelo site da Dog Shop Sinop.' ) ); ?>" target="_blank" rel="noopener">Chame no WhatsApp ↗</a></div>
        </div>
        <div class="copyright"><span>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> Dog Shop Sinop. Todos os direitos reservados.</span><span>Feito com carinho para os pets de Sinop 🐾</span></div>
    </div>
</footer>
<a class="whatsapp-float" href="<?php echo esc_url( dogshop_sinop_whatsapp_url( 'Olá! Vim pelo site da Dog Shop Sinop.' ) ); ?>" target="_blank" rel="noopener" aria-label="Fale com a Dog Shop Sinop pelo WhatsApp">◔</a>
<?php wp_footer(); ?>
</body></html>
