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

<header class="header">
    <a href="<?php  $url = home_url(); echo esc_url( $url ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" class="logoImg"></a>
    <div class="header__left">
        <a href="<?php echo get_post_type_archive_link( 'produit' ); ?>">Produits</a>
        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </div>
</header>
