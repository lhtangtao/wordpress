<?php 

class pic_two extends WP_Widget {

	function pic_two()
	{
		$widget_ops = array('classname'=>'pic_two','description' => get_bloginfo('template_url').'/images/xuanxiang/k2.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="pic_two",$name='三栏魔术模块（等宽）',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
	
		 
		 
		 
		 
	
	     $w_cat = esc_attr($instance['w_cat']);
		 $w_cat2 = esc_attr($instance['w_cat2']);
		 $w_cat3 = esc_attr($instance['w_cat3']);
		 $w_cat4 = esc_attr($instance['w_cat4']);
		
		 $show_way_center= esc_attr($instance['show_way_center']);
		 $show_way_center2= esc_attr($instance['show_way_center2']);
		 $show_way_center3= esc_attr($instance['show_way_center3']);
	?>
    
    
    <p><strong>模块说明：</strong>每一个模块都可以选择四种不同的显示型式，你可以自由搭配选择。<br />
<strong>调用的封面图片尺寸</strong>：统一为287*191比例（自动调用等比例图片缩放）<br /><br />
<strong>在pc版中，由于三个模块需要对齐因此不同模块显示文章的数量是推荐不设置而采用固定的方式对齐：1.默认图文+纯文字：11篇。 2. 纯图文：3篇（付费版） 。 3.纯文字：7篇 4.纯图片：4篇（付费版）。<br />
使用这个模块需要你确认你的文章足够多，否则会出现水平不平衡的情况，而触屏版三个模块并不是对齐的，你可以随意设置他们的数量。 <font style="color:#F00">【在付费版中，你可以拥有所有的显示模式，并且在每一个区域都可以上传图片或者视频来代替调用的文章列表】</font></strong>
</p>
    
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>第一个模块</strong></p>



<p>
<label  for="<?php echo $this->get_field_id('w_cat'); ?>">选择分类:</label>
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
    <br />
     <label  for="<?php echo $this->get_field_id('show_way_center'); ?>">显示方式:</label>
             <select id="<?php echo $this->get_field_id('show_way_center'); ?>" name="<?php echo $this->get_field_name('show_way_center'); ?>" >
              <option value=''<?php if ($show_way_center == "" ) {echo "selected='selected'";}?> >默认图文+纯文字</option>
	        
              <option value='2'<?php if ($show_way_center == "2" ) {echo "selected='selected'";}?>>纯文字</option>
		 
	        </select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">每一个模块都可以选择2种不同的显示型式（付费版有4种模式），你可以自由搭配选择</em>
</p>





<p>   
    <label>文章排序:</label><br />
             <select id="" name=""disabled="true" >
              <option value='' >显示最新文章</option>
	          <option value='1'>只显示置顶的文章(至少4篇置顶)</option>
              <option value='2'>显示随机文章</option>
		
	</select><br />
<br />
  <label for=""><?php esc_attr_e('显示数量(付费版的移动设备支持选项):'); ?> 
<input style="border:1px solid #fff;"  class="widefat" readonly="readonly" value="付费版可兼容移动设备"/></label>
<br />

</p>



<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>第二个模块（中间）</strong></p>



<p>
<label  for="<?php echo $this->get_field_id('w_cat2'); ?>">选择分类:</label>
             <select id="<?php echo $this->get_field_id('w_cat2'); ?>" name="<?php echo $this->get_field_name('w_cat2'); ?>" >
              <option value=''>不显示</option>
<?php 
		 $categorys = get_categories();
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat2== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
    <br />
     <label  for="<?php echo $this->get_field_id('show_way_center2'); ?>">显示方式:</label>
             <select id="<?php echo $this->get_field_id('show_way_center2'); ?>" name="<?php echo $this->get_field_name('show_way_center2'); ?>" >
                 <option value=''<?php if ($show_way_center2 == "" ) {echo "selected='selected'";}?> >默认图文+纯文字</option>
	        
              <option value='2'<?php if ($show_way_center2 == "2" ) {echo "selected='selected'";}?>>纯文字</option>
		 
	        </select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">每一个模块都可以选择2种不同的显示型式（付费版有4种模式），你可以自由搭配选择</em>

   <label  >文章排序:</label><br />
             <select id="" name=""disabled="true" >
              <option value='' >显示最新文章</option>
	          <option value='1'>只显示置顶的文章(至少4篇置顶)</option>
              <option value='2'>显示随机文章</option>
		
	</select><br />
    <br />
  <label for=""><?php esc_attr_e('显示数量(付费版的移动设备支持选项):'); ?> 
<input style="border:1px solid #fff;" class="widefat" readonly="readonly" value="付费版可兼容移动设备"/></label>
<br />
</p>

<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>第三个模块（右边）</strong></p>
<label  for="<?php echo $this->get_field_id('w_cat3'); ?>">选择分类</label>
             <select id="<?php echo $this->get_field_id('w_cat3'); ?>" name="<?php echo $this->get_field_name('w_cat3'); ?>" >
              <option value=''>不显示</option>
<?php 
		 $categorys = get_categories();
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat3== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
     <br />
     <label  for="<?php echo $this->get_field_id('show_way_center3'); ?>">显示方式:</label>
             <select id="<?php echo $this->get_field_id('show_way_center3'); ?>" name="<?php echo $this->get_field_name('show_way_center3'); ?>" >
             <option value=''<?php if ($show_way_center3 == "" ) {echo "selected='selected'";}?> >默认图文+纯文字</option>
	        
              <option value='2'<?php if ($show_way_center3 == "2" ) {echo "selected='selected'";}?>>纯文字</option>
		 
	        </select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">每一个模块都可以选择2种不同的显示型式（付费版有4种模式），你可以自由搭配选择</em>
    
  <label  >文章排序:</label><br />
             <select id="" name=""disabled="true" >
              <option value='' >显示最新文章</option>
	          <option value='1'>只显示置顶的文章(至少4篇置顶)</option>
              <option value='2'>显示随机文章</option>
		
	</select><br />

    <label for=""><?php esc_attr_e('显示数量(付费版的移动设备支持选项):'); ?> 
<input style="border:1px solid #fff;" class="widefat" readonly="readonly" value="付费版可兼容移动设备"/></label>
<br />
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
		
	    $w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
		$w_cat2 = apply_filters('widget_title', empty($instance['w_cat2']) ? __('') : $instance['w_cat2']);
		$w_cat3= apply_filters('widget_title', empty($instance['w_cat3']) ? __('') : $instance['w_cat3']);
		$w_cat4 = apply_filters('widget_title', empty($instance['w_cat4']) ? __('') : $instance['w_cat4']);
	
	
		$show_way_center= apply_filters('widget_title', empty($instance['show_way_center']) ? __('') : $instance['show_way_center']);
	$show_way_center2= apply_filters('widget_title', empty($instance['show_way_center2']) ? __('') : $instance['show_way_center2']);
	$show_way_center3= apply_filters('widget_title', empty($instance['show_way_center3']) ? __('') : $instance['show_way_center3']);
		
		
		
	 
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
	if($my_text_color){$my_text_colors='dack_text_mod';};
	if($my_text_alpha){$my_text_alphas='class="alpha'.$my_text_alpha.'"';};



	


if($post_nunberk){$post_menbers=$post_nunberk;}else{
	if($show_way_center==1){$post_menbers=3;}elseif($show_way_center==2){$post_menbers=7;}elseif($show_way_center==3){$post_menbers=4;}else{$post_menbers=11;}
	}
if($post_nunberk2!=''){$post_menbers2=$post_nunberk2;}else{if($show_way_center2==1){$post_menbers2=3;}elseif($show_way_center2==2){$post_menbers2=7;}elseif($show_way_center2==3){$post_menbers2=4;}else{$post_menbers2=11;}}
if($post_nunberk3!=''){$post_menbers3=$post_nunberk3;}else{if($show_way_center3==1){$post_menbers3=3;}elseif($show_way_center3==2){$post_menbers3=7;}elseif($show_way_center3==3){$post_menbers3=4;}else{$post_menbers3=11;}}
	
	
	
	 $args = array( 'cat' => $w_cat , 'showposts' =>$post_menbers, 'post__in' =>$post__in  ,'orderby' => "ASC");      $query = new WP_Query( $args );  
	 $args2 = array( 'cat' => $w_cat2 , 'showposts' =>$post_menbers2, 'post__in' =>$post__in2  ,'orderby' => "ASC");  $query2 = new WP_Query( $args2 ); 
	 $args3= array( 'cat' => $w_cat3 , 'showposts' =>$post_menbers3, 'post__in' =>$post__in3  ,'orderby' => "ASC");   $query3 = new WP_Query( $args3 ); 
$pos5_excerpt=95;$pos5_excerpt2=65; 
 ?>
<div class="three_mode_go in_mode">

     <div class="three_mode_go_mode ">
       <div class="m_hd"><a class="m_hd_title"><?php echo get_cat_name($w_cat) ;?></a> <a target="_blank" href="<?php echo get_category_link($w_cat) ?>" class="hd_more">更多>></a></div>
     
       <ul>
         <?php  $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; ?>  
                                     <?php 
								 
		                          $id =get_the_ID(); 
								  $tit= get_the_title();
	                              $content= get_the_content();
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
								if(!$show_way_center){
								if($ashu_i==1){
								?>   
         <li class="info_pic_s">
                                      <strong>
                                     <a  title="<?php the_title();?>" href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,40,"...",'utf-8'); ?></a>
                                     </strong>
                                     
                                     <a title="<?php the_title();?>" class="info_pic_s_to"href="<?php the_permalink() ?>" target="_blank">
                                     <?php themepark_thumbnails('case'); ?> 
                                     </a>
                                    
                                      <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$pos5_excerpt,"...",'utf-8'); ?></p>
                                     </li>
        <?php }else{ ?>
          <li class="left_tuwen_text"> <a title="<?php the_title();?>" href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,23,"...",'utf-8'); ?></a></li>
          

          <?php }}elseif($show_way_center==2){ if($ashu_i==1){   ?>
		  
	  	                   
                             <li class="info_hot">
                                     
                                    <a href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"...",'utf-8'); ?></a>
                                      <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$pos5_excerpt,"...",'utf-8'); ?></p>
                                     </li>     
                               <?php }else{ ?>      
                                    <li class="info_text_s <?php if($ashu_i==2){ echo 'info_text_s_fengge';}?>">
                                     <a href="<?php the_permalink() ?>" target="_blank" >  <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,58,"...",'utf-8'); ?>   
                                       </a>
                                     </li>   
          
          
		  
		  <?php }}endwhile; ?>
       </ul>
     
     
     
     </div>
     
     
     

  <div class="three_mode_go_mode">
         <div class="m_hd"><a class="m_hd_title"><?php echo get_cat_name($w_cat2) ;?></a> <a target="_blank" href="<?php echo get_category_link($w_cat2) ?>" class="hd_more">更多>></a></div>
     
             <ul>
         <?php  $ashu_i=0; while ( $query2->have_posts() ) :$query2->the_post(); $ashu_i++; ?>  
                                     <?php 
								 
		                          $id =get_the_ID(); 
								  $tit= get_the_title();
	                              $content= get_the_content();
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
								if(!$show_way_center2){
								if($ashu_i==1){
								?>   
      <li class="info_pic_s">
                                      <strong>
                                     <a  title="<?php the_title();?>" href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,40,"...",'utf-8'); ?></a>
                                     </strong>
                                     
                                     <a title="<?php the_title();?>" class="info_pic_s_to"href="<?php the_permalink() ?>" target="_blank">
                                     <?php themepark_thumbnails('case'); ?> 
                                     </a>
                                    
                                      <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$pos5_excerpt,"...",'utf-8'); ?></p>
                                     </li>
        <?php }else{ ?>
          <li class="left_tuwen_text"> <a title="<?php the_title();?>" href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,23,"...",'utf-8'); ?></a></li>
          

          <?php }}elseif($show_way_center2==2){ if($ashu_i==1){   ?>
		  
	  	                   
                             <li class="info_hot">
                                     
                                    <a href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"...",'utf-8'); ?></a>
                                      <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$pos5_excerpt,"...",'utf-8'); ?></p>
                                     </li>     
                               <?php }else{ ?>      
                                    <li class="info_text_s <?php if($ashu_i==2){ echo 'info_text_s_fengge';}?>">
                                     <a href="<?php the_permalink() ?>" target="_blank" >  <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,58,"...",'utf-8'); ?>   
                                       </a>
                                     </li>   
          
          
		  
		  <?php }}endwhile; ?>
       </ul>
     
     
     
     
     </div>
     
       <div class="three_mode_go_mode three_mode_last">
       <div class="m_hd"><a class="m_hd_title"><?php echo get_cat_name($w_cat3) ;?></a> <a target="_blank" href="<?php echo get_category_link($w_cat3) ?>" class="hd_more">更多>></a></div>
            <ul>
         <?php  $ashu_i=0; while ( $query3->have_posts() ) :$query3->the_post(); $ashu_i++; ?>  
                                     <?php 
								 
		                          $id =get_the_ID(); 
								  $tit= get_the_title();
	                              $content= get_the_content();
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
								if(!$show_way_center3){
								if($ashu_i==1){
								?>   
        <li class="info_pic_s">
                                      <strong>
                                     <a  title="<?php the_title();?>" href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,40,"...",'utf-8'); ?></a>
                                     </strong>
                                     
                                     <a title="<?php the_title();?>" class="info_pic_s_to"href="<?php the_permalink() ?>" target="_blank">
                                     <?php themepark_thumbnails('case'); ?> 
                                     </a>
                                    
                                      <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$pos5_excerpt,"...",'utf-8'); ?></p>
                                     </li>
        <?php }else{ ?>
          <li class="left_tuwen_text"> <a title="<?php the_title();?>" href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,23,"...",'utf-8'); ?></a></li>
          

         
          <?php }}elseif($show_way_center3==2){ if($ashu_i==1){   ?>
		  
	  	                   
                             <li class="info_hot">
                                     
                                    <a href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"...",'utf-8'); ?></a>
                                      <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$pos5_excerpt,"...",'utf-8'); ?></p>
                                     </li>     
                               <?php }else{ ?>      
                                    <li class="info_text_s <?php if($ashu_i==2){ echo 'info_text_s_fengge';}?>">
                                     <a href="<?php the_permalink() ?>" target="_blank" >  <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,58,"...",'utf-8'); ?>   
                                       </a>
                                     </li>   
          
          
		  
		  <?php }}endwhile; ?>
       </ul>
     
     
     </div>

</div>
      
                 
        <?php
	}
}
register_widget('pic_two');
?>