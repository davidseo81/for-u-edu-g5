/*
 * 모바일 메뉴 슬라이드
 */
//모바일 메뉴 슬라이드
var slideout = new Slideout({
    'panel': document.getElementById('contents-wrap'),
    'menu': document.getElementById('mobile-left-menu'),
    'padding': 260,
    'tolerance': 70
});

slideout.on('beforeopen', function () {
    $('#mobile-left-menu').removeClass('sr-only');
    $('#mobile-member-menu-wrap').addClass('sr-only');
    $('.head-wrapper').addClass('header-left-slide');
});
slideout.on('beforeclose', function () {
    $('.head-wrapper').removeClass('header-left-slide');
});

document.querySelector('.js-slideout-toggle').addEventListener('click', function () {
    $('#mobile-left-menu').removeClass('sr-only');
    $('#mobile-member-menu-wrap').addClass('sr-only');
    slideout.toggle();
});

document.querySelector('.mobile-menu-close').addEventListener('click', function (eve) {
    $('#mobile-member-menu-wrap').removeClass('sr-only');
    slideout.close();
});

//우측슬라이드
var slideout_right = new Slideout({
    'panel': document.getElementById('contents-wrap'),
    'menu': document.getElementById('mobile-member-menu-wrap'),
    'padding': 180,
    'tolerance': 70,
    'side': 'right'
});

slideout_right.on('beforeopen', function () {
    $('#mobile-left-menu').addClass('sr-only');
    $('#mobile-member-menu-wrap').removeClass('sr-only');
    $('.head-wrapper').addClass('header-right-slide');
});
slideout_right.on('beforeclose', function () {
    $('.head-wrapper').removeClass('header-right-slide');
});
document.querySelector('.js-slideout-member-toggle').addEventListener('click', function (event) {
    $('#mobile-member-menu-wrap').removeClass('sr-only');
    $('#mobile-left-menu').addClass('sr-only');
    slideout_right.toggle();
});

document.querySelector('.mobile-member-close').addEventListener('click', function (eve) {
    $('#mobile-left-menu').removeClass('sr-only');
    slideout_right.close();
});