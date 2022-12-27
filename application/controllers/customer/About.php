<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'about',
			'menu_aktif' => 'about',
		];

		$data['content'] = $this->load->view('customer/about/about', $data, true);
		$this->load->view('templates_customer/template', $data);
	}
}

/* End of file About.php */
