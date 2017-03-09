<?php

 	/*	
	*	get background 
	*	---------------------------------------------------------------------
	*/
function onetone_get_background($args){
  $background = '';
 if (is_array($args)) {
	if (isset($args['image']) && $args['image']!="") {
	$args['repeat']     = isset( $args['repeat'] )? esc_attr($args['repeat']) : '';
	$args['position']   = isset( $args['position'] )? esc_attr($args['position']) : '';
	$args['attachment'] = isset( $args['attachment'] )? esc_attr($args['attachment']) : '';
	
	$background .=  "background:url(".esc_url( $args['image'] ). ")  ".$args['repeat']." ".$args['position']." ".$args['attachment'].";";
	}
	
	if(isset($args['color']) && $args['color'] !=""){
	$background .= "background-color:".esc_attr($args['color']).";";
	}
	}

return $background;

}

 	/*	
	*	send email
	*	---------------------------------------------------------------------
	*/
function onetone_contact(){
	if(trim($_POST['Name']) === '') {
		$Error = __('Please enter your name.','onetone');
		$hasError = true;
	} else {
		$name = trim($_POST['Name']);
	}

	if(trim($_POST['Email']) === '')  {
		$Error = __('Please enter your email address.','onetone');
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['Email']))) {
		$Error = __('You entered an invalid email address.','onetone');
		$hasError = true;
	} else {
		$email = trim($_POST['Email']);
	}

	if(trim($_POST['Message']) === '') {
		$Error =  __('Please enter a message.','onetone');
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['Message']));
		} else {
			$message = trim($_POST['Message']);
		}
	}

	if(!isset($hasError)) {
	   if (isset($_POST['sendto']) && preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['sendto']))) {
	     $emailTo = $_POST['sendto'];
	   }
	   else{
	 	 $emailTo = get_option('admin_email');
		}
		 if($emailTo !=""){
		$subject = 'From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
		}
		echo json_encode(array("msg"=>__("Your message has been successfully sent!","onetone"),"error"=>0));
		
	}
	else
	{
	echo json_encode(array("msg"=>$Error,"error"=>1));
	}
	die() ;
	}
	add_action('wp_ajax_onetone_contact', 'onetone_contact');
	add_action('wp_ajax_nopriv_onetone_contact', 'onetone_contact');
	
// get breadcrumbs
 function onetone_get_breadcrumb( $options ){
   global $post,$wp_query ;
    $postid = isset($post->ID)?$post->ID:"";
	
   $show_breadcrumb = "";
   if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) { 
      $postid = $wp_query->get_queried_object_id();
   }
  
   if(isset($postid) && is_numeric($postid)){
      $show_breadcrumb = get_post_meta( $postid, '_onetone_show_breadcrumb', true );
	}
	if($show_breadcrumb == 'yes' || $show_breadcrumb==""){

      onetone_breadcrumb_trail( $options);           
	}
	   
	}
	
/*
*  page navigation
*
*/
function onetone_native_pagenavi($echo,$wp_query){
    if(!$wp_query){global $wp_query;}
    global $wp_rewrite;      
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'prev_text' => '&laquo; ',
    'next_text' => ' &raquo;'
    );
 
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
 
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));
		
    if($echo == "echo"){
        echo '<div class="page_navi post-list-pagination"><div class="text-center">'.paginate_links($pagination).'</div></div>'; 
	}else
	{
	    return '<div class="page_navi post-list-pagination"><div class="text-center">'.paginate_links($pagination).'</div></div>';
	}
}
   
    //// Custom comments list
   
   function onetone_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ;?>">
     <div id="comment-<?php comment_ID(); ?>">
     
     <div class="comment media-comment media">
                                                    <div class="media-avatar media-left">
                                                       <?php echo get_avatar($comment,'52','' ); ?>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="media-inner">
                                                            <h4 class="media-heading clearfix">
                                                                <?php echo get_comment_author_link();?> - <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ;?>">
