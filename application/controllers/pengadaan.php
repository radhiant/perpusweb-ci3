<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('buku_model');
	$this->load->model('pengadaan_model');
  }
	
	public function index()
	{
		$data['title'] = 'Pengadaan';
		$data['pengadaan'] = $this->pengadaan_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('pengadaan/index');
		$this->load->view('templates/footer');
	}

	public function getPengadaan()
	{
    	$data = $this->pengadaan_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filterPengadaan($tglawal, $tglakhir)
	{
      	$data = $this->pengadaan_model->lapdata($tglawal, $tglakhir)->result();
    	echo json_encode($data);
	}


	public function getBuku()
	{
		$id = $this->input->post('id');
    	$where = array('id_buku' => $id );
    	$data = $this->buku_model->detail_data($where, 'buku')->result();
    	echo json_encode($data);
	}

	public function proses_hapus($id,$jml,$idbk)
	{

		$idbuku = array('id_buku'=>$idbk);
		$stok = $this->buku_model->ambil_stok($idbuku);
		$penguranganStok = intval($stok) - intval($jml);
		$stokbuku = array('jmlbuku' => $penguranganStok);
		$whereIdBuku = array('id_buku' => $idbk);
		$this->buku_model->ubah_data($whereIdBuku, $stokbuku, 'buku');

		$where = array('id_pengadaan'=>$id);
		$this->pengadaan_model->hapus_data($where, 'pengadaan');


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
		redirect('pengadaan');
	}

	public function tambah()
	{
		$data['title'] = 'Pengadaan';
		$data['buku'] = $this->buku_model->data()->result();
		$data['jmlbuku'] = $this->buku_model->data()->num_rows();
		$data['tglnow'] = date('m/d/Y');

		$this->load->view('templates/header', $data);
		$this->load->view('pengadaan/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Pengadaan';
		$data['buku'] = $this->buku_model->data()->result();
		$data['jmlbuku'] = $this->buku_model->data()->num_rows();

		//menampilkan data berdasarkan id
		$data['data'] = $this->pengadaan_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('pengadaan/form_ubah');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = $this->pengadaan_model->buat_kode();
		$buku = $this->input->post('buku');
		$tgl = $this->input->post('tgl');
		$aslbuku = $this->input->post('aslbuku');
		$jmlbuku = $this->input->post('jmlbuku');
		$ket = $this->input->post('ket');

		$explode = explode("/", $tgl);
      	$tglpengadaan = $explode[2].'-'.$explode[0].'-'.$explode[1];

		$idbuku = array('id_buku'=>$buku);
		$stok = $this->buku_model->ambil_stok($idbuku);
		$penambahanStok = intval($stok) + intval($jmlbuku);
		
		$data=array(
			'id_pengadaan'=>$kode,
			'id_buku'=> $buku,
			'asal_buku'=>$aslbuku,
			'jml'=>$jmlbuku,
			'tgl'=>$tglpengadaan,
			'ket'=>$ket
		);

		$stokbuku = array('jmlbuku' => $penambahanStok);
		$where = array('id_buku' => $buku);

		$this->buku_model->ubah_data($where, $stokbuku, 'buku');
		$this->pengadaan_model->tambah_data($data, 'pengadaan');
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
    	redirect('pengadaan');
	}
	

	public function proses_ubah()
	{
		$kode = $this->input->post('id');
		$buku = $this->input->post('buku');
		$tgl = $this->input->post('tgl');
		$aslbuku = $this->input->post('aslbuku');
		$jmlbuku = $this->input->post('jmlbuku');
		$jmlbukulama = $this->input->post('jmlbukulama');
		$ket = $this->input->post('ket');

		$explode = explode("/", $tgl);
      	$tglpengadaan = $explode[2].'-'.$explode[0].'-'.$explode[1];

		$idbuku = array('id_buku'=>$buku);
		$stok = $this->buku_model->ambil_stok($idbuku);
		$perubahanStok = intval($stok) - intval($jmlbukulama) + intval($jmlbuku);
		
		$data=array(
			'id_buku'=> $buku,
			'asal_buku'=>$aslbuku,
			'jml'=>$jmlbuku,
			'tgl'=>$tglpengadaan,
			'ket'=>$ket
		);
		$where = array('id_pengadaan'=>$kode);

		$stokbuku = array('jmlbuku' => $perubahanStok);
		$where = array('id_buku' => $buku);

		$this->buku_model->ubah_data($where, $stokbuku, 'buku');
		$this->pengadaan_model->ubah_data($where, $data, 'pengadaan');
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
    	redirect('pengadaan');
	}

	
}
