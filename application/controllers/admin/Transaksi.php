<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
	}

	public function index()
	{
		$model = $this->Transaksi_model;
		$q = urldecode($this->input->get('q', TRUE));
		$status_kepemilikan = urldecode($this->input->get('status_kepemilikan'));
		$mitra = urldecode($this->input->get('mitra'));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . 'admin/transaksi/?q=' . urlencode($q) . "&status_kepemilikan=$status_kepemilikan&mitra=$mitra";
			$config['first_url'] = base_url() . 'admin/transaksi/?q=' . urlencode($q) . "&status_kepemilikan=$status_kepemilikan&mitra=$mitra";
		} else {
			$config['base_url'] = base_url() . 'admin/transaksi/';
			$config['first_url'] = base_url() . 'admin/transaksi/';
		}

		$config['per_page'] = 9;               //Tes
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $model->jumlah_data($q, $status_kepemilikan, $mitra);

		$transaksi = $model->limit_data($config['per_page'], $start, $q, $status_kepemilikan, $mitra);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = [
			'pagination'        => $this->pagination->create_links(),
			'q'             	=> $q,
			'start'             => $start,
			'data_transaksi'	=> $transaksi,
			'status_kepemilikan' => $status_kepemilikan,
			'mitra' 			=> $mitra,
		];
		$data['data_mitra'] = $this->db->get('tb_mitra')->result();
		$data['data_admin'] = $this->db->get('tb_admin')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi/list', $data);
		$this->load->view('templates_admin/footer');
	}
	public function detail($id_rental = null)
	{
		$model = $this->Transaksi_model;
		$data = [
			'data_transaksi'	=> $model->get_by_id_row($id_rental),
			'id_rental'			=> $id_rental,
		];
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi/detail', $data);
		$this->load->view('templates_admin/footer');
	}
	public function foto_salah($id_rental = null)
	{
		$model = $this->Transaksi_model;
		$data_transaksi = $model->get_by_id_row($id_rental);
		if ($data_transaksi) {
			$cek = $this->db->where('id_rental', $id_rental)->update('transaksi', ['status_rental' => 1, 'bukti_transfer' => null]);
			if ($cek) {
				@unlink($data_transaksi->bukti_transfer);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Status berhasil diubah. Foto dihapus.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect("admin/transaksi/detail/$id_rental");
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Status gagal diubah
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect("admin/transaksi/detail/$id_rental");
			}
		}
	}
	public function foto_benar($id_rental = null)
	{
		$model = $this->Transaksi_model;
		$data_transaksi = $model->get_by_id_row($id_rental);
		if ($data_transaksi) {
			$cek = $this->db->where('id_rental', $id_rental)->update('transaksi', ['status_rental' => 3]);
			if ($cek) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Konfirmasi berhasil
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect("admin/transaksi/detail/$id_rental");
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Status gagal diubah
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					  </button>
					</div>');

				redirect("admin/transaksi/detail/$id_rental");
			}
		}
	}

	public function pengembalian_action($id_rental = null)
	{
		$model = $this->Transaksi_model;
		$data_transaksi = $model->get_by_id_row($id_rental);
		if (!$data_transaksi) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data tidak ditemukan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect("admin/transaksi");
		}
		$this->form_validation->set_rules('tgl_pengembalian', 'tanggal pengembalian', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->detail($id_rental);
		} else {
			$tgl_pengembalian = $this->input->post('tgl_pengembalian');
			$cek = $this->db->where('id_rental', $id_rental)->update('transaksi', ['status_rental' => 4, 'tgl_pengembalian' => $tgl_pengembalian]);
			if ($cek) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Konfirmasi berhasil
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect("admin/transaksi/detail/$id_rental");
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Gagal
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect("admin/transaksi/detail/$id_rental");
			}
		}
	}
}

/* End of file Transaksi.php */
