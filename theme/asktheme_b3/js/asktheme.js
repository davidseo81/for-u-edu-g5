var $animation_elements = $('.slider-inner');
var $window = $(window);

//scroll based animation
function check_if_in_view() {
    var window_height = $window.height();
    var window_top_position = $window.scrollTop();
    var window_bottom_position = (window_top_position + window_height);

    $.each($animation_elements, function () {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = (element_top_position + element_height);

        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {

            $($animation_elements).css({
                //transform: "translateY(" + (window_top_position / 2).toFixed() + "px)"
            });
            $('.slider').css({
                //transform: "translateY(" + -(window_top_position / 7).toFixed() + "px)"
            });
            $('#slider .slider-catpion, #slider .swiper-button-next, #slider .swiper-button-prev').css({
                //transform: "translateY(" + -window_top_position / 15 + "px)",
                opacity: 1 - 1.85 * (window_top_position) / window_height
            });


        } else {
            //console.log(window_top_position);
        }
    });
}

function fsearchbox_submit(f) {
    if (f.stx.value.length < 2) {
        alert("검색어는 두글자 이상 입력하십시오.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
    var cnt = 0;
    for (var i = 0; i < f.stx.value.length; i++) {
        if (f.stx.value.charAt(i) == ' ')
            cnt++;
    }

    if (cnt > 1) {
        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    return true;
}


$(function () {
    //부드럽게 스크롩
    $('#gotop').click(function () {
        $('html,body').animate({
            scrollTop: 0
        },
                'slow');
        return false;
    });
    //scroll top
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $('#gotop').fadeIn("slow", function () {
                $(this).css({
                    "top": $(window).height() - 100 + 'px'
                });
            });
        } else {
            $('#gotop').fadeOut("slow");
        }
    });
});

/**
 * jquery.hoverdir.js v1.1.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2012, Codrops
 * http://www.codrops.com
 */
;
(function ($, window, undefined) {

    'use strict';

    $.HoverDir = function (options, element) {

        this.$el = $(element);
        this._init(options);

    };

    // the options
    $.HoverDir.defaults = {
        speed: 300,
        easing: 'ease',
        hoverDelay: 0,
        inverse: false
    };

    $.HoverDir.prototype = {

        _init: function (options) {

            // options
            this.options = $.extend(true, {}, $.HoverDir.defaults, options);
            // transition properties
            this.transitionProp = 'all ' + this.options.speed + 'ms ' + this.options.easing;
            // support for CSS transitions
            this.support = Modernizr.csstransitions;
            // load the events
            this._loadEvents();

        },
        _loadEvents: function () {

            var self = this;

            this.$el.on('mouseenter.hoverdir, mouseleave.hoverdir', function (event) {

                var $el = $(this),
                        $hoverElem = $el.find('div'),
                        direction = self._getDir($el, {x: event.pageX, y: event.pageY}),
                        styleCSS = self._getStyle(direction);

                if (event.type === 'mouseenter') {

                    $hoverElem.hide().css(styleCSS.from);
                    clearTimeout(self.tmhover);

                    self.tmhover = setTimeout(function () {

                        $hoverElem.show(0, function () {

                            var $el = $(this);
                            if (self.support) {
                                $el.css('transition', self.transitionProp);
                            }
                            self._applyAnimation($el, styleCSS.to, self.options.speed);

                        });


                    }, self.options.hoverDelay);

                } else {

                    if (self.support) {
                        $hoverElem.css('transition', self.transitionProp);
                    }
                    clearTimeout(self.tmhover);
                    self._applyAnimation($hoverElem, styleCSS.from, self.options.speed);

                }

            });

        },
        // credits : http://stackoverflow.com/a/3647634
        _getDir: function ($el, coordinates) {

            // the width and height of the current div
            var w = $el.width(),
                    h = $el.height(),
                    // calculate the x and y to get an angle to the center of the div from that x and y.
                    // gets the x value relative to the center of the DIV and "normalize" it
                    x = (coordinates.x - $el.offset().left - (w / 2)) * (w > h ? (h / w) : 1),
                    y = (coordinates.y - $el.offset().top - (h / 2)) * (h > w ? (w / h) : 1),
                    // the angle and the direction from where the mouse came in/went out clockwise (TRBL=0123);
                    // first calculate the angle of the point,
                    // add 180 deg to get rid of the negative values
                    // divide by 90 to get the quadrant
                    // add 3 and do a modulo by 4  to shift the quadrants to a proper clockwise TRBL (top/right/bottom/left) **/
                    direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180) / 90) + 3) % 4;

            return direction;

        },
        _getStyle: function (direction) {

            var fromStyle, toStyle,
                    slideFromTop = {left: '0px', top: '-100%'},
                    slideFromBottom = {left: '0px', top: '100%'},
                    slideFromLeft = {left: '-100%', top: '0px'},
                    slideFromRight = {left: '100%', top: '0px'},
                    slideTop = {top: '0px'},
                    slideLeft = {left: '0px'};

            switch (direction) {
                case 0:
                    // from top
                    fromStyle = !this.options.inverse ? slideFromTop : slideFromBottom;
                    toStyle = slideTop;
                    break;
                case 1:
                    // from right
                    fromStyle = !this.options.inverse ? slideFromRight : slideFromLeft;
                    toStyle = slideLeft;
                    break;
                case 2:
                    // from bottom
                    fromStyle = !this.options.inverse ? slideFromBottom : slideFromTop;
                    toStyle = slideTop;
                    break;
                case 3:
                    // from left
                    fromStyle = !this.options.inverse ? slideFromLeft : slideFromRight;
                    toStyle = slideLeft;
                    break;
            }
            ;

            return {from: fromStyle, to: toStyle};

        },
        // apply a transition or fallback to jquery animate based on Modernizr.csstransitions support
        _applyAnimation: function (el, styleCSS, speed) {

            $.fn.applyStyle = this.support ? $.fn.css : $.fn.animate;
            el.stop().applyStyle(styleCSS, $.extend(true, [], {duration: speed + 'ms'}));

        },

    };

    var logError = function (message) {

        if (window.console) {

            window.console.error(message);

        }

    };

    $.fn.hoverdir = function (options) {

        var instance = $.data(this, 'hoverdir');

        if (typeof options === 'string') {

            var args = Array.prototype.slice.call(arguments, 1);

            this.each(function () {

                if (!instance) {

                    logError("cannot call methods on hoverdir prior to initialization; " +
                            "attempted to call method '" + options + "'");
                    return;

                }

                if (!$.isFunction(instance[options]) || options.charAt(0) === "_") {

                    logError("no such method '" + options + "' for hoverdir instance");
                    return;

                }

                instance[options].apply(instance, args);

            });

        } else {

            this.each(function () {

                if (instance) {

                    instance._init();

                } else {

                    instance = $.data(this, 'hoverdir', new $.HoverDir(options, this));

                }

            });

        }

        return instance;

    };

})(jQuery, window);



