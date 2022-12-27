<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_model extends CI_Model
{
	function data($q)
	{
		$this->db->from('tb_mitra');
		$this->db->group_start();
		$this->db->like('nama_mitra', $q);
		$this->db->or_like('alamat', $q);
		$this->db->or_like('no_telp', $q);
		$this->db->group_end();
	}
	function jumlah_data($q = null)
	{
		$this->data($q);
		return $this->db->count_all_results();
	}
	function limit_data($limit, $start = 0, $q = NULL)
	{
		$this->data($q);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	function get_by_id_row($id = NULL)
	{
		$this->db->where('id_mitra', $id);
		return $this->db->get('tb_mitra')->row();
	}
}

/* End of file Mitra_model.php */
