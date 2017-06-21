/* script for header background*/

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $(".header").addClass("bgchange");
    } else {
        $(".header").removeClass("bgchange");
    }
});
	function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }

// map

    $(".turn").click(function(){
        $(".address").slideUp("slow");
    });

    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });

// CSS-3 Effects

/*
 * CSS3 Animate it
 * Copyright (c) 2014 Jack McCourt
 * https://github.com/kriegar/css3-animate-it
 * Version: 0.1.0
 * 
 * I utilise the jQuery.appear plugin within this javascript file so here is a link to that too
 * https://github.com/morr/jquery.appear
 *
 * I also utilise the jQuery.doTimeout plugin for the data-sequence functionality so here is a link back to them.
 * http://benalman.com/projects/jquery-dotimeout-plugin/
 */
(function($) {
  var selectors = [];

  var check_binded = false;
  var check_lock = false;
  var defaults = {
    interval: 250,
    force_process: false
  }
  var $window = $(window);

  var $prior_appeared;

  function process() {
    check_lock = false;
    for (var index = 0; index < selectors.length; index++) {
      var $appeared = $(selectors[index]).filter(function() {
        return $(this).is(':appeared');
      });

      $appeared.trigger('appear', [$appeared]);

      if ($prior_appeared) {
        
        var $disappeared = $prior_appeared.not($appeared);
        $disappeared.trigger('disappear', [$disappeared]);
      }
      $prior_appeared = $appeared;
    }
  }

  // "appeared" custom filter
  $.expr[':']['appeared'] = function(element) {
    var $element = $(element);
    if (!$element.is(':visible')) {
      return false;
    }

    var window_left = $window.scrollLeft();
    var window_top = $window.scrollTop();
    var offset = $element.offset();
    var left = offset.left;
    var top = offset.top;

    if (top + $element.height() >= window_top &&
        top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() &&
        left + $element.width() >= window_left &&
        left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
      return true;
    } else {
      return false;
    }
  }

  $.fn.extend({
    // watching for element's appearance in browser viewport
    appear: function(options) {
      var opts = $.extend({}, defaults, options || {});
      var selector = this.selector || this;
      if (!check_binded) {
        var on_check = function() {
          if (check_lock) {
            return;
          }
          check_lock = true;

          setTimeout(process, opts.interval);
        };

        $(window).scroll(on_check).resize(on_check);
        check_binded = true;
      }

      if (opts.force_process) {
        setTimeout(process, opts.interval);
      }
      selectors.push(selector);
      return $(selector);
    }
  });

  $.extend({
    // force elements's appearance check
    force_appear: function() {
      if (check_binded) {
        process();
        return true;
      };
      return false;
    }
  });
})(jQuery);



/*!
 * jQuery doTimeout: Like setTimeout, but better! - v1.0 - 3/3/2010
 * http://benalman.com/projects/jquery-dotimeout-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */

// Script: jQuery doTimeout: Like setTimeout, but better!
//
// *Version: 1.0, Last updated: 3/3/2010*
// 
// Project Home - http://benalman.com/projects/jquery-dotimeout-plugin/
// GitHub       - http://github.com/cowboy/jquery-dotimeout/
// Source       - http://github.com/cowboy/jquery-dotimeout/raw/master/jquery.ba-dotimeout.js
// (Minified)   - http://github.com/cowboy/jquery-dotimeout/raw/master/jquery.ba-dotimeout.min.js (1.0kb)
// 
// About: License
// 
// Copyright (c) 2010 "Cowboy" Ben Alman,
// Dual licensed under the MIT and GPL licenses.
// http://benalman.com/about/license/
// 
// About: Examples
// 
// These working examples, complete with fully commented code, illustrate a few
// ways in which this plugin can be used.
// 
// Debouncing      - http://benalman.com/code/projects/jquery-dotimeout/examples/debouncing/
// Delays, Polling - http://benalman.com/code/projects/jquery-dotimeout/examples/delay-poll/
// Hover Intent    - http://benalman.com/code/projects/jquery-dotimeout/examples/hoverintent/
// 
// About: Support and Testing
// 
// Information about what version or versions of jQuery this plugin has been
// tested with, what browsers it has been tested in, and where the unit tests
// reside (so you can test it yourself).
// 
// jQuery Versions - 1.3.2, 1.4.2
// Browsers Tested - Internet Explorer 6-8, Firefox 2-3.6, Safari 3-4, Chrome 4-5, Opera 9.6-10.1.
// Unit Tests      - http://benalman.com/code/projects/jquery-dotimeout/unit/
// 
// About: Release History
// 
// 1.0 - (3/3/2010) Callback can now be a string, in which case it will call
//       the appropriate $.method or $.fn.method, depending on where .doTimeout
//       was called. Callback must now return `true` (not just a truthy value)
//       to poll.
// 0.4 - (7/15/2009) Made the "id" argument optional, some other minor tweaks
// 0.3 - (6/25/2009) Initial release

