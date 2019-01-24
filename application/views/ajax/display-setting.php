<?PHP
$session = $this->session;
$aktif_w10 = (!$session->userdata('windows') OR $session->userdata('windows') == 'windows-10') ? ' aktif' : '';
$aktif_w8 = ($session->userdata('windows') == 'windows-8') ? ' aktif' : '';
$aktif_w7 = ($session->userdata('windows') == 'windows-7') ? ' aktif' : '';
$aktif_wxp = ($session->userdata('windows') == 'windows-xp') ? ' aktif' : '';
$aktif_w98 = ($session->userdata('windows') == 'windows-98') ? ' aktif' : '';
$aktif_folder = $session->userdata('folder');
$aktif_bg = $session->userdata('background');
$folder = [
	  'transparan-folder-biru' => 'Folder Biru',
	  'transparan-folder-hijau' => 'Folder hijau',
	  'transparan-folder-hitam' => 'Folder Hitam',
	  'transparan-folder-kuning' => 'Folder Kuning',
	  'transparan-folder-merah' => 'Folder Merah',
	  'transparan-folder-orange' => 'Folder Orange',
	  'transparan-folder-pink' => 'Folder Pink',
	  'transparan-folder-ungu' => 'Folder Ungu',
];
?>
<div content="display-setting" class="display-setting properties">
	<div class="info-alert">
		<div class="title">
			<span>Security Alert</span>
		</div>
		<div class="content" content="">
			<div class="photo">
				<img src="<?PHP echo photo_ikon('alert.png') ?>"> 
			</div>
			<span>Apakah Anda yakin ingin mengganti Tema tersebut?</span>
		</div>
		<div class="action">
			<button class="ya">Ya</button>
			<button class="tidak">Tidak</button>
		</div>
	</div>
	<div class="body">
		<div class="header">
			<div class="toolbar">
				<div class="title">
					<span>Settings</span>
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
			<div class="info">
				<div class="icon">
					<img src="<?PHP echo photo_ikon('setting-start-black.png') ?>">
				</div>
				<div class="title">
					<span>SYSTEM</span>
				</div>
			</div>
		</div>
		<div class="left">
			<div class="menu aktif display">
				<span>Display</span>
			</div>
			<div class="menu folder">
				<span>Folder</span>
			</div>
			<div class="menu background">
				<span>Background</span>
			</div>
		</div>
		<div class="right">
			<div class="menu tema aktif">
				<div class="title">
					<span>Customize your display Theme</span>
				</div>
				<div class="display">
					<div class="theme">
						<div content="windows-10" class="photo<?PHP echo $aktif_w10 ?>">
							<img src="<?PHP echo photo_ikon('windows-10-background.jpg') ?>">
							<span>Windows 10</span>
						</div>
						<div content="windows-8" class="photo<?PHP echo $aktif_w8 ?>">
							<img src="<?PHP echo photo_ikon('windows-8-background.jpg') ?>">
							<span>Windows 8</span>
						</div>
						<div content="windows-7" class="photo<?PHP echo $aktif_w7 ?>">
							<img src="<?PHP echo photo_ikon('windows-7-background.png') ?>">
							<span>Windows 7</span>
						</div>
						<div content="windows-xp" class="photo<?PHP echo $aktif_wxp ?>">
							<img src="<?PHP echo photo_ikon('windows-xp-background.jpg') ?>">
							<span>Windows XP</span>
						</div>
						<div content="windows-98" class="photo<?PHP echo $aktif_w98 ?>">
							<img src="<?PHP echo photo_ikon('windows-98-background.png') ?>">
							<span>Windows 98</span>
						</div>
					</div>
					<div class="action">
						<div class="button" id="apply-display">
							<span>Apply</span>
						</div>
					</div>
				</div>
			</div>
			<div class="menu folder">
				<div class="title">
					<span>Customize your display Folder</span>
				</div>
				<div class="display">
					<div class="theme">
						<?PHP
						$aktif_fold = NULL;
						foreach ($folder as $fold => $key):
							if ($aktif_folder == $fold) {
								$aktif_fold = 'aktif';
							} else if ($fold == 'transparan-folder-kuning' && $aktif_folder == NULL) {
								$aktif_fold = 'aktif';
							} else {
								$aktif_fold = '';
							}
							?>
							<div content="<?PHP echo $fold ?>" class="photo<?PHP echo ' ' . $aktif_fold ?>">
								<img src="<?PHP echo photo_ikon($fold . '.png') ?>">
								<span><?PHP echo $key ?></span>
							</div>
						<?PHP endforeach; ?>
					</div>
					<div class="action">
						<div class="button" id="apply-folder">
							<span>Apply</span>
						</div>
					</div>
				</div>
			</div>
			<div class="menu background">
				<div class="title">
					<span>Customize your display Background</span>
				</div>
				<div class="display">
					<div class="theme">
						<?PHP
						$aktif_fold = NULL;
						foreach ($background as $back):
							if ($aktif_bg == $back->value) {
								$aktif_background = 'aktif';
							} else if ($back->value == 'background-arjunane.jpg' && $aktif_bg == NULL) {
								$aktif_background = 'aktif';
							} else {
								$aktif_background = '';
							}
							?>
							<div content="<?PHP echo $back->value ?>" class="photo<?PHP echo ' ' . $aktif_background ?>">
								<img src="<?PHP echo photo_ikon($back->value) ?>">
								<span><?PHP echo $back->nama ?></span>
							</div>
						<?PHP endforeach; ?>
					</div>
					<div class="action">
						<div class="button" id="apply-background">
							<span>Apply</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script id="kj2345">
		$('#kj2345').remove();
		$('#apply-display').click(function () {
			var konten = $('.display-setting .right .menu.tema .display .photo.aktif span').text();
			$('.info-alert .content').attr('content', 'tema');
			$('.display-setting .info-alert').addClass('aktif');
			$('.display-setting .info-alert .content span').html('Apakah Anda yakin ingin mengganti Tema menjadi ' + konten + ' ?');
		});
		$('#apply-folder').click(function () {
			var konten = $('.display-setting .right .menu.folder .display .photo.aktif span').text();
			$('.info-alert .content').attr('content', 'folder');
			$('.display-setting .info-alert').addClass('aktif');
			$('.display-setting .info-alert .content span').html('Apakah Anda yakin ingin mengganti Background Folder menjadi ' + konten + ' ?');
		});
		$('#apply-background').click(function () {
			var konten = $('.display-setting .right .menu.background .display .photo.aktif span').text();
			$('.info-alert .content').attr('content', 'background');
			$('.display-setting .info-alert').addClass('aktif');
			$('.display-setting .info-alert .content span').html('Apakah Anda yakin ingin mengganti Gambar Background menjadi ' + konten + ' ?');
		});
		$('.display-setting .info-alert .action .tidak').click(function () {
			$('.display-setting .info-alert').removeClass('aktif');
		});
		$('.display-setting.properties .body .left .display').click(function () {
			$('.display-setting.properties .body .left .menu').removeClass('aktif');
			$(this).addClass('aktif');
			$('.display-setting.properties .body .right .menu').removeClass('aktif');
			$('.display-setting.properties .body .right .menu.tema').addClass('aktif');
		});
		$('.display-setting.properties .body .left .folder').click(function () {
			$('.display-setting.properties .body .left .menu').removeClass('aktif');
			$(this).addClass('aktif');
			$('.display-setting.properties .body .right .menu').removeClass('aktif');
			$('.display-setting.properties .body .right .menu.folder').addClass('aktif');
		});
		$('.display-setting.properties .body .left .background').click(function () {
			$('.display-setting.properties .body .left .menu').removeClass('aktif');
			$(this).addClass('aktif');
			$('.display-setting.properties .body .right .menu').removeClass('aktif');
			$('.display-setting.properties .body .right .menu.background').addClass('aktif');
		});
		$('.display-setting .info-alert .action .ya').click(function () {
			var konten_alert = $('.display-setting .info-alert .content').attr('content'), link = location.pathname;
			if (konten_alert === 'tema') {
				var konten = $('.display-setting .right .menu.tema .display .photo.aktif').attr('content');
				$.ajax({
					url: '<?PHP echo site_url('properties/change-display/') ?>' + konten + '/windows/',
					type: 'POST',
					success: function (data, textStatus, jqXHR) {
						window.location.href = link;
					}
				});
			} else if (konten_alert === 'folder') {
				var konten = $('.display-setting .right .menu.folder .display .photo.aktif').attr('content');
				$.ajax({
					url: '<?PHP echo site_url('properties/change-display/') ?>' + konten + '/folder/',
					type: 'POST',
					success: function (data, textStatus, jqXHR) {
						window.location.href = link;
					}
				});
			} else if (konten_alert === 'background') {
				var konten = $('.display-setting .right .menu.background .display .photo.aktif').attr('content');
				$.ajax({
					url: '<?PHP echo site_url('properties/change-display/') ?>' + konten + '/background/',
					type: 'POST',
					success: function (data, textStatus, jqXHR) {
						window.location.href = link;
					}
				});
			}
		});
		$(document).ready(function () {
			$('.display-setting .body .header .action .minimize').click(function () {
				$('.display-setting').addClass('not-show');
				$('#<?PHP echo str_replace('_', '-', $id_icon) ?>').removeClass('aktif');
				$('#<?PHP echo str_replace('_', '-', $id_icon) ?>').addClass('minimize');
			});
			$('.display-setting .body .header .action .close').click(function () {
				var url = window.location.href;
				window.history.pushState({}, '', removeURL('display', url));
				$('.display-setting').remove();
				$('#display-setting').remove();
			});
			var taskbar_height = $('.taskbare').outerHeight();
			var display_header = $('.display-setting .header').outerHeight();
			$('.display-setting').css({'bottom': taskbar_height});
			$('.display-setting .right, .display-setting .left').css({'padding-bottom': taskbar_height * 2 + 10});
			$('.display-setting .right .menu .display .photo').click(function () {
				$('.display-setting .right .menu .display .photo').removeClass('aktif');
				$(this).addClass('aktif');
			});
		});
	</script>
</div>
