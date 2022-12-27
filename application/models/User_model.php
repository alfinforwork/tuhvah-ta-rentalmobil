<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	function get_by_session()
	{
		return $this->db->where('id_customer', $this->session->id_customer)->get('tb_customer')->row();
	}
}

/* End of file User_model.php */
