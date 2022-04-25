<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_jadwal extends CI_Model
{

    public function lima_tabel()
    {
       $this->db->select ('*');
       $this->db->from ('tb_jadwal');
       $this->db->join ('tb_guru', 'tb_guru.nip=tb_jadwal.guru_pengampu');
       $this->db->join ('tb_mapel', 'tb_mapel.kode_mapel=tb_jadwal.mapel_kode');
       $this->db->join ('tb_kelas', 'tb_kelas.kode_kelas=tb_jadwal.kelas_kode');
       $this->db->join ('tb_jurusan', 'tb_jurusan.kode_jurusan=tb_jadwal.jurusan_kode');
       $this->db->join ('tb_semester', 'tb_semester.kode_semester=tb_jadwal.semester');
       $this->db->join ('tb_tahun_akademik', 'tb_tahun_akademik.tahun=tb_jadwal.tahun_ajaran');
       $query = $this->db->get ();
       return $query->result ();
    }

    public function jadwal_mapel_siswa()
    {
       $this->db->select ('*');
       $this->db->from ('tb_jadwal');
       $this->db->join ('tb_mapel', 'tb_mapel.kode_mapel=tb_jadwal.mapel_kode');
       $this->db->join ('tb_siswa', 'tb_siswa.nisn=tb_jadwal.nisn');
       $query = $this->db->get ();
       return $query->result ();
    }
}
