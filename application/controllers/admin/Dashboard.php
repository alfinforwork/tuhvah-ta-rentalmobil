<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->is_login_admin) {
			redirect('admin/login');
		}
	}

	public function index()
	{
		$data = [
			'jumlah_transaksi' => $this->db->where('status_rental', 4)->from('transaksi')->count_all_results(),
			'jumlah_customer' => $this->db->from('tb_customer')->count_all_results(),
			'jumlah_mobil' => $this->db->from('tb_mobil')->count_all_results(),
		];
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
}
