<?php get_header() ?>
<main id="main" class="site-main" role="main">
    <div class="landing">
        <img class="landing__img" src="wp-content/themes/wordpress-drones/_wordpress-drones/img/drone_landing.png" alt="">
        <h1 class="landing__title"><?php $title = get_the_title(); echo $title; ?></h1>
        <h2 class="landing__subtitle"><?php bloginfo( 'description' ); ?> </h2>
        <a href="#" class="landing__discover btn__discover">Decouvrir</a>
    </div>
    <div class="discover">
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

        <a href="<?php echo get_post_type_archive_link( 'produit' ); ?>" class="section__btn btn__discover">Decouvrir</a>

    </section>

    </section>
    <section class="secondSection homeSection">
        <img src="wp-content/themes/wordpress-drones/_wordpress-drones/img/section2.png" alt="" class="secondSection__img--small">
        <div class="section__text">
            <h2 class="section__title secondSection__title">02</h2>
            <h3 class="section__subTitle">Pars en mission, rien ne peut t’arrêter !</h3>
            <p>La relève du jeu est sous vos yeux !
                Les minidrones se faufilent et s'invitent partout, de la cour de récré jusque dans l'open space.
                Dotés des meilleures technologies, ils vous font enchaîner courses, acrobaties, jets de projectiles...
                <br><br>
                Aucune limite à votre imagination !
            </p>
            <a href="#" class="section__btn btn__discover">Decouvrir</a>

        </div>

        <img src="wp-content/themes/wordpress-drones/_wordpress-drones/img/section2.png" alt="" class="secondSection__img--big">

    </section>
    <section class="thridSection homeSection">
        <img src="wp-content/themes/wordpress-drones/_wordpress-drones/img/section3.png" alt="" class="thirdSection__img">
        <div class="section__text">
            <h2 class="section__title thirdSection__title">03</h2>
            <h3 class="section__subTitle">Des technologies pour les pros</h3>
            <p>Réussir des vidéos de grande qualité avec un drone n'a jamais été aussi simple.
                <br><br>
                Des plans aériens stables et parfaitement exposés, avec un simple smartphone ?
                Avec les drones Parrot, votre créativité suffit, prenez votre envol et saisissez les plus belles images, comme un pro.
            </p>
            <a href="#" class="section__btn btn__discover">Decouvrir</a>
        </div>
    </section>
    <div class="home__video">
        <video src="wp-content/themes/wordpress-drones/_wordpress-drones/video/promotion-vid.mp4" autoplay muted class="video"></video>
    </div>
</main>
<?php get_footer() ?>
