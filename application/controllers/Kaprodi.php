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

        $id_prodi = $_SESSION['id_prodi'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        if ($id_prodi == '1') {
            $this->load->view('kaprodi/index1', $data);
        } else if ($id_prodi == '2') {
            $this->load->view('kaprodi/index2', $data);
        } else if ($id_prodi == '3') {
            $this->load->view('kaprodi/index3', $data);
        } else if ($id_prodi == '4') {
            $this->load->view('kaprodi/index4', $data);
        } else if ($id_prodi == '5') {
            $this->load->view('kaprodi/index5', $data);
        } else if ($id_prodi == '6') {
            $this->load->view('kaprodi/index6', $data);
        } else if ($id_prodi == '7') {
            $this->load->view('kaprodi/index7', $data);
        } 

        $this->load->view('templates/footer');
    }

    
}
