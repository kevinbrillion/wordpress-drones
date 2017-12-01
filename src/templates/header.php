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
    <a href="<?php  $url = home_url();
                    echo esc_url( $url ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" class="logoImg"></a>
    <nav>
        <div class="menu">
            <div class="line1 line"></div>
            <div class="line2 line"></div>
        </div>
        <div class="nav-link">
            <ul>
                <a href="<?php echo get_post_type_archive_link( 'produit' ); ?>"><li>Produits</li></a>
                <a href="<?php get_permalink( get_page_by_path( 'contact' ) ); ?>"><li>Contact</li></a>
            </ul>
        </div>
    </nav>

</header>
