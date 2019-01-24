<?PHP
$bg_folder = $this->session->userdata('folder') != NULL ? $this->session->userdata('folder') : 'transparan-folder-kuning';
$post = [];
?>
<div class="start-98 stare">
    <div class="body">
	<div class="container">
	    <div class="left">
		<div class="text">
		    <span>Windows98</span>
		</div>
	    </div>
	    <div class="right">
		<div class="box border">
		    <div class="content">
			<div class="icon">
			    <img src="<?PHP echo photo_ikon('tentang.png') ?>">
			</div>
			<div class="text">
			    <span>Tentang</span>
			</div>
			</div>
			<a class="afalse a" href="?portofolio=tampil">
				<div class="content">
					<div class="icon">
						<img src="<?PHP echo photo_ikon('portofolio.png') ?>">
					</div>
					<div class="text">
						<span>Portofolio</span>
					</div>
				</div>
			</a>
		</div>
		<div class="box border content-sub">
		    <?PHP
		    foreach ($folder as $f):
			?>
    		    <div class="content sub">
    			<div class="icon">
    			    <img src="<?PHP echo photo_ikon($bg_folder . '.png') ?>">
    			</div>
    			<div class="text">
    			    <span><?PHP echo $f['group'] ?></span>
    			</div>
    		    </div>
			<?PHP 
			endforeach; ?>
		</div>
		<div class="box">
		    <div class="content login-akun">
			<div class="icon">
			    <img src="<?PHP echo photo_ikon('key.png') ?>">
			</div>
			<div class="text">
			    <span>Log-In</span>
			</div>
		    </div>
		    <div class="content daftar-akun">
			<div class="icon">
			    <img src="<?PHP echo photo_ikon('user.png') ?>">
			</div>
			<div class="text">
			    <span>Daftar</span>
			</div>
		    </div>
		</div>
	    </div>

	    <?PHP
	    foreach ($folder as $fd):
		?>
    	    <div class="sub-menu">
		    <?PHP foreach ($fd['post'] as $sf): ?>
			<a class="a" href="<?PHP echo site_url('explorer/posting/' . $sf->kategori . '/' . $sf->id . '/') ?>" title="<?PHP echo $sf->judul ?>">
			    <div class="content">
				<div class="icon">
				    <img src="<?PHP echo photo_ikon($sf->kategori . '-ikon.png') ?>">
				</div>
				<div class="text">
				    <span><?PHP echo $sf->judul ?></span>
				</div>
			    </div>
			</a>
		    <?PHP endforeach; ?>
    	    </div>
	    <?PHP endforeach; ?>
	</div>
    </div>
</div>
<script>
    $(document).ready(function () {
	$('.start-98 .body .right .box .content.sub').click(function (x) {
	    var index = $(this).index(), content = $('.start-98 .body .right .box .content.sub'), sub_menu = $('.start-98 .body .sub-menu'), sub = $('.start-98 .body .sub-menu').eq(index), posisi = $(this).offset(), tinggi = $(this).outerHeight();
	    if ($(x.target).is('.start-98 .body .right .box.content-sub *')) {
		if (sub.hasClass('aktif')) {
		    sub.removeClass('aktif');
		    $(this).removeClass('aktif');
		} else {
		    content.removeClass('aktif');
		    $(this).addClass('aktif');
		    sub_menu.removeClass('aktif');
		    sub.addClass('aktif');
		    sub.css({left: posisi.right, top: posisi.top - tinggi});
		}
		console.log('oke');
	    } else {
		sub_menu.removeClass('aktif');
		console.log('yow');
	    }
	});
	$('.start-98').click(function (xxx) {
	    if (!$(xxx.target).is('.start-98 .body *')) {
		$('.start-98, .start-98 *').removeClass('aktif');
		$('.taskbar-98 .body .icon-start img').removeClass('aktif');
	    }
	});
    });
</script>