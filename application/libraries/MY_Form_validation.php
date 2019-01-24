<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    protected $CI;

    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
    }

    function validDate($date) {
        $this->CI->form_validation->set_message('validDate', ' %s is not in correct date format');

        $d = DateTime::createFromFormat('d-M-Y', $date);
        if ($d && $d->format('d-M-Y') == $date)
            return TRUE;

        return FALSE;
    }

	function valid_username($str) {
        $this->CI->form_validation->set_message('valid_username', 'Format %s tidak sesuai.');
        if (!preg_match('/^[a-z_0-9]+$/i', $str)) {
            return false;
        }
    }
	
    function validasi_nama($str) {
        $this->CI->form_validation->set_message('validasi_nama', 'Format %s tidak sesuai.');
        if (!preg_match('/^[a-z ]+$/i', $str)) {
            return false;
        }
    }

    function validasi_alpha_angka($str) {
        $this->CI->form_validation->set_message('validasi_alpha_angka', 'Format %s tidak sesuai.');
        if (!preg_match('/^[a-z0-9 ]+$/i', $str)) {
            return false;
        }
    }

    function validasi_plat($str) {
        $this->CI->form_validation->set_message('validasi_plat', 'Format untuk %s tidak sesuai.');
        if (!preg_match('/[^a-z{1} \d{4}]/i', $str)) {
            return false;
        }
    }

    function validasi_telephon($string) {
        $telephon = ['0811', '0812', '0813', '0821', '0812', '0822', '0823', '0812', '0852', '0853', '0851', '0855',  '0856',  '0857',  '0858',  '0814',  '0815',  '0816',  '0817', '0818','0819', '0859', '0877','0878','0896','0897','0898','0899','0881', '0882', '0883', '0884', '0885', '0886', '0887', '0888', '0889', '0828', '0868'];
        $this->CI->form_validation->set_message('validasi_telephon', 'Format %s tidak sesuai.');
        $explodo = '/('.implode('|', $telephon).')/i';
        if (!preg_match($explodo, $string)) {
            return false;
        }
    }

}
