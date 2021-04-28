<?php
class peminjaman_model extends ci_model{


    function data()
    {
        $this->db->order_by('id_pinjam','DESC');
        return $query = $this->db->get('peminjaman');
    }

    public function detail_join($where)
    {
      $this->db->select('*');
      $this->db->from('peminjaman as p');
      $this->db->join('anggota as a', 'a.id_anggota = p.id_anggota');

      $this->db->where('p.id_pinjam', $where);
      return $query = $this->db->get();

      
      return $this->db->get();
    }

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('peminjaman as p');
      $this->db->join('anggota as a', 'a.id_anggota = p.id_anggota');

      $this->db->order_by('p.id_pinjam','DESC');
      return $query = $this->db->get();
    }

    public function top3buku()
    {
      $this->db->select('COUNT(p.id_buku) as total, b.*, p.*, pnb.penerbit');
      $this->db->from('p_buku as p');
      $this->db->join('buku as b', 'b.id_buku = p.id_buku');
      $this->db->join('penerbit as pnb', 'pnb.id_penerbit = b.id_penerbit');
		  $this->db->group_by('p.id_buku');
      $this->db->limit(3);
      $this->db->order_by('total','DESC');
		  return $query = $this->db->get();  
    }

    public function top3anggota()
    {
      $this->db->select('COUNT(p.id_anggota) as total, a.*, p.*');
      $this->db->from('peminjaman as p');
      $this->db->join('anggota as a', 'a.id_anggota = p.id_anggota');
		  $this->db->group_by('p.id_anggota');
      $this->db->limit(3);
      $this->db->order_by('total','DESC');
		  return $query = $this->db->get();  
    }

    function lapdata($tglAwal, $tglAkhir)
    {

      $this->db->select('*');
      $this->db->from('peminjaman as p');
      $this->db->join('anggota as a', 'a.id_anggota = p.id_anggota');

      $this->db->where('p.tgl_pinjam >=', $tglAwal);
      $this->db->where('p.tgl_pinjam <=', $tglAkhir);
      return $query = $this->db->get();
    }

    function jmlperbulan($tglAwal, $tglAkhir)
    {

      $this->db->select('*');
      $this->db->from('peminjaman as p');
      $this->db->join('anggota as a', 'a.id_anggota = p.id_anggota');

      $this->db->where('p.tgl_pinjam >=', $tglAwal);
      $this->db->where('p.tgl_pinjam <=', $tglAkhir);
      return $query = $this->db->get();
    }

    public function dataJoinStatus()
    {
      $this->db->select('*');
      $this->db->from('peminjaman as p');
      $this->db->join('anggota as a', 'a.id_anggota = p.id_anggota');

      $this->db->where('p.status','Pinjam');
      $this->db->order_by('p.id_pinjam','DESC');
      return $query = $this->db->get();
    }

    public function detail_data_join($where)
    {
      $this->db->select('*');
      $this->db->from('peminjaman as p');
      $this->db->join('anggota as a', 'a.id_anggota = p.id_anggota');

      $this->db->where('p.id_pinjam',$where);
      return $query = $this->db->get();
    }

    public function detail_buku_join($where)
    {
      $this->db->select('*');
      $this->db->from('p_buku as pb');
      $this->db->join('buku as b', 'b.id_buku = pb.id_buku');

      $this->db->where('pb.id_pinjam',$where);
      return $query = $this->db->get();
    }

    //multiple insert
    public function save_batch($data, $table){
      return $this->db->insert_batch($table, $data);
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
		  $this->db->select('RIGHT(peminjaman.id_pinjam,4) as kode', FALSE);
		  $this->db->order_by('id_pinjam','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('peminjaman');      //cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() <> 0){
		   //jika kode ternyata sudah ada.
		   $data = $query->row();
		   $kode = intval($data->kode) + 1;
		  }
		  else {
		   //jika kode belum ada
		   $kode = 1;
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		  $kodejadi = "PJM".$kodemax;    
		  return $kodejadi;
	}





}
