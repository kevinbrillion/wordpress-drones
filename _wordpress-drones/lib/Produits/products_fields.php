<?php

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_produits',
        'title' => 'Produits',
        'fields' => array (
            array (
                'key' => 'field_5a08dcf9fc937',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5a08dd12fc938',
                'label' => 'Prix',
                'name' => 'prix',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5a08dd63fc93a',
                'label' => 'Image 1',
                'name' => 'image_1',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_5a08dd7ffc93b',
                'label' => 'Image 2',
                'name' => 'image_2',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_5a08dd28fc939',
                'label' => 'Technique 1',
                'name' => 'tchnique',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5a08ddc4fc93f',
                'label' => 'Technique 2',
                'name' => 'technique_2',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5a08ddd0fc940',
                'label' => 'Technique 3',
                'name' => 'technique_3',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5a08dddbfc941',
                'label' => 'Technique 4',
                'name' => 'technique_4',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'produit',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
