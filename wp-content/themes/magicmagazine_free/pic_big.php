<div class="big_pic_new_out">
<?php



$big_pic_modle= get_option('mytheme_big_pic_modle');
if($big_pic_modle==1){$big_pic_modle_full='big_pic_modle_full';} 
if($big_pic_cat){$big_pic_id=$big_pic_cat;}else{$big_pic_id=$big_pic_nav;}
if($big_pic_modle!=2){ ?>
<div id="big_pic_new_<?php $big_pic_cat; ?>" class="big_pic_new <?php echo $big_pic_modle_full ?> swiper-container">
   <div class="swiper-wrapper">
              
            <?php  

			
			  $big_pic_cat=get_option('mytheme_big_pic_cat');
			$big_pic_nav= get_option('mytheme_big_pic_nav');
			if($big_pic_cat){
			    $query = new WP_Query( array( 'cat' => $big_pic_cat , 'showposts' => 16 ));   ?>
              <?php while ( $query->have_posts() ) :$query->the_post();
		    $id =get_the_ID(); 
			$tit= get_the_title();
	        $content= get_the_content();
			$price = get_post_meta($id, 'shop_price', true);
            $original_price=get_post_meta($id,"original_price", true);
	
			
		  ?>  
            
              <div class="swiper-slide pic_big_slied">
                 <a target="_blank"href="<?php the_permalink() ?>"> <?php  if (has_post_thumbnail()) { the_post_thumbnail("full",array('alt'	=>$tit, 'title'=> $tit ));} ?></a>
                 <div class="pic_big_title">
                     <strong><a target="_blank"href="<?php the_permalink() ?>"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,55,"...",'utf-8'); ?></a></strong>
                     <?php if( $price){ ?><span>售价：<font>￥<?php echo $price; ?></font></span><?php }?>
                     <a  target="_blank"href="<?php the_permalink() ?>"class="pic_big_slied_btn" href="#">查看更多>></a>
                      <p> <?php echo get_the_excerpt($id); ?></p>
                 
                 </div>
              </div>
            
     <?php endwhile; }elseif($big_pic_nav){ob_start(); wp_nav_menu(array('walker' => new header_menu(), 'container' => false,'menu' => $big_pic_nav , 'items_wrap' => '%3$s',  ) );}?>

   </div>
   
   

</div>

    <?php 
}
		get_template_part( 'pic_big_bottom' ); 
	?>
	
          <a class="index_next"></a>
          <a class="index_prve"></a>


</div>
<?php if($big_pic_modle!=2){ 


?>
<script>
 var pic_big_<?php  echo $big_pic_id ?> = new Swiper('#big_pic_new_<?php echo $big_pic_id ?>',{
    speed:600,
loop:true,
<?php if($big_pic_modle==1){echo 'slidesPerView: 1,';}
else{echo 'slidesPerView: 4,';}
 ?>

<?php if($big_pic_nav&&!$big_pic_cat){ ?>
slideElement : 'li',
slideClass : 'menu-item',
<?php } ?>
calculateHeight : true
 
  });
   $('.big_pic_new_out .index_prve').on('click', function(e){
    e.preventDefault()
    pic_big_<?php  echo $page_cat ?>.swipePrev()
  });
  $('.big_pic_new_out .index_next').on('click', function(e){
    e.preventDefault()
   pic_big_<?php  echo $page_cat ?>.swipeNext()
  }); 
  
</script><?php } ?>