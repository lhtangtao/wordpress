<div class="home-header-wrap">

<?php

	global $wp_customize;

	$zerif_parallax_img1 = get_theme_mod('zerif_parallax_img1',get_template_directory_uri() . '/images/background1.jpg');
	$zerif_parallax_img2 = get_theme_mod('zerif_parallax_img2',get_template_directory_uri() . '/images/background2.png');
	$zerif_parallax_use = get_theme_mod('zerif_parallax_show');

	if ( $zerif_parallax_use == 1 && (!empty($zerif_parallax_img1) || !empty($zerif_parallax_img2)) ) {
		echo '<ul id="parallax_move">';
	
			if( !empty($zerif_parallax_img1) ) { 
				echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . $zerif_parallax_img1 . ');"></li>';
			}
			if( !empty($zerif_parallax_img2) ) { 
				echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . $zerif_parallax_img2 . ');"></li>';
			}

		echo '</ul>';
	
	}

	$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');
	
	if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):
	
		echo '<div class="header-content-wrap">';
	
	elseif ( isset( $wp_customize ) ):
	
		echo '<div class="header-content-wrap zerif_hidden_if_not_customizer">';
	
	endif;

	if( (isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1) || isset( $wp_customize ) ):

		echo '<div class="container big-title-container">';
		
		 $rb_bigtitle_logo = get_theme_mod('rb_bigtitle_logo',get_stylesheet_directory_uri().'/images/logo-small.png');

        if( !empty($rb_bigtitle_logo) ):

             echo '<a href="'.esc_url( home_url( '/' ) ).'" class="">';

                echo '<img src="'.esc_url( $rb_bigtitle_logo ).'" alt="'.get_bloginfo('title').'" class="rb_logo">';

             echo '</a>';

        endif;

		/* Big title */
		$responsiveboat_parent_theme = get_template();
	
		if( !empty($responsiveboat_parent_theme) && ($responsiveboat_parent_theme == 'zerif-pro') ):
		
			$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title', __('To add a title here please go to Customizer, "Big title section"','responsiveboat') );
		
		else:
		
			$zerif_bigtitle_title = get_theme_mod('zerif_bigtitle_title',__('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','responsiveboat'));
		
		endif;
		
		if( !empty($zerif_bigtitle_title) ):

			echo '<h1 class="intro-text">'.$zerif_bigtitle_title.'</h1>';
			
		elseif ( isset( $wp_customize ) ):
		
			echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';

		endif;	

		/* Buttons */
		
		if( !empty($responsiveboat_parent_theme) && ($responsiveboat_parent_theme == 'zerif-pro') ):
			$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label',__('One button','responsiveboat') );
			$zerif_bigtitle_redbutton_url = get_theme_mod( 'zerif_bigtitle_redbutton_url','#' );

			$zerif_bigtitle_greenbutton_label = get_theme_mod( 'zerif_bigtitle_greenbutton_label',__('Another button','responsiveboat') );
			$zerif_bigtitle_greenbutton_url = get_theme_mod( 'zerif_bigtitle_greenbutton_url','#' );
		else:
			$zerif_bigtitle_redbutton_label = get_theme_mod('zerif_bigtitle_redbutton_label',__('Features','responsiveboat'));
			$zerif_bigtitle_redbutton_url = get_theme_mod('zerif_bigtitle_redbutton_url', esc_url( home_url( '/' ) ).'#focus');
			
			$zerif_bigtitle_greenbutton_label = get_theme_mod('zerif_bigtitle_greenbutton_label',__("What's inside",'responsiveboat'));
			$zerif_bigtitle_greenbutton_url = get_theme_mod('zerif_bigtitle_greenbutton_url',esc_url( home_url( '/' ) ).'#focus');
		endif;

		if( (!empty($zerif_bigtitle_redbutton_label) && !empty($zerif_bigtitle_redbutton_url)) ||

		(!empty($zerif_bigtitle_greenbutton_label) && !empty($zerif_bigtitle_greenbutton_url))):


			echo '<div class="buttons">';
				if( function_exists('zerif_big_title_buttons_top_trigger') ):
					zerif_big_title_buttons_top_trigger();
				endif;	

				/* Red button */
			
				if (!empty($zerif_bigtitle_redbutton_label) && !empty($zerif_bigtitle_redbutton_url)):

					echo '<a href="'.$zerif_bigtitle_redbutton_url.'" class="btn btn-primary custom-button red-btn">'.$zerif_bigtitle_redbutton_label.'</a>';
					
				elseif ( isset( $wp_customize ) ):

					echo '<a href="" class="btn btn-primary custom-button red-btn zerif_hidden_if_not_customizer"></a>';

				endif;

				/* Green button */

				if (!empty($zerif_bigtitle_greenbutton_label) && !empty($zerif_bigtitle_greenbutton_url)):

					echo '<a href="'.$zerif_bigtitle_greenbutton_url.'" class="btn btn-primary custom-button green-btn">'.$zerif_bigtitle_greenbutton_label.'</a>';

				elseif ( isset( $wp_customize ) ):

					echo '<a href="" class="btn btn-primary custom-button green-btn zerif_hidden_if_not_customizer"></a>';

				endif;

				if( function_exists('zerif_big_title_buttons_bottom_trigger') ):
					zerif_big_title_buttons_bottom_trigger();
				endif;

			echo '</div>';


		endif;

		echo '</div>';

	echo '</div><!-- .header-content-wrap -->';
	
	endif;

	echo '<div class="clear"></div>';


?>

</div><!--.home-header-wrap -->