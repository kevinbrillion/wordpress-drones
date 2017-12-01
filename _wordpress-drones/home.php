<?php get_header() ?>

<?php
$the_query = new WP_Query( array(
    'pagename' => 'home' ) );
?>

<?php if( $the_query->have_posts() ): ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <? // get images and video
        $image_landing = get_field('image_landing');
        $section_1_img = get_field('section_1_-_img');
        $section_2_img = get_field('section_2_-_img');
        $section_3_img = get_field('section_3_-_img');
        $video = get_field('video_home');
        ?>
        <main id="main" class="site-main" role="main">
            <div class="landing">
                <?php if( !empty($image_landing) ): ?><img class="landing__img" src="<?php echo $image_landing['url']; ?>" alt="<?php echo $image_landing['alt']; ?>" /><?php endif; ?>
                <img class="landing__img" src="<?php the_field('image_landing') ?>" alt="">
                <h1 class="landing__title"><?= the_field('titre') ?></h1>
                <h2 class="landing__subtitle"><?php the_field('sous_titre') ?> </h2>
                <a href="<?php echo get_post_type_archive_link( 'produit' ); ?>" class="landing__discover btn__discover">Decouvrir</a>
            </div>
            <div class="discover">
                <div class="discover__imgContainer">
                    <?php if( !empty($section_1_img) ): ?><img class="discover__img" src="<?php echo $section_1_img['url']; ?>" alt="<?php echo $section_1_img['alt']; ?>" /><?php endif; ?>
                </div>
            </div>
            <section class="firstSection homeSection">
                <h2 class="section__title">01</h2>
                <h3 class="section__subTitle"><?php the_field('section_1_-_titre') ?></h3>
                <p>
                    <?php the_field('section_1_-_content') ?>
                </p>

                <a href="<?php echo get_post_type_archive_link( 'produit' ); ?>" class="section__btn btn__discover">Decouvrir</a>

            </section>

            <section class="secondSection homeSection">
                <?php if( !empty($section_2_img) ): ?><img class="secondSection__img--small" src="<?php echo $section_2_img['url']; ?>" alt="<?php echo $section_2_img['alt']; ?>" /><?php endif; ?>
                <div class="section__text">
                    <h2 class="section__title secondSection__title">02</h2>
                    <h3 class="section__subTitle"> <?php the_field('section_2_-_titre') ?></h3>
                    <p>
                        <?php the_field('section_2_-_content') ?>
                    </p>
                    <a href="#" class="section__btn btn__discover">Decouvrir</a>

                </div>
                <?php if( !empty($section_2_img) ): ?><img class="secondSection__img--big" src="<?php echo $section_2_img['url']; ?>" alt="<?php echo $section_2_img['alt']; ?>" /><?php endif; ?>
            </section>

            <section class="thridSection homeSection">
                <?php if( !empty($section_2_img) ): ?><img class="thirdSection__img" src="<?php echo $section_2_img['url']; ?>" alt="<?php echo $section_2_img['alt']; ?>" /><?php endif; ?>
                <div class="section__text">
                    <h2 class="section__title thirdSection__title">03</h2>
                    <h3 class="section__subTitle"><?php the_field('section_3_-_titre') ?></h3>
                    <p>
                        <?php the_field('section_3_-_content') ?>
                    </p>
                    <a href="#" class="section__btn btn__discover">Decouvrir</a>
                </div>
            </section>
            <div class="home__video">
                <video src="<?php echo $video['url']; ?>" autoplay muted class="video" alt="<?php echo $video['alt']; ?>"></video>
            </div>
        </main>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer() ?>
