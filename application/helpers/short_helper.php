<?php

if (!function_exists('views')) {

    function views($path, $data = NULL, $return = FALSE) {
	$CI = & get_instance();
	return $CI->load->view($path, $data, $return);
    }

}


if (!function_exists('info_gagal')) {

    function info_gagal($teks) {
	return '<div class="info-gagal"><span>' . $teks . '</span></div>';
    }

}

if (!function_exists('info_berhasil')) {

    function info_berhasil($teks) {
	return '<div class="info-berhasil"><span>' . $teks . '</span></div>';
    }

}

if (!function_exists('posts')) {

    function posts($name, $ssx = FALSE) {
	$CI = & get_instance();
	return $CI->input->post($name, $ssx);
    }

}
if (!function_exists('set_rules')) {

    function set_rules($name, $string, $validation) {
	$CI = & get_instance();
	return $CI->form_validation->set_rules($name, $string, $validation);
    }

}
if (!function_exists('set_error_delimiters')) {

    function set_error_delimiters($teks, $teks_2) {
	$CI = & get_instance();
	return $CI->form_validation->set_error_delimiters($teks, $teks_2);
    }

}
if (!function_exists('valid_run')) {

    function valid_run() {
	$CI = & get_instance();
	return $CI->form_validation->run();
    }

}
if (!function_exists('set_message')) {

    function set_message($validation, $text) {
	$CI = & get_instance();
	return $CI->form_validation->set_message($validation, $text);
    }

}
if (!function_exists('lihat_selengkapnya')) {

    function lihat_selengkapnya($teks, $batas, $link = null) {
	$kalimat = strlen($teks);
	if ($kalimat > $batas) {
	    $potong = substr($teks, 0, $batas);
	    if ($link != null) {
		$kalimat = strip_tags(substr($potong, 0, strrpos($potong, ' '))) . ' [... <a href="' . $link . '">Lihat Selengkapnya</a> ...]';
	    } else {
		$kalimat = strip_tags(substr($potong, 0, strrpos($potong, ' '))) . ' [...]';
	    }
	} else {
	    if ($link != null) {
		$kalimat = strip_tags($teks) . ' [... <a href="' . $link . '">Lihat Selengkapnya</a> ...]';
	    } else {
		$kalimat = strip_tags($teks);
	    }
	}
	return $kalimat;
    }

}
if (!function_exists('acak_string')) {

    function acak_string($panjang = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $panjang; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
    }

}
