<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('login_model');

  }

	public function index()
	{
		
		$this->load->view('templates/header_login');
		$this->load->view('login/index');
		$this->load->view('templates/footer_login');
	}

	public function proses_login()
	{
		$username = $this->input->post('user');
    	$password = $this->input->post('pwd');

    	$where = array(
    		'nama' => $username,
    		'pass' => $password
    	);

    	$cek = $this->login_model->cek_login($where, 'pengguna')->num_rows();
    	$data = $this->login_model->cek_login($where, 'pengguna')->row_array();
    	if ($cek > 0) {

    		$sessi = array(
				'id_user' => $data['id_user'],
    			'username' => $data['nama'],
    			'email' => $data['email'],
    			'notelp' => $data['notelp'],
    			'status' => $data['status'],
    			'level' => $data['level'],
				'foto' => $data['foto'],
				'login' => 'perpusweb'
    		);

			$this->session->set_userdata($sessi);
			
			$respon = array('respon' => 'success');
			echo json_encode($respon);
    	}
    	else{
			$respon = array('respon' => 'failed');
			echo json_encode($respon);
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		$respon = array('respon' => 'success');
		echo json_encode($respon);
	}
}