(function($){
  '$:nomunge'; // Used by YUI compressor.
  
  var cache = {},
    
    // Reused internal string.
    doTimeout = 'doTimeout',
    
    // A convenient shortcut.
    aps = Array.prototype.slice;
  
  // Method: jQuery.doTimeout
  // 
  // Initialize, cancel, or force execution of a callback after a delay.
  // 
  // If delay and callback are specified, a doTimeout is initialized. The
  // callback will execute, asynchronously, after the delay. If an id is
  // specified, this doTimeout will override and cancel any existing doTimeout
  // with the same id. Any additional arguments will be passed into callback
  // when it is executed.
  // 
  // If the callback returns true, the doTimeout loop will execute again, after
  // the delay, creating a polling loop until the callback returns a non-true
  // value.
  // 
  // Note that if an id is not passed as the first argument, this doTimeout will
  // NOT be able to be manually canceled or forced. (for debouncing, be sure to
  // specify an id).
  // 
  // If id is specified, but delay and callback are not, the doTimeout will be
  // canceled without executing the callback. If force_mode is specified, the
  // callback will be executed, synchronously, but will only be allowed to
  // continue a polling loop if force_mode is true (provided the callback
  // returns true, of course). If force_mode is false, no polling loop will
  // continue, even if the callback returns true.
  // 
  // Usage:
  // 
  // > jQuery.doTimeout( [ id, ] delay, callback [, arg ... ] );
  // > jQuery.doTimeout( id [, force_mode ] );
  // 
  // Arguments:
  // 
  //  id - (String) An optional unique identifier for this doTimeout. If id is
  //    not specified, the doTimeout will NOT be able to be manually canceled or
  //    forced.
  //  delay - (Number) A zero-or-greater delay in milliseconds after which
  //    callback will be executed. 
  //  callback - (Function) A function to be executed after delay milliseconds.
  //  callback - (String) A jQuery method to be executed after delay
  //    milliseconds. This method will only poll if it explicitly returns
  //    true.
  //  force_mode - (Boolean) If true, execute that id's doTimeout callback
  //    immediately and synchronously, continuing any callback return-true
  //    polling loop. If false, execute the callback immediately and
  //    synchronously but do NOT continue a callback return-true polling loop.
  //    If omitted, cancel that id's doTimeout.
  // 
  // Returns:
  // 
  //  If force_mode is true, false or undefined and there is a
  //  yet-to-be-executed callback to cancel, true is returned, but if no
  //  callback remains to be executed, undefined is returned.
  
  $[doTimeout] = function() {
    return p_doTimeout.apply( window, [ 0 ].concat( aps.call( arguments ) ) );
  };
  
  // Method: jQuery.fn.doTimeout
  // 
  // Initialize, cancel, or force execution of a callback after a delay.
  // Operates like <jQuery.doTimeout>, but the passed callback executes in the
  // context of the jQuery collection of elements, and the id is stored as data
  // on the first element in that collection.
  // 
  // If delay and callback are specified, a doTimeout is initialized. The
  // callback will execute, asynchronously, after the delay. If an id is
  // specified, this doTimeout will override and cancel any existing doTimeout
  // with the same id. Any additional arguments will be passed into callback
  // when it is executed.
  // 
  // If the callback returns true, the doTimeout loop will execute again, after
  // the delay, creating a polling loop until the callback returns a non-true
  // value.
  // 
  // Note that if an id is not passed as the first argument, this doTimeout will
  // NOT be able to be manually canceled or forced (for debouncing, be sure to
  // specify an id).
  // 
  // If id is specified, but delay and callback are not, the doTimeout will be
  // canceled without executing the callback. If force_mode is specified, the
  // callback will be executed, synchronously, but will only be allowed to
  // continue a polling loop if force_mode is true (provided the callback
  // returns true, of course). If force_mode is false, no polling loop will
  // continue, even if the callback returns true.
  // 
  // Usage:
  // 
  // > jQuery('selector').doTimeout( [ id, ] delay, callback [, arg ... ] );
  // > jQuery('selector').doTimeout( id [, force_mode ] );
  // 
  // Arguments:
  // 
  //  id - (String) An optional unique identifier for this doTimeout, stored as
  //    jQuery data on the element. If id is not specified, the doTimeout will
  //    NOT be able to be manually canceled or forced.
  //  delay - (Number) A zero-or-greater delay in milliseconds after which
  //    callback will be executed. 
  //  callback - (Function) A function to be executed after delay milliseconds.
  //  callback - (String) A jQuery.fn method to be executed after delay
  //    milliseconds. This method will only poll if it explicitly returns
  //    true (most jQuery.fn methods return a jQuery object, and not `true`,
  //    which allows them to be chained and prevents polling).
  //  force_mode - (Boolean) If true, execute that id's doTimeout callback
  //    immediately and synchronously, continuing any callback return-true
  //    polling loop. If false, execute the callback immediately and
  //    synchronously but do NOT continue a callback return-true polling loop.
  //    If omitted, cancel that id's doTimeout.
  // 
  // Returns:
  // 
  //  When creating a <jQuery.fn.doTimeout>, the initial jQuery collection of
  //  elements is returned. Otherwise, if force_mode is true, false or undefined
  //  and there is a yet-to-be-executed callback to cancel, true is returned,
  //  but if no callback remains to be executed, undefined is returned.
  
  $.fn[doTimeout] = function() {
    var args = aps.call( arguments ),
      result = p_doTimeout.apply( this, [ doTimeout + args[0] ].concat( args ) );
    
    return typeof args[0] === 'number' || typeof args[1] === 'number'
      ? this
      : result;
  };
  
  function p_doTimeout( jquery_data_key ) {
    var that = this,
      elem,
      data = {},
      
      // Allows the plugin to call a string callback method.
      method_base = jquery_data_key ? $.fn : $,
      
      // Any additional arguments will be passed to the callback.
      args = arguments,
      slice_args = 4,
      
      id        = args[1],
      delay     = args[2],
      callback  = args[3];
    
    if ( typeof id !== 'string' ) {
      slice_args--;
      
      id        = jquery_data_key = 0;
      delay     = args[1];
      callback  = args[2];
    }
    
    // If id is passed, store a data reference either as .data on the first
    // element in a jQuery collection, or in the internal cache.
    if ( jquery_data_key ) { // Note: key is 'doTimeout' + id
      
      // Get id-object from the first element's data, otherwise initialize it to {}.
      elem = that.eq(0);
      elem.data( jquery_data_key, data = elem.data( jquery_data_key ) || {} );
      
    } else if ( id ) {
      // Get id-object from the cache, otherwise initialize it to {}.
      data = cache[ id ] || ( cache[ id ] = {} );
    }
    
    // Clear any existing timeout for this id.
    data.id && clearTimeout( data.id );
    delete data.id;
    
    // Clean up when necessary.
    function cleanup() {
      if ( jquery_data_key ) {
        elem.removeData( jquery_data_key );
      } else if ( id ) {
        delete cache[ id ];
      }
    };
    
    // Yes, there actually is a setTimeout call in here!
    function actually_setTimeout() {
      data.id = setTimeout( function(){ data.fn(); }, delay );
    };
    
    if ( callback ) {
      // A callback (and delay) were specified. Store the callback reference for
      // possible later use, and then setTimeout.
      data.fn = function( no_polling_loop ) {
        
        // If the callback value is a string, it is assumed to be the name of a
        // method on $ or $.fn depending on where doTimeout was executed.
        if ( typeof callback === 'string' ) {
          callback = method_base[ callback ];
        }
        
        callback.apply( that, aps.call( args, slice_args ) ) === true && !no_polling_loop
          
          // Since the callback returned true, and we're not specifically
          // canceling a polling loop, do it again!
          ? actually_setTimeout()
          
          // Otherwise, clean up and quit.
          : cleanup();
      };
      
      // Set that timeout!
      actually_setTimeout();
      
    } else if ( data.fn ) {
      // No callback passed. If force_mode (delay) is true, execute the data.fn
      // callback immediately, continuing any callback return-true polling loop.
      // If force_mode is false, execute the data.fn callback immediately but do
      // NOT continue a callback return-true polling loop. If force_mode is
      // undefined, simply clean up. Since data.fn was still defined, whatever
      // was supposed to happen hadn't yet, so return true.
      delay === undefined ? cleanup() : data.fn( delay === false );
      return true;
      
    } else {
      // Since no callback was passed, and data.fn isn't defined, it looks like
      // whatever was supposed to happen already did. Clean up and quit!
      cleanup();
    }
    
  };
  
})(jQuery);




