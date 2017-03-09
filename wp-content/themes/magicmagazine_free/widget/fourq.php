<?php 

class title_menu extends WP_Widget {

	function title_menu()
	{
		$widget_ops = array('classname'=>'title_menu','description' => get_bloginfo('template_url').'/images/xuanxiang/1333.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="title_menu",$name='栏目菜单',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
		
	  $id =esc_attr($instance['id']);
	  $title = esc_attr($instance['title']);
	  $title2 = esc_attr($instance['title2']);
	  $title_link = esc_attr($instance['title_link']);
	  $title_link2 = esc_attr($instance['title_link2']);
	  $title_menu = esc_attr($instance['title_menu']);
	  $title_img = esc_attr($instance['title_img']);
	?>


  <label  for="<?php echo $this->get_field_id('title_img'); ?>">图标上传</label><br />
 <input type="text" size="40" value="<?php echo $title_img; ?>" name="<?php echo $this->get_field_name('title_img'); ?>" id="<?php echo $this->get_field_id('title_img'); ?>"/>
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a><br />
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;"> 你可以上传一个图标在这个导航的前面以标明，不上传则不显示，图标大小为40像素高度，宽度不限（但不要上传过宽，最好在80像素以内） </em><br />


<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题1:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('title_link'); ?>"><?php esc_attr_e('标题1链接:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" type="text" value="<?php echo $title_link; ?>" /></label></p><br />


<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('标题2:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('title_link2'); ?>"><?php esc_attr_e('标题2链接:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title_link2'); ?>" name="<?php echo $this->get_field_name('title_link2'); ?>" type="text" value="<?php echo $title_link2; ?>" /></label></p><br />


<p>   
<?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="<?php echo $this->get_field_id('title_menu'); ?>">选择一个产品菜单（支持多层菜单）</label>
			<select id="<?php echo $this->get_field_id('title_menu'); ?>" name="<?php echo $this->get_field_name('title_menu'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $title_menu, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>

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
		$title= apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		$title2= apply_filters('widget_title', empty($instance['title2']) ? __('') : $instance['title2']);
		
        $title_link= apply_filters('widget_title', empty($instance['title_link']) ? __('') : $instance['title_link']);
		$title_link2= apply_filters('widget_title', empty($instance['title_link2']) ? __('') : $instance['title_link2']);
		
		$title_img= apply_filters('widget_title', empty($instance['title_img']) ? __('') : $instance['title_img']);
		
	    $title_menu = apply_filters('widget_title', empty($instance['title_menu']) ? __('') : $instance['title_menu']);
	 

		 
		?>
        
<div class="in_mode ">
<div class="title_menu">
<div class="title_menu_left">
<?php  if($title_img){ echo '<img  src="'.$title_img.'" alt="'.$title.'"/> ';} ?>
<?php if($title){?><a  class="title_menu_t1"target="_blank" href="<?php echo $title_link ?>"><?php echo $title ?></a><?php } ?>
<?php if($title2){?><a class="title_menu_t2" target="_blank" href="<?php echo $title_link2 ?>"><?php echo $title2 ?></a><?php } ?>
</div>

 
<?php  ob_start(); wp_nav_menu(array( 'container' => false,'menu' => $title_menu ,'items_wrap' => '<ul id="title_menu_nav">%3$s</ul>' ) ); ?>
</div>
</div>
 
        <?php
	}
}
register_widget('title_menu');
?>