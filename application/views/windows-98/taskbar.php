<?PHP
defined('BASEPATH') or exit('rika mau ngapa kang? :/');
?>
<footer>
    <div class="taskbar-98 taskbare">
	<div class="body">
	    <div class="icon-start">
		<img src="<?PHP echo photo_ikon('windows-98-start.png') ?>">
	    </div>
	    <div id="explorer" content="explorer" class="icon <?PHP echo isset($explorer) ? 'aktif' : '' ?>">
		<img src="<?PHP echo photo_ikon('folder.png') ?>">
	    </div>
	    <div class="right">
		<div id="bahasa" class="info">
		    <span>IND</span>
		</div>
		<div class="info">
		    <span id="hari-ini"></span>
		    <span id="waktu-windows"></span>
		</div>
	    </div>
	</div>
    </div>
    <?PHP echo $start ?>
</footer>
<script>
    $(document).ready(function () {
	$('#bahasa').click(function () {
	    var height_taskbar = $('.taskbare').outerHeight();
	    if ($('.language').hasClass('aktif')) {
		$('.language').removeAttr('style');
		$('.language').removeClass('aktif');
	    } else {
		$('.language').addClass('aktif');
		$('.language').css({'bottom': height_taskbar});
	    }
	});
	$(".taskbar-98 .body .icon-start img").click(function () {
	    var height_taskbar = $('.taskbar-98').outerHeight();
	    var search = $('.start-98 .body .container .left .box-2').outerHeight();
	    if (!$('.start-98').hasClass('aktif')) {
		$('.start-98 .body .left .all-posting').css({'bottom': search});
		$('.start-98').css({'bottom': height_taskbar});
		$('.start-98').addClass('aktif');
		$('.taskbar-98 .body .icon-start img').addClass('aktif');
	    } else {
		$('.start-98').removeAttr('style');
		$('.start-98, .start-98 *').removeClass('aktif');
		$('.taskbar-98 .body .icon-start img').removeClass('aktif');
	    }
	});
    });
</script>