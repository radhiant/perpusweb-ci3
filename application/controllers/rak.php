<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('rak_model');
  }
	
	public function index()
	{
		$data['title'] = 'Rak';
		$data['rak'] = $this->rak_model->data()->result();
		$data['kode'] = $this->rak_model->buat_kode();

		$this->load->view('templates/header', $data);
		$this->load->view('rak/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$norak = 	$this->input->post('norak');
		$rak = 		$this->input->post('rak');
		$ket = 		$this->input->post('ket');
		
		$data=array(
			'id_rak'=>$norak,
			'rak'=> $rak,
			'keterangan'=>$ket
		);

		$this->rak_model->tambah_data($data, 'rak');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('rak');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('norak');
		$rak = $this->input->post('rak');
		$ket = 		$this->input->post('ket');
		
		$data=array(
			'rak'=> $rak,
			'keterangan'=>$ket
		);

		$where = array(
			'id_rak'=>$kode
		);

		$this->rak_model->ubah_data($where, $data, 'rak');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('rak');
	}

	public function proses_hapus($id)
	{
		$where = array('id_rak' => $id );
		$this->rak_model->hapus_data($where, 'rak');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('rak');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_rak' => $id );
    	$data = $this->rak_model->detail_data($where, 'rak')->result();
    	echo json_encode($data);
	}

}
