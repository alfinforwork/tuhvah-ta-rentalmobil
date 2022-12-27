<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Transaksi_model');
	}

	public function index($menu = null)
	{
		$menu = $menu !== null ? $menu : ($this->input->get('menu') ? $this->input->get('menu') : null);

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'customer/profile/?menu=transaksi&q=' . urlencode($q);
			$config['first_url'] = base_url() . 'customer/profile/?menu=transaksi&q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'customer/profile/?menu=transaksi';
			$config['first_url'] = base_url() . 'customer/profile/?menu=transaksi';
		}

		$config['per_page'] = 9;               //Tes
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Transaksi_model->jumlah_data_user($q);
		$transaksi = $this->Transaksi_model->limit_data_user($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);


		$data = [
			'title' 			=> 'Profile',
			'menu_aktif' 		=> 'profile',
			'customer'			=> $this->User_model->get_by_session(),
			'menu'				=> $menu,
			'pagination'        => $this->pagination->create_links(),
			'q'             	=> $q,
			'start'             => $start,
			'data_transaksi'	=> $transaksi,
		];
		$data['content'] = $this->load->view('customer/profile/profile', $data, true);
		$this->load->view('templates_customer/template', $data);
	}
	public function profile_action()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('j_kelamin', 'jenis kelamin', 'trim|required');
			$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required|is_natural');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

			delimiter();
			if ($this->form_validation->run() == FALSE) {
				$this->index('profile');
			} else {
				$nama 			= $this->input->post('nama');
				$username 		= $this->input->post('username');
				$j_kelamin 		= $this->input->post('j_kelamin');
				$no_ktp 		= $this->input->post('no_ktp');
				$alamat 		= $this->input->post('alamat');

				$data = [
					'nama' 		=> $nama,
					'username' 	=> $username,
					'j_kelamin' => $j_kelamin,
					'no_ktp' 	=> $no_ktp,
					'alamat' 	=> $alamat,
				];
				$cek = $this->db->where('id_customer', data_customer()->id_customer)->update('tb_customer', $data);
				if ($cek) {
					$this->session->set_flashdata('berhasil', 'Berhasil mengubah profile');
					redirect('customer/profile?menu=profile');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal mengubah profile');
					redirect('customer/profile?menu=profile');
				}
			}
		} else {
			redirect('admin/profile');
		}
	}

	public function ganti_password_action()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->form_validation->set_rules('password_lama', 'password lama', 'trim|required');
			$this->form_validation->set_rules('password_baru', 'password baru', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('konfirmasi_password', 'konfirmasi password', 'trim|required|min_length[8]|matches[password_baru]');

			delimiter();
			if ($this->form_validation->run() == FALSE) {
				$this->index('gantipassword');
			} else {
				$password_baru = $this->input->post('password_baru');
				$password_lama = $this->input->post('password_lama');

				$customer = $this->db->where('id_customer', $this->session->userdata('id_customer'))->get('tb_customer')->row();
				if ($customer->password !== md5($password_lama)) {
					$this->session->set_flashdata('gagal', 'Password lama salah');
					$this->index('gantipassword');
				}

				$data = [
					'password' => md5($password_baru),
				];
				$cek = $this->db->where('id_customer', data_customer()->id_customer)->update('tb_customer', $data);
				if ($cek) {
					$this->session->set_flashdata('berhasil', 'Berhasil mengubah password');
					redirect('customer/profile?menu=gantipassword');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal mengubah password');
					redirect('customer/profile?menu=gantipassword');
				}
			}
		} else {
			redirect('admin/profile');
		}
	}
}

/* End of file Profile.php */
