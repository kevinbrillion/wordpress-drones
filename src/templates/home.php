<?php get_header() ?>
<main id="main" class="site-main" role="main">
    <div class="landing">
        <img src="img.png" alt="">
        <h1 class="landing__title"><?php $title = get_the_title(); echo $title; ?></h1>
        <h2 class="landing__subtitle"><?php bloginfo( 'description' ); ?> </h2>
    </div>
</main>
<?php get_footer() ?>
