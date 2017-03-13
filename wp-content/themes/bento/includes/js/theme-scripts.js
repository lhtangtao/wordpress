
// Scripts used by the theme



// Noconflict
var $str = jQuery.noConflict();

// Variables
var $bento_isocontainer = $str('.items-container');
var bento_lastwindowPos = $str(window).scrollTop();

// Check if an iOS device
function bentoCheckDevice() {
	var iDevices = [
		'iPad Simulator',
		'iPhone Simulator',
		'iPod Simulator',
		'iPad',
		'iPhone',
		'iPod',
		'Mac68K',
		'MacPPC',
		'MacIntel'
	];
	if ( !!navigator.platform ) {
		while ( iDevices.length ) {
			if ( navigator.platform === iDevices.pop() ) { 
				return true; 
			}
		}
	}
	return false;
}

// Generate em values
function bentoEmValue(input) {
    var emSize = parseFloat( $str('html').css('font-size') );
    var output = emSize * 1.6 * input;
	return output;
}


$str(document).ready(function() {
	
	// Submenu animations
	if ( bentoThemeVars.menu_config < 2 ) {
		$str('.primary-menu .menu-item-has-children').hover(function() {
			var parentMenu = $str(this);
			var submPos = parentMenu.offset().left;
			var windowWidth = $str(window).width();
			if ( parentMenu.parents('.menu-item-has-children').length ) {
				var subsubOff = submPos + 400; // 200 for each submenu width
				if ( subsubOff > windowWidth ) {
					parentMenu.children('.sub-menu').css({'left':'auto','right':'100%'});
				}
			} else {
				var subsubOff = submPos + 200; // 200 is the submenu width
				if ( subsubOff > windowWidth ) {
					parentMenu.children('.sub-menu').css({'right':'0'});
				}
			}
			$str(this).children('.sub-menu').fadeIn(200);
		}, function() {
			$str(this).children('.sub-menu').fadeOut(200);
		});
	} else if ( bentoThemeVars.menu_config == 2 ) {
		$str('.ham-menu-trigger-container').click(function() {
			$str('.header-menu, .ham-menu-close-container').fadeIn(200, function() {
				$str('body').addClass('mobile-menu-open');
			});
			var $menu = $str('#nav-primary');
			var menuHeight = 0;
			if ( $menu.outerHeight(false) > 0 ) {
				menuHeight = $menu.outerHeight(false);
			}
			var menuMargin = ( $str(window).height() - menuHeight ) / 2;
			$menu.css('margin-top',menuMargin+'px');
		});
		$str('.ham-menu-close-container').click(function() {
			$str('.header-menu, .ham-menu-close-container').fadeOut(200, function() {
				$str('body').removeClass('mobile-menu-open');
			});
		});
	} else if ( bentoThemeVars.menu_config == 3 ) {
		$str('.primary-menu .menu-item-has-children > a').toggle(function(e) {
			if ( ! $str(this).hasClass('opened-side-menu') ) {
				$str(this).addClass('opened-side-menu');
			}
			$str(this).siblings('.sub-menu').slideDown(200);
		}, function(e) {
			e.preventDefault();
			if ( $str(this).hasClass('opened-side-menu') ) {
				$str(this).removeClass('opened-side-menu');
			}
			$str(this).siblings('.sub-menu').slideUp(200);
		});
	}
	
	
	// Mobile menu animations
	$str('.mobile-menu-trigger-container').click(function() {	
		var device = bentoCheckDevice();
		if ( device == false ) {
			$str('body').addClass('mobile-menu-open');
		}
		$str('.mobile-menu-shadow').fadeIn(500);
		$str('#nav-mobile').css("left", '0');
	});
	$str('.mobile-menu-close,.mobile-menu-shadow').click(function() {
		if ( $str('body').hasClass('mobile-menu-open') ) {
			$str('body').removeClass('mobile-menu-open');
		}
		$str('.mobile-menu-shadow').fadeOut(500);
		$str('#nav-mobile').css("left", '-100%');
	});
	
	
	// Side menu position on load
	if ( bentoThemeVars.menu_config == 3 ) {
		var bento_headertop = 0;
		if ( $str('#wpadminbar').outerHeight(true) > 0 ) {
			bento_headertop = $str('#wpadminbar').outerHeight(true);
		}
		$str('.header-side .site-header').css('top',bento_headertop+'px');
	}
	
	
	// Fixed header on scroll
	if ( bentoThemeVars.fixed_menu == 1 && bentoThemeVars.menu_config != 3 && $str(window).width() > bentoEmValue(80) ) {
		if ( $str(window).scrollTop() > 0 ) {
			if ( ! $str('.fixed-header').length ) {
				var $bento_headerClone = $str('.site-header > .bnt-container').clone();
				$str('body').append('<header class="site-header fixed-header"></header>');
				$str('.fixed-header').html($bento_headerClone);
			}
		}
	}
	
	
	// Smooth scrolling for same-page menu links
	$str('.menu-container a').click(function(e) {
		if ( $str(this).attr('href').indexOf("#") != -1 ) {
			var hash = $str(this).attr('href').substring($str(this).attr('href').indexOf('#')+1);
			var scrollPosition = 0; 
			var headerHeight = 0;
			if ( bentoThemeVars.fixed_menu == 1 ) {
				headerHeight = $str('.site-header').outerHeight(true);
			}
			if ( $str('#' + hash).length ) {
				e.preventDefault();
				scrollPosition = $str('#' + hash).offset().top - headerHeight - 10;
				$str('html, body').animate( { scrollTop: scrollPosition }, 500 );
			}
		}
	});
	
	
	// Comment form labels
	$str('.comment-form-field input').focus(function() {
		$str(this).siblings('label').fadeIn(500);
	}).blur(function() {
		if ( ! $str(this).val() ) {
			$str(this).siblings('label').fadeOut(500);
		}
	});
	if ( $str('.comment-form-field input').val() ) {
		$str(this).siblings('label').css('display','block');	
	}
	
	
	// Responsive videos
	$str('.entry-content iframe[src*="youtube.com"],.entry-content iframe[src*="vimeo.com"]').each(function() {
		$str(this).parent().fitVids();
	});
	
	
	// Grid layouts with Isotope
	var $grid = $bento_isocontainer.imagesLoaded( function() {
		$grid.isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			packery: {
				columnWidth: $grid.find('.grid-sizer')[0],
			}
		});
		$grid.isotope({ 
			layoutMode: bentoThemeVars.grid_mode,
		});
	});
	
	
	// Ajax pagination
	var bento_page = 1;
	if ( bento_page < bentoThemeVars.max_pages ) {
		$str('.ajax-load-more').fadeIn(100).css('display','block');
	}
	$str('.ajax-load-more').click(function () {
		$str('.spinner-ajax').fadeIn(400);
		$str.ajax({
			url: bentoThemeVars.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: bentoThemeVars.query_vars,
				page: bento_page
			},
			success: function (html) {
				var $posts = $str(html).fadeIn(400);
				if ( $bento_isocontainer.length ) {
					$grid.append($posts).isotope('appended', $posts);
					$grid.imagesLoaded().progress( function() {
						$grid.isotope('layout');
					});
				} else {
					$str('.site-main').append($posts);	
				}
			}
		});
		bento_page++;
		$str('.spinner-ajax').fadeOut(400);
		if ( bento_page >= bentoThemeVars.max_pages ) {
			$str('.ajax-load-more').remove();
		}
	});

	
	// Scroll to bottom of header with CTA buttons
	$str('.post-header-cta div').click(function() {
		var hb = $str('.post-header').position().top + $str('.post-header').outerHeight(true);
		$str('html, body').animate( { scrollTop: hb }, 1000 );
	});
	
	
	// Display "add to cart" buttons on products
	$str('.products .product').hover(function() {
		$str(this).find('.add_to_cart_button').fadeIn(200);
	}, function() {
		$str(this).find('.add_to_cart_button').fadeOut(200);	
	});
	
	
	// Hide novice header on button click
	$str('.nhb-dismiss').click(function() {
		$str.ajax({
            type:   'post',
            url:    bentoThemeVars.ajaxurl,
			data: {
                action: 'dismiss_novice',
            },
            dataType: 'json'
		}).done(function( json ) {
            $str('.novice-header').fadeOut();
        });
	});
		
		
});


