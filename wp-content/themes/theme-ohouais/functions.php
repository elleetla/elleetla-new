<?php

the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
the_post_thumbnail('full');            // Original image resolution (unmodified)
add_image_size( 'featured-image-large', 600, 600, true );

// importation
require_once locate_template('/functions/enqueues.php');

require_once locate_template('/functions/wp_bootstrap_navwalker.php');

require_once locate_template('/functions/menus.php');

require_once locate_template('/functions/widget.php');

//require_once locate_template('/functions/img-responsive.php');

require_once locate_template('/functions/fl-socials.php');

// entete personnalisé

$args = array(
	'flex-width'    => true,
	'width'         => 200,
	'flex-height'    => true,
	'height'        => 150,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $args );

add_theme_support( 'title-tag' );

add_theme_support( 'automatic-feed-links' )

?>