/**
 * 메일 창
 **/
function win_email(href) {
    var new_win = window.open(href, 'win_email', 'left=100,top=100,width=700,height=680,scrollbars=1');
    new_win.focus();
}

/*
 * 모바일 메뉴 슬라이드 header-right-slide header-left-slide
 */

/*
 var mobileLeftMenu = $(".js-offcanvas-left").hiraku({
 btn: "#open-mobile-menu",
 fixedHeader: "#header",
 direction: "left",
 breakpoint: 992
 });
 //우측메뉴
 var mobileRightMenu = $(".js-offcanvas-right").hiraku({
 btn: "#open-member-menu",
 fixedHeader: "#header",
 direction: "right",
 breakpoint: 992
 });
 */
var fsBanner = function (container, options) {
    var self = this;

    var defaults = {
        'showName': true,
        'toUpdate': {},
        'whenEmpty': {},
        'trigger': 'click',
        'hideParent': null,
        'onChanged': null
    }

    this.options = $.extend({}, defaults, options);

    this.ilast = -1;

    this.setup = function () {
        this.container = $(container);
        this.items = this.container.find('div');

        if (!this.container.width())
            this.container.width(this.container.parent().width());

        this.part = this.container.width() / this.items.length;
        this.mini = this.part / 4;
        this.widmain = this.container.width() - (this.mini * this.items.length - 1);

        this.items.css({'height': this.container.height(), 'width': this.widmain + this.mini});

        if (!this.options.showName)
            this.items.find('.name').hide();

        this.items.each(function (i) {
            var $item = $(this);
            $item.css({'z-index': i});
            if (self.options.trigger == 'click')
                $item.on('click', function () {
                    self.selectItem($item, i);
                });
            if (self.options.trigger == 'mouse')
                $item.on('mouseenter', function () {
                    self.selectItem($item, i, true);
                });
        });

        if (self.options.trigger == 'mouse') {
            this.container.on('mouseleave', function () {
                self.resetcss();
            });
        }

        this.resetcss();
        this.container.show();
    }

    this.resetcss = function () {
        this.items.each(function (i) {
            var $item = $(this);
            $item.stop().animate({'left': i * self.part});

            if (self.options.showName) {
                var $name = $item.find('.name');
                if ($name.hasClass('minimized'))
                    $name.hide().removeClass('minimized').fadeIn('fast');
            }
        });
        this.ilast = null;
        this.updateHtml();
    };

    this.selectItem = function ($expanded, iexpanded, forceClick) {
        this.$lastexpanded = this.$expanded;

        if (forceClick)
            this.ilast = null;
        if (iexpanded == this.ilast) {
            this.$expanded = null;
            this.resetcss();
        } else {
            this.$expanded = $expanded;
            this.items.each(function (i) {
                var $item = $(this);
                if (i <= iexpanded) {
                    $item.stop().animate({'left': i * self.mini});
                } else {
                    $item.stop().animate({'left': i * self.mini + self.widmain});
                }
                if (self.options.showName) {
                    var $name = $item.find('.name');
                    var method = (i == iexpanded) ? 'removeClass' : 'addClass';
                    if (method == 'addClass' && $name.hasClass('minimized'))
                        method = '';
                    if (method)
                        $name.hide()[method]('minimized').fadeIn('fast');
                }
            });
            this.ilast = iexpanded;
            this.updateHtml($expanded);
        }
        this.fireChanged();
    };

    this.updateHtml = function ($expanded) {
        this.$expanded = $expanded;

        var $parent = $(self.options.hideParent);
        $.each(this.options.toUpdate, function (field, selector) {
            var $obj = $(selector);
            var showit = false;
            var value = '';
            if ($expanded) {
                $parent.show();
                value = $expanded.find('.' + field).html();
                showit = true;
            } else {
                if ($parent.length) {
                    showit = false;
                    $parent.hide();
                } else {
                    if (self.options.whenEmpty[field]) {
                        value = self.options.whenEmpty[field];
                        showit = true;
                    }
                }
            }
            $obj.hide();
            if (showit)
                $obj.html(value).fadeIn('fast');
        });
    };

    this.fireChanged = function () {
        if (this.options.onChanged) {
            this.options.onChanged(this.$expanded, this.$lastexpanded);
        }
    };

    this.setup();
};

