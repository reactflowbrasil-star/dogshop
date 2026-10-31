<?php
/**
 * Main fallback template.
 *
 * @package DogShopSinop
 */
get_header();
?>
<main class="container page-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <?php if ( is_singular() ) : ?><h1><?php the_title(); ?></h1><?php else : ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php endif; ?>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; the_posts_pagination(); else : ?>
        <h1>Bem-vindo à Dog Shop Sinop</h1><p>Estamos preparando novidades para você e seu pet.</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
