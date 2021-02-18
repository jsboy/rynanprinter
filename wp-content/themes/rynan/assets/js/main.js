//Global function
(function ($, doc) {
  // alert(1);
  var brandLoadingTime = 3000,
      progressPercent = 0,
      progressBar;
  var $loadingWrap = $('#loading'),
      $progressLoading = $loadingWrap.find('.progressLoading'),
      $messageLoading = $loadingWrap.find('.loading-message');

  var progressLoading = function () {
    if (progressPercent >= 100) {
      clearInterval(progressBar);
    } else {
      progressPercent++;
      $progressLoading.width(progressPercent + '%');
    }
  };

  var hideLoading = function () {
    // console.log('hide');
    clearInterval(progressBar);
    progressPercent = 0;
    $progressLoading.width(progressPercent + '%');
    $loadingWrap.removeClass('loading');
    $('body').removeClass('on-popup');
  };

  var showLoading = function (loadingText) {
    //animation progress loading bar
    $('body').addClass('on-popup');
    progressPercent = 0;
    $progressLoading.width(progressPercent + '%');
    $messageLoading.text(loadingText);
    $loadingWrap.addClass('loading'); // clearInterval(progressBar);

    setTimeout(function () {
      progressBar = setInterval(progressLoading, 10);
    }, 300);
  };

  $.fn.showLoadingContent = function () {
    var $this = $(this[0]);
    $this.append('<div class="loading-content text-center py-3"><img src="assets/img/icons/loading.svg" alt=""></div>');
  };

  $.fn.hideLoadingContent = function () {
    var $this = $(this[0]);
    $this.find('.loading-content').remove();
  }; //doc ready

  function submitContactForm(response) {
    // submit the form which now includes a g-recaptcha-response input
     $("#contactform").submit();
    return true;
  }

  $(function () {
    showLoading(); //after document on ready code here
    //slider 

    $("#contactform").validate({
      submitHandler: function (form) {
        if (grecaptcha.getResponse()) {
                // 2) finally sending form data
                form.submit();
        }else{
                // 1) Before sending we must validate captcha
            grecaptcha.reset();
            grecaptcha.execute();
        }           
    }
    });

    var carousel = $('.slick-carousel');
    carousel.each(function () {
      var $this = $(this);
      $this.slick();
    });

    if ($('.product-slider .slick-carousel')[0]) {
      $('.product-slider .slick-carousel').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        console.log(currentSlide);
      });
    } // On after slide change
    // if ($(window).width() >= 768) {


    $('.hide-before-content').on('afterChange', function (event, slick, currentSlide, nextSlide) {
      if ($(this).slick('slickCurrentSlide') > 0) {
        $($(this).attr('target')).addClass('invisible-md');
      } else {
        $($(this).attr('target')).removeClass('invisible-md');
      }
    }); // wow animation

    var wow = new WOW({
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 100,
      callback: function (box) {
        console.log('WOW: animating <' + box.tagName.toLowerCase() + '>');
      }
    });
    wow.init();
    var controller = new ScrollMagic.Controller();
    $('.ScrollMagic-animation.ScrollMagic-ltr,.ScrollMagic-animation.ScrollMagic-rtl').each(function (index) {
      var $this = $(this);
      new ScrollMagic.Scene({
        triggerElement: $this[0],
        // y value not modified, so we can use element as trigger as well
        offset: 250,
        // start a little later
        triggerHook: 0.9
      }).setClassToggle($this[0], 'visible') // add class toggle
      // .addIndicators({name: "digit " + (index+1) }) // add indicators (requires plugin)
      .addTo(controller);
    }); // init tooltip

    $('[data-toggle="tooltip"]').tooltip(); //init popover

    $('[data-toggle="popover"]').popover({
      html: true,
      content: function () {
        var content = $(this).attr('data-popover-content');
        return $(content).html();
      }
    });
    $(window).resize(function () {});
    $('.scrolldown').on('click', function (e) {
      e.preventDefault();
      var $this = $(this),
          $nextSection = $($this.attr('href'));
      $('html, body').stop().animate({
        scrollTop: $nextSection.offset().top - 150
      }, 500, 'swing', function () {// alert("Finished animating");
      });
    });
    $('#main-nav').on('hide.bs.collapse', function () {
      var $this = $(this);
      $('body').removeClass('on-popup');
      $('#main-nav .main-menu > li').removeClass('menu-item-show');
    });
    $('#main-nav').on('shown.bs.collapse', function () {
      $('body').addClass('on-popup'); // console.log($('#main-nav .main-nav-wrapper > ul > li').length);

      $('#main-nav .main-menu > li').each(function (index) {
        // console.log(index);
        var $this = $(this);
        setTimeout(function () {
          // console.log(index);
          $this.addClass('menu-item-show');
        }, 200 * index);
      });
    });
    var $grid;
    setTimeout(function() {
      $grid = $('.grid').imagesLoaded( function() {
        // init Isotope after all images have loaded
        $grid = $('.product-list').isotope({
          itemSelector: '.product-item',
          layoutMode: 'fitRows'
        }); // filter functions
      });
    }, 3000);
    

    var filterFns = {
      // show if number is greater than 50
      numberGreaterThan50: function () {
        var number = $(this).find('.number').text();
        return parseInt(number, 10) > 50;
      },
      // show if name ends with -ium
      ium: function () {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
      }
    }; // bind filter button click

    $('.product-nav').on('click', '.nav-link', function () {
      var filterValue = $(this).attr('data-filter'); // use filterFn if matches value

      filterValue = filterFns[filterValue] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
      $(this).parents('.product-nav').find('.active').removeClass('active');
      $(this).addClass('active');
    });

    $('.dropdown-cat').on('click', '.dropdown-item', function () {
      var filterValue = $(this).attr('data-filter'); // use filterFn if matches value
      var activeLabel = $(this).text();
      filterValue = filterFns[filterValue] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
      $(this).parents('.dropdown-cat').find('.active').removeClass('active');
      $('.products-dropdown .dropdown-toggle').text(activeLabel);
      $(this).addClass('active');
      
    });


    var hamburger = $('.hamburger');
    var nav = $('.navbar-brand');
    var socialIcons = $('.header__block-wrap .socials .icons');
    var topLine = $('.header__blocks .top-line');
    var bottomLine = $('.header__blocks .bottom-line');
    var currentBlock = null;
    // var indicator = $('#indicator');
    hamburger.on('click', function() {
      $(this).toggleClass('is-active');
    });
    $("[data-nav-effect='true']").each( function(i) {
      $el = $( this )
      new Waypoint({
        element: $el,
        handler: function(direction) {
          currentBlock = $(this.element);
          currentIndex = currentBlock.index();
          // indicator.find('li').removeClass('active');
          // indicator.find('li').eq(currentIndex).addClass('active');
          theme = $(this.element).data('navigator');
          upTheme = $(this.element).data('navigator-up');
          if (theme === 'white' || direction ==='up' && upTheme === 'white'){
            hamburger.removeClass('dark');
            // indicator.removeClass('dark');
          }

          if (direction ==='down' && theme === 'dark' || direction ==='up' && upTheme === 'dark'){
            hamburger.addClass('dark');
            // indicator.addClass('dark');
          }
        },
        offset: hamburger.position().top + 50
      })
    } );

    $("[data-nav-effect='true']").each( function(i) {
      $el = $( this )
      new Waypoint({
        element: $el,
        handler: function(direction) {
          currentBlock = $(this.element)
          theme = $(this.element).data('navigator');
          upTheme = $(this.element).data('navigator-up');

          if (theme === 'white' || direction ==='up' && upTheme === 'white'){
            nav.removeClass('dark');
          }

          if (direction ==='down' && theme === 'dark' || direction ==='up' && upTheme === 'dark'){
            nav.addClass('dark');
          }
        },
        offset: nav.position().top + 80
      })
    } );

    socialIcons.each( function(i) {
      var $icon = $(this)
      $("[data-nav-effect='true']").each( function() {
        var $el = $( this )
        new Waypoint({
          element: $el,
          handler: function(direction) {
            currentBlock = $(this.element)
            theme = $(this.element).data('navigator');
            upTheme = $(this.element).data('navigator-up');

            if (theme === 'white' || direction ==='up' && upTheme === 'white'){
              $icon.removeClass('dark');
            }

            if (direction ==='down' && theme === 'dark' || direction ==='up' && upTheme === 'dark'){
              $icon.addClass('dark');
            }
          },
          offset: $icon.position().top + 50
        })
      } );
    })


    var topHeight = $(window).scrollTop();
    var lineEffect = function () {

      if (currentBlock) {
        var paddT = parseInt(currentBlock.css('padding-top').split('px')[0]);
        var margT = currentBlock.outerWidth(true) - currentBlock.outerWidth();
        var topHeight = currentBlock.offset().top - $(window).scrollTop();

        if (currentBlock[0] && currentBlock[0].id !== 'footer') {
          if (paddT === 0) topHeight -= 80
        }

        if (topHeight < 0) topHeight = 0;
        topLine.height(topHeight);
        bottomLine.height($(window).height() - topHeight);
        theme = currentBlock.data('navigator')
        upTheme = currentBlock.data('navigator-up')

        if (theme === 'dark' && upTheme === 'dark') {
          bottomLine.addClass('dark');
          topLine.addClass('dark');
        }

        if (theme === 'dark' && upTheme === 'white') {
          bottomLine.addClass('dark');
          topLine.removeClass('dark');
        }

        if (theme === 'white' && upTheme === 'white') {
          bottomLine.removeClass('dark');
          topLine.removeClass('dark');
        }

        if (theme === 'white' && upTheme === 'dark') {
          bottomLine.removeClass('dark');
          topLine.addClass('dark');
        }
      }
    }

    setTimeout(function () {
      lineEffect();
    }, 500);

    $(window).scroll(function(){
      lineEffect();
    });
  }); //window load

  $(window).on('load', function () {
    setTimeout(function () {
      hideLoading(); // $('#loading').removeClass('loading');
    }, 500);

    $('.post-list .post-item__content').each(function() {
      var el = $(this).get(0);
      $clamp(el, {clamp: 6});
    });

  });
})(jQuery, document);
