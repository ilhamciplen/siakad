<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_mapel extends CI_Model
{

    public function join_empat_tabel()
    {
       $this->db->select ('*');
       $this->db->from ('tb_mapel');
       $this->db->join ('tb_jurusan', 'tb_jurusan.kode_jurusan=tb_mapel.jurusan_kode');
       $this->db->join ('tb_kurikulum', 'tb_kurikulum.kode_kurikulum=tb_mapel.kurikulum_kode');
       $query = $this->db->get ();
       return $query->result ();
    }
}
