<div class="xiaot">
 <input type="checkbox" value="cache_open" name="cache_open"  disabled="disabled"id="cache_open"  />
 <label for="cache_open">开启内存缓存菜单功能</label>
 <p>若你的服务器没有支持memcache应用，请勿开启,否则在菜单处保存时会出现报错，但不影响使用，若服务器支持memcache，开启此应用之后会缓存菜单，大大降低查数据库询次数。服务器是否开启此应用请咨询你的服务器商，或者开启这个功能去菜单处保存一次菜单，如果没有报错警告，那么就是可用的。【付费版功能】</p>
  <p class="tishiwenzi">当前使用的主题为免费版，付费版可以解锁开启内存缓存的功能<a target="_blank" href="http://www.themepark.com.cn/mszzwordpressqyzt.htmll"> 查看付费版详情</a></p> 
</div>
<div class="xiaot">

    <input type="checkbox" value="shop_ok" name="theme_shop_open" id="theme_shop_open" <?php if(get_option('mytheme_theme_shop_open')=="shop_ok"){echo "checked='checked'";} ?> />
    <label for="theme_shop_open">开启兼容购物盒子插件</label>
    <p>开启购物盒子插件之后，首页调用文章模块中如果文章启用了插件中的是商品模式，会显示价格、原价、包邮等信息。分类目录中的《大图文列表》《图片列表》以及内页《产品展示模板（一栏模式以及默认模式）》均会显示商品信息，内页模板点击购买按钮会出现提交订单表单和商品评分和评价模块。 <br />
购物盒子（shoppingbox）是WEB主题公园开发的一款能够支持在线付款的插件，本主题已经优化兼容，详情请见购物盒子的使用教程：<a target="_blank" href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins">点击弹出查看</a><br />
<strong>请第一次使用这个插件的用户参考教程设置，购物盒子自带前端用户注册、登录和个人中心，需要初始化手动设置之后才能生效。</strong></p>
<p><strong>注意，现在分类目录模板的“图片列表（大图一栏）”和“大图文列表”支持商品模式！ 内页的两个产品模板支持商品模式！</strong></p>

  <b class="bt">社区内页模板选择</b>
               <p>开启社区功能之后，默认是内页模板《默认模板》你可以在这里选择全屏一栏模板</p>
          
              <p>
            <label  for="bbs_mo ">社区模板选择:</label>
                  <select name="bbs_mo" id="bbs_mo"  disabled="true">
                   <option value=''>默认模板</option>
                  
	             </select>  
  <p class="tishiwenzi">当前使用的主题为免费版，付费版可以解锁选取社区模板功能<a target="_blank" href="http://www.themepark.com.cn/mszzwordpressqyzt.htmll"> 查看付费版详情</a></p> 
 </div>

 <div class="xiaot">
 
              <b class="bt">多重筛选模块功能控制</b>
               <p>多重筛选模块，添加了这个模块请在菜单的“<strong>搜索菜单（搜索和标签页面显示）</strong>”中按照要求建立好菜单，教程请看：<a target="_blank" href="http://www.themepark.com.cn/wordpressdzsxgnjs.html">WEB主题公园多筛选功能教程</a></p>
            
              <p>
            <label  for="list_nmber_nav ">是否显示多重筛选:</label>
                  <select name="list_nmber_nav" id="list_nmber_nav"  disabled="true">
                 
                    <option value=''>不显示</option>
	             </select>
                   <p class="tishiwenzi">当前使用的主题为免费版，付费版可以解锁多重筛选功能<a target="_blank" href="http://www.themepark.com.cn/mszzwordpressqyzt.htmll"> 查看付费版详情</a></p>  
</p>

<p>多重筛选结果模板选择<strong>[小贴士：可以进行多重筛选的分类目录最好统一使用一个分类目录模板，并且你可以在下方指定多重筛选结果模板，将这些需要进行多重筛选的页面统一模板，这样多重筛选将会更加统一规范，给用户带来更加专业的感受！]</strong></p>
<p>
 <label  for="tags_m">多重筛选结果模板选择（搜索结果和标签结果显示模式）:</label>
                  <select name="tags_m" id="tags_m"  disabled="true" >
                    <option value=''>付费版功能不可选</option>
                   
	             </select>  
<p class="tishiwenzi">当前使用的主题为免费版，付费版可以解多重筛选、标签和搜索结果页模板选项的功能<a target="_blank" href="http://www.themepark.com.cn/mszzwordpressqyzt.htmll"> 查看付费版详情</a></p> 
</p>
     <p>
 <label  for="tags_moshi">多重筛标签筛选模式选项:</label>
                  <select name="tags_moshi" id="tags_moshi"  disabled="true">
                   <option value=''>付费版功能不可选</option>
  
                   
	             </select> <br />
 
<em>选择标签并集之后，比如筛选两个标签，那么只要文章拥有其中一个标签就会显示，选择标签越多，显示文章越多，选择标签交集，比如选择2个标签，那么文章必须带有这2个标签才会显示，标签选择越多，文章显示越少</em>
<p class="tishiwenzi">当前使用的主题为免费版，付费版可以解锁多重筛选功能<a target="_blank" href="http://www.themepark.com.cn/mszzwordpressqyzt.htmll"> 查看付费版详情</a>
<a target="_blank" href="http://www.themepark.com.cn/wordpressdzsxdsbgngx.html">多重筛选的功能介绍以及教程【视频播放】</a>
</p> 
</p>  

  <p>
 <label  for="tags_moshi">置顶是否显示“推荐”图标:</label>
                  <select name="stickys" id="stickys"  disabled="true">
                
                    <option value=''>不显示</option>
                   
	             </select> <br />
 
