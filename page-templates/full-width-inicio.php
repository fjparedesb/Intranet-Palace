<?php
/*
* Palace-Theme
* Pantalla completa para inicio de sitios
* Template Name: Pagina Inicio
* @author  jparedes
* @license GPL-2.0+
*/

//* Eliminamos Título de página
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* si hay una imagen destacada se pone como fondo de p�gina
add_action('genesis_after_header', 'imagenfondo');

//* Eliminamos Breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Forzar ancho completo
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* funciones solo para este template
function imagenfondo() {
    $image = genesis_get_image(
        [
            'format'  => 'src',
            'size'    => $instance['image_size'],
            'context' => 'featured-page-widget',
            'attr'    => genesis_parse_attr( 'entry-image-widget', [] ),
        ]
    );

    if ( $image ) {
        printf(
            '<div id="imgfeat" class="section-page" style="background-image: url(..%s); background-attachment:fixed; "></div>',
            wp_make_content_images_responsive($image)
        );
    }
}

genesis();