//CSS3 Animate-it
$('.animatedParent').appear();
$('.animatedClick').click(function(){
  var target = $(this).attr('data-target');

  
  if($(this).attr('data-sequence') != undefined){
    var firstId = $("."+target+":first").attr('data-id');
    var lastId = $("."+target+":last").attr('data-id');
    var number = firstId;

    //Add or remove the class
    if($("."+target+"[data-id="+ number +"]").hasClass('go')){
      $("."+target+"[data-id="+ number +"]").addClass('goAway');
      $("."+target+"[data-id="+ number +"]").removeClass('go');
    }else{
      $("."+target+"[data-id="+ number +"]").addClass('go');
      $("."+target+"[data-id="+ number +"]").removeClass('goAway');
    }
    number ++;
    delay = Number($(this).attr('data-sequence'));
    $.doTimeout(delay, function(){
      console.log(lastId);
      
      //Add or remove the class
      if($("."+target+"[data-id="+ number +"]").hasClass('go')){
        $("."+target+"[data-id="+ number +"]").addClass('goAway');
        $("."+target+"[data-id="+ number +"]").removeClass('go');
      }else{
        $("."+target+"[data-id="+ number +"]").addClass('go');
        $("."+target+"[data-id="+ number +"]").removeClass('goAway');
      }

      //increment
      ++number;

      //continute looping till reached last ID
      if(number <= lastId){return true;}
    });
  }else{
    if($('.'+target).hasClass('go')){
      $('.'+target).addClass('goAway');
      $('.'+target).removeClass('go');
    }else{
      $('.'+target).addClass('go');
      $('.'+target).removeClass('goAway');
    }
  } 
});

