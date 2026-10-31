<?php
/**
 * Homepage template.
 *
 * @package DogShopSinop
 */
get_header();
?>
<main>
    <section class="hero">
        <div class="container hero-grid">
            <div>
                <span class="eyebrow">🐾 Dog Shop Sinop · Sinop, MT</span>
                <h1>Mais cuidado.<br>Mais carinho.<br><em>Mais rabinhos felizes.</em></h1>
                <p class="hero-copy">Tudo o que seu melhor amigo precisa para viver bem: produtos escolhidos com carinho e atendimento de quem também ama pets.</p>
                <div class="hero-actions">
                    <a class="button" href="#produtos">Descobrir a loja <span aria-hidden="true">↓</span></a>
                    <a class="button button-light" href="<?php echo esc_url( dogshop_sinop_whatsapp_url( 'Olá! Gostaria de uma ajuda para escolher produtos para meu pet.' ) ); ?>" target="_blank" rel="noopener">Tirar dúvidas no WhatsApp ↗</a>
                </div>
                <div class="trust-row"><span>Atendimento próximo</span><span>Seleção com carinho</span><span>Para cães e gatos</span></div>
            </div>
            <div class="hero-art" role="img" aria-label="Ilustração de um cãozinho feliz"><span class="pet-emoji" aria-hidden="true">🐶</span><span class="bubble bubble-one">O melhor do seu dia 🧡</span><span class="bubble bubble-two">Pet feliz, coração feliz!</span></div>
        </div>
    </section>
    <section class="section section-white" id="categorias">
        <div class="container">
            <div class="section-heading"><div><span class="eyebrow">Um mundo de cuidados</span><h2>Encontre o que faz<br>seu pet feliz.</h2></div><p>Do passeio ao momento de descanso, encontre opções para cuidar do seu companheiro em todas as fases.</p></div>
            <?php if ( class_exists( 'WooCommerce' ) ) :
                $terms = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => true, 'number' => 4, 'parent' => 0 ) );
                if ( ! is_wp_error( $terms ) && $terms ) : ?>
                    <div class="category-grid">
                        <?php $icons = array( '🐕', '🥣', '🧸', '🧼' ); foreach ( $terms as $i => $term ) : ?>
                            <a class="category-card" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><span class="category-icon"><?php echo esc_html( $icons[ $i % 4 ] ); ?></span><h3><?php echo esc_html( $term->name ); ?></h3><p><?php echo esc_html( $term->count ); ?> opções para seu pet</p></a>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="category-grid">
                        <div class="category-card"><span class="category-icon">🥣</span><h3>Alimentação</h3><p>Nutrição para cada fase.</p></div><div class="category-card"><span class="category-icon">🧸</span><h3>Brinquedos</h3><p>Diversão e estímulo todos os dias.</p></div><div class="category-card"><span class="category-icon">🦮</span><h3>Passeio</h3><p>Mais conforto para explorar.</p></div><div class="category-card"><span class="category-icon">🧼</span><h3>Higiene e cuidado</h3><p>Bem-estar da cabeça às patinhas.</p></div>
                    </div>
                <?php endif; else : ?>
                <div class="category-grid">
                    <div class="category-card"><span class="category-icon">🥣</span><h3>Alimentação</h3><p>Nutrição para cada fase.</p></div><div class="category-card"><span class="category-icon">🧸</span><h3>Brinquedos</h3><p>Diversão e estímulo todos os dias.</p></div><div class="category-card"><span class="category-icon">🦮</span><h3>Passeio</h3><p>Mais conforto para explorar.</p></div><div class="category-card"><span class="category-icon">🧼</span><h3>Higiene e cuidado</h3><p>Bem-estar da cabeça às patinhas.</p></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="section" id="produtos">
        <div class="container">
            <div class="section-heading"><div><span class="eyebrow">Escolhidos com carinho</span><h2>Queridinhos da loja</h2></div><p>Produtos de qualidade para deixar a rotina do seu melhor amigo ainda mais gostosa.</p></div>
            <?php if ( class_exists( 'WooCommerce' ) ) :
                $products = wc_get_products( array( 'status' => 'publish', 'limit' => 4, 'orderby' => 'date', 'order' => 'DESC' ) );
                if ( $products ) : ?><div class="product-grid"><?php foreach ( $products as $product ) { dogshop_sinop_product_card( $product ); } ?></div><?php else : ?><div class="shop-empty">Em breve, novidades por aqui! Enquanto isso, fale com a gente e conte o que seu pet precisa.<br><br><a class="button" href="<?php echo esc_url( dogshop_sinop_whatsapp_url() ); ?>" target="_blank" rel="noopener">Perguntar pelo WhatsApp ↗</a></div><?php endif; ?>
            <?php else : ?>
                <div class="shop-empty">Nosso catálogo está sendo preparado com muito carinho. Fale com a gente para encontrar o produto ideal para seu pet.<br><br><a class="button" href="<?php echo esc_url( dogshop_sinop_whatsapp_url() ); ?>" target="_blank" rel="noopener">Consultar produtos pelo WhatsApp ↗</a></div>
            <?php endif; ?>
        </div>
    </section>
    <section class="section section-white" id="sobre">
        <div class="container about-grid">
            <div class="about-card"><span><span class="big-paw">🐾</span><br><strong>Amor que cabe em cada detalhe.</strong></span></div>
            <div class="about-copy"><span class="eyebrow">A loja que entende esse amor</span><h2>Seu pet é da família.<br>Pra gente também.</h2><p>A Dog Shop Sinop nasceu para facilitar o cuidado com quem enche sua casa de alegria. Aqui você encontra atenção de verdade, boas escolhas e um time pronto para ajudar.</p><div class="benefits"><div class="benefit"><strong>Atendimento de perto</strong><span>Ajuda para escolher o que combina com seu pet.</span></div><div class="benefit"><strong>Boas escolhas</strong><span>Produtos pensados para o bem-estar animal.</span></div><div class="benefit"><strong>Carinho sempre</strong><span>Um cuidado acolhedor em cada visita.</span></div></div></div>
        </div>
    </section>
    <section class="section"><div class="container"><div class="contact-band"><div><h2>Seu melhor amigo merece esse carinho.</h2><p>Fale com a Dog Shop Sinop e encontre o que ele precisa.</p></div><a class="button button-light" href="<?php echo esc_url( dogshop_sinop_whatsapp_url( 'Olá! Gostaria de falar com a Dog Shop Sinop.' ) ); ?>" target="_blank" rel="noopener">Conversar agora ↗</a></div></div></section>
</main>
<?php get_footer(); ?>
