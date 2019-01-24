<?php
defined('BASEPATH') or exit('rika mau ngapa kang? :/');
$sering_di_kunjungi = $this->dbs->order_by('kunjungan', 'posting', 'desc', 5);
if (login_admin_arjunane()) {
	$nama = $user['nama'];
	$photo = $user['photo'] != NULL ? photo_user($user['photo']) : photo_ikon('support-windows.png');
} else if (login_user_arjunane()) {
	$nama = $user['nama'];
	$photo = $user['photo'] != NULL ? photo_user($user['photo']) : photo_ikon('user.png');
} else {
	$nama = 'Arjunane User';
	$photo = photo_ikon('user.png');
}
?>
	<div class="start stare">
		<div class="body aktif">
			<div class="body-left">
				<div class="user">
					<img src="<?php echo $photo ?>">
					<span>
						<?php echo $nama ?>
					</span>
					<div class="body-sub-user">
						<?php if (!login_admin_arjunane() && !login_user_arjunane()): ?>
						<div class="sub-user login-akun">
							<span>Login</span>
						</div>
						<div class="sub-user daftar-akun">
							<span>Daftar</span>
						</div>
						<?php elseif (login_admin_arjunane()): ?>
						<div class="sub-user">
							<span>Halaman Admin</span>
						</div>
						<div class="sub-user">
							<span>Pengaturan Akun</span>
						</div>
						<div onclick="location.href = '<?php echo site_url('admin/log-out/') ?>'" class="sub-user">
							<span>Keluar</span>
						</div>
						<?php elseif (login_user_arjunane()): ?>
						<a href="<?php echo site_url('user/') ?>" class="a color-white">
							<div class="sub-user">
								<span>Pengaturan Akun</span>
							</div>
						</a>
						<div onclick="location.href = '<?php echo site_url('user/log-out/') ?>'" class="sub-user">
							<span>Keluar</span>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div id="navigation" class="body-left-content aktif">
					<div class="navigation">
						<div class="title">
							<span>Sering dikunjungi</span>
						</div>
						<!-- SERING DI KUNJUNGI -->
						<div class="recent">
							<?php foreach ($sering_di_kunjungi as $post): ?>
							<a title="<?php echo $post->judul ?>" href="<?php echo site_url('explorer/posting/' . $post->kategori . '/' . $post->id . '/') ?>">
								<div class="content">
									<img src="<?php echo photo_ikon($post->kategori . '-ikon.png') ?>">
									<span>
										<?php echo $post->judul ?>
									</span>
								</div>
							</a>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="navigation">
						<div class="title">
							<span>Disarankan</span>
						</div>
						<!-- DI SARANKAN -->
						<div class="content">
							<img src="<?php echo photo_ikon('android-ikon.png') ?>">
							<span>Mencoba Nama</span>
						</div>
					</div>
					<div class="body-panel">
						<div id="explorer" class="content">
							<img src="<?php echo photo_ikon('folder-start.png') ?>">
							<span>File Explorer</span>
						</div>
						<div class="content">
							<img src="<?php echo photo_ikon('setting-start.png') ?>">
							<span>Pengaturan</span>
						</div>
						<div id="all-posting" class="content">
							<img src="<?php echo photo_ikon('list-start.png') ?>">
							<span>Semua Posting</span>
						</div>
					</div>
				</div>
				<?php echo $all_post ?>
			</div>
			<div class="body-right aktif">
				<div class="title">
					<span>Tentang & Info</span>
				</div>
				<div class="info">
					<a class="afalse" href="?portofolio=tampil">
						<div class="content-1">
							<div class="photo">
								<img src="<?php echo photo_ikon('portofolio.png') ?>">
							</div>
							<div class="text">
								<span>Portofolio</span>
							</div>
						</div>
					</a>
					<div class="content-2">
						<div class="photo">
							<img src="<?php echo photo_ikon('tentang.png') ?>">
						</div>
						<div class="text">
							<span>Tentang</span>
						</div>
					</div>
					<div class="content-1">
						<div class="photo">
							<img src="<?php echo photo_ikon('portofolio.png') ?>">
						</div>
						<div class="text">
							<span>Portofolio</span>
						</div>
					</div>
					<div class="content-1">
						<div class="photo">
							<img src="<?php echo photo_ikon('portofolio.png') ?>">
						</div>
						<div class="text">
							<span>Portofolio</span>
						</div>
					</div>
					<div class="content-1">
						<div class="photo">
							<img src="<?php echo photo_ikon('portofolio.png') ?>">
						</div>
						<div class="text">
							<span>Portofolio</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>