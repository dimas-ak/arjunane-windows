<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth_account
 *
 * @author DIMAS AWANG KUSUMA
 */

defined('BASEPATH') or exit('rika mau ngapa kang? :/');

class Auth_account extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (login_admin_arjunane() || login_user_arjunane()) {
			die();
		}
		$this->load->model('dbs');
	}

	function login() {
		if ($this->input->is_ajax_request()) {
			$check_ip = $this->dbs->row_array('ip_address', $this->input->ip_address(), 'unknown_user');
			set_rules('un', 'Username', 'valid_username|required');
			set_rules('ps', 'Password', 'required');
			set_error_delimiters('<div class="form-error"><span>', '</span></div>');
			set_message('required', '%s harap di isi.');
			if (valid_run() != false) {
				$username = posts('un', TRUE);
				$password = posts('ps', TRUE);
				$user = $this->dbs->row_array('username', $username, 'user');
				if ($user && $password == $this->encryption->decrypt($user['password'])) {
					$encrypt['encrypt'] = $this->encryption->encrypt(acak_string(20));
					if ($user['level'] == 'tamvan') {
						$data = ['admin_arjunane' => $this->encrypt->encode($user['id'])];
						$this->dbs->update('id', $user['id'], $encrypt, 'user');
					} else if ($user['level'] == 'sangar') {
						$data = ['user_arjunane' => $this->encrypt->encode($user['id'])];
						$this->dbs->update('id', $user['id'], $encrypt, 'user');
					}
					$this->session->set_userdata($data);
					$this->session->set_userdata($encrypt);
					echo 'redirect';
				} else {
					if ($check_ip) {
						if ($check_ip['berapa_kali'] > 5) {
							$this->session->set_flashdata('gagal_login', 'aktif');
							echo 'redirect';
						} else {
							$update['time'] = time();
							$update['berapa_kali'] = $check_ip['berapa_kali'] + 1;
							$this->dbs->update('ip_address', $this->input->ip_address(), $update, 'unknown_user');
							echo 'gagal';
						}
					} else {
						$insert['ip_address'] = $this->input->ip_address();
						$insert['time'] = time();
						$insert['berapa_kali'] = 1;
						$this->dbs->insert($insert, 'unknown_user');
						echo 'gagal';
					}
				}
			}
			echo json_encode($this->form_validation->error_array());
		} else {
			die('-=[]=-');
		}
	}

}
