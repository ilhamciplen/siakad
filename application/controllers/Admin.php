<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->query('select id as id,COUNT(id) as count from user')->result();
        $data['nip'] = $this->db->query('select nip as nip,COUNT(nip) as count from tb_guru')->result();
        $data['nisn'] = $this->db->query('select nisn as nisn,COUNT(nisn) as count from tb_siswa')->result();

        $data['kalender'] = $this->db->query('select tb_kalender_akademik.id as id, tb_kalender_akademik.nama_kegiatan as nama_kegiatan, tb_kalender_akademik.tahun_ajaran as tahun_ajaran, tb_kalender_akademik.tanggal_mulai as tanggal_mulai, tb_kalender_akademik.tanggal_selesai as tanggal_selesai, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_kalender_akademik , tb_tahun_akademik where tb_kalender_akademik.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();




        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function save_kalender() //action tambah ruangan
    {

        $data['title'] = 'Kalender';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kalender'] = $this->db->query('select tb_kalender_akademik.id as id, tb_kalender_akademik.nama_kegiatan as nama_kegiatan, tb_kalender_akademik.tahun_ajaran as tahun_ajaran, tb_kalender_akademik.tanggal_mulai as tanggal_mulai, tb_kalender_akademik.tanggal_selesai as tanggal_selesai, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_kalender_akademik , tb_tahun_akademik where tb_kalender_akademik.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();

        
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                        'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                        'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                        'tahun_ajaran' => $this->input->post('tahun_ajaran'),

                    ];
                    $this->db->insert('tb_kalender_akademik', $data);

                    $this->session->set_flashdata('success', 'Data kalender berhasil ditambahkan');
                    redirect('admin/index');
        }
    }

    public function update_kalender($id)
    {

        $data['title'] = 'Edit Kalender';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kalender'] = $this->db->query('select tb_kalender_akademik.id as id, tb_kalender_akademik.nama_kegiatan as nama_kegiatan, tb_kalender_akademik.tahun_ajaran as tahun_ajaran, tb_kalender_akademik.tanggal_mulai as tanggal_mulai, tb_kalender_akademik.tanggal_selesai as tanggal_selesai, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_kalender_akademik , tb_tahun_akademik where tb_kalender_akademik.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();

    
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'id'=>$id,
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'tahun_ajaran' => $this->input->post('tahun_ajaran')
            ];

            }


            $this->db->where('id', $data['id']);
            $this->db->update('tb_kalender_akademik', $data);

            $this->session->set_flashdata('success', 'Data kalender berhasil diubah');
            redirect('admin/index');
    }

    public function delete_kalender($id = null)
    {

        if (!isset($id)) show_404();
        else {


            $data['title'] = 'Kalender';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            
            $data['kalender'] = $this->db->query('select * from tb_kalender_akademik')->result();

            $this->db->delete('tb_kalender_akademik', array("id" => $id));

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
            
        }
        $this->session->set_flashdata('success', 'Data kalender berhasil dihapus');
        redirect('admin/index', 'refresh');
        
    }


    //USERRRRRRRR

    public function data_user()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->query('select user.id as id, user.name as name, user.email as email, user.nip_nisn as nip_nisn, user.image as image, user_role.role as role from user , user_role where user.role_id=user_role.id')->result();

        $data['role_id'] = $this->db->query('select * from user_role')->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function save_user()
    {

        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->query('select user.id as id, user.name as name, user.email as email, user.nip_nisn as nip_nisn, user.image as image, user_role.role as role from user , user_role where user.role_id=user_role.id')->result();

        $data['role_id'] = $this->db->query('select * from user_role')->result();

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data_user', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js', $data);
        } else {
            $image = $_FILES["image"];
            if ($image = '') {
            } else {
                $config['upload_path']          = './upload/user';
                $config['allowed_types']        = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    //redirect('user/prestasi/', 'refresh');
                } else {
                    $image = $this->upload->data('file_name');

                    $data = [
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'nip_nisn' => $this->input->post('nip_nisn'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'role_id' => $this->input->post('role_id'),
                        'image' => $this->upload->data('file_name'),
                        'is_active' => 1,
                        'date_created' => time()
                    ];
                    $this->db->insert('user', $data);
                }
            }

            $this->session->set_flashdata('success', 'Data user berhasil ditambahkan');
            redirect('admin/data_user');
        }
    }

    public function delete_user($id = null)
    {
        if (!isset($id)) show_404();
        else {


            $image_path = './upload/user/'; // your image path
            $_get_image = $this->db->get_where('user', array('id' => $id));

            foreach ($_get_image->result() as $record) {
                $filename = $image_path . $record->image;
                if (file_exists($filename)) {
                    delete_files($filename);
                    unlink($filename);
                }
            }

            $this->db->delete('user', array("id" => $id));

            $data['title'] = 'Data User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['role'] = $this->db->query('select user.id as id, user.name as name, user.email as email, user.nip_nisn as nip_nisn, user.image as image, user_role.role as role from user , user_role where user.role_id=user_role.id')->result();

            $data['role_id'] = $this->db->query('select * from user_role')->result();;


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data_user', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js', $data);
        }
        $this->session->set_flashdata('success', 'Data user berhasil dihapus');
        redirect('admin/data_user');
    }

    public function update_user($id)
    {

        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->query('select user.id as id, user.name as name, user.email as email, user.nip_nisn as nip_nisn, user.image as image, user_role.role as role from user , user_role where user.role_id=user_role.id')->result();

        $data['role_id'] = $this->db->query('select * from user_role')->result();

        $uploaded = FALSE;
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data_user', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js', $data);
        } else {

            $config['upload_path']          = './upload/user';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                /*$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);*/
                //redirect('user/prestasi/', 'refresh');
            } else {
                $uploaded = TRUE;

                $image_path = './upload/user/'; // your image path
                $_get_image = $this->db->get_where('user', array('id' => $id));

                foreach ($_get_image->result() as $record) {
                    $filename = $image_path . $record->image;
                    if (file_exists($filename)) {
                        delete_files($filename);
                        unlink($filename);
                    }
                }

                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];
            }


            $data = [
                'id' => $id,
                'name' => $this->input->post('name'),
                'nip_nisn' => $this->input->post('nip_nisn'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1,
                'date_created' => time()
            ];

            if ($uploaded) {

                $data = [
                    'id' => $id,
                    'name' => $this->input->post('name'),
                    'nip_nisn' => $this->input->post('nip_nisn'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_id'),
                    'is_active' => 1,
                    'date_created' => time(),
                    'image' => $image

                ];
            }

            $this->db->where('id', $data['id']);
            $this->db->update('user', $data);
        }

        $this->session->set_flashdata('success', 'Data user berhasil diubah');
        redirect('admin/data_user');
    }


    //RUBIK

    public function berita()
    {

        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['berita'] = $this->db->get('berita')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function save_berita()
    {

        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['berita'] = $this->db->get('berita')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita', $data);
            $this->load->view('templates/footer');
        } else {
            $foto = $_FILES["foto"];
            if ($foto = '') {
            } else {
                $config['upload_path']          = './upload/berita';
                $config['allowed_types']        = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    //redirect('user/prestasi/', 'refresh');
                } else {
                    $foto = $this->upload->data('file_name');

                    $data = [
                        'judul' => $this->input->post('judul'),
                        'foto' => $this->upload->data('file_name'),
                        'isi' => $this->input->post('isi')

                    ];
                    $this->db->insert('berita', $data);
                }
            }

            $this->session->set_flashdata('success', 'Data berita berhasil ditambahkan');
            redirect('admin/berita');
        }
    }


    public function delete_berita($id = null)
    {

        if (!isset($id)) show_404();
        else {


            $image_path = './upload/berita/'; // your image path
            $_get_image = $this->db->get_where('berita', array('id' => $id));

            foreach ($_get_image->result() as $record) {
                $filename = $image_path . $record->foto;
                if (file_exists($filename)) {
                    delete_files($filename);
                    unlink($filename);
                }
            }
            $this->db->delete('berita', array("id" => $id));

            $data['title'] = 'Berita';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['berita'] = $this->db->query('select * from berita')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita', $data);
            $this->load->view('templates/footer');
        }

        $this->session->set_flashdata('success', 'Data berita berhasil dihapus');
        redirect('admin/berita');
    }

    public function update_berita($id)
    {

        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $uploaded = FALSE;
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './upload/berita';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                /*$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);*/
                //redirect('user/prestasi/', 'refresh');
            } else {
                $uploaded = TRUE;

                $image_path = './upload/berita/'; // your image path
                $_get_image = $this->db->get_where('berita', array('id' => $id));

                foreach ($_get_image->result() as $record) {
                    $filename = $image_path . $record->foto;
                    if (file_exists($filename)) {
                        delete_files($filename);
                        unlink($filename);
                    }
                }

                $upload_data = $this->upload->data();
                $bukti = $upload_data['file_name'];
            }
            $data = [
                'id' => $id,
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi')
            ];
            if ($uploaded) {

                $data = [
                    'id' => $id,
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi'),
                    'foto' => $bukti

                ];
            }

            $this->db->where('id', $data['id']);
            $this->db->update('berita', $data);

            $this->session->set_flashdata('success', 'Data berita berhasil diubah');
            redirect('admin/berita');
        }
    }

    //ROLE

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/auth_footer');

            $this->session->set_flashdata('success');

        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('success', 'Role berhasil ditambahkan');
            redirect('admin/role');
        }
    }




    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');

        $this->session->set_flashdata('success');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('success', 'Access Changed');
    }

    public function data_master()
    {
        $data['title'] = 'Data Master';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_master', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    //GEDUNG

    public function gedung() // view gedung
    {
        $data['title'] = 'Data Gedung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['gedung'] = $this->db->get('tb_gedung')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/gedung', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
      
        $this->session->set_flashdata('success');
    }

    public function tambah_gedung()  //view tambah gedung
    {
        $data['title'] = 'Tambah Data Gedung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['gedung'] = $this->db->get('tb_gedung')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_gedung', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_gedung() //action tambah gedung
    {

        $data['title'] = 'Gedung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['gedung'] = $this->db->get('tb_gedung')->result_array();

        $this->form_validation->set_rules('kode_gedung', 'Kode Gedung', 'required');
        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');
        $this->form_validation->set_rules('jumlah_lantai', 'Jumlah Lantai', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang', 'required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('lebar', 'lebar', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/gedung', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'kode_gedung' => $this->input->post('kode_gedung'),
                        'nama_gedung' => $this->input->post('nama_gedung'),
                        'jumlah_lantai' => $this->input->post('jumlah_lantai'),
                        'panjang' => $this->input->post('panjang'),
                        'tinggi' => $this->input->post('tinggi'),
                        'lebar' => $this->input->post('lebar'),
                        'keterangan' => $this->input->post('keterangan'),
                        'status' => $this->input->post('status'),
                        

                    ];
                    $this->db->insert('tb_gedung', $data);
                    
                    $this->session->set_flashdata('success', 'Data gedung berhasil ditambahkan');

                    
                    
                    //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Gedung Berhasil ditambahkan </div>');
                 redirect('admin/gedung', 'refresh');
                    // return $this->load->view('admin/gedung');
        }


        
    }

    public function delete_gedung($kode_gedung = null)
    {

        if (!isset($kode_gedung)) show_404();
        else {


            $data['title'] = 'Gedung';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            
            $data['gedung'] = $this->db->query('select * from tb_gedung')->result();

            $this->db->delete('tb_gedung', array("kode_gedung" => $kode_gedung));

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/gedung', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
            
        }
        $this->session->set_flashdata('success', 'Data gedung berhasil dihapus');
        redirect('admin/gedung', 'refresh');
        
    }

    public function edit_gedung($kode_gedung)  //view edit gedung
    {
        $data['title'] = 'Edit Data Gedung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['gedung'] = $this->db->get('tb_gedung', array("kode_gedung" => $kode_gedung))->result();
        $edit_gedung = $this->db->get_where('tb_gedung', array('kode_gedung' => $kode_gedung))->row();
        $data['gedung'] = $edit_gedung;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_gedung', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_gedung()
    {

        $data['title'] = 'Edit Data Gedung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_gedung', 'Kode Gedung', 'required');
        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');
        $this->form_validation->set_rules('jumlah_lantai', 'Jumlah Lantai', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang', 'required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('lebar', 'lebar', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/gedung', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                        'kode_gedung' => $this->input->post('kode_gedung'),
                        'nama_gedung' => $this->input->post('nama_gedung'),
                        'jumlah_lantai' => $this->input->post('jumlah_lantai'),
                        'panjang' => $this->input->post('panjang'),
                        'tinggi' => $this->input->post('tinggi'),
                        'lebar' => $this->input->post('lebar'),
                        'keterangan' => $this->input->post('keterangan'),
                        'status' => $this->input->post('status')
            ];

            
            $this->db->where('kode_gedung', $data['kode_gedung']);
            $this->db->update('tb_gedung', $data);

            }
            $this->session->set_flashdata('success', 'Data gedung berhasil diubah');
            redirect('admin/gedung');
    }

    //RUANGAN

    public function ruangan() // view ruangan
    {
        $data['title'] = 'Data Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['ruangan'] = $this->db->query('select tb_ruangan.kode_ruangan as kode_ruangan, tb_ruangan.nama_ruangan as nama_ruangan, tb_ruangan.kapasitas as kapasitas, tb_gedung.kode_gedung as kode_gedung, tb_gedung.nama_gedung as nama_gedung, tb_gedung.jumlah_lantai as jumlah_lantai, tb_gedung.panjang as panjang, tb_gedung.tinggi as tinggi, tb_gedung.lebar as lebar, tb_gedung.keterangan as keterangan, tb_gedung.status as status, tb_gedung.kode_gedung as gedung_kode from tb_ruangan , tb_gedung where tb_ruangan.gedung_kode=tb_gedung.kode_gedung')->result();

        $data['gedung_kode'] = $this->db->query('select * from tb_gedung')->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ruangan', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function tambah_ruangan()  //view tambah ruangan
    {
        $data['title'] = 'Tambah Data Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['ruangan'] = $this->db->query('select tb_ruangan.kode_ruangan as kode_ruangan, tb_ruangan.nama_ruangan as nama_ruangan, tb_ruangan.kapasitas as kapasitas, tb_gedung.kode_gedung as kode_gedung, tb_gedung.nama_gedung as nama_gedung, tb_gedung.jumlah_lantai as jumlah_lantai, tb_gedung.panjang as panjang, tb_gedung.tinggi as tinggi, tb_gedung.lebar as lebar, tb_gedung.keterangan as keterangan, tb_gedung.status as status, tb_gedung.kode_gedung as gedung_kode from tb_ruangan , tb_gedung where tb_ruangan.gedung_kode=tb_gedung.kode_gedung')->result();

        $data['gedung_kode'] = $this->db->query('select * from tb_gedung')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_ruangan', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_ruangan() //action tambah ruangan
    {

        $data['title'] = 'Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['ruangan'] = $this->db->query('select tb_ruangan.kode_ruangan as kode_ruangan, tb_ruangan.nama_ruangan as nama_ruangan, tb_ruangan.kapasitas as kapasitas, tb_gedung.kode_gedung as kode_gedung, tb_gedung.nama_gedung as nama_gedung, tb_gedung.jumlah_lantai as jumlah_lantai, tb_gedung.panjang as panjang, tb_gedung.tinggi as tinggi, tb_gedung.lebar as lebar, tb_gedung.keterangan as keterangan, tb_gedung.status as status, tb_gedung.kode_gedung as gedung_kode from tb_ruangan , tb_gedung where tb_ruangan.gedung_kode=tb_gedung.kode_gedung')->result();

        $data['gedung_kode'] = $this->db->query('select * from tb_gedung')->result();

        $this->form_validation->set_rules('kode_ruangan', 'Kode Ruangan', 'required');
        $this->form_validation->set_rules('gedung_kode', 'Gedung Kode', 'required');
        $this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ruangan', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'kode_ruangan' => $this->input->post('kode_ruangan'),
                        'gedung_kode' => $this->input->post('gedung_kode'),
                        'nama_ruangan' => $this->input->post('nama_ruangan'),
                        'kapasitas' => $this->input->post('kapasitas'),

                    ];
                    $this->db->insert('tb_ruangan', $data);

                    $this->session->set_flashdata('success', 'Data ruangan berhasil ditambah');

                    redirect('admin/ruangan');
        }
    }

    public function edit_ruangan($kode_ruangan)  //view edit ruangan
    {
        $data['title'] = 'Edit Data Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['ruangan'] = $this->db->query('select tb_ruangan.kode_ruangan as kode_ruangan, tb_ruangan.nama_ruangan as nama_ruangan, tb_ruangan.kapasitas as kapasitas, tb_gedung.kode_gedung as kode_gedung, tb_gedung.nama_gedung as nama_gedung, tb_gedung.jumlah_lantai as jumlah_lantai, tb_gedung.panjang as panjang, tb_gedung.tinggi as tinggi, tb_gedung.lebar as lebar, tb_gedung.keterangan as keterangan, tb_gedung.status as status, tb_gedung.kode_gedung as gedung_kode from tb_ruangan , tb_gedung where tb_ruangan.gedung_kode=tb_gedung.kode_gedung')->result();

        $data['gedung_kode'] = $this->db->query('select * from tb_gedung')->result();

        $edit_ruangan = $this->db->get_where('tb_ruangan', array('kode_ruangan' => $kode_ruangan))->row();
        $data['ruangan'] = $edit_ruangan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_ruangan', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_ruangan()
    {

        $data['title'] = 'Edit Data Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('kode_ruangan', 'Kode Ruangan', 'required');
        $this->form_validation->set_rules('gedung_kode', 'Gedung Kode', 'required');
        $this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ruangan', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'kode_ruangan' => $this->input->post('kode_ruangan'),
                'gedung_kode' => $this->input->post('gedung_kode'),
                'nama_ruangan' => $this->input->post('nama_ruangan'),
                'kapasitas' => $this->input->post('kapasitas'),

            ];

            }


            $this->db->where('kode_ruangan', $data['kode_ruangan']);
            $this->db->update('tb_ruangan', $data);

            $this->session->set_flashdata('success', 'Data ruangan berhasil diubah');
            redirect('admin/ruangan');
    }

    public function delete_ruangan($kode_ruangan = null)
    {

        if (!isset($kode_ruangan)) show_404();
        else {


            $this->db->delete('tb_ruangan', array("kode_ruangan" => $kode_ruangan));

            $data['title'] = 'Ruangan';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['ruangan'] = $this->db->query('select tb_ruangan.kode_ruangan as kode_ruangan, tb_ruangan.nama_ruangan as nama_ruangan, tb_ruangan.kapasitas as kapasitas, tb_gedung.kode_gedung as kode_gedung, tb_gedung.nama_gedung as nama_gedung, tb_gedung.jumlah_lantai as jumlah_lantai, tb_gedung.panjang as panjang, tb_gedung.tinggi as tinggi, tb_gedung.lebar as lebar, tb_gedung.keterangan as keterangan, tb_gedung.status as status, tb_gedung.kode_gedung as gedung_kode from tb_ruangan , tb_gedung where tb_ruangan.gedung_kode=tb_gedung.kode_gedung')->result();

            $data['gedung_kode'] = $this->db->query('select * from tb_gedung')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ruangan', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }
        $this->session->set_flashdata('success', 'Data ruangan berhasil dihapus');
        redirect('admin/ruangan');
        
    }


    public function jurusan() // view kurikulum
    {
        $data['title'] = 'Data Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jurusan'] = $this->db->get('tb_jurusan')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jurusan', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function tambah_jurusan()  //view tambah kurikulum
    {
        $data['title'] = 'Tambah Data Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jurusan'] = $this->db->get('tb_jurusan')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_jurusan', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_jurusan() //action tambah gedung
    {

        $data['title'] = 'Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jurusan'] = $this->db->get('tb_jurusan')->result_array();

        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jurusan', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'kode_jurusan' => $this->input->post('kode_jurusan'),
                        'nama_jurusan' => $this->input->post('nama_jurusan')

                    ];
                    $this->db->insert('tb_jurusan', $data);

                    $this->session->set_flashdata('success', 'Data jurusan berhasil ditambah');
                    redirect('admin/jurusan');
        }
    }

    public function edit_jurusan($kode_jurusan)  //view edit gedung
    {
        $data['title'] = 'Edit Data Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jurusan'] = $this->db->get('tb_jurusan', array("kode_jurusan" => $kode_jurusan))->result();
        $edit_jurusan = $this->db->get_where('tb_jurusan', array('kode_jurusan' => $kode_jurusan))->row();
        $data['jurusan'] = $edit_jurusan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_jurusan', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_jurusan()
    {

        $data['title'] = 'Edit Data Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jurusan', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                        'kode_jurusan' => $this->input->post('kode_jurusan'),
                        'nama_jurusan' => $this->input->post('nama_jurusan')
                        
            ];

            }


            $this->db->where('kode_jurusan', $data['kode_jurusan']);
            $this->db->update('tb_jurusan', $data);

            $this->session->set_flashdata('success', 'Data jurusan berhasil diubah');
            redirect('admin/jurusan');
    }


    public function delete_jurusan($kode_jurusan= null)
    {

        if (!isset($kode_jurusan)) show_404();
        else {


            $this->db->delete('tb_jurusan', array("kode_jurusan" => $kode_jurusan));

            $data['title'] = 'Jurusan';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['jurusan'] = $this->db->query('select * from tb_jurusan')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jurusan', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }

        $this->session->set_flashdata('success', 'Data jurusan berhasil dihapus');
        redirect('admin/jurusan');
        
    }

    public function kurikulum() // view kurikulum
    {
        $data['title'] = 'Data Kurikulum';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kurikulum'] = $this->db->get('tb_kurikulum')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kurikulum', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function tambah_kurikulum()  //view tambah kurikulum
    {
        $data['title'] = 'Tambah Data Kurikulum';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kurikulum'] = $this->db->get('tb_kurikulum')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_kurikulum', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_kurikulum() //action tambah gedung
    {

        $data['title'] = 'Kurikulum';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kurikulum'] = $this->db->get('tb_jurusan')->result_array();

        $this->form_validation->set_rules('kode_kurikulum', 'Kode Kurikulum', 'required');
        $this->form_validation->set_rules('nama_kurikulum', 'Nama Kurikulum', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kurikulum', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'kode_kurikulum' => $this->input->post('kode_kurikulum'),
                        'nama_kurikulum' => $this->input->post('nama_kurikulum')

                    ];
                    $this->db->insert('tb_kurikulum', $data);

                    $this->session->set_flashdata('success', 'Data kurikulum berhasil ditambahkan');
                    redirect('admin/kurikulum');
        }
    }

    public function edit_kurikulum($kode_kurikulum)  //view edit gedung
    {
        $data['title'] = 'Edit Data Kurikulum';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kurikulum'] = $this->db->get('tb_kurikulum', array("kode_kurikulum" => $kode_kurikulum))->result();
        $edit_kurikulum = $this->db->get_where('tb_kurikulum', array('kode_kurikulum' => $kode_kurikulum))->row();
        $data['kurikulum'] = $edit_kurikulum;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_kurikulum', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_kurikulum()
    {

        $data['title'] = 'Edit Data Kurikulum';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_kurikulum', 'Kode Kurikulum', 'required');
        $this->form_validation->set_rules('nama_kurikulum', 'Nama Kurikulum', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kurikulum', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                        'kode_kurikulum' => $this->input->post('kode_kurikulum'),
                        'nama_kurikulum' => $this->input->post('nama_kurikulum')
                        
            ];

            }


            $this->db->where('kode_kurikulum', $data['kode_kurikulum']);
            $this->db->update('tb_kurikulum', $data);

            $this->session->set_flashdata('success', 'Data kurikulum berhasil diubah');
            redirect('admin/kurikulum');
    }

    public function delete_kurikulum($kode_kurikulum= null)
    {

        if (!isset($kode_kurikulum)) show_404();
        else {


            $this->db->delete('tb_kurikulum', array("kode_kurikulum" => $kode_kurikulum));

            $data['title'] = 'Kurikulum';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['kurikulum'] = $this->db->query('select * from tb_kurikulum')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kurikulum', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }
        $this->session->set_flashdata('success', 'Data kurikulum berhasil dihapus');
        redirect('admin/kurikulum');
        
    }

    public function tahun_akademik() // view kurikulum
    {
        $data['title'] = 'Data Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahun_akademik'] = $this->db->get('tb_tahun_akademik')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tahun_akademik', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function tambah_tahun_akademik()  //view tambah kurikulum
    {
        $data['title'] = 'Tambah Data Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahun_akademik'] = $this->db->get('tb_tahun_akademik')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_tahun_akademik', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_tahun_akademik() //action tambah gedung
    {

        $data['title'] = 'Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahun_akademik'] = $this->db->get('tb_tahun_akademik')->result_array();

        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tahun_akademik', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'tahun' => $this->input->post('tahun'),
                        'keterangan' => $this->input->post('keterangan')

                    ];
                    $this->db->insert('tb_tahun_akademik', $data);

                    $this->session->set_flashdata('success', 'Tahun akademik berhasil ditambahkan');
                    redirect('admin/tahun_akademik');
        }
    }

    public function edit_tahun_akademik($tahun)  //view edit gedung
    {
        $data['title'] = 'Edit Data Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tahun_akademik'] = $this->db->get('tb_tahun_akademik', array("tahun" => $tahun))->result();
        $edit_tahun_akademik = $this->db->get_where('tb_tahun_akademik', array('tahun' => $tahun))->row();
        $data['tahun_akademik'] = $edit_tahun_akademik;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_tahun_akademik', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_tahun_akademik()
    {

        $data['title'] = 'Edit Data Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tahun_akademik', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                        
                        'tahun' => $this->input->post('tahun'),
                        'keterangan' => $this->input->post('keterangan')
                        
            ];

            
        }
            $this->db->where('tahun', $data['tahun']);
            $this->db->update('tb_tahun_akademik', $data);

            $this->session->set_flashdata('success', 'Data tahun akademik berhasil diubah');
            redirect('admin/tahun_akademik');
        
    }

    public function delete_tahun_akademik($id = null)
    {

        if (!isset($id)) show_404();
        else {


            $this->db->delete('tb_tahun_akademik', array("id" => $id));

            $data['title'] = 'Tahun Akademik';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['tahun_akademik'] = $this->db->query('select * from tb_tahun_akademik')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tahun_akademik', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }
        $this->session->set_flashdata('success', 'Data tahun akademik berhasil dihapus');
        redirect('admin/tahun_akademik');
        
    }

    public function guru() // view gedung
    {
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->db->get('tb_guru')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function tambah_guru()  //view tambah gedung
    {
        $data['title'] = 'Tambah Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->db->get('tb_guru')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_guru', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_guru() //action tambah gedung
    {

        $data['title'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->db->get('tb_guru')->result_array();

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_keaktifan', 'Status Keaktifan', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/guru', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'nip' => $this->input->post('nip'),
                        'nama_guru' => $this->input->post('nama_guru'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'tempat_lahir' => $this->input->post('tempat_lahir'),
                        'tgl_lahir' => $this->input->post('tgl_lahir'),
                        'nik' => $this->input->post('nik'),
                        'agama' => $this->input->post('agama'),
                        'alamat' => $this->input->post('alamat'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'status_keaktifan' => $this->input->post('status_keaktifan'),
                        'status_pernikahan' => $this->input->post('status_pernikahan'),
                        'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir')
                        

                    ];
                    $this->db->insert('tb_guru', $data);

                    $this->session->set_flashdata('success', 'Data guru berhasil ditambahkan');
                    redirect('admin/guru');
        }
    }

    public function edit_guru($nip)  //view edit gedung
    {
        $data['title'] = 'Edit Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->db->get('tb_guru', array("nip" => $nip))->result();
        $edit_guru = $this->db->get_where('tb_guru', array('nip' => $nip))->row();
        $data['guru'] = $edit_guru;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_guru', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_guru()
    {

        $data['title'] = 'Edit Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_keaktifan', 'Status Keaktifan', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/guru', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                        'nip' => $this->input->post('nip'),
                        'nama_guru' => $this->input->post('nama_guru'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'tempat_lahir' => $this->input->post('tempat_lahir'),
                        'tgl_lahir' => $this->input->post('tgl_lahir'),
                        'nik' => $this->input->post('nik'),
                        'agama' => $this->input->post('agama'),
                        'alamat' => $this->input->post('alamat'),
                        'no_hp' => $this->input->post('no_hp'),
                        'email' => $this->input->post('email'),
                        'status_keaktifan' => $this->input->post('status_keaktifan'),
                        'status_pernikahan' => $this->input->post('status_pernikahan'),
                        'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir')
            ];

            }


            $this->db->where('nip', $data['nip']);
            $this->db->update('tb_guru', $data);

            $this->session->set_flashdata('success', 'Data guru berhasil diubah');
            redirect('admin/guru');
    }

    public function delete_guru($nip = null)
    {

        if (!isset($nip)) show_404();
        else {


            $this->db->delete('tb_guru', array("nip" => $nip));

            $data['title'] = 'Guru';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['guru'] = $this->db->query('select * from tb_guru')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/guru', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }
        $this->session->set_flashdata('success', 'Data guru berhasil dihapus');
        redirect('admin/guru');
        
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
            $this->load->view('admin/detail_guru', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function kelas() // view gedung
    {
        $data['title'] = 'Data Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_kelas', '',TRUE);

        $data['kelas'] = $this->m_kelas->lima_tabel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function tambah_kelas()  //view tambah ruangan
    {
        $data['title'] = 'Tambah Data Kelas';
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_kelas', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_kelas() //action tambah ruangan
    {

        $data['title'] = 'Kelas';
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

        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('jurusan_kode', 'Jurusan Kode', 'required');
        $this->form_validation->set_rules('ruangan_kode', 'Ruangan Kode', 'required');
        $this->form_validation->set_rules('gedung_kode', 'Gedung Kode', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'kode_kelas' => $this->input->post('kode_kelas'),
                        'wali_kelas' => $this->input->post('wali_kelas'),
                        'nama_kelas' => $this->input->post('nama_kelas'),
                        'jurusan_kode' => $this->input->post('jurusan_kode'),
                        'ruangan_kode' => $this->input->post('ruangan_kode'),
                        'gedung_kode' => $this->input->post('gedung_kode'),

                    ];
                    $this->db->insert('tb_kelas', $data);

                    $this->session->set_flashdata('success', 'Data kelas berhasil ditambahkan');
                    redirect('admin/kelas');
        }
    }

    public function edit_kelas($kode_kelas)  //view edit ruangan
    {
        $data['title'] = 'Edit Data Ruangan';
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

        $edit_kelas = $this->db->get_where('tb_kelas', array('kode_kelas' => $kode_kelas))->row();
        $data['kelas'] = $edit_kelas;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_kelas', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_kelas()
    {

        $data['title'] = 'Edit Data Kelas';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('jurusan_kode', 'Jurusan Kode', 'required');
        $this->form_validation->set_rules('ruangan_kode', 'Ruangan Kode', 'required');
        $this->form_validation->set_rules('gedung_kode', 'Gedung Kode', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                        'kode_kelas' => $this->input->post('kode_kelas'),
                        'wali_kelas' => $this->input->post('wali_kelas'),
                        'nama_kelas' => $this->input->post('nama_kelas'),
                        'jurusan_kode' => $this->input->post('jurusan_kode'),
                        'ruangan_kode' => $this->input->post('ruangan_kode'),
                        'gedung_kode' => $this->input->post('gedung_kode'),

            ];

            }

            $this->db->where('kode_kelas', $data['kode_kelas']);
            $this->db->update('tb_kelas', $data);

            $this->session->set_flashdata('success', 'Data kelas berhasil diubah');
            redirect('admin/kelas');
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
            $this->load->view('admin/detail_kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }


    public function delete_kelas($kode_kelas = null)
    {

        if (!isset($kode_kelas)) show_404();
        else {


            $this->db->delete('tb_kelas', array("kode_kelas" => $kode_kelas));

            $data['title'] = 'Kelas';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->model('m_kelas', '',TRUE);

            $data['kelas'] = $this->m_kelas->lima_tabel();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }

        $this->session->set_flashdata('success', 'Data kelas berhasil dihapus');
        redirect('admin/kelas');
        
    }

    public function siswa()
    {   
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_siswa', '',TRUE);

        $data['siswa'] = $this->m_siswa->tiga_tabel();

    

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
    }

    public function tambah_siswa()  //view tambah ruangan
    {
        $data['title'] = 'Tambah Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_kelas.kode_kelas as kode_kelas, tb_kelas.wali_kelas as wali_kelas, tb_kelas.nama_kelas as nama_kelas, tb_kelas.kode_kelas as kelas_kode from tb_siswa, tb_kelas where tb_siswa.kelas_kode=tb_kelas.kode_kelas')->result();
        $data['kelas_kode'] = $this->db->query('select * from tb_kelas')->result();

        $data['siswa'] = $this->db->query ('select tb_siswa.nisn as nisn, tb_siswa.nama_siswa as nama_siswa, tb_siswa.jenis_kelamin as jenis_kelamin, tb_siswa.nik as nik, tb_siswa.tgl_lahir as tgl_lahir, tb_siswa.tempat_lahir as tempat_lahir, tb_siswa.agama as agama, tb_siswa.alamat as alamat, tb_siswa.dusun as dusun, tb_siswa.kelurahan as kelurahan, tb_siswa.kecamatan as kecamatan, tb_siswa.jenis_tinggal as jenis_tinggal, tb_siswa.transportasi as transportasi, tb_siswa.no_telepon as no_telepon, tb_siswa.no_hp as no_hp, tb_siswa.kode_pos as kode_pos, tb_siswa.nama_ayah as nama_ayah, tb_siswa.pekerjaan_ayah as pekerjaan_ayah, tb_siswa.kontak_ayah as kontak_ayah, tb_siswa.nama_ibu as nama_ibu, tb_siswa.pekerjaan_ibu as pekerjaan_ibu, tb_siswa.kontak_ibu as kontak_ibu, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_siswa, tb_jurusan where tb_siswa.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_siswa', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_siswa()
    {

        $data['title'] = 'Siswa';
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
            $this->load->view('admin/siswa', $data);
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
                        'email'=> $this->input->post('email'),
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
                    $this->db->insert('tb_siswa', $data);

                    $this->session->set_flashdata('success', 'Data siswa berhasil ditambahkan');
                    redirect('admin/siswa');
        }
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
        $this->load->view('admin/edit_siswa', $data);
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
            $this->load->view('admin/detail_siswa', $data);
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
            $this->load->view('admin/siswa', $data);
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
            redirect('admin/siswa');
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
            $this->load->view('admin/siswa', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }

        $this->session->set_flashdata('success', 'Data siswa berhasil dihapus');
        redirect('admin/siswa');
        
    }


    public function semester() // view gedung
    {
        $data['title'] = 'Data Semester';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['semester'] = $this->db->get('tb_semester')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/semester', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
        $this->session->set_flashdata('success');
    }

    public function tambah_semester()  //view tambah gedung
    {
        $data['title'] = 'Tambah Data Semester';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['semester'] = $this->db->get('tb_semester')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_semester', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_semester() //action tambah gedung
    {

        $data['title'] = 'Semester';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['semester'] = $this->db->get('tb_semester')->result_array();

        $this->form_validation->set_rules('kode_semester', 'Kode Semester', 'required');
        $this->form_validation->set_rules('nama_semester', 'Nama Semester', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/semester', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'kode_semester' => $this->input->post('kode_semester'),
                        'nama_semester' => $this->input->post('nama_semester'),
                        'status' => $this->input->post('status')
                        

                    ];
                    $this->db->insert('tb_semester', $data);

                    $this->session->set_flashdata('success', 'Data semester berhasil ditambahkan');
                    redirect('admin/semester');
        }
    }

    public function delete_semester($kode_semester = null)
    {

        if (!isset($kode_semester)) show_404();
        else {


            $this->db->delete('tb_semester', array("kode_semester" => $kode_semester));

            $data['title'] = 'Semester';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            
            $data['semester'] = $this->db->query('select * from tb_semester')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/semester', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }

        $this->session->set_flashdata('success', 'Data semester berhasil dihapus');
        redirect('admin/semester');
        
    }

    public function edit_semester($kode_semester)  //view edit gedung
    {
        $data['title'] = 'Edit Data Semester';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['semester'] = $this->db->get('tb_semester', array("kode_semester" => $kode_semester))->result();
        $edit_semester = $this->db->get_where('tb_semester', array('kode_semester' => $kode_semester))->row();
        $data['semester'] = $edit_semester;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_semester', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_semester()
    {

        $data['title'] = 'Edit Data Semester';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_semester', 'Kode Semester', 'required');
        $this->form_validation->set_rules('nama_semester', 'Nama Semester', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/semester', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'kode_semester' => $this->input->post('kode_semester'),
                'nama_semester' => $this->input->post('nama_semester'),
                'status' => $this->input->post('status')
            ];

            }


            $this->db->where('kode_semester', $data['kode_semester']);
            $this->db->update('tb_semester', $data);
            $this->session->set_flashdata('success', 'Data semester berhasil diubah');
            redirect('admin/semester');
    }

    public function mapel()
    {
        $data['title'] = 'Data Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_mapel', '',TRUE);

        $data['mapel'] = $this->m_mapel->join_empat_tabel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function tambah_mapel()  //view tambah ruangan
    {
        $data['title'] = 'Tambah Data Mapel';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['mapel'] = $this->db->query('select tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_mapel, tb_jurusan where tb_mapel.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $data['mapel'] = $this->db->query('select tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_kurikulum.kode_kurikulum as kode_kurikulum, tb_kurikulum.nama_kurikulum as nama_kurikulum, tb_kurikulum.kode_kurikulum as kurikulum_kode from tb_mapel, tb_kurikulum where tb_mapel.kurikulum_kode=tb_kurikulum.kode_kurikulum')->result();
        $data['kurikulum_kode'] = $this->db->query('select * from tb_kurikulum')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_mapel', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function save_mapel() //action tambah ruangan
    {

        $data['title'] = 'Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['mapel'] = $this->db->query('select tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_mapel, tb_jurusan where tb_mapel.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $data['mapel'] = $this->db->query('select tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_kurikulum.kode_kurikulum as kode_kurikulum, tb_kurikulum.nama_kurikulum as nama_kurikulum, tb_kurikulum.kode_kurikulum as kurikulum_kode from tb_mapel, tb_kurikulum where tb_mapel.kurikulum_kode=tb_kurikulum.kode_kurikulum')->result();
        $data['kurikulum_kode'] = $this->db->query('select * from tb_kurikulum')->result();


        $this->form_validation->set_rules('kode_mapel', 'Kode Mapel', 'required');
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required');
        $this->form_validation->set_rules('jurusan_kode', 'Jurusan Kode', 'required');
        $this->form_validation->set_rules('kurikulum_kode', 'Kurikulum Kode', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/mapel', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'kode_mapel' => $this->input->post('kode_mapel'),
                        'nama_mapel' => $this->input->post('nama_mapel'),
                        'jurusan_kode' => $this->input->post('jurusan_kode'),
                        'kurikulum_kode' => $this->input->post('kurikulum_kode'),

                    ];
                    $this->db->insert('tb_mapel', $data);
                    $this->session->set_flashdata('success', 'Data mapel berhasil ditambahkan');
                    redirect('admin/mapel');
        }
    }

    public function edit_mapel($kode_mapel)  //view edit ruangan
    {
        $data['title'] = 'Edit Data Mapel';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['mapel'] = $this->db->query('select tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_jurusan.kode_jurusan as kode_jurusan, tb_jurusan.nama_jurusan as nama_jurusan, tb_jurusan.kode_jurusan as jurusan_kode from tb_mapel, tb_jurusan where tb_mapel.jurusan_kode=tb_jurusan.kode_jurusan')->result();
        $data['jurusan_kode'] = $this->db->query('select * from tb_jurusan')->result();

        $data['mapel'] = $this->db->query('select tb_mapel.kode_mapel as kode_mapel, tb_mapel.nama_mapel as nama_mapel, tb_kurikulum.kode_kurikulum as kode_kurikulum, tb_kurikulum.nama_kurikulum as nama_kurikulum, tb_kurikulum.kode_kurikulum as kurikulum_kode from tb_mapel, tb_kurikulum where tb_mapel.kurikulum_kode=tb_kurikulum.kode_kurikulum')->result();
        $data['kurikulum_kode'] = $this->db->query('select * from tb_kurikulum')->result();

        $edit_mapel = $this->db->get_where('tb_mapel', array('kode_mapel' => $kode_mapel))->row();
        $data['mapel'] = $edit_mapel;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_mapel', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function update_mapel()
    {

        $data['title'] = 'Edit Data Mapel';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_mapel', 'Kode Mapel', 'required');
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required');
        $this->form_validation->set_rules('jurusan_kode', 'Jurusan Kode', 'required');
        $this->form_validation->set_rules('kurikulum_kode', 'Kurikulum Kode', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/mapel', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'kode_mapel' => $this->input->post('kode_mapel'),
                'nama_mapel' => $this->input->post('nama_mapel'),
                'jurusan_kode' => $this->input->post('jurusan_kode'),
                'kurikulum_kode' => $this->input->post('kurikulum_kode'),

            ];

            }

            $this->db->where('kode_mapel', $data['kode_mapel']);
            $this->db->update('tb_mapel', $data);

            $this->session->set_flashdata('success', 'Data mapel berhasil diubah');
            redirect('admin/mapel');
    }

    public function delete_mapel($kode_mapel = null)
    {

        if (!isset($kode_mapel)) show_404();
        else {


            $this->db->delete('tb_mapel', array("kode_mapel" => $kode_mapel));

            $data['title'] = 'Mata Pelajaran';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->model('m_mapel', '',TRUE);

            $data['mapel'] = $this->m_mapel->join_empat_tabel();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/mapel', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }
        $this->session->set_flashdata('success', 'Data mapel berhasil dihapus');
        redirect('admin/mapel');
        
    }

    public function jadwal() 
    {
        $data['title'] = 'Data Jadwal Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('m_kelas', '',TRUE);

        $data['kelas'] = $this->m_kelas->lima_tabel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jadwal_pelajaran', $data);
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
            $this->load->view('admin/detail_jadwal', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
    }

    public function tambah_jadwal()  //view tambah ruangan
    {
        $data['title'] = 'Tambah Data Jadwal Pelajaran';
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

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_jadwal, tb_tahun_akademik where tb_jadwal.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();


        $this->load->model('m_jadwal', '',TRUE);

        $data['jadwal'] = $this->m_jadwal->lima_tabel();

       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_jadwal', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

        $this->session->set_flashdata('success');
        
    }

    public function save_jadwal()
    {

        $data['title'] = 'Jadwal';
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

        $data['jadwal'] = $this->db->query('select tb_jadwal.kode_jadwal as kode_jadwal, tb_jadwal.hari as hari, tb_jadwal.jam as jam, tb_tahun_akademik.tahun as tahun, tb_tahun_akademik.keterangan as keterangan, tb_tahun_akademik.tahun as tahun_ajaran from tb_jadwal, tb_tahun_akademik where tb_jadwal.tahun_ajaran=tb_tahun_akademik.tahun')->result();
        $data['tahun_ajaran'] = $this->db->query('select * from tb_tahun_akademik')->result();

        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('kelas_kode', 'Kelas Kode', 'required');
        $this->form_validation->set_rules('mapel_kode', 'Mapel Kode', 'required');
        $this->form_validation->set_rules('guru_pengampu', 'Guru Pengampu', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        $this->form_validation->set_rules('jurusan_kode', 'Jurusan Kode', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_jadwal', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {
                    $data = [
                        'hari' => $this->input->post('hari'),
                        'kelas_kode' => $this->input->post('kelas_kode'),
                        'mapel_kode' => $this->input->post('mapel_kode'),
                        'guru_pengampu' => $this->input->post('guru_pengampu'),
                        'jam' => $this->input->post('jam'),
                        'jurusan_kode' => $this->input->post('jurusan_kode'),
                        'semester' => $this->input->post('semester'),
                        'tahun_ajaran' => $this->input->post('tahun_ajaran'),

                    ];
                    $this->db->insert('tb_jadwal', $data);

                    $this->session->set_flashdata('success', 'Data jadwal berhasil ditambahkan');
                    redirect('admin/tambah_jadwal');
        }
    }

    public function update_jadwal($kode_jadwal)
    {

        $data['title'] = 'Edit Data Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('kelas_kode', 'Kelas Kode', 'required');
        $this->form_validation->set_rules('mapel_kode', 'Mapel Kode', 'required');
        $this->form_validation->set_rules('guru_pengampu', 'Guru Pengampu', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        $this->form_validation->set_rules('jurusan_kode', 'Jurusan Kode', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kelas', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        } else {

            $data = [
                'kode_jadwal' => $kode_jadwal,
                'hari' => $this->input->post('hari'),
                'kelas_kode' => $this->input->post('kelas_kode'),
                'mapel_kode' => $this->input->post('mapel_kode'),
                'guru_pengampu' => $this->input->post('guru_pengampu'),
                'jam' => $this->input->post('jam'),
                'jurusan_kode' => $this->input->post('jurusan_kode'),
                'semester' => $this->input->post('semester'),
                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            ];

            }

            $this->db->where('kode_jadwal', $data['kode_jadwal']);
            $this->db->update('tb_jadwal', $data);

            $this->session->set_flashdata('success', 'Data jadwal berhasil diubah');
            redirect('admin/tambah_jadwal');
    }

    public function delete_jadwal($kode_jadwal = null)
    {

        if (!isset($kode_jadwal)) show_404();
        else {


            $this->db->delete('tb_jadwal', array("kode_jadwal" => $kode_jadwal));

            $data['title'] = 'Jadwal';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->model('m_jadwal', '',TRUE);

            $data['jadwal'] = $this->m_jadwal->lima_tabel();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_jadwal', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        }

        $this->session->set_flashdata('success', 'Data jadwal berhasil dihapus');
        redirect('admin/tambah_jadwal');
        
    }












    
}