$str(window).load(function () {


	// Display grid items when everything is loaded
	$str('.spinner-grid').fadeOut(100);
	$bento_isocontainer.fadeIn(300, function() {
		if ( bentoThemeVars.full_width_grid == 'on' ) {
			var ww = $str(window).width();
			var im = $str('.grid-item-inner').css('padding-left').replace("px", "");
			var nw = ww - ( 2 * im );
			var cw = $str('.site-content .bnt-container').width();
			var ml = ( ( ww - cw ) / -2 ) + ( im * 2 );
			$str('.site-content .grid-container').css({'width':nw+'px','left':ml+'px'});
		}
		$bento_isocontainer.isotope().isotope('layout');
	});
	$bento_isocontainer.isotope().isotope('layout');
	
	
	// Submenu margins 
	if ( bentoThemeVars.menu_config == 0 ) {
		var bento_headerheight = $str('.site-header').height();
		var bento_menuheight = $str('.primary-menu').height();
		var bento_submenumargin = ( bento_headerheight - bento_menuheight ) / 2;
		$str('.primary-menu > li > .sub-menu').css('border-top-width',bento_submenumargin+'px');
	}
	
	
	// Scroll to the correct position for hash URLs
	if ( window.location.hash ) {
		var bento_cleanhash = window.location.hash.substr(1);
		if ( $str('#' + bento_cleanhash).length ) {
			if ( bentoThemeVars.fixed_menu == 1 ) {
				var bento_headerHeight = $str('.site-header').outerHeight(true);
			}
			scrollPosition = $str('#' + bento_cleanhash).offset().top - bento_headerHeight - 10;
			$str('html, body').animate( { scrollTop: scrollPosition }, 1 );
		}
	}


});


