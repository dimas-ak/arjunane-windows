
<?PHP
$last = count($kategori_posting);
if ($method == 'explorer'):
    $no = $this->uri->segment(3);
elseif ($method == 'get'):
    $no = $this->uri->segment(4);
endif;
$total_post = $jumlah_posting + $no;
if ($kategori_posting):
    foreach ($kategori_posting as $post):
	?>
	<tr onclick="location.href = '<?PHP echo site_url('explorer/posting/' . $post->kategori . '/' . $post->id . '/') ?>'">
	    <td><span><?PHP echo $no++ ?></span></td>
	    <td><span><img src="<?PHP echo photo_ikon($post->kategori . '-ikon.png') ?>"><?PHP echo $post->judul ?></span></td>
	    <td><span><?PHP echo format_tanggal_indonesia($post->tanggal, FALSE) ?></span></td>
	    <td><span><?PHP echo $post->kategori ?></span></td>
	    <td><span><?PHP echo $post->kunjungan . ' kali' ?></span>
		<?PHP if ($total['total'] > $total_post && ($no != NULL || $no != 0)): ?>
	    	<input class="<?PHP echo 'get-post' ?>" value="<?PHP echo $mulai + $jumlah_posting ?>" readonly="" style="display:none;">
	    	<input class="<?PHP echo 'post-kategori' ?>" value="<?PHP echo $post->kategori ?>" readonly="" style="display:none;">
		<?PHP endif; ?></td>
	</tr>
	<?PHP
    endforeach;
endif;
?>