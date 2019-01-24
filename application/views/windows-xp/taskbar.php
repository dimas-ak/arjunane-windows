<?PHP
defined('BASEPATH') or exit('rika mau ngapa kang? :/');
$data['user'] = $user;
?>
<footer>
    <div class="taskbar-xp taskbare">
	<div class="body">
	    <div class="icon-start">
		<img src="<?PHP echo photo_ikon('windows-xp.png') ?>">
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
	$(".taskbar-xp .body .icon-start img").mouseenter(function () {
	    if (!$('.taskbar-xp .body .icon-start').hasClass('aktif')) {
		$(this).attr('src', '<?PHP echo photo_ikon('windows-xp-2.png') ?>');
		$('.taskbar-xp .body .icon-start').css('background', '#206121');
	    }
	});
	$(".taskbar-xp .body .icon-start img").mouseleave(function () {
	    if (!$('.taskbar-xp .body .icon-start').hasClass('aktif')) {
		$('.taskbar-xp .body .icon-start').removeAttr('style');
		$(this).attr('src', '<?PHP echo photo_ikon('windows-xp.png') ?>');
	    }
	});


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
	$(".taskbar-xp .body .icon-start img").click(function () {
	    var height_taskbar = $('.taskbar-xp').outerHeight();
	    var search = $('.start-xp .body .container .left .box-2').outerHeight();
	    if (!$('.start-xp').hasClass('aktif')) {
		$('.start-xp .body .left .all-posting').css({'bottom': search});
		$('.start-xp').css({'bottom': height_taskbar});
		$('.start-xp').addClass('aktif');
		$('.taskbar-xp .body .icon-start').addClass('aktif');
		$(".taskbar-xp .body .icon-start img").attr('src', '<?PHP echo photo_ikon('windows-xp-2.png') ?>');
	    } else {
		$('.start-xp').removeAttr('style');
		$('.start-xp, .start-xp *').removeClass('aktif');
		$('.taskbar-xp .body .icon-start').removeClass('aktif');
		$(".taskbar-xp .body .icon-start img").attr('src', '<?PHP echo photo_ikon('windows-xp.png') ?>');
	    }
	});
    });
</script>