$str(window).resize(function () {


	// Relayout Isotope on browser resize
	if ( bentoThemeVars.full_width_grid == 'on' ) {
		var bento_ww = $str(window).width();
		var bento_im = $str('.grid-item-inner').css('padding-left').replace("px", "");
		var bento_nw = bento_ww - ( 2 * bento_im );
		var bento_cw = $str('.site-content .bnt-container').width();
		var bento_ml = ( ( bento_ww - bento_cw ) / -2 ) + ( bento_im * 2 );
		$str('.site-content .grid-container').css({'width':bento_nw+'px','left':bento_ml+'px'});
	}
	$bento_isocontainer.isotope().isotope('layout');
	
	
	// Set overlay menu margin
	if ( bentoThemeVars.menu_config == 2 ) {
		var $bento_menu = $str('#nav-primary');
		var bento_menuHeight = 0;
		if ( $bento_menu.outerHeight(false) > 0 ) {
			bento_menuHeight = $bento_menu.outerHeight(false);
		}
		var bento_menuMargin = ( $str(window).height() - bento_menuHeight ) / 2;
		$bento_menu.css('margin-top',bento_menuMargin+'px');
	}


});


$str(window).scroll(function () {
	
	
	// Side menu on scroll
	if ( bentoThemeVars.menu_config == 3 ) {
		var $bento_header = $str('.header-side .site-header');
		var bento_windowPos = $str(window).scrollTop();
		var bento_headertop = parseInt($bento_header.css('top'),10);
		var bento_windowHeight = $str(window).height();
		var bento_headerHeight = $bento_header.outerHeight(true); 
		var bento_bodyHeight = $str(document).height();
		var bento_adminbarHeight = 0;
		if ( $str('#wpadminbar').outerHeight(true) > 0 ) {
			bento_adminbarHeight = $str('#wpadminbar').outerHeight(true);
		}
		var bento_coef = 1;
		if ( bento_headerHeight > bento_windowHeight ) {
			var bento_headerDiff = bento_headerHeight - bento_windowHeight;
			if ( bento_headerDiff * 2 < bento_bodyHeight - bento_windowHeight ) {
				bento_coef = 2;
			}
			if ( bento_windowPos > bento_lastwindowPos ) {
				if ( bento_headertop >= -bento_headerDiff ) {
					bento_headertop = bento_headertop - ( ( bento_windowPos - bento_lastwindowPos ) / bento_coef );
				}
				if ( bento_windowHeight + bento_windowPos >= bento_bodyHeight ) {
					bento_headertop = -bento_headerDiff;
				}
			} else {
				if ( bento_windowPos == 0 || bento_headertop >= adminbarHeight ) {
					bento_headertop = bento_adminbarHeight;
				} else {
					bento_headertop = bento_headertop + ( ( bento_lastwindowPos - bento_windowPos ) / bento_coef );
				}
			}	
		}
		$bento_header.css('top',bento_headertop+'px');
		bento_lastwindowPos = bento_windowPos;
	}
	
	
	// Fixed header on scroll
	if ( bentoThemeVars.fixed_menu == 1 && bentoThemeVars.menu_config != 3 && $str(window).width() > bentoEmValue(80) ) {
		if ( $str(window).scrollTop() > 0 ) {
			if ( ! $str('.fixed-header').length ) {
				var $bento_headerClone = $str('.site-header > .bnt-container').clone(true);
				$str('.site-wrapper').append('<header class="site-header fixed-header"></header>');
				$str('.fixed-header').html($bento_headerClone).fadeIn(600);
			}
		} else {
			if ( $str('.fixed-header').length ) {
				$str('.fixed-header').remove();
			}
		}
	}
	
	
});