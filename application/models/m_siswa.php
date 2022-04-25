<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_siswa extends CI_Model
{
  
    public function tiga_tabel()
    {
       $this->db->select ('*');
       $this->db->from ('tb_siswa');
       $this->db->join ('tb_kelas', 'tb_kelas.kode_kelas=tb_siswa.kelas_kode');
       $this->db->join ('tb_jurusan', 'tb_jurusan.kode_jurusan=tb_siswa.jurusan_kode');
       $query = $this->db->get ();
       return $query->result ();
    }

    public function isi_tiga_tabel($nisn)
    {
       $this->db->select ('*');
       $this->db->from ('tb_siswa');
       $this->db->join ('tb_kelas', 'tb_kelas.kode_kelas=tb_siswa.kelas_kode');
       $this->db->join ('tb_jurusan', 'tb_jurusan.kode_jurusan=tb_siswa.jurusan_kode');
       $this->db->where('tb_siswa.nisn', $nisn);
       return $this->db->get()->result();
    }
}