$(document.body).on('appear', '.animatedParent', function(e, $affected){


  var ele = $(this).find('.animated');
  var parent = $(this);
  

  if(parent.attr('data-sequence') != undefined){
    
    var firstId = $(this).find('.animated:first').attr('data-id');
    var number = firstId;
    var lastId = $(this).find('.animated:last').attr('data-id');

    $(parent).find(".animated[data-id="+ number +"]").addClass('go');
    number ++;
    delay = Number(parent.attr('data-sequence'));

    $.doTimeout(delay, function(){
      $(parent).find(".animated[data-id="+ number +"]").addClass('go');
      ++number;
      if(number <= lastId){return true;}
    });
  }else{
    ele.addClass('go');
  }
  
});

 $(document.body).on('disappear', '.animatedParent', function(e, $affected) {
  if(!$(this).hasClass('animateOnce')){
    $(this).find('.animated').removeClass('go');
   }
 });
 
// Parallax Plugin

 $(window).load(function(){
  $.force_appear();
  
 });
/**
 * Author: Heather Corey
 * jQuery Simple Parallax Plugin
 *
 */

(function($) {

    $.fn.parallax = function(options) {

        var windowHeight = $(window).height();

        // Establish default settings
        var settings = $.extend({
            speed        : 0.15
        }, options);

        // Iterate over each object in collection
        return this.each( function() {

        // Save a reference to the element
        var $this = $(this);

        // Set up Scroll Handler
        $(document).scroll(function(){

    var scrollTop = $(window).scrollTop();
            var offset = $this.offset().top;
            var height = $this.outerHeight();

    // Check if above or below viewport
if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
return;
}

var yBgPosition = Math.round((offset - scrollTop) * settings.speed);

                // Apply the Y Background Position to Set the Parallax Effect
    $this.css('background-position', 'center ' + yBgPosition + 'px');
                
        });
        });
    }
	
	
	
}(jQuery));
$('.parallax-section').parallax({
speed : 0.2
});

