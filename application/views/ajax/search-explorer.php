<table class="file">
    <thead id="thead-fixed" class="title">
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
	$no = 1;
	$kategori_post = count($kategori_posting);
	foreach ($kategori_posting as $post):
	    ?>
    	<tr onclick="location.href = '<?PHP echo site_url('explorer/posting/' . $post->kategori . '/' . $post->id . '/') ?>'">
    	    <td><span><?PHP echo $no++ ?></span></td>
    	    <td><span><img src="<?PHP echo photo_ikon($post->kategori . '-ikon.png') ?>"><?PHP echo $post->judul ?></span></td>
    	    <td><span><?PHP echo format_tanggal($post->tanggal) ?></span></td>
    	    <td><span><?PHP echo $post->kategori ?>
			<?PHP if ($jumlah_posting == $kategori_post): ?>
			    <input class="<?PHP echo 'post-id' ?>" value="<?PHP echo $jumlah_posting ?>" readonly="" style="display:none;">
			    <input class="<?PHP echo 'post-no' ?>" value="<?PHP echo $kategori_post ?>" readonly="" style="display:none;">
			    <input class="<?PHP echo 'post-kategori' ?>" value="<?PHP echo $post->kategori ?>" readonly="" style="display:none;">
			<?PHP endif; ?>
    		</span></td>
    	    <td><span><?PHP echo $post->kunjungan . ' kali' ?></span></td>
    	</tr>
	<?PHP endforeach; ?>
    </tbody>
</table>
<script id="scroll-asdf">
    $(window).load(function () {
	$('.explorer-item .right._10').on('scroll', function () {
	    var tinggi = 0;
	    $('.explorer-item .right._10 .file .content tr').each(function () {
		tinggi += $(this).outerHeight();
	    });
	    var scroll = $(this).scrollTop();
	    var content = $('.explorer-item .right._10 .file .content');
	    var temu = content.find('#loading-post').length;
	    var xxx = content.find('.post-id');
	    var yyy = content.find('.post-no');
	    var zzz = content.find('.post-kategori');
	    var vvv = content.find('.post-tanggal');
	    $('#scroll-asdf').remove();
	    if (scroll > (tinggi / 2 - $('.explorer .toolbar').outerHeight()) && temu === 0) {
		if (xxx.length === 0 && yyy.length === 0 && zzz.length === 0) {
		    return false;
		}
		console.log(content.find('onclick'));
		var loading = '<tr id="loading-post"><td class="text-center" colspan="5">Sedang di proses ...</td></tr>';
		$.ajax({
		    url: '<?PHP echo site_url('explorer/get-file/') ?>' + xxx.val() + '/' + zzz.val() + '/' + yyy.val() + '/search',
		    cache: false,
		    type: 'POST',
		    beforeSend: function (xhr) {
			content.append(loading);
		    }, success: function (data, textStatus, jqXHR) {
			$('#loading-post').remove();
			xxx.remove();
			yyy.remove();
			zzz.remove();
			content.append(data);
		    }
		});
	    }
	});
    });
</script>