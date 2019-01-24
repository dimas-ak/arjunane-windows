<?PHP
defined('BASEPATH') or exit('rika mau ngapa kang? :/');
?>
<footer>
    <div class="taskbar-7 taskbare">
		<div class="content">
			<div class="icon-start">
				<img src="<?PHP echo photo_ikon('windows-7-start.png') ?>">
			</div>
			<div class="wrap">
				<div class="body">
					<div id="explorer" content="explorer" class="icon <?PHP echo isset($explorer) ? 'aktif' : '' ?>">
						<img src="<?PHP echo photo_ikon('folder.png') ?>">
					</div>
					<div class="right">
						<div id="bahasa" class="info">
							<span>IND</span>
						</div>
						<div class="info text-center" style="padding:0 7.5px;">
							<span id="waktu-windows"></span><br>
							<span id="hari-ini"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <?PHP echo $start ?>
    <script>
	$(document).ready(function () {
	    var dino = new Date();
	    var hari = dino.getDay();
	    var bulan = dino.getMonth();
	    var tahun = dino.getFullYear();
	    document.getElementById("hari-ini").innerHTML = hari + "/" + bulan + '/' + tahun;
	    $(".taskbar-7 .content .icon-start img").mouseenter(function () {
		if (!$('.taskbar-7 .content .icon-start').hasClass('aktif')) {
		    $(this).attr('src', '<?PHP echo photo_ikon('windows-7-start-2.png') ?>');
		}
	    });
	    $(".taskbar-7 .content .icon-start img").mouseleave(function () {
		if (!$('.taskbar-7 .content .icon-start').hasClass('aktif')) {
		    $(this).attr('src', '<?PHP echo photo_ikon('windows-7-start.png') ?>');
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
	    $(".taskbar-7 .content .icon-start img").click(function () {
		var height_taskbar = $('.taskbar-7').outerHeight();
		var search = $('.start-7 .body .left .container .box-2').outerHeight();
		if (!$('.start-7').hasClass('aktif')) {
		    $('.start-7 .body .left .all-posting').css({'bottom': search});
		    $('.start-7').css({'bottom': height_taskbar});
		    $('.start-7').addClass('aktif');
		    $('.taskbar-7 .content .icon-start').addClass('aktif');
		    $(".taskbar-7 .content .icon-start img").attr('src', '<?PHP echo photo_ikon('windows-7-start-2.png') ?>');
		} else {
		    $('.start-7').removeAttr('style');
		    $('.start-7, .start-7 *').removeClass('aktif');
		    $('.taskbar-7 .content .icon-start').removeClass('aktif');
		    $(".taskbar-7 .content .icon-start img").attr('src', '<?PHP echo photo_ikon('windows-7-start.png') ?>');
		}
	    });
	});
    </script>
</footer>