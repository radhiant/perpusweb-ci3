<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->load->model('peminjaman_model');
        $this->load->model('pengadaan_model');
      }

    public function pengadaan()
    {
      $data['title'] = 'Laporan Pengadaan';

      $this->load->view('templates/header', $data);
      $this->load->view('pengadaan/laporan');
      $this->load->view('templates/footer');
    }

    public function peminjaman()
    {
      $data['title'] = 'Laporan Peminjaman';

      $this->load->view('templates/header', $data);
      $this->load->view('peminjaman/laporan');
      $this->load->view('templates/footer');
    }

    public function pengadaan_pdf()
    {
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');

      if($tglawal != '' && $tglakhir != ''){
        $data['data'] = $this->pengadaan_model->lapdata($tglawal, $tglakhir)->result();
      }
      else{
        $data['data'] = $this->pengadaan_model->dataJoin()->result();
      }

      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;

      $data['judul'] = 'Laporan Pengadaan';
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('laporan/pengadaan_pdf',$data,true);
      $mpdf->WriteHTML($html);
      $tgl = date('Ymd_his');
      $namaFile = 'Pengadaan_'.$tgl.'.pdf';
      $mpdf->Output($namaFile, 'D');

    }

    public function peminjaman_pdf()
    {
      $tglawal = $this->input->post('tglawal');
      $tglakhir = $this->input->post('tglakhir');

      if($tglawal != '' && $tglakhir != ''){
        $data['data'] = $this->peminjaman_model->lapdata($tglawal, $tglakhir)->result();
      }
      else{
        $data['data'] = $this->peminjaman_model->dataJoin()->result();
      }

      $data['tglawal'] = $tglawal;
      $data['tglakhir'] = $tglakhir;

      $data['judul'] = 'Laporan Peminjaman';
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('laporan/peminjaman_pdf',$data,true);
      $mpdf->WriteHTML($html);
      $tgl = date('Ymd_his');
      $namaFile = 'Peminjaman_'.$tgl.'.pdf';
      $mpdf->Output($namaFile, 'D');

    }

}