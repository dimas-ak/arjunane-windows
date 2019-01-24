<div id="body-login" class="option">
	<div class="body">
		<?PHP echo form_open('auth-account/login/', 'id="form-login"'); ?>
		<div class="content login">
			<div class="title">
				<span>Log-In Akun</span>
			</div>
			<div class="info">
				<span>Silahkan Log-in terlebih dahulu</span>
			</div>
			<div id="info-login"></div>
			<div class="form-100">
				<div class="form-50" >
					<div class="input">
						<span>Username</span>
						<div id="un-info"></div>
						<input id="un" name="un" placeholder="Masukkan Username Anda">
					</div>
				</div>
			</div>
			<div class="form-100">
				<div class="form-50">
					<div class="input">
						<span>Password</span>
						<div id="ps-info"></div>
						<input type="password" id="ps" name="ps" placeholder="Masukkan Password Anda">
					</div>
				</div>
			</div>
		</div>
		<div class="action">
			<button type="button" class="button-back">KEMBALI</button>
			<button class="button-confirm">MASUK</button>
		</div>
		<?PHP echo form_close(); ?>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#form-login').submit(function (x) {
			x.preventDefault();
			var info = '<div class="info-gagal"><span>Username atau Password Salah.</span></div>';
			var form = $('#form-login').serialize();
			$('.login .info-gagal').remove();
			$.ajax({
				url: '<?PHP echo site_url('auth-account/login/') ?>',
				type: 'POST',
				cache: false,
				data: form,
				success: function (data, textStatus, jqXHR) {
					if ($.trim(data) === 'gagal[]') {
						$('#info-login').append(info);
					} else if ($.trim(data) === 'redirect[]') {
						window.location.href = '<?PHP echo site_url($this->uri->uri_string()) ?>';
					} else {
						var json = JSON.parse(data);
						json.un !== undefined ? $('.login #un-info').html(info_gagal(json.un)) : false;
						json.ps !== undefined ? $('.login #ps-info').html(info_gagal(json.ps)) : false;
					}
				}
			});
		});
		$('.login #un').on('input', function () {
			$('.login #un-info').html("");
		});
		$('.login #ps').on('input', function () {
			$('.login #ps-info').html("");
		});
	});
</script>