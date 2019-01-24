<?php
defined('BASEPATH') or exit('rika mau ngapa kang? :/');
?>
<footer>
	<div class="taskbar taskbare">
		<div class="body">
			<div class="icon-start">
				<img src="<?php echo photo_ikon('start-icon.png') ?>">
			</div>
			<div class="search">
				<input placeholder="Cari yang ada di sini...">
				<div class="background-search"></div>
				<div class="btn-search">
					<button>
						<img src="<?php echo photo_ikon('start-search.png') ?>">
					</button>
				</div>
			</div>
			<div id="explorer" content="explorer" class="icon <?php echo isset($explorer) ? 'aktif' : '' ?>">
				<img src="<?php echo photo_ikon('folder.png') ?>">
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
	<?php echo $start ?>
</footer>
<script>
	$(document).ready(function () {
		$('#bahasa').click(function () {
			var height_taskbar = $('.taskbare').outerHeight();
			if ($('.language').hasClass('aktif')) {
				$('.language').removeAttr('style');
				$('.language').removeClass('aktif');
			} else {
				$('.language').addClass('aktif');
				$('.language').css({
					'bottom': height_taskbar
				});
			}
		});
		$('#all-posting').click(function () {
			var height_taskbar = $('.taskbare').outerHeight();
			$('#navigation').removeClass('aktif');
			$('.start .body-right').removeClass('aktif');
			$('.start .body').removeClass('aktif');
			$('#content-all-posting').addClass('aktif');
		});
		$('.icon-start').click(function () {
			var panjang = $('.start .body').outerWidth();
			var blur = '<div class="blur" style="width:' + panjang + 'px"></div>';
			var height_taskbar = $('.taskbare').outerHeight();
			var height_user = $('.start .user').outerHeight();
			if ($('.start').hasClass('aktif')) {
				$('section .blur').remove();
				$('.start').removeClass('aktif');
				$('.start').removeAttr('style');
				$('.body-left-content').removeAttr('style');
				$('section').find('.explorer').removeClass('non-aktif');
			} else {
				$('section').append(blur);
				$('section').find('.explorer').addClass('non-aktif');
				$('.start').addClass('aktif');
				$('.start').css({'bottom': height_taskbar});
			}
		});
		$('.start').click(function (x) {
			if ($(x.target).is('.start')) {
				$(this).removeClass('aktif');
				$('.start').removeAttr('style');
				$('#navigation').addClass('aktif');
				$('.start .body-right, .start .body').addClass('aktif');
				$('#content-all-posting').removeClass('aktif');
				$('section').find('.explorer').removeClass('non-aktif');
			}
		});
	});
</script>