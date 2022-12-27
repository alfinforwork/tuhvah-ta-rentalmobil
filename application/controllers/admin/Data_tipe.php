<?php

class Data_tipe extends CI_Controller
{
	public function index()
	{
		$data['tipe'] = $this->rental_model->get_data('tipe')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_tipe', $data);
		$this->load->view('templates_admin/footer');

	}

	public function tambah_tipe()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_tipe');
		$this->load->view('templates_admin/footer');

	}

	public function tambah_tipe_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE )
		{
			$this->tambah_tipe();
		}
		else
		{
			$kode_tipe		= $this->input->post('kode_tipe');
			$nama_tipe		= $this->input->post('nama_tipe');

			$data = array 
			(
				'kode_tipe'		=> $kode_tipe,
				'nama_tipe'		=> $nama_tipe,
			);
			$this->rental_model->insert_data($data,'tipe');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data Tipe Berhasil Ditambahkan.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>'); 
			redirect('admin/data_tipe');
		}
	}

	public function update_tipe($id)
	{
		$where = array('id_type' => $id);
		$data['tipe'] = $this->db->query("SELECT * FROM tipe WHERE id_type='$id'")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_tipe', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update_tipe_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->update_tipe();
		}
		else
		{
			$id  			= $this->input->post('id_type');
			$kode_tipe 		= $this->input->post('kode_tipe');
			$nama_tipe 		= $this->input->post('nama_tipe');

			$data = array 
			(
				'kode_tipe'  => $kode_tipe,
				'nama_tipe'  => $nama_tipe
			);

			$where = array 
			(
				'id_type' 	 => $id
			);

			$this->rental_model->update_data('tipe', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data Tipe Berhasil Diupdate.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>'); 
			redirect('admin/data_tipe');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_tipe', 'Kode tipe', 'required');
		$this->form_validation->set_rules('nama_tipe', 'Nama tipe', 'required');

	}
	
	public function detail_tipe($id)
	{
		$data['detail'] = $this->rental_model->ambil_id_tipe($id);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_tipe',$data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_tipe($id)
	{
		$where = array('id_type' => $id);
		$this->rental_model->delete_data($where, 'tipe');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				Data Tipe Berhasil Dihapus.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>'); 
		redirect('admin/data_tipe');
	}
} 

?>