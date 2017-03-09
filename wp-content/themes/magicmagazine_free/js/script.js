  $(document).ready(function() {
	
  
   $(".big_pic_new_out,.header_menu_ul li,.index_swipers,.severs_nav_ul li,.qie_designer a,.nav_poket_widgetss_in,.designer_sweper,.designer .left_nav ul li,.right_pic_ul_s li,.pic_tow_sid li,.case_two_swiper li,.pic_big_bottom_in_nav li").hover(function() {
   
        $(this).children(".sub-menu,.index_next,.index_prve,.opens_designer,.text_right_pics").stop(true, true).fadeIn("200");
    }, function() {

        $(this).children(".sub-menu,.index_next,.index_prve,.opens_designer,.text_right_pics").stop(true, true).fadeOut("1000");
    });
	
	
$(".pic_l_in ul li").mouseenter(function() { $(this).children(".vedio_over_li").animate({ "bottom": 0},500);});
$(".pic_l_in ul li").mouseleave(function() { $(this).children(".vedio_over_li").animate({ "bottom": "-100%"}, 500);});
$(".designer .left_nav  ul li.menu-item-has-children").append("<div class='children_point'></div>")	


$(".pic_l_in ul li").mouseenter(function() { $(this).children(".vedio_over_li").animate({ "bottom": 0},500);});
$(".pic_l_in ul li").mouseleave(function() { $(this).children(".vedio_over_li").animate({ "bottom": "-100%"}, 500);});


$(".pic_big_bottom_in_search #searchform .header_search_go #s").click(function() { $(".search_key_mod").slideDown(500)});
$(".pic_big_bottom_in_search").mouseleave(function() { $(".search_key_mod").slideUp(500);});


$(".big_pic_new .swiper-wrapper .pic_big_slied,.big_pic_new li.menu-item").stop().mouseenter(function() { 
$(this).animate({ "opacity": 1},500);
$(this).children(".pic_big_title").children("p").animate({ "opacity": 1,"height": "80px"},600);
$(this).children("a").children("span").children("p").animate({ "opacity": 1,"height": "80px"},600);
$(this).siblings(".pic_big_slied,li.menu-item").animate({ "opacity": 0.7},400);

});
$(".big_pic_new .swiper-wrapper .pic_big_slied,.big_pic_new li.menu-item").stop().mouseleave(function() {

$(this).children(".pic_big_title").children("p").animate({ "opacity": 0,"height": 0},600);
$(this).children("a").children("span").children("p").animate({ "opacity": 0,"height": 0},600);	
	 });
$(".big_pic_new .swiper-wrapper").stop().mouseleave(function() { 
$(this).children(".pic_big_slied").animate({ "opacity": 1},500);
$(this).children("li.menu-item").animate({ "opacity": 1},500);
});

$(".two_modle_right ul .two_modle_right_top").stop().mouseenter(function() {
	if(!$(this).hasClass("two_modle_right_top_open")){
		
		$(this).addClass("two_modle_right_top_open");
		$(this).siblings(".two_modle_right_top").removeClass("two_modle_right_top_open");
		}
	
	
	});
	
 $(".kefu_d").stop().mouseenter(function() {
        $(this).children("div").fadeIn(300);
    });
    $(".kefu_d").stop().mouseleave(function() {
        $(this).children("div").fadeOut(300);
    });
    $("#homes").click(function() {
        if ($(this).hasClass("op")) {
            $(".kefu_d").not("#homes").fadeIn(300);
            $(this).removeClass("op");
        } else {
            $(".kefu_d").not("#homes").fadeOut(300);
            $(this).addClass("op");
        }
    });	
	 
var gallery_xz = new Swiper('.gallery_xz',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
 pagination: '.galic_na',
 paginationClickable: true,
speed:1000
  });
$('.gallery_xz .galic_prve').click(function(){gallery_xz.swipePrev(); });
$('.gallery_xz .galic_next').click(function(){gallery_xz.swipeNext(); }); 
	 
	 
	var qiehuan = new Swiper('.qiehuan',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000,
onSlideChangeStart: function(){
      $(".gallery_qiehuan_x  .swiper-wrapper .active").removeClass('active')
      $(".gallery_qiehuan_x  .swiper-wrapper a").eq(qiehuan.activeIndex).addClass('active')  
    }
  });

 $(".gallery_qiehuan_x  .swiper-wrapper a").on('touchstart mousedown',function(e){
    e.preventDefault()
    $(".gallery_qiehuan_x  .swiper-wrapper .active").removeClass('active')
    $(this).addClass('active');
	
     qiehuan.swipeTo( $(this).index() ,1000, false );
  });
  $(".gallery_qiehuan_x  .swiper-wrapper a").click(function(e){
    e.preventDefault()
  });


var gallery_qiehuan_x = new Swiper('.gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 4,
speed:500
  });
$(".gallery_qiehuan_x").children(".swiper-wrapper").css("width", 80 * $(".gallery_qiehuan_x").children(".swiper-wrapper").children("a").length + "px");
  $('.gallery_qiehuan_x .galic_prve').click(function(){gallery_qiehuan_x.swipePrev();  });
$('.gallery_qiehuan_x .galic_next').click(function(){gallery_qiehuan_x.swipeNext(); });



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

$(window).scroll(function (){ 

 if($(window).scrollTop() >= 500 ){
	 $(".header_down_out").addClass('header_down_out_fixed')
	 
	 }else{
		 
		 $(".header_down_out").removeClass('header_down_out_fixed') 
		 }
 
 
 
  }); 
 });

