<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kalender'] = $this->db->query('select tb_kalender_akademik.id as id, tb_kalender_akademik.nama_kegiatan as nama_kegiatan, tb_kalender_akademik.tahun_ajaran as tahun_ajaran, tb_kalender_akademik.tanggal_mulai as tanggal_mulai, tb_kalender_akademik.tanggal_selesai as tanggal_selesai, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_kalender_akademik , tb_tahun_akademik where tb_kalender_akademik.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_guru() // view gedung
    {
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->db->get('tb_guru')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/data_guru', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function detail_guru($nip)
    {
        $data['title'] = 'Detail Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detail_guru = $this->db->get_where('tb_guru', array('nip' => $nip))->row();
        $data['detail'] = $detail_guru;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kepsek/detail_guru', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function data_siswa()
    {   
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_siswa', '',TRUE);

        $data['siswa'] = $this->m_siswa->tiga_tabel();

    

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/data_siswa', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function detail_siswa($nisn)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_siswa, tb_kelas where tb_siswa.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_siswa, tb_jurusan where tb_siswa.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $this->load->model('m_siswa', '',TRUE);

        $data['siswa'] = $this->m_siswa->tiga_tabel();

        $detail_biodata = $this->db->get_where('tb_siswa', array('nisn' => $nisn))->row();
        $data['detail'] = $detail_biodata;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kepsek/detail_siswa', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }



    
}