<?php printf(__('%1$s at %2$s','onetone'), get_comment_date(), get_comment_time()) ;?></a>
                                                                <?php edit_comment_link(__('(Edit)','onetone'),'  ','') ;?>
                                                                <?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-reply"></i> '. __('Reply','onetone'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ;?>
                                                            </h4>
                                                            
                                                            <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.','onetone') ;?></em>
         <br />
      <?php endif; ?>
                                                           <?php comment_text() ;?>
                                                        </div>
                                                    </div>
                                                </div>
                                <div class="clear"></div>
                           </div>
<?php
        }
		
	
	function onetone_get_default_slider(){
	
	$sanitize_title = "home";
	$section_menu   = onetone_option( 'menu_title_0' );
	$section_slug   = onetone_option( 'menu_slug_0' );
	
	if( $section_menu  != "" ){
	  $sanitize_title = sanitize_title($section_menu );
	  
	  if( trim($section_slug) !="" ){
		  
	   $sanitize_title = sanitize_title($section_slug);
	   
	   }
 }
	 
	$return = '<section id="'.$sanitize_title.'" class="section homepage-slider onetone-'.$sanitize_title.'"><div id="onetone-owl-slider" class="owl-carousel">';
	 for($i=1;$i<=10;$i++){
		 
	   $active     = '';
	   $text       = onetone_option('onetone_slide_text_'.$i);
	   $image      = onetone_option('onetone_slide_image_'.$i);
	   $btn_txt    = onetone_option('onetone_slide_btn_txt_'.$i);
	   $btn_link   = onetone_option('onetone_slide_btn_link_'.$i);
	   $btn_target = onetone_option('onetone_slide_btn_target_'.$i);
		 
	   $btn_str    = '';
	   
	   if( $btn_txt != '' ){
		   
		   $btn_str = '<br/><a class="btn" target="'.esc_attr($btn_target).'" href="'.esc_url($btn_link).'">'.do_shortcode($btn_txt).'</a>';
		   
			 }
	
     if( trim($image) != "" ){
		 
       $return .= '<div class="item"><img src="'.esc_url($image).'" alt=""><div class="inner"><div class="caption"><div class="caption-inner">'. do_shortcode($text) .$btn_str.'</div></div></div></div>';
	 
	 }

	}
	
		$return .= '</div></section>';

        return $return;
   }

/**
 * onetone admin panel menu
 */
 
   add_action( 'optionsframework_page_title_after','onetone_options_page_title' );

function onetone_options_page_title() { ?>

		          <ul class="options-links">
                  <li><a href="<?php echo esc_url( 'https://www.mageewp.com/onetone-pro-theme.html' ); ?>" target="_blank"><?php _e( 'Upgrade to Pro', 'onetone' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'https://www.mageewp.com/wordpress-themes/' ); ?>" target="_blank"><?php _e( 'MageeWP Themes', 'onetone' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'https://www.mageewp.com/manuals/theme-guide-onetone.html' ); ?>" target="_blank"><?php _e( 'Manual', 'onetone' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'https://www.mageewp.com/documents/faq/' ); ?>" target="_blank"><?php _e( 'FAQ', 'onetone' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'https://www.mageewp.com/knowledges/' ); ?>" target="_blank"><?php _e( 'Knowledge', 'onetone' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'https://www.mageewp.com/forums/onetone/' ); ?>" target="_blank"><?php _e( 'Support Forums', 'onetone' ); ?></a></li>
                  </ul>
      			
<?php
}
 
 /**
 * back to top
 */
 
function onetone_back_to_top(){
	
	$back_to_top_btn = onetone_option("back_to_top_btn");
	if( $back_to_top_btn != "hide" ){
    echo '<a href="javascript:;">
        	<div id="back-to-top">
        		<span class="fa fa-arrow-up"></span>
            	<span>'.__("TOP","onetone").'</span>
        	</div>
        </a>';
	}
        }
        
  add_action( 'wp_footer', 'onetone_back_to_top' );
  
