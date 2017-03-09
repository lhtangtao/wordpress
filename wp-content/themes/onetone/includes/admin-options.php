<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
  if( !function_exists('optionsframework_option_name') ):
  function optionsframework_option_name() {
  
	  $themename = get_option( 'stylesheet' );
	  $themename = preg_replace("/\W/", "_", strtolower($themename) );
  
	  if( is_child_theme() ){	
		  $themename = str_replace("_child","",$themename ) ;
		  }
	  $themename_lan = $themename;
	  
	  if( defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE != 'en' )
	      $themename_lan = $themename.'_'.ICL_LANGUAGE_CODE;
	  
	  if(function_exists('pll_current_language')){
		  $default_lan = pll_default_language('slug');
		  $current_lan = pll_current_language('slug');
		  
		  if($current_lan !='')
		    $themename_lan = $themename.'_'.$current_lan;
		  }
	  return $themename_lan;
  }
  endif;
 
  global $social_icons;
  $social_icons = array(
	  array('title'=>'Facebook','icon' => 'facebook', 'link'=>'#'),
	  array ('title'=>'Twitter','icon' => 'twitter', 'link'=>'#'), 
	  array('title'=>'LinkedIn','icon' => 'linkedin', 'link'=>'#'),
	  array  ('title'=>'YouTube','icon' => 'youtube', 'link'=>'#'),
	  array('title'=>'Skype','icon' => 'skype', 'link'=>'#'),
	  array ('title'=>'Pinterest','icon' => 'pinterest', 'link'=>'#'),
	  array('title'=>'Google+','icon' => 'google-plus', 'link'=>'#'),
	  array('title'=>'Email','icon' => 'envelope', 'link'=>'#'),
	  array ('title'=>'RSS','icon' => 'rss', 'link'=>'#')
  );

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

