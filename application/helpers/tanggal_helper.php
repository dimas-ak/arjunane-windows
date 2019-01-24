<?php

if (!defined('BASEPATH')) {
    exit('rika mau ngapa kang? :/');
}
if (!function_exists('format_tanggal')) {

    function format_tanggal($tgl, $mode = NULL, $hari = NULL) {
	if (($mode === TRUE && $hari === TRUE ) || ( $mode === TRUE && $hari === NULL)) {
	    $date_format = 'l, j F Y | H:i';
	    $suffix = 'WIB';
	    if (trim($tgl) == '') {
		$tgl = time();
	    } elseif (!ctype_digit($tgl)) {
		$tgl = strtotime($tgl);
	    }
	    # remove S (st,nd,rd,th) there are no such things in indonesia :p
	    $date_format = preg_replace("/S/", "", $date_format);
	    $pattern = array(
		 '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
		 '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
		 '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
		 '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
		 '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
		 '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
		 '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
		 '/November/', '/December/',
	    );
	    $replace = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
		 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
		 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
		 'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
		 'Oktober', 'November', 'Desember',
	    );
	    $date = date($date_format, $tgl);
	    $date = preg_replace($pattern, $replace, $date);
	    $date = "{$date} {$suffix}";
	    return $date;
	} else if (($mode === FALSE && $hari === TRUE) || ($mode === FALSE && $hari === NULL)) {
	    /*
	      $tanggal = explode(' ', $tgl);
	      $string = explode('-', $tanggal[0]);
	      $bulan = array(
	      '01' => 'Januari',
	      '02' => 'Februari',
	      '03' => 'Maret',
	      '04' => 'April',
	      '05' => 'Mei',
	      '06' => 'Juni',
	      '07' => 'Juli',
	      '08' => 'Agustus',
	      '09' => 'September',
	      '10' => 'Oktober',
	      '11' => 'November',
	      '12' => 'Desember',
	      );
	      return $string[2] . " " . $bulan[$string[1]] . " " . $string[0];
	     */
	    $date_format = 'l, j F Y';
	    $suffix = 'WIB';
	    if (trim($tgl) == '') {
		$tgl = time();
	    } elseif (!ctype_digit($tgl)) {
		$tgl = strtotime($tgl);
	    }
	    # remove S (st,nd,rd,th) there are no such things in indonesia :p
	    $date_format = preg_replace("/S/", "", $date_format);
	    $pattern = array(
		 '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
		 '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
		 '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
		 '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
		 '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
		 '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
		 '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
		 '/November/', '/December/',
	    );
	    $replace = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
		 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
		 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
		 'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
		 'Oktober', 'November', 'Desember',
	    );
	    $date = date($date_format, $tgl);
	    $date = preg_replace($pattern, $replace, $date);
	    $date = "{$date}";
	    return $date;
	} else {
	    $tanggal = explode(' ', $tgl);
	    $string = explode('-', $tanggal[0]);
	    $bulan = array(
		 '01' => 'Januari',
		 '02' => 'Februari',
		 '03' => 'Maret',
		 '04' => 'April',
		 '05' => 'Mei',
		 '06' => 'Juni',
		 '07' => 'Juli',
		 '08' => 'Agustus',
		 '09' => 'September',
		 '10' => 'Oktober',
		 '11' => 'November',
		 '12' => 'Desember',
	    );
	    return $string[2] . " " . $bulan[$string[1]] . " " . $string[0];
	}
    }

}
if (!function_exists('hari')) {

    function hari($tanggal) {
	$date_format = 'l';
	$suffix = 'WIB';
	if (trim($tanggal) == '') {
	    $tanggal = time();
	} elseif (!ctype_digit($tanggal)) {
	    $tanggal = strtotime($tanggal);
	}
	# remove S (st,nd,rd,th) there are no such things in indonesia :p
	$date_format = preg_replace("/S/", "", $date_format);
	$pattern = array(
	     '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
	     '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
	     '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
	     '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
	     '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
	     '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
	     '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
	     '/November/', '/December/',
	);
	$replace = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
	     'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
	     'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
	     'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
	     'Oktober', 'November', 'Desember',
	);
	$date = date($date_format, $tanggal);
	$date = preg_replace($pattern, $replace, $date);
	$date = "{$date}";
	return $date;
    }

}
if (!function_exists('cek_range_tanggal')) {

    function cek_range_tanggal($tgl_awal, $tgl_akhir, $hari = FALSE) {
	$hari === TRUE ? ' Hari' : '';
	$t_awal = new DateTime($tgl_awal);
	$t_akhir = new DateTime($tgl_akhir);
	//return $t_awal->diff($t_akhir)->format('%y years %m months %a days %h hours %i minutes %s seconds');
	$tanggal = $t_awal->diff($t_akhir)->days + 1 . $hari;
	return str_replace(' ', '', $tanggal);
    }

}