// get social icon

function onetone_get_social( $position, $class = 'top-bar-sns',$placement='top',$target='_blank'){
	
   global $social_icons;
   $return = '';
   $rel    = '';
   
   $social_links_nofollow  = onetone_option( 'social_links_nofollow','no' ); 
   $social_new_window = onetone_option( 'social_new_window','yes' ); 
   
   if( $social_new_window == 'no')
     $target = '_self';
   
   if( $social_links_nofollow == 'yes' )
     $rel    = 'nofollow';
   
   if(is_array($social_icons) && !empty($social_icons)):
     $return .= '<ul class="'.esc_attr($class).'">';
     $i = 1;
   foreach($social_icons as $sns_list_item){
	 
		 $icon = onetone_option( $position.'_social_icon_'.$i,'' );  
		 $title = onetone_option( $position.'_social_title_'.$i,'' );
		 $link = onetone_option( $position.'_social_link_'.$i,'' );  
	if(  $icon !="" ){
	 $return .= '<li><a target="'.esc_attr($target).'" rel="'.$rel.'" href="'.esc_url($link).'" data-placement="'.esc_attr($placement).'" data-toggle="tooltip" title="'.esc_attr( $title).'"><i class="fa fa-'.esc_attr( $icon).'"></i></a></li>';
	} 
	$i++;
	} 
	$return .= '</ul>';
	endif;
	return $return ;
	}
	
 // get top bar content

 function onetone_get_topbar_content( $type =''){

	 switch( $type ){
		 case "info":
		 echo '<div class="top-bar-info">';
		 echo onetone_option('top_bar_info_content');
		 echo '</div>';
		 break;
		 case "sns":
		 $tooltip_position = onetone_option('top_social_tooltip_position','bottom'); 
		 echo onetone_get_social('header','top-bar-sns',$tooltip_position);
		 break;
		 case "menu":
		 echo '<nav class="top-bar-menu">';
		 wp_nav_menu(array('theme_location'=>'top_bar_menu','depth'=>1,'fallback_cb' =>false,'container'=>'','container_class'=>'','menu_id'=>'','menu_class'=>'','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
		 echo '</nav>';
		 break;
		 case "none":
		
		 break;
		 }
	 }
	 
/**
 * Convert Hex Code to RGB
 * @param  string $hex Color Hex Code
 * @return array       RGB values
 */
 
function onetone_hex2rgb( $hex ) {
	
		if ( strpos( $hex,'rgb' ) !== FALSE ) {

			$rgb_part = strstr( $hex, '(' );
			$rgb_part = trim($rgb_part, '(' );
			$rgb_part = rtrim($rgb_part, ')' );
			$rgb_part = explode( ',', $rgb_part );

			$rgb = array($rgb_part[0], $rgb_part[1], $rgb_part[2], $rgb_part[3]);

		} elseif( $hex == 'transparent' ) {
			$rgb = array( '255', '255', '255', '0' );
		} else {

			$hex = str_replace( '#', '', $hex );

			if( strlen( $hex ) == 3 ) {
				$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
				$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
				$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
			} else {
				$r = hexdec( substr( $hex, 0, 2 ) );
				$g = hexdec( substr( $hex, 2, 2 ) );
				$b = hexdec( substr( $hex, 4, 2 ) );
			}
			$rgb = array( $r, $g, $b );
		}

		return $rgb; // returns an array with the rgb values
	}

/**
 * load less
 */
 
function onetone_enqueue_less_styles($tag, $handle) {
	
		global $wp_styles;
		$match_pattern = '/\.less$/U';
		if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
			$handle = $wp_styles->registered[$handle]->handle;
			$media = $wp_styles->registered[$handle]->args;
			$href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
			$rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
			$title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';
	
			$tag = "<link rel='stylesheet/less' id='$handle' $title href='$href' type='text/less' media='$media' />\n";
		}
		return $tag;
	}
add_filter( 'style_loader_tag', 'onetone_enqueue_less_styles', 5, 2);

// get related posts
	
 function onetone_get_related_posts($post_id, $number_posts = -1,$post_type = 'post') {
	 
	$query = new WP_Query();

    $args = '';

	if($number_posts == 0) {
		return $query;
	}

	$args = wp_parse_args($args, array(
		'posts_per_page' => $number_posts,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
        'meta_key' => '_thumbnail_id',
        'category__in' => wp_get_post_categories($post_id),
		'post_type' =>$post_type 
	));

	$query = new WP_Query($args);
    wp_reset_postdata(); 
  	return $query;
}

if ( ! function_exists( 'onetone_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function onetone_paging_nav($echo='echo',$wp_query='') {
	
    if(!$wp_query){global $wp_query;}
    global $wp_rewrite;      
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
	'base' => @add_query_arg('paged','%#%'),
	'format'             => '?page=%#%',
	'total'              => $wp_query->max_num_pages,
	'current'            => $current,
	'show_all'           => false,
	'end_size'           => 1,
	'mid_size'           => 2,
	'prev_next'          => true,
	'prev_text'          => __(' Prev', 'onetone'),
	'next_text'          => __('Next ', 'onetone'),
	'type'               => 'list',
	'add_args'           => false,
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => ''
);
 
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
 
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));
		
	if( $wp_query->max_num_pages > 1 ){
    if($echo == "echo"){
       echo '<nav class="post-pagination post-list-pagination" role="navigation"><div class="post-pagination-decoration"></div>'.paginate_links($pagination).'</nav>'; 
	}else
	{
	   return '<nav class="post-pagination post-list-pagination" role="navigation"><div class="post-pagination-decoration"></div>'.paginate_links($pagination).'</nav>';
	}
	
	}
}
endif;

