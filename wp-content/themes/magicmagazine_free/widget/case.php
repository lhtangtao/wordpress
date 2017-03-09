<?php 

class case_index extends WP_Widget {

	function case_index()
	{
		$widget_ops = array('classname'=>'case_index','description' => get_bloginfo('template_url').'/images/xuanxiang/3.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="case_index",$name='图片并排模块',$widget_ops,$control_ops);  

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
			
	 $nnmber = esc_attr($instance['nnmber']);
		 $my_text_color= esc_attr($instance['my_text_color']);
	     $my_text_alpha=esc_attr($instance['my_text_alpha']);
	 $w_cat = esc_attr($instance['w_cat']);
	 $zhiding = esc_attr($instance['zhiding']);
	  $my_images_buig = esc_attr($instance['my_images_buig']);
	?>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>模块属性设置</strong></p>



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

<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量(默认9):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>




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
		$my_text_up  = apply_filters('widget_title', empty($instance['my_text_up']) ? __('') : $instance['my_text_up']);
        $my_b_images  = apply_filters('widget_title', empty($instance['my_b_images']) ? __('') : $instance['my_b_images']);
        $my_b_images_ad  = apply_filters('widget_title', empty($instance['my_b_images_ad']) ? __('') : $instance['my_b_images_ad']);
	    $my_text_color  = apply_filters('widget_title', empty($instance['my_text_color']) ? __('') : $instance['my_text_color']);
        $my_text_alpha  = apply_filters('widget_title', empty($instance['my_text_alpha']) ? __('') : $instance['my_text_alpha']);
	    $w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
	$my_images_buig = apply_filters('widget_title', empty($instance['my_images_buig']) ? __('') : $instance['my_images_buig']);
	$zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
	if($my_text_color){$my_text_colors='dack_text_mod';};
	if($my_text_alpha){$my_text_alphas='class="alpha'.$my_text_alpha.'"';};
	$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('8') : $instance['nnmber']);
	if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
if( $zhiding =="2" ){ $oder="rand";}else{ $oder="ASC";}
	 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber , 'post__in' =>$post__in ,'orderby' => $oder);     $query = new WP_Query( $args );  
      $mytheme_detects=get_option('mytheme_detects');
	    if($my_images_buig=="1"){$text_nb=120;$my_images_buigs='case_full';$my_images_d="287x320.jpg";}else if($my_images_buig=="2"){$text_nb=120;$my_images_buigs='fang';$my_images_d="287.jpg";}else{$my_images_buigs='case';$my_images_d="287x191.jpg";$text_nb=40;}
			$stickys= get_option('mytheme_stickys');
			
 ?>


<div class="caseshow in_mode">
     
          <div class="m_hd"><a class="m_hd_title"><?php echo get_cat_name($w_cat) ;?></a> <a target="_blank" href="<?php echo get_category_link($w_cat) ?>" class="hd_more">更多>></a></div>
       <div class="caseshow_in" id="designer_cont">

           <ul>
                
                     
                     <?php 
					  $theme_shop_open = get_option('mytheme_theme_shop_open');
					  while ( $query->have_posts() ) :$query->the_post();  
					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 $content= get_the_content();
					 $linkss=get_post_meta($id,"hoturl", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					 $price = get_post_meta($id, 'shop_price', true);
          	        $original_price=get_post_meta($id,"original_price", true);
					  ?>     
                     
                            
                              <li>
                    <a href="<?php echo $links1 ; ?>" target="_blank"  class="case_pic">   <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
							<?php  themepark_thumbnails($my_images_buigs ); ?>
                            </a>
                     <div class="case_div">
                     <strong><a href="<?php the_permalink() ?>" target="_blank" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"...",'utf-8'); ?></a></strong>
                    
                     
                    <?php if( $price ){ ?>
                     <div class="black_price_out">
                      
                       <?php if($original_price){ ?><span class="black_price_yj">￥<?php echo $original_price  ?></span><?php } ?>
                      <b class="black_price">￥<?php echo $price  ?></b>
                    
                     </div>
                     <?php  if($theme_shop_open)    {?>  <div id="stars__<?php echo shop_comment_stars();?>"class="srar case_satar"></div><?php } ?>
                     <?php }else{ ?>
       <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,80,"...",'utf-8'); ?></p>
                     <?php } ?>
                     </div>
                     
                     
                </li>
                            
                            
                            
                      <?php endwhile; ?>
                     
                    </ul>
                    </div>
               </div> 
              
              
                 
        <?php
	}
}
register_widget('case_index');
?>