<?php 
function extraordinaryvision_customize_css(){
  $mytheme_detects=get_option('mytheme_detects');
$mytheme_nav_hover=get_option('mytheme_nav_hover');
$mytheme_nav_img=get_option('mytheme_nav_img');
$mytheme_move_nav_img=get_option('mytheme_move_nav_img');

$mytheme_nav_title=get_option('mytheme_nav_title');
$mytheme_nav_title2=get_option('mytheme_nav_title2');


$enter_p=get_option('mytheme_enter_p');
$mytheme_index_blue=get_option('mytheme_index_blue');
$mytheme_search_color=get_option('mytheme_search_color');
$mytheme_buy_color=get_option('mytheme_buy_color');
$mytheme_ppc_color=get_option('mytheme_ppc_color');
$mytheme_link_color=get_option('mytheme_link_color');
$mytheme_3d_open=get_option('mytheme_3d_open');
$mytheme_tops_pic=get_option('mytheme_tops_pic');
$mytheme_form_pic_hover=get_option('mytheme_form_pic_hover');
$mytheme_body_pic=get_option('mytheme_body_pic');
$mytheme_textzise_color=get_option('mytheme_textzise_color');
$mytheme_textlinehight_color=get_option('mytheme_textlinehight_color');
	$footer_grel=get_option('mytheme_footer_grel');
	$footer_white=get_option('mytheme_footer_white');
	$mytheme_move_nav2_img=get_option('mytheme_move_nav2_img');
	?>
<style id="extraordinaryvision_customize_css" type="text/css">
	 <?php 
	 if($mytheme_body_pic){echo 'body{background: repeat url('.$mytheme_body_pic.')}';}	
	 if($mytheme_nav_hover&&$mytheme_nav_hover!='#ffffff'){echo '.top strong,.top a{color:'.$mytheme_nav_hover.'}';}        
	 if($mytheme_tops_pic){echo '.top_bac{background:repeat-x url('.$mytheme_tops_pic.');opacity:1;filter:Alpha(opacity=100); border:none;}';}	
   
	    if($mytheme_nav_img){echo '.header_down_out{background:'.$mytheme_nav_color.'  '.$mytheme_nav_imgs.';}';}
	    if($mytheme_form_pic_hover){echo '#header_pic_nav li:hover{background:url('.$mytheme_form_pic_hover.')}';}		
		if($mytheme_nav_title&&$mytheme_nav_title!='#ffffff'){echo '#header_pic_nav li b{color:'.$mytheme_nav_title.'}';}  
		if($mytheme_nav_title2&&$mytheme_nav_title2!='#ffffff'){echo '#header_pic_nav li p{color:'.$mytheme_nav_title2.'}';}  
		//头部自定义结束
		if($mytheme_index_blue&&$mytheme_index_blue!='#ff6c00'){echo '.pic_big_bottom_in_nav li p,.m_hd .hd_more,ul li.left_tuwen_text a:hover{ color:'.$mytheme_index_blue.';}
		.news_tabs a.active{border-top:1px solid '.$mytheme_index_blue.';}
		';}
			if($mytheme_search_color&&$mytheme_search_color!='#ff6c00'){echo '#nav_product_mue .title_page a{color:'.$mytheme_search_color.'}
		#nav_product_mue #choose,.nav_product_mu li .sub-menu li a:hover,.select{background-color:'.$mytheme_search_color.'}
		';} 
			if($mytheme_buy_color&&$mytheme_buy_color!='#11a3c2'){echo '#product .buy_btn a.btn{background:'.$mytheme_buy_color.'}';}
			if($mytheme_ppc_color&&$mytheme_ppc_color!='#f2f2f2'){echo '.enter h2{color:'.$mytheme_ppc_color.'}';}
		if($mytheme_link_color&&$mytheme_link_color!='#11a3c2'){echo '.enter a, .canshu a{color:'.$mytheme_link_color.'}';}
		if($mytheme_textzise_color&&$mytheme_textzise_color!='14'){echo '.enter p{font-size:'.$mytheme_textzise_color.'px;'.$mytheme_textlinehight_colors.'}';}
		if($mytheme_textlinehight_color&&$mytheme_textlinehight_color!='28'){$mytheme_textlinehight_colors='line-height:'.$mytheme_textlinehight_color.'px;';}
		if($enter_p=='suojin'){echo '.enter_p{ text-indent: 2em; }';}
		if($footer_white&&$footer_white!='#ffffff'){echo '.footer_in_box b,.footer_about .about_pic, .footer_about .about_text,.about_text,.contact_text_p,.footer_bottom_link li a, #footer_bottom_link p a,#footer_bottom_link p{color:'.$footer_white.';}';}
		if($footer_grel&&$footer_grel!='#ffd800'){echo '.footer_bottom p{color:'.$footer_grel.';}';}
		if(is_user_logged_in()&&!get_option('hidden_login')){echo '.header_down_out_fixed{top:32px;}';}
		if($mytheme_move_nav2_img&&$detect->isMobile()||$mytheme_detects=='value2'){echo '.header_in{ background:url('.$mytheme_move_nav2_img.');}';}
		if($mytheme_3d_open=='value2'){echo '.header_in span#nav_b{color:#333;background-position:-284px -286px;}.closed_nav_b{background-position:-284px -346px!important}';
			
			}
	  ?>
    </style>
<?php }
add_action( 'wp_head', 'extraordinaryvision_customize_css');
?>              