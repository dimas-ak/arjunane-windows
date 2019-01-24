<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<!DOCTYPE html>
<!-- 
-=[ WIP ]=-
-->
<html>
    <?PHP echo $aset; ?>
    <body>
	<?PHP
	views('language');
	views('mouse-click');
	if (!login_admin_arjunane() && !login_user_arjunane()) {
	    views('login');
	    views('daftar');
	}
	echo $section;
	echo $footer;
	echo isset($start_8) ? $start_8 : '';
	?>
    </body
</html>