if (!function_exists('format_tanggal_multi')) {

    function format_tanggal_multi($tgl_awal, $tgl_akhir = NULL, $hari = FALSE) {
	$hari_format = 'l';
	$tanggal_format = 'j F Y';
	$suffix = 'WIB';
	if (trim($tgl_awal) == '') {
	    $tgl_awal = time();
	    $tgl_akhir = time();
	} elseif (!ctype_digit($tgl_awal)) {
	    $tgl_awal = strtotime($tgl_awal);
	    $tgl_akhir = strtotime($tgl_akhir);
	}
	# remove S (st,nd,rd,th) there are no such things in indonesia :p
	$tanggal_format = preg_replace("/S/", "", $tanggal_format);
	$hari_format = preg_replace("/S/", "", $hari_format);
	$pattern = array(
	     '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
	     '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
	     '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
	     '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
	     '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
	     '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
	     '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
	     '/November/', '/December/',
	);
	$replace = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
	     'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
	     'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
	     'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
	     'Oktober', 'November', 'Desember',
	);
	$date_hari_1 = date($hari_format, $tgl_awal);
	$date_hari_2 = date($hari_format, $tgl_akhir);
	$date_tanggal_1 = date($tanggal_format, $tgl_awal);
	$date_tanggal_2 = date($tanggal_format, $tgl_akhir);
	$hari_1 = preg_replace($pattern, $replace, $date_hari_1);
	$hari_2 = preg_replace($pattern, $replace, $date_hari_2);
	$tanggal_1 = preg_replace($pattern, $replace, $date_tanggal_1);
	$tanggal_2 = preg_replace($pattern, $replace, $date_tanggal_2);
	$date = "{$hari_1}" . " s/d " . "{$hari_2}" . "<br>";
	$date .= "{$tanggal_1}" . " s/d " . "{$tanggal_2}";
	$date2 = "{$hari_1}" . "<br>";
	$date2 .= "{$tanggal_1}";
	if ($tgl_akhir != "0000-00-00") {
	    return $date;
	} else {
	    return $date2;
	}
    }

}

if (!function_exists('format_waktu')) {

    function format_waktu($waktu, $keterangan = NULL) {
	$waktu = explode('-', $waktu);
	$keterangan != NULL ? $keterangan . ' ' : '';
	$output = $keterangan . $waktu[0] . '-' . $waktu[1] . ' WIB';
	$output_2 = $keterangan . $waktu[0] . ' - sampai selesai';
	if (trim($waktu[0]) != '.' && trim($waktu[1]) != '.') {
	    return $output;
	} else if (trim($waktu[0]) != '.' && trim($waktu[1]) == ".") {
	    return $output_2;
	} else {
	    return '';
	}
    }

}
if (!function_exists('format_tanggal_bilangan')) {

    function format_tanggal_bilangan($tgl, $mode_bold = FALSE) {
	$tanggal = explode('-', $tgl);
	$pattern = array(
	     '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
	     '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
	     '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
	     '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
	     '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
	     '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
	     '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
	     '/November/', '/December/',
	);
	$replace = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
	     'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
	     'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
	     'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
	     'Oktober', 'November', 'Desember',
	);
	$bulan = [
	     '01' => 'Januari',
	     '02' => 'Februari',
	     '03' => 'Maret',
	     '04' => 'April',
	     '05' => 'Mei',
	     '06' => 'Juni',
	     '07' => 'Juli',
	     '08' => 'Agustus',
	     '09' => 'September',
	     '10' => 'Oktober',
	     '11' => 'November',
	     '12' => 'Desember',
	];
	$tgl_hari = date('l', strtotime($tgl));
	//$tgl_bulan = date($bulan_format, strtotime($tgl));
	//$t_bulan = str_replace($bulan, $tanggal[1]);
	$t_hari = preg_replace($pattern, $replace, $tgl_hari);
	//$t_bulan = preg_replace($pattern, $replace, $tgl_bulan);
	$output_1 = "{$t_hari}, tanggal " . format_rupiah_bilangan($tanggal[2]) . " bulan {$bulan[$tanggal[1]]} tahun " . format_rupiah_bilangan($tanggal[0]);
	$output_2 = "<b>{$t_hari}</b>, tanggal <b>" . format_rupiah_bilangan($tanggal[2]) . "</b> bulan <b>{$bulan[$tanggal[1]]}</b> tahun <b>" . format_rupiah_bilangan($tanggal[0]) . "</b>";
	if ($mode_bold === FALSE) {
	    return $output_1;
	} else if ($mode_bold === TRUE) {
	    return $output_2;
	}
    }

}

if (!function_exists('format_tanggal_indonesia')) {

    function format_tanggal_indonesia($tanggal, $spasi = TRUE) {
	$tgl = explode(' ', $tanggal);
	if ($tgl) {
	    $tang = explode('-', $tgl[0]);
	    $date = $spasi === TRUE ? $tang[2] . ' - ' . $tang[1] . ' - ' . $tang[0] : $tang[2] . '-' . $tang[1] . '-' . $tang[0];
	    return $date;
	} else {
	    $tang = explode('-', $tanggal);
	    $date = $spasi === TRUE ? $tang[2] . ' - ' . $tang[1] . ' - ' . $tang[0] : $tang[2] . '-' . $tang[1] . '-' . $tang[0];
	    return $date;
	}
    }

}

if (!function_exists('format_tanggal_deadline')) {

    function format_tanggal_deadline($tanggal, $berapa_hari) {
	$tanggal = strtotime("+" . $berapa_hari . " days", strtotime($tanggal));
	return date("Y-m-d", $tanggal);
    }

}