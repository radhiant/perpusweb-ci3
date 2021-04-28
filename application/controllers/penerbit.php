<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('penerbit_model');
  }
	
	public function index()
	{
		$data['title'] = 'Penerbit';
		$data['penerbit'] = $this->penerbit_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('penerbit/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = 	$this->penerbit_model->buat_kode();
		$penerbit = $this->input->post('penerbit');
		$ket = 		$this->input->post('ket');
		
		$data=array(
			'id_penerbit'=>$kode,
			'penerbit'=> $penerbit,
			'keterangan'=>$ket
		);

		$this->penerbit_model->tambah_data($data, 'penerbit');
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
    	redirect('penerbit');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('id');
		$penerbit = $this->input->post('penerbit');
		$ket = 		$this->input->post('ket');
		
		$data=array(
			'penerbit'=> $penerbit,
			'keterangan'=>$ket
		);

		$where = array(
			'id_penerbit'=>$kode
		);

		$this->penerbit_model->ubah_data($where, $data, 'penerbit');
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
    	redirect('penerbit');
	}

	public function proses_hapus($id)
	{
		$where = array('id_penerbit' => $id );
		$this->penerbit_model->hapus_data($where, 'penerbit');
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
		redirect('penerbit');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_penerbit' => $id );
    	$data = $this->penerbit_model->detail_data($where, 'penerbit')->result();
    	echo json_encode($data);
	}
}
