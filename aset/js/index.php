<?PHP ?>
<!DOCTYPE html>
<html>
    <head>
	<title title="-=[Not Boleh]=-">-=[Not Boleh]=-</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<script id="sadf089">
<?PHP
$whitelist = array(
     '127.0.0.1',
     '::1'
);
$yow = FALSE;
if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    $yow = TRUE;
}
?>
	    function back() {
		var bu = window.location.origin;
		var path = window.location.pathname.split('/');
<?PHP if ($yow === TRUE): ?>
    		var base_url = bu + '/' + path[1];
<?PHP else: ?>
    		var base_url = bu;
<?PHP endif; ?>
		return window.location.href = base_url;
	    }
	    window.onload = function () {
		var url = window.location.href;
		document.getElementById("header").innerHTML = url;
		document.getElementById('sadf089').innerHTML = "";
		if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
		    alert("It's a local server!");
		}
		//console.log(base_url + '/' + path[1]);
		document.getElementById("info").innerHTML = 'Jendela cannot access ' + url;
		document.getElementById("info2").innerHTML = 'You do not have permission to access ' + url + '. Contact administrator development to request access.';
		document.getElementById("info3").innerHTML = 'Click here to go back to base URL : <span onclick="back()">Back</span>';
		document.getElementById("info4").innerHTML = 'To close this tab, press : CTRL + W';
	    }
	</script>
	<style>
	    ::selection { background-color: #FFF;color:#ff00cc }
	    ::-moz-selection { background-color: #FFF;color:#ff00cc}
	    ::-webkit-selection{background:#FFF;color:#ff00cc}
	    html,body{width:100%;height:100%;margin:0;padding:0;background:#000}
	    @font-face{src: url('font/windows_command_prompt.ttf') format('ttf');font-family: 'wcp';}
	    @font-face{src: url('font/SEGOEUI.TTF') format('ttf');font-family: 'Segoe'}
	    *{cursor: default;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-o-box-sizing: border-box;-khtml-box-sizing: border-box;resize: none;letter-spacing: 0.2px;box-sizing: border-box;}
	    header{font-family: "Segoe",serif;width:100%;color:#eeeeee;text-align: center;padding:10px;font-size: 12pt;border-bottom:1px solid #111}
	    section{font-family: "wcp",serif;width:100%;color:#00ff00;padding:10px;font-size: 13pt;}
	    section > .panel{width:100%;margin-bottom:20px;}
	    section > .panel > .panel_deep{margin:10px 0 0 50px;}
	</style>
    </head>
    <body>
	<header>
	    <span id="header"></span>
	</header>
	<section>
	    <div class="panel">
		<span>Jendela</span>
		<div class="panel_deep">
		    <span id="info"></span>
		</div>
		<div class="panel_deep">
		    <span id="info2"></span>
		</div>
	    </div>
	    <div class="panel">
		<span>Info</span>
		<div class="panel_deep">
		    <span id="info3"></span>
		</div>
		<div class="panel_deep">
		    <span id="info4"></span>
		</div>
	    </div>
	</section>
    </body>
</html>