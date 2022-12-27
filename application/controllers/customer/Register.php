<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Register',
			'menu_aktif' => 'login',
		];

		$data['content'] = $this->load->view('customer/auth/register', $data, true);
		$this->load->view('templates_customer/template', $data);
	}
	public function action()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
		$this->form_validation->set_rules('j_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'konfirmasi password', 'trim|required|min_length[8]');

		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$no_telp = $this->input->post('no_telp');
		$j_kelamin = $this->input->post('j_kelamin');
		$password = $this->input->post('password');
		$konfirmasi_password = $this->input->post('konfirmasi_password');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} elseif ($password <> $konfirmasi_password) {
			$this->session->set_flashdata('gagal', 'Password tidak sama dengan konfirmasi password');
			$this->index();
		} else {
			$data = [
				'nama'		=> $nama,
				'username' 	=> $username,
				'no_telp' 	=> $no_telp,
				'j_kelamin'	=> $j_kelamin,
				'password' 	=> md5($password),
			];
			$cek = $this->db->insert('tb_customer', $data);
			if ($cek) {
				$this->session->set_flashdata('berhasil', 'Registrasi berhasil');
				redirect('customer/login');
			} else {
				$this->session->set_flashdata('gagal', 'Registrasi gagal');
				$this->index();
			}
		}
	}
}

/* End of file Register.php */
