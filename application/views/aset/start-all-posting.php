<?PHP ?>
<div id="content-all-posting" class="body-left list">
	<div class="body-panel">
		<div id="back-navigation" class="content">
			<img src="<?PHP echo photo_ikon('back-start.png') ?>">
			<span>Kembali</span>
		</div>
	</div>
	<div class="wrap">
		<?PHP
		// foreach($hasil as $h => $key)
		// {
		// 	echo $key['huruf'] . '<br>';
		// 	foreach($key['post'] as $post)
		// 	{
		// 		echo $post->judul . '<br>';
		// 	}
		// 	echo  '<br><br>';
		// }
		foreach($w10 as $w10):
				?>
			<div class="navigation">
				<div class="title">
					<span><?PHP echo strtoupper($w10['huruf']) ?></span>
				</div>
				<?PHP foreach ($w10['post'] as $post): ?>
					<a href="<?PHP echo site_url('explorer/posting/' . $post->kategori . '/' . $post->id . '/') ?>">
						<div class="content">
							<img src="<?PHP echo photo_ikon($post->kategori . '-ikon.png') ?>">
							<span><?PHP echo $post->judul ?></span>
						</div>
					</a>
				<?PHP endforeach; ?>
			</div>
		<?PHP endforeach; ?>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#back-navigation').click(function () {
			$('#navigation').addClass('aktif');
			$('.start .body-right').addClass('aktif');
			$('.start .body').addClass('aktif');
			$('#content-all-posting').removeClass('aktif');
		});
	});
</script>
