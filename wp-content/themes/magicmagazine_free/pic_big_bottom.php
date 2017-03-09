<?php $pig_pic_title1=get_option('mytheme_pig_pic_title1');
			$pig_pic_title2=get_option('mytheme_pig_pic_title2');
			$pig_pic_title=get_option('mytheme_pig_pic_title');
			$big_pic_nav2= get_option('mytheme_big_pic_nav2');
			 $big_pic_modle= get_option('mytheme_big_pic_modle');
			 if($big_pic_modle==2){$big_pic_modle_full='big_pic_modle_none';} 
			
			 ?>

<div class="pic_big_bottom "<?php  echo 'id="'.$big_pic_modle_full.'"'; ?>>
       <div class="pic_big_bottom_in">
     
            <div class="pic_big_bottom_in_nav_title">
                <font><strong><?php if($pig_pic_title2){echo $pig_pic_title2;}else{echo "top";}; ?></strong> <?php if($pig_pic_title1){echo $pig_pic_title1;}else{echo "recommended";}; ?></font>
               <b><?php if($pig_pic_title){echo $pig_pic_title;}else{echo "本站热门推荐";}; ?></b>
            </div>
             <?php  if($big_pic_nav2){ ob_start(); wp_nav_menu(array('walker' => new header_menu(), 'container' => false,'menu' => $big_pic_nav2 ,'items_wrap' => '<div id="pic_big_bottom_in_nav" class="pic_big_bottom_in_nav">%3$s</div>' ) ); } ?>
             
          
             
             <div class="pic_big_bottom_in_search">
              <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
             <div class="header_search_go"><input type="text" id="s" name="s" value="" autocomplete="off"/></div>
              <input type="submit" value="" id="searchsubmit" />
             </form>
             
             
                 <div class="search_key_mod">
                            <div class="key_search_word"> 
                            <b>推荐搜索：</b> 
                              <?php 
	         $search_key= split("\n",get_option('mytheme_big_search_key')); 
			 for($i=0;$i<count($search_key);$i++) {
				 echo'<a href="'.get_bloginfo('url').'/?s='.$search_key[$i].'">'.$search_key[$i].'</a>';
				 
				 }  
	 
	 ?>
                            
                            
                            
                           </div>
                           <ul class="search_list_index">
                           
                              
            <?php  
			$big_search_cat= get_option('mytheme_big_search_cat');
		
			    $query = new WP_Query( array( 'cat' => $big_search_cat , 'showposts' => 5 ));   ?>
              <?php while ( $query->have_posts() ) :$query->the_post();
		    $id =get_the_ID(); 
			$tit= get_the_title();
	        $content= get_the_content();
			$price = get_post_meta($id, 'shop_price', true);
            $original_price=get_post_meta($id,"original_price", true);
			
			
		  ?>  
                           
                              <li>
                              <a class="search_list_index_img"target="_blank"href="<?php the_permalink() ?>"><?php  themepark_thumbnails("news"); ?></a>
                              <strong><a href="#"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,25,"...",'utf-8'); ?></a></strong>
                            <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,50,"...",'utf-8'); ?></p>
                              </li>
                              
                           <?php endwhile; ?>   
                           
                           </ul>
                           
                 
                 </div>
             </div>
             
      </div> </div>