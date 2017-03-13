 <?php 
      $mytheme_detects=get_option('mytheme_detects');
	  $mytheme_top_pic=get_option('mytheme_top_pic');
	  $mytheme_top_pic_move=get_option('mytheme_top_pic_move');
if($mytheme_top_pic){
$backgroud=$mytheme_top_pic;
$top_pic_back= 'style="background:url('.$backgroud.')"';
}


?>


<div id="page_top" <?php echo $top_pic_back; ?>>
<?php if(is_page()): ?>
<div class="page_top_in">
  <?php     $post_data = get_post($post->ID, ARRAY_A);
			
			
			 ?>         
<h1> <?php echo get_the_title()?></h1>
 
</div>

<?php elseif(is_single()): ?>
<div class="page_top_in">
   <?php    $cat = get_category_root_id(the_category_ID(false));
                   $category = get_category($cat);?>
                        
<div> <?php echo $category->name ?></div>
  
</div>

<?php elseif(is_category()): ?>

<div class="page_top_in">
   <?php    $cat = get_category_root_id(the_category_ID(false));
		           $cat2 = get_query_var('cat'); 
				   $category2 = get_category($cat2);
                   $category = get_category($cat);
				   ?>    
<h1>    <?php echo $category2->name . ' <a>'.$category2->category_description  .' </a>'; ?> </a></h1>
    
</div>


<?php elseif(is_tag()): ?>

<div class="page_top_in">
   
<h1> <?php $word_t12=get_option('mytheme_word_t12'); if($word_t8!=""){echo $word_t12;}else{echo '找到标签';}  ?>： <?php single_tag_title(); ?></h1>
    
</div>


<?php elseif(is_day()|is_month()| is_year()): ?>

<div class="page_top_in">
   
<div> <?php the_time('Y/M/D'); ?></div>
    
</div>

<?php elseif(is_search()): ?>

<div class="page_top_in">
   
<div><?php $word_t9=get_option('mytheme_word_t9'); ?>
<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); if($word_t9!=""){echo $word_t9;}else{echo '搜索结果:';} ;echo '"'. $key.'"'; wp_reset_query(); ?>

</div>
    
</div>

<?php else: ?>
<div class="page_top_in">
   
<h1> <?php  wp_title(); ?> 的所有帖子</h1>
    
</div>

<?php endif; ?>


</div>

<div id="page_muen_nav"> 
<?php if(is_single()){$id =get_the_ID();	$bbs_my_page=get_option('bbs_cat_page');$bbs_page_data = get_page($bbs_my_page );  if(get_post_meta($id,"bbs_shoppingbox", true)){
	 ?>
	<b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b>
    <a href="<?php bloginfo('url'); ?>">首页</a>
    <a>></a>
    <a href="<?php echo get_page_link($bbs_my_page);?>"><?php echo $bbs_page_data ->post_title  ?></a><a>></a><a><?php the_title(); ?></a>
	<?php }else{ ?>
 <b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{get_breadcrumbs();}}
	
	}else{ ?>
 <b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{get_breadcrumbs();}}?>
 
 </div>