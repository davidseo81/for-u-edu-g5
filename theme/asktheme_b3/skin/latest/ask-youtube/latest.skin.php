<?php
/*
 * 유튜브 최신글
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
//이미지 크기 설정
$ask_img['width'] = 350;
$ask_img['height'] = 200;
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 0);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/plyr/plyr.css">', 0);
add_javascript('<script src="' . G5_THEME_URL . '/plugin/plyr/plyr.min.js"></script>');
add_javascript('<script src="' . G5_THEME_URL . '/plugin/plyr/plyr.polyfilled.min.js"></script>');
?>

<div class="latest-youtube-wrap two-rows-youtube">
	<div class='latest-title'><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a></div>
	<div class="gallery-grid row">
		<?php for ($i = 0; $i < count($list); $i++) { ?>
		<?php 
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
            if($thumb == false){
                 $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
            }
            ?>

		<div class='col-6 col-sm-6 col-md-6 col-lg-4'>
			<div class='youtube-list'>
				<?php
                if (strstr($list[$i]['wr_link1'], 'youtube.com')) {
                    parse_str(parse_url($list[$i]['wr_link1'], PHP_URL_QUERY), $my_arr);
                    $youtube1 = $my_arr['v'];
                } elseif (strstr($list[$i]['wr_link1'], 'youtu.be')) {
                    preg_match("/youtu.be\/([^&]+)/", $list[$i]['wr_link1'], $my_arr);
                    $youtube1 = $my_arr['1'];
                }
                ?>

				<!-- 동영상 플레이어 -->
				<div class="list-video-wrapper <?php echo $display_video ?> player_<?php echo $i ?>">
					<div class="videocontent">
						<div id="ask-video-player_<?php echo $i ?>" class='youtube-list-player' data-plyr-provider="youtube"
						 data-plyr-embed-id="<?php echo $youtube1 ?>" playsinline controls crossorigin preload="auto"></div>
					</div>
				</div>
				<script type="text/javascript">
					$(function() {
						const <?php echo "youtube_player_".$i ?> = new Plyr(
							'#ask-video-player_<?php echo $i ?>', {
								controls: ['play'],
								settings: [],
								autoplay: false,
								muted: false
							});
						<?php echo "youtube_player_".$i ?>.source = {
							poster: "<?php echo $poster ?>"
						};
						$('.player_<?php echo $i ?>')
							.hover(
								function() {
									<?php echo "youtube_player_".$i ?>.play();
									/* 4초만 플레이
									setTimeout(function(){
									    youtube_player_<?php echo $i ?>.pause();
									}, 4000);
									*/
								},
								function() {
									<?php echo "youtube_player_".$i ?>.pause();
								}
							);
					});

				</script>
				<?php
                    //echo $list[$i]['icon_reply']." ";
                    echo "<a href=\"" . $list[$i]['href'] . "\" class='youtube-link justify-content-between'>";
                    echo $list[$i]['subject'];

                    // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
                    // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

                    /*
                    if (isset($list[$i]['icon_new'])) {
                        echo " " . $list[$i]['icon_new'];
                    }
                    if (isset($list[$i]['icon_hot'])) {
                        echo " " . $list[$i]['icon_hot'];
                    }
                    if (isset($list[$i]['icon_file'])) {
                        echo " " . $list[$i]['icon_file'];
                    }
                    if (isset($list[$i]['icon_link'])) {
                        echo " " . $list[$i]['icon_link'];
                    }
                    if (isset($list[$i]['icon_secret'])) {
                        echo " " . $list[$i]['icon_secret'];
                    }
                    if ($list[$i]['is_notice']) {
                        echo "<strong>" . $list[$i]['subject'] . "</strong>";
                    } else {
                        echo $list[$i]['subject'];
                    }
                    if ($list[$i]['comment_cnt']) {
                        echo "<span class='comment-count'>" . $list[$i]['comment_cnt'] . "</span>";
                    }*/
                    echo "</a>";
                    ?>
			</div>
		</div>
		<?php } ?>
		<?php if (count($list) == 0) { ?>
		<div class="empty-latest-article">게시물이 없습니다.</div>
		<?php } ?>
	</div>
</div>