/**
 * Display navigation to next/previous post when applicable.
 */
 
if ( ! function_exists( 'onetone_post_nav' ) ) :

function onetone_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
    <nav class="post-pagination" role="navigation">
                                        <ul class="clearfix">
                                        <?php
											previous_post_link( '<li class="pull-left">%link</li>', '%title' );
											next_post_link(     '<li class="pull-right">%link</li>', '%title' );
										?>
                                        </ul>
                                    </nav>  
                                    
	<!-- .navigation -->
	<?php
}
endif;

// get post content css class
 function onetone_get_content_class( $sidebar = '' ){

	 if( $sidebar == 'left' )
	 return 'left-aside';
	 if( $sidebar == 'right' )
	 return 'right-aside';
	 if( $sidebar == 'both' )
	 return 'both-aside';
	  if( $sidebar == 'none' )
	 return 'no-aside';
	
	 return 'no-aside';
	 
	 }
	 
	 
// footer tracking code
	
 function onetone_tracking_code(){
   $tracking_code = onetone_option('tracking_code');
   echo $tracking_code;
 } 

add_action('wp_footer', 'onetone_tracking_code'); 

 // Space before </head>
	
 function onetone_space_before_head(){
   $space_before_head = onetone_option('space_before_head');
   echo $space_before_head;
 } 

add_action('wp_head', 'onetone_space_before_head'); 


 // Space before </body>
	
 function onetone_space_before_body(){
   $space_before_body = onetone_option('space_before_body');
   echo $space_before_body;
 } 

add_action('wp_footer', 'onetone_space_before_body'); 

add_action('init', 'onetone_html_tags_code', 10);
function onetone_html_tags_code() {
	
  global $allowedposttags;

    $allowedposttags["javascript"] = array("src" => array(),"type" => array());
    $allowedposttags["style"] = array("type" => array());
	$allowedposttags["link"] = array("rel" => array(),"href" => array(),"id" => array(),"type" => array(),"media" => array());

}


