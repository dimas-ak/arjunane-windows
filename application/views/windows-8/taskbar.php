<?PHP
defined('BASEPATH') or exit('rika mau ngapa kang? :/');
$data['user'] = $user;
?>
<footer>
	<div class="taskbar-8 taskbare">
		<div class="body">
			<div class="icon-start">
				<img src="<?PHP echo photo_ikon('start-icon.png') ?>">
			</div>
			<div id="explorer" content="explorer" class="icon <?PHP echo isset($explorer) ? 'aktif' : '' ?>">
				<img src="<?PHP echo photo_ikon('folder.png') ?>">
			</div>
			<div class="right">
				<div id="bahasa" class="info">
					<span>IND</span>
				</div>
				<div class="info">
					<span id="hari-ini"></span>
					<span id="waktu-windows"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="bar-kanan">
		<div class="body">
			<div class="content search">
				<div class="photo">
					<img src="<?PHP echo photo_ikon('windows-search.png') ?>">
				</div>
				<div class="text">
					<span>Pencarian</span>
				</div>
			</div>
			<div class="content share">
				<div class="photo">
					<img src="<?PHP echo photo_ikon('windows-share.png') ?>">
				</div>
				<div class="text">
					<span>Share</span>
				</div>
			</div>
			<div class="content start">
				<div class="photo">
					<img src="<?PHP echo photo_ikon('windows-8-logo.png') ?>">
				</div>
				<div class="text">
					<span>Start</span>
				</div>
			</div>
			<div class="content settings">
				<div class="photo">
					<img src="<?PHP echo photo_ikon('windows-pengaturan.png') ?>">
				</div>
				<div class="text">
					<span>Settings</span>
				</div>
			</div>
		</div>
	</div>
	<div class="bar-kanan-pilih search">
		<div class="body">
			<div class="content">
				<div class="title">
					<span>Pencarian</span>
				</div>
				<div class="search">
					<div class="input">
						<input placeholder="Cari ...">
						<button>
							<img src="<?PHP echo photo_ikon('ikon-pencarian.png') ?>">
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bar-kanan-pilih search">
		<div class="body">
			<div class="container">
				<div class="title">
					<span>Pencarian</span>
				</div>
				<div class="search">
					<div class="input">
						<input placeholder="Cari ...">
						<button>
							<img src="<?PHP echo photo_ikon('ikon-pencarian.png') ?>">
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bar-kanan-pilih share">
		<div class="body">
			<div class="container">
				<div class="title">
					<span>Share</span>
					<div class="sub-title-1">
						<span>Share</span>
					</div>
					<div class="sub-title-2">
						<span>Share Halaman ini</span>
					</div>
				</div>
				<div class="box">
					<div class="content-1">
						<div class="photo">
							<img src="<?PHP echo photo_ikon('facebook.png') ?>">
						</div>
						<div class="text">
							<span>Facebook</span>
						</div>
					</div>
					<div class="content-1">
						<div class="photo">
							<img src="<?PHP echo photo_ikon('twitter.png') ?>">
						</div>
						<div class="text">
							<span>Twitter</span>
						</div>
					</div>
					<div class="content-1">
						<div class="photo">
							<img src="<?PHP echo photo_ikon('google+.png') ?>">
						</div>
						<div class="text">
							<span>Google +</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bar-kanan-pilih settings">
		<div class="body">
			<div class="container">
				<div class="title">
					<span>Settings</span>
					<div class="sub-title-2">
						<span>Settings</span>
					</div>
				</div>
				<div class="box">
					<div class="content-1">
						<div class="text">
							<span>Tentang</span>
						</div>
					</div>
					<a href="#" class="a color-white">
						<div class="content-1">
							<div class="text">
								<span>Portofolio</span>
							</div>
						</div>
					</a>
				</div>
				<div class="box-2">
					<div class="choose">
						<div class="wrap">
							<a href="<?PHP echo site_url('explorer/') ?>">
								<div class="content">
									<div class="img">
										<img src="<?PHP echo photo_ikon('folder-start.png') ?>">
									</div>
									<div class="text">
										<span>Explorer</span>
									</div>
								</div>
							</a>
							<a href="#">
								<div class="content login-akun">
									<div class="img">
										<img src="<?PHP echo photo_ikon('account-white.png') ?>">
									</div>
									<div class="text">
										<span>Log-In</span>
									</div>
								</div>
							</a>
							<a href="#">
								<div class="content daftar-akun">
									<div class="img">
										<img src="<?PHP echo photo_ikon('back-start.png') ?>">
									</div>
									<div class="text">
										<span>Daftar</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="bottom">
						<div class="text">
							<span>Arjunane</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bar-waktu">
		<div class="body">
			<div class="time">
				<span class="waktu" id="waktu-bar"></span>
			</div>
			<div class="day">
				<span id="day-waktu"></span>
			</div>
		</div>
	</div>
