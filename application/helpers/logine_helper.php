<?php

defined('BASEPATH') or exit('rika mau ngapa kang? :/');
if (!function_exists('login_user_arjunane')) {

    function login_user_arjunane() {
	$x = &get_instance();
	return ($x->session->userdata('user_arjunane')) ? true : false;
    }

}
if (!function_exists('login_admin_arjunane')) {

    function login_admin_arjunane() {
	$x = &get_instance();
	return ($x->session->userdata('admin_arjunane')) ? true : false;
    }

}
