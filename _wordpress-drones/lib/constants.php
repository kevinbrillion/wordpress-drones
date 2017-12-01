<?php

define( 'THEMEURI', get_template_directory_uri() );

$wnm_custom = array( 'template_url' => get_bloginfo('template_url') );
wp_localize_script( 'main', 'site', $wnm_custom );

?>
