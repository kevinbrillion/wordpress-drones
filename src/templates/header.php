<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >

<header>
    <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" class="logoImg">
    <nav>
        <div class="menu">
            <div class="line1 line"></div>
            <div class="line2 line"></div>
            <div class="line3 line"></div>
        </div>
        <div class="nav-link">
            <ul>
                <a href=""><li>Produits</li></a>
                <li>Contact</li>
            </ul>
        </div>
    </nav>

</header>
