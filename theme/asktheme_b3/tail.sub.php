<?php
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
?>

<?php if ($is_admin == 'super') { ?><!-- <div style='float:left; text-align:center;'>RUN TIME : <?php echo get_microtime() - $begin_time; ?><br></div> --><?php } ?>

<!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
<!--[if lte IE 7]>
<script>
$(function() {
    var $sv_use = $(".sv_use");
    var count = $sv_use.length;

    $sv_use.each(function() {
        $(this).css("z-index", count);
        $(this).css("position", "relative");
        count = count - 1;
    });
});
</script>
<![endif]-->
</div><!--//#wrapper -->

<script src="<?php echo G5_THEME_JS_URL ?>/asktheme.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_THEME_JS_URL ?>/classie.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_THEME_JS_URL ?>/modernizr.custom.mq.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script type="text/javascript">
    var checkMod = function () {
        if (Modernizr.mq('(max-width: 480px)')) {
            return "phone";
        }
        if (Modernizr.mq('(max-width: 992px)') && Modernizr.mq('(min-width: 480px)')) {
            return "tablet";
        }
        if (Modernizr.mq('(min-width: 992px)')) {
            return "desktop";
        }
    };

    function view_member_menu() {
        var mod = checkMod();
        if (mod !== 'desktop') {
            $('#member-icon').click(function () {
                return false;
            });
        }
    }
    function slideParallax() {
        var $nowWidth, $nowHeight, _height, _width;
        $nowWidth = $(window).width();
        $nowHeight = $(window).height();
        var movementStrength = 25;
        _height = movementStrength / $nowHeight;
        _width = movementStrength / $nowWidth;
        if (checkMod() === 'desktop') {
            $(".swiper-slide").mousemove(function (e) {
                var pageX = e.pageX - ($nowWidth / 2);
                var pageY = e.pageY - ($nowHeight / 2);
                var newvalueX = _width * pageX * -1 - 25;
                var newvalueY = _height * pageY * -1 - 50;
                $('.swiper-slide').css("background-position", newvalueX + "px     " + newvalueY + "px");
            });
        }
    }
    function debouncer(func, timeout) {
        var timeoutID, timeout = timeout || 200;
        return function () {
            var scope = this, args = arguments;
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function () {
                func.apply(scope, Array.prototype.slice.call(args));
            }, timeout);
        }
    }
</script>
</body>
</html>
<?php echo html_end(); // HTML 마지막 처리 함수 : 반드시 넣어주시기 바랍니다. ?>
<!-- By ASKTHEME -->
