<?PHP
$id = str_replace('_', '-', $id_icon);
?>
<div id="<?PHP echo $id ?>" class="icon new aktif" content="<?PHP echo $id ?>">
	<img src="<?PHP echo photo_ikon($photo_icon) ?>">
</div>
<script>
	$(document).ready(function () {
		$('#<?PHP echo $id ?>').click(function () {
			icon_desktop($(this));
		});
	});
</script>
