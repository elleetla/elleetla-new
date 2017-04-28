<?php
/**
* Creates a sidebar
* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
*/

function widget_ohouais(){
    // footer
    $args = array(
        'name'          => __( 'Footer principal', 'theme_text_domain' ),
        'id'            => 'sidebar-footer',
        'description'   => 'Cette sidebar permet d\'étiter le footer principal du site',
        'class'         => '',
        'before_widget' => '<li id="mentions-footer" class="widget">',
        'after_widget'  => '</li>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>'
    );
    register_sidebar( $args );

    //slidehome
    $args = array(
        'name'          => __( 'Slide home header', 'theme_text_domain' ),
        'id'            => 'slidehome',
        'description'   => 'Cette sidebar permet d\'étiter le slide de la page d\'accueil du site',
        'class'         => '',
        'before_widget' => '<div id="slide-home" class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>'
    );
    register_sidebar( $args );

    //contactinfos
    $args = array(
        'name'          => __( 'Information de contact', 'theme_text_domain' ),
        'id'            => 'contactinfos',
        'description'   => 'Cette sidebar permet d\'étiter la partie contact déroulante du site',
        'class'         => '',
        'before_widget' => '<div id="detail-contact-listing">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>'
    );
    register_sidebar( $args );

}

add_action('widgets_init','widget_ohouais');