if( !function_exists('optionsframework_options') ):
function optionsframework_options() {
	
     global $social_icons,$sidebars,$onetone_home_sections,$onetone_options_saved;
	 
	$os_fonts           = onetone_options_typography_get_os_fonts();
    $os_fonts           = array_merge(array('' => __( '-- Default --', 'onetone' ) ), $os_fonts);
	$font_color         = array('color' =>  '');
	$section_font_color = array('color' => '');
 
    $section_title_typography_defaults_1 = array(
		'size'  => '36px',
		'face'  => '',
		'style' => '700',
		'color' => '#666666' );
		
		$section_subtitle_typography_defaults_1 = array(
		'size'  => '14px',
		'face'  => '',
		'style' => '400',
		'color' => '#666666' );
		
		$section_content_typography_defaults_1 = array(
		'size'  => '14px',
		'face'  => '',
		'style' => '400',
		'color' => '#666666' );
		
		$typography_options = array(
		'sizes'  => array( '10','11','12','13','14','16','18','20','24','26','28','30','35','36','38','40','46','48','50','60','64' ),
		'faces'  => $os_fonts,
		'styles' => array(
				  'normal' =>  'Normal',
				  'italic' => 'Italic', 
				  'bold' => 'Bold',
				  'bold italic' => 'Bold Italic',
				  '100' => '100', 
				  '200' =>  '200',
				  '300' => '300',
				  '400' => '400', 
				  '500' =>  '500', 
				  '600' =>  '600', 
				  '700' =>  '700', 
				  '800' =>  '800',
				  '900' =>  '900' 
				  ),
		
		'color'  => true );
    
	$choices =  array( 
          
            'yes'   => __( 'Yes', 'onetone' ),
            'no' => __( 'No', 'onetone' )
 
        );
	$choices2 =  array( 
          
            '1'   => __( 'Yes', 'onetone' ),
            '0' => __( 'No', 'onetone' )
        );
	
    $choices_reverse =  array( 
          
           'no'=> __( 'No', 'onetone' ),
            'yes' => __( 'Yes', 'onetone' )
        );
	
	$align =  array( 
          '' => __( 'Default', 'onetone' ),
          'left' => __( 'Left', 'onetone' ),
          'right' => __( 'Right', 'onetone' ),
           'center'  => __( 'Center', 'onetone' )         
        );
	
	$repeat = array( 
			
			'repeat' => __( 'Repeat', 'onetone' ),
			'repeat-x'  => __( 'Repeat X', 'onetone' ),
			'repeat-y' => __( 'Repeat Y', 'onetone' ),
			'no-repeat'  => __( 'No Repeat', 'onetone' )
			
		  );
	
	$target = array(
			'_blank' => __( 'Blank', 'onetone' ),
			'_self' => __( 'Self', 'onetone' )
			);
	
	$position =  array( 
			
		   'top left' => __( 'Top Left', 'onetone' ),
			'top center' => __( 'Top Center', 'onetone' ),
			'top right' => __( 'Top Right', 'onetone' ),
			 'center left' => __( 'Center Left', 'onetone' ),
			 'center center'  => __( 'Center Center', 'onetone' ),
			 'center right' => __( 'Center Right', 'onetone' ),
			 'bottom left'  => __( 'Bottom Left', 'onetone' ),
			 'bottom center'  => __( 'Bottom Center', 'onetone' ),
			 'bottom right' => __( 'Bottom Right', 'onetone' )
			  
		  );
  
    $opacity             =  array_combine(range(0.1,1,0.1), range(0.1,1,0.1));
    $font_size           =  array_combine(range(1,100,1), range(1,100,1));
	$section_title       = array("POWERFUL ONE PAGE THEME","","","GALLERY","OUR TEAM","ABOUT","","","CONTACT","","","","","");
	$section_color       = array("#ffffff","#555555","#555555","#555555","#555555","#666666","#ffffff","#555555","#555555");
	$section_subtitle    = array(
								 "BASED ON BOOTSTRAP FRAMEWORK AND SHORTCODES, QUICK SET AND EASY BUILD,
SHINES ONE PAGE SMALL BUSINESS WEBSITE.",
								 "",
								 "",
								 "Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere c.<br/>Etiam ut dui eu nisi lobortis rhoncus ac quis nunc.",
								 "Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere c.<br/>Etiam ut dui eu nisi lobortis rhoncus ac quis nunc.",
								 "Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere c.<br/>Etiam ut dui eu nisi lobortis rhoncus ac quis nunc.",
								 "",
								 "",
								 "Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere c.<br/>Etiam ut dui eu nisi lobortis rhoncus ac quis nunc.");
		
	$section_menu        = array("Home","","Services","Gallery","Team","About","Testimonials","","Contact");
	$section_slug        = array('home','','services','gallery','team','about','testimonials','','contact');
	$section_padding     = array('','30px 0','50px 0','50px 0','50px 0','50px 0','50px 0 30px','50px 0','50px 0');
	$text_align          = array('center','left','center','center','center','left','center','left','center');
	
	if( $onetone_options_saved )
	  $content_model = '1';
	else
	  $content_model = '0';
	

	
	$default_section_num = count($section_menu);
	$section_background  = array(
	     array(
		'color' => '#333333',
		'image' => ONETONE_THEME_BASE_URL.'/images/home-bg01.jpg',
		'repeat' => 'repeat',
		'position' => 'center center',
		'attachment'=>'scroll' ),
		 
		 array(
		'color' => '#eeeeee',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' ),
		 
		 array(
		'color' => '#ffffff',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' ),
		 
		 array(
		'color' => '#eeeeee',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' ),
		 ##  section 5
		 array(
		'color' => '#ffffff',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' ),
		 
		 array(
		'color' => '',
		'image' => esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/Image_02.png'),
		'repeat' => 'repeat',
		'position' => 'center center',
		'attachment'=>'fixed' ),
		 
		 array(
		'color' => '#37cadd',
		'image' => '',
		'repeat' => 'no-repeat',
		'position' => 'bottom center',
		'attachment'=>'scroll' ),
		 
		 array(
		'color' => '#ffffff',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' ),
		 
		array(
		'color' => '',
		'image' => esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/16110810_1.jpg'),
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' )
			);
	
	$section_css_class = array("section-banner","","","","","","","","");
	
	$section_title_typography_defaults = array(
      array('size'  => '64px','face'  => '','style' => '400','color' => '#ffffff' ),
	  array('size'  => '48px','face'  => '','style' => 'normal','color' => '#666666' ),
	  array('size'  => '48px','face'  => '','style' => 'normal','color' => '#666666' ),
	  array('size'  => '36px','face'  => '','style' => 'bold','color' => '#666666' ),
	  array('size'  => '36px','face'  => '','style' => 'bold','color' => '#666666' ),
	  array('size'  => '36px','face'  => '','style' => 'bold','color' => '#666666' ),
	  array('size'  => '36px','face'  => '','style' => 'bold','color' => '#ffffff' ),
	  array('size'  => '36px','face'  => '','style' => 'bold','color' => '#666666' ),
	  array('size'  => '36px','face'  => '','style' => 'bold','color' => '#666666' ),
											   
      );
	  
	$section_subtitle_typography_defaults = array(
		  array('size'  => '18px','face'  => '','style' => 'normal','color' => '#ffffff' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#555555' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#555555' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#555555' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#555555' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#666666' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#ffffff' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#555555' ),
		  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#555555' ),								   
      );
	  
	$section_content_typography_defaults = array(
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#ffffff' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#666666' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#ffffff' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#555555' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '#ffffff' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '' ),
	  array('size'  => '14px','face'  => '','style' => 'normal','color' => '' ),
												 
	  );
	
	 $home_sections = array(
	   1 => __('Section 1 - Banner', 'onetone' ),
	   2 => __('Section 2 - Slogan', 'onetone' ),
	   3 => __('Section 3 - Service', 'onetone' ),
	   4 => __('Section 4 - Gallery', 'onetone' ),
	   5 => __('Section 5 - Team', 'onetone' ),
	   6 => __('Section 6 - About', 'onetone' ),
	   7 => __('Section 7 - Counter', 'onetone' ),
	   8 => __('Section 8 - Testimonial', 'onetone' ),
	   9 => __('Section 9 - Contact', 'onetone' ),
	   10 => sprintf(__('Section %s', 'onetone'),10),
	   11 => sprintf(__('Section %s', 'onetone'),11),
	   12 => sprintf(__('Section %s', 'onetone'),12),
	   13 => sprintf(__('Section %s', 'onetone'),13),
	   14 => sprintf(__('Section %s', 'onetone'),14),
	   15 => sprintf(__('Section %s', 'onetone'),15),
	   );
	 
	$onetone_home_sections = $home_sections;
    $section_num           = count( $home_sections );
	
	$options = array();
   
	    //HOME PAGE
		$options[] = array(
		'icon' => 'fa-home',
		'name' => __('Home Page', 'onetone'),
		'type' => 'heading');
		
		//HOME PAGE SECTION
		
		$options[] = array(
        'id'          => 'header_overlay',
        'name'       => __( 'Home Page Header Overlay', 'onetone' ),
        'desc'        => __( 'Choose to set header in home page as overlay style', 'onetone' ),
        'std'         => 1,
        'type'        => 'checkbox',
        'section'     => 'header_tab_section',
        'class'       => '',
		'options'     => $choices_reverse
      );
		
		$options[] = array(
			'id'          => 'enable_side_nav',
			'name'       => __( 'Enable Side Navigation', 'onetone' ),
			'desc'        => __( 'Enable side dot navigation.', 'onetone' ),
			'std'         => '',
			'type'        => 'checkbox',
			'section'     => 'header_tab_section',
			'class'       => '',
			'options'     => $choices_reverse
		  );
		
	 	// YouTube video background options
	   $options[] = array('name' => '','id' => 'youtube_video_group','type' => 'start_group','class'=>'group_close'); 
	   $options[] =   	 array(
        'id'          => 'youtube_video_titled',
        'name'       => __( 'YouTube Video Background Options', 'onetone' ).' <span id="accordion-group-youtube_video" class="fa fa-plus"></span>',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'rows'        => '4',
        'class'       => 'section-accordion close',
        
      );
	   
		$options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
		$options[] = array(
		 'name' => __('YouTube ID for Video Background', 'onetone'),
		 'std' => 'XDLmLYXuIDM',
		 'desc' => __('Insert the eleven-letter id here, not url.', 'onetone'),
		 'id' => 'section_background_video_0',
		 'type' => 'text',
		 'class' => 'section-item accordion-group-youtube_video' 
		  );
		
		$options[] = array('name' => __('Start Time', 'onetone'),'std' => '18','desc' => __('Choose time to start to play, in seconds.', 'onetone'),'id' => 'section_youtube_start',
		'type' => 'text','class' => 'section-item accordion-group-youtube_video' );
		
		$options[] = array(
		'name' => __('Display Video Controls', 'onetone'),
		'desc' => __('Choose to display video controls at bottom of the section with video background.', 'onetone'),
		'id' => 'video_controls',
		'std' => '1',
		'class' => 'mini section-item accordion-group-youtube_video',
		'options' => $choices2,
		'type' => 'select');
		
		$options[] = array(
		'name' => __('Mute', 'onetone'),
		'desc' => __('Choose to set the video mute.', 'onetone'),
		'id' => 'youtube_mute',
		'std' => '0',
		'class' => 'mini section-item accordion-group-youtube_video',
		'options' => $choices2,
		'type' => 'select');
		
		$options[] = array(
		'name' => __('AutoPlay', 'onetone'),
		'desc' => __('Choose to set the video autoplay.', 'onetone'),
		'id' => 'youtube_autoplay',
		'std' => '1',
		'class' => 'mini section-item accordion-group-youtube_video',
		'options' => $choices2,
		'type' => 'select');
		
		$options[] = array(
		'name' => __('Loop', 'onetone'),
		'desc' => __('Choose to set the video loop.', 'onetone'),
		'id' => 'youtube_loop',
		'std' => '1',
		'class' => 'mini section-item accordion-group-youtube_video',
		'options' => $choices2,
		'type' => 'select');
		
		$options[] = array(
		'name' => __('Background Type', 'onetone'),
		'desc' => __('Choose to set the video as background of the whole site or just one section.', 'onetone'),
		'id' => 'youtube_bg_type',
		'std' => '1',
		'class' => 'mini section-item accordion-group-youtube_video',
		'options' => array('1'=>__('Body Background', 'onetone'),'0'=>__('Section Background', 'onetone')),
		'type' => 'select');
		
		
		$options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
		$options[] = array('name' => '','id' => 'youtube_video_group_','type' => 'end_group','class'=>'');
		
		// Vimeo video background options
	    $options[] = array('name' => '','id' => 'vimeo_video_group','type' => 'start_group','class'=>''); 
	    $options[] =   	 array(
						  'id'          => 'vimeo_video_titled',
						  'name'        => __( 'Vimeo Video Background Options', 'onetone' ).' <span id="accordion-group-vimeo_video" class="fa fa-plus"></span>',
						  'desc'        => '',
						  'std'         => '',
						  'type'        => 'textblock-titled',
						  'rows'        => '4',
						  'class'       => 'section-accordion close',
						  
						);
		
	   $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'home-section-wrapper');
		
	   $options[] = array(
						   'name' => __('Vimeo URL for Video Background', 'onetone'),
						   'std' => '',
						   'desc' => __('Insert the vimeo video URL here, e.g. https://vimeo.com/193338881', 'onetone'),
						   'id' => 'section_background_video_vimeo',
						   'type' => 'text',
						   'class'=>'section-item accordion-group-vimeo_video'
						   );
		
		$options[] = array('name' => __('Start Time', 'onetone'),'std' => '1','desc' => __('Choose time to start to play, in seconds', 'onetone'),'id' => 'section_vimeo_start','type' => 'text','class' => 'section-item accordion-group-vimeo_video' );
		
		$options[] = array(
						  'name' => __('Display Video Control Buttons.', 'onetone'),
						  'desc' => __('Choose to display video controls at bottom of the section with video background.', 'onetone'),
						  'id' => 'vimeo_video_controls',
						  'std' => '1',
						  'class' => 'section-item accordion-group-vimeo_video',
						  'options' => $choices2,
						  'type' => 'checkbox');
		
		$options[] = array(
						  'name' => __('Mute', 'onetone'),
						  'desc' => __('Choose to set the video mute', 'onetone'),
						  'id' => 'vimeo_mute',
						  'std' => '0',
						  'class' => 'mini section-item accordion-group-vimeo_video',
						  'options' => $choices2,
						  'type' => 'select');
		
		$options[] = array(
						  'name' => __('AutoPlay', 'onetone'),
						  'desc' => __('Choose to set the video autoplay', 'onetone'),
						  'id' => 'vimeo_autoplay',
						  'std' => '1',
						  'class' => 'mini section-item accordion-group-vimeo_video',
						  'options' => $choices2,
						  'type' => 'select');
		
		$options[] = array(
						  'name' => __('Loop', 'onetone'),
						  'desc' => __('Choose to set the video loop', 'onetone'),
						  'id' => 'vimeo_loop',
						  'std' => '1',
						  'class' => 'mini section-item accordion-group-vimeo_video',
						  'options' => $choices2,
						  'type' => 'select');
		
		$options[] = array(
						  'name' => __('Background Type', 'onetone'),
						  'desc' => __('Choose to set the video as background of the whole site or just one section', 'onetone'),
						  'id' => 'vimeo_bg_type',
						  'std' => '0',
						  'class' => 'mini section-item accordion-group-vimeo_video',
						  'options' => array('1'=>__('Body Background', 'onetone'),'0'=>__('Section Background', 'onetone')),
						  'type' => 'select');
		
		
		$options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'home-section-wrapper');
		$options[] = array('name' => '','id' => 'vimeo_video_group_','type' => 'end_group','class'=>'');
		
		
		$options[] = array(	
						   'name' => __('Video Background Type', 'onetone'),
						   'id' => 'video_background_type',
						   'std' => 'youtube',
						   'desc' => __('Choose type of video background', 'onetone'),
						   'class' => 'mini',
						   'options' => array( 'youtube'=> __('YouTube Video', 'onetone'),'vimeo'=> __('Vimeo Video', 'onetone') ),
						   'type' => 'select'
						   );
		
		
		$video_background_section = array('0'=>__('No video background', 'onetone'));
		foreach( $home_sections as $k=>$v ){
			$video_background_section[$k] = $v;
			}
			
		$options[] = array('name' => __('Video Background Section', 'onetone'),'std' => '1','id' => 'video_background_section',
		'type' => 'select', 'desc' => __('Choose a section to set the video as background for.', 'onetone'), 'options'=>$video_background_section);
		
		
		$options[] = array(
						   'name' => __('Display slider instead in section 1', 'onetone'),
						   'std' => '',
						   'id' => 'section_1_content',
						   'type' => 'checkbox',
						   'desc' =>  __('Choose to display default slider instead of section contents here.', 'onetone')
						   );
		
		$options[] = array(
						   'name' => __('Enable Animation', 'onetone'),
						   'desc'=>__('Enable animation for default section content. You need to activate Magee Shortcodes plugin to apply animation effects.', 'onetone'),
						   'std' => '1',
						   'id' => 'home_animated',
		                   'type' => 'checkbox');
		
		$options[] = array('name' => '','id' => 'section_order','type' => 'start_group','class'=>''); 
		
		$options[] =   	 array(
						  'id'          => 'section_order_titled',
						  'name'       => __( 'Sections Order', 'onetone' ).' <span id="accordion-group-section_order" class="fa fa-plus"></span>',
						  'desc'        => '',
						  'std'         => '',
						  'type'        => 'textblock-titled',
						  'rows'        => '4',
						  'class'       => 'section-accordion close',
						  
						);
		
		$options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'home-section-wrapper');
		
		$options[] = array(
						  'name' => '',
						  'desc' => sprintf(__('<span style="padding-left:20px;">Get the <a href="%s" target="_blank">Pro version</a> of Onetone to acquire this feature.</span>', 'onetone' ),esc_url('https://www.mageewp.com/onetone-theme.html')),
						  'id' => 'onetone_get_pro',
						  'std' => '',
						  'type' => 'info',
						  'class'=>'section-item accordion-group-section-order'
						  );
		
		$options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'home-section-wrapper');
		$options[] = array('name' => '','id' => 'section_order_','type' => 'end_group','class'=>'');
	   
		
		$o_section_num = onetone_option( 'section_num' ); 
		
		for($i=0; $i < $section_num; $i++){
		
		if(!isset($section_title[$i])){$section_title[$i] = "";}
		if(!isset($section_subtitle[$i])){$section_subtitle[$i] = "";}
		if(!isset($section_color[$i])){$section_color[$i] = "";}
		if(!isset($section_menu[$i])){$section_menu[$i] = "";}
		
		if(!isset($section_background[$i])){
		  $section_background[$i] = array('color' => '','image' => '','repeat' => '','position' => '','attachment'=>'');
		}
		
		if(!isset($section_css_class[$i])){$section_css_class[$i] = "";}
		if(!isset($section_content[$i])){$section_content[$i] = "";}
		if(!isset($section_slug[$i])){ $section_slug[$i] = "";}
		if(!isset($text_align[$i])){ $text_align[$i] = "";}
		if(!isset($section_padding[$i])){ $section_padding[$i] = "";}
		
		$section_name = onetone_option('section_title_'.$i);
		$section_name = $section_name?$section_name:onetone_option('menu_title_'.$i);
        $section_name = $section_name? ' ('.$section_name.')':'';
		$section_name =  $home_sections[$i+1] .' '. $section_name;
		
		if(!isset($section_title_typography_defaults[$i])){ $section_title_typography_defaults[$i] = $section_title_typography_defaults_1;}
		if(!isset($section_subtitle_typography_defaults[$i])){ $section_subtitle_typography_defaults[$i] = $section_subtitle_typography_defaults_1;}
		if(!isset($section_content_typography_defaults[$i])){ $section_content_typography_defaults[$i] = $section_content_typography_defaults_1;}
		
		
		$hide_section = '';
		
		if( $i >= $o_section_num && $o_section_num >0  )
		  $hide_section = 1;
		  
		if( $o_section_num <=0 && $i >8 ){
		  $hide_section  = 1;
		  $content_model = 1;
		}
		
		if ( isset( $_POST['reset'] ) ) 
		  $content_model = 0;
		
		$options[] = array('name' => '','id' => 'section_group_start_'.$i.'','type' => 'start_group','class'=>'home-section group_close');
		
		$options[] =   	 array(
						  'id'          => 'sections_titled_'.$i,
						  'name'       => $section_name.' <span id="accordion-group-section-'.$i.'" class="fa fa-plus"></span>',
						  'desc'        => '',
						  'std'         => '',
						  'type'        => 'textblock-titled',
						  'rows'        => '',
						  'class'       => 'section-accordion close accordion-group-title-section-'.$i
        
      );
		
		$options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'home-section-wrapper');
		
		
		$options[] = array(
						   'name' => __('Hide Section', 'onetone'),
						   'std' => $hide_section,
						   'id' => 'section_hide_'.$i,
		                   'type' => 'checkbox',
						   'class'=>'section-item accordion-group-section-'.$i,
						   'desc'=> __('Hide this section on front page.', 'onetone'),
						   );
		
		$options[] = array(
						   'name' => __('Section Title', 'onetone'),
						   'id' => 'section_title_'.$i.'',
						   'type' => 'text',
						   'std'=> $section_title[$i],
						   'class'=>'section-item accordion-group-section-'.$i,
						   'desc'=> __('Insert title for this section. It would appear at the top of the section.', 'onetone'),
						   );
		
		$options[] = array(
						   'name' => __('Menu Title', 'onetone'),
						   'id' => 'menu_title_'.$i.'',
						   'type' => 'text',
						   'std'=>$section_menu[$i],
						   'desc'=> __('Insert menu title for this section. This title would appear in the header menu. If leave it as blank, the link of this section would not be displayed in header menu.', 'onetone'),
						   'class'=>'section-item accordion-group-section-'.$i
						   );
		
		$options[] = array(
						   'name' => __('Menu Slug', 'onetone'),
						   'id' => 'menu_slug_'.$i.'',
						   'type' => 'text',
						   'std'=>$section_slug[$i],
						   'desc'=> __('Attention! The "slug" is the URL-friendly version of menu title. It is usually all lowercase and contains only letters, numbers, and hyphens. If the menu title contains non-eng characters or spaces, you need to fill this form.', 'onetone'),
						   'class'=>'section-item accordion-group-section-'.$i
						   );
		
		$options[] = array(
						   'name' =>  __('Section Background', 'onetone'),
						   'id' => 'section_background_'.$i.'',
						   'std' => $section_background[$i],
						   'type' => 'background' ,
						   'class'=>'section-item accordion-group-section-'.$i,
						   'desc'=> __('Set background color & background image for this section', 'onetone'),
						   );
		
		$options[] = array(
						   'name' => __('Parallax Scrolling Background Image', 'onetone'),
						   'std' => 'no',
						   'id' => 'parallax_scrolling_'.$i.'',
		                   'type' => 'select',
						   'class'=>'mini section-item accordion-group-section-'.$i,
						   'options'=>$choices,
						   'desc'=> __('Choose to apply parallax scrolling effect for background image', 'onetone'),
						   );

		
		$options[] = array(
						   'name' => __('Section Css Class', 'onetone'),
						   'id' => 'section_css_class_'.$i.'',
						   'type' => 'text',
						   'std'=>$section_css_class[$i],
						   'class'=>'section-item accordion-group-section-'.$i,
						   'desc' => __('Set an aditional css class of this section', 'onetone'),
						   );
		$options[] = array(
						   'name' => __('Section Padding', 'onetone'),
						   'id' => 'section_padding_'.$i.'',
						   'type' => 'text',
						   'std'=>$section_padding[$i],
						   'class'=>'section-item accordion-group-section-'.$i,
						   'desc' => __('Set padding for this section. In pixels (px), eg: 10px 20px 30px 0. These four numbers represent padding top/right/bottom/left', 'onetone'),
						   );
		
		$options[] = array(
						   'name' => __('Text Align', 'onetone'),
						   'std' => $text_align[$i],
						   'id' => 'text_align_'.$i.'',
		                   'type' => 'select',
						   'class'=>'mini section-item accordion-group-section-'.$i,
						   'options'=>$align,
						   'desc' => __('Set content align for this section', 'onetone')
						   );
		
		
		$options[] = array(
						  'name' => __('Section Title Typography', 'onetone'),
						  'id'   => "section_title_typography_".$i,
						  'std'  => $section_title_typography_defaults[$i],
						  'type' => 'typography',
						  'options' => $typography_options ,
						  'class'=>'section-item accordion-group-section-'.$i
						  );
						  
		$options[] = array(
						  'name' => __('Section Subtitle Typography', 'onetone'),
						  'id'   => "section_subtitle_typography_".$i,
						  'std'  => $section_subtitle_typography_defaults[$i],
						  'type' => 'typography',
						  'options' => $typography_options ,
						  'class'=>'section-item accordion-group-section-'.$i
						  );
		
		$options[] = array(
						  'name' => __('Section Content Typography', 'onetone'),
						  'id'   => 'section_content_typography_'.$i,
						  'std'  => $section_content_typography_defaults[$i],
						  'type' => 'typography',
						  'options' => $typography_options ,
						  'class'=> 'section-item accordion-group-section-'.$i
						  );
		
		$options[] = array(
					  'name' =>  __('Section Content Model', 'onetone'),
					  'id' =>'section_content_model_'.$i,
					  'std' => $content_model,
					  'class' => 'section-content-model section-item accordion-group-section-'.$i,
					  'type' => 'radio',
					  'desc' => __('Default: fixed layout, no code knowledge needed; Custom: non-fixed layout, user can use html and shortcode to get more complex structure', 'onetone'),
					  'options'=>array('0'=> __('Default', 'onetone'),'1'=>__('Custom', 'onetone'))
		);
		
		// Fixed content
		
		/* $options[] = array(
					'id'          => 'section_color_'.$i.'',
					'name'       => __( 'Font Color', 'onetone' ),
					'desc'        => __( 'Set font color for the content of this section', 'onetone' ),
					'std'         => $section_color[$i],
					'type'        => 'color',
					'class'       => 'content-model-0 section-item accordion-group-section-'.$i,
					
				  ); */
			
			$options[] = array(
				   'name' => __('Section Subtitle', 'onetone'),
				   'id' => 'section_subtitle_'.$i.'',
				   'type' => 'text',
				   'std'=> $section_subtitle[$i],
				   'class'=>'content-model-0 section-item accordion-group-section-'.$i,
				   'desc'=> __('Insert sub-title for this section. It would appear at the bottom of the section title', 'onetone'),
				   );
		
		switch( $i ){
			case "0": // Section Slogan
			  
			 $options[] = array(
						  'name' => __('Icon', 'onetone'),
						  'id'   => "section_icon_".$i,
						  'std'  => '',
						  'desc' => __( 'The image will display above the section title.', 'onetone' ),
						  'type' => 'upload',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 
		     $options[] = array(
						  'name' => __('Button Text', 'onetone'),
						  'id'   => "section_btn_text_".$i,
						  'std'  => 'Click Me',
						  'type' => 'text',
						  'desc' => __('Insert text for the button', 'onetone'),
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 
			  $options[] = array(
						  'name' => __('Button Link', 'onetone'),
						  'id'   => "section_btn_link_".$i,
						  'std'  => '#',
						  'desc' => __('Insert link for the button, begin with http:// or https://', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			  
			  $options[] = array(
						  'name' => __('Button Target', 'onetone'),
						  'id'   => "section_btn_target_".$i,
						  'std'  => '_self',
						  'desc' => __('Self: open in the same window; blank: open in a new window', 'onetone'),
						  'type' => 'select',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
						  'options'     => $target
						  );
			  
			  $banner_social_icon = array('fa-facebook','fa-skype','fa-twitter','fa-linkedin','fa-google-plus','fa-rss');
			  
			  for( $s=0;$s<6;$s++ ):
			  
			  $options[] = array(
						  'name' => __('Social Icon', 'onetone').' '.($s+1),
						  'id'   => "section_social_icon_".$i."_".$s,
						  'std'  => $banner_social_icon[$s],
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
						  'desc' => __('Insert Fontawsome icon code', 'onetone')
						  );
			  $options[] = array(
						  'name' => __('Social Icon Link', 'onetone').' '.($s+1),
						  'id'   => "section_icon_link_".$i."_".$s,
						  'std'  => '#',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
						  'desc' => __('Insert link for the icon', 'onetone')
						  );
			  endfor;

			break;
			case "1":
			 $options[] = array(
						  'name' => __('Button Text', 'onetone'),
						  'id'   => "section_btn_text_".$i,
						  'std'  => 'Click Me',
						  'desc' => __('Insert text for the button', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			  $options[] = array(
						  'name' => __('Button Link', 'onetone'),
						  'id'   => "section_btn_link_".$i,
						  'std'  => '#',
						  'desc' => __('Insert link for the button, begin with http:// or https://', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			  $options[] = array(
						  'name' => __('Button Target', 'onetone'),
						  'id'   => "section_btn_target_".$i,
						  'std'  => '_self',
						  'desc' => __('Self: open in the same window; blank: open in a new window', 'onetone'),
						  'type' => 'select',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
						  'options'     => $target
						  );
			  
			$options[] = array(
						  'name' => __('Description', 'onetone'),
						  'id' => 'section_desc_'.$i,
						  'std' => '<h4>Morbi rutrum, elit ac fermentum egestas, tortor ante vestibulum est, eget scelerisque nisl velit eget tellus.</h4>',
						  'desc' => __('Insert content for the banner, html tags allowed', 'onetone'),
						  'type' => 'textarea',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
						  );
			
			break;
			case "2": // Section Service
			$icons   = array('fa-leaf','fa-hourglass-end','fa-signal','fa-heart','fa-camera','fa-tag');
			$images  = array(
							 'https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/Icon_1.png',
							 'https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/Icon_2.png',
							 'https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/Icon_3.png',
							 'https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/Icon_4.png',
							 'https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/Icon_5.png',
							 'https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/Icon_6.png'
							 );
			
			$options[] = array(
						  'id'          => 'section_service_icon_color_'.$i.'',
						  'name'       => __( 'Icon Color', 'onetone' ),
						  'desc'        => __( 'Set service icon color.', 'onetone' ),
						  'std'         => '#666666',
						  'type'        => 'color',
						  'class'       => 'content-model-0 section-item accordion-group-section-'.$i,
						  
						);
			
			for($c=0;$c<6;$c++){
				
				$options[] = array(
						  'name' => sprintf(__('Service Icon %d', 'onetone'),$c+1),
						  'id'   => "section_icon_".$i."_".$c,
						  'std'  => '',
						  'desc' => __('Insert Fontawsome icon code', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Service Image %d', 'onetone'),$c+1),
						  'id'   => "section_image_".$i."_".$c,
						  'std'  => $images[$c],
						  'desc' => __('Or choose to upload icon image', 'onetone'),
						  'type' => 'upload',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Service Title %d', 'onetone'),$c+1),
						  'id'   => "section_title_".$i."_".$c,
						  'std'  => 'FREE PSD TEMPLATE',
						  'desc' => __('Set title for service item', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Title Link %d', 'onetone'),$c+1),
						  'id'   => "section_link_".$i."_".$c,
						  'std'  => '',
						  'desc' => __('Insert link for service item', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				
				$options[] = array(
						  'name' => sprintf(__('Link Target %d', 'onetone'),$c+1),
						  'id'   => "section_target_".$i."_".$c,
						  'std'  => '',
						  'desc' => __('Self: open in the same window; blank: open in a new window', 'onetone'),
						  'type' => 'select',
						  'options'=>$target,
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				
				$options[] = array(
						  'name' => sprintf(__('Service Description %d', 'onetone'),$c+1),
						  'id'   => "section_desc_".$i."_".$c,
						  'std'  => 'Integer pulvinar elementum est, suscipit ornare ante finibus ac. Praesent vel ex dignissim, rhoncus eros luctus, dignissim arcu.',
						  'desc' => __('Insert content for the banner, html tags allowed', 'onetone'),
						  'type' => 'textarea',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				}
			
			break;
			
			case "3": // Section Gallery
			
			$default_images = array(
									esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/16110807.jpg'),
									esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/16110805.jpg'),
									esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/16110806.jpg'),
									esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/16110802.jpg'),
									esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/161110001.jpg'),
									esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/16110803.jpg'),
									);
			for($c=0;$c<6;$c++){
				
		
				$options[] = array(
						  'name' => sprintf(__('Image %d', 'onetone'),$c+1),
						  'id'   => "section_image_".$i."_".$c,
						  'std'  => $default_images[$c],
						  'desc' => __('Choose to upload image for gallery item', 'onetone'),
						  'type' => 'upload',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
		
				$options[] = array(
						  'name' => sprintf(__('Link %d', 'onetone'),$c+1),
						  'id'   => "section_link_".$i."_".$c,
						  'std'  => '',
						  'desc' => __('Insert link for this item', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				
				$options[] = array(
						  'name' => sprintf(__('Link Target %d', 'onetone'),$c+1),
						  'id'   => "section_target_".$i."_".$c,
						  'std'  => '',
						  'desc' => __('Self: open in the same window; blank: open in a new window', 'onetone'),
						  'type' => 'select',
						  'options'=>$target,
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				
				}
			
			break;
			case "4": // Section Team
			$social_icon = array('instagram','facebook','google-plus','envelope','','');
			$avatar = array(
							esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/team16110801.jpg'),
							esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/team16110802.jpg'),
							esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/team16110803.jpg'),
							esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/team16110804.jpg'),
							'',
							'',
							'',
							''
							);
			
			$options[] = array(
						  'id' => "section_team_columns",
						  'name' => __( 'Columns', 'onetone' ),
						  'desc' => __( 'Set columns for team module', 'onetone' ),
						  'type'    => 'select',
						  'options' => array(1=>1,2=>2,3=>3,4=>4),
						  'std' => '4',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
					  );
			
			$options[] = array(
						  'id' => "section_team_style",
						  'name' => __( 'Style', 'onetone' ),
						  'desc' => '',
						  'type'    => 'select',
						  'options' => array(0=> __('Normal', 'onetone'),1=>__('Carousel', 'onetone') ),
						  'std' => '4',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
					  );
			
			for( $t=0; $t<8; $t++ ){
				
				$options[] = array(
						  'name' => sprintf(__('Avatar %d', 'onetone'),$t+1),
						  'id'   => "section_avatar_".$i."_".$t,
						  'std'  => $avatar[$t],
						  'desc' => __( 'Choose to upload image for the person avatar', 'onetone' ),
						  'type' => 'upload',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				
				$options[] = array(
						  'name' => sprintf(__('Link %d', 'onetone'),$t+1),
						  'id'   => "section_link_".$i."_".$t,
						  'std'  => '',
						  'desc' => __( 'Set link for the person', 'onetone' ),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Name %d', 'onetone'),$t+1),
						  'id'   => "section_name_".$i."_".$t,
						  'std'  => 'KEVIN PERRY',
						  'desc' => __( 'Set name for the person', 'onetone' ),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Byline %d', 'onetone'),$t+1),
						  'id'   => "section_byline_".$i."_".$t,
						  'std'  => 'SOFTWARE DEVELOPER',
						  'desc' => __( 'Set byline for the person', 'onetone' ),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Description %d', 'onetone'),$t+1),
						  'id'   => "section_desc_".$i."_".$t,
						  'std'  => 'Vivamus congue justo eget diam interdum scelerisque. In hac habitasse platea dictumst.',
						  'desc' => __( 'Insert description for the person', 'onetone' ),
						  'type' => 'textarea',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				
				for($k=0;$k<4;$k++):
		
				$options[] = array(
					  'id' => 'section_icon_'.$i.'_'.$t.'_'.$k,
					  'name' => sprintf(__( 'Social Icon %d - %d', 'onetone' ),$t+1,$k+1),
					  'desc'   => '',
					  'type'    => 'text',
					  'std' => $social_icon[$k],
					  'desc' => __( 'Choose social icon', 'onetone' ),
					  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
				  );
					  $options[] = array(
					  'id' => 'section_icon_link_'.$i.'_'.$t.'_'.$k,
					  'name' => sprintf(__( 'Social Icon Link %d - %d', 'onetone' ),$t+1,$k+1),
					  'type'    => 'text',
					  'desc' => __( 'Insert link for the icon', 'onetone' ),
					  'std' => '#',
					  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
				  );
				  
				endfor;	  
			}
			
			break;
			case "5": // Section About
			
			$options[] = array(
						  'name' => __('Left Content', 'onetone'),
						  'id'   => "section_left_content_".$i,
						  'std'  => '<h3>Biography</h3>
<p>Morbi rutrum, elit ac fermentum egestas, tortor ante vestibulum est, eget scelerisque nisl velit eget tellus. Fusce porta facilisis luctus. Integer neque dolor, rhoncus nec euismod eget, pharetra et tortor. Nulla id pulvinar nunc. Vestibulum auctor nisl vel lectus ullamcorper sed pellentesque dolor eleifend. Praesent lobortis magna vel diam mattis sagittis.Mauris porta odio eu risus scelerisque id facilisis ipsum dictum vitae volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar neque eu purus sollicitudin et sollicitudin dui ultricies. Maecenas cursus auctor tellus sit amet blandit. Maecenas a erat ac nibh molestie interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed lorem enim, ultricies sed sodales id, convallis molestie ipsum. Morbi eget dolor ligula. Vivamus accumsan rutrum nisi nec elementum. Pellentesque at nunc risus. Phasellus ullamcorper bibendum varius. Quisque quis ligula sit amet felis ornare porta. Aenean viverra lacus et mi elementum mollis. Praesent eu justo elit.</p>',
						  'type' => 'textarea',
						  'desc' => __( 'Insert content for the left column, html tags allowed', 'onetone' ),
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			
			$options[] = array(
						  'name' => __('Right Content', 'onetone'),
						  'id'   => "section_right_content_".$i,
						  'std'  => '<h3>Personal Info</h3><div><ul class="magee-icon-list"><li><i class="fa fa-phone"><span></span></i> +1123 2456 689</li></ul><ul class="magee-icon-list"><li><i class="fa fa-map-marker"><span></span></i> 3301 Lorem Ipsum, Dolor Sit St</li></ul><ul class="magee-icon-list"><li><i class="fa fa-envelope-o"><span></span></i><a href="#">admin@domain.com</a>.</li></ul><ul class="magee-icon-list"><li><i class="fa fa-internet-explorer"><span></span></i><a href="#">Mageewp.com</a></li></ul></div>',
						  'type' => 'textarea',
						  'desc' => __( 'Insert content for the right column, html tags allowed', 'onetone' ),
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			
			break;
			case "6": // Section Counter
			
			$options[] = array(
						  'name' => __('Counter Title 1', 'onetone'),
						  'id'   => "counter_title_1_".$i,
						  'std'  => $onetone_options_saved?'':'Themes',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 $options[] = array(
						  'name' => __('Counter Number 1', 'onetone'),
						  'id'   => "counter_number_1_".$i,
						  'std'  => $onetone_options_saved?'':'200',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 
			 $options[] = array(
						  'name' => __('Counter Title 2', 'onetone'),
						  'id'   => "counter_title_2_".$i,
						  'std'  => $onetone_options_saved?'':'Supporters',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 $options[] = array(
						  'name' => __('Counter Number 2', 'onetone'),
						  'id'   => "counter_number_2_".$i,
						  'std'  => $onetone_options_saved?'':'98',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 
			 
			 $options[] = array(
						  'name' => __('Counter Title 3', 'onetone'),
						  'id'   => "counter_title_3_".$i,
						  'std'  => $onetone_options_saved?'':'Projuects',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 $options[] = array(
						  'name' => __('Counter Number 3', 'onetone'),
						  'id'   => "counter_number_3_".$i,
						  'std'  => $onetone_options_saved?'':'1360',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 
			 $options[] = array(
						  'name' => __('Counter Title 4', 'onetone'),
						  'id'   => "counter_title_4_".$i,
						  'std'  => $onetone_options_saved?'':'Customers',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			 $options[] = array(
						  'name' => __('Counter Number 4', 'onetone'),
						  'id'   => "counter_number_4_".$i,
						  'std'  => $onetone_options_saved?'':'8000',
						  'desc' => '',
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			
			break;
			case "7": // Section Testimonial
			
			$avatar = array(
							esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/person-8-thumbnail.jpg'),
							esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/person-7-thumbnail.jpg'),
							esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/11/person-6-thumbnail.jpg'),
							'',
							'',
							'',
							'',
							''
							);
			
			$options[] = array(
						  'id' => "section_testimonial_columns",
						  'name' => __( 'Columns', 'onetone' ),
						  'desc' => '',
						  'type'    => 'select',
						  'desc' => __( 'Set columns for testimonial module', 'onetone' ),
						  'options' => array(1=>1,2=>2,3=>3,4=>4),
						  'std' => '3',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i,
					  );
			
			$options[] = array(
						  'id' => "section_testimonial_style",
						  'name' => __( 'Style', 'onetone' ),
						  'desc' => '',
						  'type'    => 'select',
						  'options' => array(0=> __('Normal', 'onetone'),1=>__('Carousel', 'onetone') ),
						  'std' => '4',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
					  );
			
			for( $t=0; $t<8; $t++ ){
				
				$description = '';
				if( $t<3 )
				$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat non ex quis consectetur. Aliquam iaculis dolor erat, ut ornare dui vulputate nec. Cras a sem mattis, tincidunt urna nec, iaculis nisl. Nam congue ultricies dui.';
				
				$options[] = array(
						  'name' => sprintf(__('Avatar %d', 'onetone'),$t+1),
						  'id'   => "section_avatar_".$i."_".$t,
						  'std'  => $avatar[$t],
						  'desc' => __( 'Choose to upload image for the client avatar', 'onetone' ),
						  'type' => 'upload',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				
				$options[] = array(
						  'name' => sprintf(__('Name %d', 'onetone'),$t+1),
						  'id'   => "section_name_".$i."_".$t,
						  'std'  => 'KEVIN PERRY',
						  'desc' => __( 'Insert name for the client', 'onetone' ),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Byline %d', 'onetone'),$t+1),
						  'id'   => "section_byline_".$i."_".$t,
						  'std'  => 'Web Developer',
						  'desc' => __( 'Insert byline for the client', 'onetone' ),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
				$options[] = array(
						  'name' => sprintf(__('Description %d', 'onetone'),$t+1),
						  'id'   => "section_desc_".$i."_".$t,
						  'std'  => $description,
						  'desc' => __( 'Insert description for the client', 'onetone' ),
						  'type' => 'textarea',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			}
			
			break;
			case "8": // Section Contact
			$emailTo = get_option('admin_email');
			$options[] = array(
						  'name' => __('Your E-mail', 'onetone'),
						  'id'   => "section_email_".$i,
						  'std'  => $emailTo,
						  'desc' => __( 'Set email address to receive mails from contact form', 'onetone' ),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			
			$options[] = array(
						  'name' => __('Button Text', 'onetone'),
						  'id'   => "section_btn_text_".$i,
						  'std'  => 'Post',
						  'desc' => __('Insert text for the button', 'onetone'),
						  'type' => 'text',
						  'class'=>'content-model-0 section-item accordion-group-section-'.$i
						  );
			break;
			
			}
		
	    $options[] = array(
						   'name' => __('Section Content', 'onetone'),
						   'id' => 'section_content_'.$i,
						   'std' => '',
						   'type' => 'editor',
						   'class'=>'content-model-1 section-item accordion-group-section-'.$i
						   );		
		
		$options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
	
		$options[] = array('name' => '','id' => 'section_group_end_'.$i.'','type' => 'end_group');
		
		}
       //insert subtitle data into options 
		//END HOME PAGE SECTION
		
		// General
	$options[] = array(
		'icon' => 'fa-tachometer',
		'name' => __('General Options', 'onetone'),
		'type' => 'heading');

	$options[] = array(
		'name' =>  __('Back to Top Button', 'onetone'),
		'id' => 'back_to_top_btn',
		'std' => 'show',
		'desc' => __( 'Choose to display back to top button', 'onetone' ),
		'class' => 'mini',
		'type' => 'select',
		'options'=>array("show"=> __('Show', 'onetone'),"hide"=>__('Hide', 'onetone'))
		);
		
		
	$options[] = array(
		'name' => __('Custom CSS', 'onetone'),
		'desc' => __('The following css code will add to the header before the closing &lt;/head&gt; tag.', 'onetone'),
		'id' => 'custom_css',
		'std' => 'body{margin:0px;}',
		'type' => 'textarea');
	
	$options[] = array(
        'id'          => 'tracking_titled',
        'name'       => __( 'Tracking', 'onetone' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general_tab_section',
        'class'       => 'sub_section_titled',
        
      );
		
	 $options[] =  array(
        'id'          => 'tracking_code',
        'name'       => __( 'Tracking Code', 'onetone' ),
        'desc'        => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme. Please put code inside script tags.', 'onetone' ),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'general_tab_section',
        'rows'        => '8',
        'class'       => '',
        
      );
	 
	 $options[] =  array(
        'id'          => 'space_before_head',
        'name'       => __( 'Space before &lt;/head&gt;', 'onetone' ),
        'desc'        => __( 'Add code before the head tag.', 'onetone' ),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'general_tab_section',
        'rows'        => '6',
        'class'       => '',
        
      );
	 
	 $options[] =  array(
        'id'          => 'space_before_body',
        'name'       => __( 'Space before &lt;/body&gt;', 'onetone' ),
        'desc'        => __( 'Add code before the body tag.', 'onetone' ),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'general_tab_section',
        'rows'        => '6',
        'class'       => '',
        
      );
	 
	 // header
	 
	   $options[] =  array(
		'icon' => 'fa-h-square', 
		'name' => __('Header', 'onetone'),
		'type' => 'heading'
		);
	   
	   $options[] = array('name' => '','id' => 'header_options_titled_group','type' => 'start_group','class'=>'');
		  ////
		$options[] =   	 array(
        'id'          => 'header_options_titled',
        'name'       => __( 'Header Options', 'onetone' ).' <span id="accordion-group-header_options" class="fa fa-plus"></span>',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_tab_section',
        'rows'        => '4',
        'class'       => 'section-accordion close',
        
      );

		$options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
		$options[] = array(
        'id'          => 'header_fullwidth',
        'name'       => __( 'Full Width Header', 'onetone' ),
        'desc'        => __( 'Enable header full width.', 'onetone' ),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'header_tab_section',
        'class'       => ' accordion-group-header_options',
        
      );
		
		
		$options[] = array(
        'id'          => 'nav_hover_effect',
        'name'        => __( 'Nav Hover Effect', 'onetone' ),
        'desc'        => '',
        'std'         => '3',
        'type'        => 'images',
        'section'     => 'header_tab_section',
        'class'       => ' accordion-group-header_options',
        'options'     => array(
							   '0'=> ONETONE_THEME_BASE_URL.'/images/nav-style0.gif',
							   '1'=> ONETONE_THEME_BASE_URL.'/images/nav-style1.gif',
							   '2'=> ONETONE_THEME_BASE_URL.'/images/nav-style2.gif',
							   '3'=> ONETONE_THEME_BASE_URL.'/images/nav-style3.gif',
							   )
      );
		
		
	 $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
	 $options[] = array('name' => '','id' => 'header_options_titled_group_','type' => 'end_group','class'=>'group_close');	
	
		  ////
	 $options[] = array('name' => '','id' => 'header_background_group','type' => 'start_group','class'=>'');
	 $options[] =   	 array(
        'id'          => 'header_background_titled',
        'name'       => __( 'Header Background', 'onetone' ).' <span id="accordion-group-header_background" class="fa fa-plus"></span>',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_tab_section',
        'rows'        => '4',
        'class'       => 'section-accordion close',
        
      );
	 
	  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
	  $options[] = array(
	  'id'          => 'header_background_image',
	  'name'       => __( 'Header Background Image', 'onetone' ),
	  'desc'        => __( 'Background Image For Header Area', 'onetone' ),
	  'std'         => '',
	  'type'        => 'upload',
	  'section'     => 'header_tab_section',
	  
	  'class'       => 'accordion-group-header_background',
	  
	);
	  
	  $options[] = array(
	  'id'          => 'header_background_full',
	  'name'       => __( '100% Background Image', 'onetone' ),
	  'desc'        => __( 'Turn on to have the header background image display at 100% in width and height and scale according to the browser size.', 'onetone' ),
	  'std'         => 'yes',
	  'type'        => 'select',
	  'section'     => 'header_tab_section',
	  
	  'class'       => 'accordion-group-header_background',
	  'options'     => $choices
	);
	  
	  $options[] = array(
	  'id'          => 'header_background_parallax',
	  'name'       => __( 'Parallax Background Image', 'onetone' ),
	  'desc'        => __( 'Turn on to enable parallax scrolling on the background image for header top positions.', 'onetone' ),
	  'std'         => 'no',
	  'type'        => 'select',
	  'section'     => 'header_tab_section',
	  
	  'class'       => 'accordion-group-header_background',
	  'options'     => $choices_reverse
	);
	  
	  $options[] =  array(
	  'id'          => 'header_background_repeat',
	  'name'       => __( 'Background Repeat', 'onetone' ),
	  'desc'        => __( 'Select how the background image repeats.', 'onetone' ),
	  'std'         => '',
	  'type'        => 'select',
	  'section'     => 'header_tab_section',
	  
	  'class'       => 'accordion-group-header_background',
	  'options'     => $repeat
	);
	  
	  $options[] =  array(
	  'id'          => 'header_top_padding',
	  'name'       => __( 'Header Top Padding', 'onetone' ),
	  'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
	  'std'         => '0px',
	  'type'        => 'text',
	  'section'     => 'header_tab_section',
	  
	  'class'       => 'accordion-group-header_background',
	  
	);
		
	 $options[] = array(
	'id'          => 'header_bottom_padding',
	'name'       => __( 'Header Bottom Padding', 'onetone' ),
	'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
	'std'         => '0px',
	'type'        => 'text',
	'section'     => 'header_tab_section',
	
	'class'       => 'accordion-group-header_background',
	
      );
	$options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
	$options[] = array('name' => '','id' => 'header_background_group_','type' => 'end_group','class'=>'');
	
	$options[] = array('name' => '','id' => 'top_bar_options_group','type' => 'start_group','class'=>'');
	//// Top Bar
	$options[] = array(
        'id'          => 'top_bar_options',
        'name'       => __( 'Top Bar Options', 'onetone' ).' <span id="accordion-group-3" class="fa fa-plus"></span>',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_tab_section',
        'rows'        => '4',
        
        'class'       => 'section-accordion close',
        
      );
	 
	 $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
		$options[] = array(
        'id'          => 'display_top_bar',
        'name'       => __( 'Display Top Bar', 'onetone' ),
        'desc' => __( 'Choose to display top bar above the header', 'onetone' ),
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        'options'     => $choices
      );
		
	$options[] = array(
        'id'          => 'top_bar_background_color',
        'name'       => __( 'Background Color', 'onetone' ),
        'desc' => __( 'Set background color for top bar', 'onetone' ),
        'std'         => '#eeeeee',
        'type'        => 'color',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        
      );
	
		$options[] =  array(
        'id'          => 'top_bar_left_content',
        'name'       => __( 'Left Content', 'onetone' ),
        'desc' => __( 'Choose content in left side', 'onetone' ),
        'std'         => 'info',
        'type'        => 'select',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        'options'     => array( 
          'info'     => __( 'Info', 'onetone' ),
          'sns'     => __( 'SNS', 'onetone' ),
          'menu'     => __( 'Menu', 'onetone' ),
          'none'     => __( 'None', 'onetone' ),
           
        )
      );	
		
	 $options[] = array(
        'id'          => 'top_bar_right_content',
        'name'       => __( 'Right Content', 'onetone' ),
        'desc' => __( 'Choose content in right side', 'onetone' ),
        'std'         => 'sns',
        'type'        => 'select',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        'options'     => array( 
          'info'     => __( 'Info', 'onetone' ),
          'sns'     => __( 'SNS', 'onetone' ),
          'menu'     => __( 'Menu', 'onetone' ),
          'none'     => __( 'None', 'onetone' ),
           
        ),
	
      );
		
	$options[] = array(
        'id'          => 'top_bar_info_color',
        'name'       => __( 'Info Color', 'onetone' ),
        'desc' => __( 'Set color for info in top bar', 'onetone' ),
        'std'         => '#555555',
        'type'        => 'color',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        
      );
	
	$options[] = 	array(
        'id'          => 'top_bar_info_content',
        'name'       => __( 'Info Content', 'onetone' ),
        'desc' => __( 'Insert content for info in top bar', 'onetone' ),
        'std'         => 'Tel: 123456789',
        'type'        => 'textarea',
        'section'     => 'header_tab_section',
        'rows'        => '4',
        'class'       => 'accordion-group-3',
        
      );
	
	$options[] = array(
        'id'          => 'top_bar_menu_color',
        'name'       => __( 'Menu Color', 'onetone' ),
        'desc' => __( 'Set color for menu in top bar', 'onetone' ),
        'std'         => '#555555',
        'type'        => 'color',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        
      );
				
    $options[] = array(
        'id'          => 'social_links',
        'name'       => __( 'Social Links', 'onetone' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'header_tab_section',
        'rows'        => '4',
        'class'       => 'accordion-group-3',
        
      );
	
 if( $social_icons ):
 $i = 1;
 foreach($social_icons as $social_icon){
	
 $options[] =  array(
        'id'          => 'header_social_title_'.$i,
        'name'       => __( 'Social Title', 'onetone' ) .' '.$i,
        'desc' => __( 'Set title for social icon', 'onetone' ),
        'std'         => $social_icon['title'],
        'type'        => 'text',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        
      );
 $options[] = array(
        'id'          => 'header_social_icon_'.$i,
        'name'       => __( 'Social Icon', 'onetone' ).' '.$i,
        'desc'        => __( 'Choose FontAwesome Icon', 'onetone' ),
        'std'         => $social_icon['icon'],
        'type'        => 'text',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        
      );
 $options[] = array(
        'id'          => 'header_social_link_'.$i,
        'name'       => __( 'Social Icon Link', 'onetone' ).' '.$i,
        'desc' => __( 'Set link for social icon', 'onetone' ),
        'std'         => $social_icon['link'],
        'type'        => 'text',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        
      );

	 $i++;
	 }
	endif;	
	
		
 $options[] =  array(
        'id'          => 'top_bar_social_icons_color',
        'name'       => __( 'Social Icons Color', 'onetone' ),
        'desc' => __( 'Set color for social icons in top bar', 'onetone' ),
        'std'         => '',
        'type'        => 'color',
        'section'     => 'header_tab_section',
        'class'       => 'accordion-group-3',
        
      );
  $options[] = array(
		  'id'          => 'top_bar_social_icons_tooltip_position',
		  'name'       => __( 'Social Icon Tooltip Position', 'onetone' ),
		  'desc' => __( 'Set position for tooltip of social icon', 'onetone' ),
		  'std'         => 'bottom',
		  'type'        => 'select',
		  'section'     => 'header_tab_section',
		  'class'       => 'accordion-group-3',
		  'options'     => array( 
			'left'     => __( 'left', 'onetone' ),
			  
			 'right'     => __( 'right', 'onetone' ),
			  
			'bottom'     => __( 'bottom', 'onetone' ),
			 
		  ),
	  
		);
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'top_bar_options_group_','type' => 'end_group','class'=>'');
// Sticky Header
  $options[] =   array(
		'icon' => 'fa-thumb-tack', 
		'name' => __('Sticky Header', 'onetone'),
		'type' => 'heading'
		);
		
  $options[] =  array(
		  'id'          => 'enable_sticky_header',
		  'name'       => __( 'Enable Sticky Header', 'onetone' ),
		  'desc'       => __( 'Choose to enable sticky header', 'onetone' ),
		  'std'         => 'yes',
		  'type'        => 'select',
		  'section'     => 'sticky_header_tab_section',
		  'class'       => '',
		  'options'     => $choices
		);
  $options[] = array(
		  'id'          => 'enable_sticky_header_tablets',
		  'name'       => __( 'Enable Sticky Header on Tablets', 'onetone' ),
		  'desc'       => __( 'Choose to enable sticky header on tablets', 'onetone' ),
		  'std'         => 'yes',
		  'type'        => 'select',
		  'section'     => 'sticky_header_tab_section',
		  'class'       => '',
		  'options'     => $choices
		);
  $options[] = array(
		  'id'          => 'enable_sticky_header_mobiles',
		  'name'       => __( 'Enable Sticky Header on Mobiles', 'onetone' ),
		  'desc'       => __( 'Choose to enable sticky header on mobiles', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sticky_header_tab_section',
		  'class'       => '',
		  'options'     => $choices
		);
		  
  $options[] = array(
		  'id'          => 'sticky_header_menu_item_padding',
		  'name'       => __( 'Sticky Header Menu Item Padding', 'onetone' ),
		  'desc'        => __( 'Controls the space between each menu item in the sticky header. Use a number without \'px\', default is 0. ex: 10', 'onetone' ),
		  'std'         => '0',
		  'type'        => 'text',
		  'section'     => 'sticky_header_tab_section',
		  'class'       => '',
		  
		);
  $options[] = array(
		  'id'          => 'sticky_header_navigation_font_size',
		  'name'       => __( 'Sticky Header Navigation Font Size', 'onetone' ),
		  'desc'        => __( 'Controls the font size of the menu items in the sticky header. Use a number without \'px\', default is 14. ex: 14', 'onetone' ),
		  'std'         => '13',
		  'type'        => 'text',
		  'section'     => 'sticky_header_tab_section',
		  'class'       => '',
		  
		);
  $options[] = array(
		  'id'          => 'sticky_header_logo_width',
		  'name'       => __( 'Sticky Header Logo Width', 'onetone' ),
		  'desc'        => __( 'Controls the logo width in the sticky header. Use a number without \'px\'.', 'onetone' ),
		  'std'         => '',
		  'type'        => 'text',
		  'section'     => 'sticky_header_tab_section',
		  'class'       => '',
		  
		);
  
	  //// logo
  $options[] =  array(
		  'icon' => 'fa-star', 
		  'name' => __('Logo', 'onetone'),
		  'type' => 'heading'
		  );
  
  $options[] = array('name' => '','id' => 'section_group_start_logo','type' => 'start_group','class'=>'home-section group_close');
  
  $options[] =  array(
		  'id'          => 'logo',
		  'name'       => __( 'Logo', 'onetone' ).' <span id="accordion-group-sticky_header" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'logo_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close ',
		  
		);
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  $options[] = array(
		  'id'          => 'logo',
		  'name'       => __( 'Upload Logo', 'onetone' ),
		  'desc'        => __( 'Select an image file for your logo.', 'onetone' ),
		  'std'         => ONETONE_THEME_BASE_URL.'/images/logo.png',
		  'type'        => 'upload',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
  
  $logo = onetone_option('logo');
  
  $options[] = array(
		  'id'          => 'overlay_logo',
		  'name'       => __( 'Upload Overlay Header Logo', 'onetone' ),
		  'desc'        => __( 'Select an image file for your logo.', 'onetone' ),
		  'std'         => $onetone_options_saved?$logo:ONETONE_THEME_BASE_URL.'/images/overlay-logo.png',
		  'type'        => 'upload',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		);
	  
  $options[] =  array(
		  'id'          => 'logo_retina',
		  'name'       => __( 'Upload Logo (Retina Version @2x)', 'onetone' ),
		  'desc'        => __( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'onetone' ),
		  'std'         => '',
		  'type'        => 'upload',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
  $options[] = array(
		  'id'          => 'retina_logo_width',
		  'name'       => __( 'Standard Logo Width for Retina Logo', 'onetone' ),
		  'desc'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width. Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
  
  $options[] =  array(
		  'id'          => 'retina_logo_height',
		  'name'       => __( 'Standard Logo Height for Retina Logo', 'onetone' ),
		  'desc'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height. Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
	  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
	  
  $options[] = array('name' => '','id' => 'section_group_end_logo','type' => 'end_group');
	  
  $options[] = array('name' => '','id' => 'section_group_start_sticky_header','type' => 'start_group','class'=>'home-section group_close');
  $options[] =  array(
		  'id'          => 'sticky_header_logo',
		  'name'       => __( 'Sticky Header Logo', 'onetone' ).' <span id="accordion-group-sticky_header" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'logo_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'home-section-wrapper');
  $options[] = array(
		  'id'          => 'sticky_logo',
		  'name'       => __( 'Upload Logo', 'onetone' ),
		  'desc'        => __( 'Select an image file for your logo.', 'onetone' ),
		  'std'         => ONETONE_THEME_BASE_URL.'/images/logo.png',
		  'type'        => 'upload',
		  'section'     => 'logo_tab_section',
		  'class'       => 'accordion-group-sticky_header',
		);
	  
  $options[] =  array(
		  'id'          => 'sticky_logo_retina',
		  'name'       => __( 'Upload Logo (Retina Version @2x)', 'onetone' ),
		  'desc'        => __( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'onetone' ),
		  'std'         => '',
		  'type'        => 'upload',
		  'section'     => 'logo_tab_section',
		  'class'       => 'accordion-group-sticky_header',
		);
  
  $options[] = array(
		  'id'          => 'sticky_logo_width_for_retina_logo',
		  'name'       => __( 'Sticky Logo Width for Retina Logo', 'onetone' ),
		  'desc'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width. Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => 'accordion-group-sticky_header',
		  
		);
  
  $options[] = array(
		  'id'          => 'sticky_logo_height_for_retina_logo',
		  'name'       => __( 'Sticky Logo Height for Retina Logo', 'onetone' ),
		  'desc'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height. Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => 'accordion-group-sticky_header',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
	  
  $options[] = array('name' => '','id' => 'section_group_end_sticky_header','type' => 'end_group');
  
  $options[] =  array(
		  'id'          => 'logo_position',
		  'name'       => __( 'Logo Position', 'onetone' ),
		  'desc'       => __( 'Set position for logo in header', 'onetone' ),
		  'std'         => 'left',
		  'type'        => 'select',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  'options'     => $align
		);
  
  $options[] =  array(
		  'id'          => 'logo_left_margin',
		  'name'       => __( 'Logo Left Margin', 'onetone' ),
		  'desc'        => __( 'Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '0',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
  $options[] = array(
		  'id'          => 'logo_right_margin',
		  'name'       => __( 'Logo Right Margin', 'onetone' ),
		  'desc'        => __( 'Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '10',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
  $options[] = array(
		  'id'          => 'logo_top_margin',
		  'name'       => __( 'Logo Top Margin', 'onetone' ),
		  'desc'        => __( 'Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '10',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
  $options[] = array(
		  'id'          => 'logo_bottom_margin',
		  'name'       => __( 'Logo Bottom Margin', 'onetone' ),
		  'desc'        => __( 'Use a number without \'px\', ex: 40', 'onetone' ),
		  'std'         => '10',
		  'type'        => 'text',
		  'section'     => 'logo_tab_section',
		  'class'       => '',
		  
		);
  
  // styling
  $options[] =  array(
		  'icon' => 'fa-eyedropper', 
		  'name' => __('Styling', 'onetone'),
		  'type' => 'heading'
		  );
  
  $options[] =  array(
		  'id'          => 'primary_color',
		  'name'       => __( 'Primary Color', 'onetone' ),
		  'desc'       => __( 'Set primary color for the theme', 'onetone' ),
		  'std'         => '#37cadd',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => '',
		  
		);
	  
	  //Background Colors
  $options[] = array('name' => '','id' => 'background_colors_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'background_colors',
		  'name'       => __( 'Background Colors', 'onetone' ).' <span id="accordion-group-background_colors" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'styling_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  $options[] =  array(
		  'id'          => 'sticky_header_background_color',
		  'name'       => __( 'Sticky Header Background Color', 'onetone' ),
		  'desc'       => __( 'Set background color for sticky header', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-background_colors',
		  
		);
  $options[] = array(
		  'id'          => 'sticky_header_background_opacity',
		  'name'       => __( 'Sticky Header Background Opacity', 'onetone' ),
		  'desc'        => __( 'Opacity only works with header top position and ranges between 0 (transparent) and 1.', 'onetone' ),
		  'std'         => '0.7',
		  'type'        => 'select',
		  'section'     => 'styling_tab_section',
		  'options'     => $opacity,
		  'class'       => 'accordion-group-background_colors',
		  
		);
  $options[] = array(
		  'id'          => 'header_background_color',
		  'name'       => __( 'Header Background Color', 'onetone' ),
		  'desc'       => __( 'Set background color for main header', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-background_colors',
		  
		);
  $options[] = array(
		  'id'          => 'header_background_opacity',
		  'name'       => __( 'Header Background Opacity', 'onetone' ),
		  'desc'        => __( 'Opacity only works with header top position and ranges between 0 (transparent) and 1.', 'onetone' ),
		  'std'         => '1',
		  'type'        => 'select',
		  'section'     => 'styling_tab_section',
		  'options'     => $opacity,
		  'class'       => 'accordion-group-background_colors',
		  
		);
  
  $options[] = array(
		  'id'          => 'content_background_color',
		  'name'       => __( 'Content Background Color', 'onetone' ),
		  'desc'       => __( 'Set background color for site content', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-background_colors',
		  
		);
  $options[] = array(
		  'id'          => 'sidebar_background_color',
		  'name'       => __( 'Sidebar Background Color', 'onetone' ),
		  'desc'       => __( 'Set background color for sidebar', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-background_colors',
		  
		);
  $options[] = array(
		  'id'          => 'footer_background_color',
		  'name'       => __( 'Footer Background Color', 'onetone' ),
		  'desc'       => __( 'Set background color for the footer', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-background_colors',
		  
		);
  
  $options[] = array(
		  'id'          => 'copyright_background_color',
		  'name'       => __( 'Copyright Background Color', 'onetone' ),
		  'desc'       => __( 'Set background color for the copyright area in footer', 'onetone' ),
		  'std'         => '#000000',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-background_colors',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'background_colors_group_','type' => 'end_group','class'=>'');	
  //Background Colors
  $options[] = array('name' => '','id' => 'element_colors_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'element_colors',
		  'name'       => __( 'Element Colors', 'onetone' ).' <span id="accordion-group-element_colors" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'styling_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  
  $options[] =  array(
		  'id'          => 'form_background_color',
		  'name'       => __( 'Form Background Color', 'onetone' ),
		  'desc'        => __( 'Controls the background color of form fields', 'onetone' ),
		  'std'         => '',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-element_colors',
		  
		);
  
  $options[] =  array(
		  'id'          => 'form_text_color',
		  'name'       => __( 'Form Text Color', 'onetone' ),
		  'desc'        => __( 'Controls the text color for forms', 'onetone' ),
		  'std'         => '#666666',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-element_colors',
		  
		);
  
  $options[] =  array(
		  'id'          => 'form_border_color',
		  'name'       => __( 'Form Border Color', 'onetone' ),
		  'desc'        => __( 'Controls the border color for forms', 'onetone' ),
		  'std'         => '#666666',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-element_colors',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'element_colors_group_','type' => 'end_group','class'=>'');
  //  layout options
  $options[] = array('name' => '','id' => 'layout_options_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'layout_options',
		  'name'       => __( 'Layout Options', 'onetone' ).' <span id="accordion-group-layout_options" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'styling_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  $options[] =  array(
		  'id'          => 'page_content_top_padding',
		  'name'       => __( 'Page Content Top Padding', 'onetone' ),
		  'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
		  'std'         => '55px',
		  'type'        => 'text',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-layout_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'page_content_bottom_padding',
		  'name'       => __( 'Page Content Bottom Padding', 'onetone' ),
		  'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
		  'std'         => '40px',
		  'type'        => 'text',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-layout_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'hundredp_padding',
		  'name'       => __( '100% Width Left/Right Padding ###', 'onetone' ),
		  'desc'        => __( 'This option controls the left/right padding for page content when using 100% site width or 100% width page template. In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
		  'std'         => '20px',
		  'type'        => 'text',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-layout_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'sidebar_padding',
		  'name'       => __( 'Sidebar Padding', 'onetone' ),
		  'desc'        => __( 'Enter a pixel or percentage based value, ex: 5px or 5%', 'onetone' ),
		  'std'         => '0',
		  'type'        => 'text',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-layout_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'column_top_margin',
		  'name'       => __( 'Column Top Margin', 'onetone' ),
		  'desc'        => __( 'Controls the top margin for all column sizes. In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
		  'std'         => '0px',
		  'type'        => 'text',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-layout_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'column_bottom_margin',
		  'name'       => __( 'Column Bottom Margin', 'onetone' ),
		  'desc'        => __( 'Controls the bottom margin for all column sizes. In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
		  'std'         => '20px',
		  'type'        => 'text',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-layout_options',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'layout_options_group_','type' => 'end_group','class'=>'');	 	 
	   //  Font Colors
  $options[] = array('name' => '','id' => 'font_colors_group','type' => 'start_group','class'=>'');
  
  $options[] =  array(
		  'id'          => 'font_colors',
		  'name'       => __( 'Font Colors', 'onetone' ).' <span id="accordion-group-font_colors_options" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'styling_tab_section',
		  'rows'        => '4',
		  
		  'class'       => 'section-accordion close',
		  
		);
   
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  
  $options[] =  array(
		  'id'          => 'fixed_header_text_color',
		  'name'       => __( 'Fixed Header Text Color', 'onetone' ),
		  'desc'       => __( 'Set color for tagline in fixed header', 'onetone' ),
		  'std'         => '#333333',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		);
  
  $options[] =  array(
		  'id'          => 'overlay_header_text_color',
		  'name'       => __( 'Overlay Header Text Color', 'onetone' ),
		  'desc'       => __( 'Set color for tagline in overlay header', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		);
  
  
  $options[] =  array(
		  'id'          => 'page_title_color',
		  'name'       => __( 'Page Title', 'onetone' ),
		  'desc'       => __( 'Set color for page title', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'h1_color',
		  'name'       => __( 'Heading 1 (H1) Font Color', 'onetone' ),
		  'desc'       => __( 'Choose color for H1 headings', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'h2_color',
		  'name'       => __( 'Heading 2 (H2) Font Color', 'onetone' ),
		  'desc'       => __( 'Choose color for H2 headings', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'h3_color',
		  'name'       => __( 'Heading 3 (H3) Font Color', 'onetone' ),
		  'desc'       => __( 'Choose color for H3 headings', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'h4_color',
		  'name'       => __( 'Heading 4 (H4) Font Color', 'onetone' ),
		  'desc'       => __( 'Choose color for H4 headings', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'h5_color',
		  'name'       => __( 'Heading 5 (H5) Font Color', 'onetone' ),
		  'desc'       => __( 'Choose color for H5 headings', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'h6_color',
		  'name'       => __( 'Heading 6 (H6) Font Color', 'onetone' ),
		  'desc'       => __( 'Choose color for H6 headings', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
   
  $options[] =  array(
		  'id'          => 'body_text_color',
		  'name'       => __( 'Body Text Color', 'onetone' ),
		  'desc'       => __( 'Choose color for body text', 'onetone' ),
		  'std'         => '#333333',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'links_color',
		  'name'       => __( 'Links Color', 'onetone' ),
		  'desc'       => __( 'Choose color for links', 'onetone' ),
		  'std'         => '#37cadd',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'breadcrumbs_text_color',
		  'name'       => __( 'Breadcrumbs Text Color', 'onetone' ),
		  'desc'       => __( 'Choose color for breadcrumbs', 'onetone' ),
		  'std'         => '#555555',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'sidebar_widget_headings_color',
		  'name'       => __( 'Sidebar Widget Headings Color', 'onetone' ),
		  'desc'       => __( 'Choose color for Sidebar widget headings', 'onetone' ),
		  'std'         => '#333333',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] = array(
		  'id'          => 'footer_headings_color',
		  'name'       => __( 'Footer Headings Color', 'onetone' ),
		  'desc'       => __( 'Choose color for footer headings', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  $options[] = array(
		  'id'          => 'footer_text_color',
		  'name'       => __( 'Footer Text Color', 'onetone' ),
		  'desc'       => __( 'Choose color for footer text', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);
  
  $options[] = array(
		  'id'          => 'footer_link_color',
		  'name'       => __( 'Footer Link Color', 'onetone' ),
		  'desc'       => __( 'Choose color for links in footer', 'onetone' ),
		  'std'         => '#a0a0a0',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-font_colors_options',
		  
		);

  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'font_colors_group_','type' => 'end_group','class'=>'');
	   // main menu colors
  $options[] = array('name' => '','id' => 'main_menu_colors_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'main_menu_colors',
		  'name'       => __( 'Main Menu Colors', 'onetone' ).' <span id="accordion-group-main_menu_colors_options" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'styling_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  $options[] =  array(
		  'id'          => 'main_menu_background_color_1',
		  'name'       => __( 'Main Menu Background Color', 'onetone' ),
		  'desc'       => __( 'Choose background color for main menu', 'onetone' ),
		  'std'         => '',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
  $options[] =  array(
		  'id'          => 'main_menu_font_color_1',
		  'name'       => __( 'Main Menu Font Color ( First Level )', 'onetone' ),
		  'desc'       => __( 'Choose font color for first level of main menu', 'onetone' ),
		  'std'         => '#3d3d3d',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'main_menu_overlay_font_color_1',
		  'name'       => __( 'Main Menu Font Color of Overlay Header ( First Level )', 'onetone' ),
		  'desc'       => __( 'Choose font color for first level of main menu', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'main_menu_font_hover_color_1',
		  'name'       => __( 'Main Menu Font Hover Color ( First Level )', 'onetone' ),
		  'desc'       => __( 'Choose hover color for first level of main menu', 'onetone' ),
		  'std'         => '#3d3d3d',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'main_menu_background_color_2',
		  'name'       => __( 'Main Menu Background Color ( Sub Level )', 'onetone' ),
		  'desc'       => __( 'Choose background color for sub level of main menu', 'onetone' ),
		  'std'         => '#ffffff',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
	 
  $options[] =  array(
		  'id'          => 'main_menu_font_color_2',
		  'name'       => __( 'Main Menu Font Color ( Sub Level )', 'onetone' ),
		  'desc'       => __( 'Choose font color for sub level of main menu', 'onetone' ),
		  'std'         => '#3d3d3d',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'main_menu_font_hover_color_2',
		  'name'       => __( 'Main Menu Font Hover Color ( Sub Level )', 'onetone' ),
		  'desc'       => __( 'Choose hover color for sub level of main menu', 'onetone' ),
		  'std'         => '#222222',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
  
  $options[] =  array(
		  'id'          => 'main_menu_separator_color_2',
		  'name'       => __( 'Main Menu Separator Color ( Sub Levels )', 'onetone' ),
		  'desc'       => __( 'Choose separator color for sub level of main menu', 'onetone' ),
		  'std'         => '#000000',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => 'accordion-group-main_menu_colors_options',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  
  $options[] = array('name' => '','id' => 'main_menu_colors_group_','type' => 'end_group','class'=>'');
  
  
  // side menu colors
  $options[] = array('name' => '','id' => 'side_menu_colors_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'side_menu_colors',
		  'name'       => __( 'Front Page Side Menu Color', 'onetone' ).' <span id="accordion-group-side_menu_colors_options" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'styling_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  $options[] =  array(
		  'id'          => 'side_menu_color',
		  'name'       => __( 'Side Menu Color', 'onetone' ),
		  'desc'       => __( 'Choose color for side menu of front page.', 'onetone' ),
		  'std'         => '#37cadd',
		  'type'        => 'color',
		  'section'     => 'styling_tab_section',
		  'class'       => ' accordion-group-side_menu_colors_options',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  
  $options[] = array('name' => '','id' => 'side_menu_colors_group_','type' => 'end_group','class'=>'');
  
   //Sidebar
   
  $options[] =  array(
		  'icon' => 'fa-columns', 
		  'name' => __('Sidebar', 'onetone'),
		  'type' => 'heading'
		  );
  $options[] = array('name' => '','id' => 'sidebar_blog_posts_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'sidebar_blog_posts',
		  'name'       => __( 'Blog Posts', 'onetone' ).' <span id="accordion-group-8" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'sidebar_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
   
  $options[] =  array(
		  'id'          => 'left_sidebar_blog_posts',
		  'name'       => __( 'Left Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose left sidebar for blog posts', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-8',
		  'options'     => $sidebars,
	  
		);
  $options[] =  array(
		  'id'          => 'right_sidebar_blog_posts',
		  'name'       => __( 'Right Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose right sidebar for blog posts', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-8',
		  'options'     => $sidebars,
	  
		);
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'sidebar_blog_posts_group_','type' => 'end_group','class'=>'');
 //
  $options[] = array('name' => '','id' => 'sidebar_blog_archive_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'sidebar_blog_archive',
		  'name'       => __( 'Blog Archive / Category Pages', 'onetone' ).' <span id="accordion-group-10" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'sidebar_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  $options[] =  array(
		  'id'          => 'left_sidebar_blog_archive',
		  'name'       => __( 'Left Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose left sidebar for blog archive page', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-10',
		  'options'     => $sidebars,
		);
  
  $options[] =  array(
		  'id'          => 'right_sidebar_blog_archive',
		  'name'       => __( 'Right Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose right sidebar for blog archive page', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-10',
		  'options'     => $sidebars,
	  
		);
  
 $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
 $options[] = array('name' => '','id' => 'sidebar_blog_archive_group_','type' => 'end_group','class'=>'');

    //Sidebar search'
 $options[] = array('name' => '','id' => 'sidebar_search_group','type' => 'start_group','class'=>'');
 $options[] =  array(
		  'id'          => 'sidebar_search',
		  'name'       => __( 'Search Page', 'onetone' ).' <span id="accordion-group-14" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'sidebar_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');
  $options[] =  array(
		  'id'          => 'left_sidebar_search',
		  'name'       => __( 'Left Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose left sidebar for blog search result page', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-14',
		  'options'     => $sidebars,
	  
		);
  $options[] =  array(
		  'id'          => 'right_sidebar_search',
		  'name'       => __( 'Right Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose right sidebar for blog search result page', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-14',
		  'options'     => $sidebars,
	  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'sidebar_search_group_','type' => 'end_group','class'=>'');
	   //Sidebar 404 page'
  $options[] = array('name' => '','id' => 'sidebar_404_group','type' => 'start_group','class'=>'');
  $options[] =  array(
		  'id'          => 'sidebar_404',
		  'name'       => __( '404 Page', 'onetone' ).' <span id="accordion-group-404" class="fa fa-plus"></span>',
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'sidebar_tab_section',
		  'rows'        => '4',
		  'class'       => 'section-accordion close',
		  
		);
  
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>''); 
  $options[] =  array(
		  'id'          => 'left_sidebar_404',
		  'name'       => __( 'Left Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose left sidebar for 404 page', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-404',
		  'options'     => $sidebars,
		);
  
  $options[] =  array(
		  'id'          => 'right_sidebar_404',
		  'name'       => __( 'Right Sidebar', 'onetone' ),
		  'desc'       => __( 'Choose right sidebar for 404 page', 'onetone' ),
		  'std'         => '',
		  'type'        => 'select',
		  'section'     => 'sidebar_tab_section',
		  'class'       => 'accordion-group-404',
		  'options'     => $sidebars,
		);	

	$options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
    $options[] = array('name' => '','id' => 'sidebar_404_group_','type' => 'end_group','class'=>'');	
	
		// Slider
	$options[] = array(
		  'icon' => 'fa-sliders',			   
		  'name' => __('Slideshow', 'onetone'),
		  'type' => 'heading');
		
	//HOME PAGE SLIDER
  $options[] = array('name' => __('Slideshow', 'onetone'),'id' => 'group_title','type' => 'title');
  
  $slide_img    = array(
					 ONETONE_THEME_BASE_URL.'/images/banner-1.jpg',
					 ONETONE_THEME_BASE_URL.'/images/banner-2.jpg',
					 ONETONE_THEME_BASE_URL.'/images/banner-3.jpg',
					 ONETONE_THEME_BASE_URL.'/images/banner-4.jpg',
					 '',
					 '',
					 '',
					 '',
					 '',
					 '',
					 );  
  
  $slide_desc = array(
						 '<h1>The jQuery slider that just slides.</h1><p>No fancy effects or unnecessary markup.</p>',
						 
						 '<h1>Fluid, flexible, fantastically minimal.</h1><p>Use any HTML in your slides, extend with CSS. You have full control.</p>',
						 
						 '<h1>Open-source.</h1><p> Vestibulum auctor nisl vel lectus ullamcorper sed pellentesque dolor eleifend.</p>',
						 
						 '<h1>Uh, that\'s about it.</h1><p>I just wanted to show you another slide.</p>',
						 '',
						 '',
						 '',
						 '',
						 '',
						 '',
						 
						 );
  
  for( $s=1;$s<=10; $s++ ):
  
  $options[] = array('name' => '','id' => 'slide_'.$s.'_group','type' => 'start_group','class'=>'');
  $options[] = array(
				'id'          => 'slide_titled_'.$s.'',
				'name'       => sprintf(__('Slide %d', 'onetone'),$s).' <span id="accordion-group-slide-'.$s.'" class="fa fa-plus"></span>',
				'desc'        => '',
				'std'         => '',
				'type'        => 'textblock-titled',
				'rows'        => '',
				'class'       => 'section-accordion close',
  
  );
  
  $options[] = array('name' => '','id' => 'wrapper_start','type' => 'wrapper_start','class'=>'');	
  
  $options[] = array(
				 'name' => __('Image', 'onetone'),
				 'id' => 'onetone_slide_image_'.$s.'',
				 'type' => 'upload',
				 'std'=> isset($slide_img[$s-1])?$slide_img[$s-1]:'',
				 'class'=>'slide-item  accordion-group-slide-'.$s.''
				 );

  $options[] = array(
				 'name' => __('Caption', 'onetone'),
				 'id' => 'onetone_slide_text_'.$s.'',
				 'type' => 'editor',
				 'std'=> isset($slide_desc[$s-1])?$slide_desc[$s-1]:'',
				 'class'=>'slide-item  accordion-group-slide-'.$s.''
				 );
  
  $options[] = array(
				'name' => __('Button Text', 'onetone'),
				'id' => 'onetone_slide_btn_txt_'.$s.'',
				'std' => $onetone_options_saved == true?'':__('Click Me', 'onetone'),
				'desc'=> '',
				'type' => 'text');	
  
  $options[] = array(
				'name' => __('Button Link', 'onetone'),
				'id' => 'onetone_slide_btn_link_'.$s.'',
				'std' => '#',
				'desc'=> '',
				'type' => 'text');	
  
  $options[] = array(
				'name' => __('Button Link Target', 'onetone'),
				'id' => 'onetone_slide_btn_target_'.$s.'',
				'std' => '_self',
				'desc'=> '',
				'options' => $target,
				'type' => 'select');	
  
  $options[] = array('name' => '','id' => 'wrapper_end','type' => 'wrapper_end','class'=>'');
  $options[] = array('name' => '','id' => 'slide_'.$s.'_group_','type' => 'end_group','class'=>'');
  
  endfor;

  $options[] =  array(
				'id'          => 'slide_autoplay',
				'name'       => __( 'Autoplay', 'onetone' ),
				'desc'       => 'Enable slider autoplay.',
				'std'         => '1',
				'type'        => 'checkbox',
				'class'       => '',
			  );
	
 $options[] = array(
			  'name' => __('Autoplay Timeout', 'onetone'),
			  'id' => 'slide_time',
			  'std' => '5000',
			  'desc'=>__('Milliseconds between the end of the sliding effect and the start of the nex one.','onetone'),
			  'type' => 'text');	
 
 $options[] =  array(
			  'id'          => 'slider_control',
			  'name'       => __( 'Display Control', 'onetone' ),
			  'desc'       => 'Display control.',
			  'std'         => '1',
			  'type'        => 'checkbox',
			  'class'       => '',
				);
 $options[] =  array(
			  'id'          => 'slider_pagination',
			  'name'       => __( 'Display Pagination', 'onetone' ),
			  'desc'       => 'Display pagination.',
			  'std'         => '1',
			  'type'        => 'checkbox',
			  'class'       => '',
			);
 
 $options[] =  array(
			'id'          => 'slide_fullheight',
			'name'       => __( 'Full Height', 'onetone' ),
			'desc'       => 'Full screen height.',
			'std'         => '',
			'type'        => 'checkbox',
			'class'       => '',
		  );	
	
	//END HOME PAGE SLIDER

	// FOOTER
  $options[] = array(
		  'icon' => 'fa-hand-o-down',
		  'name' => __('Footer', 'onetone'),
		  'type' => 'heading');
	
  $options[] =  array(
		  'id'          => 'footer_widgets_area_options',
		  'name'       => __( 'Footer Widgets Area Options', 'onetone' ),
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'footer_tab_section',
		  'rows'        => '4',
		  'class'       => 'sub_section_titled',
		);
  
  $options[] =  array(
		  'id'          => 'enable_footer_widget_area',
		  'name'       => __( 'Display footer widgets?', 'onetone' ),
		  'desc'       => __( 'Choose to display footer widgets', 'onetone' ),
		  'std'         => '',
		  'type'        => 'checkbox',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		);
  
  $options[] =  array(
		  'id'          => 'footer_columns',
		  'name'       => __( 'Number of Footer Columns', 'onetone' ),
		  'desc'       => __( 'Set column number for footer widget area', 'onetone' ),
		  'std'         => '4',
		  'type'        => 'select',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		  'options'     => array( 
			'1'     => '1',
			'2'     => '2',
			'3'     => '3',
			'4'     => '4',
		  ),
		);
  
  $options[] =  array(
		  'id'          => 'footer_background_image',
		  'name'       => __( 'Upload Background Image', 'onetone' ),
		  'desc'       => __( 'Choose to upload background image for footer', 'onetone' ),
		  'std'         => '',
		  'type'        => 'upload',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		);
  
  $options[] =  array(
		  'id'          => 'footer_bg_full',
		  'name'        => __( '100% Background Image', 'onetone' ),
		  'desc'        => __( 'Select yes to have the footer widgets area background image display at 100% in width and height and scale according to the browser size.', 'onetone' ),
		  'std'         => 'no',
		  'type'        => 'select',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		  'options'     => $choices_reverse
		);
  
  $options[] =  array(
		  'id'          => 'footer_parallax_background',
		  'name'       => __( 'Parallax Background Image', 'onetone' ),
		  'desc'       => __( 'Choose to set parallax background effect for footer', 'onetone' ),
		  'std'         => 'no',
		  'type'        => 'select',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		  'options'     => $choices_reverse
		);
  
  $options[] =  array(
		  'id'          => 'footer_background_repeat',
		  'name'       => __( 'Background Repeat', 'onetone' ),
		  'desc'       => __( 'Set repeat for background image in footer', 'onetone' ),
		  'std'         => 'repeat',
		  'type'        => 'select',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		  'options'     => $repeat
		);
  
  $options[] =  array(
		  'id'          => 'footer_background_position',
		  'name'       => __( 'Background Position', 'onetone' ),
		  'desc'       => __( 'Set position for background image in footer', 'onetone' ),
		  'std'         => 'top left',
		  'type'        => 'select',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		  'options'     => $position
		);
  
  $options[] =  array(
		  'id'          => 'footer_top_padding',
		  'name'       => __( 'Footer Top Padding', 'onetone' ),
		  'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
		  'std'         => '60px',
		  'type'        => 'text',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		);
  
  $options[] =  array(
		  'id'          => 'footer_bottom_padding',
		  'name'       => __( 'Footer Bottom Padding', 'onetone' ),
		  'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
		  'std'         => '40px',
		  'type'        => 'text',
		  'section'     => 'footer_tab_section',
		  'class'       => '',
		);
  
  $options[] =  array(
        'id'          => 'copyright_options',
        'name'       => __( 'Copyright Options', 'onetone' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'footer_tab_section',
        'rows'        => '4',
        'class'       => 'sub_section_titled',
      );
  
$options[] =  array(
        'id'          => 'display_copyright_bar',
        'name'       => __( 'Display Copyright Bar', 'onetone' ),
        'desc'       => __( 'Choose to display copyright bar', 'onetone' ),
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'footer_tab_section',
        'class'       => '',
        'options'     => $choices
      );

$options[] =  array(
        'id'          => 'copyright',
        'name'       => __( 'Copyright Text', 'onetone' ),
        'desc'        => __( 'Enter the text that displays in the copyright bar. HTML markup can be used.', 'onetone' ),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer_tab_section',
        'rows'        => '4',
        'class'       => '',
        
      );

$options[] =  array(
        'id'          => 'copyright_top_padding',
        'name'       => __( 'Copyright Top Padding', 'onetone' ),
        'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
        'std'         => '20px',
        'type'        => 'text',
        'section'     => 'footer_tab_section',
        'class'       => '',
        
      );

$options[] =  array(
        'id'          => 'copyright_bottom_padding',
        'name'       => __( 'Copyright Bottom Padding', 'onetone' ),
        'desc'        => __( 'In pixels or percentage, ex: 10px or 10%.', 'onetone' ),
        'std'         => '20px',
        'type'        => 'text',
        'section'     => 'footer_tab_section',
        'class'       => '',
        
      );

  $options[] =  array(
		  'id'          => 'footer_social_icons',
		  'name'       => __( 'Footer Social Icons', 'onetone' ),
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'textblock-titled',
		  'section'     => 'footer_tab_section',
		  'rows'        => '4',
		  'class'       => 'sub_section_titled',
		  
		);

 if( $social_icons ):
 $i = 1;
 foreach($social_icons as $social_icon){
	
	 $options[] =  array(
			'id'          => 'footer_social_title_'.$i,
			'name'       => __( 'Social Title', 'onetone' ) .' '.$i,
			'desc'       => __( 'Set title for social icon', 'onetone' ),
			'std'         => $social_icon['title'],
			'type'        => 'text',
			'section'     => 'footer_tab_section',
			'class'       => '',
			
      );
	 $options[] = array(
			'id'          => 'footer_social_icon_'.$i,
			'name'       => __( 'Social Icon', 'onetone' ).' '.$i,
			'desc'        => __( 'Choose FontAwesome icon', 'onetone' ),
			'std'         => $social_icon['icon'],
			'type'        => 'text',
			'section'     => 'footer_tab_section',
			'class'       => '',
			
		  );
	 $options[] = array(
			'id'          => 'footer_social_link_'.$i,
			'name'       => __( 'Social Icon Link', 'onetone' ).' '.$i,
			'desc'       => __( 'Set link for social icon', 'onetone' ),
			'std'         => $social_icon['link'],
			'type'        => 'text',
			'section'     => 'footer_tab_section',
			'class'       => '',
			
		  );

	 $i++;
	 }
	endif;	
		
	   // 404
	  
	  $options[] = array(	
				   'icon' => 'fa-frown-o',
				   'name' => __('404 page', 'onetone'),
				   'type' => 'heading'
				   );
	  $options[] = array(
	  
	  'name' => __('404 page content', 'onetone'),
	  'desc' => '',
	  'id' => 'content_404',
	  'std' => '<h2>WHOOPS!</h2>
					  <p>THERE IS NOTHING HERE.<br>PERHAPS YOU WERE GIVEN THE WRONG URL?</p>',
	  'type' => 'editor');	  
	   // Blog
	  
	  $options[] = array(	
	   'icon' => 'fa-bold',
	   'name' => __('Blog', 'onetone'),
	   'type' => 'heading'
	   );
	  
	  $options[] =  array(
	  'id'          => 'display_author_info',
	  'name'       => __( 'Display Author Info?', 'onetone' ),
	  'desc'        => __('Display author info on single page.', 'onetone'),
	  'std'         => '1',
	  'type'        => 'checkbox',
	  'class'       => '',
	);
	  $options[] =  array(
	  'id'          => 'display_related_posts',
	  'name'       => __( 'Display Related Posts?', 'onetone' ),
	  'desc'        => __('Display related posts on single page.', 'onetone'),
	  'std'         => '1',
	  'type'        => 'checkbox',
	  'class'       => '',
	);
	  
  // Options Backup
	  $options[] = array(
	  'icon' => 'fa-files-o',
	  'name' => __('Options Backup', 'onetone'),
	  'type' => 'heading');
	  
	  $options[] =   	 array(
	  'id'          => 'options-backup',
	  'name'       => __('Options Backup', 'onetone'),
	  'desc'        => '',
	  'std'         => '',
	  'type'        => 'textblock-titled',
	  'rows'        => '',
	  'class'       => 'sub_section_titled',
	  );
	  
	$backup_list      = get_option('onetone_options_backup');
	$backup_list_html = '';
	if( is_array($backup_list) && $backup_list != NULL )
	{
		foreach( $backup_list as $backup_item ){
			
			$backup_list       = get_option('onetone_options_backup_'.$backup_item);
			$backup_list_html .= '<tr id="tr-'.$backup_item.'">
  <td style="padding-left:20px;"> '.__('Backup', 'onetone').' '.date('Y-m-d H:i:s',$backup_item).'</td>
  <td><a class="button" id="onetone-restore-btn" data-key="'.$backup_item.'" href="#"><i class="fa fa-refresh"></i> '.__('Restore', 'onetone').'</a></td>
  <td><a class="button" id="onetone-delete-btn" data-key="'.$backup_item.'" href="#"><i class="fa fa-remove"></i> '.__('Delete', 'onetone').'</a></td>
</tr>';
			}
		
		}
	
	$options[] = array(
						'name' => '',
						'desc' => '
						<div class="onetone-desc"> <a class="button" id="onetone-backup-btn" href="#">'.__('Create New Backup', 'onetone').'</a> <span style=" padding-left:20px; display:none; color:green;" class="onetone-backup-complete">'.__('Theme options have been backuped.', 'onetone').'</span></div>
						<table width="100%" border="1" id="onetone-backup-lists" style=" margin-top:50px;">
					  '.$backup_list_html.'   </table>',
						'id' => 'options_backup',
						'std' => '',
						'type' => 'info',
						'class'=>'',
						);
		
	return $options;
}
endif;