<p class="tishiwenzi">当前使用的主题为免费版，付费版可以解锁分类目录列表置顶以及置顶文章高亮的功能<a target="_blank" href="http://www.themepark.com.cn/mszzwordpressqyzt.htmll"> 查看付费版详情</a></p> 
</p>        
       
              </div>
 
        
 
               
                <div class="up">
                 
                     
                    <b class="bt">ICO图标上传</b>
                    <input type="text" size="80"  name="ico" id="ico" value="<?php echo get_option('mytheme_ico'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p><a href="http://www.themepark.com.cn/icotpssmrhzzicowj.html" target="_blank">ico是什么？ico图片制作教程</a></p>
                </div>     
                
        
        
                <div class="xiaot">
                <b class="bt">首页幻灯片模块设置</b>
                 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">首页的幻灯片模块是固定的，你可以选择2种模式，一种是调用全屏大图，一种是调用4图并列，也可以选择不显示这个模块</em><br />
                 <?php $big_pic_modle= get_option('mytheme_big_pic_modle');  ?>  
                 <label  for="big_pic_modle">模块模式选择</label>
                  <select name="big_pic_modle" id="big_pic_modle">
                   <option value=''<?php if ( $big_pic_modle ==="" ) {echo "selected='selected'";}?>>默认四图并列轮播</option>
                   <option value='1'<?php if ( $big_pic_modle ==="1" ) {echo "selected='selected'";}?>>全屏大图</option>
                   <option value='2'<?php if ( $big_pic_modle ==="2" ) {echo "selected='selected'";}?>>不显示</option>
                   
	             </select> <br /> 
                 
                  <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">幻灯片可以通过2种方式输出，菜单和文章，因此你可以在下方选择一个菜单或者一个分类目录（二选一，若都选择的话 优先调用文章,文章默认最多显示16篇，并且可以输出价格）</em><br />
                 <?php $big_pic_cat= get_option('mytheme_big_pic_cat');  ?>  
                 <label  for="big_pic_cat">选择分类</label>
             <select id="big_pic_cat" name="big_pic_cat" >
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
					if ( $big_pic_cat== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		    <?php } ?>
	       </select>
                 
               <br />
               
               <?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); $big_pic_nav= get_option('mytheme_big_pic_nav'); ?>
   <label for="big_pic_nav">请选择菜单</label>
			<select id="big_pic_nav" name="big_pic_nav">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $big_pic_nav, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>    
            
            
             <b class="bt">幻灯片下方悬浮模块（搜索）</b>
             <?php $big_search_cat= get_option('mytheme_big_search_cat');
			$big_pic_nav2= get_option('mytheme_big_pic_nav2');
			$big_search_key= get_option('mytheme_big_search_key');
			$pig_pic_title1=get_option('mytheme_pig_pic_title1');
			$pig_pic_title2=get_option('mytheme_pig_pic_title2');
			$pig_pic_title=get_option('mytheme_pig_pic_title');
			 ?>
            
            
                 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">幻灯片下方有一个悬浮模块，包含热门下拉菜单和搜索</em><br />
                   <label for="pig_pic_title1">英文标题</label>
                   <input type="text" size="13"  name="pig_pic_title2" id="pig_pic_title2" value="<?php if($pig_pic_title2){echo $pig_pic_title2;}else{echo "top";}; ?>"/> 
                  <input type="text" size="40"  name="pig_pic_title1" id="pig_pic_title1" value="<?php if($pig_pic_title1){echo $pig_pic_title1;}else{echo "recommended";}; ?>"/>  <br />
<label for="pig_pic_title">中文标题</label>
                  <input type="text" size="80"  name="pig_pic_title" id="pig_pic_title" value="<?php if($pig_pic_title){echo $pig_pic_title;}else{echo "本站热门推荐";}; ?>"/>  <br /><br />

                  <label for="big_pic_nav2">热门下拉菜单</label>
			<select id="big_pic_nav2" name="big_pic_nav2">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $big_pic_nav2, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>    <br /><br />
            <b class="bt">搜索设置</b>
                <label  for="big_search_key">选择搜索推荐分类</label>
 <textarea name="big_search_key" cols="86" rows="3" id="big_search_key"><?php echo get_option('mytheme_big_search_key'); ?></textarea> <br />
  <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">设置热门搜索词，一行一个</em><br />
   
    <label  for="big_search_cat">选择搜索推荐分类</label>
             <select id="big_search_cat" name="big_search_cat" >
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
					if ( $big_search_cat== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		    <?php } ?>
	       </select>
            
                </div>     
        
        
        
        
        
                        
                
                
                
	 <div class="up">
                    <b class="bt">自定义样式</b>
                    <textarea name="zdycss" cols="86" rows="3" id="zdycss"><?php echo stripslashes(get_option('mytheme_zdycss')); ?></textarea>   
                    <p>你可以在此处自定义某些样式，直接输入css样式代码即可发送到网站顶部以实现（注意！这个样式在网站所有的状态和页面均可实现，包括移动版）</p>
                </div>   
                
             	     	
      
            
    </div>
     

                                         
            
            
            
           
                   
                         
           
                   
                     