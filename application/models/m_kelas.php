<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_kelas extends CI_Model
{

    public function lima_tabel()
    {
       $this->db->select ('*');
       $this->db->from ('tb_kelas');
       $this->db->join ('tb_guru', 'tb_guru.nip=tb_kelas.wali_kelas');
       $this->db->join ('tb_jurusan', 'tb_jurusan.kode_jurusan=tb_kelas.jurusan_kode');
       $this->db->join ('tb_ruangan', 'tb_ruangan.kode_ruangan=tb_kelas.ruangan_kode');
       $this->db->join ('tb_gedung', 'tb_gedung.kode_gedung=tb_kelas.gedung_kode');
       $query = $this->db->get ();
       return $query->result ();
    }

   

    public function kelas_where($wali_kelas) 
    {

        $this->db->select ('*');
       $this->db->from ('tb_kelas');
       $this->db->join ('tb_guru', 'tb_guru.nip=tb_kelas.wali_kelas');
       $this->db->join ('tb_jurusan', 'tb_jurusan.kode_jurusan=tb_kelas.jurusan_kode');
       $this->db->join ('tb_ruangan', 'tb_ruangan.kode_ruangan=tb_kelas.ruangan_kode');
       $this->db->join ('tb_gedung', 'tb_gedung.kode_gedung=tb_kelas.gedung_kode');

    
       $this->db->where('wali_kelas', $wali_kelas);
       $query = $this->db->get();
        return $query->result();
    }

    public function kelas_where_jurusan($jurusan_kode) 
    {
        $this->db->select('*');
        $this->db->from('tb_kelas');
        $this->db->join ('tb_jurusan', 'tb_jurusan.kode_jurusan=tb_kelas.jurusan_kode');
        $this->db->where('tb_jurusan.kode_jurusan', $jurusan_kode);
        
        return $this->db->get()->result();

       }
}
