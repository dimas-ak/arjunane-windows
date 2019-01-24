<?PHP
$bg_folder = $this->session->userdata('folder') != NULL ? $this->session->userdata('folder') : 'transparan-folder-kuning';
?>
<div class="explorer properties" content="explorer">
	<div class="wrap">
		<div class="toolbar">
			<div class="close"><span>X</span></div>
			<div class="minimize"><span>&ndash;</span></div>
		</div>
		<div class="home">
			<div class="info">
				<div id="search-progress" class="progress"></div>
				<?php echo set_breadcrumb('<span> &blacktriangleright; </span>') ?>
			</div>
			<?PHP echo form_open('explorer/search/', ['id="es"', 'method="get"']); ?>
			<div class="search">
				<input placeholder="Pencarian" name="search" id="search" value="<?PHP echo isset($search) ? $search : '' ?>">
			</div>
			<?PHP echo form_close(); ?>
		</div>
		<div class="explorer-item">
			<div class="left">
				<div class="body-explorer-left">
					<a class="mas" href="<?PHP echo site_url('explorer/') ?>">
						<div class="master">
							<div class="background">
								<img src="<?PHP echo photo_ikon('hard-drive.png') ?>">
							</div>
							<span>This Drive</span>
						</div>
					</a>
					<?PHP
					foreach ($posting as $post):
						$kate = strlen($post->kategori) < 4 ? strtoupper($post->kategori) : ucwords($post->kategori);
						$aktif = $this->uri->segment(3) == $post->kategori ? ' aktif' : '';
						?>
						<a class="ex" href="<?PHP echo site_url('explorer/posting/' . $post->kategori . '/') ?>">
							<div class="folder<?PHP echo $aktif ?>">
								<div class="background">
									<img src="<?PHP echo photo_ikon($bg_folder . '.png') ?>">
								</div>
								<span><?PHP echo $kate ?></span>
							</div>
						</a>
					<?PHP endforeach; ?>
				</div>
			</div>
			<?PHP if ($kategori == 'index'): ?>
				<div class="right _09">
					<?PHP
					foreach ($posting as $post):
						?>
						<a href="<?PHP echo site_url('explorer/posting/' . $post->kategori . '/') ?>">
							<div class="folder">
								<div class="background">
									<img src="<?PHP echo photo_ikon($bg_folder . '.png') ?>">
								</div>
								<span><?PHP echo trim(strlen($post->kategori)) < 4 ? strtoupper($post->kategori) : ucwords($post->kategori) ?></span>
							</div>
						</a>
						<?PHP
					endforeach;
					?>
				</div>
			<?PHP elseif ($kategori == 'post-kategori'):
				?>
				<div class="right _09" style="padding: 0px;">
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
				</div>

				<script id="scroll-asdf">
					$(window).load(function () {
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
								/*
								if ((Boolean(get.val().length) === false || Boolean(kategori.length) === false) 
								|| (Boolean(get.val().length) === false && Boolean(kategori.length) === false) 
								|| (typeof get.val() === 'undefined' && typeof kategori.length === 'undefined') 
								|| (typeof get.val() === 'undefined' || typeof kategori.length === 'undefined')) {
									return false;
								}*/
								if(get.length === 0 || kategori.length === 0){
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


			<?PHP elseif ($kategori == 'post-search'): ?>
				<div class="right _09" style="padding: 0px;">
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
				</div>

				<script id="scroll-asdf">
					$(window).load(function () {
						$('.explorer-item .right').on('scroll', function (x) {
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
									  search = $('#search').val(),
									  get = content.find('.get-post'),
									  kategori = content.find('.post-kategori'),
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
								if ((search.length === 0 && get.length === 0) || (typeof get.val() === 'undefined')) {
									return false;
									x.preventDefault();
								} else {
									var loading = '<tr id="loading-post"><td class="text-center" colspan="5">Sedang di proses ...</td></tr>';
									$.ajax({
										url: '<?PHP echo site_url('explorer/search/get/') ?>' + get.val() + '/' + search + '/',
										cache: false,
										type: 'POST',
										beforeSend: function (xhr) {
											content.append(loading);
										}, success: function (data, textStatus, jqXHR) {
											$('#loading-post').remove();
											kategori.remove();
											get.remove();
											if (isJsonString(data) === true) {
												var j = JSON.parse(data);
												content.append(j.view);
											}
										}
									});
								}
							}
						});
					});
				</script>
				<?PHP
			elseif ($kategori == 'post-detail'):
				$kategori_min = strlen($detail['kategori']) < 4 ? strtoupper($detail['kategori']) : ucwords($detail['kategori']);
				?>
				<div class="right _09">
					<div class="detail">
						<div class="title">
							<span><?PHP echo $detail['judul'] ?></span>
						</div>
						<div class="info">
							<span><?PHP echo $kategori_min ?></span>
							<div class="border"></div>
							<div class="sub-info">
								<span><?PHP echo 'Kategori ' . $kategori_min ?></span>
								<span><?PHP echo 'Di post oleh Arjunane' ?></span>
							</div>
							<div class="icon">
								<img alt="<?PHP echo $detail['judul'] ?>" src="<?PHP echo photo_ikon($detail['kategori'] . '-ikon.png') ?>">
							</div>
						</div>
						<div class="info">
							<span>Info</span>
							<div class="border"></div>
							<div class="sub-info">
								<table>
									<tr>
										<td>Tanggal</td>
										<td><?PHP echo format_tanggal($detail['tanggal']) ?></td>
									</tr>
									<tr>
										<td>Telah dilihat sebanyak</td>
										<td><?PHP echo $detail['kunjungan'] . ' kali' ?></td>
									</tr>
									<tr>
										<td>Total komentar</td>
										<td><?PHP echo $jumlah_komentar . ' komentar.' ?></td>
									</tr>
								</table>
							</div>
						</div>
						<script id="308924u5m">
							$(document).ready(function () {
								$('.explorer .wrap .explorer-item .right .detail  img').click(function () {
									var img = $(this)[0].getAttribute('src'), pisah = img.split('//'), src = pisah[1].slice(0, pisah[1].lastIndexOf('/')).toString();
									var value = img.substring(img.lastIndexOf('/') + 1), path = src.substring(src.lastIndexOf('/') + 1), properties = $('section').find('.properties');
									var photo = $(this);
									$.ajax({
										url: '<?PHP echo site_url('properties/view-image/') ?>' + $.trim(path) + "/" + $.trim(value),
										type: 'POST',
										beforeSend: function (xhr) {
											photo.css({'filter': 'blur(2.5px)', '-webkit-filter': 'blur(2.5px)', 'position': 'relative'});
											photo.append(loading);
										},
										success: function (data, textStatus, jqXHR) {
											var j = JSON.parse(data), x = $('section').find('.view-image'), y = $('footer').find('#view-image');
											photo.removeAttr('style');
											$('.loading-properties').remove();
											properties.removeClass('ngalah-ngalahe');
											if (x.length === 0) {
												$('section').append(j.view);
												$('.taskbare .body').append(j.icon);
											} else {
												x.remove();
												y.remove();
												$('section').append(j.view);
												$('.taskbare .body').append(j.icon);
											}
										}
									});
								});
							});
						</script>
						<div class="info">
							<span>Detail Posting</span>
							<div class="border"></div>
							<div class="photo">
								<img alt="<?PHP echo $detail['judul'] ?>" src="<?PHP echo photo_posting($detail['photo']) ?>">
							</div>
							<div class="content">
								<?PHP echo $detail['keterangan'] ?>
							</div>
						</div>
					</div>
					<div class="comment">
						<div class="post-comment">
							<div class="title">
								<span>Komentar untuk Posting : <?PHP echo $detail['judul'] ?></span>
							</div>
							<div class="detail">
								<div class="info">
									<span>Komentar</span>
									<div class="border"></div>
								</div>
							</div>
							<?PHP if ($komentar): ?>
								<div class="komentar">
									<?PHP
									foreach ($komentar as $kom):
										if ($kom->level == 'tamvan' && $kom->photo == NULL) {
											$photo_ = photo_ikon('support-windows.png');
										} else if ($kom->level == 'sangar' && $kom->photo == NULL) {
											$photo_ = photo_ikon('user.png');
										} else {
											$photo_ = $kom->photo;
										}
										$nama_ = $kom->nama;
										$level_ = $kom->level == 'tamvan' ? ' [admin]' : '';
										?>
										<div class="content">
											<div class="info">
												<div class="photo">
													<img src="<?PHP echo $photo_ ?>">
												</div>
												<div class="user<?PHP echo $level_ ?>">
													<span><?PHP echo $nama_ ?>,</span>
												</div>
												<div class="date">
													<span><?PHP echo format_tanggal($kom->tanggal, TRUE) ?></span>
												</div>
											</div>
											<div class="body">
												<?PHP if (login_admin_arjunane() || login_user_arjunane() == $kom->user): ?>
													<div class="action">
														<div class="text">
															<span>Setting</span>
														</div>
														<div class="item">
															<div class="sub-item">
																<span>Edit</span>
															</div>
															<div class="sub-item">
																<span>Hapus</span>
															</div>
														</div>
													</div>
												<?PHP endif; ?>
												<div class="content-comment<?PHP echo $level_ ?>">
													<pre><?PHP echo htmlentities($kom->keterangan) ?></pre>
												</div>
											</div>
										</div>
									<?PHP endforeach; ?>
								</div>
							<?PHP else: ?>
								<div class="komentar">

								</div>
							<?PHP endif; ?>
						</div>
						<?PHP
						if (login_user_arjunane() || login_admin_arjunane()):
							echo form_open('explorer/comment/' . $detail['kategori'] . '/' . $detail['id'] . '/');
							$textarea = set_value('com');
							echo $this->session->flashdata('gagal');
							?>
							<div class="detail">
								<div class="info">
									<span>Tambahkan Komentar</span>
									<div class="border"></div>
								</div>
							</div>
							<div class="form-textarea">
								<?PHP echo form_error('com') ?>
								<textarea id="com" name="com" placeholder="Add your comments"><?PHP echo $textarea ?></textarea>
								<div class="info">
									<span>Your comments are public - don't add personal info.</span>
								</div>
							</div>
							<div class="form-captcha">
								<?PHP echo form_error('sec') ?>
								<?PHP echo $image; ?>
								<input name="sec" placeholder="Captcha.">
							</div>
							<div class="submit">
								<button>Kirim</button>
							</div>
							<?PHP echo form_close(); ?>

							<script id="f78s">
								$(document).ready(function () {
									$('#f78s').remove();
									$('#search').on('input', function () {
										if ($(this).val() === "") {
											$('.explorer-item .right._09').removeAttr('style');
											$('.explorer-item .right._10').html("");
											$('.explorer-item .right._10').css({'display': 'none'});
										}
									});
		<?PHP if (login_admin_arjunane() || login_user_arjunane()): ?>
										$('#form-com').submit(function (x) {
											x.preventDefault();
											var form = $('#form-com').serialize();
											if ($('#com').val() !== "") {
												$.ajax({
													url: '<?PHP echo site_url('explorer/comment/' . $detail['id'] . '/') ?>',
													data: form,
													type: 'POST',
													success: function (data, textStatus, jqXHR) {
														var respon = JSON.parse(data);
														if ($.trim(data) === 'x') {
															$('.form-textarea #com-info').html(info_gagal('Terjadi kesalahan, harap dicoba kembali.'));
														} else if ($.trim(data) === 'xx') {
															$('.form-textarea #com-info').html(info_gagal('Terjadi kesalahan, harap dicoba kembali.'));
														} else if (typeof respon == 'object') {
															$('.explorer-item .right .comment #com-info').html(info_gagal('Harap periksa kembali isi komentar Anda.'));
														} else {
															$('.comment .komentar').append(data);
														}
													}
												});
											}
										});
		<?PHP endif; ?>
								});
							</script>
							<?PHP
						else:
							?>
							<div class="title">
								<span>Log-In diperlukan untuk comment di Arjunane.</span>
							</div>
							<div class="detail">
								<div class="info">
									<span>Info</span>
									<div class="border"></div>
								</div>
							</div>
							<div class="warning">
								<span>Klik <a href="#" class="login-akun">Sign-In</a> jika Anda sudah memiliki akun di Arjunane, klik <a href="#" class="daftar-akun">Sign-up</a> jika Anda belum memiliki akun di Arjunane.</span>
							</div>
						<?PHP endif; ?>
					</div>
				</div>
			<?PHP endif; ?>
		</div>
		<script id="SDHDF789">
			$(document).ready(function () {
				$('#SDHDF789').remove();
				var explorer = $('.explorer');
				var height_taskbar = $('.taskbare').outerHeight();
				var home = $('.explorer .home').outerHeight(), properties = $('section').find('.properties');
				if ($('.start').hasClass('aktif')) {
					$('.explorer').addClass('non-aktif');
				}
				$('.explorer').css({'bottom': height_taskbar, 'top': '0'});
			});
		</script>
	</div>
</div>
