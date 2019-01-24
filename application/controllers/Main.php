<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author DIMAS AWANG KUSUMA
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('dbs');
		$this->load->helper('breadcrumb');
	}

	protected function _menu($judul, $html, $footer = NULl, $data_explorer = []) {
		if (login_admin_arjunane()) {
			$j['user'] = $this->dbs->row_array('id', $this->encrypt->decode($this->session->userdata('admin_arjunane')), 'user');
		} else if (login_user_arjunane()) {
			$j['user'] = $this->dbs->row_array('id', $this->encrypt->decode($this->session->userdata('user_arjunane')), 'user');
		} else {
			$j['user'] = NULL;
		}
		$j['judul'] = $judul;
		$view['aset'] = views('aset/aset', $j, TRUE);
		$view['section'] = $html;
		if ($this->session->userdata('windows') == 'windows-10' || !$this->session->userdata('windows')) {
			$data['w10'] = $this->_w10();
			$v2['all_post'] = views('aset/start-all-posting', $data, TRUE);
			$v1['start'] = views('aset/start', array_merge($j, $v2), TRUE);
			$view['footer'] = $footer == NULL ? views('aset/taskbar', $v1, TRUE) : $footer;
		} else if ($this->session->userdata('windows') == 'windows-8') {
			$view['footer'] = $footer == NULL ? views('windows-8/taskbar', $data_explorer, TRUE) : $footer;
			$data['w8'] = $this->_w();
			$view['start_8'] = views('windows-8/start', array_merge($j, $data), TRUE);
		} else if ($this->session->userdata('windows') == 'windows-7') {

			$data_ap['folder'] = $this->_w();
			$all_post['all_post'] = $this->load->view('windows-7/all-post',$data_ap, TRUE);

			$data_start['sering_di_kunjungi'] = $this->dbs->order_by('kunjungan', 'posting', 'desc', 5);
			$start['start'] = views('windows-7/start', array_merge($data_start, $all_post), TRUE);

			$view['footer'] = $footer == NULL ? views('windows-7/taskbar', array_merge($j,$start,$data_explorer), TRUE) : $footer;
		} else if ($this->session->userdata('windows') == 'windows-xp') {

			$data_ap['folder'] = $this->_w();
			$all_post['all_post'] = $this->load->view('windows-xp/all-post',$data_ap, TRUE);

			$data_start['sering_di_kunjungi'] = $this->dbs->order_by('kunjungan', 'posting', 'desc', 5);
			$start['start'] = views('windows-xp/start', array_merge($data_start, $all_post), TRUE);

			$view['footer'] = $footer == NULL ? views('windows-xp/taskbar', array_merge($j,$start,$data_explorer), TRUE) : $footer;
		} else if ($this->session->userdata('windows') == 'windows-98') {

			$data['folder'] = $this->_w(5);
			$start['start'] = views('windows-98/start', $data, TRUE);

			$view['footer'] = $footer == NULL ? views('windows-98/taskbar', array_merge($data_explorer, $start), TRUE) : $footer;
		} else {
			die('-=[]=-');
		}
		views('menu', $view);
	}

	public function index() {
		$judul = 'Menu Utama';
		$data['posting'] = $this->dbs->group_by('kategori', 'posting');
		$html = views('menu-utama', $data, TRUE);
		$this->_menu($judul, $html);
	}

	protected function _w10()
	{
		$data = [];
		for ($alpha = 'a'; $alpha < 'z'; $alpha++) {
			$post = $this->db->where("judul LIKE '$alpha%'")->limit(5)->order_by('RAND()')->get('posting')->result();
			if ($post):
				$data[] = 
					['data' => 
						[
							'huruf' => $alpha,
							'post' => $post
						]
				];
			endif; 
		}
		return array_column($data, 'data');
	}

	protected function _w($limit = null)
	{
		$data = [];
		$limit = $limit == null ? 15 : $limit;
		$group = $this->db->group_by('kategori')->get('posting')->result();
		foreach($group as $g)
		{
			$post = $this->db->where('kategori', $g->kategori, TRUE)->limit($limit)->get('posting')->result();
			if($post)
			{
				$data[] = 
					['data' => 
						[
							'group' => $g->kategori,
							'post' => $post
						]
				];
			}
		}
		return array_column($data, 'data');
	}

	function explorer() 
	{
		if ($this->input->is_ajax_request()) {
			$data['kategori'] = 'index';
			$data['posting'] = $this->dbs->group_by('kategori', 'posting');
			$view['view'] = $this->load->view('ajax/explorer', $data, TRUE);
			$view['title'] = 'Menu Explorer';
			echo json_encode($view);
		} else {
			$data['kategori'] = 'index';
			$data['posting'] = $this->dbs->group_by('kategori', 'posting');
			$judul = 'Menu Explorer';
			$data['explorer'] = $this->load->view('ajax/explorer', $data, TRUE);
			$html = views('menu-utama', $data, TRUE);
			$this->_menu($judul, $html, null, $data);
		}
	}

	function get_file($mulai = NULL, $kategori = NULL) 
	{
		if ($this->input->is_ajax_request()) {
			$group = $this->dbs->group_by('kategori', 'posting');
			$grup = [];
			foreach ($group as $group) {
				$grup[] = $group->kategori;
			}
			if (filter_var($mulai, FILTER_VALIDATE_INT) && $mulai != NULL && in_array($kategori, $grup)) {
				$halaman = 30;
				$mulai = ($mulai != NULL || $mulai != 0) ? $mulai : 0;
				$data['jumlah_posting'] = $halaman;
				$data['method'] = 'explorer';
				$data['mulai'] = $mulai;
				$data['kategori_posting'] = $this->dbs->get_file_explorer($kategori, $halaman, $mulai, 'posting', 'asc');
				$data['total'] = $this->dbs->get_file_explorer_count($kategori, 'posting');
				if ($data['kategori_posting']) {
					$view['view'] = views('ajax/explorer-konten', $data, TRUE);
					echo json_encode($view);
				}
			}
		}
	}

	function comment($kategori, $id_post) 
	{
		set_rules('com', 'Komentar', 'required');
		set_rules('sec', 'Captcha', 'required');
		set_error_delimiters('<div class="form-error" id="tutup-info"></span>', '</span></div>');
		set_message('required', '%s harap di isi.');
		if (valid_run() != false) {
			$check_id_post = $this->dbs->kategori_id_posting($id_post, $kategori);
			if ($check_id_post) {
				if ($this->session->userdata('mycaptcha') != posts('sec', true)) {
					$this->session->set_flashdata('gagal', info_gagal('Captcha yang anda masukkan salah.'));
					redirect('explorer/posting/' . $check_id_post['kategori'] . '/' . $check_id_post['id'] . '/');
				}
				$komentar['keterangan'] = posts('com', TRUE);
				$komentar['id_posting'] = $check_id_post['id'];
				$komentar['tanggal'] = date('Y-m-d H:i:s');
				$komentar['user'] = $this->user()['id'];
				$komentar['child_komen'] = 0;
				$simpan = $this->dbs->insert($komentar, 'komen');
				!$simpan ? $this->session->set_flashdata('gagal', info_gagal('Terjadi kesalahan, data tidak dapat di simpan')) : '';
				redirect('explorer/posting/' . $check_id_post['kategori'] . '/' . $check_id_post['id'] . '/');
			} else {
				redirect('explorer/');
			}
		}
		$this->posting($kategori, $id_post);
	}

	function search($metod = NULL, $mulai = NULL, $get = NULL) 
	{
		if ($metod == NULL && $mulai == NULL && $get == NULL) {
			if ($this->input->get('search', TRUE) == NULL) {
				redirect('explorer/');
			}
			$data['search'] = $this->input->get('search', TRUE);
			$data['jumlah_posting'] = 30;
			$data['kategori_posting'] = $this->dbs->like_search($data['jumlah_posting'], 30, $this->input->get('search', TRUE));
			$data['kategori'] = 'post-search';
			$data['user'] = $this->user();
			$data['posting'] = $this->dbs->group_by('kategori', 'posting');
			$judul = 'Menu Explorer | Pencarian';
			$data['explorer'] = $this->load->view('ajax/explorer', $data, TRUE);
			$html = views('menu-utama', $data, TRUE);
			$this->_menu($judul, $html, null, $data);
		} else if ($metod == 'get' && $mulai != 'undefined' && $mulai != NULL && filter_var($mulai, FILTER_VALIDATE_INT) && $get != NULL) {
			$halaman = 30;
			$mulai = ($mulai != NULL || $mulai != 0) ? $mulai : 0;
			$data['jumlah_posting'] = $halaman;
			$data['mulai'] = $mulai;
			$data['method'] = 'get';
			$data['kategori_posting'] = $this->dbs->like_search($data['jumlah_posting'], 30, $get);
			$data['total'] = $this->dbs->like_search_count($get);
			if ($data['kategori_posting'] && count($data['kategori_posting']) > 0) {
				$view['view'] = views('ajax/explorer-konten', $data, TRUE);
				echo json_encode($view);
			}
		}
	}

	function posting($kategori = NULL, $id = NULL) 
	{
		if ($kategori != NULL && $id == NULL) {
			$data['jumlah_posting'] = 30;
			$data['kategori_posting'] = $this->dbs->result_key('kategori', $kategori, 'posting', $data['jumlah_posting'], 'judul', 'asc');
			if ($this->input->is_ajax_request()) {
				if ($data['kategori_posting']) {
					$data['kategori'] = 'post-kategori';
					$data['user'] = $this->user();
					$data['posting'] = $this->dbs->group_by('kategori', 'posting');
					$judul = 'Menu Explorer | Kategori ' . ucwords($kategori);
					$view['view'] = $this->load->view('ajax/explorer-right-contents', $data, TRUE);
					$view['title'] = $judul;
					echo json_encode($view);
				}
			} else {
				if ($data['kategori_posting']) {
					$data['kategori'] = 'post-kategori';
					$data['posting'] = $this->dbs->group_by('kategori', 'posting');
					$judul = 'Menu Explorer | Kategori ' . ucwords($kategori);
					$data['explorer'] = $this->load->view('ajax/explorer', $data, TRUE);
					$html = views('menu-utama', $data, TRUE);
					$this->_menu($judul, $html, null, $data);
				} else {
					redirect('explorer/');
				}
			}
		} else if ($kategori != NULL && $id != NULL) {
			$data['detail'] = $this->dbs->kategori_id_posting($id, $kategori);
			if ($data['detail']) {
				$this->load->helper('captcha');

				$vals = [
					  'img_path' => './captcha/',
					  'img_url' => base_url() . 'captcha/',
					  'img_width' => '200',
					  'img_height' => 30,
					  'border' => 0,
					  'expiration' => 7200
				];

				$cap = create_captcha($vals);
				$this->session->set_userdata('mycaptcha', $cap['word']);

				$data['image'] = $cap['image'];
				$data['komentar'] = $this->dbs->komen($data['detail']['id']);
				$data['jumlah_komentar'] = $this->db->select('*, COUNT(id) as total')->where('id_posting', $data['detail']['id'], TRUE)->get('komen')->row()->total;
				$data['kategori'] = 'post-detail';
				$data['posting'] = $this->dbs->group_by('kategori', 'posting');
				$judul = 'Menu Explorer | Kategori ' . ucwords($kategori) . ' | ' . $data['detail']['judul'];
				$data['explorer'] = $this->load->view('ajax/explorer', $data, TRUE);
				$html = views('menu-utama', $data, TRUE);
				$this->_menu($judul, $html, null, $data);
			} else {
				redirect('explorer/');
			}
		} else {
			redirect('explorer/');
		}
	}
}
