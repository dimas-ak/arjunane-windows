<?php
$bg_folder = $this->session->userdata('folder') != NULL ? $this->session->userdata('folder') : 'transparan-folder-kuning';
?>
	<div class="all-posting">
		<div class="box">
			<?php
	foreach ($folder as $folder):
	    ?>
				<div class="content folder">
					<div class="icon">
						<img src="<?php echo photo_ikon($bg_folder . '.png') ?>">
					</div>
					<div class="text">
						<span>
							<?php echo $folder['group'] ?>
						</span>
					</div>
				</div>
				<div class="sub-content">
					<?php foreach ($folder['post'] as $sub_folder): ?>
					<a class="a" href="<?php echo site_url('explorer/posting/' . $sub_folder->kategori . '/' . $sub_folder->id . '/') ?>" title="<?php echo $sub_folder->judul ?>">
						<div class="content">
							<div class="icon">
								<img src="<?php echo photo_ikon($sub_folder->kategori . '-ikon.png') ?>">
							</div>
							<div class="text">
								<span>
									<?php echo $sub_folder->judul ?>
								</span>
							</div>
						</div>
					</a>
					<?php endforeach; ?>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('.start-7 .body .left .container .all-posting .box .folder').click(function() {
				var index = $('.start-7 .body .left .container .all-posting .box .folder').index(this);
				var sub = $(this).siblings('.sub-content').eq(index);
				var sub_content = $('.start-7 .body .left .container .all-posting .box .sub-content');
				if (sub.hasClass('aktif')) {
					sub_content.removeClass('aktif');
				} else {
					sub_content.removeClass('aktif');
					sub.addClass('aktif');
				}
			});
		});
	</script>