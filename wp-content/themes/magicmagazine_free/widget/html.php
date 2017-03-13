<?php 

class html extends WP_Widget {

	function html()
	{
		$widget_ops = array('classname'=>'html','description' => get_bloginfo('template_url').'/images/xuanxiang/12.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="html",$name='广告模块（代码和图片）',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
		 
		 
		$htmls = esc_attr($instance['htmls']); 
		$showmove =esc_attr($instance['showmove']);
	    $code = esc_attr($instance['code']);
	    $ad_pic = esc_attr($instance['ad_pic']);

		$ad_pic_link = esc_attr($instance['ad_pic_link']);

	?>

<br />



 <p><strong>模块说明：</strong>这个模块可上传广告图片，或者使用前端代码输出广告、视频以及你的自定义html内容<br /></p>
 
 



<p><label for="<?php echo $this->get_field_id('htmls'); ?>"><?php esc_attr_e('代码或者文字'); ?> 

<textarea style="width:96%" id="<?php echo $this->get_field_id('htmls'); ?>" name="<?php echo $this->get_field_name('htmls'); ?>"cols="52" rows="4" ><?php echo stripslashes($htmls); ?></textarea>    
</label>
<em>这里输入的内容支持html代码或者js代码，也支持文本<br />
文本输入时，可以外套P标签如< p> 关于我们< /p>，空行使用< br >(实际输入时，删除p之前的空格，删除br前后空格即可)</em>
</p>

<p>   
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">代码和图片上传可同时上传，那么就会都显示出来，不设置就不会显示。【付费版支持手机上和平板电脑上的图片可以分开上传，以避免图片宽度不够而产生较大空白】</em><br />
  <label  for="<?php echo $this->get_field_id('ad_pic'); ?>">广告图片(宽度1106像素高度自定义):</label><br />
 <input type="text" size="40" value="<?php echo $ad_pic; ?>" name="<?php echo $this->get_field_name('ad_pic'); ?>" id="<?php echo $this->get_field_id('ad_pic'); ?>"/>
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a><br /><br /><br />
 
   <label  for="">手机上的广告图片(宽度700像素高度自定义):</label><br />
 <input type="text" size="40" value="付费版可兼容手机版" name="" id=""readonly="readonly"/>
 <a id="" class="button" href="#">上传</a><br />
 

   <label  for="<?php echo $this->get_field_id('ad_pic_link'); ?>">图片链接:</label><br />
 <input type="text" size="40" value="<?php echo $ad_pic_link; ?>" name="<?php echo $this->get_field_name('ad_pic_link'); ?>" id="<?php echo $this->get_field_id('ad_pic_link'); ?>"/><br />

    <label  for="<?php echo $this->get_field_id('showmove'); ?>">外层嵌套样式:</label><br />
             <select id="<?php echo $this->get_field_id('showmove'); ?>" name="<?php echo $this->get_field_name('showmove'); ?>" >
              <option value=''<?php if ($showmove== "" ) {echo "selected='selected'";}?> >默认嵌套一级样式</option>
	          <option value='1'<?php if ($showmove == "1" ) {echo "selected='selected'";}?>>嵌套二层样式p标签</option>
              <option value='2'<?php if ($showmove == "2" ) {echo "selected='selected'";}?>>完全不嵌套</option>
		
	</select><br />

<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">
默认嵌套一级样式为最外层div样式这样会和其他模块对齐并有白色背景。<br />
嵌套二层p标签可以直接输入文字，并使用 br标签空行。<br />
不嵌套任何样式，即可自由使用你自己编写的html元素了。
</em>
</p>



	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	     $id =$instance['id'];
     
	    $htmls = apply_filters('widget_title', empty($instance['htmls']) ? __('') : $instance['htmls']);
		$showmove=apply_filters('widget_title', empty($instance['showmove']) ? __('') : $instance['showmove']);
		 $code = apply_filters('widget_title', empty($instance['code']) ? __('') : $instance['code']);
		 $ad_pic = apply_filters('widget_title', empty($instance['ad_pic']) ? __('') : $instance['ad_pic']);
	
		 $ad_pic_link = apply_filters('widget_title', empty($instance['ad_pic_link']) ? __('') : $instance['ad_pic_link']);


if($ad_pic){$add_pic='<div class="two_modle_right_code"><a target="_blank" href="'.$ad_pic_link.'" ><img  src="'.$ad_pic.'" alt="'.get_bloginfo('name').'" /></a></div>';}

if(!$showmove){ echo '<div class="in_mode ">'.$add_pic. html_entity_decode($htmls).'</div>'; }elseif($showmove==1){echo  '<div class="in_mode html_modle">'.$add_pic.'<p>' .html_entity_decode($htmls).'</p></div>';}elseif($showmove==2){ echo $add_pic.html_entity_decode($htmls);}

 
	}
}
register_widget('html');
?>