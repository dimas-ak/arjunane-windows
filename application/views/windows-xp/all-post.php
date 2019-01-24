<?PHP
$bg_folder = $this->session->userdata('folder') != NULL ? $this->session->userdata('folder') : 'transparan-folder-kuning';
?>
<div class="all-posting">
    <div class="wrapper">
	<?PHP
	foreach ($folder as $folder):
	    ?>
    	<div class="content folder">
    	    <div class="icon">
    		<img src="<?PHP echo photo_ikon($bg_folder . '.png') ?>">
    	    </div>
    	    <div class="text">
    		<span><?PHP echo $folder['group'] ?></span>
    	    </div>
    	</div>
    	<div class="sub-content">
		<?PHP foreach ($folder['post'] as $sub_folder): ?>
		    <a class="a" href="<?PHP echo site_url('explorer/posting/' . $sub_folder->kategori . '/' . $sub_folder->id . '/') ?>" title="<?PHP echo $sub_folder->judul ?>">
			<div class="content">
			    <div class="icon">
				<img src="<?PHP echo photo_ikon($sub_folder->kategori . '-ikon.png') ?>">
			    </div>
			    <div class="text">
				<span><?PHP echo $sub_folder->judul ?></span>
			    </div>
			</div>
		    </a>
		<?PHP endforeach; ?>
    	</div>
	<?PHP endforeach; ?>
    </div>
</div>
<script>
    $(document).ready(function () {
		$('.start-xp .body .container .left .all-posting .wrapper .folder').click(function () {
			var index = $('.start-xp .body .container .left .all-posting .wrapper .folder').index(this);
			var sub = $(this).siblings('.sub-content').eq(index);
			var sub_content = $('.start-xp .body .container .left .all-posting .wrapper .sub-content');
			if (sub.hasClass('aktif')) {
			sub_content.removeClass('aktif');
			} else {
			sub_content.removeClass('aktif');
			sub.addClass('aktif');
			}
		});
    });
</script>