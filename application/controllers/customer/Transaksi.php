<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->model('Mobil_model');
	}

	public function detail($id_transaksi = null)
	{
		if ($id_transaksi == null) {
			$this->session->set_flashdata('gagal', 'Data transaksi tidak ditemukan');
			redirect("customer/profile?menu=transaksi");
		}
		// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = 'SB-Mid-server-vOioyw9s7uVpzfO94Eoo-ctH';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;

		$transaksi = $this->Transaksi_model->get_by_id_row($id_transaksi);

		$lama_sewa = round((strtotime($transaksi->tgl_kembali) - strtotime($transaksi->tgl_rental)) / (60 * 60 * 24));

		$biaya_sopir = $transaksi->jenis_layanan == 'sopir' ? 50000 : 0;

		$params = array(
			'transaction_details' => array(
				'order_id' => $transaksi->id_rental . date('dmYHis'),
				// ((harga_per_hari * lama_sewa) + (lama_sewa * biaya_sopir))
				'gross_amount' => ($transaksi->biaya * $lama_sewa) + ($lama_sewa * $biaya_sopir),
			)
		);

		try {
			$status = \Midtrans\Transaction::status($transaksi->id_midtrans);
		} catch (\Exception $e) {
			$status = null;
		}
		$snapToken = \Midtrans\Snap::getSnapToken($params);


		$data = [
			'title' 			=> 'Transaksi',
			'menu_aktif' 		=> 'profile',
			'customer' 			=> data_customer(),
			'transaksi'			=> $transaksi,
			'id_transaksi'		=> $id_transaksi,
			'snapToken'			=> $snapToken,
			'status'			=> $status,
		];

		$data['content'] = $this->load->view('customer/transaksi/detail_transaksi', $data, true);
		$this->load->view('templates_customer/template', $data);
	}

	public function upload_action($id_transaksi = null)
	{
		if ($id_transaksi == null) {
			$this->session->set_flashdata('gagal', 'Data transaksi tidak ditemukan');
			redirect("customer/profile?menu=transaksi");
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$config['upload_path']          = 'assets/upload/foto/bukti_transfer/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 40000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti_transfer')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('gagal', $error);
				redirect("customer/transaksi/detail/$id_transaksi");
			} else {
				$bukti_transfer = $this->upload->data('file_name');
				$data = [
					'bukti_transfer'	=> $config['upload_path'] . $bukti_transfer,
					'status_rental'		=> 2,
				];
				$cek = $this->db->where('id_rental', $id_transaksi)->update('transaksi', $data);
				if ($cek) {
					$this->session->set_flashdata('berhasil', 'Berhasil upload bukti transfer');
					redirect("customer/transaksi/detail/$id_transaksi");
				} else {
					$this->session->set_flashdata('gagal', 'Gagal upload bukti transfer');
					redirect("customer/transaksi/detail/$id_transaksi");
				}
			}
		} else {
			redirect('admin/profile');
		}
	}

	public function api_update($id_transaksi)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$transaksi = $this->db->where('id_rental', $id_transaksi)->get('transaksi')->row();
			if (!$transaksi) $this->output->set_status_header(400)->set_output(json_encode(['error' => 'Data transaksi tidak ditemukan']));
			if (!$transaksi->status_rental > 3) $this->output->set_status_header(400)->set_output(json_encode(['error' => 'Anda sudah membayar']));

			$order_id = $this->input->post('order_id');
			$transaction_status = $this->input->post('transaction_status');
			$permata_va_number = $this->input->post('permata_va_number');
			$bca_va_number = $this->input->post('bca_va_number');
			$bni_object_va_number = @(object)($this->input->post('va_numbers')[0]);
			$bni_va_number = @$bni_object_va_number->bank == 'bni' ? @$bni_object_va_number->va_number : null;
			$bri_object_va_number = @(object)($this->input->post('va_numbers')[0]);
			$bri_va_number = @$bri_object_va_number->bank == 'bri' ? @$bri_object_va_number->va_number : null;

			$data = [];
			if ($order_id) {
				$data['id_midtrans'] = $order_id;
			}
			if ($permata_va_number) {
				$data['tipe_pembayaran'] = 'bank';
				$data['jenis_pembayaran'] = 'permata';
				$data['kode_pembayaran'] = $permata_va_number;
			} else if ($bca_va_number) {
				$data['tipe_pembayaran'] = 'bank';
				$data['jenis_pembayaran'] = 'bca';
				$data['kode_pembayaran'] = $bca_va_number;
			} else if ($bni_va_number) {
				$data['tipe_pembayaran'] = 'bank';
				$data['jenis_pembayaran'] = 'bni';
				$data['kode_pembayaran'] = $bni_va_number;
			} else if ($bri_va_number) {
				$data['tipe_pembayaran'] = 'bank';
				$data['jenis_pembayaran'] = 'bri';
				$data['kode_pembayaran'] = $bri_va_number;
			}
			if ($transaction_status == 'settlement') {
				$data['status_rental'] = 3;
			}
			$cek = $this->db->where('id_rental', $id_transaksi)->update('transaksi', $data);
			if ($cek) {
				$this->output
					->set_status_header(200)
					->set_output(json_encode([
						'message' => 'Berhasil menyimpan data',
						'data' => [
							'id_rental' => $id_transaksi,
							'body' => $_REQUEST,
						]
					]));
			} else {
				$this->output
					->set_status_header(400)
					->set_output(json_encode([
						'error' => 'Gagal menyimpan data'
					]));
			}
		}
	}
}

/* End of file Transaksi.php */
