<?php get_header() ?>
<main id="main" class="site-main" role="main">
    <div class="landing">
        <img class="landing__img" src="wp-content/themes/wordpress-drones/_wordpress-drones/img/drone_landing.png" alt="">
        <h1 class="landing__title"><?php $title = get_the_title(); echo $title; ?></h1>
        <h2 class="landing__subtitle"><?php bloginfo( 'description' ); ?> </h2>
    </div>
    <div class="discover">
        <a href="#" class="discover__discover btn__discover">Decouvrir</a>
        <div class="discover__imgContainer">
            <img src="wp-content/themes/wordpress-drones/_wordpress-drones/img/discover.png" alt="" class="discover__img">
        </div>
    </div>
    <section class="firstSection homeSection">
        <h2 class="section__title">01</h2>
        <h3 class="section__subTitle">Découvrez une expérience de vol immersive</h3>
        <p>Quel rêve plus beau que celui de voler ?
            Avec votre pack FPV, offrez-vous une toute nouvelle dimension de liberté.
            Fendez les airs à toute vitesse ou partez à l'aventure explorer vos alentours.
            <br><br>
            En immersion, le monde est à vous. Découvrez le depuis un nouveau point de vue : le ciel.
        </p>

        <a href="#" class="section__btn btn__discover">Decouvrir</a>

    </section>
    <section class="secondSection homeSection">
        <img src="wp-content/themes/wordpress-drones/_wordpress-drones/img/section2.png" alt="" class="secondSection__img">
        <h2 class="section__title secondSection__title">02</h2>
        <h3 class="section__subTitle">Des technologies pour les pros</h3>
        <p>Réussir des vidéos de grande qualité avec un drone n'a jamais été aussi simple.
            <br><br>
            Des plans aériens stables et parfaitement exposés, avec un simple smartphone ?
            Avec les drones Parrot, votre créativité suffit, prenez votre envol et saisissez les plus belles images, comme un pro.
        </p>

        <a href="#" class="section__btn btn__discover">Decouvrir</a>
    </section>
    <div class="home__video">
        <video src="wp-content/themes/wordpress-drones/_wordpress-drones/video/promotion-vid.mp4" autoplay muted class="video"></video>
    </div>
</main>
<?php get_footer() ?>
