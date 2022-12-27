<?php
class Data_mobil extends CI_Controller
{

	public function index()
	{
		$data['tb_mobil'] = $this->rental_model->get_data('tb_mobil')->result();
		$data['tipe'] = $this->rental_model->get_data('tipe')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_mobil', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_mobil()
	{
		$data['tipe'] = $this->rental_model->get_data('tipe')->result();
		$data['mitra'] = $this->db->get('tb_mitra')->result();
		$data['admin'] = $this->db->get('tb_admin')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_mobil', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_mobil_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_mobil();
		} else {
			$kode_tipe		= $this->input->post('kode_tipe');
			$merk			= $this->input->post('merk');
			$no_plat		= $this->input->post('no_plat');
			$warna			= $this->input->post('warna');
			$tahun			= $this->input->post('tahun');
			$status			= $this->input->post('status');
			$biaya			= $this->input->post('biaya');
			$status_kepemilikan = $this->input->post('status_kepemilikan');
			$mitra 			= $this->input->post('mitra');
			$admin 			= $this->input->post('admin');
			$gambar			= $_FILES['gambar']['name'];

			$directory = 'assets/upload/foto/mobil/';
			if (!file_exists($directory)) {
				mkdir($directory, 0777, true);
			}

			$config['upload_path']		= $directory;
			$config['allowed_types']	= 'jpg|jpeg|png|tiff|gif';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Mobil Gagal Di Upload !";
			} else {
				$gambar = $directory . $this->upload->data('file_name');
			}


			$data = array(
				'kode_tipe'			=> $kode_tipe,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'warna'				=> $warna,
				'tahun'				=> $tahun,
				'status'			=> $status,
				'gambar'			=> $gambar,
				'biaya'				=> $biaya,
				'status_kepemilikan' => $status_kepemilikan
			);
			if ($status_kepemilikan == 1) {
				$data['id_mitra'] = $mitra;
				$data['id_admin'] = session_id_admin();
			} else {
				$data['id_admin'] = session_id_admin();
			}

			$cek = $this->rental_model->insert_data($data, 'tb_mobil');
			if ($cek) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Mobil Berhasil Ditambahkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('admin/data_mobil');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Mobil Gagal Ditambahkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('admin/data_mobil');
			}
		}
	}
	public function update_mobil($id)
	{
		$where = array('id_mobil' => $id);
		$data['tb_mobil'] = $this->db->query("SELECT * FROM tb_mobil mb, tipe tp WHERE mb.kode_tipe=tp.kode_tipe AND mb.id_mobil='$id'")->row();
		$data['tipe'] = $this->rental_model->get_data('tipe')->result();
		$data['mitra'] = $this->db->get('tb_mitra')->result();
		$data['admin'] = $this->db->get('tb_admin')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_mobil', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update_mobil_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update_mobil($this->input->post('id_mobil'));
		} else {
			$id  			= $this->input->post('id_mobil');
			$kode_tipe		= $this->input->post('kode_tipe');
			$merk			= $this->input->post('merk');
			$no_plat		= $this->input->post('no_plat');
			$warna			= $this->input->post('warna');
			$tahun			= $this->input->post('tahun');
			$status			= $this->input->post('status');
			$biaya			= $this->input->post('biaya');
			$status_kepemilikan = $this->input->post('status_kepemilikan');
			$mitra 			= $this->input->post('mitra');
			$admin 			= $this->input->post('admin');
			$gambar			= $_FILES['gambar']['name'];

			$directory = 'assets/upload/foto/mobil/';
			if (!file_exists($directory)) {
				mkdir($directory, 0777, true);
			}
			$config['upload_path']		= $directory;
			$config['allowed_types']	= 'jpg|jpeg|png|tiff|gif';

			$this->load->library('upload', $config);


			$data = array(
				'kode_tipe'			=> $kode_tipe,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'warna'				=> $warna,
				'tahun'				=> $tahun,
				'status'			=> $status,
				'biaya'				=> $biaya,
				'status_kepemilikan' => $status_kepemilikan
			);
			if ($this->upload->do_upload('gambar')) {
				$gambar = $directory . $this->upload->data('file_name');
				$data['gambar']			= $gambar;
			}
			if ($status_kepemilikan == 1) {
				$data['id_mitra'] = $mitra;
				$data['id_admin'] = session_id_admin();
			} else {
				$data['id_admin'] = session_id_admin();
			}
			$where = array(
				'id_mobil' => $id
			);
			$this->rental_model->update_data('tb_mobil', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data Mobil Berhasil Diupdate.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>');
			redirect('admin/data_mobil');
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('kode_tipe', 'kode_tipe', 'required');
		$this->form_validation->set_rules('merk', 'merk', 'required');
		$this->form_validation->set_rules('no_plat', 'no_plat', 'required');
		$this->form_validation->set_rules('warna', 'warna', 'required');
		$this->form_validation->set_rules('tahun', 'tahun', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_rules('biaya', 'biaya', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('status_kepemilikan', 'status kepemilikan', 'required');
	}

	public function detail_mobil($id)
	{
		$data['detail'] = $this->rental_model->ambil_id_mobil($id);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_mobil($id)
	{
		$where = array('id_mobil' => $id);
		$this->rental_model->delete_data($where, 'tb_mobil');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			Data Mobil Berhasil Dihapus.
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
		redirect('admin/data_mobil');
	}
}
