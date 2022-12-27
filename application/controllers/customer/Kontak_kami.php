<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kontak_kami extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'kontak_kami',
			'menu_aktif' => 'kontak_kami',
		];

		$data['content'] = $this->load->view('customer/kontak_kami/kontak_kami', $data, true);
		$this->load->view('templates_customer/template', $data);
	}
}

/* End of file Kontak_kami.php */
