<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobil_model extends CI_Model
{
	function data($q)
	{
		$this->db->from('tb_mobil');
		$this->db->group_start();
		$this->db->like('kode_tipe', $q);
		$this->db->or_like('merk', $q);
		$this->db->or_like('no_plat', $q);
		$this->db->or_like('warna', $q);
		$this->db->or_like('tahun', $q);
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
		$this->db->where('id_mobil', $id);
		return $this->db->get('tb_mobil')->row();
	}
}

/* End of file Mobil_model.php */
