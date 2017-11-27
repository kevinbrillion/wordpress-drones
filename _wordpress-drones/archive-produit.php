<?php get_header() ?>
<main id="main" class="site-main" role="main">
  <div class="productsHeader">
    <img class="products__img" src="wp-content/themes/wordpress-drones/_wordpress-drones/img/products_head.jpg" alt="">
    <h1 class="products__title">test<?php $title = get_the_title(); echo $title; ?></h1>
    <div class="filters">
      <div class="category">
        <input type="radio"  name="all" checked> Tout voir
        <input type="radio"  name="category"> Drones
        <input type="radio"  name="category"> Minidrones
      </div>
      <span>Trier pars : </span>
      <ul>
        <li><a href="#">nouveauté</a></li>
        <li><a href="#">prix croissant</a></li>
        <li><a href="#">pri décroissant</a></li>
      </ul>
    </div>
    <span>Catégorie :</span>

  </div>
  <section class="firstSection productsSection">
    <img class="products__img" src="" alt="">
    <div class="products__left">
      <h3 class="products__title">Test</h3>
      <p class="products__description">Quel rêve plus beau que celui de voler ?
        Avec votre pack FPV, offrez-vous une toute nouvelle dimension de liberté.
        Fendez les airs à toute vitesse ou partez à l'aventure explorer vos alentours.
      </p>
    </div>
    <div class="products__right">
      <span class="products__price"></span>
      <a href="#" class="section__btn btn__discover">Acheter</a>
    </div>
  </section>
</main>
<?php get_footer() ?>
