<?PHP
if ($user_comment['level'] == 'tamvan' && $user_comment['photo'] == NULL) {
    $photo_ = photo_ikon('support-windows.png');
} else if ($user_comment['level'] == 'macho' && $user_comment['photo'] == NULL) {
    $photo_ = photo_ikon('user.png');
} else {
    $photo_ = $user_comment['photo'];
}
$nama_ = $user_comment['nama'];
$level_ = $user_comment['level'] == 'tamvan' ? ' [admin]' : '';
?>
<div class="content">
    <div class="info">
	<div class="photo">
	    <img src="<?PHP echo $photo_ ?>">
	</div>
	<div class="user<?PHP echo $level_ ?>">
	    <span><?PHP echo $nama_ ?>,</span>
	</div>
	<div class="date">
	    <span><?PHP echo format_tanggal($kom->tanggal, TRUE) ?></span>
	</div>
    </div>
    <div class="body">
	<div class="content-comment<?PHP echo $level_ ?>">
	    <pre><?PHP echo htmlentities($kom->keterangan) ?></pre>
	</div>
    </div>
</div>