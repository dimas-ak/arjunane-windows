<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <?php 
    $base_url = load_class('Config')->config['base_url'];
    ?>
    <head>
	<meta charset="utf-8">
	<title>-=[ Error ]=-</title>
	<style type="text/css">

	    ::selection { background-color: #E13300; color: white; }
	    ::-moz-selection { background-color: #E13300; color: white; }
	    html{
		width: 100%;
		height: 100%;
	    }
	    body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	    }

	    a {
		color: #EEE;
		background-color: transparent;
		font-weight: normal;
	    }

	    h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	    }

	    code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	    }

	    #container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	    }

	    p {
		margin: 12px 15px 12px 15px;
	    }
	    a{
		text-decoration: none;
		-webkit-transition: .5s;
		-moz-transition: .5s;
		-o-transition: .5s;
		transition: .5s;
	    }
	    a:hover{
		color: #E13300;
	    }
	    body,#awak{
		font-family: Courier New;
		margin: 0;
		padding: 10px;
		width: 100%;
		font-size: 1em;
		height: 100%;
		position: relative;
		overflow: hidden;
		color: #FFF;
		background: #000099;
	    }
	</style>
    </head>
    <body>
	<div id="awak">
	    <p>A problem has been detected and system has been blocking the URL.</p>
	    <p>BAD_URL_CONFIG_INFO</p>
	    <p>If this is the first time you've seen this error screen, you can click on <a href="<?php echo $base_url ?>">here.</a> If this screen appears again, follow these steps:</p>
	    <br>
	    <p>Check URL that you entered on this page, make sure you don't entered something : <b>' or " or [ or ] , etc</b>.</p>
	    <p>If problems continue, close this tab or you can click on <a href="<?php echo $base_url ?>">here.</a></p>
	    <p>Technical information:</p>
	    <p>*** STOP: 541245008 (P4NJ1xM4NU514, M1L3N1UM, 54R45x008)</p>
	    <p>Contact system administrator or technical support group for further assistance.</p>
	</div>
	<!--
	    -=[ PERINGATAN ]=-
	    <div id="container">
		    <h1><?php echo $heading; ?></h1>
	<?php echo $message; ?>
	    </div>
	-->
    </body>
</html>