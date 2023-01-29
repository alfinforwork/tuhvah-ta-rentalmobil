<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	function data()
	{
		$this->db->from('transaksi');
		$this->db->join('tb_mobil', 'transaksi.id_mobil = tb_mobil.id_mobil');
		$this->db->join('status_rental', 'transaksi.status_rental = status_rental.id_status_rental');
		$this->db->join('tb_customer', 'transaksi.id_customer = tb_customer.id_customer');
		if ($this->session->is_login_user) {
			$this->db->where('transaksi.id_customer', $this->session->id_customer);
		}
	}
	function data_by_q($q)
	{
		$this->data();
		$this->db->group_start();
		$this->db->like('merk', $q);
		$this->db->or_like('tgl_rental', $q);
		$this->db->or_like('tgl_kembali', $q);
		$this->db->or_like('tgl_pengembalian', $q);
		$this->db->group_end();
	}
	function filter_tanggal($dari = null, $ke = null)
	{
		if ($dari && $ke) {
			$this->db->where("tgl_pengembalian BETWEEN '$dari 00:00:00' AND '$ke 23:59:59'");
		}
	}
	function filter_tambahan($status_kepemilikan, $mitra)
	{
		if ($status_kepemilikan != "") {
			$this->db->where('status_kepemilikan', $status_kepemilikan);
			if ($status_kepemilikan == 0) {
				$this->db->where('status_kepemilikan', 0);
			} elseif ($mitra) {
				$this->db->where('id_mitra', $mitra);
			}
		}
	}


	// ------------------------------------------------------------------------


	function jumlah_data($q = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		return $this->db->count_all_results();
	}
	function limit_data($limit, $start = 0, $q = NULL, $status_kepemilikan, $mitra)
	{
		$this->db->order_by('tgl_rental', 'DESC');
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->data_by_q($q);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	// ------------------------------------------------------------------------
	function jumlah_data_laporan($q = null, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('status_rental', 4);
		return $this->db->count_all_results();
	}
	function limit_data_laporan($limit, $start = 0, $q = NULL, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('status_rental', 4);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	function jumlah_data_laporan_belum_dikembalikan($q = null, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('tgl_pengembalian', null);
		$this->db->where('status_rental', 3);
		return $this->db->count_all_results();
	}
	function limit_data_laporan_belum_dikembalikan($limit, $start = 0, $q = NULL, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('tgl_pengembalian', null);
		$this->db->where('status_rental', 3);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	function jumlah_data_laporan_perlu_dikembalikan_hari_ini($q = null, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('date(tgl_kembali)', date('Y-m-d'));
		$this->db->where('tgl_pengembalian', null);
		$this->db->where('status_rental', 3);
		return $this->db->count_all_results();
	}
	function limit_data_laporan_perlu_dikembalikan_hari_ini($limit, $start = 0, $q = NULL, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('date(tgl_kembali)', date('Y-m-d'));
		$this->db->where('tgl_pengembalian', null);
		$this->db->where('status_rental', 3);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	function jumlah_data_laporan_telat_dikembalikan($q = null, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('tgl_kembali <', date('Y-m-d H:i:s'));
		$this->db->where('tgl_pengembalian', null);
		$this->db->where('status_rental', 3);
		return $this->db->count_all_results();
	}
	function limit_data_laporan_telat_dikembalikan($limit, $start = 0, $q = NULL, $dari = null, $ke = null, $status_kepemilikan, $mitra)
	{
		$this->data_by_q($q);
		$this->filter_tanggal($dari, $ke);
		$this->filter_tambahan($status_kepemilikan, $mitra);
		$this->db->where('tgl_kembali <', date('Y-m-d H:i:s'));
		$this->db->where('tgl_pengembalian', null);
		$this->db->where('status_rental', 3);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	// ------------------------------------------------------------------------
	function jumlah_data_user($q = null)
	{
		$this->data_by_q($q);
		$this->db->where('transaksi.id_customer', $this->session->id_customer);
		return $this->db->count_all_results();
	}
	function limit_data_user($limit, $start = 0, $q = NULL)
	{
		$this->data_by_q($q);
		$this->db->where('transaksi.id_customer', $this->session->id_customer);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	function get_by_id_row($id = NULL)
	{
		$this->data();
		$this->db->where('id_rental', $id);
		return $this->db->get()->row();
	}
	function get_by_filter($dari = null, $ke = null)
	{
		$this->data();
		$this->filter_tanggal($dari, $ke);
		return $this->db->get()->result();
	}
}

/* End of file Mobil_model.php */
