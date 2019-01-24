<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author DIMAS AWANG KUSUMA
 */

defined('BASEPATH') or exit('rika mau ngapa kang? :/');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('dbs');
	}

	function log_out() {
		$this->session->unset_userdata('admin_arjunane', 'encrypt');
		redirect();
	}

}
