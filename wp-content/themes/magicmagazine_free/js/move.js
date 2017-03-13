$(document).ready(function() { 

  $("#header_pic_nav  li.menu-item-has-children").append('<div class="drop_ioc"><div class="drop_ioc_in closed_drop"> </div></div>')
    $(".severs_nav_ul li.menu-item-has-children").append('<div class="drop_ioc"><div class="drop_ioc_in"> </div></div>')
	$(".designer .left_nav  ul li.menu-item-has-children,.left_nav_title").append("<div class='children_point'></div>")	
    $(".header_down").append('<div class="header_hieght"></div>')
  $("#header_pic_nav  li.menu-item-has-children .drop_ioc").click(function(e){
	  if($(this).children('.drop_ioc_in').hasClass('closed_drop')){
		  
		   $(this).prev('.sub-menu').slideUp(300);
		  $(this).children('.drop_ioc_in').removeClass('closed_drop');
		  }else{
	    $(this).children('.drop_ioc_in').addClass('closed_drop');
        $(this).prev('.sub-menu').slideDown(600);}
	
  });
  
   $(".severs_nav_ul li.menu-item-has-children .drop_ioc").click(function(e){
	
		   $(".severs_nav_ul li.menu-item-has-children .drop_ioc").prev('.sub-menu').slideUp(600);
		   $(this).prev('.sub-menu').slideDown(300);

  });
  $(".left_nav_title").click(function(e){
		   $(this).next('#waper_designer').slideToggle(300);
			  if($(this).hasClass('closed_waper_d')){
			   $(this).removeClass('closed_waper_d')
			   }else{$(this).addClass('closed_waper_d')} 

  });
  
    $(".designer .left_nav ul li.menu-item-has-children .children_point").click(function(e){
		   $(this).prev('.sub-menu').slideToggle(300);
			  if($(this).hasClass('closed_waper_d')){
			   $(this).removeClass('closed_waper_d')
			   }else{$(this).addClass('closed_waper_d')} 

  });
  
    $("#nav_b").click(function(e){
	  if($(this).hasClass('closed_nav_b')){
		   $('.header_down_out').slideUp(300);
		  $(this).removeClass('closed_nav_b');
		    $('.header').removeClass('header_fixed');
					     $('.contact_footer_caidan').removeClass("navb_open");
		  }else{
	      $(this).addClass('closed_nav_b');
		   $('.header').addClass('header_fixed');
		     $('.contact_footer_caidan').addClass("navb_open");
          $('.header_down_out').slideDown(600);}

  });
  
  

  
  
  
  $(".header_down").css('max-height', window.innerHeight-60+'px');




$('.contact_footer_weixin').click(function() { 
 $('.erweima_weixin').fadeIn(); $('.erweima_weixin').animate({"bottom":"70px"},800,'easeOutBack');   }); 
$('.contact_footer_languges').click(function() { 
 if($(this).hasClass("navb_open")){
 $('#languge_footer').fadeOut(600);
   $(this).removeClass("navb_open");
 }else{
	  $('#languge_footer').fadeIn(600);
   $(this).addClass("navb_open");
	 }
 
 
  }); 
  
  $('.weixn_closed').click(function() { $(this).parent('.erweima_weixin').animate({"bottom":"-200px"},800,'easeInBack'); $('.erweima_weixin').fadeOut();   }); 
$(".contact_footer_caidan").click(function() {
	 if($(this).hasClass("navb_open")){
	  $(".header_down_out").fadeOut(600);
	   $(this).removeClass("navb_open");
	      $('.header').removeClass('header_fixed');
		   $('#nav_b').removeClass('closed_nav_b');
	  }else{
		  
		   $(".header_down_out").fadeIn(600);
		    $('#nav_b').addClass('closed_nav_b');
		    $('.header').addClass('header_fixed');
	    $(this).addClass("navb_open");
		 $('#nav_b').addClass('closed_nav_b');
		  }
	
	 }); 
	 
$(".contact_footer_box").click(function() {$(this).next(".contact_footer").animate({"bottom":"0"},300,'easeOutSine');  });
 $(".contact_footer_closed").click(function() {$(this).parents(".contact_footer").animate({"bottom":"-60px"},300,'easeOutSine');  });
 
 

var gallery_xz = new Swiper('.left_p .gallery_xz',{
visibilityFullFit : true,
 pagination: '.left_p .galic_na',
 paginationClickable: true,
speed:1000
  });

	
var gallery_xzs = new Swiper('.enter .gallery_xz',{
visibilityFullFit : true,
 pagination: '.enter  .galic_na',
 paginationClickable: true,
speed:1000
  }); 
  
 	 
	var qiehuans = new Swiper('.enter .qiehuan',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000,
onSlideChangeStart: function(){
      $(".enter  .gallery_qiehuan_x .swiper-wrapper a").removeClass('active')
      $(".enter  .gallery_qiehuan_x  .swiper-wrapper a").eq(qiehuans.activeIndex).addClass('active')  
    }
  }); 
  
 
	 
	var qiehuan = new Swiper('.left_p .qiehuan',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000,
onSlideChangeStart: function(){
      $(".left_p .gallery_qiehuan_x .swiper-wrapper a").removeClass('active')
      $(".left_p .gallery_qiehuan_x  .swiper-wrapper a").eq(qiehuan.activeIndex).addClass('active')  
    }
  });


var gallery_qiehuan_xs = new Swiper('.enter .gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 4,
speed:500
  });

 $(".left_p .gallery_qiehuan_x .swiper-wrapper a,.enter .gallery_qiehuan_x .swiper-wrapper a").on('touchstart mousedown',function(e){
    e.preventDefault()
    $(".left_p .gallery_qiehuan_x  .swiper-wrapper .active,.enter .gallery_qiehuan_x .swiper-wrapper .active").removeClass('active');
    $(this).addClass('active');
	qiehuans.slideTo($(this).index() ,1000, false );
    qiehuan.slideTo($(this).index() ,1000, false );
	
   });
 $(".left_p .gallery_qiehuan_x .swiper-wrapper a,.enter .gallery_qiehuan_x .swiper-wrapper a").click(function(e){
    e.preventDefault()
  });


var gallery_qiehuan_x = new Swiper('.left_p .gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 4,
speed:500
  });

  qiehuan.params.control = gallery_qiehuan_x;
    gallery_qiehuan_x.params.control = qiehuan;
	
	 qiehuans.params.control = gallery_qiehuan_xs;
    gallery_qiehuan_xs.params.control = qiehuans; 
	
$(".close_order").click(function() {
    $(".shop_form").fadeOut(500);
});

$(".buy_btn .btn").click(function() {
    $(".shop_form").fadeIn(500);
    var a = $(".shop_form").offset().top - 300;
    $("html,body").animate({
        scrollTop: a
    }, 1e3);
});

$("#content_shop_btn").click(function() {
    $(this).addClass("cutyes");
    $("#comment_shop_btn").removeClass("cutyes");
    $("#comment_shop").fadeOut(300);
    $("#content_shop").fadeIn(300);
});

$("#comment_shop_btn").click(function() {
    $(this).addClass("cutyes");
    $("#content_shop_btn").removeClass("cutyes");
    $("#content_shop").fadeOut(300);
    $("#comment_shop").fadeIn(300);
});


 });