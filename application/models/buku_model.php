<?php
class buku_model extends ci_model{


    function data()
    {
        $this->db->order_by('id_buku','DESC');
        return $query = $this->db->get('buku');
    }

    public function ambilFoto($where)
    {
      $this->db->order_by('id_buku','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('buku', $where);   
      
      $data = $query->row();
      $foto= $data->foto;
      
      return $foto;
    }

    public function ambil_stok($where){
      $this->db->order_by('id_buku','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('buku',$where);
      $data = $query->row();
      $stok = $data->jmlbuku;
      return $stok;
    }

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('buku as b');
      $this->db->join('kategori as k', 'k.id_kategori = b.id_kategori');
      $this->db->join('penerbit as p', 'p.id_penerbit = b.id_penerbit');
      $this->db->join('rak as r', 'r.id_rak = b.id_rak');

      $this->db->order_by('b.id_buku','DESC');
      return $query = $this->db->get();
    }

    public function detail_join($where)
    {
      $this->db->select('*');
      $this->db->from('buku as b');
      $this->db->where('b.id_buku',$where);
      $this->db->join('kategori as k', 'k.id_kategori = b.id_kategori');
      $this->db->join('penerbit as p', 'p.id_penerbit = b.id_penerbit');
      $this->db->join('rak as r', 'r.id_rak = b.id_rak');

      
      return $this->db->get();
    }

    public function detail_join_pbuku($where)
    {
      $this->db->select('*');
      $this->db->from('p_buku as pb');
      $this->db->join('buku as b', 'b.id_buku = pb.id_buku');

      $this->db->where('pb.id_pinjam',$where);
      return $this->db->get();
    }


    public function ambilId($table, $where)
   {
       return $this->db->get_where($table, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }


    public function detail_data($where, $table)
    {
       return $this->db->get_where($table,$where);
    }

    public function tambah_data($data, $table)
    {
       $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
       $this->db->where($where);
       $this->db->update($table, $data);

    }


    public function buat_kode()   {
		  $this->db->select('RIGHT(buku.id_buku,4) as kode', FALSE);
		  $this->db->order_by('id_buku','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('buku');      //cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() <> 0){
		   //jika kode ternyata sudah ada.
		   $data = $query->row();
		   $kode = intval($data->kode) + 1;
		  }
		  else {
		   //jika kode belum ada
		   $kode = 1;
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "B".$kodemax;    // hasilnya ODJ-0001 dst.
		  return $kodejadi;
	}





}
