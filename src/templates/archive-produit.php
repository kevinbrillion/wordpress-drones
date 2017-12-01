<?php get_header() ?>
<?php
  $the_query = new WP_Query( array( 'post_type' => 'produit', 'posts_per_page' => -1, 'order_by' => 'DESC' ) );
?>
<main id="main" class="site-main" role="main">
    <div class="productsHeader">
        <h1 class="products__title">Produits</h1>
    </div>
    <div class="filters">

    </div>
    <?php if( $the_query->have_posts() ): ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php $image_1 = get_field('image_1'); ?>
            <section class="productsSection">
              <?php if( !empty($image_1) ): ?><img class="products__img" src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" /><?php endif; ?>
              <div class="products__container">
                <div class="products__left">
                    <h3 class="products__title"><?php echo get_the_title(); ?></h3>
                    <p class="products__description"><?php the_field('description'); ?></p>
                </div>
                <div class="products__right">
                    <span class="products__price"><?php the_field('prix'); ?></span>
                    <a href="<?php the_permalink($post->ID); ?>" class="section__btn btn__discover">Voir</a>
                </div>
              </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
</main>
<?php get_footer() ?>
