<div class="alert-info">
    <div class="body">
	<div class="container">
	    <div class="title">
		<span><?PHP echo $judul ?></span>
		<div class="close tutup-alert">
		    <span>X</span>
		</div>
	    </div>
	    <div class="message">
		<div class="icon">
		    <img src="<?PHP echo photo_ikon($photo_icon) ?>">
		</div>
		<div class="text">
		    <span><?PHP echo $keterangan ?></span>
		</div>
	    </div>
	    <div class="action">
		<button class="tutup-alert">OK</button>
	    </div>
	</div>
    </div>
    <script>
	$(document).ready(function () {
	    $('.tutup-alert').click(function () {
		$('.alert-info').remove();
		$('#<?PHP echo str_replace('_', '-', $id_icon)  ?>').remove();
	    });
	    var taskbar = $('.taskbare').outerHeight();
	    $('.alert-info').css('bottom', taskbar);
	});
    </script>
</div>
