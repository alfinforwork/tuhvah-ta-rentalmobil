<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
	}
	function pilih_menu()
	{
		$data = [];
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan/menu', $data);
		$this->load->view('templates_admin/footer');
	}

	public function index()
	{
		$model = $this->Transaksi_model;
		$dari = $this->input->get('dari', TRUE);
		$ke = $this->input->get('ke', TRUE);
		$status_kepemilikan = urldecode($this->input->get('status_kepemilikan'));
		$mitra = urldecode($this->input->get('mitra'));

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . "admin/laporan/?q=" . urlencode($q) . "&dari=$dari&ke=$ke&status_kepemilikan=$status_kepemilikan&mitra=$mitra";
			$config['first_url'] = base_url() . "admin/laporan/?q=" . urlencode($q) . "&dari=$dari&ke=$ke&status_kepemilikan=$status_kepemilikan&mitra=$mitra";
		} else {
			$config['base_url'] = base_url() . 'admin/laporan/';
			$config['first_url'] = base_url() . 'admin/laporan/';
		}

		$config['per_page'] = 9;               //Tes
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $model->jumlah_data_laporan($q, $dari, $ke, $status_kepemilikan, $mitra);
		$transaksi = $model->limit_data_laporan($config['per_page'], $start, $q, $dari, $ke, $status_kepemilikan, $mitra);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = [
			'pagination'        => $this->pagination->create_links(),
			'q'             	=> $q,
			'start'             => $start,
			'data_transaksi'	=> $transaksi,
			'dari'				=> $dari,
			'ke' 				=> $ke,
			'status_kepemilikan' => $status_kepemilikan,
			'mitra' 			=> $mitra,
		];
		$data['data_mitra'] = $this->db->get('tb_mitra')->result();
		$data['data_admin'] = $this->db->get('tb_admin')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan/list', $data);
		$this->load->view('templates_admin/footer');
	}

	public function mobil()
	{
		$menu = $this->input->get('menu');
		$dari = $this->input->get('dari', TRUE);
		$ke = $this->input->get('ke', TRUE);
		$status_kepemilikan = urldecode($this->input->get('status_kepemilikan'));
		$mitra = urldecode($this->input->get('mitra'));

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . "admin/laporan/mobil/?q=" . urlencode($q) . "&dari=$dari&ke=$ke&status_kepemilikan=$status_kepemilikan&mitra=$mitra&menu=$menu";
			$config['first_url'] = base_url() . "admin/laporan/mobil/?q=" . urlencode($q) . "&dari=$dari&ke=$ke&status_kepemilikan=$status_kepemilikan&mitra=$mitra&menu=$menu";
		} else {
			$config['base_url'] = base_url() . 'admin/laporan/mobil/';
			$config['first_url'] = base_url() . 'admin/laporan/mobil/';
		}

		$config['per_page'] = 9;               //Tes
		$config['page_query_string'] = TRUE;
		if ($menu == 'belum_dikembalikan') {
			$config['total_rows'] = $this->Transaksi_model->jumlah_data_laporan_belum_dikembalikan($q, $dari, $ke, $status_kepemilikan, $mitra);
			$transaksi = $this->Transaksi_model->limit_data_laporan_belum_dikembalikan($config['per_page'], $start, $q, $dari, $ke, $status_kepemilikan, $mitra);
		} elseif ($menu == 'perlu_dikembalikan_hari_ini') {
			$config['total_rows'] = $this->Transaksi_model->jumlah_data_laporan_perlu_dikembalikan_hari_ini($q, $dari, $ke, $status_kepemilikan, $mitra);
			$transaksi = $this->Transaksi_model->limit_data_laporan_perlu_dikembalikan_hari_ini($config['per_page'], $start, $q, $dari, $ke, $status_kepemilikan, $mitra);
		} elseif ($menu == 'telat_dikembalikan') {
			$config['total_rows'] = $this->Transaksi_model->jumlah_data_laporan_telat_dikembalikan($q, $dari, $ke, $status_kepemilikan, $mitra);
			$transaksi = $this->Transaksi_model->limit_data_laporan_telat_dikembalikan($config['per_page'], $start, $q, $dari, $ke, $status_kepemilikan, $mitra);
		} else {
			header('Location:pilih_menu');
		}

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = [
			'pagination'        => $this->pagination->create_links(),
			'q'             	=> $q,
			'start'             => $start,
			'data_transaksi'	=> $transaksi,
			'dari'				=> $dari,
			'ke' 				=> $ke,
			'status_kepemilikan' => $status_kepemilikan,
			'mitra' 			=> $mitra,
		];
		$data['data_mitra'] = $this->db->get('tb_mitra')->result();
		$data['data_admin'] = $this->db->get('tb_admin')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan/list_mobil', $data);
		$this->load->view('templates_admin/footer');
	}
	public function print()
	{
		$model = $this->Transaksi_model;
		$dari = $this->input->get('dari', TRUE);
		$ke = $this->input->get('ke', TRUE);

		$data = [
			'title' => 'Print',
			'data_transaksi' => $model->get_by_filter($dari, $ke)
		];
		$data['konten'] = $this->load->view('admin/laporan/print', $data, true);
		$this->load->view('templates_admin/laporan/template_laporan', $data);
	}
}

/* End of file Laporan.php */