$.fn.fsBanner = function (options) {
    return new fsBanner(this, options);
};



/**
 * 모바일 메뉴 
 * @return {undefined}
 * 
 */
$(function () {
    $(document).bind("beforecreate.offcanvas", function (e) {
        var dataOffcanvas = $(e.target).data('offcanvas-component');
        //console.log(dataOffcanvas);
        dataOffcanvas.onInit = function () {
            //console.log(this);
        };
    });

    $(document).bind("create.offcanvas", function (e) {
        var dataOffcanvas = $(e.target).data('offcanvas-component');
        //console.log(dataOffcanvas);
        dataOffcanvas.onOpen = function () {
            $('.close-mobile-menu').removeClass('d-none');
            //닫기 버튼
            $('.close-mobile-menu').click(function () {
                dataOffcanvas.close();
            });

            $(window).hashchange(function (event) {
                var hash = location.hash;
                console.log(hash);
            });
        };
        dataOffcanvas.onClose = function () {
            //console.log('Callback onClose');
        };
    });

    $(document).bind("clicked.offcanvas-trigger clicked.offcanvas", function (e) {
        var dataBtnText = $(e.target).text();
        //console.log(e.type + '.' + e.namespace + ': ' + dataBtnText);
    });

    $(document).bind("open.offcanvas", function (e) {
        var dataOffcanvas = $(e.target).data('offcanvas-component');
        var dataOffcanvasID = $(e.target).attr('id');
        //console.log(e.type + ': #' + dataOffcanvasID);
        //URL에 hash 있으면 슬라이드 메뉴 닫는다.
        $('.has-links').click(function () {
            var thisUrl = $(this).attr('href');
            if (thisUrl.indexOf("#") != -1) {
                dataOffcanvas.close();
            }
        });
    });

    $(document).bind("resizing.offcanvas", function (e) {
        var dataOffcanvasID = $(e.target).attr('id');
        //console.log("여섯번째");
        //console.log(e.type + ': #' + dataOffcanvasID);
    });

    $(document).bind("close.offcanvas", function (e) {
        var dataOffcanvasID = $(e.target).attr('id');
        //console.log("일곱번째");
        //console.log(e.type + ': #' + dataOffcanvasID);
    });

    $('.js-open').bind("create.offcanvas", function (e) {
        var dataOffcanvas = $(this).data('offcanvas-component');
        //console.log(dataOffcanvas + "생성");
        setTimeout(function () {
            //dataOffcanvas.open();
        }, 200);
    });

    $(document).bind("beforecreate.offcanvas", function (e) {

        var $offcanvas = $(e.target), api = $offcanvas.data('offcanvas-component');

        function onFocusIn() {
            //console.log('onFocusIn');
            api.options.resize = false;
            //console.log(api.options.resize);
            $(window).off('resize.offcanvas orientationchange.offcanvas');
        }

        function onFocusOut() {
            //console.log('onFocusOut');
            api.options.resize = true;
            //console.log(api.options.resize);
            $(window).on('resize.offcanvas orientationchange.offcanvas');
            api.resize();
        }

        $offcanvas.on('focusin', 'input,textarea', onFocusIn).
                on('focusout', 'input,textarea', onFocusOut);
    });


    // Trigger Enhance
    $(document).trigger("enhance");

});
