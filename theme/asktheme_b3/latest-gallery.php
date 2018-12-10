<?php
/**
 * 최신글 샘플 페이지 - Gallery
 */
include_once "./_common.php";
$g5['title'] = "최신글 샘플 Gallery";
$g5['ask_title_desc'] = 'Latest Samples';
//썸네일 함수, 갤러리 최신글 사용시 포함하세요.
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

include_once(G5_THEME_PATH . '/head.php');
define('_INDEX_SUBPAGE_', true);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 1);
?>

<div class="latest-wrap container">
	<h2 class="page-title">갤러리 최신글</h2>
	<p>
		기본, 슬라이드형
	</p>
	<section class="row gallery-latest latest-equal-wrap">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<!-- 기본 갤러리 -->
			<h3>기본 갤러리 1단</h3>
			<?php echo latest('theme/ask-gallery', 'gallery', 6, 33); ?>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-6">
			<!-- 기본 갤러리 다단형 -->
			<h3>기본 갤러리 다단형</h3>
			<?php echo latest('theme/ask-gallery2', 'promotion', 6, 33); ?>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-6">
			<!-- 기본 갤러리 다단형-->
			<h3>기본 갤러리 다단형</h3>
			<?php echo latest('theme/ask-gallery2', 'gallery', 6, 33); ?>
		</div>
	</section>
	<section class="row gallery-latest latest-equal-wrap">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<!-- 기본 슬라이드형 갤러리 -->
			<h3>슬라이드형 갤러리</h3>
			<?php echo latest('theme/ask-slider', 'gallery', 8, 33); ?>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-6">
			<!-- 1열 갤러리 -->
			<h3>슬라이드형 갤러리 1열</h3>
			<?php echo latest('theme/ask-slider-single', 'gallery', 12, 33); ?>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-6">
			<!-- 1열 갤러리 -->
			<h3>슬라이드형 갤러리 1열</h3>
			<?php echo latest('theme/ask-slider-single', 'promotion', 12, 33); ?>
		</div>
	</section>
	<section class="row gallery-latest latest-equal-wrap">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<h3>YOUTUBE 최신글</h3>
			<?php echo latest('theme/ask-youtube', 'youtube', 3, 33); ?>
		</div>
	</section>

</div>
<script type="text/javascript">
	$(function() {
		var autoHeightTarget = $('.latest-equal-wrap .latest-equal-item');
		$(autoHeightTarget)
			.matchHeight();
	});

</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
