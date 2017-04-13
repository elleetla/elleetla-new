<?php 

	function theme_ohouais_scripts() {

		/* css */
		wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css');

		wp_enqueue_style( 'fakeloadercss', get_template_directory_uri() . '/css/font-awesome.min.css');

		wp_enqueue_style( 'fancyboxcss', get_template_directory_uri() . '/css/jquery.fancybox.css');

		wp_enqueue_style( 'owlcarouselcss', get_template_directory_uri() . '/css/owl.carousel.css');

		wp_enqueue_style( 'owltransitioncss', get_template_directory_uri() . '/css/owl.transitions.css');

		wp_enqueue_style( 'templatecss', get_template_directory_uri() . '/css/template.css');

		/* js */

		wp_deregister_script('jquery' );

    	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jQuery-1-12-2.min.js');

		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, false);

		wp_enqueue_script( 'masonryjs', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), false, false);

		wp_enqueue_script( 'isotopejs', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), false, false);

		wp_enqueue_script( 'fancyboxjs', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), false, false);

		wp_enqueue_script( 'owlcarouseljs', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), false, false);

		wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), false, false);
	}

	add_action( 'wp_enqueue_scripts', 'theme_ohouais_scripts' );


 ?>