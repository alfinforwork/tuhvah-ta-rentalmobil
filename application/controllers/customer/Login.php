<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	function cek_if_is_login()
	{
		if ($this->session->is_login_user) {
			redirect('customer/dashboard');
		}
	}

	public function index()
	{
		$this->cek_if_is_login();
		$data = [
			'title' => 'Login',
			'menu_aktif' => 'login',
		];

		$data['content'] = $this->load->view('customer/auth/login', $data, true);
		$this->load->view('templates_customer/template', $data);
	}
	public function action()
	{
		$this->cek_if_is_login();
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user  =  $this->db->where('username', $username)->get('tb_customer')->row();
			if (!$user) {
				$this->session->set_flashdata('gagal', 'User tidak ditemukan');
				$this->index();
			} elseif ($user->password <> md5($password)) {
				$this->session->set_flashdata('gagal', 'Password tidak sesuai');
				$this->index();
			} else {
				$array = array(
					'is_login_user' => true,
					'id_customer'	=> $user->id_customer,
					'username'		=> $user->username,
					'nama'			=> $user->nama,
					'no_telp'		=> $user->no_telp,
				);

				$this->session->unset_userdata([
					'is_login_admin',
					'id_admin',
					'username',
					'nama',
				]);


				$this->session->set_userdata($array);
				redirect('customer/dashboard');
			}
		}
	}
	public function logout()
	{
		session_destroy();
		$this->session->sess_destroy();

		redirect('customer/login');
	}
}

/* End of file Login.php */
