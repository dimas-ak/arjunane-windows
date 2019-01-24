<html>
    <head>
	<meta charset="utf-8">
	<title><?php echo "-=[ 404 ]=-" ?></title>
	<script src="<?PHP echo site_url('aset/js/jquery-1.7.js') ?>" type="text/javascript"></script>
	<?PHP echo link_tag('aset/css/arjunane-v3.css?' . acak_string()); ?>
    </head>
    <body>
	<style scoped="">
	    body{
		margin:0;
		background: #0055ff;
		color: #FFF;
		padding: 150px 250px;
	    }
	    a{
		color: #FFF;
		cursor: pointer;
	    }
	    a:hover{
		border-bottom: 1px solid #FFF;
	    }
	    .font-gedhe{
		font-size: 5em;
		display: block;
		margin-bottom: 10px;
	    }
	    .isi-teks{
		font-size: .85em;
		margin-bottom: 10px;
		display: block;
	    }
	    @media only screen and (max-width: 1000px){
		body{
		    padding: 150px 100px;
		}
	    }
	    @media only screen and (max-width: 720px){
		body{
		    padding: 100px 50px;
		}
	    }
	</style>
	<div class="font-gedhe">
	    <span>:(</span>
	</div>
	<div class="isi-teks">
	    <span>The requested URL / Orkut was not found on this server, and now it need to refresh. Click on <a onclick="linkMundur()">here</a> to go back to previous page.</span>
	</div>
	<div class="isi-teks" style="font-size:.7em;color: #999;">
	    <span>You can search for the error online: <a style="color: #999;" href="https://www.google.co.id/?q=404+not+found">404 Not Found</a></span>
	</div>
	<div class="isi-teks" style="margin-top: 50px;">
	    <span id="hitung"></span>
	</div>
	<script>
	    function linkMundur() {
		window.history.back();
	    }
	    var count = 10;
	    var countdown = setInterval(function () {
		$("#hitung").html("It'll refresh in " + count);
		if (count === 0) {
		    clearInterval(countdown);
		    window.open('<?PHP echo site_url() ?>', "_self");

		}
		count--;
	    }, 1000);
	</script>
    </body>
</html>
