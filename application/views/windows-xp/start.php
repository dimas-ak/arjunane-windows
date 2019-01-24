<?PHP
$sering_di_kunjungi = $this->dbs->order_by('kunjungan', 'posting', 'desc', 5);
?>
<div class="start-xp stare">
    <div class="body">
	<div class="title">
	    <span>Arjunane User</span>
	</div>
	<div class="container">
	    <div class="left">
		<div class="wrap">
		    <div class="box">
			<?PHP foreach ($sering_di_kunjungi as $sdk): ?>
    			<a class="a" href="<?PHP echo site_url('explorer/posting/' . $sdk->kategori . '/' . $sdk->id . '/') ?>" title="<?PHP echo $sdk->judul ?>">
    			    <div class="content">
    				<div class="icon">
    				    <img src="<?PHP echo photo_ikon($sdk->kategori . '-ikon.png') ?>">
    				</div>
    				<div class="text">
    				    <div class="judul">
    					<span><?PHP echo $sdk->judul ?></span>
    				    </div>
    				    <div class="info">
    					<span><?PHP echo $sdk->kategori ?></span>
    				    </div>
    				</div>
    			    </div>
    			</a>
			<?PHP endforeach; ?>
		    </div>
		    <div class="box-2">
			<div class="all">
			    <div class="text"><span>All Postings</span></div>
			    <div class="icon"><img src="<?PHP echo photo_ikon('right-arrow.png') ?>"></div>
			</div>
		    </div>
		    <?PHP echo $all_post ?>
		</div>
	    </div>
	    <div class="right">
		<div class="wrap">
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
	    </div>
	</div>
	<div class="bottom">
	    <div class="bg">
		<?PHP if (!login_user_arjunane() && !login_admin_arjunane()): ?>
		<div class="content login-akun">
		    <div class="icon login">
			<img src="<?PHP echo photo_ikon('key-white.png') ?>">
		    </div>
		    <div class="text">
			<span>Log-In</span>
		    </div>
		</div>
		<div class="content daftar-akun">
		    <div class="icon daftar">
			<img src="<?PHP echo photo_ikon('account-white.png') ?>">
		    </div>
		    <div class="text">
			<span>Daftar</span>
		    </div>
		</div>
		<?PHP elseif (login_user_arjunane()): ?>
    		<a href="<?PHP echo site_url('user/') ?>">
    		    <div class="content daftar-akun">
    			<div class="icon akun">
    			    <img src="<?PHP echo photo_ikon('setting-start.png') ?>">
    			</div>
    			<div class="text">
    			    <span>Akun Saya</span>
    			</div>
    		    </div>
    		</a>
    		<a href="<?PHP echo site_url('user/log-out/') ?>">
    		    <div class="content daftar-akun">
    			<div class="icon keluar">
    			    <img src="<?PHP echo photo_ikon('log-out-putih.png') ?>">
    			</div>
    			<div class="text">
    			    <span>Keluar</span>
    			</div>
    		    </div>
    		</a>
		<?PHP elseif (login_admin_arjunane()): ?>
		<a href="<?PHP echo site_url('admin/') ?>">
    		    <div class="content daftar-akun">
    			<div class="icon akun">
    			    <img src="<?PHP echo photo_ikon('setting-start.png') ?>">
    			</div>
    			<div class="text">
    			    <span>Akun Saya</span>
    			</div>
    		    </div>
    		</a>
    		<a href="<?PHP echo site_url('admin/log-out/') ?>">
    		    <div class="content daftar-akun">
    			<div class="icon keluar">
    			    <img src="<?PHP echo photo_ikon('log-out-putih.png') ?>">
    			</div>
    			<div class="text">
    			    <span>Keluar</span>
    			</div>
    		    </div>
    		</a>
		<?PHP endif; ?>
	    </div>
	</div>
    </div>
</div>
<script>
    $(document).ready(function () {
	$('.start-xp .body .container .left .box-2 .all').click(function () {
	    var all_posting = $('.start-xp .body .container .left .wrap .all-posting');
	    var text = $(this).find('.text span');
	    var icon = $(this).find('.icon img');
	    if (all_posting.hasClass('aktif')) {
		text.html('All Postings');
		all_posting.removeClass('aktif');
		icon.removeAttr('style');
	    } else {
		text.html('Back');
		all_posting.addClass('aktif');
		icon.css({'transform': 'rotate(180deg)', '-webkit-transform': 'rotate(180deg)'});
	    }
	});
	$('.start-xp').click(function (xxx) {
	    if (!$(xxx.target).is('.start-xp .body *')) {
		$('.start-xp, .start-xp *').removeClass('aktif');
		$('.taskbar-xp .body .icon-start').removeClass('aktif');
		$(".taskbar-xp .body .icon-start img").attr('src', '<?PHP echo photo_ikon('windows-xp.png') ?>');
	    }
	});
    });
</script>