</footer>
<script>

	function waktu_start() {
		var hari = new Date();
		var jam = hari.getHours();
		var menit = hari.getMinutes();
		var detik = hari.getSeconds();
		menit = cek_waktu(menit);
		detik = cek_waktu(detik);

		document.getElementById('waktu-bar').innerHTML =
				  jam + ":" + menit;
		var waktu = setTimeout(waktu_mulai, 500);

		var dino = new Date();
		var minggune = new Array(7);
		var bulane = new Array(12);

		minggune[0] = "Minggu";
		minggune[1] = "Senin";
		minggune[2] = "Selasa";
		minggune[3] = "Rabu";
		minggune[4] = "Kamis";
		minggune[5] = "Jumat";
		minggune[6] = "Sabtu";

		bulane[0] = "Januari";
		bulane[1] = "Februari";
		bulane[2] = "Maret";
		bulane[3] = "April";
		bulane[4] = "Mei";
		bulane[5] = "Juni";
		bulane[6] = "Juli";
		bulane[7] = "Agustus";
		bulane[8] = "September";
		bulane[9] = "Oktober";
		bulane[10] = "November";
		bulane[11] = "Desember";

		var n = minggune[dino.getDay()];
		var m = bulane[dino.getMonth()];
		document.getElementById("day-waktu").innerHTML = n + "<br>" + dino.getDay() + ' ' + m;
	}
	window.onload = function () {
		waktu_start();
	};
	$(document).ready(function () {
		$('.bar-kanan .body .content.search').click(function () {
			$('.bar-kanan-pilih.search').addClass('aktif');
		});
		$('.bar-kanan .body .content.settings').click(function () {
			$('.bar-kanan-pilih.settings').addClass('aktif');
		});
		$('.bar-kanan .body .content.share').click(function () {
			$('.bar-kanan-pilih.share').addClass('aktif');
		});
		$('.bar-kanan-pilih').click(function (x) {
			if (!$(x.target).is('.bar-kanan-pilih *')) {
				$('.bar-kanan-pilih').removeClass('aktif');
			}
		});
		$('.bar-kanan .body .content.start').click(function () {
			var w8 = $('.start-8');
			if (w8.hasClass('aktif')) {
				w8.removeClass('aktif');
			} else {
				w8.addClass('aktif');
			}
		});
		$('#bahasa').click(function () {
			var height_taskbar = $('.taskbare').outerHeight();
			if ($('.language').hasClass('aktif')) {
				$('.language').removeAttr('style');
				$('.language').removeClass('aktif');
			} else {
				$('.language').addClass('aktif');
				$('.language').css({'bottom': height_taskbar});
			}
		});
		$('#all-posting').click(function () {
			var height_taskbar = $('.taskbare').outerHeight();
			$('#navigation').removeClass('aktif');
			$('.start .body-right').removeClass('aktif');
			$('.start .body').removeClass('aktif');
			$('#content-all-posting').addClass('aktif');
			$('#content-all-posting').css({'padding-bottom': height_taskbar + 25});
		});
		$('.icon-start').click(function () {
			var height_taskbar = $('.taskbare').outerHeight();
			var height_user = $('.start .user').outerHeight();
			if ($('.start-8').hasClass('aktif')) {
				$('.start-8').removeClass('aktif');
			} else {
				$('.start-8').addClass('aktif');
			}
		});
		$('.start').click(function (x) {
			if ($(x.target).is('.start')) {
				$('section .blur').remove();
				$(this).removeClass('aktif');
				$('.start').removeAttr('style');
				$('#navigation').addClass('aktif');
				$('.start .body-right').addClass('aktif');
				$('#content-all-posting').removeClass('aktif');
				$('section').find('.explorer').removeClass('non-aktif');
			}
		});
	});
</script>
