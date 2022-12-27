<?php

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'menu_aktif' => 'dashboard',
		];
		$data['tb_mobil'] = $this->rental_model->get_data('tb_mobil')->result();

		$data['content'] = $this->load->view('customer/dashboard', $data, true);
		$this->load->view('templates_customer/template', $data);
	}
}
