<!-- Content Row -->
<div class="row">
	
	<!-- Sidebar Column -->
	<div class="col-lg-3 mb-4 d-none d-lg-block">

		<div id="index_menu">
			<ul id="mysub">
				<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/faq.php"><i class="fa fa-question" aria-hidden="true"></i><span> FAQ</span></a></li>
				<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/qalist.php"><i class="fa fa-comments" aria-hidden="true"></i><span> 1:1문의</span></a></li>
				<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/current_connect.php"><i class="fa fa-users" aria-hidden="true"></i><span> 접속자</span><strong class="visit-num"><?php echo connect('theme/basic'); // 현재 접속자수, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?></strong></a></li>
				<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/new.php"><i class="fa fa-history" aria-hidden="true"></i><span> 새글</span></a></li>
				<?php if ($is_member) { ?>
					<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php"><i class="fa fa-cog" aria-hidden="true"></i> 정보수정</a></li>
					<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> 로그아웃</a></li>            
					<?php if ($is_admin) { ?>            
						<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_ADMIN_URL ?>"><b><i class="fas fa-user-circle" aria-hidden="true"></i> 관리자</b></a></li>
					<?php }  ?>
        <?php } else {  ?>
					<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> 회원가입</a></li>
					<li class="menu_item"><a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/login.php"><b><i class="fas fa-sign-in-alt" aria-hidden="true"></i> 로그인</b></a></li>       
				<?php }  ?>
      </ul>
		</div>
		<div class="row banner">
			<img src="<?php echo G5_THEME_URL ?>/asset/images/main/banner_01.png" alt="Banner">
		</div>
		<div class="row banner">
			<img src="<?php echo G5_THEME_URL ?>/asset/images/main/banner_02.png" alt="Banner">
		</div>
		<div class="row banner">
			<span class="banner-text">설문조사, 접속 통계 등의 기타 섹션으로 활용</span>
		</div>
  </div>
        
  <!-- Content Column -->
  <div class="col-lg-9 mb-4">
