<?php
function mytheme_header_options($wp_customize){
		$wp_customize->add_section('mytheme_header_options', array(
        'title'    => __('网站顶部设置', 'mytheme'),
        'description' => '通过这个选项设置顶部的样式和内容</br>  <a href="http://www.themepark.com.cn" target="_blank">WEB主题公园开发提供</a>',
        'priority' => 60,
    ));

	class Ari_Customize_Textarea_Control extends WP_Customize_Control {
  public $type = 'textarea';
  public function render_content() {

 ?>
  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value()); ?></textarea>
  </label>
  <p><?php echo esc_html( $this->description); ?></p>
<?php 
  }
}


	class Ari_Customize_fengexian_Control extends WP_Customize_Control {
  public $type = 'fengexian';
  public function render_content() {

 ?>
 <div style="width:100%; background:#333; margin:15px 0; height:1px;"></div>
  
<?php 
  }
}


  $wp_customize->add_setting('mytheme_logo', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_logo', array(
        'label'    => __('logo上传[尺寸高度：78px，宽度不要超过200px]', 'mytheme_logo'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_logo',
     )
    )); 


 $wp_customize->add_setting('mytheme_body_pic', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_body_pic', array(
        'label'    => __('整站背景纹理图片（默认白色细小圆点纹理）', 'mytheme_body_pic'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_body_pic',
     )
    )); 

  $wp_customize->add_setting('mytheme_logo_ad', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_logo_ad', array(
        'label'    => __('顶部背景图片', 'mytheme_logo_ad'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_logo_ad',
     )
    )); 


 $wp_customize->add_setting('mytheme_tops_pic', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_tops_pic', array(
        'label'    => __('顶端信息栏背景图片（默认黑色半透明）', 'mytheme_tops_pic'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_tops_pic',
     )
    )); 



  $wp_customize->add_setting('mytheme_form_pic', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_form_pic', array(
        'label'    => __('导航的背景图片(高度60像素，居中平铺)', 'mytheme_form_pic'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_form_pic',
     )
    )); 
		
  $wp_customize->add_setting('mytheme_form_pic_hover', array(
		'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_form_pic_hover', array(
        'label'    => __('鼠标经过的导航的背景图片(高度60像素，默认黑色半透明)', 'mytheme_form_pic_hover'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_form_pic_hover',
     )
    )); 

	
	 $wp_customize->add_setting('mytheme_ad_top', array(
        'default'        => 'WEB主题公园[www.themepark.com.cn]用心做最好的原创中文WordPress主题!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_ad_top', array(
        'label'      => __('顶部广告词', 'mytheme_ad_top'),
             'section'  => 'mytheme_header_options',
        'settings'   => 'mytheme_ad_top',
	
    ));
	
	
		 $wp_customize->add_setting('mytheme_ad_top_link', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_ad_top_link', array(
        'label'      => __('顶部广告词链接', 'mytheme_ad_top_link'),
             'section'  => 'mytheme_header_options',
        'settings'   => 'mytheme_ad_top_link',
	
    ));
		
		  $wp_customize->add_setting('mytheme_top_ad_img', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_top_ad_img', array(
        'label'    => __('顶部广告图片', 'mytheme_top_ad_img'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_top_ad_img',
     )
    )); 
	
	
		 $wp_customize->add_setting('mytheme_top_ad_img_link', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_top_ad_img_link', array(
        'label'      => __('广告图片链接', 'mytheme_top_ad_img_link'),
             'section'  => 'mytheme_header_options',
        'settings'   => 'mytheme_top_ad_img_link',
	
    ));
	
   
   	 $wp_customize->add_setting('mytheme_nav_hover', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_nav_hover', array(
        'label'    => __('顶部广告词和链接字体的颜色', 'extraordinaryvision'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_nav_hover',
    )));
   
   
   
	
	 $wp_customize->add_setting('mytheme_nav_title', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_nav_title', array(
        'label'    => __('导航的主标题颜色', 'extraordinaryvision'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_nav_title',
    )));
	
	 $wp_customize->add_setting('mytheme_nav_title2', array(
	    'default'        => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_nav_title2', array(
        'label'    => __('导航的副题颜色', 'extraordinaryvision'),
         'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_nav_title2',
    )));	
	
	
   
};
add_action('customize_register', 'mytheme_header_options');
?>