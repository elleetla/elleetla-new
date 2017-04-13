<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<!-- header-project-detail -->
	<header id="header-project">

		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-left previous-project">
					<?php previous_post_link( '%link', '<img src="'.get_template_directory_uri().'/images/previous-project.png"/>' ) ?>
				</div>
		
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center close-project">
					<a href="<?php echo esc_url (home_url ()); ?>/realisations"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/close.png"></a>
				</div>
		
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right next-project">
					<?php next_post_link( '%link', '<img src="'.get_template_directory_uri().'/images/next-project.png"/>' ) ?>
				</div>

			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->

	</header>
	<!-- /.header-project-detail -->