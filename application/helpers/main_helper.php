<?php

function delimiter()
{
	$CI = &get_instance();
	return $CI->form_validation->set_error_delimiters('<br><span style="color:red"><b>', '</b></span>');
}

function data_customer()
{
	$CI = &get_instance();
	return $CI->db->where('id_customer', $CI->session->userdata('id_customer'))->get('tb_customer')->row();
}
function session_id_admin()
{
	$CI = &get_instance();
	return $CI->session->id_admin;
}
function cek_ketersediaan_mobil($id_mobil = null)
{
	$CI = &get_instance();
	$CI->db->where('id_mobil', $id_mobil);
	$CI->db->where('status_rental', 3);
	$data_transaksi = $CI->db->get('transaksi')->row();
	if ($data_transaksi) {
		return false;
	} else {
		return true;
	}
}
