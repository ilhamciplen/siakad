<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi extends CI_Controller
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

        $data['nama_prodi'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $data['kalender'] = $this->db->query('select tb_kalender_akademik.id as id, tb_kalender_akademik.nama_kegiatan as nama_kegiatan, tb_kalender_akademik.tahun_ajaran as tahun_ajaran, tb_kalender_akademik.tanggal_mulai as tanggal_mulai, tb_kalender_akademik.tanggal_selesai as tanggal_selesai, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_kalender_akademik , tb_tahun_akademik where tb_kalender_akademik.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();


        $id_prodi = $_SESSION['id_prodi'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        if ($id_prodi == 'TAV') {
            $this->load->view('kaprodi/index1', $data);
        } else if ($id_prodi == 'TKR') {
            $this->load->view('kaprodi/index2', $data);
        } else if ($id_prodi == 'AK') {
            $this->load->view('kaprodi/index3', $data);
        } else if ($id_prodi == 'OTKP') {
            $this->load->view('kaprodi/index4', $data);
        } else if ($id_prodi == 'BB') {
            $this->load->view('kaprodi/index5', $data);
        } else if ($id_prodi == 'KR') {
            $this->load->view('kaprodi/index6', $data);
        } else if ($id_prodi == 'ANKES') {
            $this->load->view('kaprodi/index7', $data);
        } 

        $this->load->view('templates/footer');
    }

    public function kelas()
    {   
        $data['title'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_kelas', '',TRUE);
        $data['kelas'] = $this->m_kelas->lima_tabel();
        $data['id_prodi']= $this->session->userdata('id_prodi');

        $data['data'] = $this->db->get_where('tb_kelas', ['jurusan_kode' =>
        $this->session->userdata('id_prodi')])->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/kelas', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function detail_kelas($kode_kelas)
    {
        $data['title'] = 'Detail Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->get_where('tb_siswa', array('kelas_kode' => $kode_kelas))->result();

        $this->load->model('m_kelas', '',TRUE);

        $data['kelas'] = $this->m_kelas->lima_tabel();
        
        

        $detail_kelas = $this->db->get_where('tb_kelas', array('kode_kelas' => $kode_kelas))->row();
        $data['detail'] = $detail_kelas;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kaprodi/detail_kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
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
            $this->load->view('kaprodi/detail_siswa', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function edit_siswa($nisn)  //view edit gedung
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_siswa, tb_kelas where tb_siswa.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_siswa, tb_jurusan where tb_siswa.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $this->load->model('m_siswa', '',TRUE);

        $data['siswa'] = $this->m_siswa->tiga_tabel();

        $edit_siswa = $this->db->get_where('tb_siswa', array('nisn' => $nisn))->row();
        $data['siswa'] = $edit_siswa;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/edit_siswa', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_siswa()
    {

        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_siswa, tb_kelas where tb_siswa.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_siswa, tb_jurusan where tb_siswa.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();


        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jenis_tinggal', 'Jenis Tinggal', 'required');
        $this->form_validation->set_rules('transportasi', 'Transportasi', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
        $this->form_validation->set_rules('kelas_kode', 'Kelas Kode', 'required');
        $this->form_validation->set_rules('jurusan_kode', 'Jurusan Kode', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('kontak_ayah', 'Kontak Ayah', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('kontak_ibu', 'Kontak Ibu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kaprodi/kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'nisn' => $this->input->post('nisn'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'nik' => $this->input->post('nik'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'dusun' => $this->input->post('dusun'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'jenis_tinggal' => $this->input->post('jenis_tinggal'),
                'transportasi' => $this->input->post('transportasi'),
                'email'=>$this->input->post('email'),
                'no_telepon' => $this->input->post('no_telepon'),
                'no_hp' => $this->input->post('no_hp'),
                'kode_pos' => $this->input->post('kode_pos'),
                'kelas_kode' => $this->input->post('kelas_kode'),
                'jurusan_kode' => $this->input->post('jurusan_kode'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'kontak_ayah' => $this->input->post('kontak_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'kontak_ibu' => $this->input->post('kontak_ibu'),

            ];

            }


            $this->db->where('nisn', $data['nisn']);
            $this->db->update('tb_siswa', $data);

            $this->session->set_flashdata('success', 'Data siswa berhasil diubah');
            redirect('kaprodi/kelas');
    }

    public function delete_siswa($nisn = null)
    {

        if (!isset($nisn)) show_404();
        else {


            $this->db->delete('tb_siswa', array("nisn" => $nisn));

            $data['title'] = 'Siswa';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->model('m_siswa', '',TRUE);

            $data['siswa'] = $this->m_siswa->tiga_tabel();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/detail_siswa', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }

        $this->session->set_flashdata('success', 'Data siswa berhasil dihapus');
        redirect('admin/detail_siswa');
        
    }

    public function nilai_siswa()
    {   
        $data['title'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_kelas', '',TRUE);
        $data['kelas'] = $this->m_kelas->lima_tabel();
        $data['id_prodi']= $this->session->userdata('id_prodi');

        $data['data'] = $this->db->get_where('tb_kelas', ['jurusan_kode' =>
        $this->session->userdata('id_prodi')])->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/nilai_siswa', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function detail_kelass($kode_kelas)
    {
        $data['title'] = 'Detail Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->get_where('tb_siswa', array('kelas_kode' => $kode_kelas))->result();

        $this->load->model('m_kelas', '',TRUE);

        $data['kelas'] = $this->m_kelas->lima_tabel();
        
        

        $detail_kelas = $this->db->get_where('tb_kelas', array('kode_kelas' => $kode_kelas))->row();
        $data['detail'] = $detail_kelas;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kaprodi/detail_kelass', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function detail_nilai_siswa($nisn)
    {
        $data['title'] = 'Lihat Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['nilai'] = $this->db->get_where('tb_nilai', array('nisn' => $nisn))->result();

        $this->load->model('m_nilai', '',TRUE);
        $data['nilai'] = $this->m_nilai->join_nilai_mapel();
        $data['nisn'] = $nisn;

        $data['data'] = $this->db->get_where('tb_nilai', array('nisn' => $nisn))->result();

        // $detail_jadwal = $this->db->get_where('tb_jadwal', array('kelas_kode' => $kode_kelas))->result();
        // $data['detail'] = $detail_jadwal; 

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kaprodi/detail_nilai_siswa', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }




    
}
