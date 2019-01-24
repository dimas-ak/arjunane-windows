<?PHP
$view_display = $this->session->userdata('view-display');
$sub_menu_view = ['large' => 'Large Icons', 'medium' => 'Medium Icons', 'small' => 'Small Icons'];
$folder = $this->session->userdata('folder') != NULL ? $this->session->userdata('folder') : 'transparan-folder-kuning';
$background = $this->session->userdata('background') != NULL ? $this->session->userdata('background') : 'background-arjunane.jpg';
?>
<section>
	<div class="desktop">
		<div class="background">
			<img src="<?PHP echo photo_ikon($background) ?>">
		</div>
		<?PHP
		$desktop_icon = $view_display != NULL ? ' ' . $view_display : '';
		foreach ($posting as $post):
			$kategori_min = strlen($post->kategori) < 4 ? strtoupper($post->kategori) : ucwords($post->kategori);
			?>
			<a href="<?PHP echo site_url('explorer/posting/' . $post->kategori . '/') ?>">
				<div class="icon <?PHP echo $view_display ?>" title="<?PHP echo ucfirst($post->kategori) ?>">
					<img src="<?PHP echo photo_ikon($folder . '.png') ?>">
					<span><?PHP echo $kategori_min ?></span>
				</div>
			</a>
		<?PHP endforeach; ?>
	</div>
	<div id="body-explorer">
		<?PHP
		if (isset($explorer)):
			echo $explorer;
		endif;
		?>
	</div>
</section>
<div class="responsive-left">
	<img src="<?PHP echo photo_ikon('coding.png') ?>">
</div>

<script id="f89s">
	$(document).ready(function () {
		$('#f89s').remove();
		$('#asdf9768').remove();
		$('.afalse').click(function (x) {
			x.preventDefault();
			$.ajax({
				url: "<?PHP echo site_url('properties/portofolio/') ?>",
				type: "POST",
				beforeSend() {
					$('html').append(loading);
				}, success(data) {
					$('.loading-properties').remove();
					var js = JSON.parse(data);
					$('section').append(js.view);
					$('.stare').removeClass('aktif');
				}
			});
		});
	<?PHP if ($this->input->get('display', TRUE) == 'display-settings') : ?>
			$.ajax({
				url: '<?PHP echo site_url('properties/display-setting/') ?>',
				type: 'POST',
				beforeSend: function (xhr) {
					$('section').append(loading);
				}, success: function (data, textStatus, jqXHR) {
					var json = JSON.parse(data);
					$('.loading-properties').remove();
					if ($('section').find('.explorer').length !== 0) {
						$('.taskbare .body .icon').removeClass('aktif');
						$('.taskbare .body .icon').addClass('minimize');
					}
					$('.mouse-click').removeClass('aktif');
					$('section').append(json.display_setting);
					$('.taskbare .body').append(json.icon);
				}
			});
	<?PHP endif; ?>
		$('a.ahref').click(function (x) {
			x.preventDefault();
			var url = $(this).attr('href'), check = window.location.href.toString().split('?'), get = '&';
			check > 0 ? window.history.pushState({}, '', get + url) : window.history.pushState({}, '', url);
		});
		$('#as9df87').remove();
		responsive(null);
		$('.mouse-click .body a .menu.ds').click(function () {
			var display = $('section').find('.display-setting').length;
			if (display === 0) {
				$.ajax({
					url: '<?PHP echo site_url('properties/display-setting/') ?>',
					type: 'POST',
					beforeSend: function (xhr) {
						$('section').append(loading);
					}, success: function (data, textStatus, jqXHR) {
						var json = JSON.parse(data);
						$('.loading-properties').remove();
						if ($('section').find('.explorer').length !== 0) {
							$('.taskbare .body .icon').removeClass('aktif');
							$('.taskbare .body .icon').addClass('minimize');
						}
						$('.mouse-click').removeClass('aktif');
						$('section').append(json.display_setting);
						$('.taskbare .body').append(json.icon);
					}
				});
			}else{
				icon_desktop($('.taskbare .body #display-setting'),'mouse');
			}
		});
		$('.mouse-click .right .view .content').click(function () {
			var content = $(this).find('.icon').attr('content');
			var view = $(this).find('.icon');
			$.ajax({
				url: '<?PHP echo site_url('properties/view-display/') ?>' + content,
				type: 'POST',
				beforeSend: function (xhr) {
					$('body').append(loading);
					$('.mouse-click .right .view .content .icon').removeClass('aktif');
				}, success: function (data, textStatus, jqXHR) {
					$('.loading-properties').remove();
					$('.desktop .icon').removeClass();
					$('.mouse-click').removeClass('aktif');
					$('.desktop a div').addClass('icon ' + content);
					view.addClass('aktif');
				}
			});
		});


		$('[id="explorer"]').click(function () {
			var explorer = $('.explorer').length;
			if (explorer === 0) {
				$.ajax({
					url: '<?PHP echo site_url('explorer/') ?>',
					type: 'POST',
					success: function (data, textStatus, jqXHR) {
						$('#explorer.icon').addClass('aktif');
						var j = JSON.parse(data);
						$('#body-explorer').html(j.view);
						document.title = j.title;
						window.history.pushState({}, 'Menu Utama', '<?PHP echo site_url('explorer/') ?>');
					}
				});
			}
		});
		$('#explorer.icon').click(function () {
			icon_desktop($(this));
		});

		$('.start .user').click(function () {
			var height_sub_user = 0;
			$('.start .body-sub-user .sub-user').each(function () {
				height_sub_user += $(this).outerHeight();
			});
			if ($(this).hasClass('aktif')) {
				$(this).removeClass('aktif');
				$('.start .body-sub-user').removeAttr('style');
			} else {
				$(this).addClass('aktif');
				$('.start .body-sub-user').css({'height': height_sub_user});
			}
		});
		$('.responsive-left').click(function () {
			var explorer_item = $('.explorer-item .left'), ht = $('.taskbare').outerHeight();
			if (explorer_item.hasClass('minimize')) {
				explorer_item.removeClass('minimize');
				$('.explorer .wrap .toolbar,.explorer .wrap .home,.taskbare').removeAttr('style');
				//console.log(ht);
				$('.explorer.properties').css({'top': 0});
			} else {
				explorer_item.addClass('minimize');
				$('.explorer.properties').css({top: 0});
				$('.explorer .wrap .toolbar,.explorer .wrap .home').css('height', 0);
			}
		});
		var height_taskbar = $('.taskbare').outerHeight();
		$('.desktop').css({'padding-bottom': height_taskbar});
	});
	function open_url(page, url, title) {
		if (typeof (history.pushState) !== "undefined") {
			var obj = {Page: page, Url: url};
			document.title = title;
			window.history.pushState(obj, obj.Page, obj.Url);
		} else {
			alert("Browser tidak support HTML5, harap update Browser yang terbaru !!!");
		}
	}
</script>
