<?php
echo $_GET['q'];
$args = array(
    'post_type' => 'produit',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $_GET['q'],
        ),
    ),
);

$query = new WP_Query( $args );

?>

<div> TEST </div>
