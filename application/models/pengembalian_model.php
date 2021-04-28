<?php
class pengembalian_model extends ci_model{


    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('pengembalian as pgm');
      $this->db->join('peminjaman as pjm', 'pjm.id_pinjam = pgm.id_pinjam');
      $this->db->join('anggota as a', 'a.id_anggota = pjm.id_anggota');

      $this->db->order_by('pgm.id_kembali','DESC');
      return $query = $this->db->get();
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


}