<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}
	function cek_auth()
	{
		if ($this->session->is_login_admin) {
			redirect('admin/dashboard');
		}
	}

	public function index()
	{
		$this->cek_auth();
		$data = [
			'title' => 'Login',
		];

		$data['content'] = $this->load->view('admin/auth/login', $data, true);
		$this->load->view('templates_admin/login', $data);
	}

	public function action()
	{
		$this->cek_auth();
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user  =  $this->db->where('username', $username)->get('tb_admin')->row();
			if (!$user) {
				$this->session->set_flashdata('gagal', 'User tidak ditemukan');
				$this->index();
			} elseif ($user->password <> md5($password)) {
				$this->session->set_flashdata('gagal', 'Password tidak sesuai');
				$this->index();
			} else {
				$array = array(
					'is_login_admin' => true,
					'id_admin'	=> $user->id_admin,
					'username'		=> $user->username,
					'nama'			=> $user->nama,
				);

				$this->session->unset_userdata([
					'is_login_user',
					'id_customer',
					'username',
					'nama',
					'no_telp',
				]);

				$this->session->set_userdata($array);
				redirect('admin/dashboard');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}

/* End of file Login.php */
