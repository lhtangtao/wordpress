<div class="relevat_div" id="left_mian">
<b class="relevat_title"><?php $word_t44=get_option('mytheme_word_t44'); if($word_t44!=""){echo $word_t44;}else{echo '相关推荐';}  ?></b>

   <div class="case_in">
         <ul class="slides">
<?php
 $theme_shop_open = get_option('mytheme_theme_shop_open'); 
if(get_option('mytheme_pic_size_singln')){  $pic_size_singln= get_option('mytheme_pic_size_singln'); }else{$pic_size_singln= 'case';}
$detect = new Mobile_Detect();
if($detect->isMobile()){$textweidht='30';}else{$textweidht='80';}
$post_num =8;
$exclude_id = $post->ID;
$posttags = get_the_tags(); $i = 0;
if ( $posttags ) {
	$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ',';
	$args = array(
		'post_status' => 'publish',
		'tag__in' => explode(',', $tags),
		'post__not_in' => explode(',', $exclude_id),
		'caller_get_posts' => 1,
		'orderby' => 'rand',
		'posts_per_page' => $post_num,
	);
	query_posts($args);
	while( have_posts() ) { the_post(); 
	
	
	?>
    	  <?php 
		   $tit= get_the_title();
		    $id =get_the_ID();
		   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    
			
		 ?>
              <?php 
		   $tit= get_the_title();
		    $id =get_the_ID(); 
		   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    $target =get_post_meta($id,"hots_tlye", true);
			 $word_t1=get_option('mytheme_word_t1');
			   $price = get_post_meta($id, 'shop_price', true);
          	$original_price=get_post_meta($id,"original_price", true);
		 ?>
          
          
       <?php 
		 $id=get_the_ID();
	
  $tit= get_the_title($id);
  $linkss=get_post_meta($id,"hoturl", true); 
    $price = get_post_meta($id, 'shop_price', true);
    $original_price=get_post_meta($id,"original_price", true);
		 ?>
          
     <li class="slider">
             <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="case_pic">
              <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
            <?php  if (has_post_thumbnail()) { the_post_thumbnail($pic_size_singln ,array('alt'	=>$tit, 'title'=> $tit ));}
		   else{echo '<img src="'. get_bloginfo('template_url').'/images/demo/vedio.gif" />';} ?>
          
          </a>
             <h2><a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf8'); ?></a></h2>
            
             <?php if( $price ){ ?>
                     <div class="black_price_out">
                      
                       <?php if($original_price){ ?><span class="black_price_yj">￥<?php echo $original_price  ?></span><?php } ?>
                      <span class="black_price">￥<?php echo $price  ?></span>
                    
                     </div>
                     <?php  if($theme_shop_open)    {?>  <div id="stars__<?php echo shop_comment_stars();?>"class="srar case_satar"></div><?php } ?>
                     <?php }else{ ?>
                      <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$textweidht,"...",'utf-8'); ?></p>
                     <?php } ?>
            
             </li>


  
             
           
	<?php
		$exclude_id .= ',' . $post->ID; $i ++;
	} wp_reset_query();
}
if ( $i < $post_num ) {
	$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
	$args = array(
		'category__in' => explode(',', $cats),
		'post__not_in' => explode(',', $exclude_id),
		'caller_get_posts' => 1,
		'orderby' => 'rand',
		'posts_per_page' => $post_num - $i
	);
	query_posts($args);
	while( have_posts() ) { the_post(); 
	
		$id =get_the_ID(); 
	$author_id=get_the_author_meta( 'ID' );
	$bbs_post_avatar=get_option('bbs_post_avatar');
	
	?>
		    <?php 
		   $tit= get_the_title();
		    $id =get_the_ID();
		   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    $target =get_post_meta($id,"hots_tlye", true);
			
		 ?>
       <?php 
		   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $linkss=get_post_meta($id,"hoturl", true); 
    $price = get_post_meta($id, 'shop_price', true);
    $original_price=get_post_meta($id,"original_price", true);
		 ?>
          
<li class="slider">
             <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="case_pic">
              <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
            <?php  if (has_post_thumbnail()) { the_post_thumbnail($pic_size_singln ,array('alt'	=>$tit, 'title'=> $tit ));}
		   else{echo '<img src="'. get_bloginfo('template_url').'/images/demo/vedio.gif" />';} ?>
          
          </a>
             <h2><a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf8'); ?></a></h2>
            
             <?php if( $price ){ ?>
                     <div class="black_price_out">
                      
                       <?php if($original_price){ ?><span class="black_price_yj">￥<?php echo $original_price  ?></span><?php } ?>
                      <span class="black_price">￥<?php echo $price  ?></span>
                    
                     </div>
                     <?php  if($theme_shop_open)    {?>  <div id="stars__<?php echo shop_comment_stars();?>"class="srar case_satar"></div><?php } ?>
                     <?php }else{ ?>
                       <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$textweidht,"...",'utf-8'); ?></p>
                     <?php } ?>
            
             </li>
           
	<?php $i++;
	} wp_reset_query();
}
if ( $i  == 0 )  echo '';
?>
</ul>
</div>
</div>