<?php get_header() ?>
<?php
global $wp;
$url = home_url( $wp->request );
$id = bwp_url_to_postid($url);
$args = array(
  'p'         => $id,
  'post_type' => 'any'
);
$the_query = new WP_Query($args);
?>
<?php if( $the_query->have_posts() ): ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php $image_1 = get_field('image_1'); ?>
        <main id="main" class="site-main" role="main">
            <div class="productHeader">
                <img class="products__img" src="<?php bloginfo('template_directory'); ?>/img/drone_product.jpg" alt="">
            </div>
            <section class="productSection">
                <div class="presentation__product">
                    <div class="title">
                        <h3 class="products__title"><?php echo get_the_title(); ?></h3>
                        <p class="product__type"><?php echo get_the_terms(); ?></p>
                        <h4 class="product__descriptionTitle">Description</h4>
                        <p class="product__description"><?php the_field('description'); ?></p>
                    </div>
                    <?php if( !empty($image_1) ): ?><img class="products__img" src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" /><?php endif; ?>
                </div>
                <div class="product__right">
                    <span class="products__price"><?php the_field('prix'); ?></span>
                    <a href="#" class="section__btn btn__discover">Acheter</a>
                </div>
            </section>
            <section class="homeSection">
                <h4 class="cross-selling__title">Test</h4>
                <div class="cross-selling">
                    <img class="cross-selling__img" src="" alt="">
                    <h5 class="cross-selling__title">Test</h5>
                </div>
            </section>
        </main>
    <?php endwhile; ?>
  <?php endif; ?>
<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
<?php get_footer() ?>
