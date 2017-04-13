<ul id="advanced-shortcode-attr-list" style="float:left;">
	
	<h4><?php _e( 'Advanced Icon Attributes' , 'wp-svg-icons' ); ?></h4>
	<hr style="margin-bottom:1.33em;" />
	
	<section class="wp-svg-advanced-shortcode-attr-row">	
		
		<!-- Icon Size Attr -->
		<li>
			<strong><?php _e( "Icon Size" , "wp-svg-icons" ); ?></strong>
			<label for="icon-size-slider">
				<div class="icon-size-slider"></div> 
				<input type="text" id="icon-size-input" value="48px" />
				<?php _e( "Icon Size" , "wp-svg-icons" ); ?>
			</label>
		</li>
		
		<!-- Class Names Attr -->
		<li class="shortcode-attr-right-column">
			<strong><?php _e( "Class Names" , "wp-svg-icons" ); ?></strong>
			<label for="icon-class-name">
				<input type="text" id="icon-class-names-input" class="widefat" value="" />
				<span class="description"><?php _e( "add additional class names above." , "wp-svg-icons" ); ?></span>
			</label>
		</li>
		
	</section>
							
	<section class="wp-svg-advanced-shortcode-attr-row" style="margin-bottom:1em;">
		
		<!-- Icon Link Attr -->
		<li>
			<strong><?php _e( "Icon Link" , "wp-svg-icons" ); ?></strong>
			<label for="icon-link">
				<input type="text" id="icon-link" class="widefat" placeholder="http://" />
				<span class="description"><?php _e( "open link in new tab" , "wp-svg-icons" ); ?></span>
			</label>
			<input type="checkbox" id="open-icon-link-in-new-tab" value="1" style="margin-top:2px;" />
		</li>
		
		<!-- Custom Icon Color Attr -->
		<li class="shortcode-attr-right-column">
			<strong><?php _e( "Icon Color" , "wp-svg-icons" ); ?></strong>
			<label for="icon-color">
			<input type="text" value="#4C4C4C" class="wp-svg-icons-custom-color-picker" data-default-color="#bada55" />
			<span class="description"><?php _e( "select a custom icon color." , "wp-svg-icons" ); ?></span>
				</label>
		</li>
		
	</section>
							
	<section class="wp-svg-advanced-shortcode-attr-row" style="margin-bottom:1em;">
		<!-- Icon Repeat Attr -->
		<li>
			<strong><?php _e( "Repeat Icon" , "wp-svg-icons" ); ?></strong>
			<label for="icon-repeat">
				<input type="number" min="0" max="999" value="0" class="wp-svg-icons-repeat-icon" /><br />
				<span class="description"><?php _e( "repeat the icon" , "wp-svg-icons" ); ?></span>
				</label>
		</li>
		
		<!-- Icon Rotate Attr -->
		<li class="shortcode-attr-right-column">
			<strong><?php _e( "Rotate Icon" , "wp-svg-icons" ); ?></strong>
			<label for="icon-rotate">
				<input type="number" min="-360" max="360" value="0" class="wp-svg-icons-rotate-icon" /><br />
				<span class="description"><?php _e( "rotate the icon (degrees)" , "wp-svg-icons" ); ?></span>
			</label>
		</li>
	</section>
							
	<section class="wp-svg-advanced-shortcode-attr-row" style="margin-bottom:1em;">

	<!-- Icon Animations Attr -->
	<li>

		<strong><?php _e( "Animate Icon" , "wp-svg-icons" ); ?></strong>

		<select id="animate-icon" class="input input--dropdown js--animations">
			
			<option value="no_animation"><?php _e( 'No Animation' , 'wp-svg-icons' ); ?></option>

			<optgroup label="Attention Seekers">
				<option value="bounce">bounce</option>
				<option value="flash">flash</option>
				<option value="pulse">pulse</option>
				<option value="rubberBand">rubberBand</option>
				<option value="shake">shake</option>
				<option value="swing">swing</option>
				<option value="tada">tada</option>
				<option value="wobble">wobble</option>
			</optgroup>

			<optgroup label="Bouncing Entrances">
				<option value="bounceIn">bounceIn</option>
				<option value="bounceInDown">bounceInDown</option>
				<option value="bounceInLeft">bounceInLeft</option>
				<option value="bounceInRight">bounceInRight</option>
				<option value="bounceInUp">bounceInUp</option>
			</optgroup>

			<optgroup label="Bouncing Exits">
				<option value="bounceOut">bounceOut</option>
				<option value="bounceOutDown">bounceOutDown</option>
				<option value="bounceOutLeft">bounceOutLeft</option>
				<option value="bounceOutRight">bounceOutRight</option>
				<option value="bounceOutUp">bounceOutUp</option>
			</optgroup>

			<optgroup label="Fading Entrances">
				<option value="fadeIn">fadeIn</option>
				<option value="fadeInDown">fadeInDown</option>
				<option value="fadeInDownBig">fadeInDownBig</option>
				<option value="fadeInLeft">fadeInLeft</option>
				<option value="fadeInLeftBig">fadeInLeftBig</option>
				<option value="fadeInRight">fadeInRight</option>
				<option value="fadeInRightBig">fadeInRightBig</option>
				<option value="fadeInUp">fadeInUp</option>
				<option value="fadeInUpBig">fadeInUpBig</option>
			</optgroup>

			<optgroup label="Fading Exits">
				<option value="fadeOut">fadeOut</option>
				<option value="fadeOutDown">fadeOutDown</option>
				<option value="fadeOutDownBig">fadeOutDownBig</option>
				<option value="fadeOutLeft">fadeOutLeft</option>
				<option value="fadeOutLeftBig">fadeOutLeftBig</option>
				<option value="fadeOutRight">fadeOutRight</option>
				<option value="fadeOutRightBig">fadeOutRightBig</option>
				<option value="fadeOutUp">fadeOutUp</option>
				<option value="fadeOutUpBig">fadeOutUpBig</option>
			</optgroup>

			<optgroup label="Flippers">
				<option value="flip">flip</option>
				<option value="flipInX">flipInX</option>
				<option value="flipInY">flipInY</option>
				<option value="flipOutX">flipOutX</option>
				<option value="flipOutY">flipOutY</option>
			</optgroup>

			<optgroup label="Lightspeed">
				<option value="lightSpeedIn">lightSpeedIn</option>
				<option value="lightSpeedOut">lightSpeedOut</option>
			</optgroup>

			<optgroup label="Rotating Entrances">
				<option value="rotateIn">rotateIn</option>
				<option value="rotateInDownLeft">rotateInDownLeft</option>
				<option value="rotateInDownRight">rotateInDownRight</option>
				<option value="rotateInUpLeft">rotateInUpLeft</option>
				<option value="rotateInUpRight">rotateInUpRight</option>
			</optgroup>

			<optgroup label="Rotating Exits">
				<option value="rotateOut">rotateOut</option>
				<option value="rotateOutDownLeft">rotateOutDownLeft</option>
				<option value="rotateOutDownRight">rotateOutDownRight</option>
				<option value="rotateOutUpLeft">rotateOutUpLeft</option>
				<option value="rotateOutUpRight">rotateOutUpRight</option>
			</optgroup>

			<optgroup label="Sliding Entrances">
				<option value="slideInUp">slideInUp</option>
				<option value="slideInDown">slideInDown</option>
				<option value="slideInLeft">slideInLeft</option>
				<option value="slideInRight">slideInRight</option>
			</optgroup>

			<optgroup label="Sliding Exits">
				<option value="slideOutUp">slideOutUp</option>
				<option value="slideOutDown">slideOutDown</option>
				<option value="slideOutLeft">slideOutLeft</option>
				<option value="slideOutRight">slideOutRight</option>
			</optgroup>

			<optgroup label="Zoom Entrances">
				<option value="zoomIn">zoomIn</option>
				<option value="zoomInDown">zoomInDown</option>
				<option value="zoomInLeft">zoomInLeft</option>
				<option value="zoomInRight">zoomInRight</option>
				<option value="zoomInUp">zoomInUp</option>
			</optgroup>

			<optgroup label="Zoom Exits">
				<option value="zoomOut">zoomOut</option>
				<option value="zoomOutDown">zoomOutDown</option>
				<option value="zoomOutLeft">zoomOutLeft</option>
				<option value="zoomOutRight">zoomOutRight</option>
				<option value="zoomOutUp">zoomOutUp</option>
			</optgroup>

			<optgroup label="Specials">
				<option value="hinge">hinge</option>
				<option value="rollIn">rollIn</option>
				<option value="rollOut">rollOut</option>
			</optgroup>
		</select><br />

		<span class="description"><?php _e( "select an animation to add to this icon" , "wp-svg-icons" ); ?></span>
	</li>

	<!-- Icon Rotate Attr -->
	<li class="shortcode-attr-right-column">
		<strong><?php _e( "Animate Event" , "wp-svg-icons" ); ?></strong>
		<label for="animate-icon-on">
			<select id="animate-icon-on">
				<option value="load"><?php _e( 'On Load' , 'wp-svg-icons' ); ?></option>
				<option value="hover"><?php _e( 'On Hover' , 'wp-svg-icons' ); ?></option>
				<option value="click"><?php _e( 'On Click' , 'wp-svg-icons' ); ?></option>
				<option value="scroll"><?php _e( 'On Scroll' , 'wp-svg-icons' ); ?></option>
			</select><br />
			<span class="description"><?php _e( "animate the icon during a specific action" , "wp-svg-icons" ); ?></span>
		</label>
	</li>
	</section>
</ul> <!-- end advanced attr section -->