<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Properties
 *
 * @author DIMAS AWANG KUSUMA
 */

defined('BASEPATH') or exit('rika mau ngapa kang ? :/');

class Properties extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('dbs');
		if (!$this->input->is_ajax_request()) {
			die('-=[]=-');
		}
	}

	function display_setting() {
		$data['id_icon'] = 'display_setting';
		$data['photo_icon'] = 'setting-start.png';
		$data['background'] = $this->dbs->result_key('kategori', 1, 'settings', NULL, 'nama');
		$view = [
			  'display_setting' => views('ajax/display-setting', $data, TRUE),
			  'icon' => views('ajax/ajax-icon', $data, TRUE),
		];
		echo json_encode($view);
	}

	function portofolio($search = NULL){
		if($search == NULL){
			$view['view'] = views('ajax/portofolio','',TRUE);
			echo json_encode($view);
		}else{
			$data['detail'] = $this->dbs->row_array('id',$search,'portofolio');
			if(!$data['detail']){
				die('-=[]=-');
			} 
			$view['view'] = views('ajax/portofolio-detail',$data,TRUE);
			echo json_encode($view);
		}
	}

	function info($kategori = NULL) {
		if ($kategori == 'login') {
			$data['id_icon'] = 'info_message';
			$data['photo_icon'] = 'red-x.png';
			$data['judul'] = 'Info Kesalahan';
			$data['keterangan'] = 'Terjadi kesalahan, kemungkinan hal ini terjadi karena anda melakukan Log-In '
					  . 'melebihi batas normal yang sudah ditentukan oleh Arjunane.<br><br> Harap coba Beberapa saat lagi.';
			$view = [
				  'display_setting' => views('ajax/info', $data, TRUE),
				  'icon' => views('ajax/ajax-icon', $data, TRUE),
			];
			echo json_encode($view);
		}
	}

	function change_display($data = NULL, $kategori = NULL) {
		if ($kategori == 'windows') {
			$windows = ['windows-10', 'windows-8', 'windows-7', 'windows-xp', 'windows-98'];
			if (in_array($data, $windows)) {
				$this->session->set_userdata('windows', $data);
			}
			redirect();
		} else if ($kategori == 'folder') {
			$folder = [
				  'transparan-folder-biru',
				  'transparan-folder-hijau',
				  'transparan-folder-hitam',
				  'transparan-folder-kuning',
				  'transparan-folder-merah',
				  'transparan-folder-orange',
				  'transparan-folder-pink',
				  'transparan-folder-ungu',
			];
			if (in_array($data, $folder)) {
				$this->session->set_userdata('folder', $data);
			}
			redirect();
		} else if ($kategori == 'background') {
			$background = $this->dbs->result_key('kategori', 1, 'settings');
			$back = [];
			foreach ($background as $bg) {
				$back[] = $bg->value;
			}
			if (in_array($data, $back)) {
				$this->session->set_userdata('background', $data);
			}
		}
	}

	function view_image($path = NULL, $src = NULL) {
		if ($src != NULL && $this->input->is_ajax_request()) {
			$data['img'] = $src;
			$data['path'] = $path;
			$data['id_icon'] = 'view-image';
			$data['photo_icon'] = 'support-windows.png';
			$view['view'] = views('ajax/display-image', $data, TRUE);
			$view['icon'] = views('ajax/ajax-icon', $data, TRUE);
			echo json_encode($view);
		}
	}

	function view_display($data = NULL) {
		$view = ['large', 'medium', 'small'];
		if (!in_array($data, $view)) {
			$data = NULL;
			$this->session->set_userdata('view-display', $data);
		} else {
			$this->session->set_userdata('view-display', $data);
		}
	}

}