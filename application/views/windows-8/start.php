<div class="start-8 stare">
	<div class="body">
		<div class="header">
			<div class="title">
				<span>Start</span>
			</div>
			<div class="user">
				<div class="name">
					<span>Arjunane User</span>
				</div>
				<div class="photo">
					<img src="<?PHP echo photo_ikon('user.png') ?>">
				</div>
				<div class="sub-user">
					<div class="body">
						<div class="content login-akun">
							<span>Log-In</span>
						</div>
						<div class="content daftar-akun">
							<span>Daftar</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="body-content">
			<div class="container">
				<div class="area">
					<div class="content-1">
						<div class="body">
							<div class="photo">
								<img src="<?PHP echo photo_ikon('tentang.png') ?>">
							</div>
							<div class="text">
								<span>Tentang</span>
							</div>
						</div>
					</div>
					<a class="afalse" href="?portofolio=tampil">
						<div class="content-2">
							<div class="body">
								<div class="photo">
									<img src="<?PHP echo photo_ikon('portofolio.png') ?>">
								</div>
								<div class="text">
									<span>Portofolio</span>
								</div>
							</div>
						</div>
					</a>
					<div class="content-3">
						<div class="body">
							<div class="photo">
								<img src="<?PHP echo photo_ikon('portofolio.png') ?>">
							</div>
							<div class="text">
								<span>Portofolio</span>
							</div>
						</div>
					</div>
					<div class="content-2 main-desktop">
						<div class="full-img">
							<img src="<?PHP echo photo_ikon('windows-10.jpg') ?>">
						</div>
						<div class="text">
							<span>Dekstop</span>
						</div>
					</div>
				</div>
				<div class="area">
					<div class="content-3">
						<div class="body">
							<div class="photo">
								<img src="<?PHP echo photo_ikon('portofolio.png') ?>">
							</div>
							<div class="text">
								<span>Portofolio</span>
							</div>
						</div>
					</div>
					<div class="content-3">
						<div class="body">
							<div class="photo">
								<img src="<?PHP echo photo_ikon('portofolio.png') ?>">
							</div>
							<div class="text">
								<span>Portofolio</span>
							</div>
						</div>
					</div>
					<div class="content-3">
						<div class="body">
							<div class="photo">
								<img src="<?PHP echo photo_ikon('portofolio.png') ?>">
							</div>
							<div class="text">
								<span>Portofolio</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="action">
			<div class="icon bottom">
				<img src="<?PHP echo photo_ikon('panah-arah-bawah.png') ?>">
			</div>
		</div>
	</div>
	<div class="body-bottom">
		<div class="body">
			<div class="header">
				<div class="title">
					<span>Post</span>
				</div>
			</div>
			<div class="container">
				<div class="content">
					<?PHP
					foreach ($w8 as $w8):
						?>
						<div class="title">
							<span><?PHP echo strlen($w8['group']) > 3 ? ucwords($w8['group']) : strtoupper($w8['group']) ?></span>
						</div>
						<?PHP foreach ($w8['post'] as $pk): ?>
							<a href="<?PHP echo site_url('explorer/posting/' . $pk->kategori . '/' . $pk->id . '/') ?>" title="<?PHP echo $pk->judul ?>">
								<div class="post">
									<div class="photo">
										<img src="<?PHP echo photo_ikon($pk->kategori . '-ikon.png') ?>">
									</div>
									<div class="text">
										<span><?PHP echo $pk->judul ?></span>
									</div>
								</div>
							</a>
							<?PHP
						endforeach;
					endforeach;
					?>
				</div>
			</div>
			<div class="action">
				<div class="icon up">
					<img src="<?PHP echo photo_ikon('panah-arah-atas.png') ?>">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {

		$('.login-akun').click(function () {
			$('#body-login').addClass('aktif');
		});
		$('.daftar-akun').click(function () {
			$('#body-daftar').addClass('aktif');
		});
		$('.option .action .button-back').click(function () {
			$('#body-login').removeClass('aktif');
			$('#body-daftar').removeClass('aktif');
		});
		$('.start-8 .body .header .user').click(function () {
			var sub_user = $(this).find('.sub-user');
			if (sub_user.hasClass('aktif')) {
				sub_user.removeClass('aktif');
			} else {
				sub_user.addClass('aktif');
			}
		});
		$('.start-8 .body .action .bottom').click(function () {
			$('.start-8 .body-bottom').addClass('aktif');
		});
		$('.start-8 .body-bottom .action .up').click(function () {
			$('.start-8 .body-bottom').removeClass('aktif');
		});
		$('.start-8 .body .container .area .main-desktop').click(function () {
			$('.start-8').removeClass('aktif');
		});
	});
</script>
