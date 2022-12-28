<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobil_model extends CI_Model
{
	function data($q)
	{
		$this->db->from('tb_mobil');
		$this->db->group_start();
		$this->db->like('nama_tipe', $q);
		$this->db->or_like('merk', $q);
		$this->db->or_like('no_plat', $q);
		$this->db->or_like('warna', $q);
		$this->db->or_like('tahun', $q);
		$this->db->group_end();
	}
	function jumlah_data($q = null)
	{
		$this->data($q);
		$this->db->join('tipe', 'tb_mobil.kode_tipe = tipe.kode_tipe');
		return $this->db->count_all_results();
	}
	function limit_data($limit, $start = 0, $q = NULL)
	{
		$this->data($q);
		// $this->db->select('*, (select id_rental from transaksi where transaksi.id_mobil = tb_mobil.id_mobil and status_rental=3 limit 1) as id_rental');
		$this->db->join('tipe', 'tb_mobil.kode_tipe = tipe.kode_tipe');
		$this->db->where('(select count(id_rental) from transaksi where transaksi.id_mobil = tb_mobil.id_mobil and status_rental=3) <= ', 0, FALSE);

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
