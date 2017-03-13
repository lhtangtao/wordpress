<?php 

class case_two extends WP_Widget {

	function case_two()
	{
		$widget_ops = array('classname'=>'case_two','description' => get_bloginfo('template_url').'/images/xuanxiang/66.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="case_two",$name='两栏文字和图片模块',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
	
		 $left_right=esc_attr($instance['left_right']);
		 $first_mod = esc_attr($instance['first_mod']);
		 $my_images = esc_attr($instance['my_images']);
		 $my_b_images = esc_attr($instance['my_b_images']);
		 $my_b_images_ad = esc_attr($instance['my_b_images_ad']);
		 $my_images_up = esc_attr($instance['my_images_up']);
		 $my_images_lr = esc_attr($instance['my_images_lr']);
		 
		 $my_text_up = esc_attr($instance['my_text_up']);
		 $my_text_lr = esc_attr($instance['my_text_lr']);
		 $my_text2 = esc_attr($instance['my_text2']);
		 $my_text3 = esc_attr($instance['my_text3']);
		 $my_text = esc_attr($instance['my_text']);
		 $my_text4 = esc_attr($instance['my_text4']);
		 $my_images_buig = esc_attr($instance['my_images_buig']);
	     $nnmber = esc_attr($instance['nnmber']);
		 $my_text_color= esc_attr($instance['my_text_color']);
	     $my_text_alpha=esc_attr($instance['my_text_alpha']);
	     $w_cat = esc_attr($instance['w_cat']);
		 $w_cat2 = esc_attr($instance['w_cat2']);
	     $zhiding = esc_attr($instance['zhiding']);
	?>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>左侧图片模块属性设置</strong></p>



<p>
<label  for="<?php echo $this->get_field_id('w_cat'); ?>">请选择:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat'); ?>" name="<?php echo $this->get_field_name('w_cat'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		$sigk_cat2= $w_cat;
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $sigk_cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">这个模块是调用一个分类的文章而形成的一个列表，必须选择上面的分类，并且分类下至少需要有3篇以上的文章才能形成列表滑块</em>
</p>

<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>标题设置</strong></p>

 <p>
 <label  for="<?php echo $this->get_field_id('my_text2'); ?>">标题:</label>
 <input type="text" size="40" value="<?php echo $my_text2 ; ?>" name="<?php echo $this->get_field_name('my_text2'); ?>" id="<?php echo $this->get_field_id('my_text2'); ?>"/>
 </p>
<p>
 <label  for="<?php echo $this->get_field_id('my_text3'); ?>">副标题:</label>
 <input type="text" size="40" value="<?php echo $my_text3 ; ?>" name="<?php echo $this->get_field_name('my_text3'); ?>" id="<?php echo $this->get_field_id('my_text3'); ?>"/>

</p>

<p>   
    <label  for="<?php echo $this->get_field_id('zhiding'); ?>">文章排序:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding'); ?>" name="<?php echo $this->get_field_name('zhiding'); ?>" >
              <option value=''<?php if ($zhiding == "" ) {echo "selected='selected'";}?> >显示最新文章</option>
	          <option value='1'<?php if ($zhiding == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章(至少4篇置顶)</option>
              <option value='2'<?php if ($zhiding == "2" ) {echo "selected='selected'";}?>>显示随机文章</option>
		
	</select>

</p>

<p>   
    <label  for="<?php echo $this->get_field_id('my_images_buig'); ?>">图片横竖选择：</label><br />
             <select id="<?php echo $this->get_field_id('my_images_buig'); ?>" name="<?php echo $this->get_field_name('my_images_buig'); ?>" >
              <option value=''<?php if ($my_images_buig == "" ) {echo "selected='selected'";}?> >横向（287, 191）</option>
	          <option value='1'<?php if ($my_images_buig == "1" ) {echo "selected='selected'";}?>>竖向（287, 320）</option>
                <option value='2'<?php if ($my_images_buig == "2" ) {echo "selected='selected'";}?>>正方形（287, 287）</option>
	</select><br />

</p>


<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>右侧图文模块设置</strong></p>

 <p>
 <label  for="<?php echo $this->get_field_id('my_text'); ?>">标题:</label>
 <input type="text" size="40" value="<?php echo $my_text ; ?>" name="<?php echo $this->get_field_name('my_text'); ?>" id="<?php echo $this->get_field_id('my_text'); ?>"/>
 </p>
<p>
 <label  for="<?php echo $this->get_field_id('my_text4'); ?>">副标题:</label>
 <input type="text" size="40" value="<?php echo $my_text4 ; ?>" name="<?php echo $this->get_field_name('my_text4'); ?>" id="<?php echo $this->get_field_id('my_text4'); ?>"/>

</p>

<p>
<label  for="<?php echo $this->get_field_id('w_cat2'); ?>">请选择:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat2'); ?>" name="<?php echo $this->get_field_name('w_cat2'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">这个模块是调用一个分类的文章而形成的一个列表，必须选择上面的分类，并且分类下至少需要有3篇以上的文章才能形成列表滑块</em>
</p>

	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	     $id =$instance['id'];
        $before_content = $instance['before_content'];
        $after_content = $instance['after_content'];
		$left_right = apply_filters('widget_title', empty($instance['left_right']) ? __('') : $instance['left_right']);
		$first_mod = apply_filters('widget_title', empty($instance['first_mod']) ? __('') : $instance['first_mod']);
		$my_images  = apply_filters('widget_title', empty($instance['my_images']) ? __('') : $instance['my_images']);
		$my_images_up  = apply_filters('widget_title', empty($instance['my_images_up']) ? __('') : $instance['my_images_up']);
		$my_images_lr  = apply_filters('widget_title', empty($instance['my_images_lr']) ? __('') : $instance['my_images_lr']);	
        $my_text2  = apply_filters('widget_title', empty($instance['my_text2']) ? __('') : $instance['my_text2']);
		$my_text3  = apply_filters('widget_title', empty($instance['my_text3']) ? __('') : $instance['my_text3']);
		 $my_text  = apply_filters('widget_title', empty($instance['my_text']) ? __('') : $instance['my_text']);
		$my_text4 = apply_filters('widget_title', empty($instance['my_text4']) ? __('') : $instance['my_text4']);
		$my_text_up  = apply_filters('widget_title', empty($instance['my_text_up']) ? __('') : $instance['my_text_up']);
        $my_b_images  = apply_filters('widget_title', empty($instance['my_b_images']) ? __('') : $instance['my_b_images']);
        $my_b_images_ad  = apply_filters('widget_title', empty($instance['my_b_images_ad']) ? __('') : $instance['my_b_images_ad']);
	    $my_text_color  = apply_filters('widget_title', empty($instance['my_text_color']) ? __('') : $instance['my_text_color']);
        $my_text_alpha  = apply_filters('widget_title', empty($instance['my_text_alpha']) ? __('') : $instance['my_text_alpha']);
	    $w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
		$w_cat2 = apply_filters('widget_title', empty($instance['w_cat2']) ? __('') : $instance['w_cat2']);
	    $my_images_buig = apply_filters('widget_title', empty($instance['my_images_buig']) ? __('') : $instance['my_images_buig']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
	if($my_text_color){$my_text_colors='dack_text_mod';};
	if($my_text_alpha){$my_text_alphas='class="alpha'.$my_text_alpha.'"';};
	$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('6') : $instance['nnmber']);
	if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
if( $zhiding =="2" ){ $oder="rand";}else{ $oder="ASC";}
$nnmber_text=4;
 if(!$my_images_buig){$left_text_css='left_text_shot';$left_case_css='left_case_shot';$nnmber_text=3; }else if($my_images_buig==2){$left_text_css='left_text_fang';$left_case_css='left_case_fang';} 
	 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber , 'post__in' =>$post__in ,'orderby' => $oder);     $query = new WP_Query( $args );  
	  $args2 = array( 'cat' => $w_cat2 , 'showposts' =>$nnmber_text , 'post__in' =>$post__in,'orderby' => $oder);     $query2 = new WP_Query( $args2 );  
	 $detect = new Mobile_Detect();
      $mytheme_detects=get_option('mytheme_detects');
	    if($my_images_buig=="1"){$text_nb=120;$my_images_buigs='case_full';$my_images_d="287x320.jpg";}else if($my_images_buig=="2"){$text_nb=120;$my_images_buigs='fang';$my_images_d="287.jpg";}else{$my_images_buigs='case';$my_images_d="287x191.jpg";$text_nb=40;}
$stickys= get_option('mytheme_stickys');
if(is_page()){  $page_id =get_the_ID();$customizeyes=get_post_meta($page_id, "customize",true);}
if(is_home()){$showpics='3';}elseif(is_page()&&$customizeyes){$showpics='3';}else{$showpics='1';}
	if(is_home()){$hbiaoq='2';}elseif(is_page()&&$customizeyes){$hbiaoq='2';}else{$hbiaoq='3';}		
 ?>


<div class="caseshow" id="case_two">
     
      <?php if($w_cat){ ?>
       <div class="caseshow_in <?php echo $left_case_css; ?> caseshow_two" id="case_twos_<?php echo $w_cat ?>">
          <a class="caseshow_title" href="<?php echo get_category_link($w_cat); ?>" target="_blank" >
             <?php if($my_text2){ ?> <h<?php echo $hbiaoq; ?>> <?php echo $my_text3; ?><strong><?php echo $my_text2; ?></strong></h<?php echo $hbiaoq; ?>><?php } ?>
          </a>
         <div class="nav_case_two"> 
             <?php if(!$detect->isMobile()){?>
           <a class="case_two_prve"> < </a>
           <a class="case_two_next"> > </a>
		   <?php } ?>
          
           </div>
       <div class="swiper-container" id="case_two_in_<?php echo $w_cat ?>">
     
      
     
           <div   <?php if(!$detect->isMobile()){if($mytheme_detects=='value1'&&$mytheme_detects){?>class="swiper-wrapper case_two_swiper"<?php } } ?>>
                
                     
                     <?php  while ( $query->have_posts() ) :$query->the_post();  
					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 $content= get_the_content();
					 $linkss=get_post_meta($id,"hoturl", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					  ?>     
                     
                            
                              <li class="swiper-slide">
                    <a href="<?php echo $links1 ; ?>" target="_blank"  class="case_pic">   <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
							<?php  if (has_post_thumbnail()) { the_post_thumbnail($my_images_buigs ,array('alt'	=>$tit, 'title'=> $tit ));} ?>
                            </a>
                    <div class="text_right_pics">
                     <strong><a href="<?php the_permalink() ?>" target="_blank" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"...",'utf-8'); ?></a></strong>
                     <?php if( $price ){ ?>
                     <div class="black_price_out">
                      
                       <?php if($original_price){ ?><span class="black_price_yj">￥<?php echo $original_price  ?></span><?php } ?>
                      <b class="black_price">￥<?php echo $price  ?></b>
                    
                     </div>
              
                     <?php }else{ ?>
                      <?php if(!$detect->isMobile()){ ?> <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,80,"...",'utf-8'); ?></p><?php } ?>
                     <?php } ?>
                     </div>
                </li>
                            
                            
                            
                      <?php endwhile; ?>
                     
                    </div>
                    
                  </div>  
       <?php if(!$detect->isMobile()){ if($mytheme_detects=='value1'&&$mytheme_detects){ ?>    
                  <script>
                   var case_two_in_<?php echo $w_cat ?> = new Swiper('#case_two_in_<?php echo $w_cat ?>',{
 speed:800,

 slideElement : 'li',
 calculateHeight : true,
slidesPerView : <?php echo $showpics; ?>,
slidesPerGroup : <?php echo $showpics; ?>,
 autoplay : 5000,
 
loop : true
   }) ;
    $('#case_twos_<?php echo $w_cat ?> .case_two_prve').on('click', function(e){
    e.preventDefault()
    case_two_in_<?php echo $w_cat ?>.swipePrev()
  });
  $('#case_twos_<?php echo $w_cat ?> .case_two_next').on('click', function(e){
    e.preventDefault()
    case_two_in_<?php echo $w_cat ?>.swipeNext()
  });
                  
                  </script>
                  <?php }} ?>
                    </div>
                    
            <?php }if($w_cat2){ ?>
                    
        <div class="left_text left_text_two <?php echo $left_text_css; ?>">       
            <a class="caseshow_title" href="<?php echo get_category_link($w_cat2); ?>" target="_blank" >
              <?php if($my_text){ ?> <h<?php echo $hbiaoq; ?>> <?php echo $my_text4; ?><strong><?php echo $my_text; ?></strong></h<?php echo $hbiaoq; ?>><?php } ?>
            </a>
            <ul class="left_text_in">
                    
                     <?php    while ( $query2->have_posts() ) :$query2->the_post();    
					 $tit= get_the_title();
		             $ids =get_the_ID(); 
					 $linkss=get_post_meta($id,"hoturl", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					  ?>     
                <li>
               <a href="<?php echo $links1 ; ?>" target="_blank"  class="left_text_title"> 
			   <?php  if (has_post_thumbnail()) { the_post_thumbnail("case" ,array('alt'	=>$tit, 'title'=> $tit ));} ?>
               </a>
               <span>
                 <a href="<?php echo $links1 ; ?>"><strong><?php echo $tit; ?></strong></a>
                 <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($ids))),0,70,"...",'utf-8'); ?></p>
               </span>
                 
                </li>
                
                
                    <?php  endwhile; ?>   
             </ul>
         
         
                 
        </div>   
                    
               <?php } ?>     
                    
                    
               </div> 
              
              
                 
        <?php
	}
}
register_widget('case_two');
?>