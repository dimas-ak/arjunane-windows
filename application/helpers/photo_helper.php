<?php

defined('BASEPATH') or exit('rika mau ngapa kang? :/');


if (!function_exists('photo_ikon')) {

	function photo_ikon($strong) {
		$X = & get_instance();
		return $X->config->base_url() . 'aset/photo/ikon/' . $strong;
	}

}

if (!function_exists('photo_posting')) {

	function photo_posting($strong) {
		$X = & get_instance();
		return $X->config->base_url() . 'aset/photo/posting/' . $strong;
	}

}

if (!function_exists('photo_portofolio')) {

	function photo_portofolio($strong) {
		$X = & get_instance();
		return $X->config->base_url() . 'aset/photo/portofolio/' . $strong;
	}

}

if (!function_exists('photo_user')) {

	function photo_user($strong) {
		$X = & get_instance();
		return $X->config->base_url() . 'aset/photo/user/' . $strong;
	}

}