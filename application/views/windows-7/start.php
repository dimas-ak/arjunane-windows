	<div class="start-7 stare">
		<div class="body">
			<div class="left">
				<div class="container">
					<div class="box">
						<?php foreach ($sering_di_kunjungi as $sdk): ?>
						<a class="a" href="<?php echo site_url('explorer/posting/' . $sdk->kategori . '/' . $sdk->id . '/') ?>" title="<?php echo $sdk->judul ?>">
							<div class="content">
								<div class="photo">
									<img src="<?php echo photo_ikon($sdk->kategori . '-ikon.png') ?>">
								</div>
								<div class="text">
									<span>
										<?php echo $sdk->judul ?>
									</span>
								</div>
							</div>
						</a>
						<?php endforeach; ?>
					</div>
					<div class="box-2">
						<div class="all">
							<div class="content">
								<div class="icon">
									<img src="<?php echo photo_ikon('ikon-kanan-20.png') ?>">
								</div>
								<div class="text">
									<span>All Postings</span>
								</div>
							</div>
						</div>
						<div class="search">
							<div class="input">
								<input placeholder="Cari ...">
								<button>
									<img src="<?php echo photo_ikon('ikon-pencarian-2.png') ?>">
								</button>
							</div>
						</div>
					</div>
					<?php echo $all_post ?>
				</div>
			</div>
			<div class="right">
				<div class="container">
					<div class="icon">
						<img src="<?php echo photo_ikon('windows-7-background.png') ?>">
					</div>
					<div class="box">
						<div target="<?php echo photo_ikon('tentang.png') ?>" class="content">
							<div class="text">
								<span>Tentang</span>
							</div>
						</div>
						<a class="afalse a" href="?portofolio=tampil">
							<div target="<?php echo photo_ikon('portofolio.png') ?>" class="content">
								<div class="text">
									<span>Portofolio</span>
								</div>
							</div>
						</a>
						<?php if (!login_admin_arjunane() && !login_user_arjunane()): ?>
						<div target="<?php echo photo_ikon('windows-7-users-2.png') ?>" class="content login-akun">
							<div class="text">
								<span>Login</span>
							</div>
						</div>
						<div target="<?php echo photo_ikon('windows-7-users.png') ?>" class="content daftar-akun">
							<div class="text">
								<span>Daftar</span>
							</div>
						</div>
						<?php elseif (login_user_arjunane()): ?>
						<a class="a" href="<?php echo site_url('user/') ?>">
							<div target="<?php echo photo_ikon('windows-7-users-2.png') ?>" class="content">
								<div class="text">
									<span>Akun</span>
								</div>
							</div>
						</a>
						<a class="a" href="<?php echo site_url('user/logout/') ?>">
							<div target="" class="content">
								<div class="text">
									<span>keluar</span>
								</div>
							</div>
						</a>
						<?php elseif (login_admin_arjunane()): ?>
						<a class="a" href="<?php echo site_url('admin/') ?>">
							<div target="<?php echo photo_ikon('windows-7-users-2.png') ?>" class="content login-akun">
								<div class="text">
									<span>Akun</span>
								</div>
							</div>
						</a>
						<a class="a" href="<?php echo site_url('admin/logout/') ?>">
							<div target="" class="content">
								<div class="text">
									<span>keluar</span>
								</div>
							</div>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {

				$('.login-akun').click(function() {
					$('#body-login').addClass('aktif');
				});
				$('.daftar-akun').click(function() {
					$('#body-daftar').addClass('aktif');
				});
				$('.option .action .button-back').click(function() {
					$('#body-login').removeClass('aktif');
					$('#body-daftar').removeClass('aktif');
				});
				$('.start-7 .body .right .container .box .content').hover(function() {
					var xxx = $(this).attr('target');
					if (xxx !== "") {
						$('.start-7 .body .right .container .icon img').attr('src', xxx);
					}
				}, function() {
					$('.start-7 .body .right .container .icon img').attr('src', "<?php echo photo_ikon("windows-7-background.png") ?>");
				});
				$('.start-7 .body .left .container .box-2 .all .content').click(function() {
					var all_posting = $('.start-7 .body .left .container .all-posting');
					var text = $(this).find('.text span');
					var icon = $(this).find('.icon img');
					if (all_posting.hasClass('aktif')) {
						text.html('All Postings');
						all_posting.removeClass('aktif');
						icon.removeAttr('style');
					} else {
						text.html('Back');
						all_posting.addClass('aktif');
						icon.css({
							'transform': 'rotate(180deg)',
							'-webkit-transform': 'rotate(180deg)'
						});
					}
				});
				$('.start-7').click(function(xxx) {
					if (!$(xxx.target).is('.start-7 *')) {
						$('.start-7').removeClass('aktif');
						$('.taskbar-7 .body .icon-start').removeClass('aktif');
						$(".taskbar-7 .body .icon-start img").attr('src', "<?php echo photo_ikon("windows-7-start.png") ?>");
					}
				});
			});
		</script>
	</div>