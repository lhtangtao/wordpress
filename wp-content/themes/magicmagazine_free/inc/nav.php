<div id="header_pic_nav" >    
<?php  ob_start(); wp_nav_menu(array('walker' => new header_menu(), 'container' => false,'theme_location' =>'header-menu','items_wrap' => '<div id="header_pic_menu" class="header_menu_ul ">%3$s</div>' ) ); ?>
</div>