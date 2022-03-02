<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }
    public function index()
    {


        $data['berita'] = $this->db->get('berita')->result();

        $this->load->view('v_home', $data);
        


        /*$this->load->view('layout/v_wrapper', $data, FALSE);*/
    }

}