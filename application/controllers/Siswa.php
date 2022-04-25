<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function profil()
    {
        $data['title'] = 'My Profil';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/profil', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }


    public function edit()
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
            $this->load->view('siswa/edit', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            /*$name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './upload/user';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }*/
            $email = $this->input->post('email');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './upload/user';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                /*$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);*/
                //redirect('user/prestasi/', 'refresh');
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

            /*$this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');*/

            $this->db->where('email', $data['email']);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('siswa');
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
            $this->load->view('siswa/changepassword', $data);
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
                    redirect('siswa/changepassword');
                }
            }
        }
    }

    public function biodata()
    {   
        $data['title'] = 'Biodata';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['data'] = $this->db->get_where('tb_siswa', ['nisn' =>
        $this->session->userdata('nip_nisn')])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/biodata', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function tambah_biodata()  //view tambah ruangan
    {
        $data['title'] = 'Tambah Biodata';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_siswa, tb_kelas where tb_siswa.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_siswa, tb_jurusan where tb_siswa.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tambah_biodata', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_biodata()
    {

        $data['title'] = 'Biodata';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $name = (string) $this->session->userdata('name');
        $nip_nisn = (string) $this->session->userdata('nip_nisn');
        $email = (string) $this->session->userdata('email');

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_siswa, tb_kelas where tb_siswa.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_siswa, tb_jurusan where tb_siswa.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();


        
        //$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
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
            $this->load->view('siswa/biodata', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'nisn' => $nip_nisn,
                        'nama_siswa' => $name,
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
                        'email'=>$email,
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
                        'kontak_ibu' => $this->input->post('kontak_ibu')
                        

                    ];
                    $this->db->insert('tb_siswa', $data);

                    redirect('siswa/biodata');
        }
    }

    public function detail_biodata($nisn)
    {
        $data['title'] = 'Detail Biodata';
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
            $this->load->view('siswa/detail_biodata', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function update_biodata()
    {

        $data['title'] = 'Edit Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $name = (string) $this->session->userdata('name');
        $nip_nisn = (string) $this->session->userdata('nip_nisn');
        $email = (string) $this->session->userdata('email');

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_siswa, tb_kelas where tb_siswa.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_siswa, tb_jurusan where tb_siswa.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        
        //$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
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
            $this->load->view('siswa/biodata', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'nisn' => $nip_nisn,
                'nama_siswa' => $name,
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
                'email'=>$email,
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
                'kontak_ibu' => $this->input->post('kontak_ibu')

            ];

            }


            $this->db->where('nisn', $data['nisn']);
            $this->db->update('tb_siswa', $data);
            redirect('siswa/biodata');
    }

    public function kbm() 
    {
        $data['title'] = 'Data Jadwal Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_kelas', '',TRUE);

        $data['kelas'] = $this->m_kelas->lima_tabel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/jadwal_pelajaran', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function detail_jadwal($kode_kelas)
    {
        $data['title'] = 'Detail Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_mapel.kode_mapel as mapel_kode from tb_jadwal, tb_mapel where tb_jadwal.mapel_kode=tb_mapel.kode_mapel')->result();
        $data['mapel_kode'] = $this->db->query('select * from tb_mapel')->result();

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_kelas.kode_kelas as kode_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_jadwal, tb_kelas where tb_jadwal.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_guru.nip as nip, tb_guru.nama_guru as nama_guru, tb_guru.nip as guru_pengampu from tb_jadwal, tb_guru where tb_jadwal.guru_pengampu=tb_guru.nip')->result();
        $data['guru_pengampu'] = $this->db->query('select * from tb_guru')->result();

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_jadwal, tb_jurusan where tb_jadwal.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_semester.kode_semester as kode_semester, tb_semester.nama_semester as nama_semester, tb_semester.kode_semester as semester from tb_jadwal, tb_semester where tb_jadwal.semester=tb_semester.kode_semester')->result();
        $data['semester'] = $this->db->query('select * from tb_semester')->result();

        $this->load->model('m_jadwal', '',TRUE);

        //$data['mapel'] = $this->db->get_where('tb_mapel', array('kelas_kode' => $kode_kelas))->result();

        $data['jadwal'] = $this->m_jadwal->lima_tabel();
        $data['kode_kelast'] = $kode_kelas;

        $detail_jadwal = $this->db->get_where('tb_jadwal', array('kelas_kode' => $kode_kelas))->result();
        $data['detail'] = $detail_jadwal; 

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('siswa/detail_jadwal', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function nilai_siswa()
    {   
        $data['title'] = 'Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_nilai', '',TRUE);
        $data['nilai'] = $this->m_nilai->join_nilai_mapel();
        $data['nisn']= $this->session->userdata('nip_nisn');

        $data['data'] = $this->db->get_where('tb_nilai', ['nisn' =>
        $this->session->userdata('nip_nisn')])->result();

        $data['semester'] = $this->db->query('select * from tb_semester')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/nilai_siswa', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function filter_nilai()
    {   
        $data['title'] = 'Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['semester'] = $this->db->query('select * from tb_semester')->result();

        $this->load->model('m_nilai', '',TRUE);
        $data['nilai'] = $this->m_nilai->join_nilai_mapel();
        $data['nisn']= $this->session->userdata('nip_nisn');

        $data['data'] = $this->db->get_where('tb_nilai', ['nisn' =>
        $this->session->userdata('nip_nisn')])->result();

        


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/filter_nilai', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }



}
