<table class="file aktif" id="table-fixed">
	<thead  class="title-fixed" style="display:none;position:fixed;z-index: 5">
		<tr>
			<th>No.</th>
			<th>Judul</th>
			<th>Tanggal</th>
			<th>Kategori</th>
			<th>Telah dilihat</th>
		</tr>
	</thead>
</table>
<table class="file" id="table">
	<thead class="title">
		<tr>
			<th>No.</th>
			<th>Judul</th>
			<th>Tanggal</th>
			<th>Kategori</th>
			<th>Telah dilihat</th>
		</tr>
	</thead>
	<tbody class="content">
		<?PHP
		$id_terakhir = 0;
		$kategori_post = count($kategori_posting);
		$no = 1;
		if ($kategori_posting):
			foreach ($kategori_posting as $post):
				if ($no < $kategori_post):
					?>
					<tr onclick="location.href = '<?PHP echo site_url('explorer/posting/' . $post->kategori . '/' . $post->id . '/') ?>'">
						<td><span><?PHP echo $no++ ?></span></td>
						<td><span><img src="<?PHP echo photo_ikon($post->kategori . '-ikon.png') ?>"><?PHP echo $post->judul ?></span></td>
						<td><span><?PHP echo format_tanggal_indonesia($post->tanggal, false) ?></span></td>
						<td><span><?PHP echo $post->kategori ?></span></td>
						<td><span><?PHP echo $post->kunjungan . ' kali' ?></span></td>
					</tr>

					<?PHP
				else:
					$id_terakhir = $post->id;
					?>
					<tr onclick="location.href = '<?PHP echo site_url('explorer/posting/' . $post->kategori . '/' . $post->id . '/') ?>'">
						<td><span><?PHP echo $no++ ?></span></td>
						<td><span><img src="<?PHP echo photo_ikon($post->kategori . '-ikon.png') ?>"><?PHP echo $post->judul ?></span></td>
						<td><span><?PHP echo format_tanggal_indonesia($post->tanggal, false) ?></span></td>
						<td><span><?PHP echo $post->kategori ?>
								<?PHP if ($jumlah_posting == $kategori_post): ?>
									<input class="<?PHP echo 'get-post' ?>" value="<?PHP echo $kategori_post ?>" readonly="" style="display:none;">
									<input class="<?PHP echo 'get-all' ?>" value="<?PHP echo $kategori_post ?>" readonly="" style="display:none;">
									<input class="<?PHP echo 'post-kategori' ?>" value="<?PHP echo $post->kategori ?>" readonly="" style="display:none;">
								<?PHP endif; ?>
							</span></td>
						<td><span><?PHP echo $post->kunjungan . ' kali' ?></span></td>
					</tr>
				<?PHP
				endif;
			endforeach;
		endif;
		?>
	</tbody>
</table>

<script id="scroll-asdf">
	$(window).ready(function () {
		$('.explorer-item .right').on('scroll', function () {
			var $table = $('#table-fixed'),
					  $bodyCells = $('#table thead tr:first').children(),
					  colWidth;
			$(window).resize(function () {
				// Get the tbody columns width array
				colWidth = $bodyCells.map(function () {
					return $(this).outerWidth();
				}).get();
				// Set the width of thead columns
				$table.find('thead tr').children().each(function (i, v) {
					$(v).width(colWidth[i]);
				});
			}).resize(); // Trigger resize handler
			var tinggi = 0;
			$('.explorer-item .right .file .content').find('tr').each(function () {
				tinggi += $(this).outerHeight();
			});
			var scroll = $(this).scrollTop(),
					  content = $('.explorer-item .right .file .content'),
					  temu = content.find('#loading-post').length,
					  kategori = content.find('.post-kategori'),
					  get = content.find('.get-post'),
					  hitung = tinggi - $(document).height(),
					  toolbar = $('.explorer .wrap .toolbar').outerHeight() + $('.explorer .wrap .home').outerHeight(),
					  hitung2 = content.outerHeight() - $(document).height();
			$('#scroll-asdf').remove();
			if (scroll > 100) {
				var panjang = $('#table thead').width();
				$('#table-fixed thead').css({'display': 'table-header-group', 'top': toolbar, 'width': panjang});
			} else {
				$('#table-fixed thead').css({'display': 'none'});
			}
			//console.log(scroll + ' dan tinggi - window ' + tinggi + ' - ' + $(document).height() + ' = ' + hitung);
			if (scroll > hitung && temu === 0) {
				if ((Boolean(get.val().length) === false || Boolean(kategori.length) === false) || (Boolean(get.val().length) === false && Boolean(kategori.length) === false) || typeof get.val().length === 'undefined') {
					return false;
				}
				var loading = '<tr id="loading-post"><td class="text-center" colspan="5">Sedang di proses ...</td></tr>';
				$.ajax({
					url: '<?PHP echo site_url('explorer/get-file/') ?>' + get.val() + '/' + kategori.val() + '/',
					cache: false,
					type: 'POST',
					beforeSend: function (xhr) {
						content.append(loading);
					}, success: function (data, textStatus, jqXHR) {
						$('#loading-post').remove();
						var j = JSON.parse(data);
						kategori.remove();
						get.remove();
						content.append(j.view);
					}
				});
			}
		});
	});
</script>

