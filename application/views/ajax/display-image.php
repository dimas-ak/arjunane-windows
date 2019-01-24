<div class="view-image properties">
	<div class="body">
		<div class="wrap">
			<div class="container">
				<div class="header">
					<div class="icon">
						<img src="<?PHP echo photo_ikon('support-windows.png') ?>">
					</div>
					<div class="title">
						<span>Display Image</span>
					</div>
					<div class="action">
						<div class="minimize">
							<span>-</span>
						</div>
						<div class="close">
							<span>X</span>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="photo">
						<img src="<?PHP echo base_url('aset/photo/' . $path . '/' . $img) ?>">
					</div>
					<div class="action">
						<button class="full">Full Image</button>
						<button>Download</button>
					</div>
				</div>
			</div>
		</div>
		<div class="full">
			<div class="wrap">
				<img src="<?PHP echo base_url('aset/photo/' . $path . '/' . $img) ?>">
			</div>
		</div>
	</div>
	<script id="0982345">
		$(document).ready(function () {
			var taskbar_height = $('.taskbare').outerHeight();
			$('#0982345').remove();
			$('.view-image .body .wrap .container .content .action .full').click(function () {
				$('.view-image .body .full').addClass('aktif');
			});
			$('.view-image .body .full img').click(function () {
				$('.view-image .body .full').removeClass('aktif');
				console.log('oke');
			});
			$('.view-image').css('bottom', taskbar_height);
			$('.view-image .body .wrap .container .header .action .minimize').click(function () {
				$('.view-image').addClass('not-show');
				$('#<?PHP echo str_replace('_', '-', $id_icon) ?>').removeClass('aktif');
				$('#<?PHP echo str_replace('_', '-', $id_icon) ?>').addClass('minimize');
			});
			$('.view-image .body .wrap .container .header .action .close').click(function () {
				$('.view-image').remove();
				$('#<?PHP echo str_replace('_', '-', $id_icon) ?>').remove();
			});
		});
	</script>
</div>