// ################################## fonts family
   /**
 * Returns an array of system fonts
 */
 
function onetone_options_typography_get_os_fonts() {
    // OS Font Defaults
    $os_faces = array(
            'Arial, sans-serif' => 'Arial',
	     //   '"Avant Garde", sans-serif' => 'Avant Garde',
	        'Cambria, Georgia, serif' => 'Cambria',
			'Calibri,sans-serif' => 'Calibri' ,
	        'Copse, sans-serif' => 'Copse',
	        'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
	        'Georgia, serif' => 'Georgia',
	        '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
	        'Tahoma, Geneva, sans-serif' => 'Tahoma',
			'Lustria,serif' => 'Lustria'
	    );
	    return $os_faces;
	}
	
 function onetone_get_typography( $option= array(),$name= array()){
	 
	 $return = "";
	 if( $option && is_array($option) ):
		 if(isset($name) && !empty($name)){
		  
		    if( in_array('face',$name) && $option['face']){
			$return .= 'font-family:'.$option['face'].';' ;
			}
			if( in_array('size',$name) && isset($option['size']))
			$return .= 'font-size:'.$option['size'].';' ;
		    if( in_array('style',$name) && $option['style'])
			$return .= 'font-weight:'.$option['style'].';' ;
			if( in_array('color',$name) && $option['color'])
			$return .= 'color:'.$option['color'].';' ;
			
        }else{
		 
		 if($option['face']){
		 $return .= 'font-family:'.$option['face'].';' ;
		 }
		 if(isset($option['size']))
		 $return .= 'font-size:'.$option['size'].';' ;
		 if($option['style'])
		 $return .= 'font-weight:'.$option['style'].';' ;
		 if($option['color'])
		 $return .= 'color:'.$option['color'].';' ;
			
		 }
	endif;
	return $return ;
	 
	 } 
	 

function onetone_is_plugin_active( $plugin ) {
	
    return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
}
 
/****
 onetone admin page
****/

function onetone_admin_tabs( $current = 'onetone' ) {
	
	echo '<style>.theme-support,.onetone-wrap {
    padding: 0 20px;
    font-size: 1.2em;
    line-height: 2;
}
.theme-support,
.onetone-wrap p {
    font-size: 14px;
    line-height: 1.7;
}
.theme-support p {
    font-size: 14px;
    line-height: 1.7;
}

.theme-support h4 {
    font-size: 1.1em;
}

.onetone-wrap .nav-tab {
    line-height: 1.8;
}

.col-1-3 {
    width: 30%;
    float: left;
    margin-right: 5%;
}

.col-1-3.last {
    margin-right: 0;
}</style>';
	echo '<div class="onetone-wrap">
  <div class="onetone-desc">';
	echo '<h2>'.__('About Onetone','onetone').'</h2>';
	echo '<div class="">';
	_e('Based on Bootstrap and coded with HTML5 and CSS3 language, Onetone is fully responsive in desktops and mobile devices. With enriched settings in theme options , you can not only change header and footer patterns, but also customize background colors, page layouts and social links, etc. Read below for additional information about Onetone.','onetone');
	echo '</div>';
	echo '</div></div>';
	
    $tabs = array( 'onetone' => __('Theme Support', 'onetone' ) );
    echo '<div id="icon-themes" class=""><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
	if( isset($_GET['page']) && $_GET['page'] !=''  )
	$current = $_GET['page'];
	
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=$tab'>$name</a>";

    }
    echo '</h2>';
}


function onetone_register_admin_menu_page(){
	
	add_theme_page('About Onetone', 'About Onetone', 'edit_theme_options', 'onetone', 'onetone_menu_page');
	
}

add_action( 'admin_menu', 'onetone_register_admin_menu_page' );

