<?php get_header() ?>
<?php
$the_query = new WP_Query( array( 'post_type' => 'produit' ) );
?>
<main id="main" class="site-main" role="main">
    <div class="productsHeader">
        <img class="products__head" src="<?php bloginfo('template_directory'); ?>/img/products_head.jpg" alt="">
        <h1 class="products__title">Produits</h1>
    </div>
    <div class="filters">
        <div class="category">
            <span class="filter__title">Catégorie :</span>
            <input type="radio"  name="all"> Tout voir
            <input type="radio"  name="drone"> Drones
            <input type="radio"  name="mini-drone"> Minidrones
        </div>
        <span class="filter__title">Trier par : </span>
        <ul>
            <li><a href="#">nouveauté</a></li>
            <li><a href="#">prix croissant</a></li>
            <li><a href="#">pri décroissant</a></li>
        </ul>
    </div>
    <?php if( $the_query->have_posts() ): ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php $image_1 = get_field('image_1'); ?>
            <section class="productsSection">
              <?php if( !empty($image_1) ): ?><img class="products__img" src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" /><?php endif; ?>
              <div class="products__container">
                <div class="products__left">
                    <h3 class="products__title section__subTitle"><?php echo get_the_title(); ?></h3>
                    <p class="products__description"><?php the_field('description'); ?></p>
                </div>
                <div class="products__right">
                    <span class="products__price"><?php the_field('price'); ?></span>
                    <a href="<?php the_permalink($post->ID); ?>" class="section__btn btn__discover">Acheter</a>
                </div>
              </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
</main>
<?php get_footer() ?>
