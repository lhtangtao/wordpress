$.fn.left_opacitys=function () {$(this).animate({"opacity":"1","right":"0"},800,'easeOutSine');}
$.fn.left_opacitys_no=function () {$(this).animate({"opacity":"0","right":"-100px"},500,'easeOutSine');}
$.fn.up_opacitys=function () {$(this).animate({"opacity":"1","top":"0"},800,'easeOutSine');}
$.fn.up_opacitys_no=function () {$(this).animate({"opacity":"0","top":"-100px"},500,'easeOutSine');}


$.extend({fadeuot_now:function(){   $("#product_nav").slideUp(500) ;$("#header_pic_nav").slideUp(500);}});


$.extend({news_open:function(){
	

	$('.news_tuoch.swiper-slide-active').children(".swiper-slide_in").children('.left_news').delay(500).animate({"opacity":"1","margin-left":"0"},800,'easeOutSine');
	$('.news_tuoch.swiper-slide-active').children(".swiper-slide_in").children('.right_news').delay(500).animate({"opacity":"1","margin-right":"0"},800,'easeOutSine');

		 $('.news_tuoch').not('.swiper-slide-active').children(".swiper-slide_in").children('.left_news').animate({"opacity":"0","margin-left":"-100px"},800,'easeOutSine');
	    $('.news_tuoch').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_news').animate({"opacity":"0","margin-right":"-100px"},800,'easeOutSine');
	   
	
		

	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.left_pic').children("img").delay(500).animate({"opacity":"1","left":"0"},800,'easeOutSine');
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children(".title_lr_mod").delay(500).left_opacitys();
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("h3").delay(700).left_opacitys();
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("p").delay(900).left_opacitys();
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children(".btn").delay(1000).left_opacitys();
	

	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.left_pic').children("img").animate({"opacity":"0","left":"-100px"},800,'easeOutSine');
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children(".title_lr_mod").left_opacitys_no();
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("h3").left_opacitys_no();
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("p").left_opacitys_no();
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children("a").left_opacitys_no();
	
	
	
	
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.down_pic').children("img").delay(500).animate({"opacity":"1","top":"0"},1500,'easeOutCubic');
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("h3").delay(1500).up_opacitys();
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("p").delay(1500).up_opacitys();
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children(".btn").delay(1500).up_opacitys();
		$('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.down_pic').children("img").animate({"opacity":"0","top":"80%"},800,'easeOutSine');
	    $('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("h3").up_opacitys_no();
	    $('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("p").up_opacitys_no();
	    $('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children(".btn").up_opacitys_no();
			
	$('.case_index_mod.swiper-slide-active').children(".swiper-slide_in").children('.case_up').delay(500).animate({"opacity":"1"},800,'easeOutSine');
	$('.case_index_mod.swiper-slide-active').children(".swiper-slide_in").children('.case_index').delay(1000).animate({"opacity":"1"},800,'easeOutSine');
	
  $('.case_index_mod').not('.swiper-slide-active').children(".swiper-slide_in").children('.case_up').animate({"opacity":"0"},800,'easeOutSine');
  $('.case_index_mod').not('.swiper-slide-active').children(".swiper-slide_in").children('.case_index').animate({"opacity":"0"},800,'easeOutSine');
	
}});
	
	
	
	$(document).ready(function() {
  




 $("#header_pic_menu").children("li").stop().mouseenter(function() {
	  $(this).children("a").children("img").stop().animate({"top":"23px"},300);
	  $(this).children("a").children("b").stop().animate({"top":"-42px"},300);
	 });
 
  $("#header_pic_menu").children("li").stop().mouseleave(function() {
      $(this).children("a").children("img").stop().animate({"top":"0"},300);
	  $(this).children("a").children("b").stop().animate({"top":"0"},300);
	 });
 
   $("#nav_b").click(function() {
      $("#header_pic_nav").slideToggle("800");

	  $("#product_nav").fadeOut(100)
	
	 }); 
  
   
   $(".show_top_icon").stop().mouseenter(function() { 
   $(this).stop().animate({"height":"96px"},300);
   if($(this).hasClass('show_iocn_ok')){}else{

   $(".show_top_icon").addClass('show_iocn_ok')
   }
   });
   
     $(".show_top_icon").stop().mouseleave(function() { 
   $(this).stop().animate({"height":"55px"},300);
   if($(this).hasClass('show_iocn_ok')){
	   
	    $(".show_top_icon").remove('show_iocn_ok')
	   }
   });
   
   
   $(".product_b").click(function() {
      $("#product_nav").slideToggle("800")
	 
	 var nav_pic_swiper = new Swiper('.nav_pic_swiper',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000
  });
$('#nav_pic_swiper_prve').click(function(){nav_pic_swiper.swipePrev(); });
$('#nav_pic_swiper_next').click(function(){nav_pic_swiper.swipeNext(); });
 $("#header_pic_nav").fadeOut(100)
	 }); 
  
 });

