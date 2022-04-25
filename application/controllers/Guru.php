<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kalender'] = $this->db->query('select tb_kalender_akademik.id as id, tb_kalender_akademik.nama_kegiatan as nama_kegiatan, tb_kalender_akademik.tahun_ajaran as tahun_ajaran, tb_kalender_akademik.tanggal_mulai as tanggal_mulai, tb_kalender_akademik.tanggal_selesai as tanggal_selesai, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_kalender_akademik , tb_tahun_akademik where tb_kalender_akademik.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function edit_profil()
    {
        $data['title'] = 'Edit Akun';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $uploaded = FALSE;
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/edit_profil', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $email = $this->input->post('email');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './upload/user';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
               
            } else {
                $uploaded = TRUE;

                $image_path = './upload/user/'; // your image path
                $_get_image = $this->db->get_where('user', array('email' => $email));

                foreach ($_get_image->result() as $record) {
                    $filename = $image_path . $record->image;
                    if (file_exists($filename)) {
                        delete_files($filename);
                        unlink($filename);
                    }
                }

                $upload_data = $this->upload->data();
                $bukti = $upload_data['file_name'];
            }

            $data = [
                'email' => $email,
                'name' => $this->input->post('name')

            ];


            if ($uploaded) {

                $data = [
                    'email' => $email,
                    'name' => $this->input->post('name'),
                    'image' => $bukti
                ];
            }

            $this->db->where('email', $data['email']);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('guru');
        }
    }

    public function changePassword()
        {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/changepassword', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('guru/changepassword');
                }
            }
        }
    }

    public function biodata()
    {   
        $data['title'] = 'Biodata';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['data'] = $this->db->get_where('tb_guru', ['nip' =>
        $this->session->userdata('nip_nisn')])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/biodata', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function save_biodata()
    {

        $data['title'] = 'Tambah Biodata';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $name = (string) $this->session->userdata('name');
        $nip_nisn = (string) $this->session->userdata('nip_nisn');
        $email = (string) $this->session->userdata('email');

         $data['guru'] = $this->db->get('tb_guru')->result();


        //$this->form_validation->set_rules('nip', 'NIP', 'required');
        //$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('status_keaktifan', 'Status Keaktifan', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/biodata', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'nip' => $nip_nisn,
                'nama_guru' => $name,
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'nik' => $this->input->post('nik'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'email'=>$email,
                'status_keaktifan' => $this->input->post('status_keaktifan'),
                'status_pernikahan' => $this->input->post('status_pernikahan'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir')
            ];

            $this->db->insert('tb_guru', $data);

            redirect('guru/biodata');

            }

    }


    public function detail_biodata($nip)
    {
        $data['title'] = 'Detail Biodata';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        
        $detail_data = $this->db->get_where('tb_guru', array('nip' => $nip))->row();
        $data['detail'] = $detail_data;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/detail_biodata', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function update_biodata()
    {

        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $name = (string) $this->session->userdata('name');
        $nip_nisn = (string) $this->session->userdata('nip_nisn');
        $email = (string) $this->session->userdata('email');

         $data['data'] = $this->db->get('tb_guru')->result();


        //$this->form_validation->set_rules('nip', 'NIP', 'required');
        //$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('status_keaktifan', 'Status Keaktifan', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/biodata', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'nip' => $nip_nisn,
                'nama_guru' => $name,
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'nik' => $this->input->post('nik'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'email'=>$email,
                'status_keaktifan' => $this->input->post('status_keaktifan'),
                'status_pernikahan' => $this->input->post('status_pernikahan'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir')
            ];

            
            $this->db->where('nip', $data['nip']);
            $this->db->update('tb_guru', $data);
            redirect('guru/biodata');

            }
    }

    public function perwalian()
    {   
        $data['title'] = 'Perwalian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_kelas', '',TRUE);
        $data['kelas'] = $this->m_kelas->lima_tabel();
        $data['nip']= $this->session->userdata('nip_nisn');

        $data['data'] = $this->db->get_where('tb_kelas', ['wali_kelas' =>
        $this->session->userdata('nip_nisn')])->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/perwalian', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function detail_kelas($kode_kelas)
    {
        $data['title'] = 'Detail Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kelas'] = $this->db->query('select tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_guru.nip as nip, tb_guru.nama_guru as nama_guru, tb_guru.nip as wali_kelas from tb_kelas, tb_guru where tb_kelas.wali_kelas=tb_guru.nip')->result();
        $data['wali_kelas'] = $this->db->query('select * from tb_guru')->result();

        $data['kelas'] = $this->db->query('select tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_kelas, tb_jurusan where tb_kelas.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $data['kelas'] = $this->db->query('select tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_ruangan.kode_ruangan as kode_ruangan, tb_ruangan.nama_ruangan as nama_ruangan, tb_ruangan.kode_ruangan as ruangan_kode from tb_kelas, tb_ruangan where tb_kelas.ruangan_kode=tb_ruangan.kode_ruangan')->result();
        $data['ruangan_kode'] = $this->db->query('select * from tb_ruangan')->result();

        $data['kelas'] = $this->db->query('select tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_gedung.kode_gedung as kode_gedung, tb_gedung.nama_gedung as nama_gedung, tb_gedung.jumlah_lantai as jumlah_lantai, tb_gedung.panjang as panjang, tb_gedung.tinggi as tinggi, tb_gedung.lebar as lebar, tb_gedung.keterangan as keterangan, tb_gedung.status as status, tb_gedung.kode_gedung as gedung_kode from tb_kelas, tb_gedung where tb_kelas.gedung_kode=tb_gedung.kode_gedung')->result();
        $data['gedung_kode'] = $this->db->query('select * from tb_gedung')->result();

        $data['siswa'] = $this->db->get_where('tb_siswa', array('kelas_kode' => $kode_kelas))->result();

        $this->load->model('m_kelas', '',TRUE);

        $data['kelas'] = $this->m_kelas->lima_tabel();
        
        

        $detail_kelas = $this->db->get_where('tb_kelas', array('kode_kelas' => $kode_kelas))->row();
        $data['detail'] = $detail_kelas;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/detail_kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function kbm()
    {   
        $data['title'] = 'Jadwal Mengajar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_mapel.kode_mapel as mapel_kode from tb_jadwal, tb_mapel where tb_jadwal.mapel_kode=tb_mapel.kode_mapel')->result();
        // $data['mapel_kode'] = $this->db->query('select * from tb_mapel')->result();

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_kelas.kode_kelas as kode_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.ruangan_kode as ruangan_kode, tb_kelas.kode_kelas as kelas_kode from tb_jadwal, tb_kelas where tb_jadwal.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_semester.kode_semester as kode_semester, tb_semester.nama_semester as nama_semester, tb_semester.kode_semester as semester from tb_jadwal, tb_semester where tb_jadwal.semester=tb_semester.kode_semester')->result();
        $data['semester_kode'] = $this->db->query('select * from tb_semester')->result();

        // $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_jadwal, tb_jurusan where tb_jadwal.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        // $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $this->load->model('m_jadwal', '',TRUE);
        $data['kbm'] = $this->m_jadwal->lima_tabel();
        $data['nip']= $this->session->userdata('nip_nisn');

        $data['data'] = $this->db->get_where('tb_jadwal', ['guru_pengampu' =>
        $this->session->userdata('nip_nisn')])->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kbm', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function filter_kbm($kode_jadwal)
    {
        $data['title'] = 'Jadwal Mengajar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kbm'] = $this->db->get_where('tb_jadwal', ['semester'=>$kode_jadwal])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kbm', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

    }

    public function nilai() 
    {
        $data['title'] = 'Input Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        // $this->load->model('m_jadwal', '',TRUE);
        // $data['kbm'] = $this->m_jadwal->lima_tabel();
        // $data['nip']= $this->session->userdata('nip_nisn');

        // $data['data'] = $this->db->get_where('tb_jadwal', ['guru_pengampu' =>
        // $this->session->userdata('nip_nisn')])->result();
        $this->load->model('m_kelas', '',TRUE);
        $data['kelas'] = $this->m_kelas->lima_tabel();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/nilai', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function lihat_siswa($kode_kelas)
    {
        $data['title'] = 'Lihat Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_mapel.kode_mapel as mapel_kode from tb_jadwal, tb_mapel where tb_jadwal.mapel_kode=tb_mapel.kode_mapel')->result();
        $data['mapel_kode'] = $this->db->query('select * from tb_mapel')->result();

        // $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_kelas.kode_kelas as kode_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_jadwal, tb_kelas where tb_jadwal.kelas_kode=tb_kelas.kode_kelas')->result();
        // $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        // $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_semester.kode_semester as kode_semester, tb_semester.nama_semester as nama_semester, tb_semester.kode_semester as semester from tb_jadwal, tb_semester where tb_jadwal.semester=tb_semester.kode_semester')->result();
        $data['semester_kode'] = $this->db->query('select * from tb_semester')->result();

        $data['nilai'] = $this->db->query('select tb_nilai.id as id, tb_nilai.nisn as nisn, tb_nilai.mapel_kode as mapel_kode, tb_nilai.nilai_pengetahuan as nilai_pengetahuan, tb_nilai.deskripsi_np as deskripsi_np, tb_nilai.nilai_ketrampilan as nilai_ketrampilan, tb_nilai.deskripsi_nk as deskripsi_nk, tb_nilai.jenis_evaluasi as jenis_evaluasi, tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_mapel.kode_mapel as jadwal_kode from tb_nilai, tb_mapel where tb_nilai.mapel_kode=tb_mapel.kode_mapel')->result();
        $data['mapels_kode'] = $this->db->query('select * from tb_mapel')->result();

        // $this->load->model('m_jadwal', '',TRUE);
        // $data['data'] = $this->m_jadwal->lima_tabel();


        $detail_jadwal = $this->db->get_where('tb_jadwal', array('kelas_kode' => $kode_kelas))->row();
        $data['detail'] = $detail_jadwal;


        $data['siswa'] = $this->db->get_where('tb_siswa', array('kelas_kode' => $kode_kelas))->result();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/lihat_siswa', $data);
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
            $this->load->view('guru/detail_nilai_siswa', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function save_nilai()
    {

        $data['title'] = 'Simpan Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nilai'] = $this->db->query('select tb_nilai.id as id, tb_nilai.nisn as nisn, tb_nilai.mapel_kode as mapel_kode, tb_nilai.nilai_pengetahuan as nilai_pengetahuan, tb_nilai.deskripsi_np as deskripsi_np, tb_nilai.nilai_ketrampilan as nilai_ketrampilan, tb_nilai.deskripsi_nk as deskripsi_nk, tb_nilai.jenis_evaluasi as jenis_evaluasi, tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_mapel.kode_mapel as jadwal_kode from tb_nilai, tb_mapel where tb_nilai.mapel_kode=tb_mapel.kode_mapel')->result();
        $data['mapel_kode'] = $this->db->query('select * from tb_mapel')->result();

        $data['nilai'] = $this->db->query('select tb_nilai.id as id, tb_nilai.nisn as nisn, tb_nilai.mapel_kode as mapel_kode, tb_nilai.nilai_pengetahuan as nilai_pengetahuan, tb_nilai.deskripsi_np as deskripsi_np, tb_nilai.nilai_ketrampilan as nilai_ketrampilan, tb_nilai.deskripsi_nk as deskripsi_nk, tb_nilai.jenis_evaluasi as jenis_evaluasi, tb_semester.kode_semester as kode_semester, tb_semester.nama_semester as nama_semester, tb_semester.kode_semester as semester from tb_nilai, tb_semester where tb_nilai.semester=tb_semester.kode_semester')->result();
        $data['semester'] = $this->db->query('select * from tb_semester')->result();


        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('mapel_kode', 'Mapel Kode', 'required');
        $this->form_validation->set_rules('nilai_pengetahuan', 'Nilai Pengetahuan', 'required');
        $this->form_validation->set_rules('deskripsi_np', 'Deskripsi NP', 'required');
        $this->form_validation->set_rules('nilai_ketrampilan', 'Nilai Ketrampilan', 'required');
        $this->form_validation->set_rules('deskripsi_nk', 'Deskripsi NK', 'required');
        $this->form_validation->set_rules('jenis_evaluasi', 'Jenis Evaluasi', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
       

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/nilai', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                
                'nisn' => $this->input->post('nisn'),
                'mapel_kode' => $this->input->post('mapel_kode'),
                'nilai_pengetahuan' => $this->input->post('nilai_pengetahuan'),
                'deskripsi_np' => $this->input->post('deskripsi_np'),
                'nilai_ketrampilan' => $this->input->post('nilai_ketrampilan'),
                'deskripsi_nk' => $this->input->post('deskripsi_nk'),
                'jenis_evaluasi' => $this->input->post('jenis_evaluasi'),
                'semester' => $this->input->post('semester'),
            ];

            $this->db->insert('tb_nilai', $data);

            $this->session->set_flashdata('success', 'Data nilai berhasil ditambahkan');
            redirect('guru/nilai');

            }

    }

    public function update_nilai($id)
    {

        $data['title'] = 'Edit Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nilai'] = $this->db->query('select tb_nilai.id as id, tb_nilai.nisn as nisn, tb_nilai.mapel_kode as mapel_kode, tb_nilai.nilai_pengetahuan as nilai_pengetahuan, tb_nilai.deskripsi_np as deskripsi_np, tb_nilai.nilai_ketrampilan as nilai_ketrampilan, tb_nilai.deskripsi_nk as deskripsi_nk, tb_nilai.jenis_evaluasi as jenis_evaluasi, tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_mapel.kode_mapel as jadwal_kode from tb_nilai, tb_mapel where tb_nilai.mapel_kode=tb_mapel.kode_mapel')->result();
        $data['mapel_kode'] = $this->db->query('select * from tb_mapel')->result();

        $data['nilai'] = $this->db->query('select tb_nilai.id as id, tb_nilai.nisn as nisn, tb_nilai.mapel_kode as mapel_kode, tb_nilai.nilai_pengetahuan as nilai_pengetahuan, tb_nilai.deskripsi_np as deskripsi_np, tb_nilai.nilai_ketrampilan as nilai_ketrampilan, tb_nilai.deskripsi_nk as deskripsi_nk, tb_nilai.jenis_evaluasi as jenis_evaluasi, tb_semester.kode_semester as kode_semester, tb_semester.nama_semester as nama_semester, tb_semester.kode_semester as semester from tb_nilai, tb_semester where tb_nilai.semester=tb_semester.kode_semester')->result();
        $data['semester'] = $this->db->query('select * from tb_semester')->result();


  
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('mapel_kode', 'Mapel Kode', 'required');
        $this->form_validation->set_rules('nilai_pengetahuan', 'Nilai Pengetahuan', 'required');
        $this->form_validation->set_rules('deskripsi_np', 'Deskripsi NP', 'required');
        $this->form_validation->set_rules('nilai_ketrampilan', 'Nilai Ketrampilan', 'required');
        $this->form_validation->set_rules('deskripsi_nk', 'Deskripsi NK', 'required');
        $this->form_validation->set_rules('jenis_evaluasi', 'Jenis Evaluasi', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
      
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/nilai', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'id'=>$id,
                'nisn' => $this->input->post('nisn'),
                'mapel_kode' => $this->input->post('mapel_kode'),
                'nilai_pengetahuan' => $this->input->post('nilai_pengetahuan'),
                'deskripsi_np' => $this->input->post('deskripsi_np'),
                'nilai_ketrampilan' => $this->input->post('nilai_ketrampilan'),
                'deskripsi_nk' => $this->input->post('deskripsi_nk'),
                'jenis_evaluasi' => $this->input->post('jenis_evaluasi'),
                'semester' => $this->input->post('semester')
            ];

            }

            $this->db->where('id', $data['id']);
            $this->db->update('tb_nilai', $data);

            $this->session->set_flashdata('success', 'Data nilai berhasil diubah');
            redirect('guru/nilai');
    }

    public function delete_nilai($id = null)
    {

        if (!isset($id)) show_404();
        else {


            $data['title'] = 'Nilai ';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            
            $data['nilai'] = $this->db->query('select * from tb_nilai')->result();

            $this->db->delete('tb_nilai', array("id" => $id));

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/nilai', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
            
        }
        $this->session->set_flashdata('success', 'Data nilai berhasil dihapus');
        redirect('guru/nilai', 'refresh');
        
    }











}