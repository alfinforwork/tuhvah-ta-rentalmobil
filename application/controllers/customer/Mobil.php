<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mobil_model');
	}

	function cek_if_is_not_login()
	{
		if (!$this->session->is_login_user) {
			$this->session->set_flashdata('gagal', 'Silahkan login terlebih dahulu');

			redirect('customer/login');
		}
	}

	public function index()
	{
		$model = $this->Mobil_model;

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'customer/mobil/?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'customer/mobil/?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'customer/mobil/';
			$config['first_url'] = base_url() . 'customer/mobil/';
		}

		$config['per_page'] = 9;               //Tes
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $model->jumlah_data($q);
		$mobil = $model->limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = [
			'title' 			=> 'Mobil',
			'menu_aktif' 		=> 'mobil',
			'pagination'        => $this->pagination->create_links(),
			'q'             	=> $q,
			'start'             => $start,
			'data_mobil'		=> $mobil,
		];

		$data['content'] = $this->load->view('customer/mobil/list_mobil', $data, true);
		$this->load->view('templates_customer/template', $data);
	}
	public function sewa($id_mobil = null)
	{
		$this->cek_if_is_not_login();
		$data_mobil = $this->Mobil_model->get_by_id_row($id_mobil);
		if (!$data_mobil) {
			$this->session->set_flashdata('gagal', 'Data tidak ditemukan');
			redirect('customer/mobil');
		}

		$data = [
			'title' 			=> 'Sewa Mobil',
			'menu_aktif' 		=> 'mobil',
			'customer'			=> data_customer(),
			'id_mobil'			=> $id_mobil,
			'mobil'				=> $data_mobil,
		];

		$data['content'] = $this->load->view('customer/mobil/sewa_mobil', $data, true);
		$this->load->view('templates_customer/template', $data);
	}

	public function sewa_action($id_mobil = null)
	{
		$this->cek_if_is_not_login();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->form_validation->set_rules('tgl_sewa', 'tanggal sewa', 'trim|required');
			$this->form_validation->set_rules('lama_sewa', 'lama sewa', 'trim|required|is_natural');
			$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required|is_natural');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

			$this->form_validation->set_rules('jenis_layanan', 'jenis layanan', 'trim');
			$this->form_validation->set_rules('jaminan_ktp', 'jaminan ktp', 'trim');
			$this->form_validation->set_rules('jaminan_stnk_nama', 'jaminan stnk, nama', 'trim');
			$this->form_validation->set_rules('jaminan_stnk_plat', 'jaminan stnk, plat nomor', 'trim');
			$this->form_validation->set_rules('jaminan_motor_plat', 'jaminan motor, plat motor', 'trim|matches[jaminan_stnk_plat]');
			$this->form_validation->set_rules('jaminan_motor_merk', 'jaminan motor, merk motor', 'trim');

			$data_mobil = $this->Mobil_model->get_by_id_row($id_mobil);
			if (!$data_mobil) {
				$this->session->set_flashdata('gagal', 'Data tidak ditemukan');
				redirect('customer/mobil');
			}
			delimiter();
			if ($this->form_validation->run() == FALSE) {
				$this->sewa($id_mobil);
			} else {
				$tgl_sewa 			= $this->input->post('tgl_sewa');
				// $lama_sewa 			= $this->input->post('lama_sewa') - 1;
				$lama_sewa 			= $this->input->post('lama_sewa');

				$data = [
					'id_customer'	=> $this->session->userdata('id_customer'),
					'id_mobil'		=> $id_mobil,
					'tgl_rental'	=> $tgl_sewa,
					'tgl_kembali'	=> date('Y-m-d H:i:s', strtotime($tgl_sewa . " + $lama_sewa days")),
					'status_rental'	=> 1,
					'jaminan_ktp'	=> $this->input->post('jaminan_ktp'),
					'jaminan_stnk_nama'	=> $this->input->post('jaminan_stnk_nama'),
					'jaminan_stnk_plat'	=> $this->input->post('jaminan_stnk_plat'),
					'jaminan_motor_plat'	=> $this->input->post('jaminan_motor_plat'),
					'jaminan_motor_merk'	=> $this->input->post('jaminan_motor_merk'),
				];

				$cek = $this->db->insert('transaksi', $data);
				$cek2 = $this->db->where('id_customer', $this->session->userdata('id_customer'))->update('tb_customer', [
					'no_ktp' => $this->input->post('no_ktp'),
					'alamat' => $this->input->post('alamat'),
				]);

				if ($cek && $cek2) {
					$this->session->set_flashdata('berhasil', 'Berhasil menyewa mobil');
					redirect('customer/profile?menu=transaksi');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal menyewa mobil');
					$this->sewa($id_mobil);
				}
			}
		} else {
			redirect('admin/profile');
		}
	}
}

/* End of file Mobil.php */
