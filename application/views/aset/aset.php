<head>
	<title title="<?php echo $judul ?>">
		<?php echo $judul ?>
	</title>
	<link href="<?php echo base_url() . $this->uri->uri_string() ?>" hreflang="x-default" rel="alternate">
	<link href="<?php echo base_url()?>" id="base_url">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<?php
	echo link_tag('aset/css/arjunane-v3.css?' . acak_string());
	
	if ($this->session->userdata('windows') == 'windows-10' || !$this->session->userdata('windows')) {
		echo link_tag('aset/css/arjunane-v3.1-windows-10.css?' . acak_string());
	}

	if ($this->session->userdata('windows') == 'windows-8') {
		echo link_tag('aset/css/arjunane-v3.1-windows-8.css?' . acak_string());
	}

	if ($this->session->userdata('windows') == 'windows-7') {
		echo link_tag('aset/css/arjunane-v3.1-windows-7.css?' . acak_string());
	}

	if ($this->session->userdata('windows') == 'windows-xp') {
		echo link_tag('aset/css/arjunane-v3.1-windows-xp.css?' . acak_string());
	}

	if ($this->session->userdata('windows') == 'windows-98') {
		echo link_tag('aset/css/arjunane-v3.1-windows-98.css?' . acak_string());
	}
	?>
	<script src="<?php echo site_url('aset/js/jquery-1.7.js?' . acak_string()) ?>" type="text/javascript"></script>
	<script src="<?php echo site_url('aset/js/arjunane-v1.js?' . acak_string()) ?>" type="text/javascript"></script>
	<link rel="shortcut icon" href="<?php echo photo_ikon('desktopcomputer.png') ?>">
	<script>
		var loading ="<div class='loading-properties'><div class='photo'><img src='<?php echo photo_ikon('loading.gif') ?>div></div>";
	</script>
	<script id="sadf987">
		$(document).ready(function () {$('#sadf987').remove();setTimeout(console.log.bind(console, "\n%c-=[ This is a browser feature intended for developers. Do not insert or paste code that you do not understand. ]=-", io.fo));
		});
	</script>
	<?php if ($this->session->flashdata('gagal_login') != ''): ?>
		<script id="Fdsaf">
			$(document).ready(function () {
				$('#Fdsaf').remove();
				$.ajax({
					url: "<?php echo site_url("properties/info/login/") ?>",
					type: 'POST',
					success: function (data, textStatus, jqXHR) {
						var js = JSON.parse(data);
						$('section').append(js.display_setting);
						$('.taskbare .body').append(js.icon);
					}
				});
			});
		</script>
	<?php endif; ?>
</head>