function onetone_menu_page(){
	
	onetone_admin_tabs();
	
	_e('<div class="theme-support"><div class="col-1-3">
  <h4>Documentation</h4>
  <p>The online documentaiton for Onetone is an incredible resource for learning how to use Onetone. You could follow this manual step by step to build your site.</p>
  <a class="button button-primary" href="https://www.mageewp.com/manuals/theme-guide-onetone.html" target="_blank">Documentation</a>
</div>
<div class="col-1-3">
  <h4>Support Forum</h4><p>We also have a support forum for users to communicate. If you have any problem while using this theme, feel free to post in the forum. Our support team would reply you asap.</p>
<a class="button button-primary" href="https://www.mageewp.com/forums/onetone/" target="_blank">Support Forum</a>  
</div>
<div class="col-1-3 last">
  <h4>Theme Center</h4><p>Like our themes? Come here to get more.</p>
<a class="button button-primary" href="https://www.mageewp.com/wordpress-themes/" target="_blank">Theme Center</a>
</div></div>', "onetone" );
}
	
// Onetone guide tips
  global $onetone_options_saved;
  $onetone_close_guide = get_option('onetone_close_guide');
  if( $onetone_close_guide != '1' )
  if( (!isset($_GET['page']) || ($_GET['page'] !='onetone-options' && $_GET['page'] !='import-demos' && $_GET['page'] !='onetone' ) ) && $onetone_options_saved == false  )
  add_action('admin_menu', 'onetone_guide_submenu_page');

function onetone_guide_submenu_page() {
	
	// add_theme_page(__('Import Onetone Demos', 'onetone' ),__('Import Onetone Demos', 'onetone' ), 'edit_theme_options', 'import-demos', 'onetone_import_demos');
	 
	add_theme_page( __('Onetone step 2', 'onetone' ),  '<div class="onetone-guide onetone-step-2-text"><h2>'.__('Customize Content for Homepage', 'onetone' ).' <span class="onetone-close-guide" style="float:right;">X</span></h2>
<p>'.__('Open this page to edit content for homepage and customize styles of the site.', 'onetone' ).'</p><div id="onetone-step-1-text" style=" display:none;"><div class="onetone-step-1"><div class="onetone-guide onetone-step-1-text"><h2>'.__('Customize Content for Homepage', 'onetone' ).' <span class="onetone-close-guide" style="float:right;">X</span></h2><p>'.__('Open this page to edit content for homepage and customize styles of the site.', 'onetone' ).'</p></div></div></div></div>', 'edit_theme_options', 'themes.php?page=onetone-options', '' );
}


/*if( isset($_GET['page']) && $_GET['page'] =='onetone-options' )
add_action('admin_footer', 'onetone_admin_footer_function');

function onetone_admin_footer_function() {
	echo '<div class="onetone-admin-footer" style="height: 60px; display:none;background: rgba(0,0,0,0.5); position:fixed;bottom:0px;padding:15px 0;z-index:99;cursor: pointer;width: 100%;"><span style=" margin-left:180px; font-size:16px;color:#fff;">'.__('To save any changes on onetone options, click on the <strong  style="color:orange;">Save All Options</strong> button on the right side.', 'onetone' ).'</span><button class="button-primary" id="onetone-save-options" style=" float:right;margin-right:50px;">'.__('Save All Options', 'onetone' ).'</button></div>
	<div class="options-saved"><i class="fa fa-check"></i>'.__('Options Updated', 'onetone' ).'</div>
	<div class="options-saving"><i class="fa fa-spinner fa-spin"></i>'.__('Options Saving', 'onetone' ).'</div>
	';
}*/

function onetone_tinymce_init() {
    // Hook to tinymce plugins filter
    add_filter( 'mce_external_plugins', 'onetone_tinymce_plugin' );
}
add_filter('init', 'onetone_tinymce_init');

function onetone_tinymce_plugin($init) {
    // We create a new plugin... linked to a js file.
    // Mine was created from a plugin... but you can change this to link to a file in your plugin
    $init['keyup_event'] = get_template_directory_uri() . '/js/keyup_event.js';
    return $init;
}


add_filter( 'wp_kses_allowed_html', 'onetone_allowedposttags_filter',1,1 );

function onetone_allowedposttags_filter( $allowedposttags ) {

 $allowedposttags['i'] = array ( 'class' => 1,'style' => 1);
 $allowedposttags['input']  = array ( 'class' => 1, 'id'=> 1, 'style' => 1,'name'=>1, 'type' => 1, 'value' => 1 ,'placeholder'=> 1,'size'=> 1,'tabindex'=> 1,'aria-required'=> 1);
 $allowedposttags['iframe'] = array(
					'align' => true,
					'width' => true,
					'height' => true,
					'frameborder' => true,
					'name' => true,
					'src' => true,
					'id' => true,
					'class' => true,
					'style' => true,
					'scrolling' => true,
					'marginwidth' => true,
					'marginheight' => true,
					
  );
	  return $allowedposttags;

}

function onetone_close_guide(){
	
	update_option("onetone_close_guide",'1');
	
	}

add_action('wp_ajax_onetone_close_guide', 'onetone_close_guide');
add_action('wp_ajax_nopriv_onetone_close_guide', 'onetone_close_guide');

/**
// onetone options backup
*/
function onetone_options_backup(){
	
	$options        = array();
	$keys           = array();
	$option_name    = optionsframework_option_name();
	$key            = time();
    $keys           = get_option('onetone_options_backup');
	$keys[]         = $key;
	update_option('onetone_options_backup',$keys,'','no');
	
	$options        = get_option( $option_name );
	add_option( 'onetone_options_backup_'.$key,$options,'','no' );
	
	$list_item = '<tr id="tr-'.$key.'">
    <td style="padding-left:20px;"> '.__('Backup', 'onetone').' '.date('Y-m-d H:i:s',$key).'</td>
    <td><a class="button" id="onetone-restore-btn" data-key="'.$key.'" href="#"><i class="fa fa-refresh"></i> '.__('Restore', 'onetone').'</a></td>
    <td><a class="button" id="onetone-delete-btn" data-key="'.$key.'" href="#"><i class="fa fa-remove"></i> '.__('Delete', 'onetone').'</a></td>
  </tr>';
	echo $list_item;
	
	}
 add_action('wp_ajax_onetone_options_backup', 'onetone_options_backup');
 add_action('wp_ajax_nopriv_onetone_options_backup', 'onetone_options_backup');
 
/**
// delete onetone options backup
*/
 function onetone_options_backup_delete(){
	if( isset($_POST['key'])){
		$key  = $_POST['key'];
		delete_option( 'onetone_options_backup_'.$key );
		$keys = get_option('onetone_options_backup');
   	    
		foreach ($keys as $k=>$v)
		{
			
		   if ($v == $key){
		     unset($keys[$k]);
		   }
		}
	    update_option('onetone_options_backup',$keys,'','no');
	
		}
	
	}
 add_action('wp_ajax_onetone_options_backup_delete', 'onetone_options_backup_delete');
 add_action('wp_ajax_nopriv_onetone_options_backup_delete', 'onetone_options_backup_delete');
 
 /**
// restore onetone options backup
*/
 function onetone_options_backup_restore(){
	if( isset($_POST['key'])){
		$key = $_POST['key'];
		$options        = get_option( 'onetone_options_backup_'.$key );
		$option_name    = optionsframework_option_name();
	    update_option( $option_name, $options );
		_e('Restore successfully.','onetone' ) ;
		exit(0);
	
		}
	
	}
 add_action('wp_ajax_onetone_options_backup_restore', 'onetone_options_backup_restore');
 add_action('wp_ajax_nopriv_onetone_options_backup_restore', 'onetone_options_backup_restore');
 
 
  /**
// save options
*/
 function onetone_save_options(){
	 
	  global $onetone_options_saved,$onetone_default_options,$onetone_home_sections;
	  
	 $onetone_default_options  = Options_Framework_Admin::get_default_values();
	 
	 $nonce = $_REQUEST['_wpnonce'];
	 $section_num = count( $onetone_home_sections );
	if ( ! wp_verify_nonce( $nonce, 'optionsframework-options' ) ) {
	
		 die( 'Security check' ); 
	
	} else {
	
	     $option_name = optionsframework_option_name();
		 $options     = get_option( $option_name ) ;
		 
		 if( !$options ):
		    $options  = $onetone_default_options;
            update_option( $option_name, $options );  
		 
		 endif; 
	   
		 
		 //update font color options
		  for($i=0;$i<$section_num;$i++){ 
		  
				if(isset($options['section_color_'.$i]) && $i !== 0):
				   if( $options['section_content_model_'.$i]== '0' && $options['section_color_'.$i] !== ''){
						   $options['section_content_typography_'.$i]['color'] = $options['section_color_'.$i];
				   }
					
				endif;
				
				if(!isset($options['section_subtitle_typography_'.$i]) && isset($onetone_default_options['section_subtitle_typography_'.$i])):
					 
					$options['section_subtitle_typography_'.$i] = $onetone_default_options['section_subtitle_typography_'.$i];
					
				endif;
			 }
		 			 
		 if( isset($_POST[$option_name])):
		 
		foreach( $_POST[$option_name] as $k => $v ){
			   
			    if( is_array($v) ){
					   
					   foreach( $v as $k1=>$v1){
						   
						   $options[$k][$k1] = stripslashes( $v1 );
						   
						   }
				   
				   }else{
				     $options[$k] = stripslashes($v);
				   }
			   
			   }
			  					 
			 update_option( $option_name, $options );  
		    
		 endif;
	 
	}
	
	exit(0);
	}
	
 add_action('wp_ajax_onetone_save_options', 'onetone_save_options');
 add_action('wp_ajax_nopriv_onetone_save_options', 'onetone_save_options');

 /**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
  if( !function_exists('onetone_option_name') ):
  function onetone_option_name() {
  
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
  
  
/**
Save Options Button
*/

if( isset($_GET['page']) && $_GET['page'] =='onetone-options' )
add_action('admin_footer', 'onetone_admin_footer_function');

function onetone_admin_footer_function() {
	
	echo '<div class="onetone-admin-footer" style="height: 60px; display:none;background: rgba(0,0,0,0.5); position:fixed;bottom:0px;padding:15px 0;z-index:99;cursor: pointer;width: 100%;"><span style=" margin-left:180px; font-size:16px;color:#fff;">'.__('To save any changes on onetone options, click on the <strong  style="color:orange;">'.__('Save Options', 'onetone' ).'</strong> button on the right side.', 'onetone' ).'</span><button class="button-primary" id="onetone-save-options" style=" float:right;margin-right:50px;">'.__('Save Options', 'onetone' ).'</button></div>
	<div class="options-saved"><i class="fa fa-check"></i>'.__('Options Updated', 'onetone' ).'</div>
	<div class="options-saving"><i class="fa fa-spinner fa-spin"></i>'.__('Options Saving', 'onetone' ).'</div>	';
	
}


  function onetone_tiny_mce_before_init( $init ) {
    $init['setup'] = 'function( ed ) { ed.onKeyUp.add( function( ed, e ) { 
	  var fieldID  = e.target.getAttribute("data-id");
     jQuery("#"+fieldID).attr("data-changed","true");
	 jQuery("#optionsframework-submit input[name=\'update\'],#onetone-save-options").removeAttr("disabled");
																
 }); }';
    return $init;
}

add_filter( 'tiny_mce_before_init',  'onetone_tiny_mce_before_init' );