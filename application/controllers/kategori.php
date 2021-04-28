<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kategori_model');
  }
	
	public function index()
	{
		$data['title'] = 'Kategori';
		$data['kategori'] = $this->kategori_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('kategori/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Kategori';
		$this->load->view('templates/header', $data);
		$this->load->view('kategori/form_tambah');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = 	$this->kategori_model->buat_kode();
		$kategori = $this->input->post('kategori');
		$ket = 		$this->input->post('ket');
		
		$data=array(
			'id_kategori'=>$kode,
			'kategori'=> $kategori,
			'keterangan'=>$ket
		);

		$this->kategori_model->tambah_data($data, 'kategori');
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
    	redirect('kategori');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('id');
		$kategori = $this->input->post('kategori');
		$ket = 		$this->input->post('ket');
		
		$data=array(
			'kategori'=> $kategori,
			'keterangan'=>$ket
		);

		$where = array(
			'id_kategori'=>$kode
		);

		$this->kategori_model->ubah_data($where, $data, 'kategori');
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
    	redirect('kategori');
	}

	public function proses_hapus($id)
	{
		$where = array('id_kategori' => $id );
		$this->kategori_model->hapus_data($where, 'kategori');
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
		redirect('kategori');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_kategori' => $id );
    	$data = $this->kategori_model->detail_data($where, 'kategori')->result();
    	echo json_encode($data);
	}

}
