<?php 

class designer extends WP_Widget {

	function designer()
	{
		$widget_ops = array('classname'=>'designer','description' => get_bloginfo('template_url').'/images/xuanxiang/k1.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="designer",$name='两栏魔术模块',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    $w_cat = esc_attr($instance['w_cat']);
		 $w_cat2 = esc_attr($instance['w_cat2']);
		 $w_cat3 = esc_attr($instance['w_cat3']);
		 $w_cat4 = esc_attr($instance['w_cat4']);
	     $zhiding = esc_attr($instance['zhiding']);
		 $zhiding2 = esc_attr($instance['zhiding2']);
		 $zhiding3 = esc_attr($instance['zhiding3']);
		 $zhiding4 = esc_attr($instance['zhiding4']);
		 $postnumber = esc_attr($instance['postnumber']);
		  $postnumber2 = esc_attr($instance['postnumber2']);
		   $postnumber3 = esc_attr($instance['postnumber3']);
		 $postnumber_befor = esc_attr($instance['postnumber_befor']);
		 
		 $code = esc_attr($instance['code']);
		 $ad_pic = esc_attr($instance['ad_pic']);
		 $ad_pic_link = esc_attr($instance['ad_pic_link']);
		  		
	
		  $left_right = esc_attr($instance['left_right']);
	?>

<br />

  
    <p><strong>模块说明：</strong>每一个模块都可以选择不同的显示型式，你可以自由搭配选择。<br />
<strong>调用的封面图片尺寸</strong>：横向长方形统一为287*191比例（自动调用等比例图片缩放），其余尺寸选项上可选择已经表明。<br /><br /><br />

<label  for="<?php echo $this->get_field_id('left_right'); ?>">是否对调左右排版:</label>
             <select id="<?php echo $this->get_field_id('left_right'); ?>" name="<?php echo $this->get_field_name('left_right'); ?>" >
              <option value=''<?php if($left_right==""){echo "selected='selected'"; } ?>>默认</option>
              <option value='1'<?php if($left_right=="1"){echo "selected='selected'"; } ?>>左右模块对调</option>

	</select>
    <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">整个模块为2栏模式，默认为左边显示较宽模块，右边显示较窄模块，你也可以通过上面的选项对调他们的水平排版规则。</em>
</p>
    
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>较宽模块（默认在左边）</strong></p>



<p>
<label  for="<?php echo $this->get_field_id('w_cat'); ?>">选择分类:</label>
             <select id="<?php echo $this->get_field_id('w_cat'); ?>" name="<?php echo $this->get_field_name('w_cat'); ?>" >
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
					if ( $w_cat == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
    <br />
     <label  for="<?php echo $this->get_field_id('show_way_center'); ?>">显示方式:</label>
             <select id="<?php echo $this->get_field_id('show_way_center'); ?>" name="<?php echo $this->get_field_name('show_way_center'); ?>" >
              <option value=''<?php if ($show_way_center == "" ) {echo "selected='selected'";}?> >默认左右图文</option>

	        </select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">这个模块是较宽模块，可选三种不同的搭配形式，并且你也可以选择不同的图片尺寸，以此做出非常丰富的搭配</em>
</p>

<p>   
    <label>图片横竖选择(付费版可选)：</label><br />
             <select  disabled="true">
              <option value='' >横向（287, 191）</option>
	          <option value='1'>竖向（287, 320 付费版）</option>
                <option value='2'>正方形（287, 287 付费版）</option>
	</select><br />
<label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php esc_attr_e('显示数量(默认4):'); ?> 
<input class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" name="<?php echo $this->get_field_name('postnumber'); ?>" type="text" value="<?php echo $postnumber ; ?>" /></label>
<br />
<label  ><?php esc_attr_e('高亮模式时，以左右图文模式显示的数量（默认2）'); ?> 
<input class="widefat" type="text" value="付费版可选高亮模式"readonly="readonly" /></label>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">付费版可选多种组合模式和图片尺寸</em>

</p>



<p>   
    <label  for="<?php echo $this->get_field_id('zhiding'); ?>">文章排序:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding'); ?>" name="<?php echo $this->get_field_name('zhiding'); ?>" >
              <option value=''<?php if ($zhiding == "" ) {echo "selected='selected'";}?> >显示最新文章</option>
	          <option value='1'<?php if ($zhiding == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章(至少4篇以上置顶)</option>
              <option value='2'<?php if ($zhiding == "2" ) {echo "selected='selected'";}?>>显示随机文章</option>
		
	</select>

</p>



<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>左侧模块（上）</strong></p>



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
     <label  >显示方式:</label>
             <select idisabled="true" >
              <option value='' >排行榜模式</option>
	          <option value='1'>图文排版模式(付费版)</option>
              <option value='2'>图片排版模式（付费版）</option>
		      
	        </select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">这个区域的付费版可选三种模式，你可以选择自由搭配这一层及的模块</em><br />

   <label  for="<?php echo $this->get_field_id('zhiding2'); ?>">文章排序:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding2'); ?>" name="<?php echo $this->get_field_name('zhiding2'); ?>" >
           
              
                <option value=''<?php if ($zhiding2 == "" ) {echo "selected='selected'";}?> >按照时间排序（最新文章）</option>
	          <option value='1'<?php if ($zhiding2 == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章(至少4篇置顶)</option>
              <option value='2'<?php if ($zhiding2 == "2" ) {echo "selected='selected'";}?>>按照评论数排序（排行榜模式）</option>
               <option value='3'<?php if ($zhiding2 == "3" ) {echo "selected='selected'";}?>>按照阅读数排序（排行榜模式）</option>
              <option value='4'<?php if ($zhiding2 == "4" ) {echo "selected='selected'";}?>>显示随机文章</option>
              
              
		
	</select><br />
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">如果你选择了排行榜模式，你可以在上面选择排行榜的顺序模式，其他模式选择排行榜专用排序无效</em><br />
    <label for="<?php echo $this->get_field_id('postnumber2'); ?>"><?php esc_attr_e('显示数量(默认10):'); ?> 
<input class="widefat" id="<?php echo $this->get_field_id('postnumber2'); ?>" name="<?php echo $this->get_field_name('postnumber2'); ?>" type="text" value="<?php echo $postnumber2 ; ?>" /></label>
<br />
</p>

<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>右侧模块（下）</strong></p>
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
             <select idisabled="true"  >
             <option value='' >图文排版模式</option>
	    
	        </select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">这个模块的付费版可选2种模式选择</em><br />
    
  <label  for="<?php echo $this->get_field_id('zhiding3'); ?>">文章排序:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding3'); ?>" name="<?php echo $this->get_field_name('zhiding3'); ?>" >
                <option value=''<?php if ($zhiding3 == "" ) {echo "selected='selected'";}?> >显示最新文章</option>
	          <option value='1'<?php if ($zhiding3 == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章(至少4篇置顶)</option>
              <option value='2'<?php if ($zhiding3 == "2" ) {echo "selected='selected'";}?>>显示随机文章</option>
	</select><br />

    <label for="<?php echo $this->get_field_id('postnumber3'); ?>"><?php esc_attr_e('显示数量(默认2):'); ?> 
<input class="widefat" id="<?php echo $this->get_field_id('postnumber3'); ?>" name="<?php echo $this->get_field_name('postnumber3'); ?>" type="text" value="<?php echo $postnumber3 ; ?>" /></label>
<br />
</p>

<p>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">右侧的两个模块你可以选择启用其中一个，或者都不显示，然后在下面的选项中上传图片或者使用代码放置视频、广告等信息（代码和图片上传可同时上传，那么就会都显示出来，不设置就不会显示。）</em><br />
  <label  for="<?php echo $this->get_field_id('ad_pic'); ?>">广告图片(宽度320像素高度自定义):</label><br />
 <input type="text" size="40" value="<?php echo $ad_pic; ?>" name="<?php echo $this->get_field_name('ad_pic'); ?>" id="<?php echo $this->get_field_id('ad_pic'); ?>"/>
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a><br />

   <label  for="<?php echo $this->get_field_id('ad_pic_link'); ?>">图片链接:</label><br />
 <input type="text" size="40" value="<?php echo $ad_pic_link; ?>" name="<?php echo $this->get_field_name('ad_pic_link'); ?>" id="<?php echo $this->get_field_id('ad_pic_link'); ?>"/><br />

  <label  for="<?php echo $this->get_field_id('code'); ?>">视频或者其他html代码:</label>
<textarea style="width:98%;" id="<?php echo $this->get_field_id('code'); ?>" name="<?php echo $this->get_field_name('code'); ?>"cols="52" rows="4" ><?php echo stripslashes($code); ?></textarea>
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
		$zhiding2 = apply_filters('widget_title', empty($instance['zhiding2']) ? __('') : $instance['zhiding2']);
	    $zhiding3  = apply_filters('widget_title', empty($instance['zhiding3']) ? __('') : $instance['zhiding3']);
	    $zhiding4  = apply_filters('widget_title', empty($instance['zhiding4']) ? __('') : $instance['zhiding4']);
		$my_text4  = apply_filters('widget_title', empty($instance['my_text4']) ? __('') : $instance['my_text4']);
		$my_text5 = apply_filters('widget_title', empty($instance['my_text5']) ? __('') : $instance['my_text5']);
		
		$postnumber =  apply_filters('widget_title', empty($instance['postnumber']) ? __('4') : $instance['postnumber']);
		 $postnumber2  =  apply_filters('widget_title', empty($instance['postnumber2']) ? __('10') : $instance['postnumber2']);
		 $postnumber3 =  apply_filters('widget_title', empty($instance['postnumber3']) ? __('2') : $instance['postnumber3']);
		 $postnumber_befor = apply_filters('widget_title', empty($instance['postnumber_befor']) ? __('2') : $instance['postnumber_befor']);
	    $my_images_buig = apply_filters('widget_title', empty($instance['my_images_buig']) ? __('') : $instance['my_images_buig']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
		
		 $left_right = apply_filters('widget_title', empty($instance['left_right']) ? __('') : $instance['left_right']);
		 
		 $code = apply_filters('widget_title', empty($instance['code']) ? __('') : $instance['code']);
		 $ad_pic = apply_filters('widget_title', empty($instance['ad_pic']) ? __('') : $instance['ad_pic']);
		 $ad_pic_link = apply_filters('widget_title', empty($instance['ad_pic_link']) ? __('') : $instance['ad_pic_link']);
		
		
	if($my_text_color){$my_text_colors='dack_text_mod';};
	if($my_text_alpha){$my_text_alphas='class="alpha'.$my_text_alpha.'"';};
	$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('6') : $instance['nnmber']);

$nnmber_text=4;
 if(!$my_images_buig){$left_text_css='left_text_shot';$nnmber_text=3; }else if($my_images_buig==2){$left_text_css='left_text_fang';} 
	
	if( $zhiding =="2" ){ $oder="rand";}else if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}else{ $oder="ASC";}
	if( $zhiding2 =="4" ){ $oder2="rand";}else if( $zhiding2 =="1" ){ $post__in2 = get_option('sticky_posts');}elseif($zhiding2 =="2"&&$show_way_center){$oder2='comment_count';}else{ $oder2="ASC";}
	if($zhiding2 =="3"&&$show_way_center){
	 $args2 = array( 'cat' => $w_cat2 , 'showposts' => $postnumber2 , 'post__in' =>$post__in2  ,'meta_key'=>"views",'orderby' => 'meta_value_num','order'=>'desc');
	}else{
		 $args2 = array( 'cat' => $w_cat2 , 'showposts' => $postnumber2 , 'post__in' =>$post__in2  ,'orderby' => $oder2);
		}
	 
	   $query2 = new WP_Query( $args2 ); 
	
	
	if( $zhiding3 =="2" ){ $oder3="rand";}else if( $zhiding3 =="1" ){ $post__in3 = get_option('sticky_posts');}else{ $oder3="ASC";}

	
	 $args = array( 'cat' => $w_cat , 'showposts' => $postnumber , 'post__in' =>$post__in  ,'orderby' => $oder);      $query = new WP_Query( $args );  
	
	 $args3= array( 'cat' => $w_cat3 , 'showposts' => $postnumber3 , 'post__in' =>$post__in3  ,'orderby' => $oder3);   $query3 = new WP_Query( $args3 ); 
			$word_t51=get_option('mytheme_word_t51');$word_t52=get_option('mytheme_word_t52');
		
			
			
			
			if($left_right){$left_right_go="two_modle_right_go";$left_right_go2="two_modle_right_go2"; }else{$left_right_go="two_modle_left_go";$left_right_go2="two_modle_left_go2";}
		$top_nnber=55;$top_nnber2=95;
		?>

<div class="two_modle in_mode">

     <div class="two_modle_left <?php echo $left_right_go; ?>">
     <div class="m_hd"><a class="m_hd_title"><?php echo get_cat_name($w_cat) ;?></a> <a target="_blank" href="<?php echo get_category_link($w_cat) ?>" class="hd_more">更多>></a></div>
     
        <ul>
          <?php  $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; 
		    $id =get_the_ID(); 
			$tit= get_the_title();
	        $content= get_the_content();
			$price = get_post_meta($id, 'shop_price', true);
            $original_price=get_post_meta($id,"original_price", true);
			if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
			
		  ?>  
          <li class="two_modle_tuwen">
          <a target="_blank"href="<?php the_permalink() ?>" class="two_modle_tuwen_pic">  <?php  themepark_thumbnails('case_full'); ?> </a>
          <div class="two_modle_tuwen_text">
              <a target="_blank"href="<?php the_permalink() ?>" class="two_modle_tuwen_title"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,45,"...",'utf-8'); ?></a>
             <?php if($price){ if( $original_price){ ?> <span class="two_modle_original_price">原价:￥<?php echo $original_price; ?></span><?php } ?>
                                                        <span class="two_modle_price">现价：￥<?php echo $price; ?></span>
             <?php }else{ ?>
             <span class="two_modle_time"><?php if($word_t51!=""){echo $word_t51;}else{echo '发布时间';} ;echo get_the_time('Y/m/d'); ?></span>
             <span class="two_modle_PostViews"><?php if($word_t52!=""){echo $word_t52;}else{echo '浏览次数：';} echo $getPostViews; ?></span>
             <?php } ?>
         <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,100,"...",'utf-8'); ?></p>
          </div>
          </li>
         
		   
		   <?php endwhile; ?>
        </ul>
     
     
     </div>

<div class="two_modle_right <?php echo $left_right_go2; ?>">
<?php if($w_cat2){ ?>
    <div class="m_hd"><a class="m_hd_title"><?php echo get_cat_name($w_cat2) ;?></a> <a target="_blank" href="<?php echo get_category_link($w_cat2) ?>" class="hd_more">更多>></a></div>

     <ul>
  <div class="two_modle_right_xian"></div>
        <?php  $ashu_i=0; while ( $query2->have_posts() ) :$query2->the_post(); $ashu_i++; 
		    $id =get_the_ID(); 
			$tit= get_the_title();
	        $content= get_the_content();
			$price = get_post_meta($id, 'shop_price', true);
            $original_price=get_post_meta($id,"original_price", true);
			if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
	
		  ?>  
          
          
          <li class="two_modle_right_top <?php if($ashu_i==1){echo 'two_modle_right_top_open';} ?>">
          <div class="two_modle_right_nuber <?php if($ashu_i<4){echo 'two_modle_right_top3';} ?>"><?php echo $ashu_i; ?></div>
               <a  href="<?php the_permalink() ?>" target="_blank"class="two_modle_right_title"> <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,38,"...",'utf-8'); ?> </a>
              <div class="two_modle_right_hidden">
               <a class="two_modle_right_pic"href="<?php the_permalink() ?>" target="_blank">
                 <?php   themepark_thumbnails('case'); ?> 
                    </a>
              <span>人气：<?php echo $getPostViews; ?></span>
              <span>评论：<?php comments_number('0', '1', '% ' );?></span>
              
               <p> <?php if(themepark_hot_comment($id)){  echo mb_strimwidth(strip_tags(apply_filters('hot_comment',themepark_hot_comment($id))),0,$top_nnber,"...",'utf-8'); }
			               else{echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$top_nnber,"...",'utf-8');}
			   
			   ?></p>
               
              </div>
          </li>
          
         
        <?php  endwhile; ?>
     
     </ul>
     
     <?php 
	   }if($ad_pic){echo '<div class="two_modle_right_code"><a target="_blank" href="'.$ad_pic_link.'" ><img  src="'.$ad_pic.'" alt="'.get_bloginfo('name').'" /></a></div>';}
	 if($code){echo '<div class="two_modle_right_code">'.html_entity_decode($code).'</div>';}
	 ?>
     
<?php if($w_cat3){ ?>
 <div class="m_hd"><a class="m_hd_title"><?php echo get_cat_name($w_cat3) ;?></a> <a target="_blank" href="<?php echo get_category_link($w_cat3) ?>" class="hd_more">更多>></a></div>
 <ul>
   <?php  $ashu_i=0; while ( $query3->have_posts() ) :$query3->the_post(); $ashu_i++; 
		    $id =get_the_ID(); 
			$tit= get_the_title();
	        $content= get_the_content();
			if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
	
		  ?>  
         <li class="two_modle_right_bottom info_pic_s">
            <strong>
                                     <a href="<?php the_permalink() ?>" target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,40,"...",'utf-8'); ?></a>
                                     </strong>
                                     
                                     <a class="info_pic_s_to"href="<?php the_permalink() ?>" target="_blank">
                                     <?php   themepark_thumbnails('case');  ?> 
                                     </a>
                                    
                                      <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,$top_nnber2,"...",'utf-8'); ?></p>
         
         </li>
         
         <?php endwhile; ?>
 </ul>
 
 
 
<?php } ?>
</div>




</div>



        <?php
	}
}
register_widget('designer');
?>