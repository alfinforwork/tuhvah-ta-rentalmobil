<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_mitra extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mitra_model');
	}

	public function index()
	{
		$model = $this->Mitra_model;

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . "admin/data_mitra/?q=" . urlencode($q);
			$config['first_url'] = base_url() . "admin/data_mitra/?q=" . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'admin/data_mitra/';
			$config['first_url'] = base_url() . 'admin/data_mitra/';
		}

		$config['per_page'] = 9;               //Tes
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $model->jumlah_data($q);
		$mitra = $model->limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = [
			'pagination'        => $this->pagination->create_links(),
			'q'             	=> $q,
			'start'             => $start,
			'mitra'				=> $mitra,
		];
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/mitra/list_mitra', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah()
	{
		$data = [
			'judul' 		=> 'Form Tambah Mitra',
			'nama_mitra' 	=> set_value('nama_mitra', ''),
			'jenis_kelamin' => set_value('jenis_kelamin', ''),
			'alamat' 		=> set_value('alamat', ''),
			'no_telp' 		=> set_value('no_telp', ''),
			'action'		=> base_url('admin/data_mitra/tambah_action'),
		];

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/mitra/form_mitra', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_action()
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = [
				'nama_mitra' 	=> $this->input->post('nama_mitra'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'no_telp' 		=> $this->input->post('no_telp'),
			];
			$cek = $this->db->insert('tb_mitra', $data);
			if ($cek) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Mitra Berhasil Ditambahkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('admin/data_mitra');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Mitra Gagal Ditambahkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('admin/data_mitra');
			}
		}
	}
	public function update($id_mitra = null)
	{
		$data_mitra = $this->Mitra_model->get_by_id_row($id_mitra);
		if (!$data_mitra) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Mitra Tidak Ditemukan.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/data_mitra');
		}

		$data = [
			'judul' 		=> 'Form Ubah Mitra',
			'nama_mitra' 	=> set_value('nama_mitra', $data_mitra->nama_mitra),
			'jenis_kelamin' => set_value('jenis_kelamin', $data_mitra->jenis_kelamin),
			'alamat' 		=> set_value('alamat', $data_mitra->alamat),
			'no_telp' 		=> set_value('no_telp', $data_mitra->no_telp),
			'action'		=> base_url('admin/data_mitra/update_action/' . $id_mitra),
		];

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/mitra/form_mitra', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update_action($id_mitra = null)
	{
		$data_mitra = $this->Mitra_model->get_by_id_row($id_mitra);
		if (!$data_mitra) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Mitra Tidak Ditemukan.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/data_mitra');
		}

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update();
		} else {
			$data = [
				'nama_mitra' 	=> $this->input->post('nama_mitra'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'no_telp' 		=> $this->input->post('no_telp'),
			];
			$cek = $this->db->where('id_mitra', $id_mitra)->update('tb_mitra', $data);
			if ($cek) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Mitra Berhasil Diupdate.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('admin/data_mitra');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Mitra Gagal Diupdate.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('admin/data_mitra');
			}
		}
	}
	public function delete($id_mitra = null)
	{
		$data_mitra = $this->Mitra_model->get_by_id_row($id_mitra);
		if (!$data_mitra) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Mitra Tidak Ditemukan.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/data_mitra');
		}

		$cek = $this->db->where('id_mitra', $id_mitra)->delete('tb_mitra');
		if ($cek) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Mitra Berhasil Dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/data_mitra');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Mitra Gagal Dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('admin/data_mitra');
		}
	}

	function _rules()
	{

		$this->form_validation->set_rules('nama_mitra', 'nama mitra', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');

		$this->form_validation->set_rules('nama_mitra', 'nama mitra', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	}
}

/* End of file Data_mitra.php */
