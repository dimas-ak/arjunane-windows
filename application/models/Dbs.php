<?php

defined('BASEPATH') or exit('rika mau ngapa kang? :/');

class Dbs extends CI_Model {

    function __construct() {
	parent::__construct();
    }

    function insert($data, $tabel) {
	return $this->db->insert($tabel, $data);
    }

    function update($field, $value, $data, $table) {
	return $this->db->where($field, $value, TRUE)->update($table, $data);
    }

    function delete($field, $value, $table) {
	return $this->db->where($field, $value, TRUE)->delete($table);
    }

    function num_rows($table) {
	return $this->db->get($table)->num_rows();
    }

    function num_rows_key($field, $value, $table) {
	return $this->db->where($field, $value, TRUE)->get($table)->num_rows();
    }

    function result($table, $limit = NULL, $order_by = NULL, $desc_asc = NULL) {
	if ($limit == NULL && $order_by == NULL) {
	    return $this->db->get($table)->result();
	} else if ($limit == NULL && $order_by != NULL) {
	    $desc_asc == NULL ? 'asc' : $desc_asc;
	    return $this->db->order_by($order_by, $desc_asc)->get($table)->result();
	} else if ($limit != NULL && $order_by == NULL) {
	    return $this->db->limit($limit)->get($table)->result();
	} else if ($limit != NULL && $order_by != NULL) {
	    $desc_asc == NULL ? 'asc' : $desc_asc;
	    return $this->db->limit($limit)->order_by($order_by, $desc_asc)->get($table)->result();
	}
    }

    function result_key($field, $value, $table, $limit = NULL, $order_by = NULL, $desc_asc = NULL) {
	$urut = $desc_asc == NULL ? 'asc' : $desc_asc;
	if ($order_by == NULL && $limit == NULL) {
	    return $this->db->where($field, $value, TRUE)->get($table)->result();
	} else if ($order_by != NULL && $limit == NULL) {
	    return $this->db->where($field, $value, TRUE)->order_by($order_by, $urut)->get($table)->result();
	} else if ($order_by != NULL && $limit != NULL) {
	    return $this->db->where($field, $value, TRUE)->order_by($order_by, $urut)->limit($limit)->get($table)->result();
	} else if ($order_by == NULL && $limit != NULL) {
	    return $this->db->where($field, $value, TRUE)->limit($limit)->get($table)->result();
	}
    }

    function row_array($field, $value, $table) {
	return $this->db->where($field, $value, TRUE)->get($table)->row_array();
    }

    function not_in_row($field, $value, $table) {
	$value = filter_var($value, FILTER_VALIDATE_INT) ? $value : "'$value'";
	return $this->db->where("$field NOT IN ($value)")->get($table)->row_array();
    }

    function not_in_result($field, $value, $table) {
	filter_var($value, FILTER_VALIDATE_INT) ? $value : "'$value'";
	return $this->db->where("$field NOT IN ($value)")->get($table)->result();
    }

    function group_by($field, $table, $action = NULL) {
	$aksi = $action == NULL ? "result" : $action;
	return $this->db->group_by($field, TRUE)->get($table)->$aksi();
    }

    function order_by($field, $table, $asc_desc = NULL, $limit = NULL, $action = NULL) {
	$aksi = $action == NULL ? 'result' : $action;
	$urut = $asc_desc == NULL ? 'ASC' : $asc_desc;
	$data = $limit == NULL ? $this->db->order_by($field, $urut)->get('table')->$aksi() : $this->db->order_by($field, $urut)->limit($limit)->get($table)->$aksi();
	return $data;
    }

    function result_more_key($field, $value, $table) {
	return $this->db->where("$field > $value")->get($table)->result();
    }

    function kategori_id_posting($id, $kategori) {
	return $this->db->where('id', $id, TRUE)->where('kategori', $kategori, TRUE)->get('posting')->row_array();
    }

    function get_file_explorer($kategori, $limit, $halaman, $table, $order_by = NULL, $aksi = NULL) {
	$action = $aksi == NULL ? 'result' : $aksi;
	$sort = $order_by == NULL ? "asc" : $order_by;
	return $this->db->where('kategori', $kategori, TRUE)->limit($limit, $halaman)->order_by('judul', $order_by)->get($table)->$action();
    }

    function get_file_explorer_count($kategori, $table) {
	return $this->db->select('id,kategori, count(id) as total')->where('kategori', $kategori, TRUE)->get($table)->row_array();
    }

    function like_search($halaman, $limit, $search) {
	return $this->db->like('judul', $search, TRUE)->or_like('kategori', $search, TRUE)->limit($halaman, $limit)->order_by('tanggal', 'desc')->get('posting')->result();
    }

    function like_search_count($search) {
	return $this->db->select('id,kategori,judul,tanggal, count(id) as total')->like('judul', $search, TRUE)->or_like('kategori', $search, TRUE)->order_by('tanggal', 'desc')->get('posting')->row_array();
    }

    function komen($id) {
	return $this->db->from('komen')->join('user', 'komen.user = user.id')->where('komen.id_posting', $id, TRUE)->get()->result();
    }

}
