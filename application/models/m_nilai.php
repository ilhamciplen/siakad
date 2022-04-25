<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_nilai extends CI_Model
{

    public function join_nilai_mapel()
    {
       $this->db->select ('*');
       $this->db->from ('tb_nilai');
       $this->db->join ('tb_mapel', 'tb_mapel.kode_mapel=tb_nilai.mapel_kode');
       $query = $this->db->get ();
       return $query->result ();
    }

}