/*
 * Window Height CSS rules
 */
;(function() {
	var styleSheet;

	var getWindowHeight = function() {
		return window.innerHeight || document.documentElement.clientHeight;
	};

	var createStyleTag = function() {
		// create style tag
		var styleTag = jQuery('<style>').appendTo('head');
		styleSheet = styleTag.prop('sheet') || styleTag.prop('styleSheet');

		// crossbrowser style handling
		var addCSSRule = function(selector, rules, index) {
			if(styleSheet.insertRule) {
				styleSheet.insertRule(selector + '{' + rules + '}', index);
			} else {
				styleSheet.addRule(selector, rules, index);
			}
		};

		// create style rules
		addCSSRule('.win-min-height', 'min-height:0');
		addCSSRule('.win-height', 'height:auto');
		addCSSRule('.win-max-height', 'max-height:100%');
		resizeHandler();
	};

	var resizeHandler = function() {
		// handle changes in style rules
		var currentWindowHeight = getWindowHeight(),
			styleRules = styleSheet.cssRules || styleSheet.rules;
		
		jQuery.each(styleRules, function(index, currentRule) {
			var currentProperty = currentRule.selectorText.toLowerCase().replace('.win-', '').replace('-h','H');
			currentRule.style[currentProperty] = currentWindowHeight + 'px';
		});
	};

	createStyleTag();
	jQuery(window).on('resize orientationchange', resizeHandler);
}());

// Width increase for Video Area

$("a#play").click(function(){
        $(".video_holder").animate({width: '100%', height: '100%'});
		$(".video_holder").css("border-radius", "0");
		$(".embed-container").css("padding-bottom", "56.25%");
		$("span.play-btn").hide()
    });
// Full screen Menu

// add class for touch slider


(function($) {
    var $window = $(window),
        $html = $('.ts');
	    $window.resize(function resize() {
        $html.addClass('m-scooch');
		if ($window.width() > 480) {
            return $html.removeClass('m-scooch');
        }
        
    }).trigger('resize');
})(jQuery);

// header block01g add or remove class for background color

 $(window).resize(function(){
            var width = $(window).width();

            if(width >= 320 && width <= 768){
                $('#block01g').removeClass('background01').addClass('background02');
				$('.searchfeild').removeClass('color02').addClass('color01');
            }
            else if(width >= 768 && width <= 2000){
                $('#block01g').removeClass('background02').addClass('background01');
				$('.searchfeild').removeClass('color01').addClass('color02');
            }
            })
.resize();

// block06d remove slider for 480 display

$(window).resize(function(){
            var width = $(window).width();

            if(width >= 320 && width <= 480){
                $('#ourprojects').removeClass('carousel-inner');
            }
            else if(width >= 481 && width <= 2000){
                $('#ourprojects').addClass('carousel-inner');
            }
            })
.resize();

// block14b custom scroll for slider thumbnail

 $(window).load(function () {
        $(".demo").customScrollbar();
        $("#fixed-thumb-size-demo").customScrollbar({fixedThumbHeight: 50, fixedThumbWidth: 60});
    });
$(function () {
  $('[data-toggle="popover"]').popover()
})

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$('.my_tooltip').tooltip({placement: "bottom", html: true})


// block18a 

// royal slider for video section

jQuery(document).ready(function($) {
  var si = $('#gallery-1, #gallery-2').royalSlider({
    addActiveClass: true,
    arrowsNav: true,
    controlNavigation: 'none',
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 340,
    loop: true,
    fadeinLoadedSlide: false,
    globalCaption: true,
    keyboardNavEnabled: true,
    globalCaptionInside: false,
    visibleNearby: {
      enabled: true,
      centerArea: 0.5,
      center: true,
      breakpoint: 650,
      breakpointCenterArea: 0.64,
      navigateByCenterClick: true,
    }
  }).data('royalSlider');

// link to fifth slide from slider description.
  $('.slide4link').click(function(e) {
    si.goTo(4);
    return false;
  });
});

// Touch Slider

$('.m-scooch').scooch();


