<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author DIMAS AWANG KUSUMA
 */

defined('BASEPATH') or exit('rika mau ngapa kang? :/');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('dbs');
		if (!login_user_arjunane()) {
			redirect();
		} else if (login_user_arjunane()) {
			$check = $this->dbs->row_array('id', $this->session->userdata('user_arjunane'), 'user');
			$encrypt_sess = $this->encrypt->decode($this->session->userdata('encrypt'));
			$encrypt_data = $this->encrypt->decode($check['encrypt']);
			if ($encrypt_data != $encrypt_data) {
				redirect();
			}
		}
	}

	protected function user() {
		return $this->dbs->row_array('id', $this->session->userdata('user_arjunane'), 'user');
	}

	protected function menu($judul, $menu, $navigation = FALSE) {
		$title['judul'] = $judul;
		$view['aset'] = views('user/aset/aset', $title, TRUE);
		$view['header'] = views('user/aset/header', $title, TRUE);
		$view['navigation'] = $navigation === TRUE ? views('user/aset/navigation', '', TRUE) : NULL;
		$view['section'] = $menu;
		views('user/menu', $view);
	}

	function index() {
		$data['user'] = $this->user();
		$judul = 'Menu User ' . $data['user']['nama'];
		$menu = views('user/beranda', $data, TRUE);
		$this->menu($judul, $menu);
	}

	function log_out() {
		$this->session->unset_userdata('user_arjunane', 'encrypt');
		redirect();
	}

}
