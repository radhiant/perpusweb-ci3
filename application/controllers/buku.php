<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kategori_model');
	$this->load->model('penerbit_model');
	$this->load->model('rak_model');
	$this->load->model('buku_model');
  }
	
	public function index()
	{
		$data['title'] = 'Buku';
		$data['buku'] = $this->buku_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('buku/index');
		$this->load->view('templates/footer');
	}

	public function getTotalStok()
	{
		$idbuku = $this->input->post('id');

		$this->db->select_sum('pb.qty');
        $this->db->from('peminjaman as p');
        $this->db->join('p_buku as pb', 'pb.id_pinjam = p.id_pinjam');
        $this->db->where('pb.id_buku', $idbuku);
        $this->db->where('p.status', 'Pinjam');
		$query = $this->db->get(); 
		$p = $query->row();

		$data = $this->db->select('*')->from('buku')->where('id_buku', $idbuku)->get();
		$b = $data->row();
        
		$hasil = intval($b->jmlbuku) - intval($p->qty);

		$total = array('total' => $hasil);
		echo json_encode($total);
	}

	

	public function tambah()
	{
		$data['title'] = 'Buku';
		//data untuk select
		$data['kategori'] = $this->kategori_model->data()->result();
		$data['penerbit'] = $this->penerbit_model->data()->result();
		$data['rak'] = $this->rak_model->data()->result();

		//jml data
		$data['jmlKategori'] = $this->kategori_model->data()->num_rows();
		$data['jmlPenerbit'] = $this->penerbit_model->data()->num_rows();
		$data['jmlRak'] = $this->rak_model->data()->num_rows();
		

		$this->load->view('templates/header', $data);
		$this->load->view('buku/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Buku';
		//menampilkan data berdasarkan id
		$where = array('id_buku'=>$id);
		$data['data'] = $this->buku_model->detail_data($where, 'buku')->result();

		//data untuk select
		$data['kategori'] = $this->kategori_model->data()->result();
		$data['penerbit'] = $this->penerbit_model->data()->result();
		$data['rak'] = $this->rak_model->data()->result();

		//jml data
		$data['jmlKategori'] = $this->kategori_model->data()->num_rows();
		$data['jmlPenerbit'] = $this->penerbit_model->data()->num_rows();
		$data['jmlRak'] = $this->rak_model->data()->num_rows();
		

		$this->load->view('templates/header', $data);
		$this->load->view('buku/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail_data($id)
  {
    $data['title'] = 'Buku';

    $where = $id;
    $data['data'] = $this->buku_model->detail_join($where)->result();

    $this->load->view('templates/header', $data);
    $this->load->view('buku/detail');
    $this->load->view('templates/footer');
  }

	public function proses_hapus($id)
	{
		$where = array('id_buku' => $id );
		$foto = $this->buku_model->ambilFoto($where);
		if($foto){
			if($foto == 'book.png'){

			}else{
				unlink('./assets/upload/buku/'.$foto.'');
			}
			
			$this->buku_model->hapus_data($where, 'buku');
		}
		
		
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
		redirect('buku');
	}

	public function proses_tambah()
	{
		
		$config['upload_path']   = './assets/upload/buku/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$kode = $this->buku_model->buat_kode(); 
		$buku = $this->input->post('buku');
		$kategori = $this->input->post('kategori');
		$pengarang = $this->input->post('pengarang');
		$isbn = $this->input->post('isbn');
		$jmlhal = $this->input->post('jmlhal');
		$jmlbuku = $this->input->post('jmlbuku');
		$thn = $this->input->post('thn');
		$sinopsis = $this->input->post('sinopsis');
		$penerbit = $this->input->post('penerbit');
		$rak = $this->input->post('rak');
	
	
		if ($namaFile == '') {
		  	$ganti = 'book.png';
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
			  /*
			  $this->session->set_flashdata('Pesan','<div class="alert alert-warning alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <h4><i class="icon fa fa-warning"></i> Oops</h4>
					  '.$error.'
					</div>');
				*/
		  	redirect('buku/tambah');
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
	
	
			}

		}

		$data=array(
			'id_buku'=>$kode,
			'id_kategori'=>$kategori,
			'id_penerbit'=>$penerbit,
			'pengarang'=>$pengarang,
			'id_rak'=>$rak,
			'judul'=>$buku,
			'isbn'=>$isbn,
			'jmlhal'=>$jmlhal,
			'jmlbuku'=>$jmlbuku,
			'tahun' => $thn,
			'sinopsis' => $sinopsis,
			'foto' => $ganti
				);
	  
		  $this->buku_model->tambah_data($data, 'buku');
		  $this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		  redirect('buku');

	}

	public function proses_ubah()
	{
		$config['upload_path']   = './assets/upload/buku/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$kode = $this->input->post('id'); 
		$buku = $this->input->post('buku');
		$kategori = $this->input->post('kategori');
		$pengarang = $this->input->post('pengarang');
		$isbn = $this->input->post('isbn');
		$jmlhal = $this->input->post('jmlhal');
		$jmlbuku = $this->input->post('jmlbuku');
		$thn = $this->input->post('thn');
		$sinopsis = $this->input->post('sinopsis');
		$penerbit = $this->input->post('penerbit');
		$rak = $this->input->post('rak');

		$flama = $this->input->post('fotoLama');
	
	
		if ($namaFile == '') {
		  	$ganti = $flama;
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
			  /*
			  $this->session->set_flashdata('Pesan','<div class="alert alert-warning alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <h4><i class="icon fa fa-warning"></i> Oops</h4>
					  '.$error.'
					</div>');
				*/
		  	redirect('buku/ubah/'.$kode);
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
			  if($flama == 'book.png'){

			  }else{
				unlink('./assets/upload/buku/'.$flama.'');
			  }
	
			}

		}

		$data=array(
			'id_kategori'=>$kategori,
			'id_penerbit'=>$penerbit,
			'pengarang'=>$pengarang,
			'id_rak'=>$rak,
			'judul'=>$buku,
			'isbn'=>$isbn,
			'jmlhal'=>$jmlhal,
			'jmlbuku'=>$jmlbuku,
			'tahun' => $thn,
			'sinopsis' => $sinopsis,
			'foto' => $ganti
				);

		$where = array('id_buku'=>$kode);
	  
		  $this->buku_model->ubah_data($where, $data, 'buku');
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
		  redirect('buku');
	}

}